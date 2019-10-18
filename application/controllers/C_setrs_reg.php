    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_setrs_reg extends CI_Controller {
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
		$this->load->model('mstsetrsreg'); 
        $data['data_setdis'] = $this->mstsetrsreg->Getsetrsreg("order by nm_regional desc")->result();
	    $data['kodereg']= $this->mstsetrsreg->getreg()->result_array();
	    $data['kdrs']= $this->mstsetrsreg->getrs("WHERE hrd_mst_rs.koders NOT IN (SELECT koders FROM setuprs_reg)")->result_array();
	     $data['kdrsedit']= $this->mstsetrsreg->getrs()->result_array();		
		$this->template->display('msetuprs_reg/data_mstsetreg', $data);
	}

	
	
	function savedata(){
		$this->load->model('mstsetrsreg');
		$kode_regional = $_POST['kode_regional'];
		$koders = $_POST['koders'];
			
			$data = array();
		date_default_timezone_set("Asia/Jakarta");
			$waktusaatini =date("Y-m-d H:i:s");	

			for ($dara = 0; $dara < count($this->input->post('koders')); $dara++)
        	 {
		$data[$dara] = array(			
			'kode_regional' => $kode_regional,
			'koders' => $koders[$dara],
			'createby' =>  $this->session->userdata('nama'),			
			);
	}

		$this->db->insert_batch('setuprs_reg', $data);;
			
			header('location:'.base_url().'C_setrs_reg');
		
	}

	
	function update(){


	$dt = new DateTime();


		date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y m d H:i:s");
         
	$data = array(
	'idsetregional' =>$this->input->post('idsetregional'),
	'kode_regional' =>$this->input->post('kode_regional'),
	'koders' =>$this->input->post('koders'),
	'updateby' =>  $this->session->userdata('nama'),
	'udate' =>  $waktu,
	
	);
	$this->load->model('mstsetrsreg');
	$hasil = $this->mstsetrsreg->Updatesetdis($data);
	if($hasil>=0){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
	header('location:'.base_url().'C_setrs_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_setrs_reg');
	}
	}
	
	function hapus($kode = 1){
	$this->load->model('mstsetrsreg');	
	$result = $this->mstsetrsreg->Hapus('setuprs_reg', array('idsetregional' => $kode));
	if($result == 1){
	$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
	header('location:'.base_url().'C_setrs_reg');
	}else{
	$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
	header('location:'.base_url().'C_setrs_reg');
	}
	}
	
		
}

