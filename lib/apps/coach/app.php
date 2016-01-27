<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsCoachApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsCoachTrait;

        /** @var  Sp4kAppsCoachItem */
        public $item;

        /** @var  Sp4kAppsCoachItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsCoachApp';
    }