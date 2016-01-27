<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsParentItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsParentTrait;

        /**
         * @var Sp4kAppsScheduleApp
         */

        public $id;
        public $account_id;
        public $juser_id;
        public $created;
        public $state;
        public $primary;
        public $sms;
        public $title;
        public $f_name;
        public $l_name;
        public $phone_home;
        public $phone_work;
        public $phone_mobile;
        public $address_street1;
        public $address_street2;
        public $address_city;
        public $address_postalcode;
        public $address_state;
        public $address_country;

        protected function bind()
        {
            $stateProperties = $this->getState()->toArray();

            foreach( get_object_vars(   $this) as $index=>$property){//get the defined properties for this class.
                if(array_key_exists($index,$stateProperties)){//if the state contains an index of the same name
                    $this->$index = $stateProperties[$index];//assign its value to this instance.
                }
            }

            $this->juser = JFactory::getUser($this->juser_id);
        }

        public function update()
        {
            if(
                array_key_exists('created',get_object_vars($this))
                &&
                !isset($this->created)
            )$this->created = time();

            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }
    }