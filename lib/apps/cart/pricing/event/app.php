<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/20/2015
 * Time: 7:50 PM
 */

    class Sp4kAppsCartPricingApp
    {

        public function __construct(Registry $state)
        {
            $this->state = $state;

        }

        public static function getInstance($state){
            $pricingAppType = $state->get('product.pricingapp');
            return new $pricingAppType($state);
        }
    }