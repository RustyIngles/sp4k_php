<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/5/2015
     * Time: 11:51 AM
     */


    class Sp4kModulesOrderModelsItems extends Sp4kBaseModel
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
                    'filters'=>$filters,
                    'joins'=>$this->state->get('joins',false)
                ]);

                /** @var Sp4kAppsRegistrationApp $registrationApp */
                $registrationApp = Sp4kAppsOrderApp::getInstance(
                    $appState
                );

                $appCollection = $registrationApp->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

            }else{

                $this->items = Sp4kAppsOrderApp::getInstance(
                    new Joomla\Registry\Registry($this->state->toObject())
                )->getItems();
            }

        }
    }