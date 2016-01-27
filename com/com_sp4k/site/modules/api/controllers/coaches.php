<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/4/2015
     * Time: 7:33 AM
     */


    class Sp4kModulesApiControllersCoaches extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $model = new Sp4kModulesCoachModelsItem(
                    new Joomla\Registry\Registry($jsonInput->getArray())
                );

                $model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false) !==false) {

                    $model = new Sp4kModulesCoachModelsItem(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $model->execute();
                    $response = $model->item;

                }else{

                    $limit  = $this->input->get('limit',false,'RAW');
                    $filters = $this->input->get('filters',false,'RAW');
                    $paging = $this->input->getBool('paging',false);
                    $count = $this->input->getBool('count',false);
                    $limit = $limit?json_decode($limit):null;
                    $filters = $filters?json_decode($filters):null;
                    $joins = false;

                    foreach($filters as $index=>$value){
                        if($value === 'any'){
                            unset($filters->$index);
                        }

                    }

                    if(isset($filters->driving)){
                        //$filters->driving = (int)$filters->driving; //cast to integer
                    }

                    if(isset($filters->doftw)){
                        foreach($filters->doftw as $doftw){
                            $filters->$doftw = 1;
                        }

                        unset($filters->doftw);
                    }

                    if(isset($filters->role)){

                        if(count($filters->role) > 0){
                            $roleFilter = [
                                'operator'=>' IN ',
                                'value'=>'('.implode(',',$filters->role).')'
                            ];

                            $filters->role = $roleFilter;
                        }else{
                            unset($filters->role);
                        }
                    }

                    $model = new Sp4kModulesCoachModelsItems(
                        new Joomla\Registry\Registry([
                            'limit'=>$limit,
                            'filters'=>$filters,
                            'paging'=>$paging,
                            'count'=>$count,
                            'joins'=>$joins
                        ])
                    );

                    if($count){

                        $response = [];
                        $response['items'] = $model->items;
                        $response['count'] = $model->count;

                    }else{

                        $response = $model->items;

                    }

                }

            }

            echo json_encode($response);
        }
    }
