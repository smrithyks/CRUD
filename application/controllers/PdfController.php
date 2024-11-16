<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // require_once(APPPATH . 'libraries/fpdf/fpdf.php'); 
        require_once FCPATH . 'vendor/autoload.php'; 
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('Pdf_model');
    }

    
    public function upload_pdf() {
        
        $config['upload_path']   = './uploads/pdfs/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 1024 * 5; 
        $config['file_name']     = time() . '_pdf';
        $pdfname = $config['file_name'];
    
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('userfile')) {
            
            $file_data = $this->upload->data();
    
            $file_path = $file_data['full_path'];
            $extracted_data = $this->parse_pdf($file_path);

            if (!empty($file_path)) {
                $data = [
                    'pdf_name' => $pdfname,
                    'pdf_path' => $file_path
                ];
                $this->Pdf_model->insert_pdf_data($data);
            }
    
            
            if (!empty($extracted_data)) {
                $this->Pdf_model->insert_pdf_policy_data($extracted_data);
                echo 'PDF uploaded and data inserted successfully!';
            } else {
                echo 'Failed to extract data from PDF.';
            }
        } else {
            
            echo $this->upload->display_errors();
        }
    }
    
    private function parse_pdf($file_path) {
        
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($file_path);
        $text = $pdf->getText();
        $data = $this->extract_pdf_data($text);

        return $data;
    }

    private function extract_pdf_data($text) {
        $agent_details = [];
        $plcy_details = [];

        
        if (preg_match('/Branch Code:\s*(\S+)/', $text, $matches)) {
            $agent_details['branch_code'] = trim($matches[1]);
        }

        
        if (preg_match('/Agent Name\s*:\s*([A-Za-z\s]+)\s/', $text, $matches)) {
            $agent_details['agent_name'] = trim($matches[1]);
        }

        
        if (preg_match('/Agent Code\s*:\s*([A-Za-z0-9]+)\s/', $text, $matches)) {
            $agent_details['agent_code'] = trim($matches[1]);
        }

        
        if (preg_match('/Leader Code\s*:\s*(\d+)/', $text, $matches)) {
            $agent_details['leader_code'] = trim($matches[1]);
        }

        
        if (preg_match('/Pin Code\s*:\s*(\d{6})/', $text, $matches)) {
            $agent_details['pin_code'] = trim($matches[1]);
        }

        $pattern = '/(\d+)([A-Za-z\s]+)\s+(\d+)\s+([A-Za-z0-9\/\-]+)\s+(\d{2}\/\d{2}\/\d{4})\s+(\d{2}\/\d{2}\/\d{4})\s+([A-Za-z0-9]+)\s+(\d{2}\/\d{2}\/\d{4})\s+(\d+(\.\d{1,2})?)\s+(\d+(\.\d{1,2})?)/';


        if (preg_match_all($pattern, $text, $matches)) {
            
            
            for ($i = 0; $i < count($matches[0]); $i++) {
                $plcy_details[] = [
                    's_no'       => trim($matches[1][$i]),
                    'ph_name'    => trim($matches[2][$i]),
                    'policy_no'  => trim($matches[3][$i]),
                    'pln_tm'     => trim($matches[4][$i]),
                    'due_date'   => trim($matches[5][$i]),
                    'risk_date'  => trim($matches[6][$i]),
                    'cbo'        => trim($matches[7][$i]),
                    'adj_date'   => trim($matches[8][$i]),
                    'premium'    => trim($matches[9][$i]),
                    'commission' => trim($matches[10][$i]),
                ];
            }
        }
        $data['agent_details'] = $agent_details;
        $data['plcy_details'] = $plcy_details;

        return $data;
    }

}
?>