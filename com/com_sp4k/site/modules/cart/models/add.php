<?php
    use Joomla\Registry\Registry;

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

    class Sp4kModulesCartModelsAdd extends Sp4kBaseModel
    {
        public $error = false;

        public function execute()
        {
            if($this->state->get('children',false) && count($this->state->get('children',0)>1)){
                foreach($this->state->get('children') as $child_id){
                    $cartItemData['child_id'] = $child_id;
                    $cartItemData['start_date'] = $this->state->get('startdates.'.$child_id);
                    $cartItemData['dates'] = $this->state->get('dates.'.$child_id);
                    $cartItemData['product_id'] = $this->state->get('product_id',false);
                    $cartApp = Sp4kAppsCartApp::getInstance(new Registry($cartItemData));

                    /** @var Registry $cartItem */
                    $cartItem = new Registry($cartApp->getItem());
                    $cartItems[$cartItem->get('cart_key')] = $cartItem;
                }
            }else{
                $cartApp = Sp4kAppsCartApp::getInstance($this->state);
                $cartItem = $cartApp->getItem();
                $cartItems[$cartItem->cartkey] = $cartItem;
            }

            /** @var JSession $cartSession */
            $cartSession = JFactory::getSession();
            $cartSessionData = $cartSession->get('cart',[],'Sp4k');

            foreach($cartItems as $cartKey=>$cartItem){
                $cartSessionData['items'][$cartKey] = $cartItem->toObject();
            }

            //$cartItemData['totals'] = $this->getCartTotals($cart);

            $cartSession->set('cart',$cartSessionData,'Sp4k');
        }
    }
