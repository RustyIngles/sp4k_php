<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsCartPluginsApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsCartPluginsTrait;

        /** @var  Sp4kAppsCart */
        public $item;

        /** @var  Sp4kAppsCart */
        public $items;

        protected $_statekey = 'Sp4kAppsCartPluginsApp';
    }