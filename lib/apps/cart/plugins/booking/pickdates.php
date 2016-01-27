<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/15/2015
     * Time: 10:16 AM
     */

    class Sp4kAppsCartPluginsBookingPickdates extends Sp4kAppsCartPluginsBookingPlg
    {
        public $children;
        //this class defines the parameters for subscription bookable products
        //provide start dates using product schedule.
        //provide attendee options.

        public function __construct($state)
        {
            $this->dates = $state->get('dates');

        }
    }