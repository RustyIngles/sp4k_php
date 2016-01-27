<?php
    use Joomla\Registry\Registry;
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 1:31 PM
     */

    class Sp4kAppsProductBookingSubscription extends Sp4kAppsProductBookingPlg
    {
        public $type = 'subscription';
        public $attendeeOptions;
        public $dateStartOptions;


        /** @var Sp4kAppsRruleItem $rrule */
        protected $_rrule;
        /** @var Registry  **/
        protected $_state;
        protected $_product;
        protected $_config;

        public static function getInstance(&$product,$state)
        {
           return new self($product,$state);
        }

        public function __construct(&$product,Registry $state)
        {
            /** @var Joomla\Registry\Registry _state */
            $this->_state = $state;
            $this->_config =$product->config;
            $this->enabled = $this->_config->booking->enabled;
            $this->_product = $product;
            $this->setRrule();
            $this->setVenue();
            $this->setAttendeeOptions();
            $this->setStartDateOptions();
        }

        //this class defines the parameters for subscription bookable products
        //provide start dates using product schedule.
        //provide attendee options.

        public function getValidDates()
        {
            return $this->dateStartOptions;
        }

        private function setRrule()
        {
            parse_str(
                str_replace(';','&',$this->_product->config->schedule->rrule),
                $rrule
            );


            $this->_rrule = Sp4kAppsRruleApp::getInstance(
                new Registry(
                    array_change_key_case(
                        $rrule
                    )
                )
            )->getItem();

        }

        private function setVenue()
        {
            $this->venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id' => $this->_product->venue_id])
            )->getItem();
        }

        //todo move to getter
        private function setAttendeeOptions()
        {
            $parentFilters = new stdClass();
            $parentFilters->juser_id = JFactory::getUser()->id;

            if($parentFilters->juser_id != 0){
                $parentAppItems = Sp4kAppsParentApp::getInstance(
                    new Registry(['filters' => $parentFilters])
                )->getItems();

                $parent = array_pop($parentAppItems);

                $childFilters = new stdClass();
                $childFilters->account_id = $parent->account_id;


                $this->children = Sp4kAppsChildApp::getInstance(
                    new Registry(['filters' => $childFilters])
                )->getItems();
            }
        }

        private function setStartDateOptions()
        {
            $firstDate = new \DateTime();
            $firstDateThirty = new \DateTime(strftime('%Y%m%d', strtotime('+30days')));


            //$this->rrule = Sp4kAppsRruleApp::getInstance(new Registry(['id' => $this->event->rrule_id]))->getItem();

            $dateStartCollection = $this->_rrule->getDatesBetween($firstDate, $firstDateThirty)->toArray();

            foreach ($dateStartCollection as $dateStartCollectionItem) {
                /** @var DateTime $startDateObject */
                $startDateObject = $dateStartCollectionItem->getStart();
                $this->dateStartOptions[] = $startDateObject->getTimeStamp();
            }
        }
    }