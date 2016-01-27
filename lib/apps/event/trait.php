<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    trait Sp4kAppsEventTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */
        
        protected $_key = 'id';
        
        
        
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
                    $this->_table = new Sp4kTablesBase('#__sp4k_event_items','id');
        }


        /**
         * @param \Joomla\Registry\Registry|null $state
         *
         * @return Sp4kAppsEventTrait
         */
        public static function getInstance( Joomla\Registry\Registry $state = null)
        {
            return new self($state);
        }
        
        /**
         * @param \Joomla\Registry\Registry | null $state
         *
         * @return \Sp4kAppsEventItem
         *
         */
        public function getItemInstance( Joomla\Registry\Registry $state = null)
        {
            return Sp4kAppsEventItem::getInstance( $state );
        }
        
        /**
         * @param  Joomla\Registry\Registry $state
         *
         * @return Sp4kAppsEventItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsEventItems::getInstance($state);
        }
        
        /**
         * @return \Joomla\Registry\Registry
         */
        protected function getState()
        {
            return Joomla\Registry\Registry::getInstance($this->_statekey);
        }
    }