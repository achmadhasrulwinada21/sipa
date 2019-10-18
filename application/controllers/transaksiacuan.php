<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksiacuan extends CI_Controller {

	


	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('u_name')){            
			redirect(base_url().'backend');
		}
	}


	public function index($prd=0,$cbgrs=0)
	{ 





		$cbg = ($this->session->userdata('koders'));
		$kodeadmin=($this->session->userdata('koderole'));



		if($kodeadmin=='1'){

			$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	

		   'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),

			
			'data_transaksi' => $this->model->GetTransaksiRsAdministratorAcuan()->result_array(),

           'data_transaksiall' => $this->model->GetTransaksiEksDirAcuanAdministratorDetail("where kodeur='$cbgrs' and periode='$prd'  order by id_tr desc")->result_array()

		       

		);

		

	}else if($kodeadmin=='5'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
		
			'data_transaksi' => $this->model->GetTransaksiRsAdminAcuan("where koders ='$cbg'")->result_array(),
		);

	    }

           else if($kodeadmin=='4'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),

				'data_transaksi' => $this->model->GetTransaksiRsAdministratorAcuan()->result_array(),

           'data_transaksiall' => $this->model->GetTransaksiEksDirAcuanAdministratorDetail("where kodeur='$cbgrs' and periode='$prd'  order by id_tr desc")->result_array()


		);
	}



	    else if($kodeadmin=='18'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
		
			'data_transaksi' => $this->model->GetTransaksiRsAdministratorAcuan()->result_array(),
		);

	    }

	     else if($kodeadmin=='23'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),

			'data_transaksi' => $this->model->GetTransaksiRsAdministratorAcuan()->result_array(),
		);
	}

	      else if($kodeadmin=='10'){

		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	

			 'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
		
			'data_transaksi' => $this->model->GetTransaksiRsAdministratorAcuan()->result_array(),
		);

	    }else{

		$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	

		     'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
            'data_transaksi' => $this->model->GetTransaksiRsAcuan("where kodeur ='$cbg'")->result_array(),



          

		);

		 
	}
   
   
		$this->template->display('transaksiacuan/data_transaksi', $data);
	}

	function addtransaksi()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'optRumahSakit' => $this->model->GetRumahSakit()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
			'optUraian' => $this->model->GetUraian()->result_array(),
			'cabang' => $this->session->userdata('cabang'),	
			'tampilkanmasteruraian'=>$this->model->Getmasteruraianeksdir()->result_array()

		);
		
		$this->template->display('transaksiacuan/add_transaksi', $data);
	}




    function edittransaksiacuan($waktu=0,$cbgrs=0){

 


    $data_transaksi = $this->model->GetTransaksiRsAcuanHasmoro("where  koders= '$cbgrs' and periode='$waktu'")->result_array();
    

    
    $kdrs_post_array = array();

		foreach($this->model->GetTransaksiRsAcuanHasmoro("where koders = '$cbgrs'")->result_array() as $kdrs){
			$kdrs_post_array[] = $kdrs['koders'];
		} 


      foreach($data_transaksi as $k ) {

		$data = array(

            
			'cabang' => $this->session->userdata('cabang'),	
			'nama' => $this->session->userdata('nama'),
	
			'koders' => $this->model->GetRumahSakit("where koders != '$cbgrs' order by koders asc")->result_array(),

	
			'periode' => $k['periode'],

			
			'nilai_uraian1' =>$data_transaksi[0]['nilai_uraian'],
			'nilai_uraian2' =>$data_transaksi[1]['nilai_uraian'],
			'nilai_uraian3' =>$data_transaksi[2]['nilai_uraian'],
			'nilai_uraian4' =>$data_transaksi[3]['nilai_uraian'],


			'nilai_uraian5' =>$data_transaksi[4]['nilai_uraian'],
			'nilai_uraian6' =>$data_transaksi[5]['nilai_uraian'],
			'nilai_uraian7' =>$data_transaksi[6]['nilai_uraian'],
			'nilai_uraian8' =>$data_transaksi[7]['nilai_uraian'],


			'nilai_uraian9' =>$data_transaksi[8]['nilai_uraian'],
			'nilai_uraian10' =>$data_transaksi[9]['nilai_uraian'],
			'nilai_uraian11' =>$data_transaksi[10]['nilai_uraian'],
			'nilai_uraian12' =>$data_transaksi[11]['nilai_uraian'],

			'nilai_uraian13' =>$data_transaksi[12]['nilai_uraian'],
			'nilai_uraian14' =>$data_transaksi[13]['nilai_uraian'],
			'nilai_uraian15' =>$data_transaksi[14]['nilai_uraian'],
			'nilai_uraian16' =>$data_transaksi[15]['nilai_uraian'],



			'nilai_uraian17' =>$data_transaksi[16]['nilai_uraian'],
			'nilai_uraian18' =>$data_transaksi[17]['nilai_uraian'],
			'nilai_uraian19' =>$data_transaksi[18]['nilai_uraian'],
			'nilai_uraian20' =>$data_transaksi[19]['nilai_uraian'],

			'nilai_uraian21' =>$data_transaksi[20]['nilai_uraian'],
			'nilai_uraian22' =>$data_transaksi[21]['nilai_uraian'],
			'nilai_uraian23' =>$data_transaksi[22]['nilai_uraian'],
			'nilai_uraian24' =>$data_transaksi[23]['nilai_uraian'],
			
			'nilai_uraian25' =>$data_transaksi[24]['nilai_uraian'],
			'nilai_uraian26' =>$data_transaksi[25]['nilai_uraian'],

			'nilai_uraian27' =>$data_transaksi[26]['nilai_uraian'],
			'nilai_uraian28' =>$data_transaksi[27]['nilai_uraian'],
			'nilai_uraian29' =>$data_transaksi[28]['nilai_uraian'],
		
			
			'validitasdata' => $k['validitasdata'],
			'kdrs' => $this->model->GetRumahSakit()->result_array(),
			'kdrs_post' => $kdrs_post_array,
			'uraianrs' => $this->model->GetUraian()->result_array(),

			
			);

		

	

	}

	if( $data==''){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Maaf Anda Tidak Dapat Melihat Data,Bisa jadi salah pengisian tanggal dan nama cabang RS!Silakan Isi tanggal Dan Pilih Cabang Rumah Sakit Yang Dituju.Terima Kasih</strong></div>");
			header('location:'.base_url().'transaksiacuan');
	     }else{
	
	$this->template->display('transaksiacuan/edit_transaksi', $data);
              }


      

	}

function updatetransaksieksdiracuan()

{

     $cbg =  $_POST['cabangrs'];
     $pwaktu =  $_POST['periode'];
     $validitasdata=$_POST['VD'];
   
	$this->form_validation->set_rules('TT[]', 'TT', 'required|trim|xss_clean');
   	date_default_timezone_set("Asia/Jakarta");
    $waktu =date("d-m-Y H:i:s");
    $createby=$this->session->userdata('nama'); 

     $updateddate= $waktu;
     $updatedby=$createby;
   

 


    $size = count($_POST['TT']); 

   $i = 0;
   while ($i < $size) {

   $cbg =  $_POST['cabangrs'];

   $scoreaway = $_POST['TT'][$i];

   $kodeur=$_POST['KD'][$i];

   ++$i; 




   
  
  
   
     $query="UPDATE transaksi_acuan_hasmoro set koders='$cbg',periode='$pwaktu',validitasdata='$validitasdata',nilai_uraian='$scoreaway',updateddate='$updateddate',updatedby='$updatedby' where koders='$cbg'  and kd_uraian='$kodeur'";


     // $query="UPDATE tb_dataall set koders='$cbg',periode='$pwaktu',validitasdata='$validitasdata',nilai_uraian='$scoreaway',updateddate='$updateddate',updatedby='$updatedby' where koders=cast($cbg as varchar)  and kd_uraian='$kodeur' and periode='$pwaktu' " ;


	// $test = $this->model->Update('tb_dataall',$hasildata, array('koders' => $cbg,'periode' => $pwaktu,'kd_uraian' => $kodeur));

   
  


          $test=$this->db->query($query);

      

		if($test >=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data telah BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksiacuan');
		}

		else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksiacuan');
		}
   
     
   }            




 

   

  
  }

		
  


	function hapustransaksiacuan($pwaktu=0,$cbgrs=0){

		// $cbgrs = $this->input->post('cabangrs');
		// $pwaktu =  $_POST['periode'];

		
		$result = $this->model->Hapus('transaksi_acuan_hasmoro', array('koders' => $cbgrs,'periode' => $pwaktu));


			if($pwaktu=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Anda harus memasukan input cabang dan periode terlebih dahulu.Terima Kasih.</strong></div>");
			header('location:'.base_url().'transaksiacuan');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksiacuan');
		}


	
	}



	 function insert_keDBacuan() {

   $this->form_validation->set_rules('TT[]', 'TT', 'required|trim|xss_clean');


    $koders = $_POST['koders'];
    $periode = $_POST['periode'];	
    $validitasdata=$_POST['VD'];



    $data_transaksi = $this->model->GetTransaksiJoinEksDirAcuanSatu("where  kdrs='$koders' and periode='$periode'")->result_array();
  
 


   	date_default_timezone_set("Asia/Jakarta");

    $waktu =date("d-m-Y H:i:s");
    $createby=$this->session->userdata('nama');
   
   if ($this->form_validation->run() == FALSE){
    echo validation_errors(); // tampilkan apabila ada error
   }else{
    
    $nm = $this->input->post('TT');
    $nm = $this->input->post('KD');

    $result = array();

   
    foreach($nm AS $key => $val){
     $result[] = array(

     	"koders" =>  $koders,
      	"periode" => $periode ,	
        'validitasdata'=> $validitasdata,
       	'createddate'=>$waktu,
       	'createdby'=>$createby,

        'nilai_uraian'  => $_POST['TT'][$key],
         'kd_uraian'=> $_POST['KD'][$key],

  
     );
     
    }            
    


    }



     $filterwaktudalamtabel=$data_transaksi[0]['periode'];
	  $cabangrsdalamtabel=$data_transaksi[0]['kdrs'];


	  if( $filterwaktudalamtabel==$periode && $cabangrsdalamtabel==$koders){


        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Insert data GAGAL di lakukan.Periode Waktu Dan Cabang RS Tidak Boleh Sama Atau Data Sudah Ada Di Bulan Yang Sama.Terima Kasih</strong></div>");
			header('location:'.base_url().'transaksieksdirdua');

      

        }else{




    $test= $this->db->insert_batch('transaksi_acuan_hasmoro', $result); 

           }
    
 
		if($test == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Insert data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'transaksiacuan');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'transaksiacuan');
		}
   
  }




	public function detailinfoeksdiracuan($prd=0,$cbgrs=0)

	{

	
	$kodeadmin=($this->session->userdata('koderole'));
	// $cbgrs = $this->input->post('namarsh');
    $waktu = $this->input->post('waktu');

  

	$data = array(
			'nama' => $this->session->userdata('nama'),
			'cabang' => $this->session->userdata('cabang'),	

		
		     'data_transaksiall' => $this->model->GetTransaksiEksDirAcuanAdministratorDetail("where kodeur='$cbgrs' and periode='$prd'  order by kodeur desc")->result_array()

		       

		);

	   $this->template->display('transaksiacuan/detail_transaksi', $data);







	}




	
   
}