<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/19/2015
 * Time: 2:46 PM
 */

    trait Sp4kAppsVenueTrait
    {
        /** @var  Sp4kTablesBase | Sp4kTablesNestedbase
        protected $_table = false; */

        protected $_key = 'id';
        protected $_table_alias = 'venue';





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
                    $this->_table = new Sp4kTablesBase('#__sp4k_venue_items','id', $this->_table_alias);
        }

        public static function getInstance( Joomla\Registry\Registry $state = null)
        {
            return new self($state);
        }

        /**
         * @param \Joomla\Registry\Registry | null $state
         *
         * @return \Sp4kAppsVenueItem
         *
         */
        public function getItemInstance( Joomla\Registry\Registry $state = null)
        {
            return Sp4kAppsVenueItem::getInstance( $state );
        }

        /**
         * @param  Joomla\Registry\Registry $state
         *
         * @return Sp4kAppsVenueItems
         */
        public function getItemsInstance( Joomla\Registry\Registry $state = NULL )
        {
            return Sp4kAppsVenueItems::getInstance($state);
        }

        /**
         * @return \Joomla\Registry\Registry
         */
        protected function getState()
        {
            return Joomla\Registry\Registry::getInstance($this->_statekey);
        }
    }