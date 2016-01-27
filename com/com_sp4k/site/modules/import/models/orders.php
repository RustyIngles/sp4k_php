<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportModelsOrders extends JModelBase
    {
        public $continue = true;
        public $start = 0;

        private $mci_table = 's4ks_class_s4ks_membership_1_c';
        private $mci_table_membership_id = 's4ks_class_s4ks_membership_1s4ks_membership_idb';
        private $mci_table_class_id = 's4ks_class_s4ks_membership_1s4ks_class_ida';

        private $cli_table = 's4ks_location_s4ks_class_1_c';
        private $cli_table_location_id = 's4ks_location_s4ks_class_1s4ks_location_ida';
        private $cli_table_class_id ='s4ks_location_s4ks_class_1s4ks_class_idb';

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
                ' SELECT  c.id child_id,p.id product_id,a.id account_id, '.
                    ' m.id sugar_membership_id, m.start_date date_start,m.expiry_date date_end,m.source `source`,'.
                    ' m.date_entered created '.
                ' FROM admin_mem99.s4ks_membership AS m ' .
                
                //join the membership/class index on membership id
                ' LEFT JOIN admin_mem99.'.$this->mci_table.' mci on '.
                    'mci.'.$this->mci_table_membership_id.' = m.id'.

                //join the child/membership index on membership id
                ' LEFT JOIN admin_mem99.'.$this->cmi_table.' cmi on '.
                    'cmi.'.$this->cmi_table_membership_id.' = m.id'.

                //join the product on mci.class_id
                ' LEFT JOIN clients_sp4k.z_sp4k_product_items p on p.sugar_class_id = mci.'.$this->mci_table_class_id.

                //join the child_items on sugar_id = membership id
                ' LEFT JOIN clients_sp4k.z_sp4k_child_items c on c.sugar_child_id = cmi.'.$this->cmi_table_child_id.


                //join the account items on
                ' LEFT JOIN clients_sp4k.z_sp4k_account_items a on a.id = c.account_id'.

                ' GROUP BY sugar_membership_id '.

                ' LIMIT ' . $this->start . ',200';

            $resource = mysqli_query($sugarTableConnection, $selectSugarParentsTableSql);

            if ($resource->num_rows > 0) {

                $this->start = $this->start + $resource->num_rows;

                while ($row = $resource->fetch_object()) {
                    $orderTable = new Sp4kTablesBase('#__sp4k_order_items');
                    $order      = new stdClass();

                    $order->created             = strtotime($row->created);
                    $order->state               = 1;
                    $order->account_id          = $row->account_id;
                    $order->total               = -1;
                    $order->source              = $row->source;
                    $order->sugar_membership_id = $row->sugar_membership_id;

                    $orderTable->save($order);

                    $orderItem              = new stdClass();
                    $orderItem->created     = strtotime($row->created);
                    $orderItem->order_id    = $orderTable->id;


                    $orderItemData = new stdClass();
                    $orderItemData->product_id          = $row->product_id;
                    $orderItemData->child_id            = $row->child_id;
                    $orderItemData->date_start          = strtotime($row->date_start);
                    $orderItemData->date_end            = strtotime($row->date_end);
                    $orderItemData->price               = 0;
                    //$orderItemData->sugar_membership_id = $row->sugar_membership_id;
                    $orderItem->data  = json_encode($orderItemData);

                    $orderItemTable = new Sp4kTablesBase('#__sp4k_order_line_items');
                    $orderItemTable->save($orderItem);
                }

            }else{

                $this->continue = false;

            }
        }
    }