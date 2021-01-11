<?php

class Dashboard extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $data['page_id'] = 2;
        $data['page_tag'] = "Dashboard MRT";
        $data['page_title'] = "Dashboard MRT";
        $data['page_name'] = "Panel de control MRT";
        $this->views->getView($this, "dashboard", $data);
    }
}
