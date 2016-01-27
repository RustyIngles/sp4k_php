<?php
use Joomla\Registry\Registry;

/**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */

    /** todo: prevent changing order after paymentId */

    class Sp4kAppsOrderItem extends Sp4kAppsAbstractItem
    {
        use Sp4kAppsOrderTrait;

        public $id;
        public $state;
        public $created;
        public $account_id;
        public $total;
        public $items;
        public $source;
        protected $_toJson = [];

        public $error = false;


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
                    if(in_array($index,$this->_toJson) && !is_string($stateProperties[$index]))
                        $stateProperties[$index] = json_encode($stateProperties[$index]);
                    $this->$index = $stateProperties[$index];//assign its value to this instance.
                }
            }

            $this->items =Sp4kAppsOrderLinesApp::getInstance(
                new Registry(
                    [
                        'data'=>$this->getState()->get('items',false),
                        'filters'=>[
                            'order_id'=>$this->getState()->get('id')
                        ]

                    ]
                )
            )->getItems();

            $this->parent = Sp4kAppsParentApp::getInstance(
                new Registry([
                    'filters'=>['account_id'=>$this->getState()->get('account_id'),'primary'=>1],
                    'keys'=>false
                ])
            )->getItems()[0];
        }

        public function update()
        {

            if(!isset($this->created)){
                $this->created = time();
            }

            $this->state = 1;

            $this->getTable()->addJsonEncodedField('data')->save((array)$this);
            $this->getState()->loadArray(get_object_vars($this->_table));
            $this->bind();

            foreach($this->items as &$item){
                $item->order_id = $this->id;
                $item->update();
            }

            $this->getState()->set('items',$this->items);

            //$this->bind();


            return $this;
        }
    }