<?php
use Joomla\Registry\Registry;

/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 7:03 AM
 */


    class Sp4kModulesRegistrationModelsAccount extends Sp4kBaseModel
    {
        public $error = false;
        public $juser;
        public $parent;
        public $account;
        public $parent_juser_id;

        public function execute()
        {
            $this->createUser();
            if(!$this->error) {
                $this->createAcount();
               if (!$this->error) {
                    $this->createParent();

                    if (!$this->error) {
                        $this->createChildren();

                        if(!$this->error){
                            $this->loginUser();
                        }
                    }
               }
            }
        }

        public function createUser()
        {
            $name = $this->state->get('f_name').' '.$this->state->get('l_name');
            $username = $this->state->get('email');
            $password1 = $this->state->get('password1');
            $password2 = $this->state->Get('password2');
            $email = $this->state->get('email');

            $data = array(
                "name"=>$name,
                "username"=>$username,
                "password"=>$password1,
                "password2"=>$password2,
                "email"=>$email,
                "groups"=>[2]
            );

            $this->juser = $user = clone(JFactory::getUser());
            //Write to database
            if( !($user->bind($data) && $user->save()) ) {
                $this->error =  $user->getError();
            }else{
                JUserHelper::setUserGroups($user->id,[2]);
            }

            //todo test result and set error on fail.
        }

        private function createAcount(){
            $this->account = Sp4kAppsAccountApp::getInstance(
                new Registry()
            )->getItem()->update();
        }

        private function createParent(){
            $this->parent = Sp4kAppsParentApp::getInstance(
                new Registry([
                    'juser_id'=>$this->juser->id,
                    'account_id'=>$this->account->id,
                    'f_name'=>$this->state->get('f_name'),
                    'l_name'=>$this->state->get('l_name'),
                    'primary'=>1,
                    'sms'=>$this->state->get('sms'),
                    'state'=>1
                ])
            )->getItem()->update();

            //todo test result and set error on fail.
        }

        private function createChildren(){
            foreach($this->state->get('child') as $child){
                $child->dob = strtotime($child->dob);
                $child->account_id = $this->account->id;

                $childItem = Sp4kAppsChildApp::getInstance(
                    new Registry($child)
                )->getItem()->update();
            }

            //todo test result and set error on fail.
        }

        private function loginUser(){
            JPluginHelper::importPlugin('user');
            $options = array();
            $options['action'] = 'core.login.site';

            $pluginResponse = new stdClass();
            $pluginResponse->username = $this->juser->username;
            $result = JFactory::$application
                ->triggerEvent('onUserLogin', array((array)$pluginResponse, $options));
        }
    }