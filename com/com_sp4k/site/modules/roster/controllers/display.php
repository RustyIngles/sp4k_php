<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/18/2015
     * Time: 3:03 PM
     */

    class Sp4kModulesRosterControllersDisplay extends JControllerBase
    {
        public function execute(){
            $model = new Sp4kModulesRosterModelsDisplay();

            $view = new Sp4kModulesRosterViewsDisplayHtml($model);
            echo $view->render();
        }
    }