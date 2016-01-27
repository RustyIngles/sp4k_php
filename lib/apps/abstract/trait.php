<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/5/2015
 * Time: 4:02 PM
 */
    use Joomla\Registry\Registry;

    trait Sp4kAppsAbstractTrait
    {

        //private static $_statekey;

        /**
         * @var Sp4kTablesBase | Sp4kTablesNestedbase
         */
        protected $_table;
        protected $_error = false;

        //protected $_key = '';
        //protected $_table_alias ='';

        /**
         * @param string $path
         * @param mixed $value
         *
         * @return \Joomla\Registry\Registry
         */
        public function setState($path,$value)
        {
            $this->getState()->set($path,$value);
            return $this->getState();
        }

        public function getError()
        {
            return $this->_error;
        }

        protected function getKey(){
            return $this->_key;
        }

        protected function getTableAlias(){
            return $this->_table_alias;
        }


        /**
         * @return Joomla\Registry\Registry
         */
        abstract protected function getState();



    }
