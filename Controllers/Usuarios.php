<?php

class Usuarios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Usuarios()
    {

        $data['page_tag'] = "Usuarios MRT";
        $data['page_title'] = "Usuarios <small> México Real Tequila </small>";
        $data['page_name'] = "usuarios";
        $this->views->getView($this, "usuarios", $data);
    }
}

?>