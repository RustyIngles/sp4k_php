<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/4/2015
     * Time: 7:33 AM
     */


    class Sp4kModulesApiControllersParents extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $postdata = $jsonInput->getArray();
                $model = new Sp4kModulesParentModelsItem(
                    new Joomla\Registry\Registry($postdata)
                );

                //$model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false) !== false) {

                    $model = new Sp4kModulesParentModelsItem(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $response = $model->item;

                }else{
                    if($q = $this->input->get('q',false,'RAW')){
                        $stateVars = [
                            'limit' => $this->input->get('limit',false,'RAW'),
                            'paging'=> $this->input->getBool('paging',false),
                            'count' => $this->input->getBool('count',false),
                            'q'     => json_decode($q)
                        ];

                        $state  = new Joomla\Registry\Registry($stateVars);
                    }else{
                        $limit  = $this->input->get('limit',false,'RAW');
                        $filters = $this->input->get('filters',false,'RAW');
                        $paging = $this->input->getBool('paging',false);
                        $count = $this->input->getBool('count',false);
                        $limit = $limit?json_decode($limit):null;
                        $filters = $filters?json_decode($filters):null;
                        $state = new Joomla\Registry\Registry(['limit'=>$limit,'filters'=>$filters,'paging'=>$paging,'count'=>$count]);
                    }


                    $model = new Sp4kModulesParentModelsItems($state);

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
