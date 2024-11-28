<?php
defined("BASEPATH") or exit("No direct script access allowed");

class AdminModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Insert User Data in Student Table (User form)
    public function AddProductModel($data)
    {
        $insert = $this->db->insert('products', $data);
        return $insert;
    }

    public function GetAllProducts()
    {
        $data = $this->db->get('products')->result_array();
        return $data;
    }
}

?>