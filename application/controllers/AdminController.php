<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class AdminController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $this->load->view('AdminLogin');
    }

    public function home()
    {
        $this->load->view('AdminHome');
    }

    

}
?>