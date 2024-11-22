<?php
defined("BASEPATH") or exit("No direct script access allowed");

class AdminModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function LoginModelpost($data)
    {
        $this->db->where("email", $data['email']);
        $this->db->where("password", $data['password']);
        $result = $this->db->get("admins")->row_array();
        if ($result) {
            return $result;
        }
        return null;
    }

    function AddUser($userdata)
    {

        $this->db->insert("user", $userdata);
    }

    function GetUserData()
    {
        $users = $this->db->get("user")->result();
        print_r($users);
    }
}

?>