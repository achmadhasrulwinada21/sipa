    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alkestransaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}
	
	function lihattralkeshistori()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
              
		$this->load->model('alkeskat'); 
		$data['data_alkes_outs'] = $this->alkeskat->Getproduko_alkes_outs("where statusdetil='01' order by idpr2 asc")->result_array();
       	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('katalkes/v_produkalkeshistori', $data);
	}


	function update_viewdetilalkes(){
		

		$this->load->model('produkom2');
	
		$iddetailalkes = $_POST['iddetailalkes'];
		 $kode_alkes = $_POST['kode_alkes'];
		 // $idpr2 = $_POST['idpr2'];
		$cttndetilrevisi = $_POST['cttndetilrevisi'];	
		$statusdetil = $_POST['statusdetil'];	
		
		
		
        for($x = 0; $x < sizeof($iddetailalkes); $x++){


            $updateArray = array(
                'iddetailalkes' => $iddetailalkes[$x],
                'cttndetilrevisi' => $cttndetilrevisi[$x],
                'statusdetil' => $statusdetil[$x],
				'kode_alkes' => $kode_alkes,
                // 'idpr2' => $idpr2,
             
            );
			
			// $datas = array(
			
			// 'idpr2' =>$this->input->post('iddetailalkes'),
			// 'statushead'=>$statusdetil,
			
			// );
            $this->db->where('iddetailalkes',$iddetailalkes[$x]);
            $this->db->update('tb_detail_alkes',$updateArray); //Could not update I don't know why
			//$this->produkom2->Updatedaraanisa($datas);
        
		 
		 
		
		
		if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
	}

	}
	}
	
	
	function update_viewtralkes(){
		

		$idpr2 = $_POST['idpr2'];
		 $tanggal = $_POST['tanggal'];
		 $kode_trans = $_POST['kode_trans'];
		$catatanheadrevisi = $_POST['catatanheadrevisi'];	
		$statushead = $_POST['statushead'];	
		
		
		
        for($x = 0; $x < sizeof($idpr2); $x++){


            $updateArray = array(
                'idpr2' => $idpr2[$x],
                'catatanheadrevisi' => $catatanheadrevisi[$x],
                'statushead' => $statushead[$x],
				'tanggal_tr' => $tanggal,
                'kode_trans' => $kode_trans,
             
            );
            $this->db->where('idpr2',$idpr2[$x]);
            $this->db->update('produko2',$updateArray); //Could not update I don't know why

        
		 
		 
		
		
		if($updateArray>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/viewtralkes/'.$tanggal.'/'.$kode_trans.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/viewtralkes/'.$tanggal.'/'.$kode_trans.'');
	}

	}
	}
	
	
		
	function get_prinsipal()
		
	{
		$this->load->model('alkeskat');
		$koper=$this->input->post('koper');
		$data=$this->alkeskat->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

  function get_alkesdara()

        {
                $this->load->model('alkeskat');
                $kode_produk=$this->input->post('kode_produk');
                $data=$this->alkeskat->get_data_alkess_bykode($kode_produk);
                echo json_encode($data);

        }
		


	function get_obatss()
		
	{
		$this->load->model('alkeskat');
		$obatid=$this->input->post('obatid');
		$data=$this->alkeskat->get_data_obats_bykode($obatid);
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
		$this->load->model('alkeskat');
		$data['data_aprove'] = $this->alkeskat->Getaprove("where status ='1' and id_tipe_produk='TP003' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->alkeskat->Getaproveview("where  id_tipe_produk='TP003' order by idtrcom desc")->result_array();
		 $data['prid'] = $this->alkeskat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/tr_alkes', $data);
	}elseif ($rolesdara=='Kepala Departemen Jangmed'){
         $this->load->model('alkeskat'); 
		$data['data_aprove'] = $this->alkeskat->Getaprove("where status ='0' and id_tipe_produk='TP003' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->alkeskat->Getaproveview("where  id_tipe_produk='TP003' order by idtrcom desc")->result_array();
		  $data['prid'] = $this->alkeskat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/tr_alkes', $data);
	}elseif($rolesdara=='Manager Perencanaan Alat Kesehatan dan KSO'){
		 $this->load->model('alkeskat'); 
		$data['data_aprove'] = $this->alkeskat->Getaprove("where (status is null or status='01') and id_tipe_produk='TP003' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->alkeskat->Getaproveview("where status ='4' and  id_tipe_produk='TP003' order by idtrcom desc")->result_array();
		  $data['prid'] = $this->alkeskat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/tr_alkes', $data);
        }elseif($rolesdara=='Staff Perencanaan Alat Kesehatan' || $rolesdara=='Staff Administrasi' || $rolesdara=='Administrator'){
		 $this->load->model('alkeskat'); 
		$data['data_aprove'] = $this->alkeskat->Getaprove("where (status is null or status='01') and id_tipe_produk='TP003' order by createdate desc")->result_array();
		 $data['data_reject'] = $this->alkeskat->Getaproveview("where status ='4' and  id_tipe_produk='TP003' order by idtrcom desc")->result_array();
		  $data['prid'] = $this->alkeskat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/tr_alkes', $data);
            }elseif($rolesdara=='Kadep Strategic Procurement / Pengadaan Strategis'){
		 $this->load->model('alkeskat'); 
		$data['data_aprove'] = $this->alkeskat->Getaprove("where status ='82' and id_tipe_produk='TP003' order by createdate desc")->result_array();
		$data['data_reject'] = $this->alkeskat->Getaproveview("where status ='4' and id_tipe_produk='TP003' order by tanggal desc")->result_array();
		 $data['prid'] = $this->alkeskat->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/tr_alkes', $data);
	}else{
         $this->load->model('alkeskat');
                $data['data_aprove'] = $this->alkeskat->Getaprove("where status ='21' and id_tipe_produk='TP003' order by createdate desc")->result_array();
                $data['data_reject'] = $this->alkeskat->Getaproveview("where status ='21' and id_tipe_produk='TP003' order by tanggal desc")->result_array();
                 $data['prid'] = $this->alkeskat->code_otomatis();
                $data['nama']=$this->session->userdata('nama');
                $data['cabang'] = $this->session->userdata('cabang');
                $this->template->display('katalkes/tr_alkes', $data);
}
}


function addtralkes()
	{
		$this->load->model('alkeskat');
                $tgl= $this->uri->segment(3);
		$kode_trans= $this->uri->segment(4);
        $data['tr'] = $this->db->get_where('tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->alkeskat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->alkeskat->GetprodukV("where kode_trans='$kode_trans' order by idpr2 asc")->result_array();
		 $data['pridalkes'] = $this->alkeskat->code_otomatiss();
        $data['kode_pabrik']= $this->alkeskat->GetKodePrinsp("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array();
        $data['tipe_produk']= $this->alkeskat->Gettipe()->result_array();
		 
		$this->template->display('katalkes/data_alkes', $data);
	}



	function cetakalkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('alkeskat'); 
		$this->load->model('produkom'); 
		$data['data_aprove'] = $this->alkeskat->Getaprove("where status ='2' and id_tipe_produk='TP003' order by createdate desc")->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('katalkes/v_alkes', $data);
	}

function lihattralkes()
	{
		$this->load->model('alkeskat');
        $this->load->model('produkom'); 
           $tgl= $this->uri->segment(3);
           $kode_trans= $this->uri->segment(4);
        $data['tr'] = $this->db->get_where('tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->alkeskat->Getprodukm("order by idpr2 asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->alkeskat->GetprodukVcount("where tanggal_tr='$tgl' and kode_trans='$kode_trans' order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->alkeskat->GetKodePrinsp("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array();
        $data['tipe_produk']= $this->alkeskat->Gettipe()->result_array();
		 
		$this->template->display('katalkes/lihatlap_alkes', $data);
	}

	function viewtralkes()
	{
		$this->load->model('alkeskat');
        $this->load->model('produkom');
             $tgl= $this->uri->segment(3);
             $kode_trans= $this->uri->segment(4); 
        $data['tr'] = $this->db->get_where('tr_print_compare',['kode_trans'=>$kode_trans])->row();
        $data['data_prod'] = $this->alkeskat->Getprodukm("order by kode_alkes asc")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');                          
		$data['data_produko'] = $this->alkeskat->GetprodukVcount("where tanggal_tr='$tgl' and kode_trans='$kode_trans' and (statushead='0' or statushead is null) order by nm_perusahaan asc")->result_array();
        $data['kode_pabrik']= $this->alkeskat->GetKodePrinsp("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array();
        	 
		$this->template->display('katalkes/view_tralkes2', $data);
	}

	function adddetail()
	{
		$this->load->model('alkeskat');
		 $id= $this->uri->segment(3);
       
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produkos2',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->alkeskat->Getprodukm("where kode_alkes='$id' and (statusdetil='0' or statusdetil is null) order by iddetailalkes asc")->result_array(),
			 'alkes' => $this->alkeskat->Getobatcobauy("where tipe_produk='TP003' order by nama_produk desc")->result_array(),
			 );
		 
		$this->template->display('katalkes/add_detilalkes', $data);
	}

	  function lihattralkes2()
	{
               $id= $this->uri->segment(3);
		$tgl= $this->uri->segment(4);
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom2'); 
		$data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
		$data['data_prod'] = $this->produkom2->Getproduk("order by idpr2 asc")->result_array();
        $data['data_alkes'] = $this->produkom2->Getproduk("where id_tipe_produk='TP003' and kode_th='$id' and tanggal_tr='$tgl'   order by nm_perusahaan asc")->result_array();
        $data['kode_alkes']= $this->produkom2->GetKodePrinsp("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array();
        $data['s_kode']= $this->produkom2->Getskode("order by s_nama ASC")->result_array();
        $data['data_reject'] = $this->produkom2->Getproduk("where id_tipe_produk='TP003' order by nm_perusahaan asc")->result_array();
	    $data['tipe_produk']= $this->produkom2->Gettipe()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('katalkes/v_produkalkes', $data);
	}

	
	
function lihatdetailalkes()
	{
		$this->load->model('alkeskat');
		  $id= $this->uri->segment(3);
                               
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produkos2',['idpr2'=>$id])->row(),
			 'data_prods2' => $this->alkeskat->Getprodukm("where kode_alkes='$id'")->result_array(),
			 'alkes' => $this->alkeskat->Getobatcobauy("where tipe_produk='TP003' order by nama_produk desc")->result_array(),
			 );
		 
		$this->template->display('katalkes/lihatdetailalkes', $data);
	}

   function savedata_aprovealkes(){
		$this->load->model('alkeskat');
		
		$tanggal = $_POST['tanggal'];
		$kode_trans = $_POST['kode_trans'];
		$id_tipe_produk = $_POST['id_tipe_produk'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->alkeskat->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'kode_trans'=>$kode_trans,
			'id_tipe_produk'=>$id_tipe_produk,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $tgl = isset($datatgl[0]['tanggal']);
		 $tp = isset($datatgl[0]['id_tipe_produk']);
		
		if($tgl==$tanggal && $tp==$id_tipe_produk){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Alkestransaksi');
		}else{
		 
		
		$result = $this->alkeskat->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Alkestransaksi');
		}
	}

	function savedatas(){
		$this->load->model('alkeskat');

		 $koper = $_POST['koper'];
		 $kode_trans = $_POST['kode_trans'];
		 $tipe_produk = $_POST['tipe_produk'];
		 $tanggal = $_POST['tanggal_tr'];
		 
          $datatgl = $this->alkeskat->Getproduk("where koper='$koper' and tanggal_tr='$tanggal'")->result_array();

		$data = array(	
			'id_tipe_produk' => $tipe_produk,
			'koper' => $koper,
			'tanggal_tr' => $tanggal,
			'kode_trans' => $kode_trans,
			'createby' =>  $this->session->userdata('nama'),			
			);
		
		$pbid = isset($datatgl[0]['koper']);
        $tgl = isset($datatgl[0]['tanggal_tr']);
				if($pbid == $koper && $tgl == $tanggal ){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal.'/'.$kode_trans.'');
		}else{
			$result = $this->alkeskat->Savealkes_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal.'/'.$kode_trans.'');
		}
		
	}

	

	function savedata(){
		$this->load->model('alkeskat');
		
		 $e_kat = $_POST['e_kat'];
			if ($e_kat==''){
				$e_kat='0';				
			}else{
			$e_kat=$e_kat;	
			}
	    $non_e_kat = $_POST['non_e_kat'];
			if ($non_e_kat==''){
				$non_e_kat='0';				
			}else{
			$non_e_kat=$non_e_kat;	
			}
		$register = $_POST['register'];
			if ($register==''){
				$register='0';				
			}else{
			$register=$register;	
			}
		$non_register = $_POST['non_register'];
			if ($non_register==''){
				$non_register='0';				
			}else{
			$non_register=$non_register;	
			}

                  $biayafree = $_POST['biayafree'];
                        if ($biayafree==''){
                                $biayafree='0';
                        }else{
                        $biayafree=$biayafree;
                        }
                $biayanonfree = $_POST['biayanonfree'];
                        if ($biayanonfree==''){
                                $biayanonfree='0';
                        }else{
                        $biayanonfree=$biayanonfree;
                        }


		$kode_alkes = $_POST['kode_alkes'];
		$kode_trans = $_POST['kode_trans'];
		$koper = $_POST['koper'];
                $ppn = $_POST['ppn'];
		$kode_produk = $_POST['kode_produk'];
		$harga = $_POST['harga'];
		$tahunke1 = $_POST['tahunke1'];
		$tahunke2 = $_POST['tahunke2'];
		$tahunke3 = $_POST['tahunke3'];
		$tahunke4 = $_POST['tahunke4'];
		$tahunke5 = $_POST['tahunke5'];
	    $persentase1 = $_POST['persentase1'];
		$persentase2 = $_POST['persentase2'];
		$persentase3 = $_POST['persentase3'];
		$persentase4 = $_POST['persentase4'];
		$persentase5 = $_POST['persentase5'];
		$cashback = $_POST['cashback'];
		$ket = $_POST['ket'];
                $discount = $_POST['discount'];
		$garansi = $_POST['garansi'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
                $nominalbiaya = $_POST['nominalbiaya'];
				
        $datatgl = $this->alkeskat->Getdetail("where kode_produk='$kode_produk' and kode_alkes='$kode_alkes'")->result_array();
            
		$data= array(	
			'kode_alkes' => $kode_alkes,
			'kode_trans' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
                       'ppn' => $ppn,
			'harga' => $harga,
			'e_kat' => $e_kat,
			'non_e_kat' => $non_e_kat,
			'register' => $register,
			'non_register' => $non_register,
			'tahunke1' => $tahunke1,
			'tahunke2' => $tahunke2,
			'tahunke3' => $tahunke3,
			'tahunke4' => $tahunke4,
			'tahunke5' => $tahunke5,  
			'persentase1' => $persentase1,
			'persentase2' => $persentase2,
			'persentase3' => $persentase3,
			'persentase4' => $persentase4,
			'persentase5' => $persentase5,
			'nominal1' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase1)/100,
			'nominal2' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase2)/100,
			'nominal3' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase3)/100,
			'nominal4' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase4)/100,
			'nominal5' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase5)/100,
			'cashback' => $cashback,
			'ket' => $ket,
			'discount' => $discount,
			'garansi' => $garansi,
			'garansifree' => $garansifree,
			'note' => $note,
                        'biayafree' => $biayafree,
                        'biayanonfree' => $biayanonfree,
                        'nominalbiaya' => $nominalbiaya,
			'nominal_cashback' =>($harga*$cashback)/100,
			'createdby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['kode_produk']);
		$tgltr = isset($datatgl[0]['kode_alkes']);

				if($obid == $kode_produk && $tgltr == $kode_alkes){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
		}else{
			$result = $this->alkeskat->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
		}
		
	}


	function editheadalkes($kode=0){
	$this->load->model('alkeskat');
	
	
	$tampung = $this->alkeskat->GetprodukV("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->alkeskat->GetprodukV("where idpr2 = '$kode' ")->result_array() as $prins){
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
		'prins' => $this->alkeskat->GetKodePrinsp("where id_tipe_produk='TP003'")->result_array(),
		'for_prins' => $for_prins,
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'kode_trans' => $tampung[0]['kode_trans'],
		'tanggal_tr' => $tampung[0]['tanggal_tr'],	
		);

	
	$this->template->display('katalkes/edit_alkes', $data);

	}


	function updatealkeshead(){
     
     $this->load->model('alkeskat');

		$idpr2=$_POST['idpr2'];
		$kode_trans=$_POST['kode_trans'];
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
		$tanggal_tr = $_POST['tanggal_tr'];		
		
				
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'kode_trans' =>$this->input->post('kode_trans'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'koper' => $this->input->post('koper'),
	'tanggal_tr' => $this->input->post('tanggal_tr'),
	'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('alkeskat');
	$hasil = $this->alkeskat->Updateheadalkes($data);
	if($hasil>=0){
 	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal_tr.'/'.$kode_trans.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal_tr.'/'.$kode_trans.'');
	}
	}




	function hapusheadalkes($kode = 1,$kodetr=0,$tgl=0){
	$this->load->model('alkeskat');	
	$kode_trans=$kodetr;
    $tanggal=$tgl;
	$result = $this->alkeskat->Hapus('produko2', array('idpr2' => $kode));
    $result = $this->alkeskat->Hapus('tb_detail_alkes', array('kode_alkes'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal.'/'.$kode_trans.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/addtralkes/'.$tanggal.'/'.$kode_trans.'');
	}
	}

	function hapustralkes($kode_trans = 1){
	$this->load->model('alkeskat');	
	$result = $this->alkeskat->Hapus('tr_print_compare', array('kode_trans' => $kode_trans));
	$result = $this->alkeskat->Hapus('produko2', array('kode_trans' => $kode_trans));
	$result = $this->alkeskat->Hapus('tb_detail_alkes', array('kode_trans' => $kode_trans));
   	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$kode_alkes=$kd_pd;
		$koper=$pbkid;
		
	$this->load->model('alkeskat');	
	$result = $this->alkeskat->Hapus('tb_detail_alkes', array('iddetailalkes' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
		}
	
}


function editabks($kode=0,$pabrikid=0,$tanggal_tr=0){
	$this->load->model('alkeskat');
	
	
	$tampung = $this->alkeskat->Getdetail("where iddetailalkes ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->alkeskat->Getdetail("where iddetailalkes = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailalkes' => $tampung[0]['iddetailalkes'],	
		'kode_alkes' => $tampung[0]['kode_alkes'],		
		'prins' => $this->alkeskat->Getobatcobauy("where tipe_produk='TP003'")->result_array(),
		'for_prins' => $for_prins,
		'koper' => $tampung[0]['koper'],
		'harga' => $tampung[0]['harga'],
                'ppn' => $tampung[0]['ppn'],
		'kode_trans' => $tampung[0]['kode_trans'],
		'e_kat' => $tampung[0]['e_kat'],
		'non_e_kat' => $tampung[0]['non_e_kat'],
		'register' => $tampung[0]['register'],
		'non_register' => $tampung[0]['non_register'],
		'tahunke1' => $tampung[0]['tahunke1'],
		'tahunke2' => $tampung[0]['tahunke2'],
		'tahunke3' => $tampung[0]['tahunke3'],
		'tahunke4' => $tampung[0]['tahunke4'],
		'tahunke5' => $tampung[0]['tahunke5'],
		'persentase1' => $tampung[0]['persentase1'],
		'persentase2' => $tampung[0]['persentase2'],
		'persentase3' => $tampung[0]['persentase3'],
		'persentase4' => $tampung[0]['persentase4'],
		'persentase5' => $tampung[0]['persentase5'],
		'cashback' => $tampung[0]['cashback'],
		'ket' => $tampung[0]['ket'],
                'note' => $tampung[0]['note'],
		'discount' => $tampung[0]['discount'],
		'garansi' => $tampung[0]['garansi'],
		'garansifree' => $tampung[0]['garansifree'],
                 'biayafree' => $tampung[0]['biayafree'],
                'biayanonfree' => $tampung[0]['biayanonfree'],
                'nominalbiaya' => $tampung[0]['nominalbiaya'],
		);
	
	$this->template->display('katalkes/edit_detilalkes', $data);	
}
	function updateabksd(){
     
     $this->load->model('alkeskat');

     
	    $iddetailalkes=$_POST['iddetailalkes'];
		$kode_alkes = $_POST['kode_alkes'];
		$kode_produk = $_POST['kode_produk'];	
		$koper = $_POST['koper'];
		$kode_trans = $_POST['kode_trans'];
		$harga = $_POST['harga'];
                $ppn = $_POST['ppn'];
		 $e_kat = $_POST['e_kat'];
			if ($e_kat==''){
				$e_kat='0';				
			}else{
			$e_kat=$e_kat;	
			}
	    $non_e_kat = $_POST['non_e_kat'];
			if ($non_e_kat==''){
				$non_e_kat='0';				
			}else{
			$non_e_kat=$non_e_kat;	
			}
		$register = $_POST['register'];
			if ($register==''){
				$register='0';				
			}else{
			$register=$register;	
			}
		$non_register = $_POST['non_register'];
			if ($non_register==''){
				$non_register='0';				
			}else{
			$non_register=$non_register;	
			}
                    $biayafree = $_POST['biayafree'];
                        if ($biayafree==''){
                                $biayafree='0';
                        }else{
                        $biayafree=$biayafree;
                        }
                $biayanonfree = $_POST['biayanonfree'];
                        if ($biayanonfree==''){
                                $biayanonfree='0';
                        }else{
                        $biayanonfree=$biayanonfree;
                        }

		$tahunke1 = $_POST['tahunke1'];
		$tahunke2=$_POST['tahunke2'];
		$tahunke3 = $_POST['tahunke3'];
		$tahunke4 = $_POST['tahunke4'];
		$tahunke5=$_POST['tahunke5'];
		$persentase1 = $_POST['persentase1'];
		$persentase2=$_POST['persentase2'];
		$persentase3 = $_POST['persentase3'];
		$persentase4 = $_POST['persentase4'];
		$persentase5=$_POST['persentase5'];	
		$cashback = $_POST['cashback'];
		$ket=$_POST['ket'];	
               $discount = $_POST['discount'];
		$garansi=$_POST['garansi'];	
		$garansifree = $_POST['garansifree'];
		$note=$_POST['note'];
                $nominalbiaya=$_POST['nominalbiaya'];

	$data = array(
	'iddetailalkes' =>$this->input->post('iddetailalkes'),
	'kode_alkes' => $kode_alkes,
			'kode_trans' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'harga' => $harga,
                         'ppn' => $ppn,
			'e_kat' => $e_kat,
			'non_e_kat' => $non_e_kat,
			'register' => $register,
			'non_register' => $non_register,
			'tahunke1' => $tahunke1,
			'tahunke2' => $tahunke2,
			'tahunke3' => $tahunke3,
			'tahunke4' => $tahunke4,
			'tahunke5' => $tahunke5,  
			'persentase1' => $persentase1,
			'persentase2' => $persentase2,
			'persentase3' => $persentase3,
			'persentase4' => $persentase4,
			'persentase5' => $persentase5,
			'nominal1' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase1)/100,
			'nominal2' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase2)/100,
			'nominal3' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase3)/100,
			'nominal4' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase4)/100,
			'nominal5' =>((($harga-($harga*$discount)/100)+(($harga-($harga*$discount)/100)*$ppn/100))* $persentase5)/100,
			'cashback' => $cashback,
			'ket' => $ket,
			'garansi' => $garansi,
			'garansifree' => $garansifree,
			'note' => $note,
                        'biayafree' => $biayafree,
                        'biayanonfree' => $biayanonfree,
                        'nominalbiaya' => $nominalbiaya,
			'discount' => $discount,
			'nominal_cashback' =>($harga*$cashback)/100,
	'updatedby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('alkeskat');
	$hasil = $this->alkeskat->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi/adddetail/'.$kode_alkes.'');
	}
	}

	 function editaprovealkes($kode=0){
	$this->load->model('alkeskat');
	
	
	$tampung = $this->alkeskat->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->alkeskat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->alkeskat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->alkeskat->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
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

	
	$this->template->display('katalkes/editaprovealkes', $data);

	}

	function updateaprove(){
     
     $this->load->model('alkeskat');
   
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

	$this->load->model('alkeskat');
	$hasil = $this->alkeskat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}
	}

function updateaprovecekcui(){

     $this->load->model('alkeskat');

            $idtrcom=$_POST['idtrcom'];
            $tanggal=$_POST['tanggal'];
                $id_tipe_produk=$_POST['id_tipe_produk'];
                date_default_timezone_set("Asia/Jakarta");
                $waktusaatini =date("Y-m-d H:i:s");
        $status=$_POST['status'];
        $data = array(
        'idtrcom' =>$this->input->post('idtrcom'),
        'tanggal' =>$this->input->post('tanggal'),
        'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
        'updateby' =>  $this->session->userdata('nama'),
        'updatedate' =>$waktusaatini,
        'status'=>$status,
                );

        $this->load->model('alkeskat');
        $hasil = $this->alkeskat->Updatedara($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reset data tanggal : $tanggal BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'Alkestransaksi');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'Alkestransaksi');
        }
        }


function editrejectalkes($kode=0){
	$this->load->model('alkeskat');
	
	
	$tampung = $this->alkeskat->Getaprove("where idtrcom ='$kode'")->result_array();

	

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
		'kode_trans' => $tampung[0]['kode_trans'],	
		'tanggal' => $tampung[0]['tanggal'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'status' => $tampung[0]['status'],
		'catatan' => $tampung[0]['catatan'],
		
			);

	
	$this->template->display('katalkes/edit_rejectalkes', $data);

	}

	function updatereject(){
     
     $this->load->model('alkeskat');
   
	    $idtrcom=$_POST['idtrcom'];
	    $kode_trans=$_POST['kode_trans'];
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

	$this->load->model('alkeskat');
	$hasil = $this->alkeskat->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkestransaksi');
	}
	}

	
}

