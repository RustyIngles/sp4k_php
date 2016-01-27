<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/5/2015
     * Time: 11:51 AM
     */


    class Sp4kModulesTransactionModelsItems extends Sp4kBaseModel
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

                /** @var Sp4kAppsTransactionApp $registrationApp */
                $app = Sp4kAppsTransactionApp::getInstance(
                    $appState
                );

                $appCollection = $app->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

            }else{

                $this->items = Sp4kAppsTransactionApp::getInstance(
                    new Joomla\Registry\Registry($this->state->toObject())
                )->getItems();
            }

        }
    }