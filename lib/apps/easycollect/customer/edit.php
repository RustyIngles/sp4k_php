<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */


    /**
     * Class Sp4kAppsEasycollectCustomerEdit
     *
     * Edit a customer record within the system.
     */

    class Sp4kAppsEasycollectCustomerEdit
    {
        private $pPath = '/api/2.0/client/S4KID/customer/{GUID}/edit';
        private $method = 'POST';

        /*The customer’s title.*/
        private $title;

        /*The customer’s first name.*/
        private $firstName;

        /*The customer’s surname.*/
        private $surname;

        /*The customer’s initials.*/
        private $initials;

        /*If the customer is a company, the company name will be returned here.*/
        private $companyName;

        /*The customer’s date of birth.*/
        private $dateOfBirth;

        /*The customer’s postcode.*/
        private $postCode;

        /*The the customer’s address.*/
        private $line1;
        private $line2;
        private $line3;
        private $line4;

        /*The customer’s home telephone number.*/
        private $homePhoneNumber;

        /*The customer’s mobile telephone number.*/
        private $mobilePhoneNumber;

        /*The customer’s e-mail address.*/
        private $email;

        /*The account name for the customer’s bank account.*/
        private $accountHolderName;
        
        /*The customer’s bank account number.*/
        private $accountNumber;

        /*The customer’s bank account sorting code.*/
        private $bankSortCode;


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