<?php


/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/10/2015
 * Time: 5:26 PM
 */

    class Sp4kModulesCatalogModelsEvents extends Sp4kBaseModel
    {
        public function execute(){
            $filters = new stdClass();

            if($product_id = $this->state->get('product_id',false)){
                $filters->product_id = $product_id;
            }

            if($venue_id = $this->state->get('venue_id',false)){
                $filters->venue_id = $venue_id;
            }

            if($category_id = $this->state->get('vategory_id',false)){
                $filters->category_id = $category_id;
            }

            $model = new Sp4kModulesEventModelsItems(
                new Joomla\Registry\Registry(['filters'=>$filters])
            );

            $this->items = $model->items;


            foreach($this->items as &$event){
                $productApp = new Sp4kAppsProductApp(
                    new Joomla\Registry\Registry(['id'=>$event->product_id])
                );

                $venueApp = new Sp4kAppsVenueApp(
                    new Joomla\Registry\Registry(['id'=>$event->venue_id])
                );

                $event->product_title = $productApp->getItem()->title;
                $event->venue_title = $venueApp->getItem()->title;

            }
        }
    }