<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class AdminController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->library("session");

        $this->load->helper(array('form', 'url'));

    }

    public function ValidateSession()
    {
        $loggedin = $this->session->userdata('user');
        if (!$loggedin) {

            return false;
        }
        return true;

    }
    public function index()
    {
        $loggedin = $this->ValidateSession();
        // print_r($loggedin);die;
        if ($loggedin) {
            return redirect('AdminController/home');
        }
        $this->load->view('AdminLogin');

    }


    public function Loginpost()
    {
        $data = $this->input->post();
        $result = $this->AdminModel->LoginModelpost($data);
        if ($result) {
            $this->session->set_userdata('user', true);
            $this->session->set_flashdata('success', 'Login Successfull');
            redirect('AdminController/home');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('AdminController/index');

        }
    }


    public function Logout()
    {
        log_message('debug', 'Destroying session...');
        $this->session->sess_destroy();
        log_message('debug', 'Session destroyed.');
        redirect('AdminController/index');
    }

    public function home()
    {
        $this->load->view('AdminHome');
    }

    public function AdminOrder()
    {
        $this->load->view('AdminOrder');
    }

    public function Users()
    {
        $this->load->view('AdminUsers');
    }

    // public function reports()
    // {
    //     $this->load->view('AdminReports');
    // }

    public function AllProducts()
    {
        $this->load->view('AllProducts');
    }

    // public function settings()
    // {
    //     $this->load->view('AdminSettings');
    // }
}
?>