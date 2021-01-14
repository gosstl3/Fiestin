<?php

class RolesModel extends Mysql
{
    //DECLARA LAS VARIABLES QUE SE USARAN EN LOS METODOS.
    public $intIdrol;
    public $strRol;
    public $strDescription;
    public $intEstatus;
    
    public function __construct()
    {
        parent::__construct();
    }

        //EXTRAE TODOS LOS ROLES
        public function selectRoles()
        {
            
            $sql = "SELECT * FROM rol WHERE estatus != 0";
            $request = $this->select_all($sql);
            return $request; 
        }

        //EXTRAE SOLO UN ROLE
        public function selectRol(int $idrol)
        {
            //BUSCAR ROL
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
            $request = $this->select($sql);
            return $request;

        }

    //INSERTA LOS DATOS DE ROL
    public function insertRol(string $rol, string $descripcion, int $estatus)
    {
        $return = "";
        $this->strRol = $rol;
        $this->strDescription = $descripcion;
        $this->intEstatus = $estatus;

        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
        $request = $this->select_all($sql);

        if (empty($request)) {
            $query_insert = "INSERT INTO rol(nombrerol, descripcion, estatus) VALUES(?,?,?)";
            $arrData = array($this->strRol, $this->strDescription, $this->intEstatus);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

	public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
        $this->intIdrol = $idrol;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intEstatus = $status;

        $sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
        $request = $this->select_all($sql);

        if(empty($request))
        {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol ";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intEstatus);
            $request = $this->update($sql,$arrData);
        }else{
            $request = "exist";
        }
        return $request;			
    }

    public function deleteRol(int $idrol)
    {
        $this->intIdrol = $idrol;
        $sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
        $request = $this->select_all($sql);
        if(empty($request))
        {
            $sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol ";
            $arrData = array(0);
            $request = $this->update($sql,$arrData);
            if($request)
            {
                $request = 'ok';	
            }else{
                $request = 'error';
            }
        }else{
            $request = 'exist';
        }
        return $request;
    }
}
?>