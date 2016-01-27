<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/7/2015
     * Time: 7:36 AM
     */

    class Sp4kModulesRegistrationModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsRegistrationItem */
        public $item;

        public function execute()
        {
            $this->item = Sp4kAppsRegistrationApp::getInstance(
                new Joomla\Registry\Registry($this->state->toObject())
            )->getItem();
        }

        public function update(){
            $this->item->update();
        }
    }