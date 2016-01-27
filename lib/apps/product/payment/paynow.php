<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 1:33 PM
     */

    class Sp4kAppsProductPaymentPaynow
    {
        public $type = 'paynow';
        public $enable = true;
        private $_product;

        public function __construct($product,$state)
        {
            $this->_product = $product;
            $this->required = $state->get('options.paynow.required');
            $this->paynow = $state->get('options.paynow.firstcycle',false);
        }

        public static function getInstance($product,$state)
        {
            return new self($product,$state);
        }
    }