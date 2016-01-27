<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/18/2015
     * Time: 3:03 PM
     */

    class Sp4kModulesRollcallControllersDisplay extends JControllerBase
    {
        public function execute(){
            $model = new Sp4kModulesRollcallModelsDisplay();

            $view = new Sp4kModulesRollcallViewsDisplayHtml($model);
            echo $view->render();
        }


    }