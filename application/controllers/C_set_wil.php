    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_set_wil extends CI_Controller {
private $filename = "detail_setup_dist";
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}


		
	public function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');
		$this->load->model('mstsetwil'); 
		 // $data['kodeunikalkes'] = $this->mstsetwil->code_otomatis211();
        $data['data_setdis'] = $this->mstsetwil->Getsetwil("order by nm_perusahaan desc")->result();
	    $data['kodereg']= $this->mstsetwil->getreg()->result_array("order by nm_regional");
	    $data['kpr']= $this->mstsetwil->getper("where id_tipe_produk='TP003' order by nm_perusahaan")->result_array();
	    $data['kdrs']= $this->mstsetwil->getrs("WHERE hrd_mst_rs.koders NOT IN (SELECT koders FROM setuprs_reg)")->result_array();
	     $data['kdrsedit']= $this->mstsetwil->getrs("order by namars")->result_array();		
		$this->template->display('master_setwil/data_wilayah', $data);
	}

public function ajaxmst_setwil()
    {
    	$this->load->model('mstsetwil');
        $list = $this->mstsetwil->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalkes) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'<center>';
            $row[] = '<center>'.$produkalkes->nm_perusahaan.'<center>';
            $row[] =  '<center>'.$produkalkes->kode_wilayah.'<center>';
            $row[] =  '<center>'.$produkalkes->nm_regional.'<center>';
            $row[] =  '<center>'.$produkalkes->namars.'<center>';             
              $row[] = '<center><a href="C_set_wil/hapus/'.$produkalkes->idsetwilayah.'" class="edit_record btn btn-xs btn btn-danger" onClick="return doconfirm()" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a></center>';
               
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mstsetwil->count_all(),
                        "recordsFiltered" => $this->mstsetwil->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	
	
	function savedata(){
		$this->load->model('mstsetwil');
          
		$koper = $_POST['koper'];
		$kode_wilayah = $_POST['kode_wilayah'];
				
	  	$data = array();
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

			for ($dara = 0; $dara < count($this->input->post('kode_wilayah')); $dara++)
        	 {
         
		$data[$dara] = array(			
			'koper' => $koper,
			'kode_wilayah' => $kode_wilayah[$dara],
			);
	}

		$this->db->insert_batch('master_setwilayah', $data);
			
			header('location:'.base_url().'C_set_wil');
		
	}

	
	function hapus($kode = 1){
	$this->load->model('mstsetwil');	
	$result = $this->mstsetwil->Hapus('master_setwilayah', array('idsetwilayah' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_set_wil ');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_set_wil ');
	}
	}
	
		
}

