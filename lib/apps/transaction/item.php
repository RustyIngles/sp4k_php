<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsTransactionItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsTransactionTrait;

        public $id;
        public $created;
        public $ref_id;
        public $invoice_id;
        public $method;
        public $amount;

        protected function bind()
        {
            parent::bind();
        }

        public function update()
        {
            if(!isset($this->created)){
                $this->created = time();
            }

            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }

    }