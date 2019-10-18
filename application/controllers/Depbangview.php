    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depbangview extends CI_Controller {
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
		$this->load->model('mdepbangview'); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('depbang/viewall_depbang', $data);
	}

    public function ajax_listdepbangview()
    {
    	$this->load->model('mdepbangview');
        $list = $this->mdepbangview->get_datatablesalum();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkdaradepbang) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produkdaradepbang->nama_produk;
            $row[] = $produkdaradepbang->nm_perusahaan;
            $row[] = $produkdaradepbang->deskripsi;
            $row[] = $produkdaradepbang->merk;
            $row[] = 'Rp. '. number_format($produkdaradepbang->harga_incppnfee, 0,',','.') .',-';
            $row[] = $produkdaradepbang->tanggal_tr;   

             $row[] = '<a target="blank" href="Detaildepbang/cetak_depbangproduk/'.$produkdaradepbang->iddetilalum.'" class="edit_record btn btn-xs btn btn-success" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a>';
					    	     
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mdepbangview->count_all(),
                        "recordsFiltered" => $this->mdepbangview->count_filteredalum(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

