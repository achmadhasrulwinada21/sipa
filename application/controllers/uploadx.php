<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class uploadx extends CI_Controller
{
       
    public function index(){

	$data['num_rows'] = $this->db->get('master_perusahaan')->num_rows();
     
        if($this->input->post('submit')){
            //Upload to the local server
            $config['upload_path'] = FCPATH.'upload/';
            $config['allowed_types'] = 'xls|xlsx';
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('file'))
            {
                //Get uploaded file information
                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name'];
                
                //File path at local server
                $source = 'upload/'.$fileName;
                
                //Load codeigniter FTP class
                $this->load->library('ftp');
                
                //FTP configuration
                $ftp_config['hostname'] = '192.168.2.2'; 
                $ftp_config['username'] = 'sysadmin';
                $ftp_config['password'] = 'h3rm1n4';
                $ftp_config['debug']    = TRUE;
                
                //Connect to the remote server
                $this->ftp->connect($ftp_config);
                
                //File upload path of remote server
                $destination = '/upload/'.$fileName;
                
                //Upload file to the remote server
                $this->ftp->upload($source, ".".$destination);
                
                //Close FTP connection
                $this->ftp->close();
                
                //Delete file from local server
                @unlink($source);
            }
        }
        $this->template->Display('upload_view', $data);
    }
}
