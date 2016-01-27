<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/19/2015
     * Time: 3:03 PM
     */

    interface Sp4kAppsInterfacesItems
    {
        /**
         *
         * @return Sp4kAppsAbstractItem
         *
         */
        public function getItemInstance();

        /**
         *
         * @return Sp4kAppsAbstractItems
         *
         */
        public function getItemsInstance();


        /**
         *
         * @return Sp4kTablesBase
         *
         */
        public function getTable();
    }
