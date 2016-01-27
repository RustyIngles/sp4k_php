<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 7:34 PM
     */

    use Joomla\Registry\Registry;

    class Sp4kModulesCartModelsAddEventDisplay extends Sp4kBaseModel
    {
        private $type;

        public function execute(){
            $this->type = $this->getType();
        }

        public static function getInstance($state)
        {
            $self = new self($state);
            $typeClass = 'Sp4kModulesCartModelsAddEvent'.ucfirst($self->type).'Display';
            return new $typeClass();
        }

        private function getType()
        {
            return Sp4kAppsProductApp::getInstance(
                new Registry(['id'=>Sp4kAppsEventApp::getInstance(//get the event object so we can get the product_id
                    new Registry(['id'=>$this->state->get('event_id')])
                )->getItem()->product_id])
            )->getItem()->pricing->type;
        }
    }

