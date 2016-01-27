<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 10:28 AM
     */
    use Joomla\Registry\Registry;


    /**
     * Class Sp4kAppsEasycollectCustomerList
     */
    class Sp4kAppsEasycollectCustomerList
    {

        public $guid;

        /*The customer’s title.*/
        public $title;

        /*The customer’s first name.*/
        public $firstName;

        /*The customer’s surname.*/
        public $Surname;

        /*The customer’s initials.*/
        public $initials;

        /*The customer’s date of birth.*/
        public $dateOfBirth;

        /*The customer’s postcode.*/
        public $postCode;

        /*The first line of the customer’s address.*/
        public $line1;

        /*The customer’s home telephone number.*/
        public $homePhoneNumber;

        /*The customer’s mobile telephone number.*/
        public $mobilePhoneNumber;

        /*The customer’s e-mail address.*/
        public $email;

        /*The customer’s unique reference number.*/
        public $customerRef;

        /*The customer’s bank account number.*/
        public $accountNumber;

        /*The customer’s bank account sorting code.*/
        public $bankSortCode;


        private $pPath = '/api/2.0/client/S4KID/customers';
        private $method = 'GET';
        private $_table;
        private $_table_alias = 'ezc';

        public function __construct(Registry $state){
            $this->_state = $state;
            $this->execute();
        }

        public static function getInstance($state){
            return new self($state);
        }

        private function execute()
        {
            if($juser_id = $this->_state->get('juser_id',false)){
                if($ezc_customer = $this->getTable()->filter(['juser_id'=>$juser_id])){
                    $this->guid = array_pop($ezc_customer)->pm_ref_user_id;
                }
            }else{
                //todo just list them all
            }

            return false;
        }

        protected function load()
        {
            $result = false;

            // Load the table object, empty if _state->data->key = null;
            $this->getTable()->load(
                $this->getState()->get($this->_key,null)
            );

            //if we have incoming data, bind it to the table object

            $this->_table->bind(
                $this->getState()->toObject()
            );

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            $this->getState()->loadArray(get_object_vars($this->_table),true);
        }

        private function bind()
        {
            foreach($this->_state->toArray() as $key=>$val){
                if(property_exists($this,$key)){
                    $this->$key = $val;
                }
            }
        }

        private function getTable()
        {
            return
                $this->_table
                    ?
                    $this->_table
                    :
                    $this->_table = new Sp4kTablesBase('#__sp4k_ezcollect_customer_items','id', $this->_table_alias);
        }
    }