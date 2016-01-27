<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class Sp4kAppsRruleItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsRruleTrait;

        private $id;
        public $dtstart;
        //public $lastmodified;
        //public $transparent;
        public $freq;
        public $count;
        public $interval;
        public $until;
        public $bysecond;
        public $byminute;
        public $byhour;
        public $byday;
        public $bymonthday;
        public $byyearday;
        public $byweekno;
        public $bymonth;
        public $wkst;

        public function getId(){
            return $this->id;
        }

        protected function load()
        {
            $result = false;

            // Load the table object, empty if _state->data->key = null;
            $this->getTable()->load(
                $this->getState()->get($this->_key,null)//!!!!!!state will be bitwised
            );

            //if we have incoming data, bind it to the table object
            if($this->getState()->get('dtend',false)) {
            //////////?
            }

            $this->_table->bind(
                $this->getState()->toObject()//!!!!!!!!!!!!state must be bitwised
            );

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            $this->getState()->loadArray(get_object_vars($this->_table),true);//state must be unbitwised
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
            //byday must be bitwise!!!

            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();
        }

        public function bitwiseDays(){
            $daybitwise = null;
            $daybits = ['MO'=>2,'TU'=>4,'WE'=>8,'TH'=>16,'FR'=>32,'SA'=>64,'SU'=>128];
            $dayAbreviationsArray = explode(',',$this->byday);
            foreach($dayAbreviationsArray as $day){
                $daybitwise =
                    isset($daybitwise)
                        ?
                            $daybitwise | $daybits[$day]
                        :
                            $daybits[$day];
            }
            $this->byday = $daybitwise;
        }

        public function unBitwiseDays(){
            $dayUnbitwise = [];
            $daybits = ['MO'=>2,'TU'=>4,'WE'=>8,'TH'=>16,'FR'=>32,'SA'=>64,'SU'=>128];
            foreach($daybits as $index=>$daybit){
                if($this->byday & $daybit){
                    $dayUnbitwise[] = $index;
                }
            }

            $dayUnbitwise = implode(',',$dayUnbitwise);

            $this->byday = $dayUnbitwise;
        }

        public function toString()
        {
            $ruleRegistryObject = new Registry($this);
            $ruleArray = array_change_key_case($ruleRegistryObject->toArray(),CASE_UPPER);
            return urldecode(http_build_query($ruleArray,null,';',0));
        }

        public function getDatesBetween( DateTime $startDate = null, DateTime $endDate = null,$extend = false, $inc = false){

            //working with a local copy so we don't have to track dates when used multiple time
            $rrule = clone($this);

            if(isset($startDate))
            {
                $rrule->dtstart = strftime('%Y%m%dT000000Z',$startDate->getTimestamp());
            }else{
                //format the unix epoch
                $rrule->dtstart = strftime('%Y%m%dT000000Z',$rrule->dtstart);
            }

            if(
                !isset($endDate)
            ||
                (
                    (
                        isset($rrule->until)
                    &&
                        $rrule->until < strtotime($endDate->getTimestamp())
                    )
                &&
                    !$extend
                )
            )
            {
                $rrule->until = strftime('%Y%m%dT000000Z',$rrule->until);
            }else{
                $rrule->until = strftime('%Y%m%dT000000Z',$endDate->getTimestamp());//strftime('%Y%m%d',$endDate);
            }



            $rrule_string = $rrule->toString();
            //get the number of dates in the billing period based on the recurrence and the start date.

            $timezone    = JFactory::getConfig()->get('offset');

            //use the event start date $this->state->get('event.rrule.dtstart');
            //$startDate   = new \DateTime(strftime('%Y%m%d',$datestart), new \DateTimeZone($timezone));

            //use the event end date $this->state->get('event.rrule.until');
            //$endDate     = new \DateTime(strftime('%Y%m%d',$datestop), new \DateTimeZone($timezone)); // Optional
            JLoader::registerNamespace('Recurr',JPATH_LIBRARIES);
            JLoader::registerNamespace('Doctrine',JPATH_LIBRARIES);


            $rule = new Recurr\Rule($rrule_string, $startDate, $endDate, $timezone);
            $transformer = new Recurr\Transformer\ArrayTransformer();
            if(isset($startDate)){
                $constraint = new Recurr\Transformer\Constraint\AfterConstraint($startDate,true);
            }else{
                $constraint = null;
            }

            $dateCollection = $transformer->transform($rule,30,$constraint);
            return $dateCollection;

        }
    }