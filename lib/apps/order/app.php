<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsOrderApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsOrderTrait;

        /** @var  Sp4kAppsOrderItem */
        public $item;

        /** @var  Sp4kAppsOrderItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsOrderApp';
    }