<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesChildModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsChildItems[] */
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

                /** @var Sp4kAppsSubscriptionApp $registrationApp */
                $app = Sp4kAppsChildApp::getInstance(
                    $appState
                );

                $appCollection = $app->getCollection();

                $this->count = $appCollection->count;

                $this->items = $appCollection->items;

                foreach($this->items as &$item) {
                    $item->children = Sp4kAppsChildApp::getInstance(
                        new Joomla\Registry\Registry(['filters'=>['account_id'=>$item->account_id]])
                    )->getItems();
                }
            }elseif($q = $this->state->get('q',false)) {
                $limit = $this->state->get('limit',[0,5],'ARRAY');
                $count = $this->state->get('count',false);

                if(isset($q->name)){
                    $filters = [
                        "child.name"=>
                            [
                                'operator'=>'LIKE',
                                'value'=>'%'.$q->name.'%',
                                'skipfieldquote'=>true
                            ]
                    ];
                }

                $appState = new Joomla\Registry\Registry([
                    'limit'=>$limit,
                    'count'=>$count,
                    'filters'=>$filters
                ]);

                $this->items = Sp4kAppsChildApp::getInstance($appState)->getItems();

            }else{
                $state = new Joomla\Registry\Registry($this->state->toObject());
                $this->items = Sp4kAppsChildApp::getInstance($state)->getItems();
            }
        }

        public function save(){
            $this->items->update();
        }

        public function delete(){
            $this->items->delete();
        }
    }