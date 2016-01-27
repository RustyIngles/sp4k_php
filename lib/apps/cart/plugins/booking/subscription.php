<?php

    use Joomla\Registry\Registry;
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:13 AM
     */

    class Sp4kAppsCartPluginsBookingSubscription extends Sp4kAppsCartPluginsBookingPlg
    {
        /*

        -reference to product state, that describes the product terms, at the time of product selection.
        --a copy of the product object at the time of selection,
        --
        --a new row in the table gets made for each save of the product, each with its own timestamp,
        --and future observers can ressurect the version row by timestamp difference, to bubble sort the nearest greater than,
        --and the nearest less than timestamps, and that is the configuration set when that order was created.

        -a customers product selection setting for that product,
        --where they define the available product configuration options.
        --for a customers product selection setting for that product-item for a customer instance,
        --in this case, a customer.

        */

        public $attendee;
        public $product_id;
        public $venue;
        public $cartkey;
        public $type = 'subscription';
        public $date_start;
        public $date_end;

        public function __construct($state){
            $this->_state = $state;
            $this->setVenue();
            $this->setAttendee();
            $this->setStartDate();
            $this->setEndDate();
            //$this->setAttendeeOptions();
            //$this->setStartDateOptions();
            $this->cartkey = md5($this->product_id);
        }

        //this class defines the parameters for subscription bookable products
        //provide start dates using product schedule.
        //provide attendee options.

        private function setVenue(){
            $this->venue_id = $this->event->venue_id;
            $this->venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id'=>$this->venue_id])
            )->getItem();
        }

        private function setAttendee(){
            if($child_id =$this->_state->get('child_id',$this->_state->get('attendee',false))) {
                $this->attendee = Sp4kAppsChildApp::getInstance(
                    new Registry(['id' => $child_id])
                )->getItem();
            }
        }

        private function setStartDate(){
            $this->date_start = $this->_state->get('start_date',false);
        }

        private function setEndDate(){
            $this->date_end = $this->_state->get('end_date',false);
        }
    }