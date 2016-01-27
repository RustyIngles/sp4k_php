<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/4/2015
     * Time: 7:33 AM
     */


    class Sp4kModulesApiControllersEvents extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $postdata = $jsonInput->getArray();
                $model = new Sp4kModulesEventModelsItem(
                    new Joomla\Registry\Registry($postdata)
                );

                //$model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false)) {

                    $model = new Sp4kModulesEventModelsItem(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $response = $model->item;

                }else{

                    $model = new Sp4kModulesEventModelsItems(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $response = $model->items;
                }

            }

            echo json_encode($response);
        }
    }
