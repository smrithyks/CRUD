<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            $db_password = $query->row()->password;
            return password_verify($password, $db_password); 
        }
        return false;
    }

    public function check_username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0; 
    }
    
    public function check_email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0; 
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function add_policy($data) {
        return $this->db->insert('policy_details', $data);
    }
    public function getuserid($username){
        $this->db->select('id'); 
        $this->db->from('users');    
        $this->db->where('username', $username);
        $query = $this->db->get();
        $user = $query->row();
        $user_id = $user->id;
        return $user_id;
    }
    public function getpolicylist(){
        $this->db->select('*'); 
        $this->db->from('policy_details');
        $query = $this->db->get(); 
        $list = $query->result_array();
        return $list;
    }
    public function get_policy_by_id($id) {
        $query = $this->db->get_where('policy_details', ['id' => $id]);
        return $query->row_array(); 
    }
    public function delete_policy($id) {
        return $this->db->delete('policy_details', ['id' => $id]); 
    }
    public function update_policy($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('policy_details', $data); 
    } 
}
