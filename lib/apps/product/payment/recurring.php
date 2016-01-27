<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 1:32 PM
     */

    class Sp4kAppsProductPaymentRecurring
    {
        public $type = 'directdebit';
        public $enable = true;

        private $_product;

        public function __construct(&$product,$state)
        {
            $this->_product = $product;
            $this->required = $state->get('options.recurring.required');
        }

        public static function getInstance(&$product, $state)
        {
            return new self($product,$state);
        }
    }