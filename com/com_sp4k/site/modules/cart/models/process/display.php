<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 10:26 AM
     */

    class Sp4kModulesCartModelsProcessDisplay extends Sp4kBaseModel
    {
        private $order;
        private $invoice;
        private $contracts;
        private $payment;
        private $transaction;

        public function execute()
        {
            $cartSession = JFactory::getSession();
            $this->cart = ($cart = $cartSession->get('cart', [], 'Sp4k')) ? $cart : [];

            $this->createOrder();

            $this->createInvoice();

            if($this->order->payment->recurring == 'enabled'){
                $this->createContract();
            }

            if($this->order->booking->type == 'subscription'){
                $this->createSubscription();
            }

            $this->createPayment();

            $this->processPayment();

            $this->createTransaction();

        }

        private function createOrder()
        {
            $this->order = Sp4kAppsOrderApp::getInstance(
                new Registry($this->cart)
            )->getItem()->update();
        }

        private function createInvoice()
        {
            $invoiceData = new Registry([
                'order_id'=>$this->order->id,
                'amount'=>$this->order->paynow
            ]);

            $this->invoice = Sp4kAppsInvoiceApp::getInstance($invoiceData)->getItem()->update();
        }

        /**
         * create contracts for billable items, one for each recurring product in the order.
         */

        private function createContract()
        {
            $contractData = new Registry(
                [
                    'order_id'=>$this->order->id,
                    'product_id'=>$this->order->product_id,
                    'payment_method'=>$this->order->config->payment->method
                ]
            );

            $this->contracts[] = Sp4kAppsContractApp::getInstance($contractData)->getItems()->update();
        }

        private function createSubscription()
        {
            foreach($this->order->items as $item){
                if($item->booking->type == 'subscription'){
                    $subscriptionData = new Registry([
                        'product_id'=>$item->product_id,
                        'event_id'=>$item->event_id,
                        'start_date'=>$item->start_date
                    ]);

                    $this->subscriptions[] = Sp4kAppsSubscriptionApp::getInstance($subscriptionData)->getItem()->update();
                }
            }
        }

        //due_now amount, invoice_id, payment_method
        private function createPayment()
        {
            $paymentData =  new Registry(
                [
                    'invoice_id'=>$this->invoice->id,
                    'method'=>$this->payment_method,
                    'amount'=>$this->order->due_now
                ]
            );

            $this->payment = Sp4kAppsPaymentApp::getInstance($paymentData)->getItem();
        }

        /**
         * Use the payment method to process the payment
         */
        private function processPayment()
        {

        }

        //payment_id,
        private function createTransaction()
        {
            $transactionData = new Registry(
                [
                    'payment_id'=>$this->payment->id,
                    'ref_id'=>$this->ref_id
                ]
            );

            $this->transaction = Sp4kAppsTransactionsApp::getInstance($transactionData)->getItem();
        }

    }