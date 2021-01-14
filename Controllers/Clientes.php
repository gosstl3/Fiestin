<?php

class Clientes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function clientes()
    {
        
        $data['page_tag'] = "Clientes MRT";
        $data['page_title'] = "Clientes MRT";
        $data['page_name'] = "Lista de Clientes MRT";
        $this->views->getView($this, "clientes", $data);
    }

    public function getClientes()
    {
        $arrData = $this->model->selectClientes();
       
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}
