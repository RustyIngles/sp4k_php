<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 7:19 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kModulesCartModelsAddPluginsBooking
    {
        public static function getInstance($state){
            $className = 'Sp4kModulesCartModelsAddPluginsBooking'.ucfirst($state->get('type'));
            return new $className($state);
        }
    }