<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 2:12 PM
     */

    class Sp4kModulesImportModelsAccounts extends JModelBase
    {
        public function import()
        {

            $parentTable = new Sp4kTablesBase('#__sp4k_parent_items');

            $parents = $parentTable->filter();

            foreach($parents as $parent) {
                $accountTable = new Sp4kTablesBase('#__sp4k_account_items');
                $accountTable->save(['created'=>$parent->created]);
                $parent->account_id = $accountTable->id;
                $parentTable->bind($parent);
                $parentTable->store();
            }
        }
    }