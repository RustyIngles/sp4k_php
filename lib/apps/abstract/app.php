<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/12/2015
 * Time: 7:36 PM
 */


    abstract class Sp4kAppsAbstractApp implements Sp4kAppsInterfacesApp
    {
        use Sp4kAppsAbstractTrait;

        /** @var Sp4kAppsAbstractItem * */
        public $item = false;

        /** @var Sp4kAppsAbstractItems[] * */
        public $collection = false;

        public function __construct(Joomla\Registry\Registry $state = null)
        {
            $this->_statekey = get_class($this);
            $this->getState()->merge($state);
        }

        /**
         * @return Sp4kAppsAbstractItem
         */
        public function getItem()
        {
            return $this->item = $this->getItemInstance($this->getState());
        }

        public function getCollection()
        {
            return $this->getItemsInstance($this->getState());
        }

        public function getItems()
        {
            $this->collection = $this->getItemsInstance($this->getState());
            return $this->collection->getItems();
        }

        public function update()
        {
            if($this->item){
                $this->item->update();
            }elseif($this->collection){
                $this->collection->update();
            }else{
                $this->_error = "Unable to update; no data loaded.";
            }
        }
    }