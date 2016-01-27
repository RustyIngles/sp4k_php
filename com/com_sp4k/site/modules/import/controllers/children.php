<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportControllersChildren extends JControllerBase
    {
        public function execute()
        {
            return false;

            $model = new Sp4kModulesImportModelsChildren(new Joomla\Registry\Registry($this->app->input->getArray()));

            $model->import();

            $view = new Sp4kModulesImportViewsResultHtml($model);

            if(!$model->continue){

                echo $view->render();

            }else{

                JFactory::getApplication()->redirect('index.php?option=com_sp4k&task=import.children&start='.$model->start);

            }

        }
    }