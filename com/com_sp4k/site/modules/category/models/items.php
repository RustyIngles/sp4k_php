<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/5/2015
 * Time: 11:51 AM
 */


    class Sp4kModulesCategoryModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsCategoryApp */
        protected $categoryApp;

        /** @var  Sp4kAppsCategoryItem[] */
        public $items;

        protected function execute()
        {
            $this->categoryApp = new Sp4kAppsCategoryApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );

            $this->items = $this->categoryApp->getItems();
        }
    }