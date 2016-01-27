<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsAccountItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsAccountTrait;

        public $id;
        public $created;
    }