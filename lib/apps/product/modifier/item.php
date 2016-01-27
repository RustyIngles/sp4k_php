<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppProductItem extends Sp4kObjectsItem
    {
        protected $_table = false;

        /** @var string  */
        protected $_key = 'id';

        public static function getInstance($params)
        {
            return new self(
                new Joomla\Registry\Registry($params)
            );
        }

        public function getTable()
        {
            return
                $this->_table
                    ?
                    $this->_table
                    :
                    $this->_table = new Sp4kTablesBase('#__sp4k_product_items','id');
        }
    }