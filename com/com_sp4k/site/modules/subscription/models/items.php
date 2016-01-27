<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/5/2015
     * Time: 11:51 AM
     */


    class Sp4kModulesSubscriptionModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsSubscriptionItems[] */
        public $items;
        public $product;
        public $child;

        protected function execute()
        {
            if($this->state->get('paging',false)){


                $limit = $this->state->get('limit');
                $filters = $this->state->get('filters');
                $count = $this->state->get('count',false);


                $appState = new Joomla\Registry\Registry([
                    'limit'=>$limit,
                    'count'=>$count,
                    'filters'=>$filters
                ]);

                /** @var Sp4kAppsSubscriptionApp $registrationApp */
                $app = Sp4kAppsSubscriptionApp::getInstance(
                    $appState
                );

                $appCollection = $app->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

                foreach($this->items as $item) {
                    $item->child = Sp4kAppsChildApp::getInstance(
                        new Registry(['id'=>$item->child_id])
                    )->getItem();

                    $item->product = Sp4kAppsProductApp::getInstance(
                        new Registry(['id'=>$item->product_id,'plugins'=>false])
                    )->getItem();
                }
            }else{

                $this->items = Sp4kAppsSubscriptionApp::getInstance(
                    new Joomla\Registry\Registry($this->state->toObject())
                )->getItems();
            }

        }
    }