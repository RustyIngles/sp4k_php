<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/5/2015
     * Time: 11:51 AM
     */


    class Sp4kModulesRegistrationModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsRegistrationItems[] */
        public $items;

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

                /** @var Sp4kAppsRegistrationApp $registrationApp */
                $registrationApp = Sp4kAppsRegistrationApp::getInstance(
                    $appState
                );

                $appCollection = $registrationApp->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

                foreach($this->items as $item) {
                    $item->child_name = Sp4kAppsChildApp::getInstance(
                        new Registry(['id'=>$item->child_id])
                    )->getItem()->name;

                    $item->product_name = Sp4kAppsProductApp::getInstance(
                        new Registry(['id'=>$item->product_id,'plugins'=>false])
                    )->getItem()->title;
                }
            }else{

                $this->items = Sp4kAppsRegistrationApp::getInstance(
                    new Joomla\Registry\Registry($this->state->toObject())
                )->getItems();
            }

        }
    }