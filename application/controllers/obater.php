<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obater extends CI_Controller 

{

	public function __construct()
	{
		parent::__construct();
	   
	}
	
	
	
	
	function get_detail_material2(){
		
		$this->load->model('mmprinsp');
        $id_material['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=> $this->mmprinsp->GetAllData("where id_material = '$id_material'" )->result_array(),
        );
        $this->template->Display('pengajuan_cab/data_pengajuan' ,$data);
    }
	
	  function get_detail_barang(){
        $id['id_material']=$this->input->post('id_material');
        $data=array(
            'data_material'=>$this->mmprinsp->getSelectedData('master_material' ,$id)->result(),
        );
        $this->template->Display('pengajuan_cab/ajax_detail_material',$data);
    }

	
	public function get_detail_material()
	{
		$this->load->model('mmprinsp');
		//$data['data_material'] = $this->mmprinsp->GetPaket("order by id_material asc")->result_array();
		
		if (isset($_POST["id_material"])) {
        $kode_rs = $_POST["id_material"];
                              
       $query['data_material'] = $this->mmprinsp->GetAllData("where id_material = '$kode_rs'")->result_array();
       }else{
       $query['data_material'] = $this->mmprinsp->GetAllData('order by id_material asc')->result_array();
       }
	   
       $this->template->Display('pengajuan_cab/ajax_detail_material', $query);
	   
	}
		
	
	
	

	public function index()
	{
		
		$this->load->model('mmprinsp');
		$this->load->model('obatm');
			$data['kode_prinsipal'] = $this->mmprinsp->code_otomatis();
		    $data['data_obat'] = $this->obatm->Getobats_db1()->result_array();
			$data['nama'] = $this->session->userdata('nama');	
			$data['cabang'] = $this->session->userdata('cabang');	
			$data['kode_obat']= $this->obatm->Getobat_db2("order by obatnama asc")->result_array();;
			
			
	  
	$this->template->Display('obat/data_obat', $data);
	}
	
function getobat_db2()
    
  {
    $this->load->model('obatm');
    $obatid=$this->input->post('obatid');
    $data=$this->obatm->get_data_pabrik_bykode_db2($obatid);
    echo json_encode($data);
    
  }

	function edit_mastertiperek($no_tipe_rekanan=0){
        $this->load->model('mmprinsp');
		$data_bank = $this->mmprinsp->GetTipeRek("where no_tipe_rekanan ='$no_tipe_rekanan'")->result_array();


	    $data = array(

		
		'no_tipe_rekanan' =>  $data_bank[0]['no_tipe_rekanan'],		
		'nm_tipe_rekanan' =>  $data_bank[0]['nm_tipe_rekanan'],
			
		
			
	);

	$this->template->display('master_tipe_rekanan/edit_tipe_rekanan', $data);
	
	}
	
	function savedata()
	{
	$this->load->model('obatm');	

		    $obatid = $_POST['obatid'];
		    $obatnama = $_POST['obatnama'];
		    $alkes = $_POST['alkes'];
		    $alum = $_POST['alum'];
			$userlog = ($this->session->userdata('nama'));
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");
	
		$data = array(
			
			'obatid'=> $obatid,
			'obatnama'=> $obatnama,
			'alkes'=> $alkes,
			'alum'=> $alum,
			'createby' => $userlog ,
			'createdate' => $waktusaatini,
			
	);

		  
				$result = $this->obatm->Simpan_db1("tb_obat",$data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'obater');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_url().'obater');
		    
		 }
		  
	}
	
	
	function updateproduk(){
	$this->load->model('tipeprodukm');
	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");  

	$data = array(
	'idpro' =>$this->input->post('idpro'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'tipe_produk' => $this->input->post('tipe_produk'),
	'updatedate' => $waktu,
	'updateby' =>  $this->session->userdata('nama'),
	);

	$hasil = $this->tipeprodukm->Updateproduk($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'tipeproduk');
	}
	}

		function hapus_item($idobat){
			
		$this->load->model('obatm');	
	    $hapus['idobat'] = $this->uri->segment(3);
	
	    $this->obatm->Hapus_db1("tb_obat",$hapus);

        redirect('obater');

	
		}
	
	
	
	}
		
	


