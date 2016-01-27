<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:50 AM
     */


    /**
     * Class Sp4kAppsEasycollectContractEdit
     *
     * The ‘edit_contract’ call amends a payment schedule lodged against a customer record.
     *
     */
    class Sp4kAppsEasycollectContractEdit
    {
        private $path = '/api/2.0/client/S4KID/contract/{GUID}/edit';
        private $method = 'POST';

        private $client_code;
        private $guid;

        private $paymentMonthInYear;
        private $paymentDayInMonth;
        private $paymentDayInWeek;

        /** If the payment schedule is to terminate on a particular date, the date in dd/mm/ccyy format should be passed with this parameter. e.g: 16/05/2013 = 16th May 2013. */
        private $terminationDate;

        /* How the schedule is to terminate; possible values are:
            · Take certain number of debits
            · Until further notice
            · End on exact date
        */
        private $terminationType;

        /*If the schedule is to terminate after a certain number of debits, the number of debits should be passed here.*/
        private $numberOfDebits;

        /*If the first payment is to be of a different amount to the rest of the schedule, then pass the amount of the first payment with this parameter.*/
        private $initialAmount;

        /*The regular amount that you wish to collect.*/
        private $amount;

        /*If the final payment is to be a different amount to the regular payment, ass the amount with this parameter.*/
        private $finalAmount;

        /*Use this to ‘skip’ payments. For example, entering 3 here on a monthly schedule would create a ‘quarterly’ schedule. 2 against a weekly schedule would create a ‘fortnightly schedule’ etc.*/
        private $every;

        /*If you are a charity who can reclaim UK Income tax on donations received, and the donor has agreed to Gift Aid, you can pass ‘true’ here. In all other circumstances, pass ‘false’.*/
        private $isGiftAid;

        /*If the schedule is of the ‘Take certain number of debits’ type, you need to specify what the system should do when the required number of debits have been collected. Choices are:
      · Expire
      · Switch to Further Notice*/
        private $atTheEnd;

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