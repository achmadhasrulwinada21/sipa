<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterpresentase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}
	
	function get_tipe_produk()
		
		{
		$this->load->model('modelpresentase');
		$id_tipe_produk=$this->input->post('id_tipe_produk');
		$data=$this->modelpresentase->get_data_tipe_bykode($id_tipe_produk);
		echo json_encode($data);
		}


	public function index()
	{
		$this->load->model('modelpresentase');
	
		$data = array(
		    'kode_presentase' => $this->modelpresentase->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modelpresentase->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_presentase' => $this->modelpresentase->GetEva("order by kode_presentase asc")->result_array(),
		);

	$this->template->Display('masterpresentase/data_presentase',$data);
	}

	function addpresentase()
	{
		$this->load->model('modelpresentase');
		// $data['kode_presentase'] = $this->modelpresentase->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		    'kode_presentase' => $this->modelpresentase->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterpresentase/add_presentase',$data);
	
	}

	
	function editmasterpresentase($id_presentase=1){		
	$this->load->model('modelpresentase');
	
	 $id_tp_post_array = array();
		// foreach($this->modelpresentase->GetEva("where id_presentase = '$id_presentase'")->result_array() as $dd_tipe){
			// $id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		// } 
			//$tampung = $this->modelpresentase->GetWhere("where master_presentase = '$id_presentase'")->result_array();
		$tampung = $this->modelpresentase->GetWhere('master_presentase', array('kode_presentase' => $id_presentase));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_presentase' => $tampung[0]['id_presentase'],
			'prensentase' => $tampung[0]['prensentase'],
			'kode_presentase' => $tampung[0]['kode_presentase'],
			// 'tipe_produk' => $tampung[0]['tipe_produk'],
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelpresentase->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			// 'dd_tipe' => $this->modelpresentase->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			// 'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterpresentase/edit_presentase',$data);
	}

	function savedata(){
		
		$this->load->model('modelpresentase');
		//if($_POST){
			//$id_presentase = $_POST['id_presentase'];
			$prensentase = $_POST['prensentase'];
			$kode_presentase = $_POST['kode_presentase'];
			// $id_tipe_produk= $_POST['id_tipe_produk'];
			// $tipe_produk = $_POST['tipe_produk'];
			//$createdate = $_POST ['createdate'];

			// $userlog = ($this->session->userdata('nama'));
		
        $data_dist = $this->modelpresentase->GetEva("where kode_presentase='$kode_presentase'")->result_array();
		
		
			$data = array(
			'prensentase' =>$prensentase,
			//'id_presentase' =>$id_presentase,
			'kode_presentase' =>$kode_presentase,
			// 'id_tipe_produk' =>$id_tipe_produk,
			// 'tipe_produk' =>$tipe_produk,
			// 'kode_presentase' =>$kode_presentase,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			// 'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['kode_presentase']);		
					
					
					
		if($pbid == $kode_presentase ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kode_presentase."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterpresentase');
		}else{
		 
		
		$result = $this->modelpresentase->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterpresentase');
		}
	
	}

	function update_presentase(){
	$this->load->model('modelpresentase');
	$dt = new DateTime();


		// date_default_timezone_set("Asia/Jakarta");
        // $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'id_presentase' =>$this->input->post('id_presentase'),
	'kode_presentase' => $this->input->post('kode_presentase'),
	'prensentase' => $this->input->post('prensentase'),
	// 'id_tipe_produk' => $this->input->post('id_tipe_produk_m'),
	// 'tipe_produk' => $this->input->post('tipe_produk_modal'),
	// 'updatedate' => $waktu,
	// 'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modelpresentase->update_presentase($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kode_presentase']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterpresentase');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterpresentase');
	}
	}
	

	function hapus_presentase($kode_presentase){
			
		$this->load->model('modelpresentase');	
	    $hapus['kode_presentase'] = $this->uri->segment(3);
	
	    $hasil = $this->modelpresentase->deleteData("master_presentase",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kode_presentase']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterpresentase');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterpresentase');
		}
		
    }
}
	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
