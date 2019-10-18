    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produko2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

	function get_barang()
		
	{
		$this->load->model('produkom');
		$id_produk=$this->input->post('id_produk');
		$data=$this->produkom->get_data_barang_bykode($id_produk);
		echo json_encode($data);
		
	}
	
	function get_pabrik()
		
	{
		$this->load->model('produkom');
		$pabrik_id=$this->input->post('pabrik_id');
		$data=$this->produkom->get_data_pabrik_bykode($pabrik_id);
		echo json_encode($data);
		
	}
	
	function get_prinsipal()
		
	{
		$this->load->model('produkom2');
		$koper=$this->input->post('koper');
		$data=$this->produkom2->get_data_prinsipal_bykode($koper);
		echo json_encode($data);
		
	}

	function get_prinsipalcompare()
		
	{
		$this->load->model('produkom2');
		$idpr2=$this->input->post('idpr2');
		$data=$this->produkom2->get_data_prinsipalcompare_bykode($idpr2);
		echo json_encode($data);
		
	}

	function get_alum21()
		
	{
		$this->load->model('produkom2');
		$koper=$this->input->post('koper');
		$data=$this->produkom2->get_data_alum_bykode($koper);
		echo json_encode($data);
		
	}

	function get_alkes()
		
	{
		$this->load->model('produkom');
		$alkesid=$this->input->post('alkesid');
		$data=$this->produkom->get_data_alkes_bykode($alkesid);
		echo json_encode($data);
		
	}

	function get_obatss()
		
	{
		$this->load->model('produkom2');
		$kode_produk=$this->input->post('kode_produk');
		$data=$this->produkom2->get_data_obats_bykode($kode_produk);
		echo json_encode($data);
		
	}

	function get_alumcss()
		
	{
		$this->load->model('produkom');
		$barangid=$this->input->post('barangid');
		$data=$this->produkom->get_data_alumcs_bykode($barangid);
		echo json_encode($data);
		
	}
		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom2'); 
		$data['data_prod'] = $this->produkom2->Getprodukm("order by idpr2 asc")->result_array();
        $data['data_produko'] = $this->produkom2->Getproduk("order by idpr2 asc")->result_array();
        $data['kode_pabrik']= $this->produkom2->GetKodePrinsp("order by koper ASC")->result_array();
            $data['s_kode']= $this->produkom2->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom2->Gettipe()->result_array();
	    $data['prid'] = $this->produkom2->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('produko2/data_produko2', $data);
	}

        function alum()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$rolesdara=($this->session->userdata('nama_role'));
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
      if($rolesdara=='Direktur Operasional dan Umum'){
		$this->load->model('produkom2'); 
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status ='2' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where  id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		$this->template->display('produko2/tr_alum', $data);
		
	}elseif ($rolesdara=='Kepala Departemen Jangum'){
		$this->load->model('produkom2'); 
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status ='1' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where  id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		$this->template->display('produko2/tr_alum', $data);
		
	}elseif($rolesdara=='Manager Persetujuan dan Perencanaan (jangum)'){
        $this->load->model('produkom2'); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status ='0' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where  id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		$this->template->display('produko2/tr_alum', $data);
		
	}elseif($rolesdara=='Kepala Operasional' ||$rolesdara=='Administrator'){
        $this->load->model('produkom2'); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status is null and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where status ='4' and id_tipe_produk='TP002' order by idtrcom  desc")->result_array();
		$this->template->display('produko2/tr_alum', $data);
		
	}elseif($rolesdara=='Staf Perencanaan dan Persetujuan Alum dan Linen (Jangum)' || $rolesdara=='Staf Perencanaan dan Persetujuan Sarana Penunjang Bangunan (Jangum)'  || $rolesdara=='Administrator' || $rolesdara=='Staf Perencanaan dan Persetujuan (Jangum)'){
        $this->load->model('produkom2');
        $data['nama']=$this->session->userdata('nama');
                $data['cabang'] = $this->session->userdata('cabang');
                $data['data_aprove'] = $this->produkom2->Getaproveview("where (status is null or status='01') and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where status ='4' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $this->template->display('produko2/tr_alum', $data);
				
         }elseif($rolesdara=='Kadep Strategic Procurement / Pengadaan Strategis'){
                     $this->load->model('produkom2'); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status ='82' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		$data['data_reject'] = $this->produkom2->Getaproveview("where status ='4' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		$this->template->display('produko2/tr_alum', $data);
}else{
 $this->load->model('produkom2');
        $data['nama']=$this->session->userdata('nama');
                $data['cabang'] = $this->session->userdata('cabang');
                $data['data_aprove'] = $this->produkom2->Getaproveview("where status ='5' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $data['data_reject'] = $this->produkom2->Getaproveview("where status ='5' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
                $this->template->display('produko2/tr_alum', $data);
}
	}           	
	
               function addtralum()
	{ 
                  $id= $this->uri->segment(3);
                $tgl= $this->uri->segment(4);
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom2'); 
		$data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
		$data['data_prod'] = $this->produkom2->Getprodukm("order by idpr2 asc")->result_array();
        $data['data_alum'] = $this->produkom2->Getproduk("where id_tipe_produk='TP002' and kode_th='$id' and tanggal_tr='$tgl' order by nm_perusahaan asc")->result_array();
        $data['kode_alum']= $this->produkom2->GetKodePrinspalum("where id_tipe_produk='TP002' order by nm_perusahaan ASC")->result_array();
        $data['s_kode']= $this->produkom2->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom2->Gettipe()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('produko2/data_produkalum2', $data);
	}



           function lihattralum()
	{
               $id= $this->uri->segment(3);
		$tgl= $this->uri->segment(4);
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom2'); 
		$data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
		$data['data_prod'] = $this->produkom2->Getproduk("order by idpr2 asc")->result_array();
        $data['data_alum'] = $this->produkom2->Getproduk("where id_tipe_produk='TP002' and kode_th='$id' and tanggal_tr='$tgl' and (statushead='0' or statushead='01' or statushead is null )  order by nm_perusahaan asc")->result_array();
        $data['kode_alum']= $this->produkom2->GetKodePrinsp("where id_tipe_produk='TP002' order by nm_perusahaan ASC")->result_array();
        $data['s_kode']= $this->produkom2->Getskode("order by s_nama ASC")->result_array();
        $data['data_reject'] = $this->produkom2->Getproduk("where id_tipe_produk='TP002' order by nm_perusahaan asc")->result_array();
	    $data['tipe_produk']= $this->produkom2->Gettipe()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('produko2/v_produkalum', $data);
	}

 function lihattralumhistori()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
              
		$this->load->model('produkom2'); 
		$data['data_prod'] = $this->produkom2->Getprodukout("order by idpr2 asc")->result_array();
       	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('produko2/v_produkalumhistori', $data);
	}
	
	function lihattralkeshistori()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
              
		$this->load->model('produkom2'); 
		$data['data_prod'] = $this->produkom2->Getprodukouts("order by idpr2 asc")->result_array();
       	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('produko2/v_produkalkeshistoris', $data);
	}


	public function ajax_listalumviewhistori()
    {
    	$this->load->model('malumviewhistori');
        $list = $this->malumviewhistori->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalum) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.$produkalum->nm_perusahaan.'</center>';
             $row[] = '<center>'.$produkalum->nama_produk.'</center>';
            $row[] = '<center>'.$produkalum->tanggal_tr.'</center>';
            $row[] = '<center>'.$produkalum->catatanheadrevisi.'</center>';
            $row[] = '<center>'.$produkalum->cttndetilrevisi.'</center>';
                        	
           $row[] = '<center><a data-toggle="modal" href="#modal_edit'.$produkalum->iddetilalum.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search">&nbspview</i></a><center>';
           $kode=($this->session->userdata('koderole'));
        if($kode !='10' and $kode !='52' and $kode !='53' and $kode !='82'):
           $row[] = '<center> <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="editoutstanding/'.$produkalum->iddetilalum.'"><i class="glyphicon glyphicon-edit">&nbspupdate</i></a></center>
                    ';
                endif;
           $row[] = '<center><a data-toggle="modal" href="#modal_edits'.$produkalum->iddetilalum.'" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok">&nbspapprove</i></a><center>';
           $kode=($this->session->userdata('koderole'));
        if($kode !='66' and $kode !='72' and $kode !='74'):
           $row[] = '<center><a data-toggle="modal" href="#modal_editss'.$produkalum->iddetilalum.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove">&nbspreject</i></a><center>';
         endif;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->malumviewhistori->count_all(),
                        "recordsFiltered" => $this->malumviewhistori->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	
	public function ajax_listalkesviewhistori()
    {
    	$this->load->model('malkesviewhistori');
        $list = $this->malkesviewhistori->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalkes) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.$produkalkes->nm_perusahaan.'</center>';
             $row[] = '<center>'.$produkalkes->nama_produk.'</center>';
            $row[] = '<center>'.$produkalkes->tanggal_tr.'</center>';
			$row[] = '<center>'.$produkalkes->catatanheadrevisi.'</center>';
            $row[] = '<center>'.$produkalkes->cttndetilrevisi.'</center>';
                        	
           $row[] = '<center><a data-toggle="modal" href="#modal_edit'.$produkalkes->iddetailalkes.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search">&nbspview</i></a><center>';
       $kode=($this->session->userdata('koderole'));
		if($kode =='75' or $kode =='76'):
           $row[] = '<center> <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="editoutstanding_alkes/'.$produkalkes->iddetailalkes.'"><i class="glyphicon glyphicon-edit">&nbspupdate</i></a></center>
                    ';
                endif;
		$kode=($this->session->userdata('koderole'));
		if($kode !='75' or $kode !='76'):
           $row[] = '<center><a data-toggle="modal" href="#modal_edits'.$produkalkes->iddetailalkes.'" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok">&nbspapprove</i></a><center>';
           endif;
		   $kode=($this->session->userdata('koderole'));
        if($kode !='75' or $kode !='76'):
           $row[] = '<center><a data-toggle="modal" href="#modal_editss'.$produkalkes->iddetailalkes.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove">&nbspreject</i></a><center>';
         endif;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->malkesviewhistori->count_all(),
                        "recordsFiltered" => $this->malkesviewhistori->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
	
	
	function lihattralumlap()
	{
                $id= $this->uri->segment(3);
		$tgl= $this->uri->segment(4);
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom2'); 
		$data['tr'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
		$data['data_prod'] = $this->produkom2->Getproduk("order by idpr2 asc")->result_array();
        $data['data_alum'] = $this->produkom2->Getproduk("where id_tipe_produk='TP002' and kode_th='$id' and tanggal_tr='$tgl' and (statushead='0' or statushead='01' or statushead is null or statushead='5')  order by nm_perusahaan asc")->result_array();
        $data['kode_alum']= $this->produkom2->GetKodePrinsp("where id_tipe_produk='TP002' order by nm_perusahaan ASC")->result_array();
        $data['s_kode']= $this->produkom2->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom2->Gettipe()->result_array();
	   	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		

		$this->template->display('produko2/v_produkalumlap', $data);
	}

                         


                 function cetaklum()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$roles=($this->session->userdata('nama_role'));

        $this->load->model('produkom2'); 
		$data['data_aprove'] = $this->produkom2->Getaproveview("where status ='3' and id_tipe_produk='TP002' order by idtrcom desc")->result_array();
		 $data['kode_alum']= $this->produkom2->GetKodePrinsp("where id_tipe_produk='TP002' order by nm_perusahaan ASC")->result_array();
		$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->template->display('produko2/v_lapalum', $data);

	}

	function alkes()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));

		$this->load->model('produkom'); 
		$data['data_prod'] = $this->produkom->Getprodukm("order by idpr asc")->result_array();
        $data['data_produko'] = $this->produkom->Getproduk("where pabrik_id <>'' order by idpr asc")->result_array();
        $data['data_alkes'] = $this->produkom->Getproduk("where alkesid <>'' order by idpr asc")->result_array();
        $data['data_alum'] = $this->produkom->Getproduk("where alumid <>'' order by idpr asc")->result_array();
        $data['kode_alkes']= $this->produkom->GetKodealkes("where alkesid not in (select alkesid from produko  where alkesid !='') and alkesid !='-' order by alkesid ASC")->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['dd_prinsipal'] = $this->produkom->dd_prinsipal();
        $data['prinsipal_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';			

		$this->template->display('produko/data_produkalkes', $data);
	}

	public function compare()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        
		$this->load->model('produkom');   
		$data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
		$data['data_compare'] = $this->produkom->Ambilcompare(" order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		
		// $data['dd_provinsi'] = $this->provinsi_model->dd_prinsipal();
        // $data['provinsi_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';	

		$this->template->display('produko/compare_produko', $data);
	}

	function periode()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        
		$this->load->model('produkom');   
		if (isset($_POST["tanggal_awal"])&&isset($_POST["tanggal_akhir"])) {
                        $tanggal_awal = $_POST["tanggal_awal"];
                       $tanggal_akhir = $_POST["tanggal_akhir"];
		 $data['compare'] = $this->produkom->Ambilprodukm("where tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' order by idpr asc")->result_array();     
        $data['data_compare'] = $this->produkom->GetCompare("where tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['tanggal_awal'] = $tanggal_awal;
		}else{
       $data['compare'] = $this->produkom->Ambilprodukm("order by idpr asc")->result_array();     
        $data['data_compare'] = $this->produkom->GetCompare("order by idpr asc")->result_array();
        $data['pabrik_nama']= $this->produkom->GetVproduko()->result_array();
	    $data['s_kode']= $this->produkom->Getskode("order by s_nama ASC")->result_array();
	    $data['tipe_produk']= $this->produkom->Gettipe()->result_array();
	    $data['prid'] = $this->produkom->code_otomatis();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['tanggal_awal'] = $tanggal_awal;
        
		}			
		// $data['dd_provinsi'] = $this->provinsi_model->dd_prinsipal();
        // $data['provinsi_selected'] = $this->input->post('prinsipal') ? $this->input->post('prinsipal') : '';	

		$this->template->display('produko/v_pertanggal', $data);
	}


	
    function tampil()
	{

                 $id= $this->uri->segment(3);
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
        $data['data_prod'] = $this->produkom->Getprodukm("where idpr=$id order by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_prod', $data);
	}
	
	    function tampil_compare($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah < E-Cat' order  by idpr asc")->result_array();
	    $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
	   function tampil_compare2($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah = E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
		function tampil_compare3($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah < 10 % E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
			function tampil_compare4($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom');
		
        $data['prod'] = $this->db->get_where('v_produko',['idpr'=>$id])->row(); 
		$data['tampil_kurang_ecat'] = $this->produkom->Getprodukm("where idpr=$id AND tipe_harga='Jumlah > 10 % E-Cat' order  by idpr asc")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		

		$this->template->display('produko/tampil_kurang_ecat', $data);
	}
	
	
	
	function addabk()
	{
		$this->load->model('anggaranbiayaklinik');
		$this->load->model('model');
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'optkebutuhan' => $this->anggaranbiayaklinik->GetKebutuhan()->result_array(),		
			'kd_kebutuhan' => $this->anggaranbiayaklinik->GetAnggaranBiayaKlinik()->result_array(),
			

		);
		
		$this->template->display('produko/add_produko', $data);
	}

	function adddetail()
	{
               $id= $this->uri->segment(3);
	       $pabrikid= $this->uri->segment(4);
		$this->load->model('produkom2');
			
                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produko2',['idpr2'=>$id])->row(),
			 'data_prod' => $this->produkom2->Getprodukm("order by idpr2 asc")->result_array(),
			 'data_prods' => $this->produkom2->Getprodukms("where koded_prod='$id'  order by nama_produk asc")->result_array(),
             'data_prods2' => $this->produkom2->Getprodukms2("where koded_prod='$id' order by nama_produk asc")->result_array(),
			 'obat' => $this->produkom2->Getobatcobauy("WHERE koper='$pabrikid' order by createddate desc")->result_array(),
			  'alum' => $this->produkom2->Getobatcobaalum("where koper='$pabrikid' and tipe_produk='TP002' order by cdate desc")->result_array(),
                           'tipe_harga' => $this->produkom2->Gettipeharga("order by idtipeharga asc")->result_array(),
              'distributor' => $this->produkom2->Getkode_s("where pabrik_id='$pabrikid'")->result_array(),

);
			
		
		$this->template->display('produko2/add_produks2', $data);
	}


          function adddetail_alumc()
	{
                   $id= $this->uri->segment(3);
		   $dara= $this->uri->segment(4);
		$this->load->model('produkom2');
		                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produkoalum',['idpr2'=>$id])->row(),
			 'data_prod' => $this->produkom2->Getprodukalum("order by idpr2 asc")->result_array(),
			 'data_prods' => $this->produkom2->Getprodukalumdetail("where kode_tr='$id' and (statusdetil='0' or statusdetil is null)  order by iddetilalum asc")->result_array(),
			 'alum' => $this->produkom2->Getobatcobauy("WHERE  koper='$dara' and  tipe_produk='TP002' order by createddate desc")->result_array(),
			  'persent' => $this->produkom2->Getpersent()->result_array(),
			   'regional' => $this->produkom2->Getregional()->result_array(),
			);
		  
		
		$this->template->display('produko2/add_produkalum2', $data);
	}

function adddetail_alkesc($id,$pabrikid)
	{
		$this->load->model('produkom');
			
                          
		$data = array(
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),	
			 'prod' => $this->db->get_where('v_produko',['idpr'=>$id])->row(),
			 'data_prod' => $this->produkom->Getprodukm("order by idpr asc")->result_array(),
			 'data_prods' => $this->produkom->Getprodukm("where idpr=$id order by idpr asc")->result_array(),
			 'obat' => $this->produkom->Getobatcobauy("WHERE pabrikid='$pabrikid' order by cdate desc")->result_array(),
			  'alum' => $this->produkom->Getobatcobaalum("order by cdate desc")->result_array(),
);
		  
				
		
		$this->template->display('produko/add_produko', $data);
	}

	function aprove_detail($id)
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom2');
		 $data['prod'] = $this->db->get_where('tr_print_compare',['idtrcom'=>$id])->row();
	  $data['data_aprove'] = $this->produkom2->Ambilcompare("where kode_tr='$id' order by createdate desc")->result_array();
	  $data['kode_pabrik']= $this->produkom2->GetKodePrinscount("where koper not in(select koper from tb_compare2 where kode_tr='$id') and koper is not null  order by idpr2 ASC")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');			
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();			

		$this->template->display('produko2/v_tr_print_obat2', $data);
	}

	function hapusdetailaprove($kode = 1,$kd_pd=0){
		$kode_tr=$kd_pd;
		$this->load->model('produkom2');	
	$result = $this->produkom2->Hapus('tb_compare2', array('idcompare2' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko2/aprove_detail/'.$kode_tr.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko2/aprove_detail/'.$kode_tr.'');
		}
	
}



	function aprove()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom2');

		if($roles=='Direktur Operasional dan Umum'){
	  $data['data_aprove'] = $this->produkom2->Getaprove("where status=1 order by createdate desc")->result_array();
	  $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();			
		}elseif ($roles=='Kepala Departemen'){
        $data['data_aprove'] = $this->produkom2->Getaprove("where status is null order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();		

		}else{
			 $data['data_aprove'] = $this->produkom2->Getaprove("where status is null order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();		

		}

		$this->template->display('produko2/aprove_frmsi2', $data);
	}

function aprove_selesai()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom2');

		
	   $data['data_aprove'] = $this->produkom2->Getaprove("where status=2 order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();		

		

		$this->template->display('produko2/selesai2', $data);
	}

	function aprove_kadep()
	{
		$namars=($this->session->userdata('namars'));
		$nama=($this->session->userdata('nama'));
		$roles=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('produkom2');

		
	   $data['data_aprove'] = $this->produkom2->Getaprove("where status=1 order by createdate desc")->result_array();
	    $data['data_ttd'] = $this->model->AmbilDataMasterTtd("where role='$roles' and nama_user='$nama' ")->result_array();
      	$data['nama']=$this->session->userdata('nama');	
      	$data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$data['compare'] = $this->produkom2->Ambilprodukm("order by idpr2 asc")->result_array();     
		$data['data_compare'] = $this->produkom2->Ambilcount(" where koper is not null order by idpr2 asc")->result_array();		

		

		$this->template->display('produko2/selesai2', $data);
	}

	function savedata_aprove(){
		$this->load->model('produkom2');
		
		$tanggal = $_POST['tanggal'];
		$tanggal_obat = $_POST['tanggal_obat'];
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->produkom2->Getaprove("where tanggal='$tanggal'")->result_array();
		$data = array(	
			'tanggal'=>$tanggal,
			'tanggal_obat'=>$tanggal_obat,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		 $pbid = isset($datatgl[0]['tanggal']);
		
		if($pbid == $tanggal){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Tanggal tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko2/aprove');
		}else{
		 
		
		$result = $this->produkom2->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/aprove');
		}
	}

            function savedata_aprovealum(){
		$this->load->model('produkom2');
		
		$tanggal = $_POST['tanggal'];
		$id_tipe_produk = $_POST['id_tipe_produk'];		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
                  $datatgl = $this->produkom2->Getaprove("where tanggal='$tanggal' and id_tipe_produk='$id_tipe_produk'")->result_array();
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
			header('location:'.base_url().'produko2/alum');
		}else{
		 
		
		$result = $this->produkom2->Simpanaprove($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/alum');
		}
	}

               
	function savedatas(){
		$this->load->model('produkom2');
		
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];
			
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'id_tipe_produk' => $id_tipe_produk,
			'koper' => $koper,
			'kodis' => $kodis,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->produkom2->Simpan('produko2', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko2');
		}		
	}

	function savedatas_alum(){
		$this->load->model('produkom2');
		
		$id_tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper'];
                $tanggal_tr = $_POST['tanggal_tr'];
		$kode_th = $_POST['kode_th'];
		$statushead='0';
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

                      $datatgl = $this->produkom2->Getproduko2("where koper='$koper' and tanggal_tr='$tanggal_tr'")->result_array();

		$data = array(	
			'id_tipe_produk' => $id_tipe_produk,
			'koper' => $koper,
                       'statushead' => $statushead,
                       'tanggal_tr' => $tanggal_tr,
			'kode_th' => $kode_th,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$pbid = isset($datatgl[0]['koper']);
		 $tgl = isset($datatgl[0]['tanggal_tr']);
		
		if($pbid == $koper && $tgl == $tanggal_tr){
			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
		}else{
		 
		
		$result = $this->produkom2->Simpanaproduko2($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
		}
	}

	function savedatas_alkes(){
		$this->load->model('produkom');
		
		$prid = $_POST['prid'];
		$tipe_produk = $_POST['tipe_produk'];
		$pabrik_id = $_POST['pabrik_id'];
		$s_kode = $_POST['s_kode'];
		$nama_pt = $_POST['nama_pt'];
		$pabriknama = $_POST['pabriknama'];
		$alumid = $_POST['alumid'];
		$distalumid = $_POST['distalumid'];
		$pt_alum = $_POST['pt_alum'];
		$alumnama = $_POST['alumnama'];
		$alkesid = $_POST['alkesid'];
		$distalkesid = $_POST['distalkesid'];
		$pt_alkes = $_POST['pt_alkes'];
		$alkesnama = $_POST['alkesnama'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

		$data = array(	
			'prid' => $prid,
			'tipe_produk' => $tipe_produk,
			'pabrik_id' => $pabrik_id,
			'nama_pt' => $nama_pt,
			's_kode' => $s_kode,
			'pabriknama' => $pabriknama,
			'alumid' => $alumid,
			'pt_alum' => $pt_alum,
			'distalumid' => $distalumid,
			'alumnama' => $alumnama,
			'alkesid' => $alkesid,
			'pt_alkes' => $pt_alkes,
			'distalkesid' => $distalkesid,
			'alkesnama' => $alkesnama,
					
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$result = $this->produkom->Simpan('produko', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/alkes');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko/alkes');
		}		
	}

	function savedata(){
		$this->load->model('produkom2');
		
		$koded_prod = $_POST['koded_prod'];
		$kodis = $_POST['kodis'];
		$koper = $_POST['koper'];
		$nama_produk = $_POST['nama_produk'];
		$kode_produk = $_POST['kode_produk'];
		$deskripsi = $_POST['deskripsi'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$discount = $_POST['discount'];
			
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
            $datatgl = $this->produkom2->Getdetail("where kode_produk='$kode_produk'")->result_array();
            
		$data= array(	
			'koded_prod' => $koded_prod,
			'nama_produk' => $nama_produk,
			'kode_produk' => $kode_produk,
			'tipe_harga' => $tipe_harga,
			'koper' => $koper,
			'harga' => $harga,
            'kodis' => $kodis,
			'deskripsi' => $deskripsi,
			'discount' => $discount,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['kode_produk']);

				if($obid == $kode_produk){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');
		}else{
			$result = $this->produkom2->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');
		}
		
	}
                 function updateaprovecek(){
     
              $this->load->model('produkom2');
   
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

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedara($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Reset data '.$tanggal.' BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Reset data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}
	}

function updaterejectdetil2(){
     
     $this->load->model('produkom2');
    
        date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

        $iddetilalum=$_POST['iddetilalum'];
		$kode_tr = $_POST['kode_tr'];
		$koper = $_POST['koper'];
		$kode_th = $_POST['kode_th'];			
		$statusdetil=$_POST['statusdetil'];
		$cttndetilrevisi=$_POST['cttndetilrevisi'];
		

	$data = array(
	'iddetilalum' =>$this->input->post('iddetilalum'),
	'statusdetil'=>$statusdetil,
	'cttndetilrevisi'=>$cttndetilrevisi,
	'updateby' =>  $this->session->userdata('nama'),
	'updatdate' =>$waktusaatini,
       );

	$dataanisa = array(
	'idpr2' =>$this->input->post('kode_tr'),
	'statushead'=>$statusdetil,
			);


	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetailalum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}
	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedaraanisa($dataanisa);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}
	}

	function updaterejectdetil21(){
     
     $this->load->model('produkom2');
    
        date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

        $iddetilalum=$_POST['iddetilalum'];
		$kode_tr = $_POST['kode_tr'];
		$koper = $_POST['koper'];
		$kode_th = $_POST['kode_th'];			
		$statusdetil=$_POST['statusdetil'];
		$cttndetilrevisi=$_POST['cttndetilrevisi'];
		

	$data = array(
	'iddetilalum' =>$this->input->post('iddetilalum'),
	'statusdetil'=>$statusdetil,
	'cttndetilrevisi'=>$cttndetilrevisi,
	'updateby' =>  $this->session->userdata('nama'),
	'updatdate' =>$waktusaatini,
       );

	
	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetailalum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}
	}


	function updateaprovedetil2(){
     
     $this->load->model('produkom2');
    
        date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	

        $iddetilalum=$_POST['iddetilalum'];
		$kode_tr = $_POST['kode_tr'];
		$koper = $_POST['koper'];
		$kode_th = $_POST['kode_th'];			
		$statusdetil=$_POST['statusdetil'];
			

	$data = array(
	'iddetilalum' =>$this->input->post('iddetilalum'),
	'statusdetil'=>$statusdetil,
	'updateby' =>  $this->session->userdata('nama'),
	'updatdate' =>$waktusaatini,
       );

 $kode=($this->session->userdata('koderole'));
        if($kode =='10'):
	$dataanisa = array(
	'idpr2' =>$this->input->post('kode_tr'),
	'statushead'=>$statusdetil,
			);
     endif;
	
	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetailalum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}
	 $kode=($this->session->userdata('koderole'));
        if($kode =='10'):
	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedaraanisa($dataanisa);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data  BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}
	endif;
	}

	  function updaterejecthead(){
     
              $this->load->model('produkom2');
   
	    $idpr2=$_POST['idpr2'];
	    $tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['statushead'];
        $kode_th=$_POST['kode_th'];
         $catatanheadrevisi=$_POST['catatanheadrevisi'];
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'tanggal_tr' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'statushead'=>$status,
	'catatanheadrevisi'=>$catatanheadrevisi,

		);

	$dataanisa = array(
	'kode_tr' =>$this->input->post('idpr2'),
	'statusdetil'=>$status,
			);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedaraanisa($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Reset data '.$tanggal.' BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Reset data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}
$this->load->model('produkom2');
	$hasil2 = $this->produkom2->Updatedaraanisadetil($dataanisa);
	if($hasil2>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data '.$tanggal.' BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}
	}

	 function updaterejecthead2(){
     
              $this->load->model('produkom2');
   
	    $idpr2=$_POST['idpr2'];
	    $tanggal=$_POST['tanggal'];
		$id_tipe_produk=$_POST['id_tipe_produk'];
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
        $status=$_POST['statushead'];
        $kode_th=$_POST['kode_th'];
         $catatanheadrevisi=$_POST['catatanheadrevisi'];
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'tanggal_tr' =>$this->input->post('tanggal'),
	'id_tipe_produk' =>$this->input->post('id_tipe_produk'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'statushead'=>$status,
	'catatanheadrevisi'=>$catatanheadrevisi,

		);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedaraanisa($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Reset data '.$tanggal.' BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Reset data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralum/'.$kode_th.'/'.$tanggal.'');
	}
	}




function savedata_alkesc(){
		$this->load->model('produkom');
		
		$koded_prod = $_POST['koded_prod'];
		$jenis_produk = $_POST['jenis_produk'];
		$produko = $_POST['produko'];
		$produkom = $_POST['produkom'];
		$obatid = $_POST['obatid'];
		$alkes = $_POST['alkes'];
		$tipe_harga = $_POST['tipe_harga'];
		$harga = $_POST['harga'];
		$pabrikid = $_POST['pabrikid'];
		$alumid = $_POST['alumid'];
		$alumpbkid = $_POST['alumpbkid'];
		$alkesid = $_POST['alkesid'];
		$alkespbkid = $_POST['alkespbkid'];
		$hapus = 0;	
		
		
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	
             $waktu =date("Y-m-d");
        $datatgl = $this->produkom->Getdetail("where alkespbkid='$alkespbkid'")->result_array();
            
            $data= array(	
			'koded_prod' => $koded_prod,
			'jenis_produk' => $jenis_produk,
			'produko' => $produko,
			'obatid' => $obatid,
			'alumid' => $alumid,
			'alumpbkid' => $alumpbkid,
			'alkesid' => $alkesid,
			'alkespbkid' => $alkespbkid,
			'produkom' => $produkom,
			'alkes' => $alkes,
			'tipe_harga' => $tipe_harga,
			'pabrikid' => $pabrikid,
			 'harga' => $harga,
			  'hapus' => $hapus,
			'createdate' => $waktusaatini,
			'tanggal' => $waktu,
			'createby' =>  $this->session->userdata('nama'),			
			);

		
		
		
		$obid = isset($datatgl[0]['alkespbkid']);

				if($obid == $alkespbkid){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');
		}else{
			$result = $this->produkom->Save_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko/adddetail_alkesc/'.$koded_prod.'/'.$alkesid.'');
		}
		
	}

function savedata_alumc(){
		$this->load->model('produkom2');
		
		$kode_tr = $_POST['kode_tr'];
               $kode_th = $_POST['kode_th'];
		$koper = $_POST['koper'];
               $garansi = $_POST['garansi'];
		$ket = $_POST['ket'];
                 $contact = $_POST['contact'];
		$kode_regional = $_POST['kode_regional'];
		$kode_produk = $_POST['kode_produk'];
		
		$harga_lama = $_POST['harga_lama'];
		$harga_baru = $_POST['harga_baru'];
		$harga_excppn = $_POST['harga_excppn'];
		$harga_incppn = $_POST['harga_incppn'];
		$prensentase = $_POST['prensentase'];
		
		
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
		
		$statusdetil='0';
		$ket = $_POST['ket'];
		$garansifull = $_POST['garansifull'];
		//$garansi_ket = $_POST['garansi_ket'];
		// $garansi = $_POST['garansifull'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
		$contact = $_POST['contact'];				
		
        $datatgl = $this->produkom2->Getdetailalum("where kode_produk='$kode_produk' and kode_tr='$kode_tr' and kode_regional='$kode_regional'")->result_array();
            
		$data= array(	
			'kode_tr' => $kode_tr,
                         'kode_th' => $kode_th,
			'koper' => $koper,
                        'garansi' => $garansi,
			'ket' => $ket,
            'contact' => $contact,
			'kode_regional' => $kode_regional,
			'kode_produk' => $kode_produk,
			'statusdetil' => $statusdetil,
			'harga_lama' => $harga_lama,
			'harga_baru' => $harga_baru,
			'harga_excppn' => $harga_excppn,
			'harga_incppn' => $harga_incppn,
			'prensentase' => $prensentase,
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
			'harga_incppnfee' => (($harga_incppn*$prensentase)/100)+$harga_incppn,
			'nominal1' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase1/100,
			'nominal2' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase2/100,
			'nominal3' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase3/100,
			'nominal4' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase4/100,
			'nominal5' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase5/100,
			
			
			'garansifull' => $garansifull,
			'garansifree' => $garansifree,
			'note' => $note,
			
			'createby' =>  $this->session->userdata('nama'),			
			);

				
		
		$obid = isset($datatgl[0]['kode_produk']);
                $kdtr = isset($datatgl[0]['kode_tr']);
               $kdrg = isset($datatgl[0]['kode_regional']);

				if($obid == $kode_produk && $kdtr==$kode_tr && $kdrg==$kode_regional){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Data tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
		}else{
			$result = $this->produkom2->Savealum_db1($data);

		$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
		}
		
	}	


	
	function savedata_compare(){
		$this->load->model('produkom2');
		
		$idpr2 = $_POST['idpr2'];
		$nm_perusahaan = $_POST['nm_perusahaan'];
		$kode_tr = $_POST['kode_tr'];
		$kodis = $_POST['kodis'];
		$harga_kecil_e_cat = $_POST['harga_kecil_e_cat'];
		$harga_sama_e_cat = $_POST['harga_sama_e_cat'];
		$harga_dibawahten = $_POST['harga_dibawahten'];
		$harga_diataten = $_POST['harga_diataten'];
		$foi= $_POST['foi'];
		$mou_jkn = $_POST['mou_jkn'];
		$pks_renewal = $_POST['pks_renewal'];
		$koper = $_POST['koper'];
		$tgl_obat = $_POST['tgl_obat'];

		
		
		date_default_timezone_set("Asia/Jakarta");
		$waktusaatini =date("Y-m-d H:i:s");	
             

             
		$data= array(	
			'idpr2' => $idpr2,
			'nm_perusahaan' => $nm_perusahaan,
			'kode_tr' => $kode_tr,
			'tgl_obat' => $tgl_obat,
			'kodis' => $kodis,
			'koper' => $koper,
			'harga_kecil_e_cat' => $harga_kecil_e_cat,
			'harga_sama_e_cat' => $harga_sama_e_cat,
			'harga_dibawahten' => $harga_dibawahten,
			'harga_diataten' => $harga_diataten,
			'foi' => $foi,
			'mou_jkn' => $mou_jkn,
			'pks_renewal' => $pks_renewal,
			'createdate' => $waktusaatini,
			'createby' =>  $this->session->userdata('nama'),			
			);

				
		
		$result = $this->produkom2->Simpan('tb_compare2', $data);
		
		if($result == 1){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data BERHASIL dilakukan.Terima Kasih</strong></div>");
			header('location:'.base_url().'produko2/aprove_detail/'.$kode_tr.'');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'produko2/aprove_detail/'.$kode_tr.'');
		}		
		
	}



	function editproduko($kode=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Ambilprodukm("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->produkom2->Ambilprodukm("where idpr2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'prins' => $this->produkom2->GetKodePrinsp()->result_array(),
		'for_prins' => $for_prins,
		'kodis'=> $tampung[0]['kodis'],
		// 'createby' => $tampung[0]['createby'],
		// 'createdate' => $tampung[0]['createdate'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],	
	);

	
	$this->template->display('produko2/edit_produko2', $data);

	}


	function updateprod(){
     
     $this->load->model('produkom2');

		$idpr2=$_POST['idpr2'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		$kodis = $_POST['kodis'];		
		// $createby = $_POST['createby'];
		// $createdate = $_POST['createdate'];
		
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'id_tipe_produk' =>$tipe_produk,
	'koper' => $this->input->post('koper'),
	'kodis' =>$this->input->post('kodis'),
 //    'createby' => $this->input->post('createby'),
	// 'createdate' => $this->input->post('createdate'),
	// 'updateby' =>  $this->session->userdata('nama'),
	// 'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updateprodukm($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2');
	}
	}

            function editprodukoalum($kode=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Ambilprodukm("where idpr2 ='$kode'")->result_array();
    
    $for_prins = array();
		foreach($this->produkom2->Ambilprodukm("where idpr2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['koper'];
		}

		

	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'prins' => $this->produkom2->GetKodePrinspalum("where id_tipe_produk='TP002'")->result_array(),
		'for_prins' => $for_prins,
		'tanggal_tr'=> $tampung[0]['tanggal_tr'],
		'kode_th'=> $tampung[0]['kode_th'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],	
	);

	
	$this->template->display('produko2/edit_produkoalum2', $data);

	}


	function updateprodalum(){
     
     $this->load->model('produkom2');

		$idpr2=$_POST['idpr2'];
		$tipe_produk = $_POST['tipe_produk'];
		$koper = $_POST['koper'];
		$tanggal_tr = $_POST['tanggal_tr'];	
		$kode_th = $_POST['kode_th'];			
				
	$data = array(
	'idpr2' =>$this->input->post('idpr2'),
	'id_tipe_produk' =>$tipe_produk,
	'koper' => $this->input->post('koper'),
	'tanggal_tr' => $this->input->post('tanggal_tr'),
	'kode_th' =>$this->input->post('kode_th'),
 	);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updateprodukm($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
	}
	}


	function hapusprod($kode = 1){
	$this->load->model('produkom2');	
	$result = $this->produkom2->Hapus('produko2', array('idpr2' => $kode));
	$result = $this->produkom2->Hapus('tb_detail_prod2', array('koded_prod'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko2');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2');
	}
	}
         
            function hapustralum($kode = 1){
	$this->load->model('produkom2');	
	$result = $this->produkom2->Hapus('tr_print_compare', array('idtrcom' => $kode));
	$result = $this->produkom2->Hapus('produko2', array('kode_th' => $kode));
	$result = $this->produkom2->Hapus('tb_detilalum', array('kode_th'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}
	}

	function hapusprodalum($kode = 1,$kdth=0,$tgl=0){
	$this->load->model('produkom2');	
	$kode_th=$kdth;
	$tanggal_tr=$tgl;
	$result = $this->produkom2->Hapus('produko2', array('idpr2' => $kode));
	$result = $this->produkom2->Hapus('tb_detilalum', array('kode_tr'=> $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/addtralum/'.$kode_th.'/'.$tanggal_tr.'');
	}
	}

	function hapusdetail($kode = 1,$kd_pd=0,$pbkid=0){
		$koded_prod=$kd_pd;
		$koper=$pbkid;
	$this->load->model('produkom2');	
	$result = $this->produkom2->Hapus('tb_detail_prod2', array('iddetailprod2' => $kode,'koded_prod' => $kd_pd,'koper' => $pbkid));
	
			if($kd_pd=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');
		}
	
}

function hapusdetailalum($kode = 1,$kd_pd=0,$alid=0){
		$kode_tr=$kd_pd;
		$koper=$alid;
	$this->load->model('produkom2');	
	$result = $this->produkom2->Hapus('tb_detilalum', array('iddetilalum' => $kode));
	
			if($kode=='' ){

			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan.Terima Kasih.</strong></div>");
			header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');

		}else{
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
		}
	
}

	

	function editabks($kode=0,$koper=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Getdetail("where iddetailprod2 ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->produkom2->Getdetail("where iddetailprod2 = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}
                  $for_harga = array();
		foreach($this->produkom2->Getprodukms2("where iddetailprod2 = '$kode' ")->result_array() as $hargas){
			$for_harga[] = $hargas['tipe_harga'];
		}
    
	$data = array(

		'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetailprod2' => $tampung[0]['iddetailprod2'],	
		'koded_prod' => $tampung[0]['koded_prod'],		
		'kodis'=> $tampung[0]['kodis'],
		'prins' => $this->produkom2->Getobatcobauy("WHERE koper='$koper'")->result_array(),
		'for_prins' => $for_prins,
		'tanggal'=> $tampung[0]['tanggal'],
		'koper' => $tampung[0]['koper'],
		'nama_produk' => $tampung[0]['nama_produk'],
		'hargas' => $this->produkom2->Gettipeharga()->result_array(),
		'for_harga' => $for_harga,
		'harga' => $tampung[0]['harga'],
        'deskripsi' => $tampung[0]['deskripsi'],
		'discount' => $tampung[0]['discount'],
		);

	
	$this->template->display('produko2/edit_detail2', $data);	
}
	function updateabksd(){
     
     $this->load->model('produkom2');
     // $data_abk = $this->anggaranbiayaklinik->Getdetail("where iddetacara ='$kode'")->result_array();

	    $iddetailprod2=$_POST['iddetailprod2'];
		$koded_prod = $_POST['koded_prod'];
		$koper = $_POST['koper'];
		$nama_produk = $_POST['nama_produk'];
		$kode_produk = $_POST['kode_produk'];	
		$kodis = $_POST['kodis'];
		$tanggal = $_POST['tanggal'];
		$tipe_harga = $_POST['tipe_harga'];	
		$harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];	
		$discount = $_POST['discount'];
			
		
		

	$data = array(
	'iddetailprod2' =>$this->input->post('iddetailprod2'),
	'koded_prod' =>$this->input->post('koded_prod'),
	'koper' =>$this->input->post('koper'),
	'nama_produk' => $this->input->post('nama_produk'),
	'kodis' =>$this->input->post('kodis'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'tanggal' =>$this->input->post('tanggal'),
	'tipe_harga' =>$this->input->post('tipe_harga'),
	'harga' =>$this->input->post('harga'),
     'deskripsi' =>$this->input->post('deskripsi'),
	'discount' =>$this->input->post('discount'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' => date("Y-m-d H:i:s"),
	);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetail($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail/'.$koded_prod.'/'.$koper.'');
	}
	}

        function editabksalum($kode=0,$koper=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Getdetailalum("where iddetilalum ='$kode'")->result_array();

    $for_prins = array();
		foreach($this->produkom2->Getdetailalum("where iddetilalum = '$kode' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		 $for_reg = array();
		foreach($this->produkom2->Getdetailalum("where iddetilalum = '$kode' ")->result_array() as $reg){
			$for_reg[] = $reg['kode_regional'];
		}
             
              $for_per = array();
		foreach($this->produkom2->Getdetailalum("where iddetilalum = '$kode' ")->result_array() as $per){
			$for_per[] = $per['prensentase'];
		}    
		
    
	$data = array(

'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'iddetilalum' => $tampung[0]['iddetilalum'],	
		'kode_tr' => $tampung[0]['kode_tr'],
                'garansi' => $tampung[0]['garansi'],
				'garansifull' => $tampung[0]['garansifull'],
				'garansifree' => $tampung[0]['garansifree'],
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
			'nominal1' => $tampung[0]['nominal1'],
			'nominal2' => $tampung[0]['nominal2'],
			'nominal3' => $tampung[0]['nominal3'],
			'nominal4' => $tampung[0]['nominal4'],
			'nominal5' => $tampung[0]['nominal5'],
			
			
		'ket' => $tampung[0]['ket'],
		'note' => $tampung[0]['note'],
                 'contact' => $tampung[0]['contact'],	
		'prins' => $this->produkom2->Getobatcobauy("where tipe_produk='TP002'")->result_array(),
		'for_prins' => $for_prins,
		'koper' => $tampung[0]['koper'],
		'harga_baru' => $tampung[0]['harga_baru'],
		'harga_lama' => $tampung[0]['harga_lama'],
        'harga_excppn' => $tampung[0]['harga_excppn'],
		'harga_incppn' => $tampung[0]['harga_incppn'],
		'kode_th' => $tampung[0]['kode_th'],
		'reg' => $this->produkom2->Getregional()->result_array(),
		'for_regs' => $for_reg,
		'per' => $this->produkom2->Getpersent()->result_array(),
		'for_pers' => $for_per,
		);
		

	$this->template->display('produko2/edit_detailalum2', $data);	
}
	function updateabksdalum(){
     
     $this->load->model('produkom2');
    
              	    $iddetilalum=$_POST['iddetilalum'];
		$kode_tr = $_POST['kode_tr'];
		$koper = $_POST['koper'];
               $garansi = $_POST['garansi'];	
		$ket = $_POST['ket'];
               $contact = $_POST['contact'];
		$kode_produk = $_POST['kode_produk'];	
		$kode_regional = $_POST['kode_regional'];
		$harga_baru = $_POST['harga_baru'];
		$harga_lama = $_POST['harga_lama'];
		$harga_excppn = $_POST['harga_excppn'];
		$harga_incppn = $_POST['harga_incppn'];
        $kode_th = $_POST['kode_th'];	
		$prensentase = $_POST['prensentase'];
		
		
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
		
		
	
		$garansifull = $_POST['garansifull'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
				
			
		
		

	$data = array(
	'iddetilalum' =>$this->input->post('iddetilalum'),
	'kode_tr' =>$this->input->post('kode_tr'),
	'koper' =>$this->input->post('koper'),
        'garansi' =>$this->input->post('garansi'),
	'ket' =>$this->input->post('ket'),
        'contact' =>$this->input->post('contact'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'kode_regional' =>$this->input->post('kode_regional'),
	'harga_baru' =>$this->input->post('harga_baru'),
	'harga_lama' =>$this->input->post('harga_lama'),
    'harga_excppn' =>$this->input->post('harga_excppn'),
	'harga_incppn' =>$this->input->post('harga_incppn'),
	'kode_th' =>$this->input->post('kode_th'),
	'prensentase' =>$this->input->post('prensentase'),
	
	'tahunke1' =>$this->input->post('tahunke1'),
	'tahunke2' =>$this->input->post('tahunke2'),
	'tahunke3' =>$this->input->post('tahunke3'),
	'tahunke4' =>$this->input->post('tahunke4'),
	'tahunke5' =>$this->input->post('tahunke5'),
	
	'persentase1' =>$this->input->post('persentase1'),
	'persentase2' =>$this->input->post('persentase2'),
	'persentase3' =>$this->input->post('persentase3'),
	'persentase4' =>$this->input->post('persentase4'),
	'persentase5' =>$this->input->post('persentase5'),
	
	
	'harga_incppnfee' => (($harga_incppn*$prensentase)/100)+$harga_incppn,
	'nominal1' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase1/100,
	'nominal2' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase2/100,
	'nominal3' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase3/100,
	'nominal4' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase4/100,
	'nominal5' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase5/100,
		
		
	'garansifull' =>$this->input->post('garansifull'),
	'garansifree' =>$this->input->post('garansifree'),
	'note' =>$this->input->post('note'),
	

	'harga_incppnfee' => (($harga_incppn*$prensentase)/100)+$harga_incppn,
        
       );


	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetailalum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/adddetail_alumc/'.$kode_tr.'/'.$koper.'');
	}
	}

function editoutstanding($iddetilalum=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Ambilprodukoutstand_alkes("where iddetilalum ='$iddetilalum'")->result_array();

    $for_prins = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetilalum = '$iddetilalum' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		 $for_reg = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetilalum = '$iddetilalum' ")->result_array() as $reg){
			$for_reg[] = $reg['kode_regional'];
		}
             
              $for_per = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetilalum = '$iddetilalum' ")->result_array() as $per){
			$for_per[] = $per['prensentase'];
		}    
		
		 $for_prinsper = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetilalum = '$iddetilalum' ")->result_array() as $prinsper){
			$for_prinsper[] = $prinsper['koper'];
		}
    
	$data = array(

'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'iddetilalum' => $tampung[0]['iddetilalum'],	
		'kode_tr' => $tampung[0]['kode_tr'],
                'garansi' => $tampung[0]['garansi'],
				'garansifull' => $tampung[0]['garansifull'],
				'garansifree' => $tampung[0]['garansifree'],
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
			'nominal1' => $tampung[0]['nominal1'],
			'nominal2' => $tampung[0]['nominal2'],
			'nominal3' => $tampung[0]['nominal3'],
			'nominal4' => $tampung[0]['nominal4'],
			'nominal5' => $tampung[0]['nominal5'],
			
			'statushead' => $tampung[0]['statushead'],
			'catatanheadrevisi' => $tampung[0]['catatanheadrevisi'],
			'statusdetil' => $tampung[0]['statusdetil'],
			'cttndetilrevisi' => $tampung[0]['cttndetilrevisi'],
		'ket' => $tampung[0]['ket'],
		'note' => $tampung[0]['note'],
        'contact' => $tampung[0]['contact'],	
		'prins' => $this->produkom2->Getobatcobauy("where tipe_produk='TP002'")->result_array(),
		'for_prins' => $for_prins,
		'harga_baru' => $tampung[0]['harga_baru'],
		'harga_lama' => $tampung[0]['harga_lama'],
        'harga_excppn' => $tampung[0]['harga_excppn'],
		'harga_incppn' => $tampung[0]['harga_incppn'],
		'kode_th' => $tampung[0]['kode_th'],
		'tanggal_tr'=> $tampung[0]['tanggal_tr'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'reg' => $this->produkom2->Getregional()->result_array(),
		'for_regs' => $for_reg,
		'per' => $this->produkom2->Getpersent()->result_array(),
		'for_pers' => $for_per,
		'prinsper' => $this->produkom2->GetKodePrinspalum("where id_tipe_produk='TP002'")->result_array(),
		'for_prinsper' => $for_prinsper,
		);
		

	$this->template->display('produko2/edit_outstanding', $data);	
}


function editoutstanding_alkes($iddetailalkes=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Ambilprodukoutstand_alkes("where iddetailalkes ='$iddetailalkes'")->result_array();

    $for_prins = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetailalkes = '$iddetailalkes' ")->result_array() as $prins){
			$for_prins[] = $prins['kode_produk'];
		}

		
		 $for_prinsper = array();
		foreach($this->produkom2->Ambilprodukoutstand_alkes("where iddetailalkes = '$iddetailalkes' ")->result_array() as $prinsper){
			$for_prinsper[] = $prinsper['koper'];
		}
    
	$data = array(

'nama' => $this->session->userdata('nama'),	
		'cabang' => $this->session->userdata('cabang'),
		'idpr2' => $tampung[0]['idpr2'],	
		'iddetailalkes' => $tampung[0]['iddetailalkes'],
		'kode_trans' => $tampung[0]['kode_trans'],
		'kode_alkes' => $tampung[0]['kode_alkes'],		
		
                'garansi' => $tampung[0]['garansi'],
				'garansifree' => $tampung[0]['garansifree'],
				'merk' => $tampung[0]['merk'],
			    'type' => $tampung[0]['type'],
				'nm_perusahaan' => $tampung[0]['nm_perusahaan'],
				'harga' => $tampung[0]['harga'],
				'discount' => $tampung[0]['discount'],
				'harga_akhir' => $tampung[0]['harga_akhir'],
				'total' => $tampung[0]['total'],
				'ppn' => $tampung[0]['ppn'],
				'nominal_cashback' => $tampung[0]['nominal_cashback'],
				'nominalbiaya' => $tampung[0]['nominalbiaya'],
				'e_kat' => $tampung[0]['e_kat'],
				'non_e_kat' => $tampung[0]['non_e_kat'],
				'register' => $tampung[0]['register'],
				'non_register' => $tampung[0]['non_register'],
				'biayafree' => $tampung[0]['biayafree'],
				'biayanonfree' => $tampung[0]['biayanonfree'],
				
				
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
			'nominal1' => $tampung[0]['nominal1'],
			'nominal2' => $tampung[0]['nominal2'],
			'nominal3' => $tampung[0]['nominal3'],
			'nominal4' => $tampung[0]['nominal4'],
			'nominal5' => $tampung[0]['nominal5'],
			
			'statushead' => $tampung[0]['statushead'],
			'catatanheadrevisi' => $tampung[0]['catatanheadrevisi'],
			'statusdetil' => $tampung[0]['statusdetil'],
			'cttndetilrevisi' => $tampung[0]['cttndetilrevisi'],
		'ket' => $tampung[0]['ket'],
		'note' => $tampung[0]['note'],
        'contact' => $tampung[0]['contact'],	
		'prins' => $this->produkom2->Getobatcobauy("where tipe_produk='TP003'")->result_array(),
		'for_prins' => $for_prins,
		
		'tanggal_tr'=> $tampung[0]['tanggal_tr'],
		'id_tipe_produk' => $tampung[0]['id_tipe_produk'],
		'reg' => $this->produkom2->Getregional()->result_array(),
	
		'per' => $this->produkom2->Getpersent()->result_array(),
	
		'prinsper' => $this->produkom2->GetKodePrinspalum("where id_tipe_produk='TP003'")->result_array(),
		'for_prinsper' => $for_prinsper,
		);
		

	$this->template->display('produko2/edit_outstanding_alkes2', $data);	
}


	function updateoutstanding(){
     
     $this->load->model('produkom2');
    
        $iddetilalum=$_POST['iddetilalum'];
        $tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper2'];
		$tanggal_tr = $_POST['tanggal_tr'];
		$kode_tr = $_POST['kode_tr'];
		$garansi = $_POST['garansi'];	
		$ket = $_POST['ket'];
        $contact = $_POST['contact'];
		$kode_produk = $_POST['kode_produk'];	
		$kode_regional = $_POST['kode_regional'];
		$harga_baru = $_POST['harga_baru'];
		$harga_lama = $_POST['harga_lama'];
		$harga_excppn = $_POST['harga_excppn'];
		$harga_incppn = $_POST['harga_incppn'];
        $kode_th = $_POST['kode_th'];	
		$prensentase = $_POST['prensentase'];
		
		
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
		$garansifull = $_POST['garansifull'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
				
		$statushead = $_POST['statushead'];
		$catatanheadrevisi = $_POST['catatanheadrevisi'];
		$statusdetil = $_POST['statusdetil'];
		$cttndetilrevisi = $_POST['cttndetilrevisi'];			
		
		

	$data = array(
	'iddetilalum' =>$this->input->post('iddetilalum'),
	'kode_tr' =>$this->input->post('kode_tr'),
	'koper' =>$koper,
	'statusdetil' =>$statusdetil,
	'cttndetilrevisi' =>$cttndetilrevisi,
    'garansi' =>$this->input->post('garansi'),
	'ket' =>$this->input->post('ket'),
    'contact' =>$this->input->post('contact'),
	'kode_produk' =>$this->input->post('kode_produk'),
	'kode_regional' =>$this->input->post('kode_regional'),
	'harga_baru' =>$this->input->post('harga_baru'),
	'harga_lama' =>$this->input->post('harga_lama'),
    'harga_excppn' =>$this->input->post('harga_excppn'),
	'harga_incppn' =>$this->input->post('harga_incppn'),
	'kode_th' =>$this->input->post('kode_th'),
	'prensentase' =>$this->input->post('prensentase'),
	
	'tahunke1' =>$this->input->post('tahunke1'),
	'tahunke2' =>$this->input->post('tahunke2'),
	'tahunke3' =>$this->input->post('tahunke3'),
	'tahunke4' =>$this->input->post('tahunke4'),
	'tahunke5' =>$this->input->post('tahunke5'),
	
	'persentase1' =>$this->input->post('persentase1'),
	'persentase2' =>$this->input->post('persentase2'),
	'persentase3' =>$this->input->post('persentase3'),
	'persentase4' =>$this->input->post('persentase4'),
	'persentase5' =>$this->input->post('persentase5'),
	
	
	'harga_incppnfee' => (($harga_incppn*$prensentase)/100)+$harga_incppn,
	'nominal1' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase1/100,
	'nominal2' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase2/100,
	'nominal3' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase3/100,
	'nominal4' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase4/100,
	'nominal5' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase5/100,
		
		
	'garansifull' =>$this->input->post('garansifull'),
	'garansifree' =>$this->input->post('garansifree'),
	'note' =>$this->input->post('note'),
	

	'harga_incppnfee' => (($harga_incppn*$prensentase)/100)+$harga_incppn,
        
       );


    $dataanisa = array(
	'idpr2' =>$kode_tr,
	'statushead'=>$statushead,
	'catatanheadrevisi'=>$catatanheadrevisi,
	'id_tipe_produk' =>$tipe_produk,
	'koper' => $koper,
	'tanggal_tr' => $tanggal_tr,
	'kode_th' =>$kode_th,
			);


	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetailalum($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}

    $this->load->model('produkom2');
	$hasil2 = $this->produkom2->Updateprodukm($dataanisa);
	if($hasil2>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralumhistori');
	}

	}
	
	function updateoutstanding_alkes(){
     
     $this->load->model('produkom2');
    
        $iddetailalkes=$_POST['iddetailalkes'];
        $tipe_produk = $_POST['id_tipe_produk'];
		$koper = $_POST['koper2'];
		$tanggal_tr = $_POST['tanggal_tr'];
		$kode_trans = $_POST['kode_trans'];
		$merk = $_POST['merk'];	
		$type = $_POST['type'];
   
		$kode_produk = $_POST['kode_produk'];	
		$harga = $_POST['harga'];
		$harga_baru = $_POST['harga_baru'];
		$garansi = $_POST['garansi'];	
		$garansifree = $_POST['garansifree'];
		$e_kat = $_POST['e_kat'];
		$non_e_kat = $_POST['non_e_kat'];
		$total = $_POST['total'];
		$ppn = $_POST['ppn'];
		$discount = $_POST['discount'];
		$nominal_cashback = $_POST['nominal_cashback'];
		$nominalbiaya = $_POST['nominalbiaya'];
		
		
		$register = $_POST['register'];
		$non_register = $_POST['non_register'];
		$biayafree = $_POST['biayafree'];
		$biayanonfree = $_POST['biayanonfree'];


		
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
		$garansifree = $_POST['garansifree'];
		
		$note = $_POST['note'];
		$ket = $_POST['ket'];
        $contact = $_POST['contact'];
				
		$statushead = $_POST['statushead'];
		$catatanheadrevisi = $_POST['catatanheadrevisi'];
		$statusdetil = $_POST['statusdetil'];
		$cttndetilrevisi = $_POST['cttndetilrevisi'];			
		
		

	$data = array(
	'iddetailalkes' =>$this->input->post('iddetailalkes'),
	'kode_trans' =>$this->input->post('kode_trans'),
	'koper' =>$koper,
	'statusdetil' =>$statusdetil,
	'cttndetilrevisi' =>$cttndetilrevisi,
    'garansi' =>$this->input->post('garansi'),
	'garansifree' =>$this->input->post('garansifree'),
	
	'kode_produk' =>$this->input->post('kode_produk'),
	'merk' =>$this->input->post('merk'),
	'type' =>$this->input->post('type'),
	
	'harga' =>$this->input->post('harga'),
    'harga_baru' =>$this->input->post('harga_baru'),
	'ppn' => $ppn,
	
			'e_kat' => $e_kat,
			'non_e_kat' => $non_e_kat,
			'register' => $register,
			'non_register' => $non_register,
	
	'tahunke1' =>$this->input->post('tahunke1'),
	'tahunke2' =>$this->input->post('tahunke2'),
	'tahunke3' =>$this->input->post('tahunke3'),
	'tahunke4' =>$this->input->post('tahunke4'),
	'tahunke5' =>$this->input->post('tahunke5'),
	
	'persentase1' =>$this->input->post('persentase1'),
	'persentase2' =>$this->input->post('persentase2'),
	'persentase3' =>$this->input->post('persentase3'),
	'persentase4' =>$this->input->post('persentase4'),
	'persentase5' =>$this->input->post('persentase5'),
	
	
	
	'nominal1' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase1/100,
	'nominal2' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase2/100,
	'nominal3' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase3/100,
	'nominal4' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase4/100,
	'nominal5' => ((($harga_incppn*$prensentase)/100)+$harga_incppn)*$persentase5/100,
		
	'ket' =>$this->input->post('ket'),
    'contact' =>$this->input->post('contact'),
	'note' =>$this->input->post('note'),
			'biayafree' => $biayafree,
            'biayanonfree' => $biayanonfree,
            'nominalbiaya' => $nominalbiaya,
			'discount' => $discount,
			'nominal_cashback' =>($harga*$cashback)/100,

        
       );


    $dataanisa = array(
	'idpr2' =>$kode_trans,
	'statushead'=>$statushead,
	'catatanheadrevisi'=>$catatanheadrevisi,
	'id_tipe_produk' =>$tipe_produk,
	'koper' => $koper,
	'tanggal_tr' => $tanggal_tr,
	'kode_th' =>$kode_th,
			);


	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updatedetail_alkes($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralkeshistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralkeshistori');
	}

    $this->load->model('produkom2');
	$hasil2 = $this->produkom2->Updateprodukm_alkes($dataanisa);
	if($hasil2>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralkeshistori');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/lihattralkeshistori');
	}

	}
    
	


	function editaprove($kode=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
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
		'mengetahui' => $tampung[0]['mengetahui'],
		'idmengetahui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmeng' => $for_ttdmenger,

		'idmenyetujui' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
		'for_ttdmen' => $for_ttdmenge,
		'tanggal' => $tampung[0]['tanggal'],
		'menyetujui' => $tampung[0]['menyetujui'],
		'ttd_menyetujui' => $tampung[0]['ttd_menyetujui'],
		'mengetahui' => $tampung[0]['mengetahui'],
		'ttd_mengetahui' => $tampung[0]['ttd_mengetahui'],
		'status' => $tampung[0]['status'],
		
			);

	
	$this->template->display('produko2/editaprove2', $data);

	}

             function editaprovealum($kode=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Getaprove("where idtrcom ='$kode'")->result_array();

	$for_ttdmenger = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenger[] = $role['ttd_mengetahui'];
		}

		$for_ttdmenge = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdmenge[] = $role['ttd_menyetujui'];
		}

		$for_ttdsatu = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttdsatu[] = $role['ttd_satu'];
		}

		$for_ttddua = array();
		foreach($this->produkom2->Getaprove("where idtrcom = '$kode' ")->result_array() as $role){
			$for_ttddua[] = $role['ttd_satu'];
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
        'idpemeriksa' => $this->model->AmbilDataTTDMengetahui(" where role='$roles' and nama_user='$nama'")->result_array(),
        'for_ttdsatuss' => $for_ttddua,
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
		'nama_dua' => $tampung[0]['nama_dua'],
		 'ttd_dua' => $tampung[0]['ttd_dua'],
		 'jb_dua' => $tampung[0]['jb_dua'],
		'status' => $tampung[0]['status'],
		
			);

	
	$this->template->display('produko2/editaprovealum2', $data);

	}

	function updateaprove(){
     
     $this->load->model('produkom2');
   
	    $idtrcom=$_POST['idtrcom'];
	    $nama_satu = $_POST['nama_satu'];
		$ttd_satu = $_POST['ttd_satu'];
		$jb_satu = $_POST['jb_satu'];
		$nama_dua = $_POST['nama_dua'];
		$ttd_dua = $_POST['ttd_dua'];
		$jb_dua = $_POST['jb_dua'];
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
	'nama_dua' =>$this->input->post('nama_dua'),
	'ttd_dua' =>$this->input->post('ttd_dua'),
	'jb_dua' =>$this->input->post('jb_dua'),
	'menyetujui' =>$this->input->post('menyetujui'),
	'ttd_menyetujui' =>$this->input->post('ttd_menyetujui'),
	'jb_menyetujui' =>$this->input->post('jb_menyetujui'),
	'updateby' =>  $this->session->userdata('nama'),
	'updatedate' =>$waktusaatini,
	'status'=>$status,
		);

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Approve data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Approve data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}
	}

function editrejectalum($kode=0){
	$this->load->model('produkom2');
	
	
	$tampung = $this->produkom2->Getaprove("where idtrcom ='$kode'")->result_array();

	

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

	
	$this->template->display('produko2/rejectalum', $data);

	}

	function updatereject(){
     
     $this->load->model('produkom2');
   
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

	$this->load->model('produkom2');
	$hasil = $this->produkom2->Updateapp1($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>reject data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reject data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'produko2/alum');
	}
	}
}

