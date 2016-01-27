    <?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/12/2015
     * Time: 3:56 PM
     */


    class Sp4kAppsPaypalApp extends Sp4kAppsAbstractApp
    {
        use Sp4kAppsPaypalTrait;

        /** @var  Sp4kAppsPaypalItem */
        public $item;

        /** @var  Sp4kAppsPaypalItems[] */
        public $items;

        protected $_statekey = 'Sp4kAppsPaypalApp';

        public function getItem()
        {
            return $this->item = $this->getItemInstance($this->getState());
        }

    }