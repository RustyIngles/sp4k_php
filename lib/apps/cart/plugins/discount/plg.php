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
    class Sp4kAppsCartPluginsDiscountPlg
    {
        public $attendees;

        public function __construct($state)
        {
            $this->_state = $state;
        }

        public function getState(){
            return $this->_state;
        }

        public static function getInstance( Joomla\Registry\Registry $state){
            $discounts = [];
            if($state->get('enabled')){
                $state->set('enabled',null);

                foreach($state->toArray() as $type=>$data){
                    if(isset($data)){
                        $className = 'Sp4kAppsCartPluginsDiscount'.ucfirst($type);
                        if(class_exists($className)){
                            $discounts[] = new $className(new Registry($data));
                        }
                    }
                }

                if(count($discounts)>0){

                    return $discounts;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }