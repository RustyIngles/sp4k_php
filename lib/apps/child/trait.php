<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    trait Sp4kAppsChildTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */
        
        protected $_key = 'id';
        protected $_table_alias = 'child';
        
        
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
                    $this->_table = new Sp4kTablesBase('#__sp4k_child_items','id', $this->getTableAlias());
        }

        /**
         * @param \Joomla\Registry\Registry|null $state
         * @return self
         */
        public static function getInstance( Joomla\Registry\Registry $state = null)
        {
            return new self($state);
        }
        
        /**
         * @param \Joomla\Registry\Registry | null $state
         *
         * @return \Sp4kAppsChildItem
         *
         */
        public function getItemInstance( Joomla\Registry\Registry $state = null)
        {
            return Sp4kAppsChildItem::getInstance( $state );
        }
        
        /**
         * @param  Joomla\Registry\Registry $state
         *
         * @return Sp4kAppsChildItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsChildItems::getInstance($state);
        }
        
        /**
         * @return \Joomla\Registry\Registry
         */
        protected function getState()
        {
            return Joomla\Registry\Registry::getInstance($this->_statekey);
        }
    }