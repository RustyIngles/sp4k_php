<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/27/2015
     * Time: 4:38 PM
     */

    class Sp4kAppsProductScheduleRecurring extends Sp4kAppsProductSchedulePlg
    {

        private $_product;
        private $_config;

        public function __construct(&$product, $state)
        {
            $this->_config = $product->config;
            $this->_product = $product;
            $this->setValidDates();
        }

        public static function getInstance(&$product,$state)
        {
            return new self($product, $state);
        }

        private function setValidDates()
        {
            parse_str(
                str_replace(';','&',$this->_config->schedule->rrule),
                $rruleArray
            );

            /** @var Sp4kAppsRruleItem $rrule */
            $rrule = Sp4kAppsRruleApp::getInstance(
                new Registry(
                    array_change_key_case(
                        $rruleArray
                    )
                )
            )->getItem();

            // check the configuration for a limit to the number of days
            // in advance members can book and set to 90 if not set
            $limit = isset($this->_config->booking->future_date_limit)
                ?
                $this->_config->booking->future_date_limit
                :
                90;

            $today_plus_limit = strtotime('+'.$limit.' days');

            if(!isset($this->dtstart) || ( $rrule->dtstart < time()) ) {
                $rrule->dtstart = time();
            }

            if(!isset($this->until) || ( $rrule->until > $today_plus_limit ) ){
                $rrule->until = $today_plus_limit;
            }

            $validDateCollection = $rrule->getDatesBetween()->toArray();
            foreach ($validDateCollection as $dateStartCollectionItem) {
                /** @var DateTime $startDateObject */
                $startDateObject = $dateStartCollectionItem->getStart();
                $this->validDates[] = $startDateObject->getTimeStamp();
            }
            $test = 'test';
        }
    }