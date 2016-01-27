<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/18/2015
     * Time: 6:55 PM
     */

    class Sp4kModulesRosterModelsItems extends JModelBase
    {
        public function execute()
        {
            //save attendees for product/date combo
            if( $this->state->get('id',false) || $this->state->get('product') ){
                $this->load();
            }elseif($this->state->get('data')){
                $this->save();
            }
        }

        public function load(){
            $date = strtotime('today');
            $product_id = (int)$this->state->get('product');

            $sql = "SELECT * FROM #__sp4k_registration_items WHERE product_id = $product_id";
            $registrations = JFactory::getDbo()->setQuery($sql)->loadAssoc();


            $sql = "select * from #__sp4k_roster_items where product_id = $product_id & date =$date";
            $roster = JFactory::getDbo()->setQuery($sql)->loadAssoc();

            if($roster){
                //build attendees against roster
                $attendees = json_decode($roster['attendees']);

            }else{
                $attendees = false;
                //just build the roster with the registrants
            }

            foreach($registrations as &$registration){
                if($attendees && in_array($registration['child_id'],$attendees)){
                    $registration['attending'] = 1;
                }else{
                    $registration['attending'] = 0;
                }
            }

            $this->roster = $registrations;
        }

        public function save(){
            if($this->state->get('data')['id']){
                JFactory::getDbo()->updateObject($this->state->get('data'));
            }else{
                JFactory::getDbo()->insertObject($this->state->get('data'));
            }
        }
    }