<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function validate_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->User_model->check_login($username, $password)) {
            $this->session->set_userdata('username', $username);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register() {
        $username = $this->input->post('new_username');
        $email = $this->input->post('new_email');
        $newpassword = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
    
        if ($newpassword !== $confirm_password) {
            echo json_encode(['status' => 'error', 'message' => 'Passwords do not match']);
            return;
        }
    
        if ($this->User_model->check_username_exists($username)) {
            echo json_encode(['status' => 'error', 'message' => 'Username already taken']);
            return;
        }
    
        if ($this->User_model->check_email_exists($email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email already registered']);
            return;
        }
    
        $hashed_password = password_hash($newpassword, PASSWORD_BCRYPT);
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ];
    
        if ($this->User_model->register($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    
}
