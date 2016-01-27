<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/16/2015
     * Time: 5:54 PM
     */

    class Sp4kModulesProductModelsProduct extends JModelBase
    {
        public $productApp;

        public function __construct($state = null)
        {
            parent::__construct($state);
            $this->execute();
        }

        public function execute()
        {
            $this->productApp = new Sp4kAppProductApp($this->state);
        }
    }