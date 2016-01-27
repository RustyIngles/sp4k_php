<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    trait Sp4kAppsAccountTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */
        
        protected $_key = 'id';
        protected $_table_alias ='account';
        
        
        
        /**
         * @return bool|\Sp4kTablesBase
         */
        public function getTable()
        {
            return
                $this->_table
                    ?
                        $this->_table
                    :
                        $this->_table = new Sp4kTablesBase('#__sp4k_account_items','id',$this->getTableAlias());
        }
        
        public static function getInstance( Registry $state = null)
        {
            return new self($state);
        }
        
        /**
         * @param Registry | null $state
         *
         * @return \Sp4kAppsAccountItem
         *
         */
        public function getItemInstance( Registry $state = null)
        {
            return Sp4kAppsAccountItem::getInstance( $state );
        }
        
        /**
         * @param   Registry $state
         *
         * @return Sp4kAppsAccountItems
         */
        public function getItemsInstance( Registry $state = NULL )
        {
            return Sp4kAppsAccountItems::getInstance($state);
        }
        
        /**
         * @return  Registry
         */
        protected function getState()
        {
            return Registry::getInstance($this->_statekey);
        }
    }