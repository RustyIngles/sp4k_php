<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/16/2015
     * Time: 1:17 PM
     *
     */

    /**
     *
     * Class Sp4kModulesVenueControllersDisplay
     *
     * Proxy for Sp4kModulesVenueControllersItemsDisplay
     *
     */

    class Sp4kModulesVenueControllersListDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $itemsController =  new Sp4kModulesVenueControllersItemsDisplay();

            $itemsController->execute();
        }
    }