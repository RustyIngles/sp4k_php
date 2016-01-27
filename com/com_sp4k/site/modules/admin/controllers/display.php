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

    class Sp4kModulesAdminControllersDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $adminView = new Sp4kModulesAdminViewsApplicationHtml(
                new Sp4kModulesVenueModelsAdmin(
                    new Joomla\Registry\Registry($this->input->getArray())
                )
            );
        }
    }