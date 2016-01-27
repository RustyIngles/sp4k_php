<?php

    use Joomla\Registry\Registry;

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/16/2015
     * Time: 1:17 PM
     */


    class Sp4kModulesCartControllersProcess extends JControllerBase
    {
        public function execute()
        {
            if(JFactory::getUser()->guest){
                //if not logged in show them the login/register screen
                $model = new Sp4kModulesRegistrationModelsGuest(
                    new  Registry($this->input->getArray())
                );
                $view = new Sp4kModulesRegistrationViewsGuestHtml($model);

                echo $view->render();
            }else{
                $model = new Sp4kModulesCartModelsProcess(
                    new  Registry($this->input->getArray())
                );
                $sessionCart = JFactory::getSession()->get('cart',false,'Sp4k');
                $sessionCart['result'] = $model->getResult();
                JFactory::getSession()->set('cart',$sessionCart,'Sp4k');
                JFactory::$application->redirect('/index.php?option=com_sp4k&view=cart.result');
            }

        }
    }