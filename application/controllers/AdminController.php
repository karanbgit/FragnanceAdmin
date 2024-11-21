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
        $data['title'] = 'Admin Login';
        $this->load->view('AdminLogin', $data);
    }

    public function home()
    {
        $this->load->view('AdminHome');
    }

    public function orders()
    {
        $this->load->view('AdminOrders');
    }

    public function users()
    {
        $this->load->view('AdminUsers');
    }

    public function reports()
    {
        $this->load->view('AdminReports');
    }

    public function AllProducts()
    {
        $this->load->view('AllProducts');
    }

    public function settings()
    {
        $this->load->view('AdminSettings');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('AdminController');
    }
}
?>