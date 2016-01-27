<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class  Sp4kModulesRegistrationControllersVenueDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {
        $request = $this->input->getArray();
        /** @var JModelBase $modelName */
        $modelName = 'Sp4kModulesRegistrationModelsVenue';

        $formatName = ucfirst($this->app->input->getCmd('format','html'));
        $viewName = 'Sp4kModulesRegistrationViewsVenue'.$formatName;
        //$viewLayoutName = 'form';

        $model = new $modelName(
            new Joomla\Registry\Registry($request)
        );
        /** @var JViewHtml $view */
        $view = new $viewName(
            $model
        );

        $view->setLayout('default');

        echo $view->render();
    }
}