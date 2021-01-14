<?php

class Productos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Productos()
    {
        
        $data['page_tag'] = "Productos MRT";
        $data['page_title'] = "Productos MRT";
        $data['page_name'] = "Lista de Productos MRT";
        $this->views->getView($this, "productos", $data);
    }
}
