<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */


    /**
     * Class Sp4kAppsEasycollectPaymentList
     *
     * The delete payment call deletes an individual payment created by using the ‘add_payment’ call,
     * providing the payment is:
     *  (a) in the future
     *  (b) not in the payment collection process with the bank.
     *
     */
    class Sp4kAppsEasycollectPaymentList
    {
        private $pPath = '/api/2.0/client/S4KID/contract/{GUID}/payments';
        private $method = 'GET';

        private $client_code;
        private $guid;

        
        /**
         * The number of payments you require to be returned.
         * Payments are returned in date descending order.         *
         */
        private $rows;


        public function __construct($state){
            $this->_state = $state;
            $this->bind();
            $this->execute();
        }

        public function getInstance($state){
            return new $this($state);
        }

        private function bind()
        {
            foreach($this->_state->toArray() as $key=>$val){
                if(property_exists($this,$key)){
                    $this->$key = $val;
                }
            }
        }

        private function execute()
        {

        }
    }