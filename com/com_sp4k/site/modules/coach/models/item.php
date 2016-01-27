<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesCoachModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsParentItem */
        public $item;

        public function execute()
        {
            $app = new Sp4kAppsCoachApp(
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