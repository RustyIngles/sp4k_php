<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsParentApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsParentTrait;

        /** @var  Sp4kAppsParentItem */
        public $item;

        /** @var  Sp4kAppsParentItems */
        public $items;

        protected $_statekey = 'Sp4kAppsParentApp';
    }