<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('User_model');
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $this->load->view('dashboard');
    }

    public function add_data() {
        $this->load->view('dashboard');
        $this->load->view('add_details');
    }
    public function add_policies(){
        $username = $this->session->userdata('username');
        $userid = $this->User_model->getuserid($username);
        
        $name = $this->input->post('name');
        $short_name = $this->input->post('shortname');
        $policy_no = $this->input->post('policy_no');
        $pin_tm = $this->input->post('pin_tm');
        $due_date = $this->input->post('due_date');
        $risk_date = $this->input->post('risk_date');
        $cbo = $this->input->post('cbo');
        $adjust_date = $this->input->post('adjust_date');
        $premium_amount = $this->input->post('premium_amount');
        $commission = $this->input->post('commission');

        $data = [
            'user_id' => $userid,
            'agent_id' => 0,
            'ph_name' => $name,
            'short_name' => $short_name,
            'policy_no' => $policy_no,
            'pin_tm' => $pin_tm,
            'due_date' => $due_date,
            'risk_date' => $risk_date,
            'cbo' => $cbo,
            'adj_date' => $adjust_date,
            'premium' => $premium_amount,
            'commission' => $commission,
            'pdf_id' => 0
        ];
    
        if ($this->User_model->add_policy($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function edit_data() {
        $this->load->view('dashboard');
        $policylist = $this->User_model->getpolicylist();
        $data['policylist'] = $policylist; 
        $this->load->view('edit_details', $data);
    }
    public function edit_policy($id) {
        $policy = $this->User_model->get_policy_by_id($id);
        
        if ($policy) {
            $data['policy'] = $policy;
            $this->load->view('edit_policy', $data); 
        } else {
            show_error('Policy not found.', 404);
        }
    }
    
    public function delete_policy($id) {
        if ($this->User_model->delete_policy($id)) {
            redirect('dashboard/edit_data');
        } else {
            show_error('Failed to delete policy.', 500);
        }
    }
    public function update_policy() {
        $id = $this->input->post('policy_id');
        $data = [
            'ph_name' => $this->input->post('ph_name'),
            'short_name' => $this->input->post('short_name'),
            'policy_no' => $this->input->post('policy_no'),
            'pin_tm' => $this->input->post('pin_tm'),
            'due_date' => $this->input->post('due_date'),
            'risk_date' => $this->input->post('risk_date'),
            'cbo' => $this->input->post('cbo'),
            'adj_date' => $this->input->post('adj_date'),
            'premium' => $this->input->post('premium'),
            'commission' => $this->input->post('commission')
        ];
    
        if ($this->User_model->update_policy($id, $data)) {
            redirect('dashboard/edit_data');
        } else {
            show_error('Failed to update the policy.');
        }
    }
    
    public function upload_file() {
        $this->load->view('dashboard');
        $this->load->view('upload_file');
    }
}
