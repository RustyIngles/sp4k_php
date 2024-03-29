<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:50 AM
     */

    /*
     * Creates a payment schedule against a customer record.
     * The payment schedule may include regular automated payments,
     * or just set up a Direct Debit to accept payment requests from the API as and when collections are required.
     */
    class Sp4kAppsEasycollectContractAdd
    {
        private $path = '/api/2.0/client/S4KID/customer/{GUID}/add_contract';
        private $method = 'POST';

        public $guid;



        public $paymentMonthInYear;
        public $paymentDayInMonth;
        public $paymentDayInWeek;

        /*
         * If the payment schedule is to terminate on a particular date,
         * the date in dd/mm/ccyy format should be passed with this parameter.
         * e.g: 16/05/2013 = 16th May 2013.
         */
        public $terminationDate;

        /* How the schedule is to terminate; possible values are:
            � Take certain number of debits
            � Until further notice
            � End on exact date
        */
        public $terminationType = 'Until further notice';

        /*The start date of the payments in dd/mm/yyyy format. e.g: 16/05/2013 = 16th May 2013.*/
        public $start;

        /*If the schedule is to terminate after a certain number of debits, the number of debits should be passed here.*/
        public $numberOfDebits;

        /*If the first payment is to be of a different amount to the rest of the schedule, then pass the amount of the first payment with this parameter.*/
        public $initialAmount;

        /*If there is a one-off registration or set-up charge, pass it with this parameter and it will be added to the first payment.*/
        public $extraInitialAmounts;

        /*The regular amount that you wish to collect.*/
        public $amount;

        /*If the final payment is to be a different amount to the regular payment, ass the amount with this parameter.*/
        public $finalAmount;

        /*Use this to �skip� payments. For example, entering 3 here on a monthly schedule would create a �quarterly� schedule. 2 against a weekly schedule would create a �fortnightly schedule� etc.*/
        public $every;

        /*If you are a charity who can reclaim UK Income tax on donations received, and the donor has agreed to Gift Aid, you can pass �true� here. In all other circumstances, pass �false�.*/
        public $isGiftAid;

        /*If the schedule is of the �Take certain number of debits� type, you need to specify what the system should do when the required number of debits have been collected. Choices are:
      � Expire
      � Switch to Further Notice*/
        public $atTheEnd;

        /*An optional reference which can be stored in the database which is shown on reports generated by the Web User Interface.*/
        public $additionalReference;

        /** The name of the schedule as returned in the �schedules� call. */
        public $scheduleName = 'DD Dates 1/15 - Adhoc';

        public function __construct($state){
            $this->_state = $state;
            $this->execute();
        }

        public static function getInstance($state){
            return new self($state);
        }

        private function execute()
        {
            $this->bind();
            //$this->_state->set('apisecret',$this->apisecret);
            $this->path = str_replace('{GUID}',$this->_state->get('guid'),$this->path);
            $url = EZC_BASEURL.$this->path.'?apisecret='.EZC_API_SECRET;
            $curl = new Sp4kAppsEasycollectCurl($url);
            $curl->setPost($this);
            $curl->createCurl();
            $response = json_decode($curl->__toString());
            $this->id = $response->ID;
        }

        private function bind()
        {
            foreach($this->_state->toArray() as $key=>$val){
                if(property_exists($this,$key)){
                    $this->$key = $val;
                }
            }
        }
    }