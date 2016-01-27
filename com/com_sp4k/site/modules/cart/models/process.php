<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/28/2015
     * Time: 10:26 AM
     */

    class Sp4kModulesCartModelsProcess extends Sp4kBaseModel
    {
        private $account;
        private $parent;
        private $order;
        private $invoice;
        private $subscriptions;
        private $contracts;
        private $registrations;

        /** @var  Sp4kAppsPaymentItem */
        private $payment;
        private $transaction;
        private $process_payment_result = false;


        public function execute()
        {
            $this->state->set('contract_payment_method','bank');
            $this->state->set('payment_method','card');

            $cartSession = JFactory::getSession();
            $this->cart = ($cart = $cartSession->get('cart', [], 'Sp4k')) ? $cart : [];

            $this->setParent();

            $this->setAccount();

            $this->createOrder();

            $this->createInvoice();

            /**
             * Test for invoice balance and attempt to access enabled payment methods to satisfy balances.
             */
            $this->createPayment();

            /**
             * This should run under createPayment.
             */
            //$this->processPayment();

            /**
             * This should run under processPayment on process payment success.
             */
            //$this->createTransaction();

            /**
             * Parse the cart items for booking enabled and create subscriptions.
             */
            $this->processSubscriptions();

            /**
             * Parse $this subscriptions and create contracts using valid recurring payment methods,
             * in this case only ezcollect, but for each of the subscriptions created, on this object, create
             * a contract index between the subscript and the recurring payment provider described in payment details.
             */
            //$this->createContracts();


            /**
             * Parse $this->subscriptions and for each with 'registration enable' create registrations;
             */
            $this->processRegistrations();

            $this->processNotifications();
        }



        private function setParent()
        {
            $this->parent = Sp4kAppsParentApp::getInstance(
                new Registry([
                    'filters'=>[
                        'juser_id'=>JFactory::getUser()->id
                    ]
                ])
            )->getItems()[0];
        }

        private function setAccount(){
            $this->account = Sp4kAppsAccountApp::getInstance(
                new Registry(['id'=>$this->parent->account_id])
            )->getItem();
        }

        private function createOrder()
        {
            foreach($this->cart['items'] as &$cartItem){
                $cartItem->data = [
                    'product_id'    => $cartItem->product->id,
                    'child_id'      => $cartItem->child_id,
                    'date_start'    => $cartItem->plugins->booking->date_start,
                    'date_end'      => $cartItem->plugins->booking->date_end
                ];
            }

            $this->order = Sp4kAppsOrderApp::getInstance(
                new Registry([
                    'account_id'=>$this->account->id,
                    'items'=>$this->cart['items'],
                    'total'=>$this->cart['totals']['cost_now']
                ])
            )->getItem()->update();
        }

        private function createInvoice()
        {
            $invoiceData = new Registry([
                'order_id'=>$this->order->id,
                'total'=>$this->order->total
            ]);

            $this->invoice = Sp4kAppsInvoiceApp::getInstance($invoiceData)->getItem()->update();
        }

        //due_now amount, invoice_id, payment_method
        private function createPayment()
        {
            $paymentData =  new Registry(
                [
                    'invoice_id'=>$this->invoice->id,
                    'method'=>$this->state->get('payment_method'),
                    'amount'=>$this->order->total,
                    'status'=>'pending',
                    'customer_payment_information'=>$this->order->paymentinfos
                ]
            );

            /** @var Sp4kAppsPaymentItem payment */
            $this->payment = Sp4kAppsPaymentApp::getInstance($paymentData)->getItem();
            $this->process_payment_result = $this->payment->charge();
            //$this->ref_id = time();
        }



        //payment_id,
        private function createTransaction()
        {
            if($this->process_payment_result){
                $transactionData = new Registry(
                    [
                        'payment_id'=>$this->payment->id,
                        'ref_id'=>$this->ref_id
                    ]
                );

                $this->transaction = Sp4kAppsTransactionApp::getInstance($transactionData)->getItem();
            }
        }

        private function processSubscriptions()
        {
            foreach($this->cart['items'] as $item) {
                if ($item->product->config->payment->recurring->enabled) {

                    $subscriptionData = new Registry([
                        'order_id'=>$this->order->id,
                        'product_id'=>$item->product_id,
                        'start_date'=>$item->plugins->booking->date_start,
                        'end_date'=>$item->plugins->booking->date_end,
                        'billing'=>$item->plugins->payment->processor = 'bank',
                        'billing_start'=>strtotime($item->plugins->pricing->next_paydate),
                        'paydate'=>$item->plugins->pricing->paydate,
                        'payinfo'=>$this->state->get('pl')

                    ]);

                    $this->subscriptions[] = Sp4kAppsSubscriptionApp::getInstance($subscriptionData)->getItem()->update();
                }
            }
        }

        /**
         * create contracts for billable items, one for each recurring product in the order.
         *
         * Parse $this subscriptions and create contracts using valid recurring payment methods,
         * in this case only ezcollect, but for each of the subscriptions created on the order object, create
         * a contract index between the subscript and the recurring payment provider described in payment details.
         */
        private function createContracts()
        {

            $paymentProviderReferenceId = null;


            foreach($this->subscriptions as $subscription){
                if($subscription->getProduct()->plugins->pricing->type == 'unitspercycle'
                    || $subscription->getProduct()->plugins->pricing->type == 'percycle') {

                    $contractData = new Registry([
                        'order_id'=>$this->order->id,
                        'product_id'=>$subscription->product_id,
                        'event_id'=>$subscription->event_id,
                        'first_bill_date'=>$subscription->plugins->pricing->next_paydate,
                        'method'=>$this->state->get('contract_payment_method'),
                        'terms'=>json_encode([
                            'period'=>'monthly',
                            'pricing'=>$subscription->plugins->pricing->type

                            ]),
                        'paydate'=>$subscription->plugins->pricing->paydate
                    ]);

                    $this->contracts[] = Sp4kAppsContractApp::getInstance($contractData)->getItem()->update();
                }
            }
        }


        private function processRegistrations()
        {
            foreach($this->cart['items'] as $item) {
                if($item->product->config->booking->enabled) {
                    $registrationData = new Registry([
                        'child_id'=>$item->plugins->booking->attendee->id,
                        'date_start'=>$item->plugins->booking->date_start,
                        'date_end'=>$item->plugins->booking->date_end,
                        'order_id'=>$this->order->id,
                        'product_id'=>$item->product->id,
                        'state'=>1,
                        'status'=>1
                    ]);
                }
            }
        }


        private function processNotifications()
        {

        }

        public function getResult()
        {
            if($this->process_payment_result){
                $result = "Order Completed. Order ID: ".$this->order->id;
            }else{
                $result = "There was an error processing your order.";
            }

            return $result;
        }
    }