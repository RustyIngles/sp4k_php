<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsOrderLinesItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsOrderLinesTrait;

        public $id;
        public $created;
        public $order_id;
        public $product_id;
        public $total;
        public $data;
        protected $_toJson  = ['data'];


        public function __construct($state){
            parent::__construct($state);
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
                    if(in_array($index,$this->_toJson) && is_string($stateProperties[$index])) {
                        $stateProperties[ $index ] = (array)json_decode($stateProperties[ $index ]);
                    }

                    $this->$index = $stateProperties[$index];//assign its value to this instance.

                }
            }

            if(isset($this->data['product_id'])){
                $this->product =    Sp4kAppsProductApp::getInstance(
                    new Joomla\Registry\Registry(
                        ['id'=>$this->data['product_id']]
                    )
                )->getItem();
            }
        }

        public function update()
        {
            if(!isset($this->created)){
                $this->created = time();
            }

            $this->getTable()->addJsonEncodedField('data')->save((array)$this);

            $this->getState()->loadArray(get_object_vars($this->_table));

            $this->bind();

            return $this;
        }
    }