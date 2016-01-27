<?php
    use Joomla\Registry\Registry;

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/20/2015
 * Time: 6:18 PM
 */

//get the price per occurence.
//get the number of occurrences per period
//get the period.


    class Sp4kAppsCartPluginsSummaryPluginsBookingSubscription extends Sp4kAppsCartPluginsEventItem
    {
        public $total = 0;
        public function __construct(Registry $state = null)
        {
            parent::__construct($state);

            //build the sub-lineitems for each child with their startdates.
            //$this->sublines = function(){
            //    //create an array of sublines and fill values.
            //    return $this->getSublines();
            //};

            $this->init();
            $this->setMainline();
            $this->setSublines();
            //$this->summaryline = $this->getSummaryLine();
            //$this->cart_values = $this->getCartValues();
        }

        private function init(){
            $this->event = Sp4kAppsEventApp::getInstance(
                new Registry(['id'=>$this->getState()->get('event_id')])
            )->getItem();

            $this->venue = Sp4kAppsVenueApp::getInstance(
                new Registry(['id'=>$this->event->venue_id])
            )->getItem();

            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry(['id'=>$this->event->product_id])
            )->getItem();
        }

        private function getCartValues(){
            $values = new stdClass();
            $values->total = $this->sublines['total'];
        }

        private function setSummaryLine(){

        }

        private function setMainLine(){
            //$description = $product_name.' at '.$venue_name
            //$line_total = sum sublines->$line_total
            $this->mainline['description'] = $this->product->title.' at '.$this->venue->title;


        }

        private function setSublines(){

            $this->getState()->set('event.rrule',
                Sp4kAppsRruleApp::getInstance(
                    new Registry(['id'=>$this->event->rrule_id])
                )->getItem()
            );

            //iterate over children in the cart and set up values.
            foreach($this->getState()->get('children') as $child_id){

                $childItem = Sp4kAppsChildApp::getInstance(new Registry(['id'=>$child_id]))->getItem();

                $startDate = $this->getState()->get('startdates')[$child_id];

                $daysinbilling = $this->getNumDates(
                    strftime('%Y%m%dT115959Z',$startDate),
                    strftime('%Y%m%dT115959Z',strtotime('+30 days',$startDate))
                );

                $this->sublines[$child_id]['startdate'] = $startDate;
                $this->sublines[$child_id]['description'] = $childItem->name.' starting '.strftime('%d/%m/%Y',$startDate);
                $this->total += $this->sublines[$child_id]['total']
                    = ($daysinbilling * json_decode($this->product->config)->pricing->unit_price);
            }
        }

        public function process(){
            $this->price = $this->state->get('product.price');
            $this->recurrence = $this->state->get('event.rrule');//days of the week basically
            $this->datestart = $this->state->get('datestart');
            $this->setNumDates();
            $this->cost = $this->numDates * $this->price;
        }

        private function getTotal(){
            //first I have to show a selection of start dates in the cart.
            //take start date and calculate the number of occurences within 30 days.

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

            //$rule        = new \Recurr\Rule($rrule->toString(), $startDate, $endDate, $timezone);
//
            //$transformer = new \Recurr\Transformer\ArrayTransformer();
//
            //$dateCollection = $transformer->transform($rule);
        }

        private function getItemTotal(){

        }
    }