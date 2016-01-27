<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 4:52 PM
 */


    class Sp4kModulesVenueControllersAdminDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $itemsController = new Sp4kModulesVenueControllersAdminItemsDisplay();
            $itemsController->execute();
        }
    }