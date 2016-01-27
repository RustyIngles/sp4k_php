<?php
    use Joomla\Registry\Registry;
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/18/2015
     * Time: 8:22 AM
     */

    class Sp4kAppsCartPluginsScheduleRecurring
    {

        public $rrule;

        public function __construct($state){
            $this->_state = $state;
            $this->setRrule();
        }

        private function setRrule()
        {
            parse_str(
                str_replace(';','&',$this->_state->get('options')->rrule),
                $rrule
            );


            $this->rrule = Sp4kAppsRruleApp::getInstance(
                new Registry(
                    array_change_key_case(
                        $rrule
                    )
                )
            )->getItem();

        }
    }