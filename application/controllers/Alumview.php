    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumview extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
         if(!$this->session->userdata('u_name')){
        $this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
                redirect('dashboard');
                }		 
	}


		function index()
	{
		$namars=($this->session->userdata('namars'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('malumview'); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('produko2/viewall_alum', $data);
	}

    public function ajax_listalumview()
    {
    	$this->load->model('malumview');
        $list = $this->malumview->get_datatablesalum();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalum) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produkalum->nama_produk;
            $row[] = $produkalum->nm_perusahaan;
            $row[] = $produkalum->nm_regional;
            $row[] = $produkalum->merk;
            $row[] = 'Rp '. number_format($produkalum->harga_incppnfee, 0,',','.') .',-';
            $row[] = $produkalum->tanggal_tr;   

             $row[] = '<a target="blank" href="Detailalum/cetak_alumproduk/'.$produkalum->iddetilalum.'" class="edit_record btn btn-xs btn btn-success" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a>';
					    	     
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->malumview->count_all(),
                        "recordsFiltered" => $this->malumview->count_filteredalum(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

