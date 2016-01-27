<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportControllersRegistrations extends JControllerBase
    {
        public function execute()
        {
            return false;
            $model = new Sp4kModulesImportModelsRegistrations(
                new Joomla\Registry\Registry($this->app->input->getArray())
            );
            $model->import();

            if(!$model->continue){
                $view = new Sp4kModulesImportViewsResultHtml($model);
                echo $view->render();
            }else{
                JFactory::getApplication()->redirect('index.php?option=com_sp4k&task=import.registrations&start='.$model->start);
            }
        }
    }