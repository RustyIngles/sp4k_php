<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class Sp4kModulesCatalogControllersEventsDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {

        $model = new Sp4kModulesCatalogModelsEvents(
            new Joomla\Registry\Registry($this->input->getArray())
        );

        $view = new Sp4kModulesCatalogViewsEventsHtml($model);
        echo $view->render();
    }
}