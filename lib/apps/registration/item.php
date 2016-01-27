<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsRegistrationItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsRegistrationTrait;

        public $id;
        public $created;
        public $state;
        public $status;
        public $child;
        public $product;
        public $product_id;
        public $child_id;
        public $order_id;
        public $date_start;
        public $date_end;

        public $error = false;


        public function load(){
            parent::load();
            $this->child = Sp4kAppsChildApp::getInstance(
                new Registry(['id'=>(int)$this->getState()->get('child_id')])
            )->getItem();
            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry(['id'=>(int)$this->getState()->get('product_id')])
            )->getItem();

        }

        public function bind()
        {
            parent::bind();
        }


        public function update()
        {
            if(!isset($this->created)){
                $this->created = time();
            }

            $this->getTable()->save((array)$this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }
    }