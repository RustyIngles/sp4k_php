<?php
    use Joomla\Registry\Registry;
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/7/2015
     * Time: 7:36 AM
     */

    class Sp4kModulesOrderModelsItem extends Sp4kBaseModel
    {
        /** @var  Sp4kAppsRegistrationItem */
        public $item;

        public function execute()
        {
            $this->item = Sp4kAppsOrderApp::getInstance(
                new Joomla\Registry\Registry($this->state->toObject())
            )->getItem();

            foreach($this->item->items as &$line_item){
                foreach(json_decode($this->item->items[0]->product->config) as $index=>$config) {
                    $configModelClass = 'Sp4kModulesOrderModelsPlugins'.ucfirst($index).'Plg';
                    if(class_exists($configModelClass)){
                        $pluginClass = $configModelClass::getInstance(
                            new Registry($config), $line_item);
                    }
                }
            }
        }

        public function update(){
            //look up
            $this->item->update();
        }
    }