    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Farmasitransaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

		
	function get_prinsipal()
		
	{
		$this->load->model('farmasikat');
		$koper=$this->input->post('koper');
		$data=$this->farmasikat->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

		
	function get_obatss()
		
	{
		$this->load->model('farmasikat');
		$obatid=$this->input->post('obatid');
		$data=$this->produkom->get_data_obats_bykode($obatid);
		echo json_encode($data);
		
	}

			
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
      if($rolesdara=='Direktur Operasional dan Umum'){
		$this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status ='1' and id_tipe_produk='TP001' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->farmasikat->Getaproveview("where  id_tipe_produk='TP001' order by idtrcom desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/tr_farmasi', $data);
	}elseif ($rolesdara=='Kepala Departemen Jangmed'){
         $this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status ='0' and id_tipe_produk='TP001' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->farmasikat->Getaproveview("where  id_tipe_produk='TP001' order by idtrcom desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/tr_farmasi', $data);
	}elseif($rolesdara=='Manager Perencanaan Jangmed'){
		 $this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status is null and id_tipe_produk='TP001' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->farmasikat->Getaproveview("where status ='4' and  id_tipe_produk='TP001' order by idtrcom desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/tr_farmasi', $data);
	}elseif($rolesdara=='Staff Jangmed' ||$rolesdara=='Administrator'){
		 $this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status is null and id_tipe_produk='TP001' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->farmasikat->Getaproveview("where status ='4' and  id_tipe_produk='TP001' order by idtrcom desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/tr_farmasi', $data);
	}else{
		 $this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status ='7' and id_tipe_produk='TP001' order by createdate desc")->result_array();
		$data['data_reject'] = $this->farmasikat->Getaproveview("where status ='7' and id_tipe_produk='TP001' order by tanggal desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/tr_farmasi', $data);
	}
}


function addtrfarmasi($id,$tgl)
	{
		$this->load->model('farmasikat');
        $data = array(
        'nama'=>$this->session->userdata('nama'),	
	'cabang' => $this->session->userdata('cabang'),  
        'tr' => $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row(),
        'data_prod' => $this->farmasikat->Getprodukm("order by idpr2 asc")->result_array(),                        
	'data_produko' => $this->farmasikat->GetprodukV("where kode_th='$id' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik'=> $this->farmasikat->GetKodePrinsp("where id_tipe_produk='TP001' order by nm_perusahaan ASC")->result_array(),
        'tipe_produk'=> $this->farmasikat->Gettipe()->result_array(),
		 );
		 
		$this->template->display('katproduk/data_farmasi', $data);
	}



	function cetakfarmasi()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('farmasikat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->farmasikat->Getaprove("where status ='2' and id_tipe_produk='TP001' order by createdate desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katproduk/v_farmasi', $data);
	}

function lihattrfarmasi($id,$tgl)
	{
		$this->load->model('farmasikat');
        $data['nama']=$this->session->userdata('nama');
        $data['cabang'] = $this->session->userdata('cabang');
        $data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
        $data['data_produko'] = $this->farmasikat->GetprodukVcount("where kode_th='$id' and  tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array();   
       $data['data_prod'] = $this->farmasikat->Getprodukm("order by idpr2 asc")->result_array();
	$data['kode_pabrik']= $this->farmasikat->GetKodePrinsp("where id_tipe_produk='TP001' order by nm_perusahaan ASC")->result_array();
        $data['tipe_produk']= $this->farmasikat->Gettipe()->result_array();
		 
		$this->template->display('katproduk/lihat_trfarmasi', $data);
	}

function rejecttrfarmasi($id,$tgl)
	{
		$this->load->model('farmasikat');
        $this->load->model('produkom'); 
        $data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
        $data['data_prod'] = $this->farmasikat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->farmasikat->GetprodukVcount("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->farmasikat->GetKodePrinsp("where id_tipe_produk='TP001' order by nm_perusahaan ASC")->result_array();
        $data['tipe_produk']= $this->farmasikat->Gettipe()->result_array();
		 
		$this->template->display('katproduk/rejecttrfarmasi', $data);
	}

	function viewtrfarmasi($id,$tgl)
	{
		$this->load->model('farmasikat');
        $this->load->model('produkom'); 
        $data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
        $data['data_prod'] = $this->farmasikat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->farmasikat->GetprodukVcount("where kode_th='$id' and  tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->farmasikat->GetKodePrinsp("where id_tipe_produk='TP001' order by nm_perusahaan ASC")->result_array();
        $data['tipe_produk']= $this->farmasikat->Gettipe()->result_array();
		 
		$this->template->display('katproduk/view_trfarmasi', $data);
	}

	function adddetail($id,$koper)
	{
		$this->load->model('farmasikat');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produkos2',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->farmasikat->Getprodukms2("where koded_prod='$id'")->result_array(),
			 'obat' => $this->farmasikat->Getobatcobauy("where tipe_produk='TP001' order by nama_produk desc")->result_array(),
			 'tipe_harga' => $this->farmasikat->Gettipeharga("order by idtipeharga asc")->result_array(),
);
		 
		$this->template->display('katproduk/add_detilfarmasi', $data);
	}

   function savedata_aprovefarmasi(){
		$this->load->model('farmasikat');
		
		$tanggal = $_POST['tanggal'];
		$id_tipe_produk = $_POST['id_tipe_produk'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->farmasikat->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $pbid = isset($datatgl[0]['tanggal']);
		 $tp = isset($datatgl[0]['id_tipe_produk']);
		
		if($pbid == $tanggal && $tp == $id_tipe_produk){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Farmasitransaksi');
		}else{
		 
		
		$result = $this->farmasikat->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Farmasitransaksi');
		}
	}

	function savedatas(){
		$this->load->model('farmasikat');

		 $koper = $_POST['koper'];
		 $kodis = $_POST['kodis'];
		 $tipe_produk = $_POST['tipe_produk'];
		 $tanggal = $_POST['tanggal_tr'];
		 $kode_th = $_POST['kode_th'];
		 
          $datatgl = $this->farmasikat->Getproduk("where koper='$koper' and tanggal_tr='$tanggal'")->result_array();

		$data = array(	
			'id_tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'tanggal_tr' => $tanggal,
			'kodis' =>$kodis,
			'kode_th' => $kode_th,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$pbid = isset($datatgl[0]['koper']);
        $tgl = isset($datatgl[0]['tanggal_tr']);
				if($pbid == $koper && $tgl == $tanggal ){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal.'');
		}else{
			$result = $this->farmasikat->SaveFarmasi_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal.'');
		}
		
	}

	

	function savedata(){
		$this->load->model('farmasikat');
		
		$koded_prod = $_POST['koded_prod'];
		$kode_th = $_POST['kode_th'];
		$kodis = $_POST['kodis'];
		$kode_produk = $_POST['kode_produk'];
		$koper = $_POST['koper'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$diskon = $_POST['diskon'];	
				
        $datatgl = $this->farmasikat->Getdetail("where kode_produk='$kode_produk' and koded_prod='$koded_prod'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'kode_th' => $kode_th,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'kodis' => $kodis,
			'harga' => $harga,
			'discount' => $diskon,
			'tipe_harga' => $tipe_harga,  
			'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['obatid']);
		$tgltr = isset($datatgl[0]['koded_prod']);

				if($obid == $obatid && $tgltr == $koded_prod){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');
		}else{
			$result = $this->farmasikat->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');
		}
		
	}


	function editheadfarmasi($kode=0){
	$this->load->model('farmasikat');
	
	
	$tampung = $this->farmasikat->GetprodukV("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->farmasikat->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}
    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
		
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'prins' => $this->farmasikat->GetKodePrinsp("where id_tipe_produk='TP001'")->result_array(),
		'for_prins' => $for_prins,
		'kodis'=> $tampung[0]['kodis'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'kode_th' => $tampung[0]['kode_th'],
		'tanggal_tr' => $tampung[0]['tanggal_tr'],	
		'koper' => $tampung[0]['koper'],
		);

	
	$this->template->display('katproduk/edit_farmasi', $data);

	}


	function updatefarmasihead(){
     
     $this->load->model('farmasikat');

		$idpr2=$_POST['idpr2'];
		$kode_th=$_POST['kode_th'];
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];		
		$tanggal_tr = $_POST['tanggal_tr'];		
		
				
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'kode_th' =>$this->input->post('kode_th'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'koper' => $this->input->post('koper'),
	'kodis' =>$this->input->post('kodis'),
	'tanggal_tr' => $this->input->post('tanggal_tr'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('farmasikat');
	$hasil = $this->farmasikat->Updateheadfarmasi($data);
	if($hasil>=0){
 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal_tr.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal_tr.'');
	}
	}




	function hapusheadfarmasi($kode = 1,$kodetr=0,$tgl=0){
	$this->load->model('farmasikat');	
	$kode_th=$kodetr;
    $tanggal=$tgl;
	$result = $this->farmasikat->Hapus('produko2', array('idpr2' => $kode));
    $result = $this->farmasikat->Hapus('tb_detail_prod2', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/addtrfarmasi/'.$kode_th.'/'.$tanggal.'');
	}
	}

	function hapustrfarmasi($kode = 1){
	$this->load->model('farmasikat');	
	$result = $this->farmasikat->Hapus('tr_print_compare', array('idtrcom' => $kode));
	$result = $this->farmasikat->Hapus('produko2', array('kode_th' => $kode));
	$result = $this->farmasikat->Hapus('tb_detail_prod2', array('kode_th' => $kode));
   	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$koded_prod=$kd_pd;
		$koper=$pbkid;
		
	$this->load->model('farmasikat');	
	$result = $this->farmasikat->Hapus('tb_detail_prod2', array('iddetailprod2' => $kode,'koded_prod' => $kd_pd,'koper' => $pbkid));
	
			if($kd_pd=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');
		}
	
}


function editabks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('farmasikat');
	
	
	$tampung = $this->farmasikat->Getdetail("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->farmasikat->Getdetail("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		 $for_harga = array();
		foreach($this->farmasikat->Getprodukms2("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->farmasikat->Getobatcobauy("where tipe_produk='TP001'")->result_array(),
		'for_prins' => $for_prins,
		'hargas' => $this->farmasikat->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'koper' => $tampung[0]['koper'],
		'kode_produk' => $tampung[0]['kode_produk'],
		'harga' => $tampung[0]['harga'],
		'discount' => $tampung[0]['discount'],
		'kode_th' => $tampung[0]['kode_th'],
		);

	
	$this->template->display('katproduk/edit_detilfarmasi', $data);	
}
	function updateabksd(){
     
     $this->load->model('farmasikat');

     
	    $iddetailprod2=$_POST['iddetailprod2'];
		$koded_prod = $_POST['koded_prod'];
		$kode_produk = $_POST['kode_produk'];	
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];
		$tipe_harga = $_POST['tipe_harga'];	
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		$kode_th=$_POST['kode_th'];		

	$data = array(
	'iddetailprod2' =>$this->input->post('iddetailprod2'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'koper' =>$this->input->post('koper'),
	'kodis' =>$kodis,
	'tipe_harga' =>$this->input->post('tipe_harga'),
	'harga' =>$this->input->post('harga'),
	'discount' =>$this->input->post('discount'),
	'kode_th' =>$this->input->post('kode_th'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('farmasikat');
	$hasil = $this->farmasikat->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi/adddetail/'.$koded_prod.'/'.$koper.'');
	}
	}

	 function editaprovefarmasi($kode=0){
	$this->load->model('farmasikat');
	
	
	$tampung = $this->farmasikat->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->farmasikat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->farmasikat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->farmasikat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdsatu[] = $role['ttd_satu'];
		}

		
    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
   		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idtrcom' => $tampung[0]['idtrcom'],	
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		 'for_ttdmeng' => $for_ttdmenger,
		'idpengajuan' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
        'for_ttdsatus' => $for_ttdsatu,
        'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
		'tanggal' => $tampung[0]['tanggal'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'menyetujui' => $tampung[0]['menyetujui'],
		'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
		'jb_menyetujui' => $tampung[0]['jb_menyetujui'],
		'mengetahui' => $tampung[0]['mengetahui'],
		'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
		'jb_mengetahui' => $tampung[0]['jb_mengetahui'],
		'nama_satu' => $tampung[0]['nama_satu'],
		'ttd_satu' => $tampung[0]['ttd_satu'],
		'jb_satu' => $tampung[0]['jb_satu'],
		'status' => $tampung[0]['status'],
		
			);

	
	$this->template->display('katproduk/editaprovefarmasi', $data);

	}

	function updateaprove(){
     
     $this->load->model('farmasikat');
   
	    $idtrcom=$_POST['idtrcom'];
	    $nama_satu = $_POST['nama_satu'];
		$ttd_satu = $_POST['ttd_satu'];
		$jb_satu = $_POST['jb_satu'];
		$mengetahui = $_POST['mengetahui'];
		$ttd_mengetahui = $_POST['ttd_mengetahui'];
		$jb_mengetahui = $_POST['jb_mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$ttd_menyetujui = $_POST['ttd_menyetujui'];
		$jb_menyetujui = $_POST['jb_menyetujui'];
		$tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'mengetahui' =>$this->input->post('mengetahui'),
	'tanggal' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'ttd_mengetahui' =>$this->input->post('ttd_mengetahui'),
	'jb_mengetahui' =>$this->input->post('jb_mengetahui'),
	'nama_satu' =>$this->input->post('nama_satu'),
	'ttd_satu' =>$this->input->post('ttd_satu'),
	'jb_satu' =>$this->input->post('jb_satu'),
	'menyetujui' =>$this->input->post('menyetujui'),
	'ttd_menyetujui' =>$this->input->post('ttd_menyetujui'),
	'jb_menyetujui' =>$this->input->post('jb_menyetujui'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('farmasikat');
	$hasil = $this->farmasikat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}
	}

function editrejectfarmasi($kode=0){
	$this->load->model('farmasikat');
	
	
	$tampung = $this->farmasikat->Getaprove("where idtrcom ='$kode'")->result_array();

	

    $roles = (
			$this->session->userdata('nama_role')
			
		);

    $nama = (
			$this->session->userdata('nama')
			
		);
    
   		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idtrcom' => $tampung[0]['idtrcom'],	
		'tanggal' => $tampung[0]['tanggal'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'status' => $tampung[0]['status'],
		'catatan' => $tampung[0]['catatan'],
		
			);

	
	$this->template->display('katproduk/rejectfarmasi', $data);

	}

	function updatereject(){
     
     $this->load->model('farmasikat');
   
	    $idtrcom=$_POST['idtrcom'];
	   	$tanggal=$_POST['tanggal'];
	   	$catatan=$_POST['catatan'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idtrcom' =>$this->input->post('idtrcom'),
	'tanggal' =>$this->input->post('tanggal'),
	'catatan' =>$this->input->post('catatan'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('farmasikat');
	$hasil = $this->farmasikat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Farmasitransaksi');
	}
	}

	
}

