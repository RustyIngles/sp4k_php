<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 7:34 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kModulesCartModelsAddEvent extends Sp4kBaseModel
    {
        private $type;

        public function execute(){
            $this->type = $this->getType();
        }

        public static function getInstance($state)
        {
            $self = new self($state);
            $typeClass = 'Sp4kModulesCartModelsAddEvent'.ucfirst($self->type);
            return new $typeClass();
        }

        private function getType()
        {
            return Sp4kAppsEventApp::getInstance(
                new Registry(['id'=>$this->state->get('event_id')])
            )->getItem()->type;
        }
    }

