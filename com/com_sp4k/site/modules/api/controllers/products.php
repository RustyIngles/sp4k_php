<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/4/2015
     * Time: 7:33 AM
     */


    class Sp4kModulesApiControllersProducts extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $model = new Sp4kModulesProductModelsItem(
                    new Joomla\Registry\Registry($jsonInput->getArray())
                );

                $model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false) !==false) {

                    $model = new Sp4kModulesProductModelsItem(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $model->execute();
                    $model->item->config = $model->item->config;
                    $response = $model->item;

                }else{
                    $limit  = $this->input->get('limit',false,'RAW');
                    $filters = $this->input->get('filters',false,'RAW');
                    $limit = $limit?json_decode($limit):null;
                    $filters = $filters?json_decode($filters):null;
                    $paging = $this->input->getBool('paging',false);
                    $count = $this->input->getBool('count',false);
                    $nest = $this->input->getWord('nest',false);
                    $plugins = $this->input->getWord('plugins',false);

                    $model = new Sp4kModulesProductModelsItems(
                        new Joomla\Registry\Registry([
                                'limit'=>$limit,
                                'filters'=>$filters,
                                'paging'=>$paging,
                                'count'=>$count,
                                'nest'=>$nest,
                                'plugins'=>$plugins
                            ])
                    );

                    $response = $model->items;
                }

            }

            echo json_encode($response);
        }
    }
