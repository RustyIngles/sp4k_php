<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsOrderLinesApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsOrderLinesTrait;

        /** @var  Sp4kAppsOrderLinesItem */
        public $item;

        /** @var  Sp4kAppsOrderLinesItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsOrderLinesApp';
    }