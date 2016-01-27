<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kAppsCartPluginsItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsCartTrait;

        public function execute()
        {
            $this->load();
            $this->bind();
        }

        protected function load()
        {
            //the cart is in the session, or in state.

            //We start with getting the cart items, then enumerating them to get each cart item type, so we can process
            //it through its plugin.

            $this->event = $event = Sp4kAppsEventApp::getInstance(
                new Joomla\Registry\Registry(
                    ['id'=>$this->getState()->get('event_id')]
                )
            )->getItem();

            $this->venue = $venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id'=>$event->venue_id])
            )->getItem();

            //how to get venue modifiers?
            $this->product = Sp4kAppsProductApp::getInstance(
                ['id'=>$event->product_id]
            )->getItem();

            $this->datestart = $this->getState()->get('datestart');

            //get the rate based on the event venue and the product.
            $rate = Sp4kAppsCartPricingApp::getInstance(
                new Registry($this)
            )->process();

            $this->qty = $qty = count($this->getState()->get('children'));
            $this->lineTotal = $rate * $qty;

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            $this->getState()->loadArray(get_object_vars($this->_table),true);
        }

        protected function bind()
        {
            $stateProperties = $this->getState()->toArray();

            foreach( get_object_vars($this) as $index=>$property){//get the defined properties for this class.
                if(array_key_exists($index,$stateProperties)){//if the state contains an index of the same name
                    $this->$index = $stateProperties[$index];//assign its value to this instance.
                }
            }
        }
    }