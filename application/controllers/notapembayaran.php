<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notapembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{

		$kodeadmin=($this->session->userdata('nama_role'));

		if($kodeadmin=='Direktur Operasional dan Umum' || $kodeadmin=='Direktur Medis' || $kodeadmin=='Direktur Utama' || $kodeadmin=='Direktur Keuangan & Pengembangan Strategik'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval ='Approve Pemeriksa' OR approval ='Approve Sign Cek 1'order by id_trnota desc")->result_array(),
		);
		}

		elseif($kodeadmin=='Manager BUSDEV'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval ='Approve Persetujuan Bayar' order by id_trnota desc")->result_array(),
		);
		}

		elseif($kodeadmin=='Kepala Departemen HRD'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval ='Approve Pemohon' order by id_trnota desc")->result_array(),
		);
		}

		elseif($kodeadmin=='Departemen Busdev'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval is null OR approval = 'Approve Petugas Jurnal' OR approval = 'Menunggu Disetujui' order by id_trnota desc")->result_array(),

		);
		}

		elseif($kodeadmin=='Departemen HRD'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval is null order by id_trnota desc")->result_array(),

		);
		}

		
		elseif($kodeadmin=='Manager Kesejahteraan'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
		    'data_nota' => $this->model->GetNota("where approval = 'Approve Bagian Akuntansi' order by id_trnota desc")->result_array(),
		);
		}

		else{

		$data = array(
			
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),			
			'data_nota' => $this->model->GetNota("order by id_trnota desc")->result_array()
		);
}		
		$this->template->Display('notapembayaran/data_nota', $data);
	}

	function disetujui()
	{

		$kodeadmin=($this->session->userdata('nama_role'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
			'data_nota' => $this->model->GetNota("where approval = 'Approve Sign Cek 2' order by id_trnota desc")->result_array(),
		
		);

		$this->template->display('notapembayaran/disetujuii', $data);
	}
	
	function direvisi()
	{

		$kodeadmin=($this->session->userdata('nama_role'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
			'data_nota' => $this->model->GetNota("where approval = 'Revisi' order by id_trnota desc")->result_array(),
		
		);

		$this->template->display('notapembayaran/direvisi', $data);
	}

function ditolak()
	{

		$kodeadmin=($this->session->userdata('nama_role'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'foto' => $this->session->userdata('foto'),
			'data_nota' => $this->model->GetNota("where approval = 'Not Approved' order by id_trnota desc")->result_array(),
		
		);

		$this->template->display('notapembayaran/ditolak', $data);
	}

	function editnota($kode=0){


	$data_nota = $this->model->AmbilDataNota("where id_trnota ='$kode'")->result_array();

	$untuk_pemohon = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_pemohon[] = $role['pemohon'];
		}

	$untuk_ptgsjurnal = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_ptgsjurnal[] = $role['ptgs_jurnal'];
		}

	$untuk_akuntansi = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_akuntansi[] = $role['bag_akuntansi'];
		}

	$untuk_persebayar = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_persebayar[] = $role['perse_bayar'];
		}

	$untuk_pemeriksa = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_pemeriksa[] = $role['pemeriksa'];
		}

	$untuk_ttdcek1 = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_ttdcek1[] = $role['sign_cek1'];
		}

	$untuk_ttdcek2 = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_ttdcek2[] = $role['sign_cek2'];
		}

	$untuk_penerima = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$untuk_penerima[] = $role['penerima_pemb'];
		}

	$nama_cek1 = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$nama_cek1[] = $role['nama_signcek1'];
		}
		
	$nama_cek2 = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $role){
			$nama_cek2[] = $role['nama_signcek2'];
		}

	$roles = (
			$this->session->userdata('nama_role')
			
		);
	$namaroles = (
			$this->session->userdata('nama')
			
		);

	$supp_post_array = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $supplier){
			$supp_post_array[] = $supplier['supplier'];
		}

	$pt_post_array = array();
		foreach($this->model->AmbilDataNota("where id_trnota = '$kode'")->result_array() as $perusahaan){
			$pt_post_array[] = $perusahaan['nama_pt'];
		}


	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),			
		'id_trnota' =>  $data_nota[0]['id_trnota'],
		'nama_pt' => $data_nota[0]['nama_pt'],
		'no_bukti' => $data_nota[0]['no_bukti'],
		'supplier' => $this->model->GetSupplier("where kode_supplier != '$kode' order by kode_supplier asc")->result_array(),
		'no_perkiraan' => $data_nota[0]['no_perkiraan'],
		'no_girocek' => $data_nota[0]['no_girocek'],
		'no_rek' => $data_nota[0]['no_rek'],
		'bank' => $data_nota[0]['bank'],
		'keterangan' => $data_nota[0]['keterangan'],
		'no_invoice' => $data_nota[0]['no_invoice'],
		'tanggal' =>  $data_nota[0]['tanggal'],
		'tagihan' => $data_nota[0]['tagihan'],
		'pembayaran' =>  $data_nota[0]['pembayaran'],
		'sisa' =>  $data_nota[0]['sisa'],
		'pic' =>  $data_nota[0]['pic'],
		'pemohon' =>  $data_nota[0]['pemohon'],
		'ptgs_jurnal' =>  $data_nota[0]['ptgs_jurnal'],
		'bag_akuntansi' =>  $data_nota[0]['bag_akuntansi'],
		'perse_bayar' =>  $data_nota[0]['perse_bayar'],
		'pemeriksa' =>  $data_nota[0]['pemeriksa'],
		 'sign_cek1' =>  $data_nota[0]['sign_cek1'],
		 'sign_cek2' =>  $data_nota[0]['sign_cek2'],
		  'catatan' =>  $data_nota[0]['catatan'],

		'supplier' => $this->model->GetSupplier()->result_array(),
		'supp_post' => $supp_post_array,
		'perusahaan' => $this->model->GetPT()->result_array(),
		'pt_post' => $pt_post_array,
		
		'approval' => $data_nota[0]['approval'],
		'idpemohon' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
		'pemohon1' => $untuk_pemohon,
		'idjurnal' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' AND nama_user='$namaroles'")->result_array(),
		'jurnal' => $untuk_ptgsjurnal,
		'idakuntansi' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' AND nama_user='$namaroles'")->result_array(),
		'akuntansi' => $untuk_akuntansi,
		'idbayar' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
		'bayar' => $untuk_persebayar,
		'idpemeriksa' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
		'pemeriksa1' => $untuk_pemeriksa,
		'idsigncek1' => $this->model->AmbilDataTTDMengetahui("where role='Direktur Operasional dan Umum' OR role='Direktur Medis' OR role='Direktur Utama' OR role='Direktur Keuangan & Pengembangan Strategik'")->result_array(),
		'signcek1' => $untuk_ttdcek1,
		'idsigncek2' => $this->model->AmbilDataTTDMengetahui(" where role='Direktur Operasional dan Umum' OR role='Direktur Medis' OR role='Direktur Utama' OR role='Direktur Keuangan & Pengembangan Strategik'")->result_array(),
		'signcek2' => $untuk_ttdcek2,

		'idnamacek1' => $this->model->AmbilDataTTDMengetahui("where role='Direktur Operasional dan Umum' OR role='Direktur Medis' OR role='Direktur Utama' OR role='Direktur Keuangan & Pengembangan Strategik'")->result_array(),
		'namasigncek1' => $nama_cek1,
		'idnamacek2' => $this->model->AmbilDataTTDMengetahui(" where role='Direktur Operasional dan Umum' OR role='Direktur Medis' OR role='Direktur Utama' OR role='Direktur Keuangan & Pengembangan Strategik'")->result_array(),
		'namasigncek2' => $nama_cek2,

		'idpenerima' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
		'penerima' => $untuk_penerima,
		'nama_pemohon' =>  $data_nota[0]['nama_pemohon'],
		'nama_jurnal' =>  $data_nota[0]['nama_jurnal'],
		'nama_akuntansi' =>  $data_nota[0]['nama_akuntansi'],
		'nama_persebayar' =>  $data_nota[0]['nama_persebayar'],
		'nama_pemeriksa' =>  $data_nota[0]['nama_pemeriksa'],
		'nama_signcek1' =>  $data_nota[0]['nama_signcek1'],
		'nama_signcek2' =>  $data_nota[0]['nama_signcek2'],
		'nama_penerima' =>  $data_nota[0]['nama_penerima'],
		'lampiran' =>  $data_nota[0]['lampiran'],



		'data_nota' => $this->model->AmbilDataNota("where id_trnota = '$kode' order by id_trnota asc")->result_array()
			
	);

	
	$this->template->Display('notapembayaran/edit_nota', $data);

	// 	// echo $data_user[0]['nama_user'];

	}

	function updatenota(){

		if($_FILES['file_uploadlampiran']['error'] == 0):
			$configlampiran = array(
				'upload_path' => './assets/upload',
				'allowed_types' => 'gif|jpg|JPG|png|jpeg',
				'max_size' => '2048',
				
				);
		$this->load->library('upload', $configlampiran);      
		$this->upload->do_upload('file_uploadlampiran');
		$upload_lampiran = $this->upload->data();
		$file_name = $upload_lampiran['file_name'];
		else:
			$file_name = $this->input->post('lampiran');
		endif;

	
	 	$id_trnota=$_POST['id_trnota'];
	 	$nama_pt = $_POST['nama_pt'];
		$no_bukti = $_POST['no_bukti'];
		$supplier = $_POST['supplier'];		
		$no_perkiraan = $_POST['no_perkiraan'];
		$no_girocek = $_POST['no_girocek'];
		$no_rek = $_POST['no_rek'];
		$bank = $_POST['bank'];
		$keterangan =$_POST['keterangan'];
		$no_invoice=$_POST['no_invoice'];
		$tanggal = $_POST['tanggal'];
		$tagihan = $_POST['tagihan'];
		$pembayaran = $_POST['pembayaran'];
		$sisa = $tagihan-$pembayaran;
		$pic = $_POST['pic'];
		$pemohon = $_POST['pemohon'];
       	$ptgs_jurnal = $_POST['ptgs_jurnal'];
        $bag_akuntansi = $_POST['bag_akuntansi'];
		$perse_bayar = $_POST['perse_bayar'];
		$pemeriksa = $_POST['pemeriksa'];
		$sign_cek1 = $_POST['sign_cek1'];
		$sign_cek2 = $_POST['sign_cek2'];
		$penerima_pemb = $_POST['penerima_pemb'];
		$approval = $_POST['approval'];
		$nama_pemohon = $_POST['nama_pemohon'];
       	$nama_jurnal = $_POST['nama_jurnal'];
        $nama_akuntansi = $_POST['nama_akuntansi'];
		$nama_persebayar = $_POST['nama_persebayar'];
		$nama_pemeriksa = $_POST['nama_pemeriksa'];
		$nama_signcek1 = $_POST['nama_signcek1'];
		$nama_signcek2 = $_POST['nama_signcek2'];
		$nama_penerima = $_POST['nama_penerima'];
		$lampiran = $_POST['lampiran'];
		$catatan = $_POST['catatan'];

		$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("d-m-Y H:i:s");
		$data = array(	

            'id_trnota'=> $id_trnota,
            'nama_pt' => $nama_pt,
			'no_bukti' => $no_bukti,
			'supplier' => $supplier,
			'no_perkiraan' => $no_perkiraan,
			'no_girocek' => $no_girocek,
			'no_rek' => $no_rek,
			'bank' => $bank,
			'keterangan' =>$keterangan,
			'no_invoice'=>$no_invoice,
			'tanggal' => $tanggal,
			'tagihan' => $tagihan,
			'pembayaran' => $pembayaran,
			'sisa' => $sisa,
			'pic' => $pic,
			'pemohon' => $pemohon,
			'ptgs_jurnal' => $ptgs_jurnal,
			'bag_akuntansi'=>$bag_akuntansi,
			'perse_bayar'=>$perse_bayar,
			'pemeriksa' => $pemeriksa,
			'sign_cek1' => $sign_cek1,
			'sign_cek2' => $sign_cek2,
			'penerima_pemb'=> $penerima_pemb,
			'nama_pemohon' => $nama_pemohon,
			'nama_jurnal' => $nama_jurnal,
			'nama_akuntansi'=>$nama_akuntansi,
			'nama_persebayar'=>$nama_persebayar,
			'nama_pemeriksa' => $nama_pemeriksa,
			'nama_signcek1' => $nama_signcek1,
			'nama_signcek2' => $nama_signcek2,
			'nama_penerima'=> $nama_penerima,
			'approval'=> $approval,
			'lampiran'=> $file_name,
			'catatan'=> $catatan,
			'updatedate' => $waktu,
			'updateby' =>  $this->session->userdata('nama'),
			
			
			);

	$hasil = $this->model->UpdateNota($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan dan Data BERHASIL dikirim</strong></div>");
	header('location:'.base_url().'notapembayaran');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'notapembayaran');
	}
	}

	function hapusnota($kode = 1){
		
	$result = $this->model->Hapus('notapembayaran', array('id_trnota' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'notapembayaran');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'notapembayaran');
	}
	}
}

