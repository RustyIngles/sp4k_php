<?php

    ini_set('DISPLAY_ERRORS',FALSE);
    use Joomla\Registry\Registry;

    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 9/29/2015
     * Time: 6:46 AM
     */

    class Sp4kModulesApiControllersPayments extends JControllerBase
    {

        public function execute(){
            if($this->input->getMethod() == 'POST'){

                $jsonInput = new JInputJSON();
                $postdata = $jsonInput->getArray();
                $model = new Sp4kModulesPaymentModelsApi(
                    new Registry($postdata)
                );

                //$model->execute();//initialize the model with the data we've injected
                $model->update();
                $response = $model->item;

            }elseif($this->input->getMethod() == 'GET'){

                if($this->input->get('id',false)) {

                    $model = new Sp4kModulesPaymentModelsApi(
                        new Registry($this->input->getArray())
                    );

                    $response = $model->item;

                }else{

                    $model = new Sp4kModulesPaymentModelsApi(
                        new Registry($this->input->getArray())
                    );

                    $response = $model->getItems();
                }

            }

            echo json_encode($response);
        }
    }
