<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */


    /**
     * Class Sp4kAppsEasycollectPaymentDelete
     *
     * The delete payment call deletes an individual payment created by using the ‘add_payment’ call,
     * providing the payment is:
     *  (a) in the future
     *  (b) not in the payment collection process with the bank.
     *
     */
    class Sp4kAppsEasycollectPaymentDelete
    {
        private $pPath = '/api/2.0/client/S4KID/payment/{GUID}/delete';
        private $method = 'POST';

        private $client_code;
        private $guid;

        
        /*
         * A mandatory comment detailing why the payment has been deleted.
         */
        private $comment;


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