<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/12/2015
     * Time: 5:31 PM
     */

    class Sp4kModulesCartControllersAdd extends JControllerBase
    {
        public function execute()
        {
            parse_str(json_decode(urldecode($_REQUEST['formdata'])),$formdata);
            $model = new Sp4kModulesCartModelsAdd(
                new Registry( $formdata )
            );

            //$view = new Sp4kModulesRegistrationViewsCartJson($model);
            //echo $view->render();

            //$view = new Sp4kModulesRegistrationViewsCartHtml($model);
            //$view->setLayout('summary');
            //echo $view->render();

            $controller = new Sp4kModulesCartControllersDisplay();
            $controller->execute();
        }
    }

