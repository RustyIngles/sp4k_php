<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsPaymentApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsPaymentTrait;

        /** @var  Sp4kAppsPaymentItem */
        public $item;

        /** @var  Sp4kAppsPaymentItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsPaymentApp';
    }