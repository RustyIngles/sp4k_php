<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/10/2015
 * Time: 3:52 PM
 */

    class Sp4kModulesCatalogModelsCatalog extends Sp4kBaseModel
    {
        //SHOW=PRODUCT(s)
        //SHOW=VENUE(s)
        //SHOW=CATEGORY(s)
        //SHOW=EVENTS

        //PRODUCT=
        //VENUE=
        //CATEGORY=

        //FOR=PRODUCT -- get show items for a specific product
        //FOR=CATEGORY -- get SHOW items for specific category
        //FOR=VENUE -- get SHOW items for a specific venue

        public function execute()
        {
            $filters = new stdClass();
            if($venue_id = $this->state->get('venue_id',false)){
                $filters->venue_id = $venue_id;
            }

            if($product_id = $this->state->get('product_id',false)){

            }

            if($category_id = $this->state->get('category_id',false)){

            }

            $layout = $this->state->get('show');
        }


        /**
         *
         * Show the products for a category
         *
         */

        private function showCategory(){

        }


        /**
         *
         * Show the products in category for a venu
         *
         */
        private function showVenueCategorProducts(){

        }

    }