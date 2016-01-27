<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportModelsRegistrations extends JModelBase
    {
        public $continue = true;
        public $start = 0;

        private $mci_table = 's4ks_class_s4ks_membership_1_c';
        private $mci_table_membership_id = 's4ks_class_s4ks_membership_1s4ks_membership_idb';
        private $mci_table_class_id = 's4ks_class_s4ks_membership_1s4ks_class_ida';

        //private $cli_table = 's4ks_location_s4ks_class_1_c';
        //private $cli_table_location_id = 's4ks_location_s4ks_class_1s4ks_location_ida';
        //private $cli_table_class_id ='s4ks_location_s4ks_class_1s4ks_class_idb';

        private $cmi_table = 's4kpe_child_s4ks_membership_1_c';
        private $cmi_table_child_id = 's4kpe_child_s4ks_membership_1s4kpe_child_ida';
        private $cmi_table_membership_id = 's4kpe_child_s4ks_membership_1s4ks_membership_idb';

        public function import()
        {
            $this->start = $this->state->get('start', 0);

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");

            if (!$sugarTableConnection) {
                $this->error = 'could not connect to db.';
            }

            $selectSugarParentsTableSql =
                ' SELECT  c.id child_id,p.id product_id,o.id order_id, o.account_id account_id, '.
                ' m.id sugar_membership_id, m.start_date date_start,m.expiry_date date_end,'.
                ' m.date_entered created, m.status status, m.deleted state '.
                ' FROM admin_mem99.s4ks_membership AS m ' .
                
                //join the membership/class index on membership id
                ' LEFT JOIN admin_mem99.'.$this->mci_table.' mci on '.
                'mci.'.$this->mci_table_membership_id.' = m.id'.
                
                //join the class/location index on class id
                //' LEFT JOIN admin_mem99.'.$this->cli_table.' cli on '.
                //'cli.'.$this->cli_table_class_id.' = mci.'.$this->mci_table_class_id.

                //join the child/membership index on membership id
                ' LEFT JOIN admin_mem99.'.$this->cmi_table.' cmi on '.
                'cmi.'.$this->cmi_table_membership_id.' = m.id'.

                //join the product on mci.class_id
                ' LEFT JOIN clients_sp4k.z_sp4k_product_items p on p.sugar_class_id = mci.'.$this->mci_table_class_id.

                //join the venue_items on location id
                //' LEFT JOIN clients_sp4k.z_sp4k_venue_items v on v.sugar_location_id = cli.'.$this->cli_table_location_id.

                //join the child_items on sugar_id = membership id
                ' LEFT JOIN clients_sp4k.z_sp4k_child_items c on c.sugar_child_id = cmi.'.$this->cmi_table_child_id.

                //joing orders on sugar_membership_id = membership id
                ' LEFT JOIN clients_sp4k.z_sp4k_order_items o on o.sugar_membership_id = m.id'.

                //join the account items on
                //' LEFT JOIN clients_sp4k.z_sp4k_account_items a on a.id = c.account_id'.

                ' GROUP BY sugar_membership_id '.

                ' LIMIT ' . $this->start . ',200';

            $resource = mysqli_query($sugarTableConnection, $selectSugarParentsTableSql);

            if ($resource->num_rows > 0) {

                $this->start = $this->start + $resource->num_rows;

                while ($row = $resource->fetch_object()) {
                    $registrationTable = new Sp4kTablesBase('#__sp4k_registration_items');
                    $registration      = new stdClass();

                    $registration->created              = strtotime($row->created);
                    $registration->account_id           = $row->account_id;
                    $registration->order_id             = $row->order_id;
                    $registration->product_id           = $row->product_id;
                    $registration->child_id             = $row->child_id;
                    $registration->date_start           = strtotime($row->date_start);
                    $registration->date_end             = strtotime($row->date_end);
                    $registration->state                = !$row->state;
                    $registration->status               = $row->status;
                    $registration->sugar_membership_id  = $row->sugar_membership_id;

                    $registrationTable->save($registration);
                }

            }else{

                $this->continue = false;

            }
        }
    }