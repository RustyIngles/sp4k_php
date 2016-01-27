<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 12/27/2015
     * Time: 9:24 AM
     */

    use Joomla\Registry\Registry;

    class Sp4kAppsEasycollectCustomerApp
    {
        protected $_state;
        protected $_error;

        public function __construct( Registry $state)
        {
            $this->_state = $state;
        }

        public function getInstance($state)
        {
            return new self($state);
        }

        public function get()
        {
            return Sp4kAppsEasycollectCustomerList::getInstance($this->_state);
        }

        public function add()
        {
            $app = Sp4kAppsEasycollectCustomerAdd::getInstance($this->_state);
            if(!$app->getError()) {
                $juser_id = $this->_state->get('juser_id');
                $guid = $app->getGuid();
                $state = 1;

                $sql = "INSERT INTO #__sp4k_ezcollect_customer_items (juser_id,pm_ref_user_id,state) VALUES ($juser_id,'$guid',$state)";
                JFactory::getDbo()->setQuery($sql)->execute();
            }
            return $app;
        }

        public function edit()
        {
            return Sp4kAppsEasycollectCustomerEdit::getInstance($this->_state);
        }

        public function getError()
        {
            return $this->_error;
        }
    }