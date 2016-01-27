<?php


    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesRefactorModelsProducts extends JModelBase
    {
        public function refactor()
        {

            $tableConnection = new mysqli(".", "root", "2bornot2b", "clients_sp4k");
            if (!$tableConnection) {
                $this->error = 'could not connect to db.';
            }

            $sql =
                'SELECT `id`,`config` from z_sp4k_product_items WHERE id !=1 AND id !=2';

            $this->resource = mysqli_query($tableConnection, $sql);

            while ($row = $this->resource->fetch_assoc()) {
                $config = json_decode($row['config']);
                $config->booking->enabled = true;

                $configJson = json_encode($config);

                $sql  = 'UPDATE z_sp4k_product_items set `config` = \''.$configJson.'\' where id = '.$row['id'];
                $putResource = mysqli_query($tableConnection, $sql);
            }

        }

        private function updateConfig($row)
        {
            while ($row = $resource->fetch_assoc()) {
                $config = json_decode($row['config']);
                $config->booking->enabled = true;

                $configJson = json_encode($config);

                $sql  = 'UPDATE z_sp4k_product_items set `config` = \''.$configJson.'\' where id = '.$row['id'];
                $putResource = mysqli_query($tableConnection, $sql);
            }
        }


    }