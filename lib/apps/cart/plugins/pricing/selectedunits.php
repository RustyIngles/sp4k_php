<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 4:15 AM
     */

    Class Sp4kAppsCartPricingSelectedunits extends Sp4kAppsCartPluginsPaymentPlg
    {
        public function __construct($state)
        {
            $this->_state = $state;
            $this->execute();
        }

        public function execute()
        {
            $unit_price = $this->_state->get('options.unit_price');

            /** @var Sp4kAppsEventItem event */
            $this->product = Sp4kAppsProductApp::getInstance(
                new Registry(['id' => $this->_state->get('product_id')])
            )->getItem();

            $selectedDates = explode($this->_state->get('dates'));
        }
    }