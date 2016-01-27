<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/31/2015
     * Time: 1:51 PM
     */

    class Sp4kModulesRefactorControllersProducts extends JControllerBase
    {
        public function execute()
        {
            $model = new Sp4kModulesRefactorModelsProducts();
            $model->refactor();
        }
    }