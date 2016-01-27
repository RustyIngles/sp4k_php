<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesCoachModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsParentItems */
        public $items;

        protected function execute()
        {
            if($this->state->get('paging',false)) {


                $limit = $this->state->get('limit');
                $filters = $this->state->get('filters');
                $count = $this->state->get('count', false);


                $appState = new Joomla\Registry\Registry([
                    'limit'=>$limit,
                    'count'=>$count,
                    'filters'=>$filters
                ]);

                /** @var Sp4kAppsCoachApp $registrationApp */
                $app = Sp4kAppsCoachApp::getInstance(
                    $appState
                );

                $appCollection = $app->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;
            }else{

                $this->items = Sp4kAppsCoachApp::getInstance(
                    new Joomla\Registry\Registry($this->state->toObject())
                )->getItems();
            }
        }

        public function save(){
            $this->items->update();
        }

        public function delete(){
            $this->items->delete();
        }
    }