<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */


    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsProductDiscountPlg
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

                /** @var Sp4kAppsProductDicountPlg * */
                $className = 'Sp4kAppsProductDiscount' . ucfirst($index);
                if (class_exists($className)) {
                    $result[] = $className::getInstance($state);
                }
            }

            return $result;
        }
    }