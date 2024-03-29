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

        /*The customerís title.*/
        private $title;

        /*The customerís first name.*/
        private $firstName;

        /*The customerís surname.*/
        private $surname;

        /*The customerís initials.*/
        private $initials;

        /*If the customer is a company, the company name will be returned here.*/
        private $companyName;

        /*The customerís date of birth.*/
        private $dateOfBirth;

        /*The customerís postcode.*/
        private $postCode;

        /*The the customerís address.*/
        private $line1;
        private $line2;
        private $line3;
        private $line4;

        /*The customerís home telephone number.*/
        private $homePhoneNumber;

        /*The customerís mobile telephone number.*/
        private $mobilePhoneNumber;

        /*The customerís e-mail address.*/
        private $email;

        /*The account name for the customerís bank account.*/
        private $accountHolderName;
        
        /*The customerís bank account number.*/
        private $accountNumber;

        /*The customerís bank account sorting code.*/
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