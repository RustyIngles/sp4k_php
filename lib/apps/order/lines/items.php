<?php

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/2/2015
 * Time: 9:49 AM
 */



    class Sp4kAppsOrderLinesItems extends Sp4kAppsAbstractItems
    {
        use Sp4kAppsOrderLinesTrait;


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
    }