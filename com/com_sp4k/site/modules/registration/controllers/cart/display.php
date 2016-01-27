<?php

use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 7/16/2015
 * Time: 1:17 PM
 */


class Sp4kModulesRegistrationControllersCartDisplay extends Sp4kBaseControllerDisplay
{
    public function execute()
    {
        if(JFactory::getUser()->guest){
            //if not logged in show them the login/register screen
            $model = new Sp4kModulesRegistrationModelsGuest(
                new  Registry($this->input->getArray())
            );
            $view = new Sp4kModulesRegistrationViewsGuestHtml($model);
        }else{
            //they are logged in. Now we need to know which of their children are attending, and give them the chance
            // to add more to the system.

            $model = new Sp4kModulesRegistrationModelsCartDisplay(
                new  Registry($this->input->getArray())
            );

            $view = new Sp4kModulesRegistrationViewsAttendeesHtml($model);
        }


        echo $view->render();
    }
}