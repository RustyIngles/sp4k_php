<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsInvoiceApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsInvoiceTrait;

        /** @var  Sp4kAppsInvoiceItem */
        public $item;

        /** @var  Sp4kAppsInvoiceItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsInvoiceApp';
    }