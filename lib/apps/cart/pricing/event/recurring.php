<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/20/2015
 * Time: 6:18 PM
 */

//get the price per occurence.
//get the number of occurrences per period
//get the period.


    class Sp4kAppsCartPricingRecurring extends Sp4kAppsCartPricingApp
    {
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
            $until = strtotime($startData.'+30 days');

        }

        private function setNumDates()
        {
            $rrule = $this->state->get('event.rrule');
            //get the number of dates in the billing period based on the recurrence and the start date.

            $timezone    = JFactory::getConfig()->get('offset');

            //use the event start date $this->state->get('event.rrule.dtstart');
            $startDate   = new \DateTime($rrule->dtstart, new \DateTimeZone($timezone));

            //use the event end date $this->state->get('event.rrule.until');
            $endDate     = new \DateTime($rrule->until, new \DateTimeZone($timezone)); // Optional

            $rule        = new \Recurr\Rule($rrule->toString(), $startDate, $endDate, $timezone);

            $transformer = new \Recurr\Transformer\ArrayTransformer();

            $dateCollection = $transformer->transform($rule);
        }
    }