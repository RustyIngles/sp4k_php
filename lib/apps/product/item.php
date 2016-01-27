<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsProductItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsProductTrait;

        public $id;
        public $parent_id;
        public $category_id;
        public $state;
        public $title;
        public $description;
        public $created;
        public $createdby;
        public $config;
        public $plugins;
        public $venue_id;
        public $lft;
        public $rgt;
        public $level;

        protected $_toJson = ['config'];

        protected function load(){
            parent::load();

        }

        protected function bind()
        {
            parent::bind();
            if($this->plugins !== false){
                $this->plugins = new stdClass();
                foreach($this->config as $index=>$configopt)
                {
                    $cartPluginClassName  =  'Sp4kAppsProduct'.ucfirst($index).'Plg';
                    if(class_exists($cartPluginClassName)){
                        $state = new Registry(['options'=>$configopt]);
                        $this->plugins->{$index} = $cartPluginClassName::getInstance($this,$state);
                    }

                }
            }

        }

        public function update()
        {
            if(!isset($this->parent_id)){

                //default to root parent
                $this->parent_id = 1;
            }

            $this->getTable()->addJsonEncodedField('config')->save((array)$this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();
        }

        public function getPricing(){
            $this->pricing = Sp4kAppsProductPricingApp::getInstance($this->config);
        }

        public function getPrivatefield($field){
            return $this->getTable()->$field;
        }
    }