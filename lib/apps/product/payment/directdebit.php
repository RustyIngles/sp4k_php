<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 1:33 PM
     */

    class Sp4kAppsProductPaymentDirectdebit
    {
        public $type = 'directdebit';
        public $enable = true;

        public function __construct(&$product,$state)
        {
            $this->_product = $product;
            $this->required = $state->get('options.directdebit.required');
            $this->paynow = $state->get('options.directdebit.firstcycle',false);
        }

        public static function getInstance(&$product, $state)
        {
            return new self($product,$state);
        }
    }