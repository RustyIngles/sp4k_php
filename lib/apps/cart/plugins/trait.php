<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    
    trait Sp4kAppsCartPluginsTrait
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
                    $this->_table = new Sp4kTablesBase('#__sp4k_cart_items','id');
        }
        
        public static function getInstance( Joomla\Registry\Registry $state = null)
        {
            return new self($state);
        }
        
        /**
         * @param \Joomla\Registry\Registry | null $state
         *
         * @return \Sp4kAppsCartItem
         *
         */
        public function getItemInstance( Joomla\Registry\Registry $state = null)
        {
            $item_type = $state->toObject()->item_type;
            $typeClass = 'Sp4kAppsCartPlugins'.ucfirst($item_type).'App';
            return $typeClass::getInstance($state)->getItem();

            //return Sp4kAppsCartPluginsItem::getInstance( $state );
        }
        
        /**
         * @param  Joomla\Registry\Registry $state
         *
         * @return Sp4kAppsCartItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsCartPluginsItems::getInstance($state);
        }
        
        /**
         * @return \Joomla\Registry\Registry
         */
        protected function getState()
        {
            return Joomla\Registry\Registry::getInstance($this->_statekey);
        }
    }