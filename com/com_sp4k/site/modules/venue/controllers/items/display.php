<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class Sp4kModulesVenueControllersItemsDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {
        /** @var JModelBase $modelName */
        $modelName = 'Sp4kModulesVenueModelsVenue';

        $viewFormatName = ucfirst($this->app->input->getCmd('format','html'));
        $viewName = 'Sp4kModulesVenueViewsItems'.$viewFormatName;

        /** @var JViewHtml $view */
        $view = new $viewName(
            new $modelName(
                new Joomla\Registry\Registry(
                    $this->app->input->getArray()
                )
            )
        );

        echo $view->render();
    }
}