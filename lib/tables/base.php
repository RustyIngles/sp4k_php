<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 1/9/2015
     * Time: 11:16 AM
     */

    class Sp4kTablesBase extends JTable{
        use Sp4kTablesTrait;

        protected $_alias;

        public function __construct($table,$key = 'id',$alias = null, $db = null)
        {
            $this->_alias = $alias;
            if(!isset($db)) $db = JFactory::getDbo();

            parent::__construct($table, $key, $db);
        }

        public function addJsonEncodedField($fieldnames){
            $this->_jsonEncode =  $this->_jsonEncode + (array)$fieldnames;
            return $this;
        }
    }