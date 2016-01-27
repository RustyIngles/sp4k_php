<?php
    
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */
    
    
    class Sp4kAppsCategoryItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsCategoryTrait;

        public $id;
        public $title;
        public $description;
        public $parent_id;
        public $state;
        public $createdby;
        public $created;

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
            if(!isset($this->parent_id)){

                //default to root parent
                $this->parent_id = 1;
            }

            $this->getTable()->save($this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();
        }
    }