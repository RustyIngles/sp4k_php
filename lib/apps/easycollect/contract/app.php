<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:24 AM
     */

    class Sp4kAppsEasycollectContractApp
    {
        protected $_error;

        public function __construct($state){
            $this->_state = $state;
        }

        public function getInstance($state){
            return new self($state);
        }

        public function add(){

            return Sp4kAppsEasycollectContractAdd::getInstance($this->_state);
        }

        public function edit(){
            return Sp4kAppsEasycollectContractEdit::getInstance($this->_state);
        }

        public function cancel(){
            return Sp4kAppsEasycollectContractCancel::getInstance($this->_state);
        }

        public function get(){
            return Sp4kAppsEasycollectContractList::getInstance($this->_state);
        }

        public function reactivate(){
            return Sp4kAppsEasycollectContractReactivate::getInstance($this->_state);
        }

        public function restart(){
            return Sp4kAppsEasycollectContractRestart::getInstance($this->_state);
        }

        public function getError()
        {
            return $this->_error;
        }
    }



