<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/30/2015
     * Time: 5:09 AM
     */

    class Sp4kModulesImportModelsCoaches extends JModelBase
    {
        public function import()
        {
            $this->start = $this->state->get('start',0);

            $sugarTableConnection = new mysqli(".", "root", "2bornot2b", "admin_mem99");

            if (!$sugarTableConnection) {
                $this->error = 'could not connect to db.';
            }

            $sql =
                ' SELECT c.*,cc.*, ea.email_address FROM admin_mem99.s4kpe_coach c '.
                ' LEFT JOIN admin_mem99.s4kpe_coach_cstm cc on cc.id_c = c.id '.
                ' LEFT JOIN admin_mem99.email_addr_bean_rel eabr  on eabr.bean_id = c.id and bean_module = "s4kpe_coach" '.
                ' LEFT JOIN admin_mem99.email_addresses ea on ea.id = eabr.email_address_id '.
                ' LIMIT '.$this->start.',200';

            $resource = mysqli_query($sugarTableConnection,$sql);

            if($resource->num_rows >0){
                $this->start = $this->start + $resource->num_rows;

                while($row = $resource->fetch_object()){

                    $coachTable = new Sp4kTablesBase('#__sp4k_coach_items');

                    $coach                      = new stdClass();
                    $coach->created             = strtotime($row->date_entered);
                    $coach->state               = !$row->deleted;
                    $coach->status              = '';
                    $coach->title               = $row->salutation;
                    $coach->name                = $row->first_name.' '.$row->last_name;
                    $coach->phone               = $row->phone_mobile;
                    $coach->driving             = $row->driving_c;
                    $coach->city                = $row->city_c;
                    $coach->kitholder           = $row->kitholder_c;
                    $coach->role                = $row->coachinglevel_c;
                    $coach->reserve             = $row->subsbench_c;
                    $coach->dotw1               = $row->monday_c;
                    $coach->dotw2               = 0;
                    $coach->dotw3               = 0;
                    $coach->dotw4               = 0;
                    $coach->dotw5               = 0;
                    $coach->dotw6               = $row->saturday_c;
                    $coach->dotw7               = $row->sunday_c;
                    $coach->sugar_coach_id      = $row->id;

                    if(
                        isset($row->email_address)
                        &&
                        $row->email_address !=''
                        &&
                        trim($row->first_name.' '.$row->last_name) !=''
                        &&
                        !JUserHelper::getUserId(strtolower($row->email_address))

                    ){
                        $coach->juser_id = $this->addJoomlaUser(
                            strtolower($row->email_address),
                            trim($row->first_name.' '.$row->last_name),
                            strtolower($row->email_address),
                            JUserHelper::genRandomPassword()
                        );
                    }else{
                        $coach->juser_id = 0;
                    }

                    $coachTable->save($coach);
                }

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
                "groups"=>array ("1" ,"2","400" )
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