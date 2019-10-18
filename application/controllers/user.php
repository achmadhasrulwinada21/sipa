<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
	
	}

	
	public function index()
	{

		$data['data_user']=  $this->db->get('v_usergroup')->result();
       
		$this->template->display('user/data_user',$data);
	}


	 function add() {

	         $data = array(
	
		 	'status' => $this->model->GetStat()->result_array(),
		 	'optrole' => $this->model->GetRole()->result_array(),
		 	'optcabang' => $this->model->GetCabang()->result_array(),
		 	'optdepartemen' => $this->model->GetDepartemenall()->result_array(),

		 
		);

	    $this->template->Display('user/add_user',$data);

 
    }



	function edituser($kode=0){



		$data_user = $this->model->AmbilDataUser("where u_id ='$kode'")->result_array();

		/*menjadikan kategori ke array*/
		$role_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['role'];
		}

		$status_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $status){
			$status_post_array[] = $status['statususer'];
		}


		$rs_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $cabangrs){
			$cabangrs_post_array[] = $cabangrs['cabangrs'];
		}



		$data = array(

            'u_id' => $data_user[0]['u_id'],
			'nama' => $data_user[0]['nama'],
			'u_name' =>  $data_user[0]['u_name'],	
			'u_paswd' => $data_user[0]['u_paswd'],
			'statususer' => $this->model->GetStat()->result_array(),
		
			'role' => $this->model->GetRole()->result_array(),
			'cabangrs' => $this->model->GetRS()->result_array(),
			'role_post' => $role_post_array,
			'status_post' => $status_post_array,
			'cabangrs_post' => $cabangrs_post_array,
	        'alamat' => $data_user[0]['alamat'],
			'email' => $data_user[0]['email'],
			'fotoprofil' => $data_user[0]['fotoprofil'],

		 	);

	
	
		$this->template->Display('user/edit_user',$data);



	}
	
		function edituser2($kode=0){



		$data_user = $this->model->AmbilDataUser("where u_id ='$kode'")->result_array();

		/*menjadikan kategori ke array*/
		$role_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['role'];
		}

		$status_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $status){
			$status_post_array[] = $status['statususer'];
		}


		$rs_post_array = array();
		foreach($this->model->AmbilDataUser("where u_id = '$kode'")->result_array() as $cabangrs){
			$cabangrs_post_array[] = $cabangrs['cabangrs'];
		}



		$data = array(

            'u_id' => $data_user[0]['u_id'],
			'nama' => $data_user[0]['nama'],
			'u_name' =>  $data_user[0]['u_name'],	
			'u_paswd' => $data_user[0]['u_paswd'],
			'statususer' => $this->model->GetStat()->result_array(),
		
			'role' => $this->model->GetRole()->result_array(),
			'cabangrs' => $this->model->GetRS()->result_array(),
			'role_post' => $role_post_array,
			'status_post' => $status_post_array,
			'cabangrs_post' => $cabangrs_post_array,
	        'alamat' => $data_user[0]['alamat'],
			'email' => $data_user[0]['email'],
			'fotoprofil' => $data_user[0]['fotoprofil'],

		 	);

	
	
		$this->template->Display('user/edit_user2',$data);



	}


		function savedata(){


	  
		 $config = array(
		 'upload_path' => './assets/profil/upload',
		 'allowed_types' => 'gif|jpg|JPG|png',
		 'max_size' => '2048',
				
		 );

		 $this->load->library('upload', $config);      
		 $this->upload->do_upload('file_upload');
		 $upload_data = $this->upload->data();
		 $file_name = $upload_data['file_name'];
		
		
		$namauser = $_POST['namauser'];
		$passworduser = $_POST['password'];		
		$nama = $_POST['namalengkap'];
		$status = $_POST['status'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$level ='1';
		$cabangrs=$_POST['namacabang'];
		$departemen=$_POST['namadepartemen'];

	     $foto = $file_name;
		
		$role = $_POST['namarole'];


		$userlog = (
			$this->session->userdata('nama')
			
		);


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

		
	
		$data = array(	
		
		
			'u_name' => $namauser,
			'u_paswd' => md5(pg_escape_string($passworduser)),
			'nama' => $nama,
			'statususer' => $status,
			'alamat' => $alamat,
			'email' => $email,
			'cabangrs'=> $cabangrs,
			
			'role' => $role,
			 'fotoprofil'=> $foto,
			'createdby' => $userlog ,
			'createddate' =>  $waktu,
			'role' => $role,
			'departemen'=>$departemen



			);
		
		$result = $this->model->Simpan('usersipa', $data);
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data user BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'user');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'user');
		}		
	}


	function updateuser(){
		
	
	   if($_FILES['file_upload']['error'] == 0):
		$config = array(
				'upload_path' => './assets/upload',
				'allowed_types' => 'gif|jpg|JPG|png',
				'max_size' => '2048',
				
				);
		$this->load->library('upload', $config);      
		$this->upload->do_upload('file_upload');
		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];
		else:
			$file_name = $this->input->post('foto');
		endif;


        $id_user=$_POST['u_id'];
		$namauser = $_POST['namauser'];
		$passworduser = $_POST['password'];		
		$nama = $_POST['namalengkap'];
		$status = $_POST['status'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$cabangrs=$_POST['namars'];
		$level ='1';
		// $foto = $upload_data['file_name'];

		$userlog = (
			$this->session->userdata('nama'));

		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");

      
	    $role = $_POST['namarole'];

			$data = array(	
			'u_id' => $id_user,
			'u_name' => $namauser,
		        'u_paswd' => md5(pg_escape_string($passworduser)),
			'nama' => $nama,
			'statususer' => $status,
			'alamat' => $alamat,
			'email' => $email,
			'cabangrs'=> $cabangrs,
			'updatedby' => $userlog ,
			'updateddate' =>  $waktu,
			'role' => $role,
			'fotoprofil'=> $file_name,
			);
		
		
		 $hasil = $this->model->UpdateUser($data);

		if($hasil>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			redirect('dashboard/logout');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			 redirect('dashboard/logout');
		}
	}


	function hapususer($kode = 1){
		
		$result = $this->model->Hapus('usersipa', array('u_id' => $kode));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'user');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'user');
		}
	}








	


	
	

}

