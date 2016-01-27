<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/12/2015
 * Time: 5:33 PM
 */

class Sp4kModulesCartModelsResultDisplay extends Sp4kBaseModel
{
    public $error = false;
    public $result;

    public function execute()
    {
        $cartSession = JFactory::getSession();
        $cart = ($cart = $cartSession->get('cart',[],'Sp4k')) ? $cart : [];
        $this->result = $cart['result'];

    }
}
