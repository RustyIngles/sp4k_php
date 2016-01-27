<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsContractItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsContractTrait;

        public $id;
        public $created;
        public $state = 0;
        public $order_id;
        public $event_id;
        public $product_id;
        public $terms;
        public $paydate;

        protected function bind()
        {
            parent::bind();
        }

        public function update()
        {
            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }

    }