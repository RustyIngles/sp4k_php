<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsChildApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsChildTrait;

        /** @var  Sp4kAppsChildItem */
        public $item;

        /** @var  Sp4kAppsChildItems */
        public $items;

        protected $_statekey = 'Sp4kAppsChildApp';
    }