<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 4:56 PM
 */

    abstract class Sp4kBaseModel extends JModelBase
    {
        public function __construct($state = null){
            parent::__construct($state);
            $this->execute();
        }
        
        abstract protected function execute();
    }