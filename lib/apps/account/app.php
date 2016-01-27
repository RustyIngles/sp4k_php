<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsAccountApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsAccountTrait;

        /** @var  Sp4kAppsAccountItem */
        public $item;

        /** @var  Sp4kAppsAccountItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsAccountApp';
    }