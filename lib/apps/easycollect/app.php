<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:22 AM
     */

    class Sp4kAppsEasycollectApp
    {
        protected $_error = false;
        private $_state;

        public function __construct($state){
            $this->_state = $state;
            define('EZC_API_SECRET', 'xKKvN6aKoCFytVfWEU805SZieo');
            define('EZC_BASEURL','https://ecm3.eazycollect.co.uk');

        }

        public static function getInstance($state)
        {
            return new self($state);
        }

        public function getCustomer()
        {
            return Sp4kAppsEasycollectCustomerApp::getInstance($this->_state)->get();
        }

        public function addCustomer()
        {
            /** @var Sp4kAppsEasycollectCustomerApp $app */
            $app = Sp4kAppsEasycollectCustomerApp::getInstance($this->_state);
            $newCustomer = $app->add();

            if(!$this->_error = $app->getError()){
                return $newCustomer->id;
            }else {
                return false;
            }
        }

        public function deleteCustomer()
        {
            $app = Sp4kAppsEasycollectCustomerApp::getInstance($this->_state);
            return $app->delete();
        }

        public function getContract()
        {
            return Sp4kAppsEasycollectContractApp::getInstance($this->_state);
        }

        public function addContract()
        {
            /** @var Sp4kAppsEasycollectContractApp $app */
            $app = Sp4kAppsEasycollectContractApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->add();
        }

        public function suspendContract()
        {
            $app = Sp4kAppsEasycollectContractApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->suspend();
        }

        public function cancelContract()
        {
            $app = Sp4kAppsEasycollectContractApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->cancel();
        }

        public function getPayment()
        {
            return Sp4kAppsEasycollectPaymentApp::getInstance($this->_state);
        }

        public function addPayment()
        {
            $app = Sp4kAppsEasycollectPaymentApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->add();
        }

        public function checkPayment()
        {
            $app = Sp4kAppsEasycollectPaymentApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->check();
        }

        public function cancelPayment()
        {
            $app = Sp4kAppsEasycollectPaymentApp::getInstance($this->_state);
            $this->_error = $app->getError();
            return $app->cancel();
        }

        public function getError()
        {
            return $this->_error;
        }
    }
