<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */


    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsCartPluginsPricingPlg
    {
        public $attendees;

        public function __construct($state)
        {
            $this->_state = $state;
        }

        public function getState(){
            return $this->_state;
        }
        public static function getInstance($state){
            $className = 'Sp4kAppsCartPluginsPricing'.ucfirst($state->get('options.type'));
            return new $className($state);
        }
    }