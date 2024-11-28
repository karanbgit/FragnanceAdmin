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
        $loggedin = $this->ValidateSession();
        if (!$loggedin) {
            return redirect('AdminController/index');
        }
        $this->load->view('AdminHome');
    }

    public function AdminOrder()
    {
        $this->load->view('AdminOrder');
    }

    public function AllUsers()
    {
        $this->load->view('AllUsers');
    }

    // public function reports()
    // {
    //     $this->load->view('AdminReports');
    // }

    public function AllProducts()
    {
        $this->load->view('AllProducts');
    }

    public function AddProduct()
    {
        $this->ValidateSession();

        $formdata = $this->input->post();

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
        $config['max_size'] = 51200; // 50 MB in KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $data = []; // Initialize an array to hold the response data

        // Check if a file is uploaded

        if (isset($_FILES["Image"])) {
            if (!$this->upload->do_upload('Image')) {
                $data['error'] = $this->upload->display_errors();
                print_r($data);
            } else {
                $data['upload_data'] = $this->upload->data();
                $formdata['Image'] = $data['upload_data']['file_name'];
            }
        }
        $result = $this->AdminModel->AddProductModel($formdata);

        if ($result) {

            redirect('AdminController/AllProducts');
            // echo "Successfull inserted";
        } else {
            echo "fail";
        }
    }
}
?>