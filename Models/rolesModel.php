<?php

class rolesModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }


        public function selectRoles()
        {
            //EXTRAE TODOS LOS ROLES
            $sql = "SELECT * FROM rol WHERE estatus != 0";
            $request = $this->select_all($sql);
            return $request; 
        }
    }
?>