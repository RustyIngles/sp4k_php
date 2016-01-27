<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsTransactionApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsTransactionTrait;

        /** @var  Sp4kAppsTransactionItem */
        public $item;

        /** @var  Sp4kAppsTransactionItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsTransactionApp';
    }