<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsRegistrationApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsRegistrationTrait;

        /** @var  Sp4kAppsRegistrationItem */
        public $item;

        /** @var  Sp4kAppsREgistrationItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsRegistrationApp';
    }