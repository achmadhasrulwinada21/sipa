<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perbarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	//	$this->_cek_login();
	}
	//private function _cek_login()
	//{
	//	if (!$this->session->userdata('level','1')){            
	//		redirect(base_url().'backend');
	//	}
	//}
		//tambah jd_dept untuk judul
	public function index($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		//$this->load->model('detbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		//$id_formulir = ($this->session->userdata('id_formulir'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
			if (isset($_POST["id_departemen"]) && ($_POST["id_formulir"]) ){
                $id_formulir = $_POST["id_formulir"];
                $id_departemen = $_POST["id_departemen"];
               
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where id_departemen = '$id_departemen' AND mengetahuidirekturcheck='Revisi'")->result_array();
				}else{
					  $data   ['barangnewid'] = $this->perbarangm->GetBarang( "limit 10")->result_array();	
					 }
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where mengetahuidirekturcheck='Draf'")->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();
				$data	['lihatdetail'] = $this->perbarangm->GetDetBarangNew()->result_array();
		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept' AND mengetahuidirekturcheck='Draf'")->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang',$data);
		//$this->load->view('perbarang/data_barang', $data);
	}
	
	public function cetak_gabung()
		{
			if (isset($_POST["id_formulir"])){
                        $id_formulir = $_POST["id_formulir"];
			
          $query=array(
                          'cetak_detail_barang' => $this->detbarangm->GetDetailbarang("where id_formulir = '$id_formulir'")->result_array(),
                    );
                   }else{
                    	$query=array(
                    	'cetak_detail_barang' => $this->detbarangm->GetBarang()->result_array(),
                    );
                    }
                    $this->load->view('cetak_gabung', $query);                     		
	    }
	


	function addbarang($kode = 0){
		
		$this->load->model('perbarangm');
	
		$roles = ($this->session->userdata('nama_role'));
		$namaroles = ($this->session->userdata('nama'));
		
		$for_ttdpemohon = array();
			foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$for_ttdpemohon[] = $role['ttd_mengajukan'];
		}
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'idpemohon' => $this->perbarangm->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdpemohonsurat' => $for_ttdpemohon,
		);
		$this->template->Display('perbarang/add_barang',$data);
		//$this->load->view('perbarang/add_barang', $data);
	}


	function savedata($kode = 0){
		//if($_POST){
			
		$configttd = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
			'max_size' => '2048',

		);
		$this->load->library('upload', $configttd);	
		$this->upload->do_upload('file_uploadttd');
		$upload_foto = $this->upload->data();
		$file_name = $upload_foto['file_name'];
		
		//beda sama yg atas ini khusus lampiran
		$configlampiran = array(
			'upload_path' => './assets/upload',
			'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
			'max_size' => '20480',

		);
		
		$this->load->library('upload', $configlampiran);	
		$this->upload->do_upload('file_attachment');
		$upload_lampiran = $this->upload->data();
		$file_lampiran = $upload_lampiran['file_name'];
		
		$this->load->model('perbarangm');
			$namadepartemen = $_POST['namadepartemen'];
			$tanggal = $_POST['tanggal'];
			$perihal = $_POST['perihal'];
			$lampiran = $_POST['lampiran'];
			$pembuka = $_POST['pembuka'];
			$isi = $_POST['isi'];
			$penutup = $_POST['penutup'];
			$mengajukan = $_POST['mengajukan'];
			$mengetahui = $_POST['mengetahui'];
			$no_formulir = $_POST['no_formulir'];
			$supplier = $_POST['supplier'];
			$alamat = $_POST['alamat'];
			$no_telp = $_POST['no_telp'];
			$fax = $_POST['fax'];
			$email = $_POST['email'];
			$cp = $_POST['cp'];
			$no_hp = $_POST['no_hp'];
			$koders = $_POST['koders'];
			$catatan = $_POST['catatan'];
			$mengetahuidirekturcheck = $_POST['mengetahuidirekturcheck'];
			$catatan_direk = $_POST['catatan_direk'];
			$ttd_mengajukan = $_POST['ttd_mengajukan'];
			$userlog = ($this->session->userdata('nama')
			);
			
			date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("d-m-Y H:i:s");	
			
			$data = array(
			'namadepartemen' =>$namadepartemen,
			'tanggal' =>$tanggal,
			'perihal' =>$perihal,
			'lampiran' =>$lampiran,
			'pembuka' =>$pembuka,
			'isi' =>$isi,
			'penutup' =>$penutup,
			'mengajukan' =>$mengajukan,
			'mengetahui' =>$mengetahui,
			'no_formulir' =>$no_formulir,
			'supplier' =>$supplier,
			'alamat' =>$alamat,
			'no_telp' =>$no_telp,
			'fax' =>$fax,
			'email' =>$email,
			'cp' =>$cp,
			'no_hp' =>$no_hp,
			'koders' =>$koders,
			'catatan' =>$catatan,
			'mengetahuidirekturcheck' =>$mengetahuidirekturcheck,
			'catatan_direk' =>$catatan_direk,
			'createdby' => $userlog ,
			'createddate' => $waktusaatini,
			'ttd_mengajukan' => $ttd_mengajukan,
			'attachment' => $file_lampiran,
			);
					
				$result = $this->perbarangm->Simpan('tbl_formulir', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan Data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'perbarang');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan Data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'perbarang');
		}
	}
	
	function editbarang($kode=0){	
	
	$this->load->model('perbarangm');
	
	$roles = ($this->session->userdata('nama_role'));
	$namaroles = ($this->session->userdata('nama'));
	//$nama_role = ($this->session->userdata('nama_role'));

		$tampung = $this->perbarangm->AmbilDataFormulir("where id_formulir ='$kode'")->result_array();
		
		$role_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$role_post_array[] = $role['namadepartemen'];
		}
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		$for_ttdmenger = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}
		
		$for_menyetujui = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$for_menyetujui[] = $role['ttd_menyetujui'];
		}
		
		
	
	
	$this->load->model('perbarangm');	
		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'fotottd' => $this->session->userdata('fotottd'),
			'id_formulir' => $tampung[0]['id_formulir'],
			'role' => $this->model->GetRole()->result_array(),
			'role_post' => $role_post_array,
			'tanggal' => $tampung[0]['tanggal'],
			'perihal' => $tampung[0]['perihal'],
			'lampiran' => $tampung[0]['lampiran'],
			'pembuka' => $tampung[0]['pembuka'],
			'isi' => $tampung[0]['isi'],
			'penutup' => $tampung[0]['penutup'],
			'mengajukan' => $tampung[0]['mengajukan'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'menyetujui' => $tampung[0]['menyetujui'],
			'no_formulir' => $tampung[0]['no_formulir'],
			'supplier' => $tampung[0]['supplier'],
			'alamat' => $tampung[0]['alamat'],
			'no_telp' => $tampung[0]['no_telp'],
			'fax' => $tampung[0]['fax'],
			'email' => $tampung[0]['email'],
			'cp' => $tampung[0]['cp'],
			'no_hp' => $tampung[0]['no_hp'],
			'namadepartemen' => $tampung[0]['namadepartemen'],
			'koders' => $tampung[0]['koders'],
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
			'idmengetahui' => $this->perbarangm->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmeng' => $for_ttdmenger,
			'idmenyetujui' => $this->perbarangm->AmbilDataTTDMengetahui("where role='$roles' AND nama_user='$namaroles'")->result_array(),
			'for_ttdmenyetujui' => $for_menyetujui,
			'catatan' => $tampung[0]['catatan'],
			'mengetahuidirekturcheck' => $tampung[0]['mengetahuidirekturcheck'],
			'ttd_mengajukan'=> $tampung[0]['ttd_mengajukan'],
			'ttd_mengetahui'=> $tampung[0]['ttd_mengetahui'],
			'ttd_menyetujui'=> $tampung[0]['ttd_menyetujui'],
			'catatan_direk'=> $tampung[0]['catatan_direk'],
			'catatan_menyetujui'=> $tampung[0]['catatan_menyetujui'],
			'attachment'=> $tampung[0]['attachment'],
			);
		$this->template->Display('perbarang/edit_barang',$data);	
		//$this->load->view('perbarang/edit_barang', $data);
	}


	function updatebarang(){
		
	//	if($_FILES['file_uploadttd']['error'] == 0):
	//		$configttd = array(
	//			'upload_path' => './assets/upload',
	//			'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
	//			'max_size' => '2048',
				
	//			);
	//	$this->load->library('upload', $configttd);      
	//	$this->upload->do_upload('file_uploadttd');
	//	$upload_foto = $this->upload->data();
	//	$file_name = $upload_foto['file_name'];
	//	else:
	//		$file_name = $this->input->post('ttd_mengajukan');
	//	endif;
		
		//beda sama yg atas ini khusus lampiran
		
		if($_FILES['file_attachment']['error'] == 0):
			$configttd = array(
				'upload_path' => './assets/upload',
				'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
				'max_size' => '2048',
				
				);
		$this->load->library('upload', $configttd);      
		$this->upload->do_upload('file_attachment');
		$upload_lampiran = $this->upload->data();
		$file_lampiran = $upload_lampiran['file_name'];
		else:
			$file_lampiran = $this->input->post('attachment');
		endif;
		
		$this->load->model('perbarangm');
		$id_formulir = $_POST['id_formulir'];
        $namadepartemen = $_POST['namadepartemen'];
        $tanggal = $_POST['tanggal'];
        $perihal = $_POST['perihal'];
        $lampiran = $_POST['lampiran'];
        $pembuka = $_POST['pembuka'];
        $isi = $_POST['isi'];
        $penutup = $_POST['penutup'];
        $mengajukan = $_POST['mengajukan'];
        $mengetahui = $_POST['mengetahui'];
        $menyetujui = $_POST['menyetujui'];
        $no_formulir = $_POST['no_formulir'];
        $supplier = $_POST['supplier'];
        $alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
		$cp = $_POST['cp'];
		$no_hp = $_POST['no_hp'];
        $koders = $_POST['koders'];
        $catatan = $_POST['catatan'];
        $mengetahuidirekturcheck = $_POST['mengetahuidirekturcheck'];
        $ttd_mengajukan = $_POST['ttd_mengajukan'];
        $ttd_mengetahui = $_POST['ttd_mengetahui'];
        $ttd_menyetujui = $_POST['ttd_menyetujui'];
        $catatan_direk = $_POST['catatan_direk'];
        $catatan_menyetujui = $_POST['catatan_menyetujui'];
		$userlog = ($this->session->userdata('nama'));

			
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");
			
        $data = array(
			'id_formulir' => $this->input->post('id_formulir'),
			'namadepartemen' => $this->input->post('namadepartemen'),
			'tanggal' => $this->input->post('tanggal'),
			'perihal' => $this->input->post('perihal'),
			'lampiran' => $this->input->post('lampiran'),
			'pembuka' => $this->input->post('pembuka'),
			'isi' => $this->input->post('isi'),
			'penutup' => $this->input->post('penutup'),
			'mengajukan' => $this->input->post('mengajukan'),
			'mengetahui' => $this->input->post('mengetahui'),
			'menyetujui' => $this->input->post('menyetujui'),
			'no_formulir' => $this->input->post('no_formulir'),
			'supplier' => $this->input->post('supplier'),
			'alamat' => $this->input->post('alamat'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email'),
			'cp' => $this->input->post('cp'),
			'no_hp' => $this->input->post('no_hp'),
			'koders' => $this->input->post('koders'),
			'catatan' => $this->input->post('catatan'),
			'mengetahuidirekturcheck' => $this->input->post('mengetahuidirekturcheck'),
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'ttd_menyetujui' => $this->input->post('ttd_menyetujui'),
			'updatedby' => $userlog,
			'updateddate' => $waktusaatini,
			//'ttd_mengajukan' => $ttd_mengajukan,
			'ttd_mengajukan' => $this->input->post('ttd_mengajukan'),
			'attachment' => $file_lampiran,
			'catatan_direk' => $this->input->post('catatan_direk'),
			'catatan_menyetujui' => $this->input->post('catatan_menyetujui'),
			);
			
		$where =array( 
			'id_formulir' => $id_formulir,

			);
		
		$res = $this->perbarangm->updatebarang($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update Data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'perbarang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'perbarang');
		}
	}

		function hapusbarang($id_formulir = 1){
		$this->load->model('perbarangm');
		$result = $this->perbarangm->Hapus('tbl_formulir', array('id_formulir' => $id_formulir));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus Data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'perbarang');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus Data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'perbarang');
		}
	}
	
	//status ditolak
	public function ditolak($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where mengetahuidirekturcheck='Not_Approved_mk' OR mengetahuidirekturcheck='Not_Approved_dir'")->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();

		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept' AND mengetahuidirekturcheck='Not_Approved_dir' OR mengetahuidirekturcheck='Not_Approved_mk'")->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang_ditolak',$data);
	}
	
	//status disetujui
	public function disetujui($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where mengetahuidirekturcheck='Approve_dir' OR mengetahuidirekturcheck='Approve_mk'")->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();

		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept' AND mengetahuidirekturcheck='Approve_dir' OR mengetahuidirekturcheck='Approve_mk'")->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang_disetujui',$data);
	}
	
	//status data di surat
	public function statussurat($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where mengetahuidirekturcheck='Approve_dir' OR mengetahuidirekturcheck='Approve_mk'")->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();

		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept' AND mengetahuidirekturcheck='Approve_dir' OR mengetahuidirekturcheck='Approve_mk'")->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang_statussurat',$data);
	}
	
	//status surat REVISI
	public function revisi($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang("where mengetahuidirekturcheck='Revisi_dir' OR mengetahuidirekturcheck='Revisi_mk'")->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();

		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept' AND mengetahuidirekturcheck='Revisi_dir' OR mengetahuidirekturcheck='Revisi_mk'")->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang_revisi',$data);
	}
	
	//ALL status
	public function allstatus($kode=0)
	{	
		
		$this->load->model('perbarangm');	
		
		$koderole=($this->session->userdata('koderole'));
		$dept = ($this->session->userdata('nama_role'));
		
		$namars_post_array = array();
		foreach($this->perbarangm->AmbilDataFormulir("where id_formulir = '$kode'")->result_array() as $role){
			$namars_post_array[] = $role['koders'];
		}
		
		if($koderole=='1' OR $koderole=='5' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29' OR $koderole=='10'){
			
				$data   ['barangnewid'] = $this->perbarangm->GetBarang()->result_array();
				$data   ['nama'] = $this->session->userdata('nama');	
				$data	['cabang'] = $this->session->userdata('cabang');
				$data	['nama_user'] = $this->session->userdata('nama_user');	
				$data	['foto'] = $this->session->userdata('foto');
				$data	['fotottd'] = $this->session->userdata('fotottd');
				$data	['data_barang'] = $this->perbarangm->GetBarang("order by id_departemen")->result_array();
				$data	['data_getbarang'] = $this->perbarangm->GetBarang()->result_array();
				$data	['no_barang'] = $this->perbarangm->GetId()->result_array();
				$data	['mengetahuidirekturcheck'] = $this->perbarangm->AmbilDataFormulir()->result_array();
				$data	['namars'] = $this->model->GetRS()->result_array();
				$data	['namars_post'] = $namars_post_array;
				$data	['namadept'] = $this->perbarangm->GetNamaDept()->result_array();

		}else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	
			'foto' => $this->session->userdata('foto'),
			'fotottd' => $this->session->userdata('fotottd'),
			'data_barang' => $this->perbarangm->GetBarang()->result_array(),
			'data_getbarang' => $this->perbarangm->GetBarang()->result_array(),
			'no_barang' => $this->perbarangm->GetBarang("where namadepartemen ='$dept'")->result_array(),
			'mengetahuidirekturcheck' => $this->perbarangm->AmbilDataFormulir()->result_array(),
			'namars' => $this->model->GetRS()->result_array(),
			'namars_post' => $namars_post_array,
		);
		}
		
		$this->template->Display('perbarang/data_barang_allstatus',$data);
	}

}