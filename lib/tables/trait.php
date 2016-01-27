<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 1/9/2015
     * Time: 11:16 AM
     */

    trait Sp4kTablesTrait
    {
        /**
         * Get the columns from database table.
         *
         * @return  mixed  An array of the field names, or false if an error occurs.
         *
         * @since   11.1
         * @throws  UnexpectedValueException
         */
        public function getFields()
        {
            static $cache;




            if(!isset($cache[$this->getTableName()]))
            {
                // Lookup the fields for this table only once.
                $name   = $this->_tbl;
                $fields = $this->_db->getTableColumns($name, false);

                if (empty($fields))
                {
                    throw new UnexpectedValueException(sprintf('No columns found for %s table', $name));
                }

                $cache[$this->getTableName()] = $fields;
            }

            return $cache[$this->getTableName()];
        }

        public function filter(array $filters = [], $fields = null, $limit  = false, $count_before_limit = false, $joins = false)
        {

            $results = [];

            /** @var JDatabaseQueryMysqli $query */
            $query = $this->_db->getQuery(true);

            $query->select(isset($fields)?$fields:'*');

            $query->from($this->_db->quoteName($this->getTableName(),$this->_alias));

            foreach($filters as $field=>$value):

                $alias  = isset($value['alias']) ? $value['alias'] : $this->_alias;

                if(is_array($value) || is_object($value)):


                    $field = (isset($value['skipfieldquote'] ) && $value['skipfieldquote'])
                        ?
                            $field
                        :
                            $this->_db->quoteName($alias.'.'.$field);

                    $value = (array)$value;

                    $glue       = isset($value['glue'])     ? $value['glue']        : ' AND ';
                    $operator   = isset($value['operator']) ? $value['operator']    : ' = ';

                    $value      =   ( isset( $value['skipquote'] ) &&  $value['skipquote'] )
                        ?
                            $value['value']
                        :
                            $this->_db->quote($value['value']);




                    $query->where($field .' '. $operator .' '. $value , $glue);

                else:

                    $query->where($this->_db->quoteName($alias.'.'.$field) .' = '. $this->_db->quote($value));

                endif;

            endforeach;

            if($joins && is_array($joins) && count($joins)>0){
                foreach($joins as $join){
                    $query->join($join['type'],$join['condition']);
                }
            }

            if(!$count_before_limit && $limit){
                $query->setLimit($limit['limit'],$limit['offset']);
            }


            $this->_db->setQuery($query);
            $result = $this->_db->loadAssocList();

            if($count_before_limit){
                $this->count = count($result);
                $result = array_splice($result,$limit['offset'],$limit['limit']);
            }

            foreach( $result as $row):
                $results[$row[$this->_tbl_key]] = new JObject($row);
            endforeach;

            /** @var array $results */
            return $results;
        }
    }