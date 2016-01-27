<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportControllersClasses extends JControllerBase
    {
        public function execute()
        {
            return false;
            $model = new Sp4kModulesImportModelsClasses();
            $model->import();
            $view = new Sp4kModulesImportViewsResultHtml($model);
            echo $view->render();
        }
    }