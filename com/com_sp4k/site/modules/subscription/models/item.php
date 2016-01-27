<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/7/2015
     * Time: 7:36 AM
     */

    class Sp4kModulesSubscriptionModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsSubscriptionItem */
        public $item;

        public function execute()
        {
            $this->item = Sp4kAppsSubscriptionApp::getInsance(
                new Joomla\Registry\Registry($this->state->toObject())
            )->getItem();
        }

        public function update(){
            $this->item->update();
        }
    }