<?php

    error_reporting(0);
    use Joomla\Registry\Registry;
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 5:38 PM
     */


    abstract class Sp4kAppsAbstractItems implements Sp4kAppsInterfacesItems
    {
        use Sp4kAppsAbstractTrait;

        /** @var Sp4kAppsAbstractItem[] */
        public $items;
        public $count;

        /** @var $_key */

        public function __construct(Registry $state = null)
        {
            $this->_statekey =  get_class($this);

            /** @var Joomla\Registry\Registry _state */
            $this->getState()->merge($state);

            $this->execute();
        }


        public function execute()
        {
            //if its an array of id's, we load them, if its an array of data, with bind them.
            if ($this->getState()->get('data',FALSE)){
                $this->bind();
            }elseif($this->getState()->get('keys',FALSE)){
                $this->load();
            }else{
                $this->filter()->load();
            }
        }

        protected function load()
        {
            foreach($this->getState()->get('keys',[]) as $key){
                $this->items[] = $this->getItemInstance(
                    new Joomla\Registry\Registry(['id'=>$key,'plugins'=>$this->getState()->get('plugins')])
                );
            }

            return $this;
        }

        protected function bind()
        {
            foreach($this->getState()->get('data',[]) as $itemData){
                $this->items[]= $this->getItemInstance(
                    new Joomla\Registry\Registry($itemData)
                );
            }
        }

        public function filter()
        {

            $this->getState()->set('keys',
                array_map(
                    function(&$value){
                        return $value->get($this->_key);
                    },
                    $this->getTable()->filter(
                        (array)$this->getState()->get('filters',[]),
                        array_map(
                            function(&$field_value){
                                return $this->getTableAlias().'.'.$field_value;
                            },
                            array_merge(
                                [$this->_key],
                                $this->getState()->get('fields',[])
                            )
                        ),
                        $this->getState()->get('limit',null),
                        $this->getState()->get('count',false),
                        $this->getState()->get('joins',false)
                    )
                )
            );

            if($this->getState()->get('count',false)){
                $this->count = $this->getTable()->count;
                $this->getTable()->count = 0;
            }

            return $this;
        }

        public function update()
        {
            foreach($this->items as $item){
                $item->update();
            }

            return $this;
        }

        public function publish()
        {
            foreach($this->items as $item){
                $item->publish();
            }

            return $this;
        }

        public function delete()
        {
            foreach($this->items as $item){
                $item->delete();
            }

            return $this;
        }

        public function getItems()
        {
            return $this->items;
        }
    }
