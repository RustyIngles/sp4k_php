<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportControllersParents extends JControllerBase
    {
        public function execute()
        {
            return false;
            $model = new Sp4kModulesImportModelsParents(
                new Joomla\Registry\Registry($this->app->input->getArray())
            );

            $model->import();
            $view = new Sp4kModulesImportViewsResultHtml($model);

            if(!$model->continue){

                echo $view->render();

            }else{

                JFactory::getApplication()->redirect('index.php?option=com_sp4k&task=import.parents&start='.$model->start);

            }
        }
    }