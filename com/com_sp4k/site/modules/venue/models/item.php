<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/5/2015
 * Time: 10:35 AM
 */


    class Sp4kModulesVenueModelsItem extends JModelBase
    {
        /** @var  Sp4kAppsVenueItem */
        public $item;

        public function execute()
        {
            $app = new Sp4kAppsVenueApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );

            $this->item = $app->getItem();
        }

        public function update(){
            $this->item->update();
        }
    }