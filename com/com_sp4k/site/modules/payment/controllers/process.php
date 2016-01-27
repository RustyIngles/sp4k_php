<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 11:55 AM
     */

     class Sp4kModulesPaymentControllersProcess extends Sp4kBaseControllerDisplay{
         public function execute(){

             $model = new Sp4kModulesPaymentModelsProcess(
                 new Registry($this->input->getArray())
             );

             $view = new Sp4kModulesPaymentViewsProcessJson($model);

             echo $view->render();
         }
     }