<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 7:15 AM
 */
    use Joomla\Registry\Registry;

    class Sp4kModulesRegistrationModelsRegistered extends Sp4kBaseModel
    {
        private $parentApp;
        private $childApp;
        public $children;
        public $dateStartOptions = [];

        public function execute()
        {
            //get the user, get their kids and display them as attendee options.

            $this->setChildren();
            $this->setStartDateOptions();
        }

        private function setChildren()
        {
            $parentFilters = new stdClass();
            $parentFilters->juser_id = JFactory::getUser()->id;
            $this->parentApp = Sp4kAppsParentApp::getInstance(
                new Registry(['filters' => $parentFilters])
            );


            $parentAppItems = $this->parentApp->getItems();

            $parent = array_pop($parentAppItems);

            $childFilters = new stdClass();
            $childFilters->parent_id = $parent->id;

            $this->childApp = Sp4kAppsChildApp::getInstance(
                new Registry(['filters' => $childFilters])
            );

            $this->children = $this->childApp->getItems();
        }

        private function setStartDateOptions()
        {

            $this->event_id = JFactory::$application->input->get('event_id');
            $this->event = Sp4kAppsEventApp::getInstance(new Registry(['id'=>$this->event_id]))->getItem();
            //get the event.rrule and calculate start dates for 30 days.

            //get the next viable date.
            //get the dates
            $firstDate = new \DateTime();
            $firstDateThirty = new \DateTime(strftime('%Y%m%d',strtotime('+30days')));

            /** @var Sp4kAppsRruleItem $rrule */
            $rrule = Sp4kAppsRruleApp::getInstance(new Registry(['id'=>$this->event->rrule_id]))->getItem();
            $dateStartCollection = $rrule->getDatesBetween($firstDate,$firstDateThirty);
            $dateStartCollection = $dateStartCollection->toArray();
            foreach( $dateStartCollection  as $dateStartCollectionItem ){
                /** @var DateTime $startDateObject */
                $startDateObject = $dateStartCollectionItem->getStart();
                $this->dateStartOptions[] = $startDateObject->getTimeStamp();
            }
        }
    }