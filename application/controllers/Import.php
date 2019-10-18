<?php
class Import extends CI_Controller {
    function __construct(){
  parent::__construct();
          $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

 public function index() {
$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    $this->load->view('import/v_import');
 }

  function Breupload(){
$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
  $fileName = $this->input->post('file', TRUE);

  $config['upload_path'] = './excel/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   redirect('Import'); 
  }else{
   $media = $this->upload->data();
   $inputFileName = 'excel/'.$media['file_name'];
   
   try {
    $inputFileType = IOFactory::identify($inputFileName);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
       NULL,
       TRUE,
       FALSE);
     $data = array(
     "satuanid"=> $rowData[0][0],
     "satuannama"=> $rowData[0][1],
     "satuanracikan"=> $rowData[0][2],
     "satuanidconform"=> $rowData[0][3],
    
    );
       $this->db->insert("satuanproduk",$data);
      }
   
 $this->session->set_flashdata('msg','Berhasil upload ...!!');
     redirect('Import'); 
  }
  } 
}
