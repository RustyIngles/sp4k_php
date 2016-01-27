<?php
    use Joomla\Registry\Registry;

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/5/2015
 * Time: 11:51 AM
 */


    class Sp4kModulesProductModelsItems extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsProductItems[] */
        public $items;

        protected function execute()
        {
            $this->state->set('plugins',$this->state->get('plugins',false));

            $app = new Sp4kAppsProductApp(
                new Joomla\Registry\Registry($this->state->toObject())
            );

            $items = new Registry( $app->getItems() );
            if($this->state->get('nest',false)) {
                $this->items[] = (array)$this->create_tree($items->toArray());
            }else{
                $this->items = $items->toArray();
            }
        }

        function create_tree ($items,$return_parent = false) {

            $return_item = array_shift($items);
            if ($return_item['lft'] + 1 == $return_item['rgt'])
                $return_item['leaf'] = true;
            else {
                foreach ($items as $key=>$item) {

                    //if possible descendant
                    if (
                        $item['lft'] > $return_item['lft']
                    &&
                        $item['rgt'] < $return_item['rgt']
                    &&
                        $return_item['id'] == $item['parent_id']
                    ) {
                        $return_item['children'][] = $this->create_tree($items);
                    }

                    foreach ($items as $child_key => $child) {
                        if ($child['rgt'] < $items['rgt'])
                            unset($items[$child_key]);
                    }

                    unset($items[$key]);
                }
            }

            return $return_item;
        }
    }