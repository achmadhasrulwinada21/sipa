<?php
Class group_rl extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
       $this->load->libraries('Curl');
        $this->API="http://192.168.2.2/apidatamasterhhg/index.php";
    }

      function index(){
		
		$this->load->libraries('Curl');
        $data = array(
		
		'Dokter' => json_decode($this->curl->simple_get($this->API.'/Dokter')
		));
				
        $this->template->display('api/data_api', $data);
    }
   
    function datarl(){
		//$this->load->libraries('Curl');
        $data['Datarl'] = json_decode($this->curl->simple_get($this->API.'/Datarl'));
		$data['optGroup'] = $this->curl->simple_get($this->API.'/optGroup');
		
        $this->load->view('mahasiswa/index2',$data);
    }
   
   function save_post() {
	   
	  
	   $this->load->model('cisim');
	   
	   $koders = $_POST['koders'];
	   $namars = $_POST['namars'];
	   
        $data = array(
                    'koders'       			=> $koders,
                    'namars'      			=> $namars );
                   
					
        $result = $this->cisim->insertAPI('tblm_rs', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'group_rl');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'group_rl');
		}		
		// redirect('group_rl');
    }
	
	function ubah($koders,$namars){
	     // $datas = array(
		
		// 'Dokter' => json_decode($this->curl->simple_get($this->API.'/Dokter' )
		// ));
	
	$data = array(
			
			'koders' => $koders,
			'namars' => urldecode($namars),
						
			
			);
				$this->template->Display('api/edit_api', $data);
	
	}
	
	
	
   
   }
