<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/2/2015
 * Time: 9:49 AM
 */

/*
 * todo versioning
 *
 * given a venue, and a product class, find the events for that product class and that venue are active.
 *
 *  we may want to filter for product type, parent category or product_id.
 * product type would be like a skills class.
 * category would be tots
 *
 * select * from events where venue_id = x and product_id = y and product_type = z
 *
 *
 * next we convert the rrule for the events matching to a list of dates, moving forward from today.
 *
 * or we don't use the rrule, just set teh date repeating, and the time. Then show the time in the
 * item list.
 *
 *
 */
    use Joomla\Registry\Registry;

    class Sp4kAppsCartItems extends Sp4kAppsAbstractItems
    {
        use Sp4kAppsCartTrait;

        public function execute()
        {
            //if its an array of id's, we load them, if its an array of data, with bind them.
            if (count($this->getState()->toArray() )>0){
                $this->bind();
            }else{
                //load from session directly
            }
        }

        private function load()
        {
            foreach($this->getState()->get('keys',[]) as $key){
                $this->items[] = $this->getItemInstance(
                    new Joomla\Registry\Registry(['id'=>$key])
                );
            }


            return $this;
        }
        protected function bind()
        {
            //first we start with grouped items.
            foreach($this->getState()->toArray() as $cartKey=>$cartItem){
                    $this->items[$cartKey]= $this->getItemInstance(
                        new Joomla\Registry\Registry($cartItem)
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