<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/31/2015
     * Time: 12:08 AM
     */

    use Joomla\Registry\Registry;

    /**
     * Class Sp4kAppsSubscriptionPaymentMethodsBank
     *
     * Interacts with the payments api to provide the correct state for the recurring payments context.
     */
    class Sp4kAppsSubscriptionPaymentMethodsBank
    {
        public $agreement_id;

        protected $_state;
        protected $_error = false;

        public function __construct($state)
        {
            $this->_state = $state;
        }

        public function initializeAgreement(){

            $paymentProcessor = new Sp4kAppsPaymentMethodsBank(
               $this->_state
            );

            $paymentProcessor->initializeAgreement();

            if(!$this->_error = $paymentProcessor->getError()){
                $this->agreement_id = $paymentProcessor->agreement_id;
            }
        }

        /**
         * We've detected that this user has not initiated a payment agreement through this payment method,
         * so we have to first create a user account in the payment system if necessary.
         */
        private function newPaymentMethodUser(){
            $classname = 'Sp4kAppsPaymentMethodsBank';

            if(class_exists($classname)){
                $paymentProcessor = new $classname(
                    new JRegistry($this->getState()->get('payment_config'))
                );

                $paymentProcessor->addUser();

                if($payment_error = $paymentProcessor->getError()){
                    $this->status = 0;
                    $this->error = $payment_error;
                }else{
                    $this->status = 1;//failed/complete/unresolved/abandoned/cancelled/rejected
                    $this->processor_customer_id = $paymentProcessor->customer_id;


                }
            }else{
                $this->error = 'Unable to Load EzCollect Payment Processor to set up User.';
            }

            return;
        }

        private function newPaymentMethodUserAgreement(){
            $classname = 'Sp4kAppsPaymentMethods'.ucfirst($this->state->get('billingConfig')->recurring->method);

            $paymentProcessor = new $classname(
                new JRegistry($this->getState()->get('payment_config'))
            );

            $paymentProcessor->addAgreement();

            if($payment_error = $paymentProcessor->getError()){
                $this->status = 0;
                $this->error = $payment_error;
            }else{
                $this->status = 1;//failed/complete/unresolved/abandoned/cancelled/rejected
                $this->processor_agreement_id = $paymentProcessor->agreement_id;


                //$this->contract_id = Sp4kContractApp::getInstance([
                //    'ref_id'=>$this->processor_agreement_id,
                //    'subscription_id'=>$this->state->get('subscription_id')
                //])->getItem()->update()->id;
            }

            return;
        }

        public function getError()
        {
            return $this->_error;
        }
    }