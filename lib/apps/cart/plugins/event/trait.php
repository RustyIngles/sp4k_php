<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 2:46 PM
     */
    use Joomla\Registry\Registry;
    trait Sp4kAppsCartPluginsEventTrait
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
            //figure out what kind of item first.

            $this->event = $event = Sp4kAppsEventApp::getInstance(
                new Joomla\Registry\Registry(
                    ['id'=>$this->getState()->get('event_id')]
                )
            )->getItem();

            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry(['id'=>$event->product_id])
            )->getItem();
            $pricing_type = json_decode($this->product->config)->booking->type;
            $cartPluginsEventPricingItemClassName = 'Sp4kAppsCartPluginsEventPlugins'.ucfirst($pricing_type);
            return new $cartPluginsEventPricingItemClassName( $state );
        }
        
        /**
         * @param  Joomla\Registry\Registry $state
         *
         * @return Sp4kAppsCartItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsCartPluginsEventItems::getInstance($state);
        }
        
        /**
         * @return \Joomla\Registry\Registry
         */
        protected function getState()
        {
            return Joomla\Registry\Registry::getInstance($this->_statekey);
        }
    }