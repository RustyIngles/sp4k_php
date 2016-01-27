<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    trait Sp4kAppsTransactionTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */
        
        protected $_key = 'id';
        protected $_table_alias;
        
        
        
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
                    $this->_table = new Sp4kTablesBase('#__sp4k_transaction_items','id', $this->_table_alias);
        }
        
        public static function getInstance( Registry $state = null)
        {
            return new self($state);
        }
        
        /**
         * @param Registry | null $state
         *
         * @return \Sp4kAppsTransactionItem
         *
         */
        public function getItemInstance( Registry $state = null)
        {
            return Sp4kAppsTransactionItem::getInstance( $state );
        }
        
        /**
         * @param   Registry $state
         *
         * @return Sp4kAppsTransactionItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsTransactionItems::getInstance($state);
        }
        
        /**
         * @return  Registry
         */
        protected function getState()
        {
            return Registry::getInstance($this->_statekey);
        }
    }