<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesAccountModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsAccountItems */
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

                /** @var Sp4kAppsAccountApp $registrationApp */
                $app = Sp4kAppsAccountApp::getInstance(
                    $appState
                );

                $appCollection = $app->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

                foreach($this->items as &$item){
                    $item->parents = Sp4kAppsParentApp::getInstance(
                        new Registry([
                            'filters'=>['account_id'=>$item->id],
                            'keys'=>false
                        ])
                    )->getItems();
                }

            }else{

                $this->items = Sp4kAppsAccountApp::getInstance(
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