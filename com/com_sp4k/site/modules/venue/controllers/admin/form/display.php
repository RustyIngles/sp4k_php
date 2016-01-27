<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 7:38 PM
 */

    class Sp4kModulesVenueControllersAdminFormDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $request = $this->input->getArray();
            /** @var JModelBase $modelName */
            $modelName = 'Sp4kModulesVenueModelsVenue';


            $formatName = ucfirst($this->app->input->getCmd('format','html'));
            $viewName = 'Sp4kModulesVenueViewsAdmin'.$formatName;
            $viewLayoutName = 'form';

            $model = new $modelName(
                new Joomla\Registry\Registry($request)
            );
            /** @var JViewHtml $view */
            $view = new $viewName(
                $model
            );

            if($viewLayoutName !='')$view->setLayout($viewLayoutName);

            echo $view->render();
        }
    }