<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsCoachItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsCoachTrait;

        public $id;
        public $created;
        public $name;
        public $phone;
        public $driving;
        public $city;
        public $kitholder;
        public $role;
        public $reserve;
        public $doftw1;
        public $doftw2;
        public $doftw3;
        public $doftw4;
        public $doftw5;
        public $doftw6;
        public $doftw7;

        public function charge(){
            return $this->update();
        }
    }