<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */


    //this class defines the parameters for bookable products
    //provide attendee options.
    class Sp4kAppsCartPluginsPaymentPlg
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
            foreach($state->get('options') as $index=>$config){
                $className = 'Sp4kAppsCartPluginsPayment'.ucfirst($index);
                return new $className(new Registry($config));
            }

        }
    }