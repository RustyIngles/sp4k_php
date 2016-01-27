<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    use Joomla\Registry\Registry;

    trait Sp4kAppsParentTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */
        
        protected $_key = 'id';
        protected $_table_alias = 'parent';
        
        
        
        /**
         * @return bool|\Sp4kTablesBase
         */
        public function getTable()
        {
            $test = 'test';

            return
                $this->_table
                    ?
                    $this->_table
                    :
                    $this->_table = new Sp4kTablesBase('#__sp4k_parent_items','id', $this->getTableAlias());
        }
        
        public static function getInstance( Registry $state = null)
        {
            return new self($state);
        }

        /**
         * @param Registry | null $state
         *
         * @return Sp4kAppsParentItem
         */
        public function getItemInstance( Registry $state = null)
        {
            return Sp4kAppsParentItem::getInstance( $state );
        }
        
        /**
         * @param  Registry $state
         *
         * @return Sp4kAppsParentItems
         */
        public function getItemsInstance( Registry $state = NULL )
        {
            return Sp4kAppsParentItems::getInstance($state);
        }
        
        /**
         * @return Registry
         */
        protected function getState()
        {
            return Registry::getInstance($this->_statekey);
        }
    }