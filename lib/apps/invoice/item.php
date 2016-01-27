<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsInvoiceItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsInvoiceTrait;

        public $id;
        public $created;
        public $order_id;
        public $total;

        public $error = false;

        protected function bind()
        {
            parent::bind();
        }

        public function update()
        {
            if(!isset($this->created))$this->created = time();



            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }

    }