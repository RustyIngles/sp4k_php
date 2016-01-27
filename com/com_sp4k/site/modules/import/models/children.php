<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportModelsChildren extends JModelBase
    {
        public $continue = true;
        public $start = 0;

        public function import()
        {
            $this->start = $this->state->get('start',0);

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");
            if (!$sugarTableConnection) {
                $this->error = 'could not connect to db.';
            }

            $sql =
                ' select c.*,c.id child_id, p.id parent_id, p.account_id account_id '.
                ' from admin_mem99.s4kpe_child c'.
                //link the parent/child  index on the child id.
                ' LEFT JOIN admin_mem99.s4kpe_parent_s4kpe_child_1_c pc on pc.s4kpe_parent_s4kpe_child_1s4kpe_child_idb = c.id'.
                ' LEFT JOIN clients_sp4k.z_sp4k_parent_items p on p.sugar_id = pc.s4kpe_parent_s4kpe_child_1s4kpe_parent_ida '.
                ' LIMIT '.$this->start.',200';

            $resource = mysqli_query($sugarTableConnection,$sql);

            if($resource->num_rows >0){

                $this->start = $this->start + $resource->num_rows;

                while($row = $resource->fetch_object()){

                    $childTable = new Sp4kTablesBase('#__sp4k_child_items');

                    $child                      = new stdClass();
                    $child->parent_id           = $row->parent_id;
                    $child->account_id          = $row->account_id;
                    $child->created             = strtotime($row->date_entered);
                    $child->name                = $row->first_name.' '.$row->last_name;
                    $child->dob                 = strtotime($row->dob);
                    $child->sugar_child_id      = $row->child_id;

                    $childTable->save($child);
                }

            }else{

                $this->continue = false;

            }
        }
    }