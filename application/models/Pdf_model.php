<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert_pdf_data($data) {
        
        $this->db->insert('pdf_files', $data);
    }
    public function insert_pdf_policy_data($data) {
        
        $this->db->insert('agent_details', $data['agent_details']);
        return $this->db->insert('policy_details', $data['plcy_details']);
    }
}
