<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/12/2015
 * Time: 3:56 PM
 */


    class Sp4kAppsVenueApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsVenueTrait;

        protected $_error;

        /** @var  Sp4kAppsCategoryItem */
        public $item;

        /** @var  Sp4kAppsCategoryItems */
        public $items;

        protected $_statekey = 'Sp4kAppsVenueApp';
    }