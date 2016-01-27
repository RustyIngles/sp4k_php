<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/4/2015
 * Time: 7:33 AM
 */


    class Sp4kModulesApiControllersVenues extends JControllerBase
    {
        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $model = new Sp4kModulesVenueModelsItem(
                    new Joomla\Registry\Registry($jsonInput->getArray())
                );

                $model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false) !==false) {

                    $model = new Sp4kModulesVenueModelsItem(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $model->execute();
                    $response = $model->item;

                }else{

                    $model = new Sp4kModulesVenueModelsItems(
                        new Joomla\Registry\Registry($this->input->getArray())
                    );

                    $response = $model->items;
                }

            }

            echo json_encode($response);
        }
    }
