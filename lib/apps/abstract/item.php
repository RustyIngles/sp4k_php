<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/12/2015
 * Time: 5:38 PM
 */


    abstract class Sp4kAppsAbstractItem implements Sp4kAppsInterfacesItem
    {
        use Sp4kAppsAbstractTrait;

        /** @var mixed */
        protected $_statekey;
        protected $_toJson = [];


        public function __construct(Joomla\Registry\Registry $state = null)
        {
            $this->_statekey = uniqid();
            $this->getState()->merge($state);
            $this->execute();
        }

        public function execute()
        {
            $this->load();
            $this->bind();
        }

        protected function load()
        {
            $result = false;

            // Load the table object, empty if _state->data->key = null;
            $this->getTable()->load(
                $this->getState()->get($this->_key,null)
            );

            //if we have incoming data, bind it to the table object

            $this->_table->bind(
                $this->getState()->toObject()
            );

            // set the state to the table data so
            // that any empty variables in the incoming data are populated with table data.
            $this->getState()->loadArray(get_object_vars($this->_table),true);
        }

        protected function bind()
        {
            $stateProperties = $this->getState()->toArray();

            foreach( get_object_vars($this) as $index=>$property){//get the defined properties for this class.
                if(array_key_exists($index,$stateProperties)){//if the state contains an index of the same name
                    if(in_array($index,$this->_toJson) && is_string($stateProperties[$index]))
                        $stateProperties[$index] = json_decode($stateProperties[$index]);
                    $this->$index = $stateProperties[$index];//assign its value to this instance.
                }
            }
        }

        public function update()
        {
            if(
                    array_key_exists('created',get_object_vars($this))
                &&
                    !isset($this->created)
            )$this->created = time();

            $this->getTable()->addJsonEncodedField($this->_toJson)->save((array)$this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
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
         * @return  Sp4kTablesBase | Sp4kTablesNestedbase
         */
        abstract  function getTable();
    }
