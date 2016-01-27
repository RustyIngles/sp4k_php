<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 10:28 AM
     */

    class Sp4kModulesCartControllersCheckoutDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute(){
            $model = new Sp4kModulesCartModelsCheckoutDisplay(
                new Registry($this->input->getArray())
            );

            $view = new Sp4kModulesCartViewsCheckoutHtml($model);

            echo $view->render();
        }
    }

