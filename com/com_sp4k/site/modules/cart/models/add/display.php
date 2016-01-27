<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 7:34 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kModulesCartModelsAddDisplay extends Sp4kBaseModel
    {
        private $type;
        public $cartPluginModels;
        public $event_id;
        public $product_id;


        /**
         * Accessor function to allow chaining
         *
         * @param Joomla\Registry\Registry $state
         *
         * @return Sp4kModulesCartModelsAddDisplay
         */
        public static function getInstance($state)
        {
            return new self($state);
        }

        public function execute()
        {
            $this->setProduct();

            if($this->product->config->display == 'children'){
                //if venue_id is set, we are showing child products for that venue
                if($this->state->get('venue_id',false)){
                    $this->setVenueItems();
                }else{
                    $this->setVenues();
                }
            }
        }

        private function setProduct(){
            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry([
                    'id'=>$this->state->get('id')
                ])
            )->getItem();

            $this->layout = 'default';

            return $this;
        }

        /**
         * Show venues for the selected parent product.
         */
        private function setVenues(){

            $products = Sp4kAppsProductApp::getInstance(
                new Registry(['filters'=>['parent_id'=>$this->state->get('id')]])
            )->getItems();

            foreach($products as $product){
                //build array of unique venue ids
                $venues[$product->venue_id] = $product->venue_id;
            }

            $this->venues = Sp4kAppsVenueApp::getInstance(
                new Registry(
                    ['keys'=>$venues]
                )
            )->getItems();

            $this->layout = 'venues';
        }

        /**
         * Show the child products for the selected venue
         */
        private function setVenueItems(){
            $this->products = Sp4kAppsProductApp::getInstance(
                new Registry(
                    [
                        'filters'=>[
                            'parent_id'=>(int)$this->state->get('id'),
                            'venue_id'=>(int)$this->state->get('venue_id')
                        ]
                    ]
                )
            )->getItems();

            $this->layout = 'children';
        }


    }

