<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/17/2015
     * Time: 4:21 PM
     */

    class Sp4kModulesOrderModelsPluginsBookingPlg extends Sp4kBaseModel
    {

        public static function getInstance($state, &$item)
        {
            if($state->get('enabled')) {

                /** @var Sp4kAppsProductBookingPlg * */
                $className = 'Sp4kModulesOrderModelsPluginsBooking' . ucfirst($state->get('type'));

                if (class_exists($className)) {
                    return $className::getInstance($state, $item);
                }
            }

            return false;
        }

        public function execute()
        {

        }
    }