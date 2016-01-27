<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/8/2015
     * Time: 1:19 PM
     */

    class Sp4kModulesAccountModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsAccountItem */
        public $id;
        public $created;
        public $orders = [];
        public $children = [];
        public $parents = [];
        public $subscriptions = [];
        public $registrations = [];
        private $account;

        public function execute()
        {
            $app = new Sp4kAppsAccountApp(
                new Registry($this->state->toObject())
            );
            $this->item = $app->getItem();
            $this->id = $this->item->id;
            $this->created = $this->item->created;

            $accountFilter = ['filters'=>['account_id'=>$this->id]];

            if($this->item->id != null){
                $this->item->parents = Sp4kAppsParentApp::getInstance(
                    new Registry( $accountFilter )
                )->getItems();

                foreach($this->item->parents as &$parent){
                    $juser = JFactory::getuser($parent->juser_id);
                    $parent->name = $juser->name;
                    $parent->email = $juser->email;
                }

                $this->item->children = Sp4kAppsChildApp::getInstance(
                    new Registry( $accountFilter )
                )->getItems();

                foreach($this->item->children as $child){
                    $this->item->registrations = $this->item->registrations +
                        Sp4kAppsRegistrationApp::getInstance(
                            new Registry(['filters'=>['child_id'=>$child->id]])
                        )->getItems();
                }

                $this->item->subscriptions = Sp4kAppsSubscriptionApp::getInstance(
                    new Registry( $accountFilter )
                )->getItems();

                $this->item->orders = Sp4kAppsOrderApp::getInstance(
                    new Registry( $accountFilter )
                )->getItems();
            }
        }

        public function update()
        {
            $this->item->update();
        }

        public function delete()
        {
            $this->item->delete();
        }
    }