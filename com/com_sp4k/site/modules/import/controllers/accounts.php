<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportControllersAccounts extends JControllerBase
    {
        public function execute()
        {
            return false;

            $model = new Sp4kModulesImportModelsAccounts();

            $model->import();

            $view = new Sp4kModulesImportViewsResultHtml($model);

            echo $view->render();
        }
    }