<?php

    use Joomla\Registry\Registry;

    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 1:35 PM
     */



    class Sp4kAppsProductPricingUnitspercycle extends Sp4kAppsProductPricingPlg
    {

        public $type = 'unitspercycle';
        public $enabled = true;
        private $_state;

        public function __construct($state){
            $this->_state = new Joomla\Registry\Registry($state);
        }

        public static function getInstance(&$product,$state){
            return new self($state);
        }

        public function getState(){
            return $this->_state;
        }

        public function getEventPrice( $event_id , $startDate ){

            $this->event = Sp4kAppsEventApp::getInstance(
                new Registry(['id'=>$event_id])
            )->getItem();

            $this->venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id'=>$this->event->venue_id])
            )->getItem();

            $this->getState()->set('event.rrule',
                Sp4kAppsRruleApp::getInstance(
                    new Registry(['id'=>$this->event->rrule_id])
                )->getItem()
            );

           $daysinbilling = $this->getNumDates(
                strftime('%Y%m%dT115959Z',$startDate),
                strftime('%Y%m%dT115959Z',strtotime('+30 days',$startDate))
            );

            $total = $daysinbilling * $this->getState()->get('pricing')->unit_price;

            return $total;

        }

        private function getNumDates($startDate,$endDate)
        {
            /** @var Sp4kAppsRruleItem $rrule */
            $rrule = $this->getState()->get('event.rrule');
            //get the number of dates in the billing period based on the recurrence and the start date.

            $timezone    = JFactory::getConfig()->get('offset');

            //use the event start date $this->state->get('event.rrule.dtstart');
            $startDate   = new \DateTime($startDate, new \DateTimeZone($timezone));

            //use the event end date $this->state->get('event.rrule.until');
            $endDate     = new \DateTime($endDate, new \DateTimeZone($timezone)); // Optional

            $dates = $rrule->getDatesBetween($startDate,$endDate,true);
            return $dates->count();
        }
    }