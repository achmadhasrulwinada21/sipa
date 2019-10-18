<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alkesrr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

 function get_alkesdara()

        {
                $this->load->model('alkeskat');
                $kode_produk=$this->input->post('kode_produk');
                $data=$this->alkeskat->get_data_alkess_bykode($kode_produk);
                echo json_encode($data);

        }
		
			
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('koderole'));
		 $namarole=($this->session->userdata('nama_role'));
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
      if($rolesdara=='10'){
		$this->load->model('malkesrr');
		$data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_alkesrr'] = $this->malkesrr->Getalkesheadview("where id_tipe_produk='TP003' order by kode_transaksi desc limit 1000")->result_array();
		$data['ttdrs'] = $this->malkesrr->masterttd("where role='$namarole'")->result_array();
		$this->template->display('alkesrr/data_alkesrr', $data);
	}elseif ($rolesdara=='82'){
         $this->load->model('malkesrr'); 
		$data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_alkesrr'] = $this->malkesrr->Getalkesheadview("where id_tipe_produk='TP003' order by kode_transaksi desc limit 1000")->result_array();
		$this->template->display('alkesrr/data_alkesrr', $data);
	}elseif ($rolesdara=='57'){
         $this->load->model('malkesrr'); 
		$data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_alkesrr'] = $this->malkesrr->Getalkesheadview("where id_tipe_produk='TP003' order by kode_transaksi desc limit 1000")->result_array();
		$data['ttdrs'] = $this->malkesrr->masterttd("where role='$namarole'")->result_array();
		$this->template->display('alkesrr/data_alkesrr', $data);
	}elseif($rolesdara=='69'){
		 $this->load->model('malkesrr'); 
		$data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_alkesrr'] = $this->malkesrr->Getalkesheadview("where id_tipe_produk='TP003' order by kode_transaksi desc limit 1000")->result_array();
		$data['ttdrs'] = $this->malkesrr->masterttd("where role='$namarole'")->result_array();
		$this->template->display('alkesrr/data_alkesrr', $data);
	}elseif($rolesdara=='75' || $rolesdara=='76' || $rolesdara=='1'){
		 $this->load->model('malkesrr'); 
		$data['kode_pabrik']= $this->malkesrr->GetKodePrinsp("where id_tipe_produk='TP003' and status_per='aktif' order by nm_perusahaan ASC")->result_array();
		$data['data_alkesrr'] = $this->malkesrr->Getalkesheadview("where id_tipe_produk='TP003' order by kode_transaksi desc limit 1000")->result_array();
		$data['tipe_produk']= $this->malkesrr->Gettipe()->result_array();
		 $data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('alkesrr/data_alkesrr', $data);
	}else{
		 $this->load->model('malkesrr'); 
		$data['prid'] = $this->malkesrr->code_otomatis();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('alkesrr/data_alkesrr', $data);
	}
}

public function cetakalkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('koderole'));
		 $namarole=($this->session->userdata('nama_role'));
         if(isset($_POST["koper"])) {
           $this->load->model('malkesrr');  
        $koper = $_POST["koper"];                   
         $data['nama']=$this->session->userdata('nama');    
        $data['cabang'] = $this->session->userdata('cabang');
        $data['kpr']= $this->malkesrr->getper("where id_tipe_produk='TP003' order by nm_perusahaan")->result_array();
       $data['data_alkes']=$this->malkesrr->Getalkesheadview("where statuslist_head='live' and koper='$koper'")->result_array();
       $this->template->display('alkesrr/v_lapalkesrr', $data);
            }else{
          $this->load->model('malkesrr'); 
         $data['data_alkes']=$this->malkesrr->Getalkesheadview("where statuslist_head='live'  order by kode_transaksi desc limit 100")->result_array();
          $data['kpr']= $this->malkesrr->getper("where id_tipe_produk='TP003' order by nm_perusahaan")->result_array();
         $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');

	$this->template->display('alkesrr/v_lapalkesrr', $data);
}	
}

function principalexcel(){
               $this->load->model('malkesrr'); 
              $status_prinsipal= $_POST["status_prinsipal"];
              $stsproduk_detil = $_POST["stsproduk_detil"];   
              $perusahaan = $_POST["koper"];

          $query['expor_detilalkes'] = $this->malkesrr->Getalkesheadview("where koper='$perusahaan' and status_prinsipal='$status_prinsipal' order by tgl_tr asc")->result_array(); 
           $query['stsproduk_detil'] = $_POST["stsproduk_detil"];        
                    
       $this->load->view('alkesrr/aktifexcelalkesrr', $query);
 
      }  



public function historialkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('koderole'));
		 $namarole=($this->session->userdata('nama_role'));   
 		 $this->load->model('malkesrr'); 
         $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
         $data['kpr']= $this->malkesrr->getper("where id_tipe_produk='TP003' and status_per='aktif' order by nm_perusahaan")->result_array();
          $data['data_alkes'] = $this->malkesrr->Getalkesdetilview()->result_array();
		$this->template->display('alkesrr/v_historialkesrr', $data);
	
}

function historiexcelalkesrr(){
               $this->load->model('malkesrr'); 
                  $perusahaan = $_POST["koper"];

if (isset($perusahaan)):
          $query['expor_detilalkes'] = $this->malkesrr->Getalkesheadview("where koper='$perusahaan' and statuslist_head='histori' order by tgl_tr asc")->result_array();           
       endif;      
      
    
         if(empty($perusahaan)):
          $query['expor_detilalkes'] = $this->malkesrr->Getalkesheadview("where statuslist_head='histori' order by tgl_tr asc")->result_array();                         
       endif;
       $this->load->view('alkesrr/historiexcelalkesrr', $query);
 
      }  

public function listingrrhistori()
    {
    	$this->load->model('mhistorialkesrr');
        $list = $this->mhistorialkesrr->get_datatablesalkeshistori();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $histori) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] =  '<center>'.$histori->nm_perusahaan.'<center>';
            if($histori->jenis_pembayaran == "1") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">CASH</p></center>';
               }else{
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">SPONSORSHIP</p></center>';
                 }
              $row[] =  '<center>'.$histori->kode_produk.'<center>';
             $row[] =  '<center>'.$histori->nama_produk.'<center>';
             $row[] =  '<center>'.$histori->type.'<center>';
             $row[] =  '<center>'.$histori->merk.'<center>';
             $row[] =  '<center>'.$histori->jns_barang.'<center>';
              $row[] =  '<center>Rp. '.number_format($histori->harga_akhir_baru_var).'<center>';
              $ppn='x';
              if($histori->ppn_baru=='10'){
                $ppn='v';
              }else{
                $ppn='x';
              }
               $row[] = '<center>'.$ppn.'<center>';
                $ongkir='x';
              if($histori->includeongkir=='1'){
                $ongkir='v';
              }else{
                $ongkir='x';
              }
                $row[] = '<center>'.$ongkir.'<center>';
                 $row[] = '<center>'.$histori->garansifree.' tahun<center>';
           
             
            $row[] = '<center><a title="Lihat Ongkir" style="margin-bottom:3px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit'.$histori->iddetilalkesrr.'"><i class="fa fa-eye"></i></a></center>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mhistorialkesrr->count_allhistori(),
                        "recordsFiltered" => $this->mhistorialkesrr->count_filteredalkeshistori(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function livealkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('koderole'));
		 $namarole=($this->session->userdata('nama_role'));   
 		 $this->load->model('malkesrr'); 
         $data['nama']=$this->session->userdata('nama');
         $data['kpr']= $this->malkesrr->getper("where id_tipe_produk='TP003' and status_per='aktif' order by nm_perusahaan")->result_array();	
         $data['data_alkes'] = $this->malkesrr->Getalkesdetilview()->result_array();
		$data['cabang'] = $this->session->userdata('cabang');

		$this->template->display('alkesrr/v_livealkesrr', $data);
	
}

function excelalkesrr(){
               $this->load->model('malkesrr'); 
               $perusahaan = $_POST["koper"];

if (isset($perusahaan)):
          $query['expor_detilalkes'] = $this->malkesrr->Getalkesheadview("where koper='$perusahaan' and statuslist_head='live' order by tgl_tr asc")->result_array();           
       endif;      
       
         if(empty($perusahaan)):
          $query['expor_detilalkes'] = $this->malkesrr->Getalkesheadview("where statuslist_head='live' order by tgl_tr asc")->result_array();                         
       endif;
       $this->load->view('alkesrr/excelalkesrr', $query);
 
      }  


    public function listingrrlive()
    {
    	$this->load->model('mhistorialkesrr');
        $list = $this->mhistorialkesrr->get_datatablesalkeslive();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $histori) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] =  '<center>'.$histori->nm_perusahaan.'<center>';
            $row[] = '<center>'.$histori->kode_produk.'<center>';
             $row[] =  '<center>'.$histori->nama_produk.'<center>';
             $row[] =  '<center>'.$histori->type.'<center>';
             $row[] =  '<center>'.$histori->merk.'<center>';
             $row[] =  '<center>'.$histori->jns_barang.'<center>';
              $row[] =  '<center>Rp. '.number_format($histori->harga_akhir_baru_var).'<center>';
               $ppn='x';
              if($histori->ppn_baru=='10'){
                  $ppn='v';
              }else{
                  $ppn='x';
              }
               $row[] = '<center>'.$ppn.'<center>';
                 $ongkir='x';
              if($histori->includeongkir=='1'){
                  $ongkir='v';
              }else{
                  $ongkir='x';
              }
                $row[] = '<center>'.$ongkir.'<center>';
                $row[] = '<center>'.$histori->garansifree. '  tahun<center>';

               $row[] = ' <center> <a title="Lihat Ongkir" style="margin-bottom:3px;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit'.$histori->iddetilalkesrr.'"><i class="fa fa-eye"></i></a></center>';
                        
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mhistorialkesrr->count_alllive(),
                        "recordsFiltered" => $this->mhistorialkesrr->count_filteredalkeslive(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


public function publishalkesrr()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('koderole'));
		 $namarole=($this->session->userdata('nama_role'));   
 		 $this->load->model('malkesrr'); 
 		 $data['data_alkes'] = $this->malkesrr->Getalkesdetilview("where stsapp_detil ='Disetujui Direktur Ops & Umum' and statuslist_detil='diajukan' order by kode_transaksi desc limit 1000")->result_array();
         $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('alkesrr/publishalkesrr', $data);
	
}



 public function alkeslistingrrview()
    {
    	$this->load->model('malkesrr');
        $list = $this->malkesrr->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalkes) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<center>'.$produkalkes->kode_transaksi.'<center>';
            $row[] =  '<center>'.date('Y-m-d',strtotime($produkalkes->tgl_tr)).'<center>';
            $row[] =  '<center>'.$produkalkes->nm_perusahaan.'<center>';
            if($produkalkes->jenis_pembayaran == "1") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">CASH</p></center>';
               }else{
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">SPONSORSHIP</p></center>';
                 }
            if($produkalkes->jenis_listing == "1") {              
            $row[] =  '<center><p style="background-color:blue;color:white;text-align:center;font-weight:bold;">Baru</p></center>';
               }else{
            $row[] =  '<center><p style="background-color:skyblue;color:black;text-align:center;font-weight:bold;">Lama</p></center>';
                 }
             if($produkalkes->status_app == "menunggu approve") {              
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">menunggu approve</p></center>';
             }elseif($produkalkes->status_app == "Disetujui Manager Jangmed KSO") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;font-weight:bold;">Disetujui Manager Jangmed KSO</p></center>';
             }elseif($produkalkes->status_app == "Disetujui Kadep Jangmed") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;font-weight:bold;">Disetujui Kadep Jangmed</p></center>';
             }elseif($produkalkes->status_app == "Disetujui Kadep Pengadaan") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;font-weight:bold;">Disetujui Kadep Pengadaan</p></center>';
             }elseif($produkalkes->status_app == "Disetujui Direktur Ops & Umum") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;font-weight:bold;">Disetujui Direktur Ops & Umum</p></center>';
             }elseif($produkalkes->status_app == "ditolak") {              
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;font-weight:bold;">ditolak</p></center>';
        }elseif($produkalkes->status_app == "outstanding") {              
            $row[] =  '<center><p style="background-color:skyblue;color:black;text-align:center;font-weight:bold;">outstanding</p></center>';
               }else{
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">draff</p></center>';
                 } 

             $row[] = '<center><a href="Alkesrr/viewdetailrr/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'" class="edit_record btn btn-xs btn btn-warning" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a></center>';
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76'):  
               if($produkalkes->jenis_listing==1 and $produkalkes->status_app == 'draff'){
               $row[] = '<center><a  href="Alkesrr/adddetail/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'/'.$produkalkes->koper.'" class="edit_record btn btn-xs btn btn-primary" title="Tambah detail" onclick=""><i class="glyphicon glyphicon-plus"></i></a></center>';
                }elseif($produkalkes->status_app <> 'draff'){
                 $row[] = '<center><span class="edit_record btn btn-xs" title="Tambah disabled" onclick=""><i class="glyphicon glyphicon-plus"></i></a></center>'; 
               }elseif($produkalkes->jenis_listing==0 and $produkalkes->isi!='1'){
               $row[] = '<center><a  href="Alkesrr/simpan_hargalama/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'/'.$produkalkes->koper.'" class="edit_record btn btn-xs btn btn-primary" title="Tambah detail" onclick=""><i class="glyphicon glyphicon-plus"></i></a></center>';
              }else{
              	 $row[] = '<center><a  href="Alkesrr/adddetail/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'/'.$produkalkes->koper.'" class="edit_record btn btn-xs btn btn-primary" title="Tambah detail" onclick=""><i class="glyphicon glyphicon-plus"></i></a></center>'; 
              }
          endif;
            $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10' || $ynwa=='82'): 
          $row[] = '<center><a href="Alkesrr/updateappdetilrr/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'" class="edit_record btn btn-xs btn btn-info" title="Detail" onclick=""><i class="glyphicon glyphicon-ok"></i></a></center>';
           endif;
            $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76'):  
                   if($produkalkes->isi==1 && ($produkalkes->status_app=='draff' || $produkalkes->status_app=='ditolak')){
               $row[] = '<center><a title="approve" style="margin-bottom:3px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_edit'.$produkalkes->kode_transaksi.'"><i class="glyphicon glyphicon-ok"></i></a></center>';
           }else{
                $row[] = '<center><span class="edit_record btn btn-xs" title="approve disabled" onclick=""><i class="glyphicon glyphicon-ok"></i></a></center>';
           }
           endif;
            $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='75' && $ynwa!='76'):  
            $row[] = '<center><a title="approve" style="margin-bottom:3px;" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_edit'.$produkalkes->kode_transaksi.'"><i class="glyphicon glyphicon-ok"></i></a></center>';
             endif;
                // $row[] = '<center><a  href="Alkesrr/editdetailrr/'.$produkalkes->kode_transaksi.'" class="edit_record btn btn-xs btn btn-info" title="Update" onclick=""><i class="glyphicon glyphicon-edit"></i></a></center>';
            $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76' || $ynwa=='69' || $ynwa=='57'):  

          		if($produkalkes->status_app=='draff' || $produkalkes->status_app=='ditolak' || $produkalkes->status_app=='outstanding'){
			    $row[] = '<center><a href="Alkesrr/updatedetailrr/'.$produkalkes->kode_transaksi.'/'.$produkalkes->jenis_listing.'" class="edit_record btn btn-xs btn btn-info" title="Update"><i class="glyphicon glyphicon-edit"></i></a></center>';
			    }else{
			    	 $row[] = '<center><span class="edit_record btn btn-xs" title="Update disabled" onclick=""><i class="glyphicon glyphicon-edit"></i></a></center>'; 
			    }

          	if($produkalkes->status_app=='draff'){
			    $row[] = '<center><a href="Alkesrr/hapus/'.$produkalkes->kode_transaksi.'/'.$produkalkes->koper.'" class="edit_record btn btn-xs btn btn-danger" onClick="return doconfirm()" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a></center>';
			    }else{
			    	 $row[] = '<center><span class="edit_record btn btn-xs" title="Hapus disabled" onclick=""><i class="glyphicon glyphicon-trash"></i></a></center>'; 
			    }
			endif;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->malkesrr->count_all(),
                        "recordsFiltered" => $this->malkesrr->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    function update_aktif(){
        

        $koper = $_POST['koper'];
        $status_prinsipal = $_POST['status_prinsipal'];
        $catatan_stsprinsipal = $_POST['catatan_stsprinsipal'];    
        
            
        

 // for ($x = 0; $x < count($this->input->post('koper')); $x++){

for($x = 0; $x < sizeof($koper); $x++){

 $headcui="UPDATE rralkes_detail set  
                                stsproduk_detil='$status_prinsipal[$x]' 
                                WHERE koper='$koper[$x]'";

        $this->db->query($headcui);

$mstper="UPDATE master_perusahaan set  
                                status_per='$status_prinsipal[$x]' 
                                WHERE koper='$koper[$x]'";

        $this->db->query($mstper);

            $updateArray = array(
                'koper' => $koper[$x],
                'status_prinsipal' => $status_prinsipal[$x],
                'catatan_stsprinsipal' => $catatan_stsprinsipal[$x],
                  );
            $this->db->where('koper',$koper[$x]);
            $this->db->update('listingrrhead',$updateArray); //Could not update I don't know why       
        if($updateArray>=0){
    $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
    header('location:'.base_url().'Alkesrr/cetakalkes');
    }else{
    $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
    header('location:'.base_url().'Alkesrr/cetakalkes');
    }

    }
    }

 function updateproduk_aktif(){
        

        
         $kode_produk = $_POST['kode_produk'];
        $stsproduk_detil = $_POST['stsproduk_detil'];
        $ctt_stsproduk = $_POST['ctt_stsproduk'];    
        $kode_transaksi = $_POST['kode_transaksi'];  

 // for ($x = 0; $x < count($this->input->post('kode_produk')); $x++){

 for($x = 0; $x < sizeof($kode_produk); $x++){


$mstproduk="UPDATE master_produk set  
                                status_pdk='$stsproduk_detil[$x]' 
                                WHERE kode_produk='$kode_produk[$x]'";

        $this->db->query($mstproduk);
 
            $updateArray = array(
                 'kode_produk' => $kode_produk[$x],
                'stsproduk_detil' => $stsproduk_detil[$x],
                'ctt_stsproduk' => $ctt_stsproduk[$x],
                  );
            $this->db->where('kode_produk',$kode_produk[$x]);
            $this->db->update('rralkes_detail',$updateArray); //Could not update I don't know why       
        if($updateArray>=0){
    $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
    header('location:'.base_url().'Alkesrr/viewdetaillaprr/'.$kode_transaksi.'');
    }else{
    $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
    header('location:'.base_url().'Alkesrr/viewdetaillaprr/'.$kode_transaksi.'');
    }

    }
    }
function updateaprove(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('malkesrr');
          if($ynwa=='82'):
              	 $kode_transaksi=$_POST['kode_transaksi'];
              	 $status=$_POST['status_app'];
                 $catatan_statusapp=$_POST['catatan_statusapp'];
                         $data = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'status_app'=>$status,
					        'catatan_statusapp'=>$catatan_statusapp,
        					);

                      $ynwa = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'stsapp_detil'=>$status,
					       );
                      $hasil = $this->malkesrr->Updateappdetil($ynwa);

             endif;

              if($ynwa=='75' || $ynwa=='76'):
              	 $kode_transaksi=$_POST['kode_transaksi'];
              	 $status=$_POST['status_app'];
                 $diajukan=$_POST['diajukan'];
                 $dept=$_POST['dept'];
                 $catatan_statusapp=$_POST['catatan_statusapp'];

             $ttd_staff=$_POST['ttd_staff'];
             $nm_staff=$_POST['nm_staff'];
             $jb_staff=$_POST['jb_staff'];
        $data = array(
        'kode_transaksi' =>$kode_transaksi,
        'status_app'=>$status,
        'catatan_statusapp'=>$catatan_statusapp,
        'departemen'=>$dept,
        'statuslist_head'=>$diajukan,
        'status_prinsipal'=>'aktif',
        'ttd_staff' =>$this->input->post('ttd_staff'),
        'nm_staff' =>$this->input->post('nm_staff'),
        'jb_staff' =>$this->input->post('jb_staff'),
        );

         $ynwa = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'stsapp_detil'=>$status,
                             'departemen'=>$dept,
                            'statuslist_detil'=>$diajukan,
                            'stsproduk_detil'=>'aktif',
					       );
         $hasil = $this->malkesrr->Updateappdetil($ynwa);
    endif;
     if($ynwa=='69'):
     	 $kode_transaksi=$_POST['kode_transaksi'];
      	 $status=$_POST['status_app'];
         $catatan_statusapp=$_POST['catatan_statusapp'];

         $ttd_mengetahui=$_POST['ttd_mengetahui'];
         $nm_mengetahui=$_POST['nm_mengetahui'];
         $jb_mengetahui=$_POST['jb_mengetahui'];

     	$data = array(
        'kode_transaksi' =>$kode_transaksi,
        'status_app'=>$status,
        'catatan_statusapp'=>$catatan_statusapp,
        'ttd_mengetahui' =>$ttd_mengetahui,
        'nm_mengetahui' => $nm_mengetahui,
        'jb_mengetahui' =>$jb_mengetahui, 
        );  

         $ynwa = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'stsapp_detil'=>$status,
					       );
         $hasil = $this->malkesrr->Updateappdetil($ynwa);

    endif;

     if($ynwa=='57'):
     	 $kode_transaksi=$_POST['kode_transaksi'];
      	 $status=$_POST['status_app'];
         $catatan_statusapp=$_POST['catatan_statusapp'];

         $ttd_mengetahui2=$_POST['ttd_mengetahui2'];
         $nm_mengetahui2=$_POST['nm_mengetahui2'];
         $jb_mengetahui2=$_POST['jb_mengetahui2'];

     	$data = array(
        'kode_transaksi' =>$kode_transaksi,
        'status_app'=>$status,
        'catatan_statusapp'=>$catatan_statusapp,
        'ttd_mengetahui2' =>$ttd_mengetahui2,
        'nm_mengetahui2' => $nm_mengetahui2,
        'jb_mengetahui2' =>$jb_mengetahui2, 
        );  

         $ynwa = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'stsapp_detil'=>$status,
					       );
         $hasil = $this->malkesrr->Updateappdetil($ynwa);

    endif;
     if($ynwa=='10'):
     	 $kode_transaksi=$_POST['kode_transaksi'];
      	 $status=$_POST['status_app'];
      	 $koper=$_POST['koper'];
         $catatan_statusapp=$_POST['catatan_statusapp'];
          $jenis_listing=$_POST['jenis_listing'];
         $ttd_menyetujui=$_POST['ttd_menyetujui'];
         $nm_menyetujui=$_POST['nm_menyetujui'];
         $jb_menyetujui=$_POST['jb_menyetujui'];

         if($status!='ditolak'){
            $ynwa34='live';
         }else{
            $ynwa34='diajukan';
         }

     	$data = array(
        'kode_transaksi' =>$kode_transaksi,
        'status_app'=>$status,
        'statuslist_head'=>$ynwa34,
        'catatan_statusapp'=>$catatan_statusapp,
        'ttd_menyetujui' =>$ttd_menyetujui,
        'nm_menyetujui' => $nm_menyetujui,
        'jb_menyetujui' =>$jb_menyetujui,     
        );  

         $ynwa = array(
					        'kode_transaksi' =>$kode_transaksi,
					        'stsapp_detil'=>$status,
					        'statuslist_detil'=>$ynwa34,
					       );
         $hasil = $this->malkesrr->Updateappdetil($ynwa);

 if($jenis_listing=='0'):
  
 $dara919 = $this->malkesrr->Getalkeshead("where statuslist_head='live'")->result_array();

   if(isset($dara919[0]['statuslist_head'])):

         $headapp="UPDATE listingrrhead set  
                                statuslist_head='histori' 
                                WHERE kode_transaksi != '$kode_transaksi' and koper='$koper'";

        $this->db->query($headapp);
endif;

          $dara91 = $this->malkesrr->Getalkesdetil("where statuslist_detil='live'")->result_array();

   if(isset($dara91[0]['statuslist_detil'])):

         $headcui="UPDATE rralkes_detail set  
		                        statuslist_detil='histori' 
								WHERE kode_transaksi != '$kode_transaksi' and koper='$koper'";

		$this->db->query($headcui);
endif;
       endif;          
    endif;
       
                
        $this->load->model('malkesrr');
        $hasil = $this->malkesrr->Updateapp($data);
        if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'Alkesrr/email_updateaprove/'.$kode_transaksi.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'Alkesrr');
        }
    }

    // if():
    // $this->db->call_function('email_updateaprove');
    // endif;
    
    function email_updateaprove(){
     $kode_transaksi=$this->uri->segment(3);
       $this->load->model('malkesrr');
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

     $diremail = $this->db->query("select * from setup_email where jabatan='10' or jabatan='82'")->result();
          $data_emaildir='-';
           foreach($diremail as $key => $de ){
                  if($key==0){
                    $data_emaildir .= $de->email;}
                    else{ 
                     $data_emaildir .= ','.$de->email; }
                   }

           $dept ='Departemen Penunjang Medis';
          $email_dept = $this->malkesrr->v_user($dept);
          $data_dept='-';
           foreach($email_dept as $key => $dp ){
                  if($key==0){
                    $data_dept .= $dp->email;}
                    else{ 
                     $data_dept .= ','.$dp->email; }
                   }

     $this->load->library('email', $config);

      $prod = $this->db->get_where('v_listingrrhead',['kode_transaksi'=> $kode_transaksi])->row();

      $ynwa2=$prod->jenis_pembayaran;
          if($ynwa2=='1'){
            $ynwa2='CASH';
          }else{
            $ynwa2='SPONSORSHIP';
          } 
     $html='
<table border="0">
<tr>
<td width="150">Kode Transaksi</td><td width="5">:</td>
<td width="220">'.$prod->kode_transaksi.'</td>
</tr>
<tr>
<td width="150">Tanggal Transaksi</td><td width="5">:</td>
<td width="220">'. date("d M Y",strtotime($prod->tgl_tr)).'</td>
</tr>
<tr>
<td width="150">Perusahaan</td><td width="5">:</td>
<td width="220">'.$prod->nm_perusahaan.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="150">Fee Management</td><td width="5">:</td>
<td width="400">'.$prod->fee.' %</td>
</tr>
<tr>
<td width="150">Jenis Pembayaran</td><td width="5">:</td>
<td width="400">'.$ynwa2.'</td>
</tr>
<tr>
<td width="150">Status</td><td width="5">:</td>
<td width="400">'.$prod->status_app.'</td>
</tr>
</table>
<br>
<br>
<span>Detail Produk Alat Kesehatan  :</span><br><br>';

     if($prod->jenis_listing==1){

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
            <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Produk </th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where kode_transaksi='$kode_transaksi' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
            </tr> ';

        }
    }else{

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
        <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Lama Produk </th>     
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Baru Produk </th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where kode_transaksi='$kode_transaksi' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
             <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_lama).'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
            </tr> ';

        }


    }

     $this->email->from('sipa.apps@herminahospitals.com','Admin Sipa');
     $this->email->to($data_emaildir.','.$data_dept);
     $this->email->cc('achmadhasrulwinada@gmail.com');
     $this->email->subject('Pengajuan RR Listing Alkes '  .$kode_transaksi);
     $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'Alkesrr');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }


    }

    function updateaprovedetil(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('malkesrr');
         

              if($ynwa=='75' || $ynwa=='76'):
                 $iddetilalkesrr=$_POST['iddetilalkesrr'];
                 $kode_transaksi=$_POST['kode_transaksi'];
                 $jenis_listing=$_POST['jenis_listing'];
                 $stsapp_detil=$_POST['stsapp_detil'];
                 $diajukan=$_POST['diajukan'];
                          
        $data = array(
        'iddetilalkesrr'=>$iddetilalkesrr,
        'stsapp_detil'=>$stsapp_detil,  
        'statuslist_detil'=> $diajukan,    
        );

         
    endif;
     if($ynwa=='69'):
         $iddetilalkesrr=$_POST['iddetilalkesrr'];
         $kode_transaksi=$_POST['kode_transaksi'];
         $jenis_listing=$_POST['jenis_listing'];
         $stsapp_detil=$_POST['stsapp_detil'];
         
       $data = array(
        'iddetilalkesrr' =>$iddetilalkesrr,
        'stsapp_detil'=>$stsapp_detil,
         );  

        
    endif;   

     if($ynwa=='57'):
         $iddetilalkesrr=$_POST['iddetilalkesrr'];
         $kode_transaksi=$_POST['kode_transaksi'];
         $jenis_listing=$_POST['jenis_listing'];
         $stsapp_detil=$_POST['stsapp_detil'];
         
       $data = array(
        'iddetilalkesrr' =>$iddetilalkesrr,
        'stsapp_detil'=>$stsapp_detil,
         );  

        
    endif;       
                
        $this->load->model('malkesrr');
        $hasil = $this->malkesrr->Updatedetail($data);
        if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'Alkesrr/email_updatedetailrr/'.$kode_transaksi.'/'.$jenis_listing.'/'.$iddetilalkesrr.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'Alkesrr/email_updatedetailrr/'.$kode_transaksi.'/'.$jenis_listing.'/'.$iddetilalkesrr.'');
        }
    }

function email_updatedetailrr(){
     $kode_transaksi=$this->uri->segment(3);
     $jenis_listing=$this->uri->segment(4);
     $iddetilalkesrr=$this->uri->segment(5);
       $this->load->model('malkesrr');
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

     $diremail = $this->db->query("select * from setup_email where jabatan='10' or jabatan='82'")->result();
         $data_emaildir='-';
           foreach($diremail as $key => $de ){
                  if($key==0){
                    $data_emaildir .= $de->email;}
                    else{ 
                     $data_emaildir .= ','.$de->email; }
                   }

           $dept ='Departemen Penunjang Medis';
           $data_dept='-';
          $email_dept = $this->malkesrr->v_user($dept);
           foreach($email_dept as $key => $dp ){
                  if($key==0){
                    $data_dept .= $dp->email;}
                    else{ 
                     $data_dept .= ','.$dp->email; }
                   }

     $this->load->library('email', $config);

      $prod = $this->db->get_where('v_listingrrhead',['kode_transaksi'=> $kode_transaksi])->row();

      $ynwa2=$prod->jenis_pembayaran;
          if($ynwa2=='1'){
            $ynwa2='CASH';
          }else{
            $ynwa2='SPONSORSHIP';
          } 
     $html='
<table border="0">
<tr>
<td width="150">Kode Transaksi</td><td width="5">:</td>
<td width="220">'.$prod->kode_transaksi.'</td>
</tr>
<tr>
<td width="150">Tanggal Transaksi</td><td width="5">:</td>
<td width="220">'. date("d M Y",strtotime($prod->tgl_tr)).'</td>
</tr>
<tr>
<td width="150">Perusahaan</td><td width="5">:</td>
<td width="220">'.$prod->nm_perusahaan.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="150">Fee Management</td><td width="5">:</td>
<td width="400">'.$prod->fee.' %</td>
</tr>
<tr>
<td width="150">Jenis Pembayaran</td><td width="5">:</td>
<td width="400">'.$ynwa2.'</td>
</tr>
<tr>
<td width="150">Status</td><td width="5">:</td>
<td width="400">'.$prod->status_app.'</td>
</tr>
</table>
<br>
<br>
<span>Detail Produk Alat Kesehatan  :</span><br><br>';

     if($prod->jenis_listing==1){

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
            <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Produk </th>
            <th width="200" style="text-align:center;line-height:15px;">Status </th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where iddetilalkesrr='$iddetilalkesrr' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->stsapp_detil.'</td>
            </tr> ';

        }
    }else{

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
        <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Lama Produk </th>     
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Baru Produk </th>
            <th width="200" style="text-align:center;line-height:15px;">Status </th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where iddetilalkesrr='$iddetilalkesrr' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
             <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_lama).'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
             <td width="200" align="justify" style="line-height:15px;">'.$row->stsapp_detil.'</td>
            </tr> ';

        }


    }

     $this->email->from('sipa.apps@herminahospitals.com','Admin Sipa');
     $this->email->to($data_emaildir.','.$data_dept);
     $this->email->cc('achmadhasrulwinada@gmail.com');
     $this->email->subject('Pengajuan RR Listing Alkes '  .$kode_transaksi);
     $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'Alkesrr/updatedetailrr/'.$kode_transaksi.'/'.$jenis_listing.'');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }


    }



	function savedatas(){
		$this->load->model('malkesrr');

		 $koper = $_POST['koper'];
		 $kode_transaksi = $_POST['kode_transaksi'];
		 $id_tipe_produk = $_POST['id_tipe_produk'];
		 $tgl_tr = $_POST['tgl_tr'];
		 $jenis_listing=$_POST['jenis_listing'];
		 $jenis_pembayaran=$_POST['jenis_pembayaran'];
		 $status_app='draff';
		 $kontak = $_POST['contact'];
		 $fee='5';
          


		$data = array(	
			'id_tipe_produk' => $id_tipe_produk,
			'koper' => $koper,
			'tgl_tr' => $tgl_tr,
			'kode_transaksi' => $kode_transaksi,
			'jenis_listing' => $jenis_listing,
			'jenis_pembayaran' => $jenis_pembayaran,
			'status_app'=>$status_app,
			'fee'=>$fee,
			'contact'=>$kontak,
            'status_prinsipal'=>'aktif',
			'createby' =>  $this->session->userdata('nama'),			
			);
		
  $data_dist = $this->malkesrr->Getalkeshead("where koper = '$koper' and status_app !='Disetujui Direktur Ops & Umum'")->result_array();

       if(isset($data_dist[0]['status_app'])){
  $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Proses Pengajuan</strong></div>");
      header('location:'.base_url().'Alkesrr');        
       }else{
			$this->malkesrr->Save_alkesrr($data);
      $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
      header('location:'.base_url().'Alkesrr');
}
	
		}

 function simpan_hargalama(){
 	    $id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		$koper=$this->uri->segment(5);
        $this->load->model('malkesrr');

             // and stsapp_detil='live'

          $prod = $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row();
		  $data_alkes = $this->malkesrr->Getalkesdetilview("where koper='$koper' and stsapp_detil='Disetujui Direktur Ops & Umum' and statuslist_detil='live' and stsproduk_detil='aktif'")->result_array();

        $kode_transaksi2 =  $prod->kode_transaksi;
		$jenis_listing2 =  $prod->jenis_listing;
		$koper2 =  $prod->koper;
        $isi = '1';
          foreach ($data_alkes as $tr){

    $kode_transaksi =  $prod->kode_transaksi;
		$jenis_listing =  $prod->jenis_listing;
		$koper =  $prod->koper;
		$kode_produk = $tr['kode_produk'];
		$harga_lama =  $tr['harga_baru'];
		$diskon_lama =  $tr['diskon_baru'];
		$ppn_lama =  $tr['ppn_baru'];
		$harga_baru = 0;
		$diskon_baru = 0;
		$ppn_baru =  0;
		$stse_kat =  $tr['stse_kat'];
        $stsregister =  $tr['stsregister'];
        $biaya_pengiriman =  $tr['biaya_pengiriman'];
       	$tahunke1 =  $tr['tahunke1'];
		$tahunke2 =  $tr['tahunke2'];
		$tahunke3 =  $tr['tahunke3'];
		$tahunke4 =  $tr['tahunke4'];
		$tahunke5 =  $tr['tahunke5'];
	    $persentase1 =  $tr['persentase1'];
		$persentase2 =  $tr['persentase2'];
		$persentase3 =  $tr['persentase3'];
		$persentase4 =  $tr['persentase4'];
		$persentase5 =  $tr['persentase5'];
		$fee =  $tr['fee'];
		$ket =  $tr['ket'];
       	$garansi =  $tr['garansi'];
		$garansifree =  $tr['garansifree'];
		$note =  $tr['note'];
		$alasanharga =  $tr['alasanharga'];
		$alasandiskon =  $tr['alasandiskon'];
		$statuslist_detil='diajukan';
        $stsproduk_detil='aktif';
        $foto=$tr['foto'];
        $includeongkir=$tr['includeongkir'];
		$createby=$this->session->userdata('nama');
		    
     $hargalama = " INSERT INTO rralkes_detail
		(kode_transaksi, koper, kode_produk, harga_baru, diskon_baru, ppn_baru, harga_lama, diskon_lama, ppn_lama, stse_kat, stsregister, biaya_pengiriman, jenis_pembayaran, tahunke1, tahunke2, tahunke3, tahunke4, tahunke5, persentase1, persentase2, persentase3, persentase4, persentase5, fee, ket, garansi, garansifree, note, createby, alasanharga, alasandiskon, statuslist_detil, stsproduk_detil, foto, includeongkir) 
		
	SELECT '$kode_transaksi', 
	       '$koper',
	       '$kode_produk',
	       '$harga_baru',
	       '$diskon_baru', 
         '$ppn_baru', 
	       '$harga_lama',
	       '$diskon_lama',
	       '$ppn_lama',
	       '$stse_kat',
	       '$stsregister',
	       '$biaya_pengiriman', 
	       '$jenis_pembayaran',
	       '$tahunke1', '$tahunke2', '$tahunke3', '$tahunke4', '$tahunke5',
	       '$persentase1', '$persentase2', '$persentase3', '$persentase4', '$persentase5',
	       '$fee',
	       '$ket',
	       '$garansi', 
	       '$garansifree',
	       '$note',
	       '$createby',
	       '$alasanharga',
	       '$alasandiskon',
	       '$statuslist_detil',
           '$stsproduk_detil',
           '$foto',
           ' $includeongkir'
	        WHERE NOT EXISTS (SELECT *
							  FROM rralkes_detail
							  WHERE kode_transaksi = '$kode_transaksi' 
							  AND kode_produk = '$kode_produk'); 
							  
		  UPDATE rralkes_detail set  
		                        harga_baru = '$harga_baru', 
		                        diskon_baru = '$diskon_baru', 
		                        ppn_baru = '$ppn_baru',  
		                        harga_lama ='$harga_lama' , 
		                        diskon_lama='$diskon_lama', 
		                        ppn_lama='$ppn_lama',
                                alasanharga='$alasanharga',
                                alasandiskon='$alasandiskon'
								WHERE kode_transaksi = '$kode_transaksi' 
								AND kode_produk = '$kode_produk'";
		
		
		
	$this->db->query($hargalama);
		
		}

		  $head="UPDATE listingrrhead set  
		                        isi='$isi',
                                status_prinsipal='$stsproduk_detil'
								WHERE kode_transaksi = '$kode_transaksi'";

	$this->db->query($head);
			
	 redirect('Alkesrr/adddetail/'.$kode_transaksi2.'/'.$jenis_listing2.'/'.$koper2.'');
       
    }

function adddetail()
	{
		$id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		$koper=$this->uri->segment(5);
      if($list=='1'){
		$this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 'alkes' => $this->malkesrr->Getmstproduk("where tipe_produk='TP003' and koper='$koper' and status_pdk='aktif'  order by nama_produk desc")->result_array(),
			 );
		 
		$this->template->display('alkesrr/add_detilalkes', $data);
		}else{
			$this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			 'data_alkes' => $this->malkesrr->Getalkesdetilview("where koper='$koper' and kode_transaksi='$id' and stsproduk_detil='aktif'")->result_array(),
			 'alkes' => $this->malkesrr->Getmstproduk("where tipe_produk='TP003' and status_pdk='aktif'  order by nama_produk desc")->result_array(),
			 );
		 
		$this->template->display('alkesrr/add_detilalkes21', $data);
		}
			}

			function viewdetailrr()
	{
		
		$id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		if($list=='1'){
		 $this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 );
		 
		$this->template->display('alkesrr/v_detilalkes', $data);
		}else{
		 $this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 );
		 
		$this->template->display('alkesrr/v_detilalkes21', $data);
		}
}

function viewdetaillaprr()
	{
		
		$id=$this->uri->segment(3);
		// if($list=='1'){
		 $this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 );
		 
		$this->template->display('alkesrr/v_detilalkeslap', $data);
		// }else{
		//  $this->load->model('malkesrr');                         
		// $data = array(
		// 	'nama' => $this->session->userdata('nama'),	
		// 	'cabang' => $this->session->userdata('cabang'),	
		// 	 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
		// 	'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
		// 	 );
		 
		// $this->template->display('alkesrr/v_detilalkes21lap', $data);
		// }
}


function updatedetailrr()
	{
		
		$id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		if($list=='1'){
		 $this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 );
		 
		$this->template->display('alkesrr/update_detilalkes', $data);
		}else{
		 $this->load->model('malkesrr');                         
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 );
		 
		$this->template->display('alkesrr/update_detilalkes21', $data);
		}
}

 function update_hargalama(){
 	    $id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		$koper=$this->uri->segment(5);
        $this->load->model('malkesrr');      
 
        
        $kode_transaksi2 = $_POST['kode_transaksi2'];
		$jenis_listing2 = $_POST['jenis_listing2'];
		$koper2 = $_POST['koper2'];
        $kode_transaksi = $_POST['kode_transaksi'];
		$jenis_listing = $_POST['jenis_listing'];
		$koper = $_POST['koper'];
		$kode_produk = $_POST['kode_produk'];
		$harga_baru = $_POST['harga_baru'];
		$diskon_baru = $_POST['diskon_baru'];
		$ppn_baru = $_POST['ppn_baru'];
		$harga_lama = $_POST['harga_lama'];
		$diskon_lama = $_POST['diskon_lama'];
		$ppn_lama = $_POST['ppn_lama'];
		$stse_kat = $_POST['stse_kat'];
        $stsregister = $_POST['stsregister'];
        $biaya_pengiriman = $_POST['biaya_pengiriman'];
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
		$fee = $_POST['fee'];
		$ket = $_POST['ket'];
       	$garansi = $_POST['garansi'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
		$alasanharga = $_POST['alasanharga'];
		$alasandiskon = $_POST['alasandiskon'];                                             
       for ($x = 0; $x < count($this->input->post('kode_produk')); $x++)
     {

     	       $hargalama = " UPDATE rralkes_detail set  
		                        harga_baru = '$harga_baru[$x]', 
		                        diskon_baru = '$diskon_baru[$x]', 
		                        ppn_baru = '$ppn_baru[$x]',  
		                        harga_lama ='$harga_lama[$x]' , 
		                        diskon_lama='$diskon_lama[$x]', 
		                        ppn_lama='$ppn_lama[$x]',
		                        alasanharga='$alasanharga[$x]',
		                        alasandiskon='$alasandiskon[$x]'
								WHERE kode_transaksi = '$kode_transaksi[$x]' 
								AND kode_produk = '$kode_produk[$x]'";
		
		
		
	$this->db->query($hargalama);
		 }       

	 redirect('Alkesrr/adddetail/'.$kode_transaksi2.'/'.$jenis_listing2.'/'.$koper2.'');
       
    }

    function update_hargalama2(){
 	    $id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		$koper=$this->uri->segment(5);
        $this->load->model('malkesrr');      
 
         $kode_transaksihead = $_POST['kode_transaksihead'];
           $contact = $_POST['contact'];
        $jenis_pembayaran21 = $_POST['jenis_pembayaran21'];
        $kode_transaksi2 = $_POST['kode_transaksi2'];
		$jenis_listing2 = $_POST['jenis_listing2'];
		$koper2 = $_POST['koper2'];
        $kode_transaksi = $_POST['kode_transaksi'];
		$jenis_listing = $_POST['jenis_listing'];
		$koper = $_POST['koper'];
		$kode_produk = $_POST['kode_produk'];
		$harga_baru = $_POST['harga_baru'];
		$diskon_baru = $_POST['diskon_baru'];
		$ppn_baru = $_POST['ppn_baru'];
		$harga_lama = $_POST['harga_lama'];
		$diskon_lama = $_POST['diskon_lama'];
		$ppn_lama = $_POST['ppn_lama'];
		$stse_kat = $_POST['stse_kat'];
        $stsregister = $_POST['stsregister'];
        $biaya_pengiriman = $_POST['biaya_pengiriman'];
        $jenis_pembayaran = $_POST['jenis_pembayaran'];
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
		$fee = $_POST['fee'];
		$ket = $_POST['ket'];
    $garansi = $_POST['garansi'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
		$alasanharga = $_POST['alasanharga'];
		$alasandiskon = $_POST['alasandiskon'];

     $hargahead = " UPDATE listingrrhead set  
                            contact = '$contact', 
                            jenis_pembayaran = '$jenis_pembayaran21' 
                            WHERE kode_transaksi = '$kode_transaksihead' ";
    
  $this->db->query($hargahead);

       for ($x = 0; $x < count($this->input->post('kode_produk')); $x++)
     {

     	       $hargalama = " UPDATE rralkes_detail set  
		                        harga_baru = '$harga_baru[$x]', 
		                        diskon_baru = '$diskon_baru[$x]', 
		                        ppn_baru = '$ppn_baru[$x]',  
		                        harga_lama ='$harga_lama[$x]' , 
		                        diskon_lama='$diskon_lama[$x]', 
		                        ppn_lama='$ppn_lama[$x]',
		                        alasanharga='$alasanharga[$x]',
		                        alasandiskon='$alasandiskon[$x]'
								WHERE kode_transaksi = '$kode_transaksi[$x]' 
								AND kode_produk = '$kode_produk[$x]'";
		
		
		
	$this->db->query($hargalama);
		 }       
 $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	 redirect('Alkesrr/updatedetailrr/'.$kode_transaksi2.'/'.$jenis_listing2.'');
       
    }

    function update_hargabaru(){
 	      $this->load->model('malkesrr');      
 
        $cui = $_POST['cui'];
		$cui2 = $_POST['cui2'];
       	$kode_transaksi = $_POST['kode_transaksi'];
        $kode_transaksihead = $_POST['kode_transaksihead'];
        $contact = $_POST['contact'];
        $jenis_pembayaran = $_POST['jenis_pembayaran'];
		$kode_produk = $_POST['kode_produk'];
		$harga_baru = $_POST['harga_baru'];
		$diskon_baru = $_POST['diskon_baru'];
		$ppn_baru = $_POST['ppn_baru'];	
 $hargahead = " UPDATE listingrrhead set  
                            contact = '$contact', 
                            jenis_pembayaran = '$jenis_pembayaran' 
                            WHERE kode_transaksi = '$kode_transaksihead' ";
    
  $this->db->query($hargahead);

		                                             
       for ($x = 0; $x < count($this->input->post('kode_produk')); $x++)
     {

     	       $harga = " UPDATE rralkes_detail set  
		                        harga_baru = '$harga_baru[$x]', 
		                        diskon_baru = '$diskon_baru[$x]', 
		                        ppn_baru = '$ppn_baru[$x]'
		                      	WHERE kode_transaksi = '$kode_transaksi[$x]' 
								AND kode_produk = '$kode_produk[$x]'";
		
		
		
	$this->db->query($harga);
		 }       
 $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	 redirect('Alkesrr/updatedetailrr/'.$cui.'/'.$cui2.'');
       
    }
   
function updateappdetilrr()
	{
		
		$id=$this->uri->segment(3);
		$list=$this->uri->segment(4);
		if($list=='1'){
		 $this->load->model('malkesrr');    

		  $ynwa = ($this->session->userdata('koderole'));
           if($ynwa=='82'):
		 $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id' and stsapp_detil !='Disetujui Direktur Ops & Umum'")->result_array(),
			 );
           endif;
            if($ynwa!='82'):
		 $data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
			'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
			 ); 
		  endif;
		$this->template->display('alkesrr/approve_perdetil', $data);
		}else{
             $this->load->model('malkesrr');
		 $ynwa = ($this->session->userdata('koderole'));
           if($ynwa=='82'):
         $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'), 
             'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
            'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id' and stsapp_detil !='Disetujui Direktur Ops & Umum'")->result_array(),
             );
           endif;
            if($ynwa!='82'):
         $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'), 
             'prod' => $this->db->get_where('v_listingrrhead',['kode_transaksi'=>$id])->row(),
            'data_alkes' => $this->malkesrr->Getalkesdetilview("where kode_transaksi='$id'")->result_array(),
             ); 
          endif;
		 
		$this->template->display('alkesrr/approve_perdetil21', $data);
		}
}

function update_appdetil(){
 	      $this->load->model('malkesrr');      
 
        $cui = $_POST['cui'];
		$cui2 = $_POST['cui2'];
       	$kode_transaksi = $_POST['kode_transaksi'];
		$kode_produk = $_POST['kode_produk'];
		$stsapp_detil = $_POST['stsapp_detil'];
		$uul78 = $_POST['uul78'];
		$live = $_POST['statuslist_detil'];
        $histori = $_POST['statuslist_detil2'];
        $diajukan = $_POST['statuslist_detil3'];
		$ctt_stsapp = $_POST['ctt_stsapp'];                                             
       for ($x = 0; $x < count($this->input->post('kode_produk')); $x++)
     {

     	       $harga = " UPDATE rralkes_detail set  
		                       stsapp_detil = '$stsapp_detil[$x]',
		                       ctt_stsapp = '$ctt_stsapp[$x]'
	                      	WHERE kode_transaksi = '$kode_transaksi[$x]' 
							AND kode_produk = '$kode_produk[$x]'";
		
		
		
	$this->db->query($harga);
		 }       


  $dara = ($this->session->userdata('koderole'));
           if($dara=='82'):
	$data_dist = $this->malkesrr->Getalkesdetil("where kode_transaksi = '$cui' and stsapp_detil='ditolak'")->result_array();

        $stsapp_detil21 = isset($data_dist[0]['stsapp_detil']);

	if(isset($data_dist[0]['stsapp_detil'])){
       $head="UPDATE listingrrhead set  
		                        status_app='outstanding' 
								WHERE kode_transaksi = '$cui'";

	     $this->db->query($head);
	 }else{
       $head="UPDATE listingrrhead set  
		                        status_app='Disetujui Kadep Pengadaan' 
								WHERE kode_transaksi = '$cui'";

	     $this->db->query($head);
	 }
	endif;

	if($dara=='10'):
	
	$data_dist = $this->malkesrr->Getalkesdetil("where kode_transaksi = '$cui' and stsapp_detil='ditolak'")->result_array();

        $stsapp_detil21 = isset($data_dist[0]['stsapp_detil']);

	if(isset($data_dist[0]['stsapp_detil'])){
       $head="UPDATE listingrrhead set  
		                        status_app='outstanding',
                                statuslist_head='diajukan' 
								WHERE kode_transaksi = '$cui'";

	     $this->db->query($head);
	 }else{
       $head="UPDATE listingrrhead set  
		                        status_app='Disetujui Direktur Ops & Umum',
                                statuslist_head='diajukan'
								WHERE kode_transaksi = '$cui'";

	     $this->db->query($head);
	 }
	endif;

	 redirect('Alkesrr/email_updateappdetilrr/'.$cui.'/'.$cui2.'');
       
    }

     function email_updateappdetilrr(){
     $kode_transaksi=$this->uri->segment(3);
     $jenis_listing=$this->uri->segment(4);
       $this->load->model('malkesrr');    
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

     $diremail = $this->db->query("select * from setup_email where jabatan='10' or jabatan='82'")->result();
          $data_emaildir='-';
           foreach($diremail as $key => $de ){
                  if($key==0){
                    $data_emaildir .= $de->email;}
                    else{ 
                     $data_emaildir .= ','.$de->email; }
                   }
           $dept ='Departemen Penunjang Medis';
          $email_dept = $this->malkesrr->v_user($dept);
          $data_dept='-';
           foreach($email_dept as $key => $dp ){
                  if($key==0){
                    $data_dept .= $dp->email;}
                    else{ 
                     $data_dept .= ','.$dp->email; }
                   }

     $this->load->library('email', $config);

      $prod = $this->db->get_where('v_listingrrhead',['kode_transaksi'=> $kode_transaksi])->row();

      $ynwa2=$prod->jenis_pembayaran;
          if($ynwa2=='1'){
            $ynwa2='CASH';
          }else{
            $ynwa2='SPONSORSHIP';
          } 
     $html='
<table border="0">
<tr>
<td width="150">Kode Transaksi</td><td width="5">:</td>
<td width="220">'.$prod->kode_transaksi.'</td>
</tr>
<tr>
<td width="150">Tanggal Transaksi</td><td width="5">:</td>
<td width="220">'. date("d M Y",strtotime($prod->tgl_tr)).'</td>
</tr>
<tr>
<td width="150">Perusahaan</td><td width="5">:</td>
<td width="220">'.$prod->nm_perusahaan.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="150">Fee Management</td><td width="5">:</td>
<td width="400">'.$prod->fee.' %</td>
</tr>
<tr>
<td width="150">Jenis Pembayaran</td><td width="5">:</td>
<td width="400">'.$ynwa2.'</td>
</tr>
<tr>
<td width="150">Status</td><td width="5">:</td>
<td width="400">'.$prod->status_app.'</td>
</tr>
</table>
<br>
<br>
<span>Detail Produk Alat Kesehatan  :</span><br><br>';

     if($prod->jenis_listing==1){

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
            <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Produk </th>
             <th width="200" style="text-align:center;line-height:15px;">Status</th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where kode_transaksi='$kode_transaksi' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
             <td width="200" align="justify" style="line-height:15px;">'.$row->stsapp_detil.'</td>
            </tr> ';

        }
    }else{

$html.='     
         <table border="1" cellspacing="0"  cellpadding="2">
        <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
            <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
            <th style="text-align:center;line-height:15px;"> Kode Produk </th>
            <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>  
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Lama Produk </th>     
            <th width="200" style="text-align:center;line-height:15px;">Harga Akhir Baru Produk </th>
             <th width="200" style="text-align:center;line-height:15px;">Status</th>
        </tr>
    ';
                 $barang=$this->malkesrr->Getalkesdetilview("where kode_transaksi='$kode_transaksi' order by nama_produk asc")->result();
                             $no=0;
                        foreach($barang as $row ){
                             $no++; 

        $html.='
            <tr>
            <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
            <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
            <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
             <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_lama).'</td>
            <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga_akhir_baru).'</td>
             <td width="200" align="justify" style="line-height:15px;">'.$row->stsapp_detil.'</td>
            </tr> ';

        }


    }

     $this->email->from('sipa.apps@herminahospitals.com','Admin Sipa');
     $this->email->to($data_emaildir.','.$data_dept);
     $this->email->cc('achmadhasrulwinada@gmail.com');
     $this->email->subject('Pengajuan RR Listing Alkes '  .$kode_transaksi);
     $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'Alkesrr/updateappdetilrr/'.$kode_transaksi.'/'.$jenis_listing.'');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }


    }


    function update_publish(){
 	      $this->load->model('malkesrr');      
 
        $kode_transaksi = $_POST['kode_transaksi'];
        $kode_transaksi2 = $_POST['kode_transaksi2'];
        $koper = $_POST['koper'];
         $jenis_listing = $_POST['jenis_listing'];
        $kode_produk = $_POST['kode_produk'];
		$stsapp_detil = $_POST['stsapp_detil'];
		$live = $_POST['statuslist_detil'];
        $histori = $_POST['statuslist_detil2'];
        $diajukan = $_POST['statuslist_detil3'];
		                            


               
      
 $dara91 = $this->malkesrr->Getalkesdetil("where statuslist_detil='live'")->result_array();

   if(isset($dara91[0]['statuslist_detil'])):

if($jenis_listing=='0'):

 $harga212 = " UPDATE listingrrhead set  
                                    statuslist_head='histori'
                            WHERE  koper = '$koper' and kode_transaksi !='$kode_transaksi2' 
                            and statuslist_head='live'";
                            
    $this->db->query($harga212);
endif;
    for ($z = 0; $z < count($this->input->post('kode_produk')); $z++)
     {

     	       $harga21 = " UPDATE rralkes_detail set  
		                            statuslist_detil='$histori[$z]'
	                      	WHERE  kode_produk = '$kode_produk[$z]' and kode_transaksi !='kode_transaksi[$z]' 
	                      	and statuslist_detil='$live[$z]'";
	                      	
	$this->db->query($harga21);
		 }       
 endif;

  $dara92 = $this->malkesrr->Getalkesdetil("where statuslist_detil='diajukan'")->result_array();

   if(isset($dara92[0]['statuslist_detil'])):

 $diajukancui = " UPDATE listingrrhead set  
                                    statuslist_head='live'
                            WHERE  koper = '$koper' and kode_transaksi ='$kode_transaksi2'  and statuslist_head='diajukan'";
                            
    $this->db->query($diajukancui);    

    for ($y = 0; $y < count($this->input->post('kode_produk')); $y++)
     {

     	       $harga71 = " UPDATE rralkes_detail set  
		                            statuslist_detil='$live[$y]'
	                      	WHERE  kode_produk = '$kode_produk[$y]' and kode_transaksi='$kode_transaksi[$y]'
	                      	and statuslist_detil='$diajukan[$y]'"; 
	                     
		
	$this->db->query($harga71);
		 }       
 endif;
	 redirect('Alkesrr/publishalkesrr');
       
    }

	function editdetilalkesrr($kode=0,$pabrikid=0){
	$this->load->model('malkesrr');
	
	
	$tampung = $this->malkesrr->Getalkesdetilview("where iddetilalkesrr ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->malkesrr->Getalkesdetilview("where iddetilalkesrr = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetilalkesrr' => $tampung[0]['iddetilalkesrr'],	
		'prins' => $this->malkesrr->Getmstproduk("where tipe_produk='TP003' and koper='$pabrikid'")->result_array(),
		'for_prins' => $for_prins,
		'kode_transaksi' => $tampung[0]['kode_transaksi'],
		'koper' => $tampung[0]['koper'],
		'jenis_listing' => $tampung[0]['jenis_listing'],
		'harga_baru' => $tampung[0]['harga_baru'],
		'diskon_baru' => $tampung[0]['diskon_baru'],
        'ppn_baru' => $tampung[0]['ppn_baru'],
        'foto'=> $tampung[0]['foto'],
		'stse_kat' => $tampung[0]['stse_kat'],
		'stsregister' => $tampung[0]['stsregister'],
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
    'jenis_pembayaran' => $tampung[0]['jenis_pembayaran'],
		'fee' => $tampung[0]['fee'],
		'ket' => $tampung[0]['ket'],
    'includeongkir' => $tampung[0]['includeongkir'],
        'note' => $tampung[0]['note'],
		'garansi' => $tampung[0]['garansi'],
		'garansifree' => $tampung[0]['garansifree'],
     'dp' => $tampung[0]['dp'],
    'cicilan' => $tampung[0]['cicilan'],
      );
	
	$this->template->display('alkesrr/edit_detilalkes', $data);	
}
	function updatedetilalkes(){
     
     $this->load->model('malkesrr');
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
     
	    $iddetilalkesrr=$_POST['iddetilalkesrr'];
		$kode_produk = $_POST['kode_produk'];
		$kode_transaksi = $_POST['kode_transaksi'];
		$koper=	$_POST['koper'];
		$jenis_listing=	$_POST['jenis_listing'];
		$harga_baru = $_POST['harga'];
     $diskon_baru = $_POST['discount'];
		$stse_kat = $_POST['stse_kat'];
    $includeongkir = $_POST['includeongkir'];
		$stsregister = $_POST['stsregister'];
		$persentase1 = $_POST['persentase1'];
		$persentase2=$_POST['persentase2'];
		$persentase3 = $_POST['persentase3'];
		$persentase4 = $_POST['persentase4'];
		$persentase5=$_POST['persentase5'];	
		$ket=$_POST['ket'];	
    $dp=$_POST['dp'];
    $cicilan=$_POST['cicilan'];
		$garansi=$_POST['garansi'];	
		$garansifree = $_POST['garansifree'];
		$note=$_POST['note'];
       $ppncheck=$_POST['ppncheck'];
        if($ppncheck=='1'){
           $ppn = $_POST['ppn'];
          }else{
         $ppn =0;
        }        
	$data = array(
	        'iddetilalkesrr' =>$this->input->post('iddetilalkesrr'),
			'kode_transaksi' => $kode_transaksi,
			'kode_produk' => $kode_produk,
			'harga_baru' => $harga_baru,
            'ppn_baru' => $ppn,
            'diskon_baru' => $diskon_baru,
			'stse_kat' => $stse_kat,
			'stsregister' => $stsregister,
			'persentase1' => $persentase1,
			'persentase2' => $persentase2,
			'persentase3' => $persentase3,
			'persentase4' => $persentase4,
			'persentase5' => $persentase5,
			'ket' => $ket,
       'dp'=>$dp,
      'cicilan'=>$cicilan,
      'foto' => $file_name,  
      'includeongkir'=>$includeongkir,
			'garansi' => $garansi,
			'garansifree' => $garansifree,
			'note' => $note,
			'updateby' =>  $this->session->userdata('nama'),
	);

	$this->load->model('malkesrr');
	$hasil = $this->malkesrr->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
	}
	}



			function savedetil(){
		$this->load->model('malkesrr');

     $configttd = array(
            'upload_path' => './assets/upload',
            'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls|xlsx|ods',
            'max_size' => '2048',

        );
        $this->load->library('upload', $configttd); 
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();
         $file_name = $upload_foto['file_name'];

		$kode_trans = $_POST['kode_transaksi'];
		$jenis_listing = $_POST['jenis_listing'];
		$koper = $_POST['koper'];
		$stse_kat = $_POST['stse_kat'];
        $stsregister = $_POST['stsregister'];
        $includeongkir=$_POST['includeongkir'];
        $biaya_pengiriman = $_POST['biaya_pengiriman'];
      //  $jenis_pembayaran = $_POST['jenis_pembayaran'];
        $ppncheck=$_POST['ppncheck'];
        if($ppncheck=='1'){
           $ppn = $_POST['ppn'];
          }else{
         $ppn =0;
        }
        
		$kode_produk = $_POST['kode_produk'];
		$harga = $_POST['harga'];
		$tahunke1 = $_POST['tahunke1'];
		$tahunke2 = $_POST['tahunke2'];
		$tahunke3 = $_POST['tahunke3'];
		$tahunke4 = $_POST['tahunke4'];
		$tahunke5 = $_POST['tahunke5'];
    // $persentase = trim(preg_replace('/([^0-9\.])/i', '', $_POST['persentase1']));
	  $persentase1 = $_POST['persentase1'];
		$persentase2 = $_POST['persentase2'];
		$persentase3 = $_POST['persentase3'];
		$persentase4 = $_POST['persentase4'];
		$persentase5 = $_POST['persentase5'];
		$fee = $_POST['fee'];
		$ket = $_POST['ket'];
        $discount = $_POST['discount'];
		$garansi = $_POST['garansi'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
		$isi ='1';
		$statuslist_detil ='diajukan';
           $dp = $_POST['dp'];
           $cicilan = $_POST['cicilan'];
        $datatgl = $this->malkesrr->Getalkesdetil("where kode_produk='$kode_produk' and kode_transaksi='$kode_trans'")->result_array();
            
		$data= array(	
			'kode_transaksi' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'harga_baru' => $harga,
			'diskon_baru' => $discount,
			'ppn_baru' => $ppn,
			'stse_kat' => $stse_kat,
			'stsregister' => $stsregister,
      'includeongkir'=>$includeongkir,
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
			'fee' => $fee,
      'foto'=>$file_name,
      'cicilan' => $cicilan,
      'dp' => $dp,
			//'jenis_pembayaran' =>$jenis_pembayaran,
			'biaya_pengiriman' =>$biaya_pengiriman,
			'ket' => $ket,
			'garansi' => $garansi,
			'garansifree' => $garansifree,
			'note' => $note,
			'statuslist_detil' =>$statuslist_detil,
		   	'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['kode_produk']);
		$tgltr = isset($datatgl[0]['kode_transaksi']);

				if($obid == $kode_produk && $tgltr == $kode_trans){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Alkesrr/adddetail/'.$kode_trans.'/'.$jenis_listing.'/'.$koper.'');
		}else{
			$result = $this->malkesrr->Save_alkesrrdetil($data);
			$head="UPDATE listingrrhead set  
		                        isi='$isi' 
								WHERE kode_transaksi = '$kode_trans'";
	            $this->db->query($head);
              $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
		
			header('location:'.base_url().'Alkesrr/adddetail/'.$kode_trans.'/'.$jenis_listing.'/'.$koper.'');
		}
		
	}

	public function cetak_alkesproduk(){
		$id=$this->uri->segment(3);
  $this->load->model('malkesrr');
  $this->load->library('Tpdf');                          
        $query['alkes'] = $this->db->get_where('v_rralkes_detail',['iddetilalkesrr'=>$id])->row();
      $this->load->view('alkesrr/detailalkespdfbaru', $query);                         
  }  

  public function cetak_alkesproduk2(){
		$id=$this->uri->segment(3);
  $this->load->model('malkesrr');
  $this->load->library('Tpdf');                          
        $query['alkes'] = $this->db->get_where('v_rralkes_detail',['iddetilalkesrr'=>$id])->row();
      $this->load->view('alkesrr/detailalkespdf', $query);                         
  }  


function simpan_hargaongkir(){
 	    $id=$this->uri->segment(3);
 	    $koper=$this->uri->segment(4);
		$this->load->model('malkesrr');

             // and stsapp_detil='live'

          $prod = $this->db->get_where('v_rralkes_detail',['kode_produk'=>$id])->row();
		  $data_alkes = $this->malkesrr->Getmstwil("where koper='$koper'")->result_array();
         $regional = $this->malkesrr->ongkirreg("where kode_produk='$id' and koper='$koper' order by koper asc")->result_array();
        $kode_transaksi2 =  $prod->kode_transaksi;
		$kode_produk2 =  $prod->kode_produk;
		$koper2 =  $prod->koper;
        $isi = '1';
       
          foreach ($data_alkes as $tr){
        $kode_transaksi =  $prod->kode_transaksi;
		$kode_produk =  $prod->kode_produk;
		$koper =  $prod->koper;
		$kode_wilayah = $tr['kode_wilayah'];
				    
     $hargalama = " INSERT INTO tb_ongkir
		(kode_transaksi, koper, kode_produk, kode_ongkir) 
		
	SELECT '$kode_transaksi', 
	       '$koper',
	       '$kode_produk',
	       '$kode_wilayah'
	        WHERE NOT EXISTS (SELECT *
							  FROM tb_ongkir
							  WHERE kode_ongkir = '$kode_wilayah' 
							  AND kode_produk = '$kode_produk'); 
							  
		  UPDATE tb_ongkir set  kode_ongkir='$kode_wilayah' 
								WHERE kode_ongkir = '$kode_wilayah' 
								AND kode_produk = '$kode_produk'";
		
		
		
	$this->db->query($hargalama);
		
		}

	 redirect('Alkesrr/addongkir/'.$kode_produk2.'/'.$koper2.'');
       
    }

   function update_ongkir(){
      $id=$this->uri->segment(3);
      $koper=$this->uri->segment(4);
    $this->load->model('malkesrr');
       
       $kode_produk2=$_POST['kode_produk2'];
       $kode_transaksi2=$_POST['kode_transaksi2'];
       $jenis_listing2=$_POST['jenis_listing2'];
       $koper2=$_POST['koper2'];
       $koper=$_POST['koper'];
       $kode_transaksi=$_POST['kode_transaksi'];
       $kode_produk=$_POST['kode_produk'];
       $kode_ongkir=$_POST['kode_ongkir'];
       $biaya_kirim=$_POST['biaya_kirim'];
       $flag_ongkir=$_POST['flag_ongkir'];

                    
       for ($x = 0; $x < count($this->input->post('kode_ongkir')); $x++)
     {       
            
     $hargalama = "   
     INSERT INTO tb_ongkir
    (kode_transaksi, koper, kode_produk, kode_ongkir, biaya_kirim, flag_ongkir) 
    
  SELECT '$kode_transaksi[$x]', 
         '$koper[$x]',
         '$kode_produk[$x]',
         '$kode_ongkir[$x]',
         '$biaya_kirim[$x]',
         '$flag_ongkir[$x]'
          WHERE NOT EXISTS (SELECT *
                FROM tb_ongkir
                WHERE kode_ongkir = '$kode_ongkir[$x]' 
                AND kode_produk = '$kode_produk[$x]'); 

      UPDATE tb_ongkir set  kode_ongkir='$kode_ongkir[$x]',biaya_kirim='$biaya_kirim[$x]' ,flag_ongkir='$flag_ongkir[$x]'
                WHERE kode_ongkir = '$kode_ongkir[$x]' 
                AND kode_produk = '$kode_produk[$x]'";
    
  $this->db->query($hargalama);
    
    }

   redirect('Alkesrr/adddetail/'.$kode_transaksi2.'/'.$jenis_listing2.'/'.$koper2.'');
       
    }

function update_ongkir21(){
      $id=$this->uri->segment(3);
      $koper=$this->uri->segment(4);
    $this->load->model('malkesrr');
       
       $kode_produk2=$_POST['kode_produk2'];
       $kode_transaksi2=$_POST['kode_transaksi2'];
       $jenis_listing2=$_POST['jenis_listing2'];
       $koper2=$_POST['koper2'];
       $koper=$_POST['koper'];
       $kode_transaksi=$_POST['kode_transaksi'];
       $kode_produk=$_POST['kode_produk'];
       $kode_ongkir=$_POST['kode_ongkir'];
       $biaya_kirim=$_POST['biaya_kirim'];
       $flag_ongkir=$_POST['flag_ongkir'];

                    
       for ($x = 0; $x < count($this->input->post('kode_ongkir')); $x++)
     {       
            
     $hargalama = "   
     INSERT INTO tb_ongkir
    (kode_transaksi, koper, kode_produk, kode_ongkir, biaya_kirim, flag_ongkir) 
    
  SELECT '$kode_transaksi[$x]', 
         '$koper[$x]',
         '$kode_produk[$x]',
         '$kode_ongkir[$x]',
         '$biaya_kirim[$x]',
         '$flag_ongkir[$x]'
          WHERE NOT EXISTS (SELECT *
                FROM tb_ongkir
                WHERE kode_ongkir = '$kode_ongkir[$x]' 
                AND kode_produk = '$kode_produk[$x]'); 

      UPDATE tb_ongkir set  kode_ongkir='$kode_ongkir[$x]',biaya_kirim='$biaya_kirim[$x]' ,flag_ongkir='$flag_ongkir[$x]'
                WHERE kode_ongkir = '$kode_ongkir[$x]' 
                AND kode_produk = '$kode_produk[$x]'";
    
  $this->db->query($hargalama);
    
    }

   redirect('Alkesrr/updatedetailrr/'.$kode_transaksi2.'/'.$jenis_listing2.'');
       
    }

  public function addongkir(){
		$id=$this->uri->segment(3);
		$kodekirim=$this->uri->segment(4);

		 // if($kodekirim=='1'){
             $this->load->model('malkesrr');                   
        $data['alkes'] = $this->db->get_where('v_rralkes_detail',['kode_produk'=>$id])->row();
        $data['regional'] = $this->malkesrr->ongkirreg("where kode_produk='$id' and koper='$kodekirim' order by koper asc")->result_array();
        
             $this->template->display('alkesrr/addongkir', $data);
		                              
  }  

 
  public function lihatongkir(){
		$kode_produk=$this->uri->segment(3);
		$kodekirim=$this->uri->segment(4);
		 $koders=($this->session->userdata('koders'));
		 $this->load->model('malkesrr');                   
        $data['alkes'] = $this->db->get_where('v_rralkes_detail',['kode_produk'=>$kode_produk])->row();
        $data['ongkir'] = $this->malkesrr->ongkirreg("where kode_produk='$kode_produk' and koper='$kodekirim' order by koper asc")->result_array();
             $this->template->display('alkesrr/lihat_ongkirreg', $data);
          
  }  

 
  function hapus(){
    	$this->load->model('malkesrr');
        $hapus = $this->uri->segment(3);
        $koper= $this->uri->segment(4);
        $result = $this->malkesrr->Hapus('listingrrhead', array('kode_transaksi' => $hapus));
        $result2 = $this->malkesrr->Hapus('rralkes_detail', array('kode_transaksi' => $hapus));
        $result3 = $this->malkesrr->Hapus('tb_ongkir', array('kode_transaksi' => $hapus));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }
        if($result2 == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }
        if($result3 == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Alkesrr');
        }
    }

     function hapusdetil(){
    	$this->load->model('malkesrr');
        $id = $this->uri->segment(3);
        $kodeproduk = $this->uri->segment(4);
        $kode_transaksi= $this->uri->segment(5);
        $koper = $this->uri->segment(6);
        $jenis_listing = $this->uri->segment(7);

          $datatgl = $this->malkesrr->Getalkesdetil("where kode_transaksi='$kode_transaksi' and koper='$koper' ORDER BY iddetilalkesrr")->result_array();

         if(count($datatgl) == 1):

        $this->db->query("UPDATE listingrrhead set isi=' ' where kode_transaksi='$kode_transaksi'");
        $this->malkesrr->Hapus('rralkes_detail', array('iddetilalkesrr' => $id));
          $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
        endif;
        
        if(count($datatgl) > 1):

         $this->db->query("UPDATE listingrrhead set isi='1' where kode_transaksi='$kode_transaksi'");
         $this->malkesrr->Hapus('rralkes_detail', array('iddetilalkesrr' => $id));
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
      endif;
        $result2 = $this->malkesrr->Hapus('tb_ongkir', array('kode_transaksi' => $kode_transaksi));
        // if($result == 1){
           
        // }else{
            // $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            // header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
            //       }
        if($result2 == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
                 }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'Alkesrr/adddetail/'.$kode_transaksi.'/'.$jenis_listing.'/'.$koper.'');
                   }
    }
			
}

