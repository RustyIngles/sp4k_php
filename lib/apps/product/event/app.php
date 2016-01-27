<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsProductEventApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsProductTrait;

        /** @var  Sp4kAppsCategoryItem */
        public $item;

        /** @var  Sp4kAppsCategoryItems */
        public $items;

        protected $_statekey = 'Sp4kAppsProductApp';
    }