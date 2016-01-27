<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class Sp4kModulesCatalogControllersDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {

        $model = new Sp4kModulesCatalogModelsCatalog(
            new Joomla\Registry\Registry($this->input->getArray())
        );

        $view = new Sp4kModulesCatalogViewsCatalog($model);
        echo $view->render();
    }
}