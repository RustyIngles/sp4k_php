<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsContractApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsContractTrait;

        /** @var  Sp4kAppsContractItem */
        public $item;

        /** @var  Sp4kAppsContractItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsContractApp';
    }