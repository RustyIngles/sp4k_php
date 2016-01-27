<?php

    use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsPaymentItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsPaymentTrait;

        public $id;
        public $created;

        /**
         * Recurring, POS, so we can reference available options for that product?
         * Or can the caller just tell us what payment method to use? Move it to the model.
         * So model formats the data for the payment plugin that it is recommending.
         *
         *
         * @var string
         */
        public $type;
        public $invoice_id;
        public $method = 0;//card,bank,mail,comp
        public $amount;
        public $status;
        public $transaction_id;
        public $processor_transaction_id;


        private $error;

        public function charge(){
            //paynow//billable//payment method..per type, in the product configuration, and the cart.
            $this->process();

            // $this->status should now be set.
            $this->update();
            return $this;
        }

        private function process(){
            $classname = 'Sp4kAppsPaymentMethods'.ucfirst($this->method);

            $paymentProcessor = new $classname(
                new JRegistry($this->getState()->get('payment_data'))
            );

            $paymentProcessor->execute();

            if($payment_error = $paymentProcessor->getError()){
                $this->status = 0;
                $this->_error = $payment_error;
            }else{
                $this->status = 1;//failed/complete/unresolved/abandoned/cancelled/rejected
                $this->processor_transaction_id = $paymentProcessor->transaction_id;
                $this->transaction_id = Sp4kAppsTransactionApp::getInstance(
                    new Registry([
                        'amount'=>$paymentProcessor->amount,
                        'ref_id'=>$paymentProcessor->transaction_id,
                        'method'=>$paymentProcessor->name,
                        'invoice_id'=>$this->invoice_id
                    ])
                    //processor_ref_id
                )->getItem()->update()->id;
            }

            return;
        }

        public function getError(){
            return $this->_error;
        }
    }

    //onSubscriptionCreate recurring payment method runAccountSetup //may do nothing, or create ann ezcollect contract.