<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class JobsObjectsApplicantItems extends JobsObjectsItems
    {
        private $_table = false;

        public static function getInstance($state)
        {
            return new self($state);
        }

        public function getItemInstance( Joomla\Registry\Registry $state)
        {
            return JobsObjectsApplicantItem::getInstance($state);
        }

        public function getTable()
        {
            return
                $this->_table
                    ?
                    $this->_table
                    :
                    $this->_table = new JobsTablesBase('#__jobs_applicant_items','id');
        }
    }