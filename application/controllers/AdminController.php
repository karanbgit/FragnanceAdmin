<?php

defined("BASEPATH") or exit("No Direct Script Access Allowed"); // Fixed incorrect syntax
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
        if ($loggedin) {
            return redirect('AdminController/home');
        }
        $this->load->view('AdminLogin');
    }

    public function Loginpost()
    {
        $data = $this->input->post();
        // Erprror: LoginModelpost() method is not defined in AdminModel
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
        // Error: No session validation before showing admin view
        $this->load->view('AdminOrder');
    }

    public function AllUsers()
    {
        // Error: No session validation before showing admin view
        $this->load->view('AllUsers');
    }

    public function AllProducts()
    {
        $loggedin = $this->ValidateSession();

        if ($loggedin) {
            // Fetch all products
            $results = $this->AdminModel->GetAllProducts();

            // Process each product row
            foreach ($results as &$row) {
                // Split the 'WhatMakesGreat' field by commas into an array
                if (isset($row['WhatMakesGreat'])) {
                    $row['WhatMakesGreat'] = explode('|', $row['WhatMakesGreat']);
                }
            }

            // Pass the processed data to the view
            $data['li'] = $results;

            // Load the view
            $this->load->view('AllProducts', $data);
        } else {
            // Redirect to the login page if the session is invalid
            redirect('AdminController/index');
        }
    }

    public function AddProduct()
    {
        // Error: Not checking return value of ValidateSession()
        $this->ValidateSession();

        $formdata = $this->input->post();

        $product = $this->input->post('WhatMakesGreat');
        // Error: No validation if WhatMakesGreat is set
        $product = implode('|', $product);
        $formdata['WhatMakesGreat'] = $product;

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
        } else {
            echo "fail"; // Error: Should use proper error handling
        }
    }
}
?>