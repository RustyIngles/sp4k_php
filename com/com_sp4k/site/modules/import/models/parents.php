<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportModelsParents extends JModelBase
    {
        public $continue = true;
        public $start = 0;

        public function import()
        {
            $this->start = $this->state->get('start',0);

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");
            if(!$sugarTableConnection){$this->error = 'could not connect to db.';}
            $selectSugarParentsTableSql =
                ' SELECT p.*,emails.email_address '.
                ' FROM admin_mem99.s4kpe_parent AS p  '.
                ' LEFT JOIN `email_addr_bean_rel` eabr on eabr.bean_module = "s4kpe_parent" and eabr.bean_id = p.id and primary_address = 1 '.
                ' LEFT JOIN `email_addresses` emails on emails.id = eabr.email_address_id and eabr.deleted = 0 '.
                ' group by p.id '.
                ' LIMIT '.$this->start.',200';

            $resource = mysqli_query($sugarTableConnection,$selectSugarParentsTableSql);

            if($resource->num_rows > 0){
                $this->start = $this->start + $resource->num_rows;

                while($row = $resource->fetch_assoc()){
                    $newParent['created']              = strtotime($row['date_entered']);
                    $newParent['createdby_sugar_id']   = $row['created_by'] ;
                    $newParent['status']               = !$row['deleted'];
                    $newParent['f_name']               = $row['first_name'];
                    $newParent['l_name']               = $row['last_name'];
                    $newParent['phone_home']           = $row['phone_home'];
                    $newParent['phone_work']           = $row['phone_work'];
                    $newParent['phone_mobile']         = $row['phone_mobile'];
                    $newParent['address_street1']      = $row['primary_address_street'];
                    $newParent['address_street2']      = '';
                    $newParent['address_city']         = $row['primary_address_city'];
                    $newParent['address_state']        = $row['primary_address_state'];
                    $newParent['address_postalcode']   = $row['primary_address_postalcode'];
                    $newParent['address_country']      = $row['primary_address_country'];
                    $newParent['whmcs_id']             = $row['whmcs_id'];
                    $newParent['sms']                  = (int)$row['receive_sms'];
                    $newParent['sugar_id']              = $row['id'];

                    if(
                        isset($row['email_address'])
                        &&
                        $row['email_address'] !=''
                        &&
                        trim($row['first_name'].' '.$row['last_name']) !=''
                        &&
                        !JUserHelper::getUserId($row['email_address'])

                    ){
                        $newParent['juser_id'] = $this->addJoomlaUser(
                            strtolower($row['email_address']),
                            $row['first_name'].' '.$row['last_name'],
                            strtolower($row['email_address']),
                            JUserHelper::genRandomPassword()
                        );
                    }else{
                        $newParent['juser_id'] = 0;
                    }


                    $parentTable = new Sp4kTablesBase('#__sp4k_parent_items');
                    $parentTable->save($newParent);
                };
            }else{

                $this->continue = false;

            }

        }

        private function addJoomlaUser($username, $name, $email, $password) {

            $data = array(
                "name"=>$name,
                "username"=>$username,
                "password"=>$password,
                "password2"=>$password,
                "email"=>$email,
                "block"=>0,
                "groups"=>array ("1" ,"2","300" )
            );

            $user = new JUser;
            if(!$user->bind($data)) {
                throw new Exception("Could not bind data. Error: " . $user->getError());
            }
            if (!$user->save()) {
                throw new Exception("Could not save user. Error: " . $user->getError());
            }
            return $user->id ;
        }
    }