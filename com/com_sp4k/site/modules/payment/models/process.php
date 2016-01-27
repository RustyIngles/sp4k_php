<?php
    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 11:55 AM
     */

    class Sp4kModulesPaymentModelsProcess extends Sp4kBaseModel
    {
        public $error = false;

        public function execute(){

            $cartSession = JFactory::getSession();
            $cart = ($cart = $cartSession->get('sp4k_cart')) ? $cart : [];
            $cartTotal = 0;

            if(count($cart) > 0){
                //foreach cart item build the line item for display;
                $cartApp = Sp4kAppsCartApp::getInstance(new Registry($cart));
                $cart_items = $cartApp->getItems();
                foreach($cart_items as $item){
                    $cartTotal += $item->total;
                }
            }

            $orderData = new stdClass();
            $orderData->total = 0;
            $orderData->created = time();
            $orderData->createdby = JFactory::getUser()->id;

            foreach($cart_items as $type=>$cart_item){
                $orderItem = new stdClass();
                $orderItem->type = $type;
                $orderItem->mainline = $cart_item->mainline;
                $orderItem->sublines  = $cart_item->sublines;
                $orderItem->total = $cart_item->total;
                $orderData->total += $orderItem->total;
                $orderData->cart[$type][] = $orderItem;
            }

            $orderData->cart = json_encode($orderData->cart);

            $order = Sp4kAppsOrderApp::getInstance(
                new Registry( $orderData )
            )->getItem()->update();

            $this->state->set('order_id',$order->id);
            $paymentData = new stdClass();
            $paymentData->amount = $cartTotal;

            /** @var Sp4kAppsPaymentItem $payment */
            $payment = Sp4kAppsPaymentApp::getInstance(
                new Registry($this->state->toObject())
            )->getItem()->charge();

            if($this->error = $payment->getError()){
                $order->status = 0;
            }else{
                $order->status = '1';
                $order->payment_id = $payment->id;

            }
            $order->update();
            return $this;
        }
    }