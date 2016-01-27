<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsChildItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsChildTrait;

        /**
         * @var Sp4kAppsChildApp
         */

        public $id;
        public $account_id;
        public $name;
        public $dob;

        protected function load()
        {
            parent::load();
        }

        protected function bind()
        {
            parent::bind();
        }
    }