<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/12/2015
 * Time: 5:38 PM
 */


    abstract class Sp4kObjectsItem
    {
        /** @var \Joomla\Registry\Registry  */
        protected $_state;

        /** @var mixed */
        protected $_error = false;

        /** @var JTable */
        protected $_table = false;


        public function __construct(Joomla\Registry\Registry $state = NULL)
        {
            $this->_state = isset($state) ?  $state : new Joomla\Registry\Registry();
            $this->execute();
        }


        public function execute()
        {
            $this->load();
            $this->bind();
        }

        private function load()
        {
            $result = false;

            // Load the table object, empty if _state->data->key = null;
            $this->getTable()->load(
                $this->_state->get($this->_key,null)
            );

            //if we have incoming data, bind it to the table object
            if($data = $this->_state->get('data',false))$this->_table->bind($data);

            //set the state to the table data.
            $this->_state->set('data',get_object_vars($this->_table));
        }

        private function bind()
        {
            foreach( $this->_state->get('data') as $property_name=>$object_var ){
                $this->$property_name = $object_var;
            }
        }

        public function update()
        {
            $this->getTable()->save($this);

            $this->_state->set('data',
                get_object_vars($this->_table)
            );

            $this->bind();
        }

        public function publish()
        {
            $this->state = 1;
            $this->update();
        }

        public function unpublish()
        {
            $this->state = 0;
            $this->update();
        }

        public function delete()
        {
            $this->getTable()->delete();
        }


        public function getError()
        {
            return $this->_error;
        }

        /**
         * @return  JTable
         */
        abstract  function getTable();
    }
