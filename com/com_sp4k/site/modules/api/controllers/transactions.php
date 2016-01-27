<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/4/2015
     * Time: 7:33 AM
     */


    class Sp4kModulesApiControllersTransactions extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $model = new Sp4kModulesTransactionModelsItem(
                    new Joomla\Registry\Registry($jsonInput->getArray())
                );

                $model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false) !==false) {

                    $model = new Sp4kModulesTransactionModelsItem(
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

                    $model = new Sp4kModulesTransactionModelsItems(
                        new Joomla\Registry\Registry(['limit'=>$limit,'filters'=>$filters,'paging'=>$paging,'count'=>$count])
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
