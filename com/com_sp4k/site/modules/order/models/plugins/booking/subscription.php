<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/17/2015
     * Time: 4:06 PM
     */


    class Sp4kModulesOrderModelsPluginsBookingSubscription extends Sp4kBaseModel
    {
        protected $item;

        public function __construct($state, &$item)
        {
            $this->item = &$item;
            parent::__construct($state);
        }

        public function getInstance($state, &$item)
        {
            return new self($state, $item);
        }

        public function execute()
        {
            $app = Sp4kAppsChildApp::getInstance(
                new Registry(['id'=>$this->item->data['child_id']])
            );

            $child = $app->getItem();
            $this->item->child = $child;
        }
    }