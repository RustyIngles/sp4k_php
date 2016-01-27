<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsVenueItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsVenueTrait;

        public $id;
        public $title;
        public $description;
        public $image;
        public $created;
        public $created_by;
        public $directions;
        public $state;
        public $status;
        public $bookable;
        public $capacity;
        public $website;
        public $email;
        public $contacts;
        public $address_facility_street1;
        public $address_facility_street2;
        public $address_facility_city;
        public $address_facility_state;
        public $address_facility_postalcode;
        public $address_facility_country;
        public $address_shipping_street1;
        public $address_shipping_street2;
        public $address_shipping_city;
        public $address_shipping_state;
        public $address_shipping_postalcode;
        public $address_shipping_country;
        public $address_billing_street1;
        public $address_billing_street2;
        public $address_billing_city;
        public $address_billing_state;
        public $address_billing_postalcode;
        public $address_billing_country;
        public $phone;

        protected $_toJson = ['contacts'];

    }