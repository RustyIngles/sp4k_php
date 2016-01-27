<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsRruleApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsRruleTrait;

        /** @var  Sp4kAppsRruleItem */
        public $item;

        /** @var  Sp4kAppsRruleItems */
        public $items;

        protected $_statekey = 'Sp4kAppsRruleApp';
    }