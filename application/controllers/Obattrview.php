    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obattrview extends CI_Controller {
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
		$this->load->model('mobattrview');
           $this->load->model('obatkat'); 
        $data['kode_pabrik'] = $this->obatkat->GetKodePrinsp("order by nm_perusahaan ASC")->result_array(); 
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('katobat/viewall_obattr', $data);
	}

    public function ajax_listdaraview()
    {
    	$this->load->model('mobattrview');
        $list = $this->mobattrview->get_datatablesdara();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkdara) {
            $no++;
            $row = array();
            $row[] = $no;
			$row[] = $produkdara->kode_obat;
            $row[] = $produkdara->nama_obat;
            $row[] = $produkdara->komposisi;
            $row[] = 'Rp '.number_format($produkdara->harga, 0,',','.') .' -';
            $row[] = $produkdara->tanggal_tr;
            $row[] = $produkdara->nm_perusahaan;
            // $row[] = $produkdara->foi;
            // $row[] = $produkdara->mou;
            // $row[] = $produkdara->pks;
            $row[] = $produkdara->nm_distributor;
            // $row[] = $produkdara->catatan;
              

             $row[] = '<a target="blank" href="Detailobattr/cetak_obattrproduk/'.$produkdara->iddetailprod2.'" class="edit_record btn btn-xs btn btn-success" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a>';
					    	     
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mobattrview->count_all(),
                        "recordsFiltered" => $this->mobattrview->count_filtereddara(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}

