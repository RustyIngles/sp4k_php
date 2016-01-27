<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 4:09 PM
 */


    class Sp4kModulesRegistrationControllersAccountCreate extends JControllerBase
    {
        public function execute(){
            $dataRaw = str_replace('"','',urldecode($this->input->getRaw('data')));
            parse_str($dataRaw,$data);

            $model = new Sp4kModulesRegistrationModelsAccount(
                new Registry($data)
            );

            $view = new Sp4kModulesRegistrationViewsAccountJson($model);

            if($model->error){
                $view->setLayout('error');
            }

            echo $view->render();
        }
    }