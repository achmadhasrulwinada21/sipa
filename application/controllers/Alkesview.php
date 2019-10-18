    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alkesview extends CI_Controller {
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
		$this->load->model('malkesview'); 
              $this->load->model('alkeskat'); 
        $data['kode_pabrik']= $this->alkeskat->GetKodePrinsp("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array();
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('katalkes/viewall_alkes', $data);
	}

    public function ajax_listalkesview()
    {
    	$this->load->model('malkesview');
        $list = $this->malkesview->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalkes) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $produkalkes->nm_perusahaan;
            $row[] = $produkalkes->nama_produk;
            $row[] = $produkalkes->merk;
            $row[] = $produkalkes->type;
            $row[] = 'Rp. '. number_format($produkalkes->total, 0,',','.') .',-';
            $row[] = $produkalkes->tanggal_tr;   

             $row[] = '<a target="blank" href="Laporanalkes/cetak_alkesproduk2/'.$produkalkes->iddetailalkes.'" class="edit_record btn btn-xs btn btn-success" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a>';
					    	     
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->malkesview->count_all(),
                        "recordsFiltered" => $this->malkesview->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

