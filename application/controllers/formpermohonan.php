<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formpermohonan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	

	public function index()
	{

		//$kodeadmin=($this->session->userdata('koderole'));
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));

		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='15' 
			OR $koderole=='36' OR $koderole=='37' OR $koderole=='38' OR $koderole=='39')
		{


		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_formulirmhn' => $this->komdik->GetFormulirMhn("order by id_form_mhn desc")->result_array(),
			
		);


}else{

	$dept = ($this->session->userdata('nama_role'));

	$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'data_formulirmhn' => $this->komdik->GetFormulirMhn("where bagian ='$dept' order by id_form_mhn desc")->result_array(),
		);
}
		$this->template->Display('formpermohonan/data_formulirmhn', $data);
	}

	
	function addformulirmhn()
	{
		$this->load->model('komdik');

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			'id_form_mhn' => $this->komdik->GetFormulirMhn()->result_array(),
		   
		);

		$this->template->Display('formpermohonan/add_formulirmhn', $data);
	}


	function editformulirmhn($kode = 0){	

		$this->load->model('komdik');
	
		$tampung = $this->komdik->AmbilDataFormulirMhn("where id_form_mhn = '$kode'")->result_array();
		$statusdocument_post_array = array();

		//foreach($this->komdik->AmbilDataDafdir("where id_dafdir = '$kode'")->result_array() as $statusdoc){
			//$statusdokumen_post_array[] = $statusdoc['status_dafdir'];
		
		 $for_ttdmenger = array();
		 foreach($this->komdik->AmbilDataFormulirMhn("where id_form_mhn = '$kode'")->result_array() as $role){
		 $for_ttdmenger[] = $role['ttd_menyetujui'];
		 }
		
		$for_ttdmengerr = array();
		foreach($this->komdik->AmbilDataFormulirMhn("where id_form_mhn = '$kode'")->result_array() as $role){
			$for_ttdmengerr[] = $role['ttd_mengetahui'];
		}
		
		$for_ttdmengerrr = array();
		foreach($this->komdik->AmbilDataFormulirMhn("where id_form_mhn = '$kode'")->result_array() as $role){
			$for_ttdmengerrr[] = $role['ttd_pemohon'];
		}

		$roles = ($this->session->userdata('nama_role'));
		$namaroles = ($this->session->userdata('nama'));

		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),

			'id_form_mhn' => $tampung[0]['id_form_mhn'],	
			'perihal_formulir' => $tampung[0]['perihal_formulir'],
			'bagian' => $tampung[0]['bagian'],
			'untuk_byr' => $tampung[0]['untuk_byr'],
			'jumlah' => $tampung[0]['jumlah'],
			'terbilang' => $tampung[0]['terbilang'],
			'tgl_byr' => $tampung[0]['tgl_byr'],
			'tgl_formulir' => $tampung[0]['tgl_formulir'],
			'idpemohon' => $this->komdik->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmenggg' => $for_ttdmengerrr,
			'idmengetahuii' => $this->komdik->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmengg' => $for_ttdmengerr,
			'idmengetahui' => $this->komdik->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmeng' => $for_ttdmenger,
			'pemohon' => $tampung[0]['pemohon'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'menyetujui' => $tampung[0]['menyetujui'],
			'ttd_pemohon' => $tampung[0]['ttd_pemohon'],
			'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
			'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],					
			);

		$this->template->Display('formpermohonan/edit_formulirmhn', $data);
	}

 
	function updateformulirmhn(){

		$this->load->model('komdik');
		
		$id_form_mhn=$_POST['id_form_mhn'];
		$perihal_formulir = $_POST['perihal_formulir'];
		$bagian = $_POST['bagian'];
		$tgl_formulir = $_POST['tgl_formulir'];
		$pemohon = $_POST['pemohon'];
		$mengetahui = $_POST['mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$ttd_pemohon = $_POST['ttd_pemohon'];
		$ttd_mengetahui = $_POST['ttd_mengetahui'];
		$ttd_menyetujui = $_POST['ttd_menyetujui'];

		
				

		$userlog = ($this->session->userdata('nama'));


		date_default_timezone_set("Asia/Jakarta");
        $waktusaatini =date("d-m-Y H:i:s");
		
		
		$data = array(

			'id_form_mhn' =>$id_form_mhn,
			'perihal_formulir' => $perihal_formulir,
			'bagian' => $bagian,
			'tgl_formulir' => $tgl_formulir,
			'ttd_pemohon' => $this->input->post('ttd_pemohon'),
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'ttd_menyetujui' => $this->input->post('ttd_menyetujui'),
			'updatedby' =>$userlog,
			'updateddate' => $waktusaatini,
			'pemohon' => $this->input->post('pemohon'),
			'mengetahui'=> $this->input->post('mengetahui'),
			'menyetujui'=> $this->input->post('menyetujui'),
			
			);
					

		$res = $this->komdik->UpdateFormulirMohon($data);
		
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'formpermohonan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'formpermohonan');
		}
	}
	

	function hapusformulirmhn($id = 1){

		$this->load->model('komdik');
		
		$result = $this->komdik->Hapus('tbl_form_mhn', array('id_form_mhn' => $id));
		$result = $this->komdik->Hapus('tbl_memo_dafdir', array('id_memo_dafdir'=> $id));
		$result = $this->komdik->Hapus('konfirm_peserta', array('idkonfirmpeserta'=> $id));
		$result = $this->komdik->Hapus('tbl_history', array('id_history'=> $id));

		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'formpermohonan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'formpermohonan');
		}
	}
}

