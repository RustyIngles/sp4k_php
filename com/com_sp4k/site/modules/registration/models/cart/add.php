<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

    class Sp4kModulesRegistrationModelsCartAdd extends Sp4kBaseModel
    {
        public $error = false;

        public function execute()
        {

            //foreach children as child_id
                //children[child_id][startdate] = startdate[child_id];
            $newCartState = $this->state->toObject();

            $cartSession = JFactory::getSession();
            $cart = ($cart = $cartSession->get('sp4k_cart')) ? $cart : [];

            if(count($cart)>0) {
                foreach($cart as $item_type=>&$type_items){
                    if($newCartState->item_type == $item_type){
                        if(array_key_exists($newCartState->{$newCartState->item_identifier},$type_items)){
                            $test='test';
                            $type_items[$newCartState->{$newCartState->item_identifier}] = $newCartState;
                        }
                    }
                }
            }else{
                $cart[$newCartState->item_type][$newCartState->{$newCartState->item_identifier}]
                    = $newCartState;
            }

            $cartSession->set('sp4k_cart',$cart);

            /**
             * todo
             * set a cart item type, then use a class to process that cart item for display.
             * also use that class to process new additions to the cart, so it can intelligently merge new items.
             *
             */
        }
    }
