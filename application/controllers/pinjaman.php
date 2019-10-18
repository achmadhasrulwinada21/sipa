<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
	
	}

	public function index()
	{
		$this->load->model('bungam');
		$this->load->model('menum');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		if($kodeadmin=='Direktur Operasional dan Umum'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
		   'data_bunga' => $this->bungam->GetBunga("where pinjaman !=0 AND pinjaman < 1000000000 AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
		   'bunga' => $this->bungam->GetBunga("order by id_sbunga desc")->result_array(),
			'data_bungas' => $this->bungam->GetBunga("where pinjaman >= 1000000000 AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		}elseif($kodeadmin=='Direktur Medis'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
		   'data_bunga' => $this->bungam->GetBunga("where  pinjaman !=0 AND pinjaman < 1000000000 AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'data_bungas' => $this->bungam->GetBunga("where pinjaman >= 1000000000 AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		}elseif($kodeadmin=='Direktur Keuangan & Pengembangan Strategik'){

			$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
		   'data_bunga' => $this->bungam->GetBunga("where  pinjaman !=0 AND pinjaman < '1000000000'AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'data_bungas' => $this->bungam->GetBunga("where pinjaman >= '1000000000' AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

	    }elseif($kodeadmin=='Kepala Departemen'){
               $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga("where pinjaman !=0 AND mengetahuidirekturcheck ='Draf' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
	    }elseif($kodeadmin=='Direktur Utama'){
               $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga("where pinjaman >= '1000000000' AND mengetahuidirekturcheck ='Approve' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		}else{
               $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Draf' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		}		
		 $this->template->Display('bunga/data_bungas',$data);
		//$this->load->view('bunga/data_bunga', $data);
	}

	function disetujuidirut()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Approve_dirut' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/disetujui', $data);
	}

	function disetujuikadep()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Approve_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/disetujui', $data);
	}

	function disetujui()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Approve' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/disetujui', $data);
	}


function direvisidirut()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Revisi_dirut' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/direvisi', $data);
	}

	function direvisikadep()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Revisi_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/direvisi', $data);
	}

	function direvisi()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Revisi' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/direvisi', $data);
	}

	function ditolakdirut()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Not_Approved_dirut' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/ditolak', $data);
	}

	function ditolakkadep()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Not_Approved_kadep' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/ditolak', $data);
	}

	function ditolak()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' AND mengetahuidirekturcheck ='Not Approved' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

		$this->template->display('bunga/ditolak', $data);
	}

	function cek()
	{
		$this->load->model('bungam');

		$kodeadmin=($this->session->userdata('nama_role'));
		$namars=($this->session->userdata('namars'));
          
          if (isset($_POST["no_surat"])) {
             $no_surat = $_POST["no_surat"];

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where no_surat='$no_surat' AND  pinjaman !=0 AND namars='$namars' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

	}else{
           
           $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			
			'foto' => $this->session->userdata('foto'),
			'data_bunga' => $this->bungam->GetBunga(" where pinjaman !=0 AND namars='$namars' order by id_sbunga desc")->result_array(),
			'no_bunga' => $this->bungam->GetId()->result_array(),
			// 'data_menu' => $this->db->get('tbl_menu')->result(),
			// 'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);

	}
      
		$this->template->display('bunga/cek_pinjam', $data);
	}

function kirim_email($id_sbunga)
    {

         $config = [
             'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://m001.dapurhosting.com',
               'smtp_user' => 'sipa.apps@herminahospitals.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'sipaappshermina',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
	];			
				
        $this->load->library('email', $config);
	   // $cisi = $this->db->get('sukubunga')->result_array();
				// foreach ($cisi as $bu){      
	  $kirim_email = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();             		
		 $this->email->from('sipa.apps@herminahospitals.com','Sistem Informasi Proses Administrasi');
			
        $this->email->to($kirim_email->kontak);   
        // $this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
         $this->email->subject('Surat Permohonan Suku Bunga dan Pinjaman ' .$kirim_email->no_surat);
         $this->email->message('Surat Permohonan anda telah diperiksa oleh ' .$kirim_email->updateby .'  dan statusnya  '.$kirim_email->mengetahuidirekturcheck. '( http://localhost/sipas/bunga )
             <br><br>
             <b>SIPA</b>(<b>SISTEM INFORMASI PROSES ADMINISTRASI HERMINA HOSPITAL GROUP</b>)
         	');

        if ($this->email->send())
        	{
        		 $this->session->set_flashdata("suksess", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'Pinjaman');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    function kirim_emaill($id_sbunga)
    {

         $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://m001.dapurhosting.com',
               'smtp_user' => 'sipa.apps@herminahospitals.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'sipaappshermina',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
	];			
				
        $this->load->library('email', $config);
	   // $cisi = $this->db->get('sukubunga')->result_array();
				// foreach ($cisi as $bu){      
	  $kirim_email = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();             		
		 $this->email->from('sipa.apps@herminahospitals.com','Sistem Informasi Proses Administrasi');
			
        $this->email->to($kirim_email->kontak);   
        // $this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
         $this->email->subject('Surat Permohonan Suku Bunga dan Pinjaman ' .$kirim_email->no_surat);
         $this->email->message('Surat Permohonan anda telah diperiksa oleh ' .$kirim_email->updateby .'  dan statusnya  '.$kirim_email->mengetahuidirekturcheck. '( http://localhost/sipas/bunga )
               <br><br>
             <b>SIPA</b>(<b>SISTEM INFORMASI PROSES ADMINISTRASI HERMINA HOSPITAL GROUP</b>)
         	');

        if ($this->email->send())
        	{
        		 $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'Pinjaman');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

	function addpinjam()
	{	$this->load->model('menum');
	   $this->load->model('Pempinjamm');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
			'status' => $this->model->GetStat()->result_array(),
			'optrole' => $this->model->GetRole()->result_array(),
			'pinjam' => $this->Pempinjamm->GetPinjam()->result_array(),
			'data_bank' => $this->model->GetBank()->result_array(),
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
		);
		$this->template->Display('bunga/add_pinjam',$data);
		
	}

	

	function editpinjam($kode=0){	
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
			$this->load->model('bungam');
			$this->load->model('menum');	
			$this->load->model('Pempinjamm');

		$tampung = $this->bungam->GetBunga("where id_sbunga ='$kode'")->result_array();
		
		$for_ttdmenger = array();
		foreach($this->bungam->GetBunga("where id_sbunga = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_paraf = array();
		foreach($this->bungam->GetBunga("where id_sbunga = '$kode' ")->result_array() as $role){
			$for_paraf[] = $role['paraf'];
		}


		$for_pinjamm = array();
		foreach($this->bungam->GetBunga("where id_sbunga = '$kode' ")->result_array() as $pinjam){
			$for_pinjamm[] = $pinjam['bank'];
		}

		$roles = (
			$this->session->userdata('nama_role')
			
		);

		
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),
			'foto' => $this->session->userdata('foto'),
			'id_sbunga' => $tampung[0]['id_sbunga'],
			'no_surat' => $tampung[0]['no_surat'],
			'namars' => $tampung[0]['namars'],
			'perihal' => $tampung[0]['perihal'],
			'lampiran' => $tampung[0]['lampiran'],
			'foto'=> $tampung[0]['foto'],
			'tanggal' => $tampung[0]['tanggal'],
			'tujuan' => $tampung[0]['tujuan'],
			'kontak' => $tampung[0]['kontak'],
			'bunga' => $tampung[0]['bunga'],
			'role' => $tampung[0]['role'],
			'paraf' => $tampung[0]['paraf'],
			'mengetahui' => $tampung[0]['mengetahui'],
			'bank' => $this->Pempinjamm->GetPinjam()->result_array(),
			'for_pinjamm' => $for_pinjamm,
			'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
			'deskripsi' => $tampung[0]['deskripsi'],
			'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
			'for_ttdmeng' => $for_ttdmenger,
			'idparaf' => $this->model->AmbilDataTTDMengetahui(" where role='$roles'")->result_array(),
			'for_paraf' => $for_paraf,
			'mengetahuidirekturcheck' => $tampung[0]['mengetahuidirekturcheck'],
			'catatan' => $tampung[0]['catatan'],
			'catatan_kadep' => $tampung[0]['catatan_kadep'],
			'catatan_dirut' => $tampung[0]['catatan_dirut'],
			'tembusan1' => $tampung[0]['tembusan1'],
			'tembusan2' => $tampung[0]['tembusan2'],
			'pinjaman' => $tampung[0]['pinjaman'],
			'createby' => $tampung[0]['createby'],
			// 'updateby' => $tampung[0]['updateby'],
			'createdate' => $tampung[0]['createdate'],
			'data_menu' => $this->db->get('tbl_menu')->result(),
			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
			);

			$this->template->Display('bunga/edit_pinjam',$data);
	}

	function savedata(){
		//if($_POST){

		$this->load->library('form_validation');
		   
		  
    $this->form_validation->set_rules('no_surat','no_surat','trim|required|is_unique[sukubunga.no_surat]');
			

	$this->form_validation->set_message('required','%s harus diisi !');
	$this->form_validation->set_message('exist_kode','%s sudah ada di database, pilih kode lain yang unik !');
if($this->form_validation->run() == TRUE)
				{

		    $this->load->model('bungam');
           
           $configttd = array(
            'upload_path' => './assets/upload',
            'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
            'max_size' => '3072',

        );
        $this->load->library('upload', $configttd); 
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();

            $no_surat = $_POST['no_surat'];
            $perihal = $_POST['perihal'];
			$lampiran = $_POST['lampiran'];
			$file_name = $upload_foto['file_name'];
			$tanggal = $_POST['tanggal'];
			$tujuan = $_POST['tujuan'];
			$bank = $_POST['bank'];
			$bunga = $_POST['bunga'];
			$pinjaman = $_POST['pinjaman'];
			$kontak = $_POST['kontak'];
			$catatan = $_POST['catatan'];
			$catatan_kadep = $_POST['catatan_kadep'];
			$catatan_dirut = $_POST['catatan_dirut'];
			$mengetahuidirekturcheck = $_POST['mengetahuidirekturcheck'];
			// $createby = $_POST['createby'];
				date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
			
			$namars = (
			$this->session->userdata('namars') );

			$data = array(
			'no_surat' =>$no_surat,
			'namars' =>$namars,
			'perihal' =>$perihal,
			'lampiran' =>$lampiran,
			'foto' => $file_name,
			'tanggal' =>$tanggal,
			'tujuan' => $tujuan,
			'bank' => $bank,
			'bunga' => $bunga,
			'pinjaman' => $pinjaman,
			'kontak' => $kontak,
			'mengetahuidirekturcheck' =>$mengetahuidirekturcheck,
			'createby' => $this->session->userdata('nama'),
			'createdate' => $waktusaatini,
				);
				$result = $this->bungam->Simpan('sukubunga', $data);
				if($result == 1){
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
					header('location:'.base_url().'Pinjaman');
				}else{
					$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
					header('location:'.base_ul().'Pinjaman');
		}

		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>NO SURAT SUDAH ADA</strong></div>");
			header('location:'.base_url().'Pinjaman');
		}
	}


	function updatepinjam(){

 if($_FILES['file_uploadttd']['error'] == 0):
            $configttd = array(
                'upload_path' => './assets/upload',
                'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
                'max_size' => '3072',
                
                );
        $this->load->library('upload', $configttd);      
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();
        $file_name = $upload_foto['file_name'];
        else:
            $file_name = $this->input->post('foto');
        endif;

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
		$this->load->model('bungam');
		$id_sbunga = $_POST['id_sbunga'];
		$no_surat = $_POST['no_surat'];
		$namars = $_POST['namars'];
		$perihal = $_POST['perihal'];
		$lampiran = $_POST['lampiran'];
		$tanggal = $_POST['tanggal'];
		$tujuan = $_POST['tujuan'];
		$bank = $_POST['bank'];
		$kontak = $_POST['kontak'];
		$paraf = $_POST['paraf'];
		$bunga = $_POST['bunga'];
		$mengetahuidirekturcheck = $_POST['mengetahuidirekturcheck'];
		$catatan = $_POST['catatan'];
		$catatan_kadep = $_POST['catatan_kadep'];
		$catatan_dirut = $_POST['catatan_dirut'];
		$tembusan1 = $_POST['tembusan1'];
		$tembusan2 = $_POST['tembusan2'];
		$role = $_POST['role'];
		$mengetahui = $_POST['mengetahui'];
        $ttd_mengetahui = $_POST['ttd_mengetahui'];
		$createby = $_POST['createby'];
		// $updateby = $_POST['updateby'];
		$createdate = $_POST['createdate'];
		$data = array(
			'id_sbunga' => $this->input->post('id_sbunga'),
			'no_surat' => $this->input->post('no_surat'),
			'namars' => $this->input->post('namars'),
			'perihal' => $this->input->post('perihal'),
			'lampiran' => $this->input->post('lampiran'),
			'foto' => $file_name,
			'tanggal' => $this->input->post('tanggal'),
			'tujuan' => $this->input->post('tujuan'),
			'bank' => $this->input->post('bank'),
			'bunga' => $this->input->post('bunga'),
			'mengetahuidirekturcheck' => $this->input->post('mengetahuidirekturcheck'),
			'role' => $this->input->post('role'),
			'paraf' => $this->input->post('paraf'),
			'kontak' => $this->input->post('kontak'),
			'mengetahui' => $this->input->post('mengetahui'),
			'pinjaman' => $this->input->post('pinjaman'),
			'catatan' => $this->input->post('catatan'),
			'catatan_kadep' => $this->input->post('catatan_kadep'),
			'catatan_dirut' => $this->input->post('catatan_dirut'),
			'tembusan1' => $this->input->post('tembusan1'),
			'tembusan2' => $this->input->post('tembusan2'),
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'createby' => $this->input->post('createby'),
			'updateby' => $this->session->userdata('nama'),
			'createdate' => $this->input->post('createdate'),
			'updatedate' =>date("Y-m-d H:i:s"),

			);
		$where =array( 
			'id_sbunga' => $id_sbunga,
	       );
		
		$res = $this->bungam->UpdateBunga($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Pinjaman/kirim_emaill/'.$id_sbunga.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Pinjaman/kirim_emaill/'.$id_sbunga.'');
		}
}

function updatepinjams(){

 if($_FILES['file_uploadttd']['error'] == 0):
            $configttd = array(
                'upload_path' => './assets/upload',
                'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls',
                'max_size' => '3072',
                
                );
        $this->load->library('upload', $configttd);      
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();
        $file_name = $upload_foto['file_name'];
        else:
            $file_name = $this->input->post('foto');
        endif;

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'nama_user' => $this->session->userdata('nama_user'),	
			'foto' => $this->session->userdata('foto'),
		);
		$this->load->model('bungam');
		$id_sbunga = $_POST['id_sbunga'];
		$no_surat = $_POST['no_surat'];
		$namars = $_POST['namars'];
		$perihal = $_POST['perihal'];
		$lampiran = $_POST['lampiran'];
		$tanggal = $_POST['tanggal'];
		$tujuan = $_POST['tujuan'];
		$bank = $_POST['bank'];
		$kontak = $_POST['kontak'];
		$paraf = $_POST['paraf'];
		$bunga = $_POST['bunga'];
		$mengetahuidirekturcheck = $_POST['mengetahuidirekturcheck'];
		$catatan = $_POST['catatan'];
		$catatan_kadep = $_POST['catatan_kadep'];
		$catatan_dirut = $_POST['catatan_dirut'];
		$tembusan1 = $_POST['tembusan1'];
		$tembusan2 = $_POST['tembusan2'];
		$role = $_POST['role'];
		$mengetahui = $_POST['mengetahui'];
        $ttd_mengetahui = $_POST['ttd_mengetahui'];
		$createby = $_POST['createby'];
		// $updateby = $_POST['updateby'];
		$createdate = $_POST['createdate'];
		$data = array(
			'id_sbunga' => $this->input->post('id_sbunga'),
			'no_surat' => $this->input->post('no_surat'),
			'namars' => $this->input->post('namars'),
			'perihal' => $this->input->post('perihal'),
			'lampiran' => $this->input->post('lampiran'),
			'foto' => $file_name,
			'tanggal' => $this->input->post('tanggal'),
			'tujuan' => $this->input->post('tujuan'),
			'bank' => $this->input->post('bank'),
			'bunga' => $this->input->post('bunga'),
			'mengetahuidirekturcheck' => $this->input->post('mengetahuidirekturcheck'),
			'role' => $this->input->post('role'),
			'paraf' => $this->input->post('paraf'),
			'kontak' => $this->input->post('kontak'),
			'mengetahui' => $this->input->post('mengetahui'),
			'pinjaman' => $this->input->post('pinjaman'),
			'catatan' => $this->input->post('catatan'),
			'catatan_kadep' => $this->input->post('catatan_kadep'),
			'catatan_dirut' => $this->input->post('catatan_dirut'),
			'tembusan1' => $this->input->post('tembusan1'),
			'tembusan2' => $this->input->post('tembusan2'),
			'ttd_mengetahui' => $this->input->post('ttd_mengetahui'),
			'createby' => $this->input->post('createby'),
			'updateby' => $this->session->userdata('nama'),
			'createdate' => $this->input->post('createdate'),
			'updatedate' =>date("Y-m-d H:i:s"),

			);
		$where =array( 
			'id_sbunga' => $id_sbunga,
	       );
		
		$res = $this->bungam->UpdateBunga($data);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'Pinjaman/kirim_email/'.$id_sbunga.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Pinjaman/kirim_email/'.$id_sbunga.'');
		}
}




		function hapuspinjam($id_sbunga = 1){
		$this->load->model('bungam');
		$result = $this->bungam->Hapus('sukubunga', array('id_sbunga' => $id_sbunga));
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Pinjaman');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Pinjaman');
		}
	}
	
			//untuk buat judul 
	
//	function editjd($id_jd){	

//			$this->load->model('detailm');
//			$this->load->model('menum');
//		$tampung = $this->detailm->GetEdit('tbl_jdl_dept',array('id_jd' =>$id_jd));
//		$data = array(
//			'nama_user' => $this->session->userdata('nama_user'),
//			'foto' => $this->session->userdata('foto'),
//			'id_jd' => $tampung[0]['id_jd'],
//			'jdl_detail' => $tampung[0]['jdl_detail'],
//			'data_menu' => $this->db->get('tbl_menu')->result(),
//			'data_menu' => $this->menum->GetMenu("order by id asc")->result_array(),
//			);
//		$this->load->view('detail/edit_jd', $data);
//	}
	
		//untuk buat judul 
//	function updatejd(){
//		$this->load->model('detailm');
//		$id_jd = $_POST['id_jd'];
  //      $jdl_detail = $_POST['jdl_detail'];
  //      $data = array(
//			'id_jd' => $this->input->post('id_jd'),
//			'jdl_detail' => $this->input->post('jdl_detail'),
//			);
//		$where =array( 
//			'id_jd' => $id_jd,
//	       );
		
//		$res = $this->detailm->UpdateJd($data);
//		if($res>=0){
//			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
//			header('location:'.base_url().'detail');
//		}else{
//			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
//			header('location:'.base_url().'detail');
//		}
//	}
	//end
	
}




	
// Developed by Muhammad Ridho
// Email: kenduanything23@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
