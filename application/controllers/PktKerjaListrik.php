<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PktKerjaListrik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	private function _cek_login()
	{

	}
	
		
	public function index()
	{
	
	//$kodeadmin=($this->session->userdata('koderole'));


		//if($kodeadmin=='3')
	//	{
		    $this->load->model('pktKerja');
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'data2_pkjlistrik'=>$this->pktKerja->GetAllData()->result_array(),
			'nama_user' => $this->session->userdata('nama_user'),	
			'optRS' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
			//'data_pkjlistrik' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
		);
			$this->template->Display('PktKerjaListrik/data2_pkjlistrik',$data);


		//}elseif($kodeadmin=='1')
		//{
		  //  $this->load->model('pktKerja');
		//	$data = array(
			//'nama' => $this->session->userdata('nama'),	
			//'cabang' => $this->session->userdata('cabang'),
			//'data2_pkjlistrik'=>$this->pktKerja->GetAllData()->result_array(),
			//'nama_user' => $this->session->userdata('nama_user'),	
			//'optRS' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
			//'data_pkjlistrik' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
	//	);
		//	$this->template->Display('PktKerjaListrik/data2_pkjlistrik',$data);


			
			
			
			
	    ///}else 
		
	//	{
		  //  $this->load->model('pktKerja');
		//	$data = array(
			//'nama' => $this->session->userdata('nama'),	
			//'cabang' => $this->session->userdata('cabang'),
			//'data_pkjlistrik'=>$this->pktKerja->Getcetakid()->result_array(),
			//'nama_user' => $this->session->userdata('nama_user'),	
			//'optRS' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
			//'data_pkjlistrik' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
		//);
	
		//$this->template->Display('PktKerjaListrik/data_pkjlistrik',$data);

	}
	//}

	
	
	
	
	
	//if($this->session->userdata('roles')=='1')
	//{
		  //  $this->load->model('pktKerja');
			//$data = array(
			//'nama' => $this->session->userdata('nama'),	
			//'cabang' => $this->session->userdata('cabang'),
			//'data2_pkjlistrik'=>$this->pktKerja->GetAllData()->result_array(),
			//'nama_user' => $this->session->userdata('nama_user'),	
			//'optRS' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
			//'data_pkjlistrik' => $this->pktKerja->Getcetakid("order by namars asc")->result_array(),
		
	//);
		//$this->template->Display('PktKerjaListrik/data_pkjlistrik',$data);
		//}else{
			//	$this->template->Display('PktKerjaListrik/data2_pkjlistrik',$data);
				//endif;
			

		
		//$this->load->view('PktKerjaListrik/data_pkjlistrik',$data);

	//}
	
	function addpkj()
	{
		$this->load->model('pktKerja');
		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'optrole' => $this->model->GetRole()->result_array(),
			'optRS' => $this->pktKerja->GetRumahSakit()->result_array(),
			'optpaket_lsitrik' => $this->pktKerja->GetPaket()->result_array(),
			'optpaket_lsitrikS' => $this->pktKerja->GetPaketS()->result_array(),
		);
		
		$this->template->Display('PktKerjaListrik/add_pkjlistrik', $data);
	}

	function savedata(){
		//if($_POST){
		$this->load->model('pktKerja');
		
			$koders = $_POST['koders'];
		    $nm_material = $_POST['nm_material'];
			$satuan = $_POST['satuan'];
			$volume = $_POST['volume'];
			$harga = $_POST['harga'];
			$tot_harga = $_POST['total_harga'];
			$semua_tot_harga = $_POST['Semua_total_harga'];
			$ppn_tot_harga = $_POST['Pot_PPN'];
			$Grand_total = $_POST['Grand_total'];
			
			$hrg_trisahabat = $_POST['harga1'];
			$tot_hrg_trisahabat = $_POST['total_harga1'];
			
			$semua_tot_hrgtrisahabat = $_POST['Semua_total_harga1'];
			$ppn_tot_hrgtrisahabat = $_POST['Pot_PPN1'];
			$grand_tot_trisahabat = $_POST['Grand_total'];
			
			$hrg_mandiri = $_POST['harga2'];
			$tot_hrg_mandiri = $_POST['total_harga2'];
			
			$semua_tot_hrgmandiri = $_POST['Semua_total_harga2'];
			$ppn_tot_hrgmandiri = $_POST['Pot_PPN2'];
			$grand_tot_mandiri = $_POST['Grand_total2'];
			
			$hrg_trisandira = $_POST['harga3'];
			$tot_hrg_trisandira = $_POST['total_harga3'];
			
			$semua_tot_hrgtrisandira = $_POST['Semua_total_harga3'];
			$ppn_tot_hrgtrisandira = $_POST['Pot_PPN3'];
			$grand_tot_trisandira = $_POST['Grand_total3'];
			
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");
				
			
			$data = array(
			'koders' =>$koders,
			'nm_material' =>$nm_material,
			'satuan' =>$satuan,
			'volume' =>$volume,
			'harga' =>$harga,
			'tot_harga' =>$tot_harga,
			'semua_tot_hrg' =>$semua_tot_harga, 
			'ppn_tot_harga' =>$ppn_tot_harga, 
			'grand_tot_semua' =>$Grand_total, 
			
			'hrg_trisahabat' =>$hrg_trisahabat,
			'tot_hrg_trisahabat' =>$tot_hrg_trisahabat,
			'semua_tot_hrgtrisahabat' =>$semua_tot_hrgtrisahabat, 
			'ppn_tot_hrgtrisahabat' =>$ppn_tot_hrgtrisahabat, 
			'grand_tot_trisahabat' =>$grand_tot_trisahabat, 
				
			'hrg_mandiri' =>$hrg_mandiri,
			'tot_hrg_mandiri' =>$tot_hrg_mandiri,				
			'semua_tot_hrgmandiri' =>$semua_tot_hrgmandiri, 
			'ppn_tot_hrgmandiri' =>$ppn_tot_hrgmandiri, 
			'grand_tot_mandiri' =>$grand_tot_mandiri, 
			
			
			'hrg_trisandira' =>$hrg_trisandira,
			'tot_hrg_trisandira' =>$tot_hrg_trisandira,
			'semua_tot_hrgtrisandira' =>$semua_tot_hrgtrisandira, 
			'ppn_tot_hrgtrisandira' =>$ppn_tot_hrgtrisandira, 
			'grand_tot_trisandira' =>$grand_tot_trisandira, 
			
			
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			
			);
			
				$result = $this->pktKerja->Simpan('tb_paket_pekerjaan', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'PktKerjaListrik');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'PktKerjaListrik');
		}
	}
	
	function editpkj($idpktkrj)
	{
		$this->load->model('pktKerja');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
		
		);

		
		//$this->template->Display('PktKerjaListrik/edit_pkjlistrik', $data);
	   
		$this->load->model('pktKerja');
		$grab = $this->pktKerja->GetWhere('paket_pekerjaan',array('idpktkrj' =>$idpktkrj));
		
		$nm_material_post_array = array();
		foreach($this->pktKerja->GetAllData("where idpktkrj = '$idpktkrj'")->result_array() as $opt_mat){
			$nm_material_post_array[] = $opt_mat['nm_material'];
		} 
		$satuan_post_array = array();
		foreach($this->pktKerja->GetAllData("where idpktkrj = '$idpktkrj'")->result_array() as $opt_sat){
			$satuan_post_array[] = $opt_sat['satuan'];
		}
		
		
		
		
		
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'opt_mat' =>$nm_material_post_array,
			'opt_sat' =>$satuan_post_array,
			
			'nm_material' => $this->pktKerja->GetPaket("where nm_material != '$idpktkrj' order by nm_material asc")->result_array(),
			
			'satuan' => $this->pktKerja->GetPaketS("where satuan != '$idpktkrj' order by satuan asc")->result_array(),
			
			'idpktkrj' => $grab[0]['idpktkrj'],
			'namars' => $grab[0]['namars'],
			//'nm_material' => $grab[0]['nm_material'],
			//'satuan' => $grab[0]['satuan'],
			'volume' => $grab[0]['volume'],
			'harga' => $grab[0]['harga'],
			'tot_harga' => $grab[0]['tot_harga'],
			'semua_tot_hrg' => $grab[0]['semua_tot_hrg'],
			'ppn_tot_harga' => $grab[0]['ppn_tot_harga'],
			'grand_tot_semua' => $grab[0]['grand_tot_semua'],
		
			'hrg_trisahabat' => $grab[0]['hrg_trisahabat'],
			'tot_hrg_trisahabat' => $grab[0]['tot_hrg_trisahabat'],
			'semua_tot_hrgtrisahabat' => $grab[0]['semua_tot_hrgtrisahabat'],
			'ppn_tot_hrgtrisahabat' => $grab[0]['ppn_tot_hrgtrisahabat'],
			'grand_tot_trisahabat' => $grab[0]['grand_tot_trisahabat'],
			
			'hrg_mandiri' => $grab[0]['hrg_mandiri'],
			'tot_hrg_mandiri' => $grab[0]['tot_hrg_mandiri'],
			'semua_tot_hrgmandiri' => $grab[0]['semua_tot_hrgmandiri'],
			'ppn_tot_hrgmandiri' => $grab[0]['ppn_tot_hrgmandiri'],
			'grand_tot_mandiri' => $grab[0]['grand_tot_mandiri'],
			
			'hrg_trisandira' => $grab[0]['hrg_trisandira'],
			'tot_hrg_trisandira' => $grab[0]['tot_hrg_trisandira'],
			'semua_tot_hrgtrisandira' => $grab[0]['semua_tot_hrgtrisandira'],
			'ppn_tot_hrgtrisandira' => $grab[0]['ppn_tot_hrgtrisandira'],
			'grand_tot_trisandira' => $grab[0]['grand_tot_trisandira'],
			
			
			);
				$this->template->Display('PktKerjaListrik/edit_pkjlistrik', $data);
	}
	
	function updatepkj()
	{
			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
		
			$this->load->model('pktKerja');
			$idpktkrj = $_POST['idpktkrj'];
			$nm_material = $_POST['nm_material'];
			$satuan = $_POST['satuan'];
			$volume = $_POST['volume'];
			$harga = $_POST['harga'];
			$tot_harga = $_POST['total_harga'];
			$semua_tot_harga = $_POST['Semua_total_harga'];
			$ppn_tot_harga = $_POST['Pot_PPN'];
			$Grand_total = $_POST['Grand_total'];
			
			$hrg_trisahabat = $_POST['harga1'];
			$tot_hrg_trisahabat = $_POST['total_harga1'];
			
			$semua_tot_hrgtrisahabat = $_POST['Semua_total_harga1'];
			$ppn_tot_hrgtrisahabat = $_POST['Pot_PPN1'];
			$grand_tot_trisahabat = $_POST['Grand_total'];
			
			$hrg_mandiri = $_POST['harga2'];
			$tot_hrg_mandiri = $_POST['total_harga2'];
			
			$semua_tot_hrgmandiri = $_POST['Semua_total_harga2'];
			$ppn_tot_hrgmandiri = $_POST['Pot_PPN2'];
			$grand_tot_mandiri = $_POST['Grand_total2'];
			
			$hrg_trisandira = $_POST['harga3'];
			$tot_hrg_trisandira = $_POST['total_harga3'];
			
			$semua_tot_hrgtrisandira = $_POST['Semua_total_harga3'];
			$ppn_tot_hrgtrisandira = $_POST['Pot_PPN3'];
			$grand_tot_trisandira = $_POST['Grand_total3'];
			
			$userlog = ($this->session->userdata('nama')
			);
			
		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");	
		$waktuini =date("m-Y");	

        $data = array(
		
			'idpktkrj' =>$idpktkrj,
			'nm_material' =>$nm_material,
			'satuan' =>$satuan,
			'volume' =>$volume,
			'harga' =>$harga,
			'tot_harga' =>$tot_harga,
			'semua_tot_hrg' =>$semua_tot_harga, 
			'ppn_tot_harga' =>$ppn_tot_harga, 
			'grand_tot_semua' =>$Grand_total, 
			
			'hrg_trisahabat' =>$hrg_trisahabat,
			'tot_hrg_trisahabat' =>$tot_hrg_trisahabat,
			'semua_tot_hrgtrisahabat' =>$semua_tot_hrgtrisahabat, 
			'ppn_tot_hrgtrisahabat' =>$ppn_tot_hrgtrisahabat, 
			'grand_tot_trisahabat' =>$grand_tot_trisahabat, 
				
			'hrg_mandiri' =>$hrg_mandiri,
			'tot_hrg_mandiri' =>$tot_hrg_mandiri,				
			'semua_tot_hrgmandiri' =>$semua_tot_hrgmandiri, 
			'ppn_tot_hrgmandiri' =>$ppn_tot_hrgmandiri, 
			'grand_tot_mandiri' =>$grand_tot_mandiri, 
			
			
			'hrg_trisandira' =>$hrg_trisandira,
			'tot_hrg_trisandira' =>$tot_hrg_trisandira,
			'semua_tot_hrgtrisandira' =>$semua_tot_hrgtrisandira, 
			'ppn_tot_hrgtrisandira' =>$ppn_tot_hrgtrisandira, 
			'grand_tot_trisandira' =>$grand_tot_trisandira,
			
			'updateby' => $userlog ,
			'updatedate' => $waktusaatini,
			
			);
			
		$where =array( 
		'idpktkrj' => $idpktkrj,
	     );
		
		$res = $this->pktKerja->UpdatePktKerja($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'PktKerjaListrik');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'PktKerjaListrik');
		}
		
  }
	

		function hapuspkj($idpktkrj = 1){
		$this->load->model('pktKerja');
		$result = $this->pktKerja->Hapus('tb_paket_pekerjaan', array('idpktkrj' => $idpktkrj));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'PktKerjaListrik');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'PktKerjaListrik');
		}
	}
	
	
	}	
	
