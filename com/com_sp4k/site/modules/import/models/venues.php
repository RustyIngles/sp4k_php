<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportModelsVenues extends JModelBase
    {
        public function import()
        {

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");
            if (!$sugarTableConnection) {
                $this->error = 'could not connect to db.';
            }

            $selectSugarVenuesTableSql =
                ' SELECT * FROM s4ks_location';
            $resource = mysqli_query($sugarTableConnection, $selectSugarVenuesTableSql);

            while ($row = $resource->fetch_assoc()) {
                $newVenue['created']                           = strtotime($row['date_entered']);
                $newVenue['created_by']                        = 0;
                $newVenue['title']                             = $row['name'];
                $newVenue['description']                       = $row['description'];
                $newVenue['status']                            = $row['deleted'];
                $newVenue['bookable']                          = 1;
                $newVenue['capacity']                          = $row['capacity'];
                $newVenue['website']                           = $row['website'];
                $newVenue['address_shipping_street1']          = $row['shipping_address_street1'];
                $newVenue['address_shipping_street2']          = $row['shipping_address_street2'];
                $newVenue['address_shipping_city']             = $row['shipping_address_city'];
                $newVenue['address_shipping_state']            = $row['shipping_address_state'];
                $newVenue['address_shipping_postalcode']       = $row['shipping_address_postalcode'];
                $newVenue['address_shipping_country']          = $row['shipping_address_country'];
                $newVenue['address_billing_street1']           = $row['billing_address_street1'];
                $newVenue['address_billing_street2']           = $row['billing_address_street2'];
                $newVenue['address_billing_city']              = $row['billing_address_city'];
                $newVenue['address_billing_state']             = $row['billing_address_state'];
                $newVenue['address_billing_postalcode']        = $row['billing_address_postalcode'];
                $newVenue['address_billing_country']           = $row['billing_address_country'];
                $newVenue['phone']                             = $row['phone_office'];
                $newVenue['sugar_assigned_user']               = $row['assigned_user_id'];
                $newVenue['sugar_created_by']                  = $row['created_by'];
                $newVenue['sugar_location_id']                 = $row['id'];
                $venues[] = $newVenue;
            }

            foreach($venues as $venue){
                $venueTable = new Sp4kTablesBase('#__sp4k_venue_items');
                $venueTable->bind($venue);
                $venueTable->store();
            }

        }
    }