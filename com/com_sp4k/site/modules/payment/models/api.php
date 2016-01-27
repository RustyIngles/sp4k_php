<?php
    error_reporting(0);
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 9/29/2015
     * Time: 6:48 AM
     */

    class Sp4kModulesPaymentModelsApi extends Sp4kBaseModel
    {
        public $item;
        public $items;

        public function execute(){
            $this->items = function(){
                return $this->getItems();
            };

            $this->items = function() {
                return $this->getItem();
            };
        }

        private function getItem(){
            return Sp4kAppsPaymentApp::getInstance(
                new Registry( ['id'=>$this->input->get('id')] )
            )->getItem();
        }

        public function getItems(){

            /** @var Sp4kAppsPaymentApp $app */
            $app = Sp4kAppsPaymentApp::getInstance(
                new Registry( $this->state->toObject())
            );
            return $app->getItems();
        }
    }