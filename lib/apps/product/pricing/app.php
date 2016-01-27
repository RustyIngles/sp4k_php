<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/14/2015
     * Time: 2:10 PM
     */

    class Sp4kAppsProductPricingApp
    {
        public static function getInstance($config){

            $className = 'Sp4kAppsProductPricing';
            $className .= json_decode($config)->pricing->type;

            return $className::getInstance(json_decode($config));
        }
    }