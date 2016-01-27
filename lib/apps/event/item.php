<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsEventItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsEventTrait;

        /**
         * @var Sp4kAppsScheduleApp
         */

        public $id;
        public $venue_id;
        public $product_id;
        public $timestart;
        public $timeend;
        public $datestart;
        public $dateend;
        public $rrule_id;
        public $rrule;

        protected function load(){
            //load the item using the parent method
            parent::load();
            parse_str(
                str_replace(';','&',$this->getState()->get('rrule')),
                $rrule
            );

            $rrule = new Registry(
                array_change_key_case($rrule)
            );

            $rrule->set('dtstart',$this->getState()->get('datestart'));
            $rrule->set('until',$this->getState()->get('dateend'));
            $rrule->set('id',$this->getState()->get('rrule_id'));

            /** @var Sp4kAppsRruleItem $rrule */
            $rrule = Sp4kAppsRruleApp::getInstance($rrule)->getItem();
            $rrule->dtstart = strftime('%Y%m%dT115959Z',$rrule->dtstart);
            $rrule->until = strftime('%Y%m%dT115959Z',$rrule->until);
            $this->getState()->set('rrule',$rrule->toString());
        }

        protected function bind()
        {
            $stateProperties = $this->getState()->toArray();

            foreach( get_object_vars($this) as $index=>$property){//get the defined properties for this class.
                if(array_key_exists($index,$stateProperties)){//if the state contains an index of the same name
                    $this->$index = $stateProperties[$index];//assign its value to this instance.
                }
            }
        }

        public function update()
        {

            //update the rule in case its new so we can get the rrule id

            //update the event item.


            parse_str(
                str_replace(';','&',$this->getState()->get('rrule')),
                $rrule
            );

            $rrule = new Registry(
                array_change_key_case($rrule)
            );

            $rrule->set('dtstart',$this->datestart);
            $rrule->set('until',$this->dateend);
            $rrule->set('id',$this->rrule_id);

            /** @var Sp4kAppsRruleItem $rrule */
            $rrule = Sp4kAppsRruleApp::getInstance($rrule)->getItem();

            $this->getState()->set('rrule',$rrule->toString());

            $rrule->update();

            $rrule->dtstart = strftime('%Y%m%dT115959Z',$this->datestart);
            $rrule->until = strftime('%Y%m%dT115959Z',$this->dateend);
            $this->rrule_id = $rrule->getId();

            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->getState()->set('rrule',$rrule->toString());// ?? is this necessary ??

            $this->bind();

            return $this;
        }
    }