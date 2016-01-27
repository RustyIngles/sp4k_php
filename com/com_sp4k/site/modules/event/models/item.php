<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/16/2015
     * Time: 5:54 PM
     */

    class Sp4kModulesEventModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsEventItem */
        public $item;

        public function execute()
        {
            $app = new Sp4kAppsEventApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );
            $this->item = $app->getItem();
        }

        public function update()
        {
            $this->item->update();
        }

        public function delete()
        {
            $this->item->delete();
        }
    }