<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsEventApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsEventTrait;

        /** @var  Sp4kAppsEvent */
        public $item;

        /** @var  Sp4kAppsEvent */
        public $items;

        protected $_statekey = 'Sp4kAppsEventApp';
    }