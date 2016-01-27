<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 5:54 PM
 */

    class Sp4kModulesVenueModelsVenue extends JModelBase
    {
        public $venueApp;

        public function __construct($state = null)
        {
            parent::__construct($state);
            $this->execute();
        }

        public function execute()
        {
                $this->venueApp = new Sp4kAppsVenueApp($this->state);
        }
    }