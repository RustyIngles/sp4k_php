<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */


    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsProductPricingPlg
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
            if($state->get('options.enabled')) {

                /** @var Sp4kAppsProductBookingPlg * */
                $className = 'Sp4kAppsProductPricing' . ucfirst($state->get('options.type'));
                if (class_exists($className)) {
                    return $className::getInstance($product,$state);
                }
            }

            return false;
        }
    }