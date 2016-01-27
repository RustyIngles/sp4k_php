<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */


    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsProductSchedulePlg
    {
        public function __construct(&$product,$state)
        {
            $this->_state = $state;
            $this->_product = &$product;
        }

        public function getState()
        {
            return $this->_state;
        }

        public static function getInstance(&$product,$state)
        {
            if ($state->get('options.enabled',false)) {

                /** @var Sp4kAppsProductSchedulePlg * */
                $className = 'Sp4kAppsProductSchedule' . ucfirst($state->get('options.type'));
                if (class_exists($className)) {
                    return $className::getInstance($product,$state);
                }
            }

            return false;
        }

        public function getValidDates()
        {
            return $this->validDates;
        }
    }