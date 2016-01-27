<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */


    class JobsObjectsApplicantItem extends JobsObjectsItem
    {
        protected $_table = false;

        /** @var string  */
        protected $_key = 'id';

        public static function getInstance($params)
        {
            return new self(
                new Joomla\Registry\Registry($params)
            );
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