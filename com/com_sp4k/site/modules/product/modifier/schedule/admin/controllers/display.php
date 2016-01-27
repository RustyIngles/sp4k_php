<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */

    /**
     * If the product is a one day event, the schduling options is not available.
     *
     *
     *
     */

class Sp4kModulesProductModifierScheduleAdminControllersDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {
        $request = $this->input->getArray();

        $modelName = 'Sp4kModulesProductModifierScheduleAdminModelsSchedule';
        $model = new $modelName(
            new Joomla\Registry\Registry($request)
        );

        $formatName = ucfirst($this->app->input->getCmd('format','html'));
        $viewName = 'Sp4kModulesProductViewsAdmin'.$formatName;

        /** @var JViewHtml $view */
        $view = new $viewName(
            $model
        );

        $view->setLayout('form');

        echo $view->render();
    }
}