<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function index()
	{
	    //'data_role' => $this->model->GetRolee("order by id_role asc")->result_array(),
	    //'id_role' => $this->model->GetRolee()->result_array(),
		$cbg = ($this->session->userdata('koders'));
		$kodeadmin=($this->session->userdata('nama_role'));

		if($kodeadmin=='Administrator'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_role' => $this->model->GetDataRoleAdministrator2("order by idrole desc")->result_array(),

		);


		}else if($kodeadmin=='Departemen Keuangan'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleDepKeu("where koders='$cbg'")->result_array(),
		);

		}else if($kodeadmin=='Departemen Pembangunan'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleDepPem("where koders='$cbg'")->result_array(),
		);

		}else if($kodeadmin=='Departemen IT'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleDepIt("where idrole='$cbg'")->result_array(),
			
		);

		}else if($kodeadmin=='Admin'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleAdmin2("where role='$kodeadmin'")->result_array(),
		);

		}else if($kodeadmin=='User'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleUser("where koders='$cbg'")->result_array(),
		);

		}else if($kodeadmin=='Departemen Busdev'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role'=> $this->model->GetDataRoleDepBus("where koders='$cbg'")->result_array(),
		);

		}else if($kodeadmin=='Departemen Marketing'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleMark("where koders='$cbg'")->result_array(),
		);

	    }else{


		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		
			'data_role' => $this->model->GetDataRoleDepLegal("where koders='$cbg'")->result_array(),
		);



	}
		$this->template->Display('role/data_role',$data);
		//$this->load->view('role/data_role', $data);
	}

	function addrole()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optrs' => $this->model->GetRumahSakit()->result_array(),
			 'cabang' => $this->session->userdata('cabang'),	

		);


		$userlog = (
			$this->session->userdata('nama')
			
		);

		$this->template->Display('role/add_role',$data);
		//$this->load->view('role/add_role', $data);
	}

	function savedata(){

		$namarole = $_POST['nama_role'];
		$cbgrs = $_POST['cbgrs'];


		$userlog = (
			$this->session->userdata('nama')
			
		);

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
	
		$data = array(	
			//'id_role'=> $id_role,
			'nama_role' => $namarole,
			'cbgrs' => $cbgrs,
			'createddate' => $waktu,
			'createdby' =>  $this->session->userdata('nama'),

			);
		
		$result = $this->model->Simpan('master_role', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data role BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'role');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'role');
		}		
	}

	function editrole($kode=0){



		$data_role = $this->model->AmbilDataRole("where idrole ='$kode'")->result_array();

		/*menjadikan kategori ke array*/
		  $cbgrs_post_array = array();
		  foreach($this->model->AmbilDataRole("where idrole = '$kode'")->result_array() as $cbgrs){
		  	$cbgrs_post_array[] = $cbgrs['cbgrs'];
		  }


		$data = array(

			'cabang' => $this->session->userdata('cabang'),	

			'nama' => $this->session->userdata('nama'),	
			'idrole' => $data_role[0]['idrole'],
			'koderole' =>  $data_role[0]['koderole'],
			'namarole' => $data_role[0]['nama_role'],		
            'cbgrs' => $this->model->GetRS()->result_array(),
			'cbgrs_post' => $cbgrs_post_array,
			'createdby' => $data_role[0]['createdby'],
			'updateby' => $data_role[0]['updateby'],
			'createddate' =>  $data_role[0]['createddate'],
			'updatedate' => date("Y-m-d H:i:s"),

			);

		$this->template->Display('role/edit_role',$data);
		//$this->load->view('role/edit_role', $data);



	}

	function hapusrole($kode = 1){
		
		$result = $this->model->Hapus('master_role', array('idrole' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'role');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'role');
		}
	}

	function updaterole(){

		$idrole = $_POST['idrole'];
		$namarole = $_POST['namarole'];
		$koderole = $_POST['koderole'];	
		$cbgrs = $_POST['namars'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
	
			$data = array(	
		
			'idrole' => $idrole,
			'nama_role' => $namarole,
			'koderole' => $koderole,
			'cbgrs' => $cbgrs,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			);
		
		
		 $hasil = $this->model->UpdateRole($data);

		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'role');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'role');
		}
	}

}

