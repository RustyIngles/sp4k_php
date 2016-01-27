<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 10:28 AM
     */

    class Sp4kModulesCartControllersResultDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute(){
            $model = new Sp4kModulesCartModelsResultDisplay(
                new Registry()
            );

            $view = new Sp4kModulesCartViewsResultHtml($model);

            echo $view->render();
        }
    }

