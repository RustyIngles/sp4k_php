<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/19/2015
 * Time: 3:19 PM
 */

    interface Sp4kAppsInterfacesApp
    {


        /**         *
         * @return Sp4kAppsAbstractItem
         */
        public function getItemInstance();

        /**
         * @return Sp4kAppsAbstractItems
         */
        public function getItemsInstance();
    }