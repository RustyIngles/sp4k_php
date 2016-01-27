<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/5/2015
 * Time: 10:35 AM
 */


    class Sp4kModulesCategoryModelsItem extends JModelBase
    {
        public $item;

        public function execute()
        {
            $categoryApp = new Sp4kAppsCategoryApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );
            $this->item = $categoryApp->getItem();
        }

        public function update(){
            $this->item->update();
        }
    }