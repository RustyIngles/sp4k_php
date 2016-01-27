<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */


    use Joomla\Registry\Registry;
    /**
     * Class Sp4kAppsEasycollectCustomerAdd
     *
     * The �add_customer� call creates a customer record within the system.
     *
     */
    class Sp4kAppsEasycollectCustomerAdd
    {



        /*The customer�s title.*/
        public $title;

        /*The customer�s first name.*/
        public $firstName;

        /*The customer�s surname.*/
        public $surname;

        /*The customer�s initials.*/
        public $initials;

        /*If the customer is a company, the company name will be returned here.*/
        public $companyName;

        /*The customer�s date of birth.*/
        public $dateOfBirth;

        /*The customer�s postcode.*/
        public $postCode;

        /*The the customer�s address.*/
        public $line1;
        public $line2;
        public $line3;
        public $line4;

        /*The customer�s home telephone number.*/
        public $homePhoneNumber;

        /*The customer�s mobile telephone number.*/
        public $mobilePhoneNumber;

        /*The customer�s e-mail address.*/
        public $email;

        /*The customer�s unique reference number.*/
        public $customerRef;

        /*The account name for the customer�s bank account.*/
        public $accountHolderName;

        /*The customer�s bank account number.*/
        public $accountNumber;

        /*The customer�s bank account sorting code.*/
        public $bankSortCode;

        private $path = '/api/2.0/client/S4KID/add_customer';
        private $method = 'POST';
        private $guid;
        protected $_error = false;


        public function __construct( Registry $state){
            $this->_state = $state;
            $this->apisecret = EZC_API_SECRET;
            $this->execute();
        }

        public static function getInstance($state){
            return new self($state);
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
            $this->bind();
            //$this->_state->set('apisecret',$this->apisecret);
            $url = EZC_BASEURL.$this->path.'?apisecret='.EZC_API_SECRET;
            $curl = new Sp4kAppsEasycollectCurl($url);
            $curl->setPost($this->_state->toArray());
            $curl->createCurl();
            $response = json_decode($curl->__toString());
            if(isset($response->error)) {
                $this->_error = $response->error;
            }else{
                $this->guid = $response->ID;
            }
        }

        public function getError()
        {
            return $this->_error;
        }

        public function getGuid()
        {
            return $this->guid;
        }
    }