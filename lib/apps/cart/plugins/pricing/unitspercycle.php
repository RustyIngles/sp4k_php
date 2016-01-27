<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/18/2015
     * Time: 9:00 AM
     */

    class Sp4kAppsCartPluginsPricingUnitspercycle
    {
        public $type = 'unitspercycle';
        public $date_start;
        public $paydate;
        public $next_paydate;
        public $cost_now;
        public $cost_next;
        public $numDatesNow;
        public $numDatesNext;
        private $_product;

        private $event;
        /** @var  Sp4kAppsRruleItem */
        private $rrule;
        private $timezone;

        public function __construct($state)
        {
            $this->_state = $state;
            $this->execute();
        }

        public function execute()
        {
            $unit_price = $this->_state->get('options.unit_price');

            /** @var Sp4kAppsEventItem event */
            $this->_product = Sp4kAppsProductApp::getInstance(
                new Registry(['id' => $this->_state->get('product_id')])
            )->getItem();


            $this->setNumDates();

            $this->cost_now = $this->numDatesNow * $unit_price;
            $this->cost_next = $this->numDatesNext * $unit_price;
        }

        private function setNumDates()
        {
            $this->date_start = $this->_state->get('start_date');
            $this->paydate = $this->_state->get('pay_date', 1);
            $this->next_paydate = strftime('%Y-%m-'.$this->paydate, strtotime('+1 month',$this->date_start));

            $this->rrule = Sp4kAppsRruleApp::getInstance(
                new Registry($this->_product->config->schedule->rrule)
            )->getItem();
            //get the number of dates in the billing period based on the recurrence and the start date.

            $this->timezone = JFactory::getConfig()->get('offset');

            $this->setNumDatesNow();
            $this->setNumDatesNext();
        }

        private function setNumDatesNow()
        {
            $start = strftime('%Y-%m-%d',$this->date_start);
            $end = $this->next_paydate;
            $this->numDatesNow = $this->getNumDates($start,$end);
        }

        private function setNumDatesNext()
        {
            $start = $this->next_paydate;
            $end = strftime('%Y-%m-'.$this->paydate, strtotime('+1 month',strtotime($this->next_paydate)));
            $this->numDatesNext = $this->getNumDates($start,$end);
        }

        private function getNumDates($start,$end)
        {
            //use the event start date $this->state->get('event.rrule.dtstart');
            $startDate = new \DateTime($start, new \DateTimeZone($this->timezone));

            //use the event end date $this->state->get('event.rrule.until');
            $endDate = new \DateTime($end, new \DateTimeZone($this->timezone)); // Optional

            $dateCollection = $this->rrule->getDatesBetween($startDate, $endDate,true,true);
            return $dateCollection->count();
        }
    }