<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/30/2015
     * Time: 12:38 AM
     */

    class Sp4kAppsPaymentMethodsCard
    {
        private $_state;

        public $transaction_id;
        public $amount;
        public $name;


        protected $_error = false;

        public function __construct($state)
        {
            $this->_state = $state;
        }

        public function execute()
        {
            $this->name = 'paypal_pro_api';
            $app = Sp4kAppsPaypalApp::getInstance(
                $this->_state
            );
            /** @var Sp4kAppsPaypalItem $processor */
            $processor = $app->getItem();


            $processor->process();


            if($processor->status != 'approved'){
                $this->status = 0;
                $this->_error = $processor->getError();
            }else{
                $this->transaction_id = $processor->transaction_id;
                $this->amount = $processor->amount;
            }

            return $this;
        }

        public function getError(){
            return $this->_error;
        }

    }
