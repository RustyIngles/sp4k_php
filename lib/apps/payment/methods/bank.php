<?php

    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/30/2015
     * Time: 12:38 AM
     */

    use Joomla\Registry\Registry;

    class Sp4kAppsPaymentMethodsBank
    {
        public $status;

        protected $_error;
        protected $_state;

        public function __construct( Registry $state){
            $this->_state = $state;
        }

        /*
         * todo make dynamically control whether to check for account based on provider api.
         */
        public function initializeAgreement(){
            if(!$this->userHasAccount()){
               $this->createUserAccount();
            }

            if(!$this->getError()){
                $this->createUserAgreement();
            }

        }

        /*
         * todo dynamically control provider api.
         */
        private function userHasAccount(){
            $paymentMethodApp = Sp4kAppsEasycollectApp::getInstance(
              new Registry([
                  'juser_id'=>JFactory::getUser()->id
              ])
            );

            if($pm_ref_user_id = $paymentMethodApp->getCustomer()->guid){
                //if a customer matching this registered user is found, set the payment method reference user id in the state.
                $this->_state->set('agreement.guid',$pm_ref_user_id);
                $return = true;
            }else{
                $return = false;
            }

            return $return;
        }

        private function createUserAccount(){

            $this->buildUser();

            $paymentMethodApp = Sp4kAppsEasycollectApp::getInstance(
                $this->_state->extract('user')
            );

            $pm_ref_user_id = $paymentMethodApp->addCustomer()->id;

            if(!$this->_error = $paymentMethodApp->getError()){
                $this->_state->set('agreement.guid',$pm_ref_user_id);
            }
        }

        private function createUserAgreement(){

            //need the account infos.

            $this->agreement_id = Sp4kAppsEasycollectApp::getInstance(
                $this->_state->extract('agreement')
            )->addContract()->id;


        }

        private function buildUser()
        {
            $sp4k_user = Sp4kAppsParentApp::getInstance(
                new Registry([
                    'filters'=>[
                        'juser_id'=>JFactory::getUser()->id
                    ]
                ])
            )->getItems()[0];

            $user = new stdClass();
            $user->customerRef = $sp4k_user->id;
            $user->title = $sp4k_user->title;
            $user->firstName = $sp4k_user->f_name;
            $user->surname = $sp4k_user->l_name;
            $user->postCode = $sp4k_user->address_postalcode = $this->_state->get('paymentinfo')->address_postalcode;
            $user->line1 = $sp4k_user->address_street1  = $this->_state->get('paymentinfo')->address_postalcode;
            $user->line2 = $sp4k_user->address_street2 = $this->_state->get('paymentinfo')->address_postalcode;
            $user->homePhoneNumber = $sp4k_user->phone_home;
            $user->mobilePhoneNumber = $sp4k_user->phone_mobile;
            $user->email = JFactory::getUser()->email;
            $user->accountHolderName = $this->_state->get('paymentinfo')->accountHolderName;
            $user->accountNumber = $this->_state->get('paymentinfo')->accountNumber;
            $user->bankSortCode = $this->_state->get('paymentinfo')->bankSortCode;

            $this->_state->set('user',$user);
        }

        public function getError()
        {
            return $this->_error;
        }
    }