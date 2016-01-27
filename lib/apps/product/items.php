<?php

    use Joomla\Registry\Registry;
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/18/2015
     * Time: 6:11 PM
     */
    
    
    class Sp4kAppsProductItems extends Sp4kAppsAbstractItems
    {
        use Sp4kAppsProductTrait;

        protected $_statekey = 'Sp4kAppsProductItems';

        public function __construct( Registry $state = null){
            $this->getState()->merge($state);
            $filter_root = new stdClass();
            $filter_root->operator = '!=';
            $filter_root->skipquote = true;
            $filter_root->value = 1;

            $filters = $this->getState()->get('filters',[]);
            $filters['id'] = $filter_root;
            $this->getState()->set('filters',$filters);

            parent::__construct($this->getState());
        }
    }