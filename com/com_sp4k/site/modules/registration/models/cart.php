<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

    class Sp4kModulesRegistrationModelsCart extends Sp4kBaseModel
    {
        public function execute()
        {
            //get the event, get the children.
            //gonna need to use the session.
            //what is a cart item? An attendee at an event, and all the event cost adjustments applied.
            foreach($this->state->get('children') as $child){$x=1;}

            //so take the product pricing option and multiply it by the number of kids.
        }
    }
