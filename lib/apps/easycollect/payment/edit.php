<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */


    /**
     * Class Sp4kAppsEasycollectPaymentEdit
     *
     * Where your system will be driving the payment creation process
     * (i.e. you have a schedule in place where payments are not automatically created by the Eazy Collect servers)
     * or you need to collect  an individual ‘one-off’ payment against a recurring payment schedule,
     * the ‘add_payment’ will allow you to create individual payments in the system.
     *
     * A contract must already be in place for the payment to be allocated correctly.
     *
     */
    class Sp4kAppsEasycollectPaymentEdit
    {
        private $pPath = '/api/2.0/client/S4KID/payment/{GUID}/edit';
        private $method = 'POST';

        private $client_code;
        private $guid;
        
        /*The amount that is required to be collected in x.xx format. e.g 10.99, 10.90, etc.*/
        private $amount;
        
        /*The date that you wish the payment to be collected in mm/dd/ccyy format. e.g. 01/07/2013.*/
        private $date;
        
        /*A comment, payment reference or other string that you want to save along with the payment.*/
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