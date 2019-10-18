<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class obat_reg extends CI_Controller {
   private $filename = "impor_kode_obat";
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function get_prinsipal()
		
	{
		$this->load->model('obatreg');
		$koper=$this->input->post('koper');
		$data=$this->obatreg->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

	function get_produkobat()
		
	{
		$this->load->model('obatreg');
		$idobat=$this->input->post('idobat');
		$data=$this->obatreg->get_data_farmasi_bykode($idobat);
		echo json_encode($data);
		
	}
	
	
	public function send_mail()
    {

		$idpr2=$this->uri->segment(3);
		//$idpr2=$this->uri->segment(3);
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

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->load->helper('html'); 
	  $this->load->model('obatreg');
	  // $idpr22 = $this->input->post('idpr2');
	
	  $html='
			<h1 align="center">NEED APPROVAL LISTING OBAT REGULER</h1>
					
					<table style="font-size:11px;" border="0.5" cellspacing="0"  cellpadding="2">
					<tr>	

					  <th bgcolor="grey" width="4%" style="vertical-align: middle;text-align: center;">NO</th>
					  <th bgcolor="grey" width="10%" style="vertical-align: middle;text-align: center;">TANGGAL</th>
					  <th bgcolor="grey" width="10%" style="vertical-align: middle;text-align: center;">KODE TRANSAKSI</th>
                      <th bgcolor="grey" width="10%" style="vertical-align: middle;text-align: center;">NAMA PRINSIPAL</th>
                      <th bgcolor="grey" width="10%" style="vertical-align: middle;text-align: center;">NAMA DISTRIBUTOR</th>
                       <th bgcolor="grey" width="10%" style="vertical-align: middle;text-align: center;">JENIS LISTING</th>
					   <th bgcolor="grey" width="25%" style="vertical-align: middle;text-align: center;">STATUS APPROVAL</th>
						
	                </tr>';
					
		
					
							$no=0;
                              $qty=0;
							  $barang_obat=$this->obatreg->GetprodukV_lop_email("where idpr2='$idpr2' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array();
			foreach ($barang_obat as $row) 
			{
				$no++; 
	
						
				$html.='

					<tr>
						<td width="4%" align="center" style="line-height:15px;">'.$no.'</td>
						<td width="10%" align="center">'.$row['tanggal_tr'].'</td>
						<td width="10%" align="center">'.$row['kode_trans'].'</td>
						<td width="10%" align="center;">'.$row['nm_perusahaan'].'</td>
						<td width="10%" align="center">'.$row['nm_distributor'].'</td>	  
						<td width="10%" style="vertical-align: middle;text-align: center;">'.$row['flagobats'].'</td>
						<td width="25%" style="vertical-align: middle;text-align: center;">'.$row['status_approv'].'</td>
						
						
						
					</tr>	';	

		     

			
			

		
			$html.='</table>';	

			$html.='<br><br><br><br><br>
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="200" align="center">Jakarta, '.date('d-m-y').'</td>
					</tr>
					<tr>
					<td width="500"> </td>
					<td width="500" align="center">Need Approval .... '.$row['status_approv'].',</td>
					</tr>';
					
				}

        // Email dan nama pengirim
        //$this->email->from('no-reply@masrud.com', 'MasRud.com | M. Rudianto');
		$this->email->from('sipa.apps@herminahospitals.com','Admin SIPA');
        // Email penerima
        $this->email->to('sipa.apps@gmail.com','baswin.muhajirin@gmail.com'); // Ganti dengan email tujuan kamu
        //'sipa.apps@gmail.com', 
        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('SIPA ADMIN');

        // Isi email
        $this->email->message($html);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
			
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');
			
            
        } else {
			
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');
        }
    }
	
	
	function save_viewdetil_lamafarmasi(){
		

		$this->load->model('obatreg');
	
	    
	
		$iddetailprod2 = $this->input->post('iddetailprod2');
		$kodis = $this->input->post('kodis');
		$koper = $this->input->post('koper');
		$koded_prod = $this->input->post('koded_prod');
		$kode_obat = $this->input->post('kode_obat');
		$harga_lama = $this->input->post('harga_lama');
		$discount_lama = $this->input->post('discount_lama');
		$harga_baru = $this->input->post('harga_baru');
		$discount_baru = $this->input->post('discount_baru');
		$harga_akhir_lama = $this->input->post('harga_akhir_lama');
		$flagobat = $this->input->post('flagobat');
		$note1 = $this->input->post('catatan');
		$note2 = $this->input->post('catatan2');
		$note3 = $this->input->post('catatan3');
		$statusdetil_obat = $this->input->post('statusdetil_obat');
		$harga_akhir_baru = $this->input->post('harga_akhir_baru');
		
		$discontinue = $this->input->post('discontinue');
			if ($discontinue=='1'){
				$discontinue;				
			}else{
			$discontinue='0';	
			}

		$harlama = str_replace(",", "", $harga_lama);
		$harakhir_lama = str_replace(",", "", $harga_akhir_lama);
		$harakhir_baru = str_replace(",", "", $harga_akhir_baru);
		$idpr2 = $this->input->post('idpr21');
		$statusdetil_obats ="draft";
		
		
		//insert history**
		$koded_prod_stori = $this->input->post('koded_prod_stori');
		$kode_obat_stori = $this->input->post('kode_obat_stori');
		$harga_lama_stori = $this->input->post('harga_lama_stori');
		$discount_lama_stori = $this->input->post('discount_lama_stori');
		$harga_akhir_lama_stori = $this->input->post('harga_akhir_lama_stori');
		
		$harlama_stori = str_replace(",", "", $harga_lama_stori);
		$harakhir_lama_stori = str_replace(",", "", $harga_akhir_lama_stori);
		
		
			$data_head_lop2=array(
			
			'idpr2' => $idpr2,
			'status' => $statusdetil_obats,  
			);
			
			$data_detail_histori=array(
			
			'koded_prod' => $koded_prod_stori,
			'kode_obat' => $kode_obat_stori,
			'harga_lama' => $harlama_stori,
			'discount_lama' => $discount_lama_stori,
			'harga_akhir_lama' => $harakhir_lama_stori,
			
			);
	
	
		
		for($x = 0; $x < sizeof($iddetailprod2); $x++){


            $insertArray = array(
                'iddetailprod2' => $iddetailprod2[$x],
                'kodis' => $kodis[$x],
				'koper' => $koper[$x],
                'koded_prod' => $koded_prod[$x],
				'kode_obat' => $kode_obat[$x],
				'harga_lama' => $harlama[$x],
                'discount_lama' => $discount_lama[$x],
                'harga_baru' => $harga_baru[$x],
				'discount_baru' => $discount_baru[$x],
				'harga_akhir_lama' => $harakhir_lama[$x],
				'harga_akhir_baru' => $harakhir_baru[$x],
				'discontinue' =>$discontinue[$x],
				'statusdetil_obat' => $statusdetil_obat[$x],
				'flagobat' => $flagobat[$x],
				'catatan' => $note1[$x],
				'catatan2' => $note2[$x],
				'catatan3' => $note3[$x],
				
                // 'idpr2' => $idpr2,
             
            );
			
			
	
			
/*         $save_detil_obtlama = " INSERT INTO tb_detilfarmasi_lop
		(koded_prod, kodis, koper, kode_obat, 
		
		harga_lama, discount_lama, harga_baru, discount_baru, harga_akhir_lama,  discontinue, flagobat, statusdetil_obat, harga_akhir_baru) 
		
		SELECT '$koded_prod[$x]', '$kodis[$x]', '$koper[$x]', '$kode_obat[$x]', '$harlama[$x]', '$discount_lama[$x]', '$harga_baru[$x]', '$discount_baru[$x]', '$harakhir_lama[$x]', '$harga_akhir_baru[$x]', '$discontinue[$x]', '$statusdetil_obat[$x]', '$flagobat[$x]' WHERE NOT EXISTS (SELECT *
							  FROM tb_detilfarmasi_lop
							  WHERE iddetailprod2 = '$iddetailprod2[$x]'); 
							  
							  UPDATE tb_detilfarmasi_lop set harga_akhir_lama = '$harakhir_lama[$x]', harga_akhir_baru = '$harga_akhir_baru[$x]',  statusdetil_obat ='$statusdetil_obats[$x]' , flagobat ='$flagobat[$x]' , harga_baru = '$harga_baru[$x]' , discount_baru = '$discount_baru[$x]' where iddetailprod2 = '$iddetailprod2[$x]'";
		 */
		$this->db->where('iddetailprod2',$iddetailprod2[$x]);
            $this->db->update('tb_detilfarmasi_lop',$insertArray );
		
		
		
		}	
		
		
		//$result = $this->db->query($save_detil_obtlama);
			
		  
		  
		
		
		$this->load->model('obatreg');	
		$result = $this->obatreg->Updateapp1_lop($data_head_lop2);
		$result = $this->obatreg->Simpandetail('tb_detilfarmasi_lop_histori' , $data_detail_histori);	
		 
		 
		
		
		if($result>=0){
		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
		header('location:'.base_url().'obat_reg/addtrfarmasinew');
	
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
				header('location:'.base_url().'obat_reg/addtrfarmasinew');
			}
		
	}
	

			
	

function addtrfarmasinew()
	{
		$id=$this->uri->segment(3);
		$tgl=$this->uri->segment(4);
		$flag=$this->uri->segment(5);
		//$this->load->model('obatreg');
	
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
		

		
		if($rolesdara=='Direktur Operasional dan Umum'){
				$kode=0;
				$this->load->model('obatreg'); 
				
				
				$tampung = $this->obatreg->Getaprove("where idpr2 ='$kode'")->result_array();

				$for_ttdmenger = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenger[] = $role['ttd_mengetahui'];
					}

					$for_ttdmenge = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenge[] = $role['ttd_menyetujui'];
					}

					$for_ttdsatu = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdsatu[] = $role['ttd_satu'];
					}
				
				$roles = (
						$this->session->userdata('nama_role')
						
					);

				$nama = (
						$this->session->userdata('nama')
						
					);
					
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='2' or statusdetil_obat ='2') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_produko' => $this->obatreg->GetprodukV_lop("where status ='2' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
				'for_ttdmen' => $for_ttdmenge,
				
				
				
				//'data_aprove' => $this->obatreg->Getaprove("where status ='2' and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
		$this->template->display('katobat/data_obatregnew', $data);
			}elseif ($rolesdara=='Kepala Departemen Jangmed'){
				
			   $kode=0;
				$this->load->model('obatreg'); 
				
				
				$tampung = $this->obatreg->Getaprove("where idpr2 ='$kode'")->result_array();

				$for_ttdmenger = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenger[] = $role['ttd_mengetahui'];
					}

					$for_ttdmenge = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenge[] = $role['ttd_menyetujui'];
					}

					$for_ttdsatu = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdsatu[] = $role['ttd_satu'];
					}
				
				$roles = (
						$this->session->userdata('nama_role')
						
					);

				$nama = (
						$this->session->userdata('nama')
						
					);
					
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='1' or statusdetil_obat ='1') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='0' or statusdetil_obat ='0') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_produko' => $this->obatreg->GetprodukV_lop("where status ='1' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
				'for_ttdmeng' => $for_ttdmenger,
				
			
				//'data_aprove' => $this->obatreg->Getaprove("where status ='1' and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where status='01' and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
		$this->template->display('katobat/data_obatregnew', $data);
			}elseif($rolesdara=='Manager Perencanaan Farmasi'){
				
				$kode=0;
				$this->load->model('obatreg'); 
				
				
				$tampung = $this->obatreg->Getaprove("where idpr2 ='$kode'")->result_array();

				$for_ttdmenger = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenger[] = $role['ttd_mengetahui'];
					}

					$for_ttdmenge = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdmenge[] = $role['ttd_menyetujui'];
					}

					$for_ttdsatu = array();
					foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
						$for_ttdsatu[] = $role['ttd_satu'];
					}
				
				$roles = (
						$this->session->userdata('nama_role')
						
					);

				$nama = (
						$this->session->userdata('nama')
						
					);
				
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='0' or statusdetil_obat ='0') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
			    'idpengajuan' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
				'for_ttdsatus' => $for_ttdsatu,
				'data_reject' => $this->obatreg->Get_obat_outs_lop("where statusdetil_obat='ditolak' and  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
		$this->template->display('katobat/data_obatregnew', $data);
			}elseif($rolesdara=='Staff Perencanaan Farmasi'){
					$this->load->model('obatreg'); 
				
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'kodereg' => $this->obatreg->code_otomatis_reg(), 
				'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
				//'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where status='0' or statusdetil_obat ='0'or  status='ditolak' or statusdetil_obat = 'ditolak' or status <> '9' order by kode_trans desc")->result_array(),
			    //'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='0' or status <> '9' or statusdetil_obat ='0') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				'data_produko' => $this->obatreg->GetprodukV_lop("where status <> '9' order by createdate desc")->result_array(),
				//'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where status = null or statusdetil_obat = 'ditolak' or status <> '9' order by kode_trans desc")->result_array(),
				'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
				'obat' => $this->obatreg->Getobatcobauy("order by nama_obat desc")->result_array(),
				'distrib' => $this->obatreg->Getdistri("order by nm_distributor desc")->result_array(),
				'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where (status is null or status='01') and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				'data_reject' => $this->obatreg->Get_obat_outs_lop("where statusdetil_obat='ditolak' and  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
		$this->template->display('katobat/data_obatregnew', $data);
			}elseif($rolesdara=='User Data Master'){
					$this->load->model('obatreg'); 
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='3' or statusdetil_obat ='3') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_produko' => $this->obatreg->GetprodukV_lop("where status ='3' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
				$this->template->display('katobat/data_obatregnew', $data);
			}elseif($rolesdara=='Kadep Strategic Procurement / Pengadaan Strategis'){
			$this->load->model('obatreg');
			$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop_pengajuan("where (status='82' or statusdetil_obat ='82') and statusdetil_obat <> 'ditolak' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_produko' => $this->obatreg->GetprodukV_lop("where status ='82' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where status ='4' and  id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
				$this->template->display('katobat/data_obatregnew', $data);
			}elseif ($rolesdara=='User Jangmed') {
				$this->load->model('obatreg');
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				
				'data_final' => $this->obatreg->Get_obat_outs_lop("where status ='9' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				'kode_pabrik' => $this->obatreg->Get_obat_outs_lop_koper("where status ='9' and id_tipe_produk = 'TP005' order by nm_perusahaan ASC")->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where status ='21' and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where status ='21' and id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
	
			$this->template->display('katobat/view_obat_rs_lop', $data);
					}else {
				$this->load->model('obatreg');
				$data = array(
				'nama'=> $this->session->userdata('nama'),	
				'cabang' => $this->session->userdata('cabang'),
				'data_produko' => $this->obatreg->Get_obat_outs_lop("where status ='9' and id_tipe_produk = 'TP005' order by kode_trans desc")->result_array(),
				//'data_aprove' => $this->obatreg->Getaprove("where status ='21' and id_tipe_produk='TP005' order by createdate desc")->result_array(),
				//'data_reject' => $this->obatreg->Getaproveview("where status ='21' and id_tipe_produk='TP005' order by idpr2 desc")->result_array(),
			);
	
			$this->template->display('katobat/data_obatregnew', $data);
		}
	}



	function publisfarmasi()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		//$this->load->model('produkom'); 
		$data['data_produko'] = $this->obatreg->GetprodukV_lop("where status ='7' and id_tipe_produk='TP005' and idpr2 <> 33 order by createdate desc")->result_array();
	   	$data['data_aproved'] = $this->obatreg->Get_obat_outs_lop("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/p_farmasi_lop', $data);
	}
	
	
	
	function laporan_po_non_rr()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		//$this->load->model('produkom'); 
		$data['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by nopo desc limit 0 ")->result_array();
	   	$data['data_aproved'] = $this->obatreg->Get_obat_outs_lop("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array();
		$data['get_rs'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
		$data['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();
		$data['get_prinsip'] = $this->obatreg->Get_princp_lap_po_non_rr("order by prinsipal desc")->result_array();
		
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/Laporan_po_non_rr', $data);
	}
	
	function laporan_khusus_rko()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		//$this->load->model('produkom'); 
		$data['data_produko'] = $this->obatreg->Get_view_detail_khusus_rko("order by nobuktiterima desc limit 0 ")->result_array();
	   	$data['data_aproved'] = $this->obatreg->Get_obat_outs_lop("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array();
		$data['get_obat'] = $this->obatreg->Get_view_kode_obat("order by obatnama asc")->result_array();
		$data['get_no_bukti'] = $this->obatreg->Get_view_no_bukti("")->result_array();
		$data['get_supp'] = $this->obatreg->Get_supp_lap_khusus_rko("order by s_nama desc")->result_array();
		$data['get_prinsip'] = $this->obatreg->Get_prinsip_lap_khusus_rko("order by pabrikid desc")->result_array();
		
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/Laporan_khusus_rko', $data);
	}
	
	
	function laporan_beli_obat_per_rs()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		//$this->load->model('produkom'); 
		$data['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by nopo desc limit 0 ")->result_array();
	   	$data['data_aproved'] = $this->obatreg->Get_obat_outs_lop("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array();
		$data['get_rs'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
		$data['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();
		$data['get_prinsip'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
		
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/Laporan_pembelian_obat_per_rs', $data);
	}
	
	
	
	function yang_sudah_publish()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		//$this->load->model('produkom'); 
		$data['data_produko'] = $this->obatreg->GetprodukV_lop("where status ='9' and id_tipe_produk='TP005' and idpr2 <> 33 order by createdate desc")->result_array();
	   	$data['data_prods2'] = $this->obatreg->Get_obat_outs_lop("where status ='9'  and (statusdetil_obat <>'ditolak' or statusdetil_obat is null) order by idpr2 desc ")->result_array();
		$data['data_aproved'] = $this->obatreg->Get_obat_outs_lop("where status ='3' and id_tipe_produk='TP005'  order by createdate desc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/yg_sudah_publish_lop', $data);
	}


	function cetakfarmasi()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('obatreg'); 
		$data['data_aprove'] = $this->obatreg->Getaprove("where status ='9' and id_tipe_produk='TP001' and idpr2 <> 33 order by createdate desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katobat/vc_farmasi', $data);
	}

	function lihattrfarmasi($id,$tgl,$flag,$koper)
	{
	$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),  
		'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat <>'ditolak' or statusdetil_obat is null) and koper='$koper'")->result_array(),
		  );
		$this->template->display('katobat/lihat_trfarmasi_lop', $data);
	}


	function lihatpononrr($nopo)
	{
	$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),  
		'data_prods2' => $this->obatreg->Get_view_detail_po_non_rr("where nopo='$nopo'")->result_array(),
		  );
		$this->template->display('katobat/lihat_po_non_rr', $data);
	}
	
	function lihatlap_trfarmasi($id,$tgl)
	{
	$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
        'tr' => $this->db->get_where('tr_farmasi_lop',['idpr2'=>$id])->row(),
        'data_prod' => $this->obatreg->GetprodukV_lop("order by idpr2 asc")->result_array(),
		'data_produko' => $this->obatreg->GetprodukV_lop("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		  );
		$this->template->display('katobat/lihatlap_trfarmasi_lop', $data);
	}

	function rejecttrfarmasi($id,$tgl,$flag,$koper)
	{
		 if($flag=='1'){
		$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat <>'ditolak' or statusdetil_obat is null) and koper='$koper'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasinew', $data);
	}else{
	$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where koper='$koper'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasi2', $data);		
		
	}
	
	}

	function viewtrfarmasi()
	{
		$tgl=$this->uri->segment(3);
		
		$this->load->model('obatreg');
		$data = array(
		'nama' =>$this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
        'tr' => $this->db->get_where('tr_print_compare',['tanggal'=>$tgl])->row(),
        'data_prod' => $this->obatreg->Getprodukm("order by idpr2 asc")->result_array(),
		
		'data_produko' => $this->obatreg->GetprodukV_lop("where tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array(),
        'kode_pabrik' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(),
        'tipe_produk' => $this->obatreg->Gettipe()->result_array(),
		  );
		$this->template->display('katobat/view_trfarmasi_reg', $data);
	}

	function adddetailnew($id,$koper,$flag)
	{
		 if($flag=='1'){
		$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where status <>'9' and(statusdetil_obat <>'ditolak' or outstanding ='outs' ) and koper='$koper'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasinew', $data);
	}else{
	$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->Getobatcobauy_lop("where koper='$koper'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasi2', $data);		
		
	}
	
	}
	
	function detail_outs($id,$koper,$flag)
	{
		
		//elseif($rolesdara=='Staff Perencanaan Farmasi')
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
		
		 if($flag=='1'){
		$this->load->model('obatreg');
		if($rolesdara=='Staff Perencanaan Farmasi'){                          
				$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='ditolak') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
				
		}elseif($rolesdara=='Manager Perencanaan Farmasi'){
				$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='0') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
		
		}elseif($rolesdara=='Kepala Departemen Jangmed'){
				$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='1') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
				
			}elseif($rolesdara=='Kadep Strategic Procurement / Pengadaan Strategis'){
				$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='82') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
				
				
			}elseif($rolesdara=='Direktur Operasional dan Umum'){
				$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='2') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
		
		
		
		
		}else{
			
			
			
			
			$data = array(
					'nama' => $this->session->userdata('nama'),	
					'cabang' => $this->session->userdata('cabang'),	
					'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
					 'data_prods2' => $this->obatreg->GetprodukVdetail_3("where (statusdetil_obat ='5') and koper='$koper'")->result_array(),
					 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
					 'distri' => $this->obatreg->Getobatcobauy_lop("where koper='$koper' order by nm_distributor desc")->result_array(),
					 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
				);
		}	
			
		 
		$this->template->display('katobat/add_detilfarmasinew_outs', $data);
	}else{
	$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head_lop',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->Getobatcobauy_lop("where koper='$koper'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasi2_outs', $data);		
		
	}
	}
	

	function adddetail($id,$koper)
	{
		$this->load->model('obatreg');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_obat_head',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->obatreg->GetprodukVdetail("where koded_prod='$id'")->result_array(),
			 'obat' => $this->obatreg->Getobatcobauy("where koper='$koper' order by nama_obat desc")->result_array(),
             'distri' => $this->obatreg->Getdistri("where koper='$koper' order by nm_distributor desc")->result_array(),
			 'tipe_harga' => $this->obatreg->Gettipeharga("order by idtipeharga asc")->result_array(),
	);
		 
		$this->template->display('katobat/add_detilfarmasi2', $data);
	}

   function savedata_aprovefarmasi(){
		$this->load->model('obatreg');
		$this->load->model('obatreg');
		
		$kode_trans = $_POST['kode_trans'];
		$tanggal = $_POST['tanggal'];
		$id_tipe_produk = $_POST['id_tipe_produk'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->obatreg->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'kode_trans' => $kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $pbid = isset($datatgl[0]['tanggal']);
		 $tp = isset($datatgl[0]['id_tipe_produk']);
		
		if($pbid == $tanggal && $tp == $id_tipe_produk){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'obat_reg');
		}else{
		 
		
		$result = $this->obatreg->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg');
		}
	}

	function updateaprovecek(){
     
     $this->load->model('obatreg');
   
	    $idpr2=$_POST['idpr2'];
	    $tanggal_tr=$_POST['tanggal_tr'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
		//$ttd='0';
	
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'tanggal_tr' =>$this->input->post('tanggal_tr'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);
	
	$data45 = array(
	'statusdetil_obat'=>$status,
	);	

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updatedarak($data);
	
			//$this->db->set('statusdetil_obat','0');
			$this->db->where('koded_prod',$idpr2);
			$this->db->update('tb_detilfarmasi_lop', $data45);
	
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}
	}

function updateaprovecekcui(){
     
     $this->load->model('obatreg');
	 
	 
   
	    $idpr2=$_POST['idpr2'];
		$koper=$_POST['koper'];
		$flag=$_POST['flagobat'];
		$iddetailprod2=$_POST['iddetailprod2'];
	    $tanggal_tr=$_POST['tanggal_tr'];
		//$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $statusdetil_obat=$_POST['statusdetil_obat'];
		$status_revisi='outs';
		
		
		
	$data_reject = $this->obatreg->GetprodukVdetail_3("where koded_prod = '$idpr2' and (statusdetil_obat = 'ditolak') and outstanding = 'outs' ")->result_array();
			
	//$data_reject2 = $this->obatreg->GetprodukVdetail_3("where koded_prod = '$idpr2' and (statusdetil_obat = '$statusdetil_obat') and outstanding = 'outs' ")->result_array();
	
	
	
	
	$data_head_lop3=array(
			
			'idpr2' => $idpr2,
			'outstanding' => $status_revisi,
			'koper' => $koper,
			'flagobat' => $flag,
			//'status' => $statusdetil_obat,
			
			);

			
		$data2 = array(
			'iddetailprod2' =>$this->input->post('iddetailprod2'),
			'tanggal' =>$this->input->post('tanggal_tr'),
			//'iddetailprod2' =>$this->input->post('iddetailprod2'),
			'statusdetil_obat' =>$this->input->post('statusdetil_obat'),
			'updateby' =>  $this->session->userdata('nama'),
			'updatedate' =>$waktusaatini,
			
			);
		
	if(count($data_reject)== 1){

			$this->load->model('obatreg');	
			
			$this->obatreg->Updateapp1_lop($data_head_lop3);
			$this->obatreg->Updatedetail($data2);
  
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Semua Data Diajukan Kembali... !!!</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');		
		
				
        }else{

				$this->obatreg->Updatedetail($data2);
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Per Item Data Diajukan Kembali.Terima Kasih</strong></div>");
				header('location:'.base_url().'obat_reg/detail_outs/'.$idpr2.'/'.$koper.'/'.$flag.'');
			
				}	
		
		
			
	// $data = array(
	// 'idpr2' =>$this->input->post('idpr2'),
	// 'tanggal_tr' =>$this->input->post('tanggal_tr'),
	// 'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	// 'updateby' =>  $this->session->userdata('nama'),
	// 'status' =>$this->input->post('statusdetil_obat'),
	// 'updatedate' =>$waktusaatini,
	// 'outstanding' =>$status_revisi,
	
		// );
		
	// $data2 = array(
	// 'iddetailprod2' =>$this->input->post('idpr2'),
	// 'tanggal' =>$this->input->post('tanggal_tr'),
	// 'iddetailprod2' =>$this->input->post('iddetailprod2'),
	// 'statusdetil_obat' =>$this->input->post('statusdetil_obat'),
	// 'updateby' =>  $this->session->userdata('nama'),
	// 'updatedate' =>$waktusaatini,
	
		// );

		

	// $this->load->model('obatreg');
	// $hasil = $this->obatreg->Updatedara($data);
	// $hasil = $this->obatreg->Updatedetail($data2);

	// if($hasil>=0){
	// $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reset data tanggal : $tanggal BERHASIL di lakukan</strong></div>");
	// header('location:'.base_url().'obat_reg/addtrfarmasinew');
	// }else{
	// $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
	// header('location:'.base_url().'obat_reg/addtrfarmasinew');
	// }
	}
	
	
	function update_transaksi_outstand(){
     
     $this->load->model('obatreg');
   
		  
	    $iddetailprod2=$_POST['iddetailprod2'];
	    $koded_prod=$_POST['koded_prod'];
		$kode_trans=$_POST['kode_trans'];
		
		$koper=$_POST['koper'];
	    $idobat=$_POST['idobat'];
		$kode_obat=$_POST['kode_obat'];
		
		$kodis=$_POST['kodis'];
	    //$golonganid=$_POST['golonganid'];
		//$komposisi=$_POST['komposisi'];
		
		$harga_lama=$_POST['harga'];
	    $discount_lama=$_POST['discount'];
		$catatan=$_POST['catatan'];
		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        //$statusdetil_obat=$_POST['statusdetil_obat'];
	$data2 = array(
	'iddetailprod2' =>$this->input->post('iddetailprod2'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'kode_trans' =>$this->input->post('kode_trans'),
	
	'kodis' =>$this->input->post('kodis'),
	//'golonganid' =>$this->input->post('golonganid'),
	//'komposisi' =>$this->input->post('komposisi'),
	
	'harga_lama' =>$this->input->post('harga'),
	'discount_lama' =>$this->input->post('discount'),
	'catatan' =>$this->input->post('catatan'),
	
	'updateby' =>  $this->session->userdata('nama'),
	//'status' =>$this->input->post('statusdetil_obat'),
	'updatedate' =>$waktusaatini,
	
		);

	$this->load->model('obatreg');
	//$hasil = $this->obatreg->Updatedara($data);
	$hasil = $this->obatreg->Updatedetail($data2);

	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reset data tanggal : $tanggal BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}
	}

	function updateaprovepublis(){
     
     $this->load->model('obatreg');
   
	    $idpr2=$_POST['idpr2'];
	    $tanggal_tr=$_POST['tanggal_tr'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'tanggal_tr' =>$this->input->post('tanggal_tr'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updatedara($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>publish data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/publisfarmasi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>publish data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/publisfarmasi');
	}
	}

	function savedatas(){
		$this->load->model('obatreg');
	
		
		$kode_trans = $_POST['kode_trans'];
		$tanggal = $_POST['tanggal'];
		 $koper = $_POST['koper'];
		 $kodis = $_POST['kodis'];
		 $id_tipe_produk = $_POST['id_tipe_produk2'];
		 //$tanggal = $_POST['tanggal'];
		 date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
		 $kode_trans = $_POST['kode_trans'];
		 $flagobat = $_POST['flagobat'];
		 $status = $_POST['status'];
		 $outstanding = "kosong";
		 
         $data_reguler = $this->obatreg->GetprodukV_lop("where koper = '$koper' and kodis = '$kodis' and status != '9'")->result_array();


			
		$data2 = array(	
		
			'tanggal_tr' => $tanggal,
			'kode_trans' => $kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
		
			'koper' => $koper,
			'kodis' =>$kodis,
			'flagobat' => $flagobat,
			'status' => $status,
			//'outstanding' => $outstanding,
			'createby' =>  $this->session->userdata('nama'),			
			);
	
		$statuss = isset($data_reguler[0]['status']);
		$kopers = isset($data_reguler[0]['koper']);
        $kodiss = isset($data_reguler[0]['kodis']);
		// $tp = isset($datatgl[0]['id_tipe_produk']);
		 if($statuss  &&  $kopers == $koper && $kodiss == $kodis ){
					
			
			
			// $save_head = " INSERT INTO tr_farmasi_lop (tanggal_tr, kode_trans, id_tipe_produk) SELECT '$tanggal','$kode_trans','$id_tipe_produk' WHERE NOT EXISTS (SELECT *
							  // FROM tr_farmasi_lop
							  // WHERE tanggal_tr = '$tanggal'); 
							  
							  // UPDATE tr_farmasi_lop set tanggal_tr='$tanggal', kode_trans='$kode_trans' where tanggal_tr='$tanggal'";
			
			
			// $result = $this->db->query($save_head);			
					
			//if($result > 0){
				
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data Sedang Dalam Proses Pengajuan...!!!</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');	
	
		
		}else{
			$result = $this->obatreg->SaveFarmasi_db_lop($data2);
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');
		
	}

}	

	function savedata(){
		
		$this->load->model('obatreg');
		
		$koded_prod = $_POST['koded_prod'];
		$kode_th = $_POST['kode_trans'];
		$kodis = $_POST['kodis'];
		$kode_obat = $_POST['kode_obat'];
		$koper = $_POST['koper'];
		$tanggal = $_POST['tanggal'];
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		//$harga_akhir_lama= $_POST['harga_akhir_lama'];
		$idobat = $_POST['idobat'];
		$catatan = $_POST['catatan'];
		$flag = $_POST['flagobat'];
		$statusdetil_obat ="draft";			
				
       $datatgl7 = $this->obatreg->Getdetail_lop("where idobat='$idobat'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'kode_trans' => $kode_th,
			'kode_obat' => $kode_obat,
			'koper' => $koper,
			'kodis' => $kodis,
			'harga_baru' => $harga,
			'discount_baru' => $discount,
			//'harga_akhir_baru'=> $harga_akhir_lama,
			'tanggal' => $tanggal, 
			'idobat' => $idobat,
			'catatan' => $catatan,
			'flagobat' => $flag,
			'statusdetil_obat' => $statusdetil_obat,    			
			'createby' =>  $this->session->userdata('nama'),			
			);
			
		$data_head_lop=array(
			
			'idpr2' => $koded_prod,
			'status' => $statusdetil_obat,
		
		
		);	

			
		$this->load->model('obatreg');
		$obid = isset($datatgl7[0]['idobat']);
		// $tgltr = isset($datatgl7[0]['koded_prod']);
		// $tgltr2 = isset($datatgl7[0]['kode_trans']);
        
				//if($obid == $kode_obat){
					
			// $hasil = $this->obatreg->Updateapp1_lop($data_head_lop);
			// $hasil = $this->obatreg->SaveFarmasi_detail_lop($data);
	    
		if($obid == $idobat){
			
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');
			
			
			
		}else
		
		{
			$this->obatreg->Updateapp1_lop($data_head_lop);
			$this->obatreg->SaveFarmasi_detail_lop($data);
			
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');
			
		}
		
	}
	
	function save_ditolak_item(){
		
		$this->load->model('obatreg');
		
		$iddetailprod2 = $_POST['iddetailprod2'];
		$koded_prod = $_POST['koded_prod'];
		$catat3 = $_POST['catatan3'];
		$statusdetil_obat = $_POST['statusdetil_obat'];
		$statusdetil_obat2 = "ditolak";
		$statusdetil_obat3 = "draft";
		$status_outs = "outs";
			if ($status_outs == null){
				$status_outs='bersih';				
			}else{
			$status_outs=$status_outs;	
			}
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
		
		
		
		for($y = 0; $y < count($this->input->post('iddetailprod2')); $y++){
		
		
			
			
			$data= array(	
				'iddetailprod2' => $iddetailprod2[$y],
				'koded_prod' => $koded_prod,
				'catatan3' => $catat3[$y],
				'statusdetil_obat' => $statusdetil_obat,    			
				'updateby' =>  $this->session->userdata('nama'),
				'updatedate' =>  $waktusaatini,			
				);
				
			$data_tolak_all= array(	
				//'iddetailprod2' => $iddetailprod2[$y],
				'koded_prod' => $koded_prod,
				'catatan3' => $catat3[$y],
				'statusdetil_obat' => $statusdetil_obat3,    			
				'updateby' =>  $this->session->userdata('nama'),
				'updatedate' =>  $waktusaatini,			
				);	
		

		
		$data_items = $this->obatreg->GetprodukVdetail_2("where koded_prod = '$koded_prod' and statusdetil_obat = 'draft' ")->result_array();
		
			$data_head_lop3=array(
			
			'idpr2' => $koded_prod,
			//'status' => $statusdetil_obat2,
			'outstanding' => $status_outs,
			//'catatan' => $catatan3,
			
			);
		
		
		
		if(count($data_items) == 1){

			$this->load->model('obatreg');	
			
			$this->obatreg->Updateapp1_lop($data_head_lop3);
			$this->db->set('statusdetil_obat','draft');
			$this->db->where('koded_prod',$koded_prod);
			$this->db->update('tb_detilfarmasi_lop',$data_tolak_all);
  
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Data Ditolak Semua... !!!</strong></div>");
			header('location:'.base_url().'obat_reg/addtrfarmasinew');		
		
				
        }else{

				$this->obatreg->Updateapp1_lop($data_head_lop3);
				//$this->db->where('iddetailprod2',$iddetailprod2[$y]);
				//$this->db->update('tb_detilfarmasi_lop',$data);
				// $this->obatreg->Updateapp1_lop($data_head_lop);
				// $this->obatreg->SaveFarmasi_detail_lop($data);
				$save_detial = " 
							  
							  UPDATE tb_detilfarmasi_lop set statusdetil_obat='$statusdetil_obat', koded_prod='$koded_prod', iddetailprod2='$iddetailprod2[$y]', catatan3='$catat3[$y]' where iddetailprod2='$iddetailprod2[$y]'";
			
			
				$this->db->query($save_detial);			
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Data Ditolak peritem BERHASIL dilakukan.Terima Kasih</strong></div>");
				header('location:'.base_url().'obat_reg/addtrfarmasinew');
			
				}
		}
		
	
	 }


	function editheadfarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukV("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->obatreg->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins){
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
		'prins' => $this->obatreg->GetKodePrinsp("order by nm_perusahaan")->result_array(),
		'for_prins' => $for_prins,
		'kodis'=> $tampung[0]['kodis'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'kode_th' => $tampung[0]['kode_th'],
		'tanggal_tr' => $tampung[0]['tanggal_tr'],	
		'koper' => $tampung[0]['koper'],
		);

	
	$this->template->display('katobat/edit_farmasireg', $data);

	}


	function updatefarmasihead(){
     
     $this->load->model('obatreg');

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

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateheadfarmasi($data);
	if($hasil>=0){
 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal_tr.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal_tr.'');
	}
	}




	function hapusheadfarmasi($kode = 1,$kodetr=0,$tgl=0){
	$this->load->model('obatreg');	
	$kode_th=$kodetr;
    $tanggal=$tgl;
	$result = $this->obatreg->Hapus('tr_farmasi', array('idpr2' => $kode));
    $result = $this->obatreg->Hapus('tb_detilfarmasi', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew/'.$kode_th.'/'.$tanggal.'');
	}
	}
	
	function hapusheadfarmasi_lop($kode = 1,$kodetr=1,$tgl=1){
	$this->load->model('obatreg');	
	$kode__trans=$kodetr;
    $tanggal=$tgl;
	$result = $this->obatreg->Hapus('tr_farmasi_lop', array('idpr2' => $kode ,'kode_trans' => $kodetr , 'tanggal_tr' => $tgl ));
    $result = $this->obatreg->Hapus('tb_detilfarmasi_lop', array('koded_prod'=> $kode ,'kode_trans' => $kodetr , 'tanggal' => $tgl));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}
	}

	function hapustrfarmasi($kode = 1){
	$this->load->model('obatreg');	
	$result = $this->obatreg->Hapus('tr_print_compare', array('tanggal' => $kode));
	$result = $this->obatreg->Hapus('tr_farmasi_lop', array('tanggal_tr' => $kode));
	//$result = $this->obatreg->Hapus('tb_detilfarmasi_lop', array('kode_th' => $kode));
   	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0, $flagobat=0){
		$koded_prod=$kd_pd;
		$koper=$pbkid;
		$flag=$flagobat;
		
	$this->load->model('obatreg');	
	$result = $this->obatreg->Hapus('tb_detilfarmasi_lop', array('iddetailprod2' => $kode,'koded_prod' => $kd_pd,'koper' => $pbkid,'flagobat' => $flag));
	
			if($kd_pd=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');
		}
	
}


function editabks($kode=0,$pabrikid=0,$flaq=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukVdetail_3("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->obatreg->GetprodukVdetail_3("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['idobat'];
		}

 $for_dist = array();
                foreach($this->obatreg->GetprodukVdetail_3("where iddetailprod2 = '$kode' ")->result_array() as $dist){
                        $for_dist[] = $dist['kodis'];
                }


		 // $for_harga = array();
		// foreach($this->obatreg->GetprodukVdetail_3("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			// $for_harga[] = $hargas['harga_lama'];
		// }
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->obatreg->Getobatcobauy("where koper='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
        'dist' => $this->obatreg->Getdistri("where koper='$pabrikid'")->result_array(),
        'for_dists' => $for_dist,
		'hargas' => $this->obatreg->Gettipeharga()->result_array(),
		//'for_harga' => $for_harga,
		'koper' => $tampung[0]['koper'],
		'kode_obat' => $tampung[0]['kode_obat'],
		'harga_baru' => $tampung[0]['harga_baru'],
		'golonganid' => $tampung[0]['golonganid'],
		'komposisi' => $tampung[0]['komposisi'],
		'discount_baru' => $tampung[0]['discount_baru'],
		'kode_trans' => $tampung[0]['kode_trans'],
		'catatan' => $tampung[0]['catatan'],
		'flag' => $tampung[0]['flagobat'],
		);
	
	$this->template->display('katobat/edit_detilfarmasi_lop', $data);	
}

	


	function editks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->GetprodukVdetail("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['idobat'];
		}

 	$for_dist = array();
        foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $dist){
                        $for_dist[] = $dist['kodis'];
                }

	$for_harga = array();
		foreach($this->obatreg->GetprodukVdetail("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->obatreg->Getobatcobauy("where koper='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
        'dist' => $this->obatreg->Getdistri("where koper='$pabrikid'")->result_array(),
        'for_dists' => $for_dist,
		'hargas' => $this->obatreg->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'koper' => $tampung[0]['koper'],
		'kode_obat' => $tampung[0]['kode_obat'],
		'harga' => $tampung[0]['harga'],
		'discount' => $tampung[0]['discount'],
		'kode_th' => $tampung[0]['kode_th'],
		'catatan' => $tampung[0]['catatan'],
		);

	
	$this->template->display('katobat/edit_detilfarmasi_reg', $data);	
}

	function updateabksd(){
     
     $this->load->model('obatreg');

     
	    $iddetailprod2=$_POST['iddetailprod2'];
		$koded_prod = $_POST['koded_prod'];
		$kode_obat = $_POST['kode_obat'];	
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];
		//$tipe_harga = $_POST['tipe_harga'];	
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
		$kode_trans=$_POST['kode_trans'];
		$idobat=$_POST['idobat'];
		$catatan=$_POST['catatan'];
		$flag=$_POST['flagobat'];		

	$data = array(
	'iddetailprod2' =>$this->input->post('iddetailprod2'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'kode_obat' =>$this->input->post('kode_obat'),
	'koper' =>$this->input->post('koper'),
	'kodis' =>$kodis,
	//'tipe_harga' =>$this->input->post('tipe_harga'),
	'harga_baru' =>$this->input->post('harga'),
	'discount_baru' =>$this->input->post('discount'),
	'kode_trans' =>$this->input->post('kode_trans'),
	'idobat' =>$this->input->post('idobat'),
	'catatan' =>$this->input->post('catatan'),
	'flagobat' =>$this->input->post('flagobat'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/adddetailnew/'.$koded_prod.'/'.$koper.'/'.$flag.'');
	}
	}

	 function editaprovefarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->Getaprove("where idpr2 ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->obatreg->Getaprove("where idpr2 = '$kode' ")->result_array() as $role){
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
		'idpr2' => $tampung[0]['idpr2'],	
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		 'for_ttdmeng' => $for_ttdmenger,
		'idpengajuan' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
        'for_ttdsatus' => $for_ttdsatu,
        'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
		'tanggal_tr' => $tampung[0]['tanggal_tr'],
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
		'flagobat' => $tampung[0]['flagobat'],
		
			);

	
	$this->template->display('katobat/editaprovefarmasi_lop', $data);

	}

	function updateaprove(){
     
     $this->load->model('obatreg');
   
	    $idpr2=$_POST['idpr2'];
	    $nama_satu = $_POST['nama_satu'];
		$ttd_satu = $_POST['ttd_satu'];
		$jb_satu = $_POST['jb_satu'];
		$mengetahui = $_POST['mengetahui'];
		$ttd_mengetahui = $_POST['ttd_mengetahui'];
		$jb_mengetahui = $_POST['jb_mengetahui'];
		$menyetujui = $_POST['menyetujui'];
		$ttd_menyetujui = $_POST['ttd_menyetujui'];
		$jb_menyetujui = $_POST['jb_menyetujui'];
		$tanggal_tr=$_POST['tanggal_tr'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];

	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'mengetahui' =>$this->input->post('mengetahui'),
	'tanggal_tr' =>$this->input->post('tanggal_tr'),
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
		
	$data_ttd = array(

	'statusdetil_obat'=>$status,
		);	
		
	

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateapp1_lop($data);
	//update detail
	$this->db->where('koded_prod',$idpr2);
	$this->db->update('tb_detilfarmasi_lop', $data_ttd);	
			
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/send_mail/'.$idpr2.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/send_mail/'.$idpr2.'');
	}
	}

function editrejectfarmasi($kode=0){
	$this->load->model('obatreg');
	
	
	$tampung = $this->obatreg->Getaprove("where idpr2 ='$kode'")->result_array();

	

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
		'idpr2' => $tampung[0]['idpr2'],	
		'tanggal_tr' => $tampung[0]['tanggal_tr'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'status' => $tampung[0]['status'],
		'catatan' => $tampung[0]['catatan'],
		
			);

	
	$this->template->display('katobat/rejectfarmasi_lop', $data);

	}

	function updatereject(){
     
     $this->load->model('obatreg');
   
	    $idpr2=$_POST['idpr2'];
	   	$tanggal=$_POST['tanggal'];
	   	$catatan=$_POST['catatan'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['status'];
		$ttd_212='draft';
		
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'tanggal_tr' =>$this->input->post('tanggal'),
	'catatan' =>$this->input->post('catatan'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);
		
	$data212 = array(

	'statusdetil_obat'=>$ttd_212,
		);	
		

	$this->load->model('obatreg');
	$hasil = $this->obatreg->Updateapp1_lop($data);
	//update detail
	$this->db->where('koded_prod',$idpr2);
	$this->db->update('tb_detilfarmasi_lop',$data212);
	
	
	
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'obat_reg/addtrfarmasinew');
	}
	}

	public function form(){
		$this->load->model('obatreg');
		$data = array(); 
		
		if(isset($_POST['preview'])){ 
			$upload = $this->obatreg->upload_file($this->filename);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		}
		
		$this->template->Display('katobat/importexcel', $data);
	}
	
	public function import(){
		$this->load->model('obatreg');
		
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		
		$data = [];
		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("d-m-Y H:i:s");	
			
		$numrow = 1;
		foreach($sheet as $row){
			
			if($numrow > 1){
				
				array_push($data, [
					
					'iddetailprod2' =>$row['A'],
					'koded_prod' =>$row['B'], 
					'harga' =>$row['C'],
					'discount' =>$row['D'],
					'tipe_harga' =>$row['E'],
					'kodis' =>$row['F'],
					'koper' =>$row['G'],
					'kode_obat' =>$row['I'],
					'kode_th' =>$row['K'],
					'idobat' =>$row['L'],
					'createby' =>  $this->session->userdata('nama'),
					
				]);
			}
		
			$numrow++; 
		}

		
		$this->obatkat->insert_multiple($data);
		
		//redirect("obat_reg");
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'obat_reg');
                 
	}
	
	
	
		function import_detail()
	{
		$this->load->model('obatreg');
		$this->load->library('excel');
		
		$id=$_POST['koded_prod'];
		$kode_trans=$_POST['kode_trans'];
		$kodis=$_POST['kodis'];
		$koper=$_POST['koper'];
		$idobat=$_POST['idobat'];
		$flag=$_POST['flagobat'];
		$tanggal_tr=$_POST['tanggal'];
		$statusdetil_obat='draft';
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");

		if(isset($_FILES["file"]["name"]))
		{
			$data_head_lop3=array(
			
			'idpr2' => $id,
			'status' => $statusdetil_obat,
		
		
		);	
			
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
							$kode_obat_a = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
							$harga_baru_a = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
							$discount_baru_a = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
							
							
							$data[] = array(
							'koded_prod' =>$id,
							'kode_trans' =>$kode_trans,
							'kode_obat' =>$kode_obat_a,					
							'harga_baru' =>$harga_baru_a,
							'discount_baru' =>$discount_baru_a,
							'kodis' =>$kodis,
							'koper' =>$koper,
							'statusdetil_obat' =>$statusdetil_obat,
							'flagobat' =>$flag,
							'tanggal' =>$tanggal_tr,
							'createby' =>  $this->session->userdata('nama'),
								
							);
						}
					}
					$result = $this->db->insert_batch('tb_detilfarmasi_lop', $data);
		
					$this->obatreg->Updateapp1_lop($data_head_lop3);
		
					if($result > 0){
	
					$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
						header('location:'.base_url().'obat_reg/adddetailnew/'.$id.'/'.$koper.'/'.$flag.'');
					}else{
					$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
						header('location:'.base_url().'obat_reg/adddetailnew/'.$id.'/'.$koper.'/'.$flag.'');
					}	   
			}	
	
	}
	
	
	
}

