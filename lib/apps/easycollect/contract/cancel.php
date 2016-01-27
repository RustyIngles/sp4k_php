<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:50 AM
     */
    
    class Sp4kAppsEasycollectContractCancel
    {
        private $path = '/api/2.0/client/S4KID/contract/{GUID}/cancel';
        private $method = 'POST';
        
        private $client_code;
        private $guid;

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