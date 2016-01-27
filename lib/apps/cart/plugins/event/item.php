<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kAppsCartPluginsEventItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsCartTrait;

        public $id;
        public $event_id;
        public $child_id;
        public $product_id;

        public function execute()
        {
            //$this->load();
            //$this->bind();
        }

        protected function load()
        {
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
                new Registry(['id'=>$event->product_id])
            )->getItem();
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