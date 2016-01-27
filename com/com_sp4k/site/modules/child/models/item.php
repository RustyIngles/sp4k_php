<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesChildModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsChildItem */
        public $item;

        public function execute()
        {
            $app = new Sp4kAppsChildApp(
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