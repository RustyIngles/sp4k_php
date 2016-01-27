<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

class Sp4kModulesRegistrationModelsCartDisplay extends Sp4kBaseModel
{
    public $error = false;

    public function execute()
    {

        $cartSession = JFactory::getSession();
        $cart = ($cart = $cartSession->get('sp4k_cart')) ? $cart : [];

        if(count($cart) > 0){
            //foreach cart item build the line item for display;
            $cartApp = Sp4kAppsCartApp::getInstance(new Registry($cart));
            $this->items = $cartApp->getItems();
        }

    }
}
