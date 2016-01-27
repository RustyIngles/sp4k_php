<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportModelsMemberships extends JModelBase
    {
        public function import()
        {
            $orderTable = new Sp4kTablesBase('#__sp4k_order_items');

            $parents = $orderTable->filter();

            foreach($parents as $parent) {
                $accountTable = new Sp4kTablesBase('#__sp4k_account_items');
                $accountTable->save([]);
                $parent->account_id = $accountTable->id;
                $orderTable->bind($parent);
                $orderTable->store();
            }
        }
    }