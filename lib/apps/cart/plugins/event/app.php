<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/20/2015
 * Time: 7:50 PM
 */

    class Sp4kAppsCartPluginsEventApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsCartPluginsEventTrait;

        /** @var  Sp4kAppsCart */
        public $item;

        /** @var  Sp4kAppsCart */
        public $items;

        protected $_statekey = 'Sp4kAppsCartPluginsEventApp';

        public function getItem()
        {
            //the cart is in the session, or in state.

            //We start with getting the cart items, then enumerating them to get each cart item type, so we can process
            //it through its plugin.

            $cart = $this->getState()->toObject();

            $this->event = $event = Sp4kAppsEventApp::getInstance(
                new  Registry(
                    ['id'=>$this->getState()->get('event_id')]
                )
            )->getItem();

            $this->venue = $venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id'=>$event->venue_id])
            )->getItem();

            //how to get venue modifiers?
            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry(['id'=>$event->product_id])
            )->getItem();

            $this->datestart = $this->getState()->get('datestart');

            //get the rate based on the event venue and the product.
            //$rate = Sp4kAppsCartPricingApp::getInstance(
            //    new Registry($this)
            //)->process();

            //$this->qty = $qty = count($this->getState()->get('children'));
            //$this->lineTotal = $rate * $qty;

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            //$this->getState()->loadArray(get_object_vars($this->_table),true);
            return $this->item = $this->getItemInstance($this->getState());
        }
    }