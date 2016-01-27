<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */
    use Joomla\Registry\Registry;

    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsProductPaymentPlg
    {
        public $event;
        public $venue;
        public $cartkey;

        public function __construct($state)
        {
            $this->_state = $state;
        }

        public function getState()
        {
            return $this->_state;
        }

        public static function getInstance(&$product,$state)
        {
            $result = false;
            foreach($state->get('options') as $index=>$plg){

                /** @var Sp4kAppsProductPaymentPlg * */
                $className = 'Sp4kAppsProductPayment' . ucfirst($index);
                if (class_exists($className)) {
                    $result[$index] = $className::getInstance($product,$state);
                }
            }

            return $result;
        }
    }