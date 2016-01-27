<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppProductModifierApp extends Sp4kApp
    {
        protected $_error;

        protected $item_title = 'venue';
        protected $items_title = 'venues';

        /** @var string  */
        protected $_key = 'id';

        public $item   = false;
        public $items  = false;


        public function getItemInstance($params = null)
        {
            return Sp4kAppProductItem::getInstance($params);
        }

        public function getItemsInstance($params = null)
        {

            return Sp4kAppProductItems::getInstance($params);
        }
    }