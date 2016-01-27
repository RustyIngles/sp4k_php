<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/16/2015
     * Time: 5:54 PM
     */

    class Sp4kModulesEventModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsEventItems[] */
        public $items;

        protected function execute()
        {
            $app = new Sp4kAppsEventApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );

            $this->items = $app->getItems();
        }

        public function batch()
        {

        }

        public function save(){
            $this->items->update();
        }

        public function delete(){
            $this->items->delete();
        }
    }