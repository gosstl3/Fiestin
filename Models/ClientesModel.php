<?php

   
class ClientesModel extends Mysql
{
    public $intIdcliente;
    public $strNombre;
    public $strDireccion;
    public $intTelefono;
    public $strCorreo;


    public function __construct()
    {
        parent::__construct();
    }

    public function selectClientes()
    {
        $sql = "SELECT * FROM cliente WHERE idcliente != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function insertCliente(string $nombre, string $direccion, int $telefono, string $correo){
        
        $return = "";
        $this->strNombre = $nombre;
        $this->strDireccion = $direccion;
        $this->intTelefono = $telefono;
        $this->strCorreo = $correo;

        //CONSULTA SI EL CLIENTE YA EXISTEN
        $sql = "SELECT * FROM cliente WHERE nombre = '{this->strNombre}'";
        $request = $this->select_all($sql);
        // SI EL REQUEST ESTA VACIO ENTONCES AGREGA LOS DATOS
        if (empty($request)) {
            $query_insert = "INSERT INTO cliente(nombre, direccion, telefono, correo) VALUES(?,?,?,?)";
            $arrData = array($this->strNombre, $this->strDireccion, $this->intTelefono, $this->strCorreo );
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;



    }

}
?>