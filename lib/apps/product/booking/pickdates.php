<?php
    use Joomla\Registry\Registry;
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/28/2015
     * Time: 5:38 PM
     */

    class Sp4kAppsProductBookingPickdates extends Sp4kAppsProductBookingPlg
    {
        public $type = 'pickdates';
        private $_state;
        private $_config;
        private $_product;

        public static function getInstance(&$product,$state)
        {
            return new self($product,$state);
        }

        public function __construct(&$product,Registry $state)
        {
            /** @var Joomla\Registry\Registry _state */
            $this->_state = $state;
            /** @var Sp4kAppsProductItem _product */
            $this->_product = $product;
            $this->_config = json_decode($product->config);
            $this->setAttendeeOptions();
        }

        public function getValidDates(){
            return $this->_product->plugins->schedule->getValidDates();
        }

        private function setAttendeeOptions()
        {
            $parentFilters = new stdClass();
            $parentFilters->juser_id = JFactory::getUser()->id;

            $parentAppItems = Sp4kAppsParentApp::getInstance(
                new Registry(['filters' => $parentFilters])
            )->getItems();

            $parent = array_pop($parentAppItems);

            $childFilters = new stdClass();
            $childFilters->parent_id = $parent->id;


            $this->children = Sp4kAppsChildApp::getInstance(
                new Registry(['filters' => $childFilters])
            )->getItems();
        }

    }