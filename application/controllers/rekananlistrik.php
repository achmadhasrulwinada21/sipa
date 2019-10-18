<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekananlistrik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	}



	public function index()
	{  
		$kodeadmin=($this->session->userdata('koderole'));


		if($kodeadmin=='10')
		{
		    $this->load->model('listrikm');
			$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'optRumahSakit' => $this->listrikm->Getcetakid("order by namars asc")->result_array(),	
			'data_rekanan' => $this->listrikm->GetListrik()->result_array(),             
			);
		$this->template->Display('rekananlistrik/data_rekanan2',$data);	
		
        }else{		    
		
		
			$this->load->model('listrikm');
			$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'optRumahSakit' => $this->listrikm->Getcetakid("order by namars asc")->result_array(),	
			'data_rekanan' => $this->listrikm->GetListrik()->result_array(),             
			);
		$this->template->Display('rekananlistrik/data_rekanan',$data);	
		
		}
	}		
			
			
			
		
		
		


	function addrekanan()
	{
		$this->load->model('listrikm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
			'optUraian' => $this->listrikm->Geturaianlistrik()->result_array(),
			//'periode' => $this->listrikm->Geturaianlistrik()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
		);
		
		$this->template->Display('rekananlistrik/add_rekanan',$data);
	}

	function savedata(){
	//	$config = array(
	//		'upload_path' => './assets/upload',
	//		'allowed_types' => 'gif|jpg|JPG|png',
	//		'max_size' => '2048',

	//	);
	//	$this->load->library('upload', $config);	
	//	$this->upload->do_upload('file_upload');
	//	$upload_data = $this->upload->data();
 
        // $id_tr = $_POST['id_tr'];
        $id_rek_listrik = $_POST['id_rek_listrik'];
       // $periode = $_POST['periode'];
		$nm_rs = $_POST['nm_rs'];
		$uraian_kerja = $_POST['uraian_kerja'];
		$km_mandiri = $_POST['km_mandiri'];		
		$trisandira = $_POST['trisandira'];
		$trisahabat = $_POST['trisahabat'];
		$tribas_reka_buana = $_POST['tribas_reka_buana'];		
		$sekawan_kontrindo = $_POST['sekawan_kontrindo'];
		//$tanggal = $_POST['tanggal'];
		$createdby = $_POST['createdby'];		
		$updatedby = $_POST['updatedby'];		
		$createddate = $_POST['createddate'];
		$updatedate = $_POST['updatedate'];
		$data = array(	

			
			// 'id_tr' => $id_tr,
			'nm_rs'=> $nm_rs,
			'uraian_kerja' => $uraian_kerja,
			//'periode' => $periode,
			'km_mandiri' => $km_mandiri,
			'trisandira' => $trisandira,
			'trisahabat' => $trisahabat,
			'tribas_reka_buana' => $tribas_reka_buana,
			'sekawan_kontrindo' => $sekawan_kontrindo,
			// 'cdate' => date("Y-m-d H:i:s"),
			);
		
		$result = $this->model->Simpan('dtb_rekanan', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}	


	}



    /*menjadikan kategori ke array*/
    
	function editrekanan($id_rek_listrik){	
	$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			
		);
			$this->load->model('listrikm');
			$this->load->model('menum');
		$tampung = $this->listrikm->GetWhere('dtb_rekanan',array('id_rek_listrik' =>$id_rek_listrik));
		
		$for_ttdmeng = array();
		foreach($this->listrikm->Getrekananlistrik("where id_rek_listrik = '$id_rek_listrik' ")->result_array() as $role){
			$for_ttdmeng[] = $role['mengetahui'];
		}
	    $for_ttdmeny = array();
		foreach($this->listrikm->Getrekananlistrik("where id_rek_listrik = '$id_rek_listrik' ")->result_array() as $role){
			$for_ttdmeny[] = $role['menyetujui'];
		}
		$statusdokumen_post = array();
		foreach($this->listrikm->Getrekananlistrik("where id_rek_listrik = '$id_rek_listrik' ")->result_array() as $role){
			$statusdokumen_post[] = $role['status'];
			
				
			
		}
			
		$roles = ($this->session->userdata('koderole')
			
		);

		
		$data = array(
			//'idmengetahuii' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
			'idmengetahui' => $this->listrikm->AmbilDataTTDMengetahui()->result_array(),
			'idmengetahuii' => $this->listrikm->AmbilDataTTDMengetahui()->result_array(),
			'statusdokumen' => $this->listrikm->GetStatus2()->result_array(),
			'for_ttdmeng' => $for_ttdmeng,
			'for_ttdmeny' => $for_ttdmeny,
			'statusdokumen_post' => $statusdokumen_post,
			//'statusdokumen'=>$this->listrikm->Getrekananlistrik()->result_array(),
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_rek_listrik' => $tampung[0]['id_rek_listrik'],
			'nm_rs' => $tampung[0]['nm_rs'],
			//'periode' => $tampung[0]['periode'],
			'uraian_kerja' => $tampung[0]['uraian_kerja'],
			'km_mandiri' => $tampung[0]['km_mandiri'],
			'trisandira' => $tampung[0]['trisandira'],
			'trisahabat' => $tampung[0]['trisahabat'],
			'tribas_reka_buana' => $tampung[0]['tribas_reka_buana'],
			'sekawan_kontrindo' => $tampung[0]['sekawan_kontrindo'],
			//'tanggal' => $tampung[0]['tanggal'],
			'createdby' => $tampung[0]['createdby'],
			'updateby' => $tampung[0]['updateby'],
			'createddate' => $tampung[0]['createddate'],
			'updatedate' => $tampung[0]['updatedate'],
			'status'=> $tampung[0]['status'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'menyetujui' => $tampung[0]['menyetujui'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);

		$this->template->Display('rekananlistrik/edit_rekanan',$data);	

	}

function updatelistrik(){
	$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
	$this->load->model('listrikm'); 
		
        $id_rek_listrik=$_POST['id_rek_listrik'];
		$nm_rs = $_POST['nm_rs'];
		//$periode = $_POST['periode'];
		$uraian_kerja = $_POST['uraian_kerja'];
		$km_mandiri = $_POST['km_mandiri'];		
		$trisandira = $_POST['trisandira'];
		$trisahabat = $_POST['trisahabat'];
		$tribas_reka_buana = $_POST['tribas_reka_buana'];
		$sekawan_kontrindo = $_POST['sekawan_kontrindo'];
        //$tanggal = $_POST['tanggal'];
		$statusdokumen_post = $_POST['status'];
		$mengetahui = $_POST['mengetahui'];
		$menyetujui = $_POST['menyetujui'];

        //$nilaidec =$nilai_uraian ;
        //$hasilnilaiuraian = floatval($nilaidec);
        //$warnasel=$_POST['warnaseltabel'];

      $userlog = ($this->session->userdata('nama'));
        date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
			
			$data = array(	

		    'id_rek_listrik'=> $id_rek_listrik,
			'nm_rs' => $nm_rs,
			//'periode' => $periode,
			'uraian_kerja' => $uraian_kerja,
			'km_mandiri' => $km_mandiri,
			'trisandira' => $trisandira,
			'trisahabat' => $trisahabat,
			'tribas_reka_buana'=>$tribas_reka_buana,
			'sekawan_kontrindo'=>$sekawan_kontrindo,
			'updateby'=>$userlog,
			'status' => $this->input->post('status'),
			'mengetahui' => $this->input->post('mengetahui'),
			'menyetujui' => $this->input->post('menyetujui'),
			'updatedate'=>$waktusaatini,
			);
		
		 $hasil = $this->listrikm->Updatelistrik($data);

		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}
	}

	
	function hapusrekanan($id_rek_listrik = 1){
		
		$result = $this->model->Hapus('dtb_rekanan', array('id_rek_listrik' => $id_rek_listrik));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'rekananlistrik');
		}
	}
	
	
}