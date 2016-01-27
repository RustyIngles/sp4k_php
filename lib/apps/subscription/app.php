<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsSubscriptionApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsSubscriptionTrait;

        /** @var  Sp4kAppsSubscriptionItem */
        public $item;

        /** @var  Sp4kAppsSubscriptionItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsSubscriptionApp';
    }