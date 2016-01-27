<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/18/2015
 * Time: 1:14 PM
 */

    class Sp4kModulesRegistrationModelsVenue extends Sp4kBaseModel
    {
        /** @var  Sp4kAppVenueApp */
        public $venueApp        = null;

        /** @var  int */
        public $selected        = false;

        public function __construct($state = null)
        {
            parent::__construct($state);
            $this->execute();
        }

        /**
         *
         * Initialize the model.
         * If no location is selected then load a list of locations.
         *
         */
        public function execute()
        {
            $this->selected = $this->state->get('venue_id');

            $this->venueApp = new Sp4kAppVenueApp(
                new Joomla\Registry\Registry(
                        ['filter'=>
                            [
                                'id'=>
                                    [
                                        'operator'=>'!=',
                                        'value'=>0,
                                        'skip_quote'=>true
                                    ]
                            ]
                        ]
                )
            );

        }
    }