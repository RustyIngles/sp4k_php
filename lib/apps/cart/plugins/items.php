<?php

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/2/2015
 * Time: 9:49 AM
 */

    class Sp4kAppsCartPluginsItems extends Sp4kAppsAbstractItems
    {
        use Sp4kAppsCartPluginsTrait;

        public function execute()
        {
            //if its an array of id's, we load them, if its an array of data, with bind them.
            if (count($this->getState()->toArray() )>0){
                $this->bind();
            }else{
                //load from session directly
            }
        }


        protected function bind()
        {
            //first we start with grouped items.
            foreach($this->getState()->toArray() as $itemType=>$itemTypeGroupItems){
                foreach($itemTypeGroupItems as $item){
                    $this->items[$itemType]= $this->getItemInstance(
                        new Joomla\Registry\Registry($item)
                    );
                }

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
                        (array)$this->getState()->get('filters',[]),$this->_key
                    )
                )
            );

            return $this;
        }

        public function update()
        {
            foreach($this->items as $item){
                $item->update();
            }

            return $this;
        }



        public function getItems()
        {
            return $this->items;
        }
    }