<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class masterregional extends CI_Controller {

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
		$this->load->model('modelregional');
		$id_tipe_produk=$this->input->post('id_tipe_produk');
		$data=$this->modelregional->get_data_tipe_bykode($id_tipe_produk);
		echo json_encode($data);
		}


	public function index()
	{
		$this->load->model('modelregional');
	
		$data = array(
		    'kode_regional' => $this->modelregional->code_otomatis(),
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'dd_tipe' => $this->modelregional->Get_dd_tipe("order by id_tipe_produk")->result_array(),

			'data_regional' => $this->modelregional->GetEva("order by kode_regional asc")->result_array(),
		);

	$this->template->Display('masterregional/data_regional',$data);
	}

	function addregional()
	{
		$this->load->model('modelregional');
		// $data['kode_regional'] = $this->modelregional->code_otomatis();
		$data = array(
       

			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
		    'kode_regional' => $this->modelregional->code_otomatis(),
	//		'koders' => $this->session->userdata('koders'),	
	//		'namars' => $this->session->userdata('namars'),
		);
		$this->template->Display('masterregional/add_regional',$data);
	
	}

	
	function editmasterregional($id_regional=1){		
	$this->load->model('modelregional');
	
	 $id_tp_post_array = array();
		// foreach($this->modelregional->GetEva("where id_regional = '$id_regional'")->result_array() as $dd_tipe){
			// $id_tp_post_array[] = $dd_tipe['id_tipe_produk'];
		// } 
			//$tampung = $this->modelregional->GetWhere("where master_regional = '$id_regional'")->result_array();
		$tampung = $this->modelregional->GetWhere('master_regional', array('id_regional' => $id_regional));
		$data = array(
			//'createdate' => $tampung[0]['createdate'],
			'id_regional' => $tampung[0]['id_regional'],
			'nm_regional' => $tampung[0]['nm_regional'],
			'kode_regional' => $tampung[0]['kode_regional'],
			// 'tipe_produk' => $tampung[0]['tipe_produk'],
			// 'id_tipe_produk' => $this->model->GetRumahSakit("where koders != '$kode' order by koders asc")->result_array(),
			
            // 'id_tipe_produk' => $this->modelregional->Get_dd_tipe(" order by id_tipe_produk asc")->result_array(),
			// 'dd_tipe' => $this->modelregional->Get_dd_tipe("order by id_tipe_produk asc")->result_array(),
			// 'dd_tipe_post' => $id_tp_post_array,
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			
		
			
			);
		$this->template->Display('masterregional/edit_regional',$data);
	}

	function savedata(){
		
		$this->load->model('modelregional');
		//if($_POST){
			//$id_regional = $_POST['id_regional'];
			$nm_regional = $_POST['nm_regional'];
			$kode_regional = $_POST['kode_regional'];
			// $id_tipe_produk= $_POST['id_tipe_produk'];
			// $tipe_produk = $_POST['tipe_produk'];
			//$createdate = $_POST ['createdate'];

			// $userlog = ($this->session->userdata('nama'));
		
        $data_dist = $this->modelregional->GetEva("where kode_regional='$kode_regional'")->result_array();
		
		
			$data = array(
			'nm_regional' =>$nm_regional,
			//'id_regional' =>$id_regional,
			'kode_regional' =>$kode_regional,
			// 'id_tipe_produk' =>$id_tipe_produk,
			// 'tipe_produk' =>$tipe_produk,
			// 'kode_regional' =>$kode_regional,
			// 'createdate' => date("Y-m-d H:i:s"),
		
			// 'createby'=>$userlog 

			//if($status == "baru"){
				//$data = array(
					//'koders' => $koders,
					//'namars' => $namars,
					//'cdate' => date("Y-m-d H:i:s"),
					);
			$pbid = isset($data_dist[0]['kode_regional']);		
					
					
					
		if($pbid == $kode_regional ){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> Distributor dengan NO : ".$kode_regional."  tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'masterregional');
		}else{
		 
		
		$result = $this->modelregional->Simpan_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'masterregional');
		}
	
	}

	function update_regional(){
	$this->load->model('modelregional');
	$dt = new DateTime();


		// date_default_timezone_set("Asia/Jakarta");
        // $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'id_regional' =>$this->input->post('id_regional'),
	'kode_regional' => $this->input->post('kode_regional'),
	'nm_regional' => $this->input->post('nm_regional'),
	// 'id_tipe_produk' => $this->input->post('id_tipe_produk_m'),
	// 'tipe_produk' => $this->input->post('tipe_produk_modal'),
	// 'updatedate' => $waktu,
	// 'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->modelregional->update_regional($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data dengan NO : ".$data['kode_regional']." BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'masterregional');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'masterregional');
	}
	}
	

	function hapus_regional($kode_regional){
			
		$this->load->model('modelregional');	
	    $hapus['kode_regional'] = $this->uri->segment(3);
	
	    $hasil = $this->modelregional->deleteData("master_regional",$hapus);

       	if($hasil>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>DELETE data dengan NO : ".$hapus['kode_regional']." BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'masterregional');
		}else{
		$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
		header('location:'.base_url().'masterregional');
		}
		
    }
}
	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
