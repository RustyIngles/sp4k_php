<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kAppsCartItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsCartTrait;

        public $id;
        public $cart_key;
        public $event_id;
        public $child_id;
        public $product_id;
        public $product;

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


            $this->product = Sp4kAppsProductApp::getInstance(
                new Joomla\Registry\Registry(
                    ['id'=>$this->getState()->get('product_id')]
                )
            )->getItem();

            $config = $this->product->config;

            foreach(get_object_vars($config) as $index=>$configopt){
                $state = new Registry(['options'=>$configopt]);
                $state->merge($this->getState());

                $cartPluginClassName  =  'Sp4kAppsCartPlugins'.ucfirst($index).'Plg';
                if(class_exists($cartPluginClassName)){
                    $this->plugins[$index] = $cartPluginClassName::getInstance($state);
                }

            }
            //$this->plugins['summary'] = Sp4kAppsCartPluginsSummaryPlg::getInstance($this->getState());

            $this->cart_key = md5(
                $this->getState()->get('event_id').'.'.
                $this->getState()->get('product_id').'.'.
                $this->getState()->get('child_id')
            );

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            //$this->getState()->loadArray(get_object_vars($this->_table),true);
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