<?php


    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportModelsClasses extends JModelBase
    {
        public function import()
        {

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");
            if (!$sugarTableConnection) {
                $this->error = 'could not connect to db.';
            }

            $selectSugarVenuesTableSql =
                ' SELECT c.*,v.id venue_id,cc.capacity_c FROM admin_mem99.s4ks_class c'.
                ' LEFT JOIN admin_mem99.s4ks_location_s4ks_class_1_c lc on lc.s4ks_location_s4ks_class_1s4ks_class_idb = c.id'.
                ' LEFT JOIN admin_mem99.s4ks_class_cstm cc on cc.id_c = c.id'.
                ' LEFT JOIN clients_sp4k.z_sp4k_venue_items v on v.sugar_location_id = lc.s4ks_location_s4ks_class_1s4ks_location_ida';

            $resource = mysqli_query($sugarTableConnection, $selectSugarVenuesTableSql);

            $dayofweekarray = ['monday'=>'MO','tuesday'=>'TU',
                               'wednesday'=>'WE','thursday'=>'TH',
                               'friday'=>'FR','saturday'=>'SA',
                               'sunday'=>'SU'];

            while ($row = $resource->fetch_assoc()) {
                $parent_product_ids = $this->getAgeGroupParentProductIds();

                $newProduct['parent_id']                = $parent_product_ids[$row['age_groups']];
                $newProduct['venue_id']                 = $row['venue_id'];
                $newProduct['created']                  = strtotime($row['date_entered']);
                $newProduct['created_by']               = 0;
                $newProduct['title']                    = $row['name'];
                $newProduct['description']              = $row['description'];
                $newProduct['status']                   = $row['deleted'];
                $newProduct['bookable']                 = 1;
                $newProduct['sugar_course_code']        = $row['course_code'];
                $newProduct['sugar_assigned_user']      = $row['assigned_user_id'];
                $newProduct['sugar_created_by']         = $row['created_by'];
                $newProduct['sugar_class_id']           = $row['id'];

                $config                                             = new stdClass();
                $config->limit                                      = 0;
                $config->taster                                     = true;
                $config->display                                    = 'item';
                $config->membersonly                                = true;

                $config->schedule                                   = new stdClass();
                $config->schedule->enabled                          = true;
                $config->schedule->type                             = 'recurring';

                $parsed = date_parse(strftime('%H:%M',strtotime($row['start_time'])));
                $minutes = $parsed['hour'] * 60 + $parsed['minute'];
                $config->schedule->timestart                        = $minutes;

                $parsed = date_parse(strftime('%H:%M',strtotime($row['end_time'])));
                $minutes = $parsed['hour'] * 60 + $parsed['minute'];
                $config->schedule->timeend                          = $minutes;

                $config->schedule->rrule                            = 'FREQ=WEEKLY;INTERVAL=1;WKST=MO;BYDAY='.$dayofweekarray[$row['day_of_week']];

                $config->pricing                                    = new stdClass();
                $config->pricing->enabled                           = true;
                $config->pricing->type                              = 'unitspercycle';
                $config->pricing->unit_price                        = 1;


                $config->booking                                    = new stdClass();
                $config->booking->type                              = 'subscription';
                $config->booking->enabled                           = true;
                $config->booking->agegroups = new stdClass();
                $config->booking->agegroups->enabled                = true;
                $config->booking->agegroups->agegroup               = $row['age_groups'];
                $config->booking->capacity                          = $row['capacity_c'];

                $config->payment                                    = new stdClass();

                $config->payment->recurring                         = new stdClass();
                $config->payment->recurring->enabled                = true;
                $config->payment->recurring->required               = true;
                $config->payment->recurring->methods                = new stdClass();
                $config->payment->recurring->methods->directdebit   = true;

                $config->payment->paynow                            = new stdClass();
                $config->payment->paynow->enabled                   = true;
                $config->payment->paynow->required                  = true;
                $config->payment->paynow->methods                   = new stdClass();
                $config->payment->paynow->methods->paypal           = true;


                $newProduct['config'] = json_encode($config);

                $products[] = $newProduct;
            }

            foreach($products as $product){
                $productTable = new Sp4kTablesNestedbase('#__sp4k_product_items');
                $productTable->bind($product);
                $productTable->setLocation($product['parent_id'],'last-child');
                $productTable->store();
            }
        }

        private function getAgeGroupParentProductIds()
        {
            return [
                's4k_tots'=>3,
                's4k_toddlers'=>3,
                's4k_strikers'=>4,
                's4k_kickers'=>5,
                's4k_explorers'=>6,
                's4k_primary_school'=>10,
                's4k_academy_u6_u7'=>8,
                's4k_academy_u8_u9'=>9
                ];
        }
    }