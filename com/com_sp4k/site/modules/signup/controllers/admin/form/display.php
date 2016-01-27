<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/16/2015
     * Time: 7:38 PM
     */

    class Sp4kModulesProductControllersAdminFormDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $request = $this->input->getArray();



            $modelName = 'Sp4kModulesProductModelsProduct';
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