<?php

class Proveedor extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Proveedor()
    {
        
        $data['page_tag'] = "Proveedor MRT";
        $data['page_title'] = "Proveedor MRT";
        $data['page_name'] = "Lista de Proveedores MRT";
        $this->views->getView($this, "proveedor", $data);
    }
}
