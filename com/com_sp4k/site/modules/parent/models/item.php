<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesParentModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsParentItem */
        public $item;

        public function execute()
        {
            $app = new Sp4kAppsParentApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );
            $this->item = $app->getItem();
        }

        public function update()
        {
            if(!isset($this->item->account_id)){
                $account = Sp4kAppsAccountApp::getInstance(
                    new Registry(['created'=>time()])
                )->getItem()->update();

                $this->item->account_id = $account->id;
            }

            if($this->item->juser_id == null || $this->item->juser_id == 0){
                if(
                    isset($this->item->email)
                &&
                    $this->item->email !=''
                &&
                    trim($this->item->f_name.' '.$this->item->l_name) !=''
                &&
                    !JUserHelper::getUserId($this->item->email)

                ){
                    $this->item->juser_id = $this->addJoomlaUser(
                        strtolower($this->item->email),
                        $this->item->f_name.' '.$this->item->l_name,
                        strtolower($this->item->email),
                        JUserHelper::genRandomPassword()
                    );
                }else{
                    $this->item->juser_id  = 0;
                }
            }

            if($this->state->get('children',false)){
                foreach($this->state->get('children') as $child){
                    $childAppItem = Sp4kAppsChildApp::getInstance(
                        new Registry( $child)
                    )->getItem();

                    $childAppItem->account_id = $account->id;

                    $childAppItem->update();
                }
            }

            $this->item->update();
        }

        public function delete()
        {
            $this->item->delete();
        }

        private function addJoomlaUser($username, $name, $email, $password) {

            $data = array(
                "name"=>$name,
                "username"=>$username,
                "password"=>$password,
                "password2"=>$password,
                "email"=>$email,
                "block"=>0,
                "groups"=>array ("1" ,"2","300" )
            );

            $user = new JUser;
            if(!$user->bind($data)) {
                throw new Exception("Could not bind data. Error: " . $user->getError());
            }
            if (!$user->save()) {
                throw new Exception("Could not save user. Error: " . $user->getError());
            }
            return $user->id ;
        }
    }