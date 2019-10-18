<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class laporan_po_non_rr extends CI_Controller {

	function __construct() {
        parent::__construct();
        
        $this->load->model('obatreg');
    }

	public function cari_po_non_rr(){
    

				  $namars= $_REQUEST["namars"]; 
				 // $kodis= $_REQUEST["kodis"];
				  $tanggalawal= $_REQUEST["tglawal"]; 
				  $tanggalakhir= $_REQUEST["tglakhir"];
				  $query['get_rs'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
				  //$query['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();


		if ($namars!=''):
          $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where koders='$namars' order by tglpo asc")->result_array();
		endif;       
      
		// if ($kodis!=''):

		if ($tanggalawal!='' && $tanggalakhir!=''):
          $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where (tglpo between '$tanggalawal' and '$tanggalakhir' ) order by tglpo asc")->result_array();
			
		endif;
		
		
         if($namars=='' && $tanggalawal=='' && $tanggalakhir==''):
          $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by tglpo asc")->result_array();  
		
		endif;
		

		$this->template->display('katobat/Laporan_po_non_rr', $query);
 
	} 

	public function cetak_excel_non_rr(){
		
		        //$xl_search= $_POST["excel_search"];
				//$xl_perobat= $_POST["excel_perobat"];
				$namars= $_POST["keyword_koders"]; 	
				  $tanggalawal= $_POST["keyword_tglawal"]; 
				  $tanggalakhir= $_POST["keyword_tglakhir"];
				  $query['get_rs'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
		
		
		if(isset($_POST['excel_search'])){
			//if(isset($_POST['simpan']))
  	  
				  //$query['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();

				if ($namars!=''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where koders='$namars' order by tglpo asc")->result_array();
				endif;      
			  
				// if ($kodis!=''):
				  // $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where supplier='$kodis' order by tglpo asc")->result_array();
				// endif;      
			  
				if ($tanggalawal!='' && $tanggalakhir!=''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where (tglpo between '$tanggalawal' and '$tanggalakhir' ) order by tglpo asc")->result_array();
				endif;
				
				 if($tanggalawal ==''&& $tanggalakhir =='' && $namars ==''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by tglpo asc")->result_array();  
				endif;
		
			    $this->load->view('katobat/expor_detil_non_rr', $query);
		}
		
		if(isset($_POST['excel_perobat'])){
			
  	  
				  //$query['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();

				if ($namars!=''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where koders='$namars' order by tglpo asc")->result_array();
				endif;      
			  
				// if ($kodis!=''):
				  // $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where supplier='$kodis' order by tglpo asc")->result_array();
				// endif;      
			  
				if ($tanggalawal!='' && $tanggalakhir!=''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where (tglpo between '$tanggalawal' and '$tanggalakhir' ) order by tglpo asc")->result_array();
				endif;
				
				 if($tanggalawal ==''&& $tanggalakhir =='' && $namars ==''):
				  $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by tglpo asc")->result_array();  
				endif;
		
			    $this->load->view('katobat/expor_detil_non_rr_obat', $query);
		}
		
		
		
		
		
	 }


	public function cetak_excel_non_rr_obat(){
		
		//$cek = $this->cari_po_non_rr(); 
		
		//$cek['data_produko'] = $this->obatreg->Get_view_po_non_rr()->result_array();
		 $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("order by tglpo asc")->result_array();  

			   	  //$namars= $_POST["keyword_koders"]; 
				 // $kodis= $_POST["keyword_kodis"];
				 // $tanggalawal= $_POST["keyword_tglawal"]; 
				 // $tanggalakhir= $_POST["keyword_tglakhir"];
				 // $query['get_rs'] = $this->obatreg->Get_rs_lap_po_non_rr("order by koders desc")->result_array();
				  //$query['get_supp'] = $this->obatreg->Get_supp_lap_po_non_rr("order by supplier desc")->result_array();

				// if ($namars!=''):
				  // $query['data_produko'] = $this->obatreg->Get_view_detail_po_non_rr("where koders='$namars' order by tglpo asc")->result_array();
				// endif;      
			  
				// if ($kodis!=''):
				  // $query['data_produko'] = $this->obatreg->Get_view_po_non_rr("where supplier='$kodis' order by tglpo asc")->result_array();
				// endif;      
			  
				// if ($tanggalawal!='' && $tanggalakhir!=''):
				  // $query['data_produko'] = $this->obatreg->Get_view_detail_po_non_rr("where (tglpo between '$tanggalawal' and '$tanggalakhir' ) order by tglpo asc")->result_array();
				// endif;
				 // if($tanggalawal ==''&& $tanggalakhir =='' && $namars ==''):
				  // $query['data_produko'] = $this->obatreg->Get_view_detail_po_non_rr("order by tglpo asc")->result_array();  
				// endif;
		
			    $this->load->view('katobat/expor_detil_non_rr_obat', $query);
	 }  
	 
	 


}

?>
