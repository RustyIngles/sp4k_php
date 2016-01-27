<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/12/2015
 * Time: 5:38 PM
 */


    abstract class Sp4kObjectsItems
    {
        private $_state;

        /** @var JobsObjectsItem */
        public $items = [];
        protected $_key = 'id';

        public function __construct($state)
        {
            $this->_state = $state;
            $this->execute();
        }


        public function execute()
        {
            //if its an array of id's, we load them, if its an array of data, with bind them.
            if ($this->_state->get('data',FALSE)){
                $this->bind();
            }elseif($this->_state->get('keys',FALSE)){
                $this->load();
            }else{
                $this->filter()->load();
            }
        }

        private function load()
        {
            if($keys = (array)$this->_state->get('keys',FALSE)){
                foreach($keys as $key){
                    $this->items[] = $this->getItemInstance([$this->_key=>$key->id]);
                }
            }

            return $this;
        }

        private function bind()
        {

        }

        public function filter()
        {

            $this->_state->set('keys',
                /** @var JobsTablesBase $table */
                $this->getTable()->filter(
                    (array)$this->_state->get('filters'),'id'
                )
            );

            return $this;
        }

        public function update()
        {
            foreach($this->items as $item){
                $item->update();
            }
        }

        public function publish()
        {
            foreach($this->items as $item){
                $item->publish();
            }
        }

        public function delete()
        {
            foreach($this->items as $item){
                $item->delete();
            }
        }

        abstract function getItemInstance($state);

        abstract function getTable();
    }
