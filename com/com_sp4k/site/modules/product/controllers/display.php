<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class Sp4kModulesProductControllersDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {

        //they are logged in. Now we need to know which of their children are attending, and give them the chance
        // to add more to the system.

        $model = new Sp4kModulesProductModelsDisplay(
            new  Registry($this->input->getArray())
        );

        $view = new Sp4kModulesProductViewsProductHtml($model);

        echo $view->render();
    }
}