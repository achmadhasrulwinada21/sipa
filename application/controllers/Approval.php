    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approval extends CI_Controller {
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
		$this->load->model('mapproval'); 
        $data['aprove'] = $this->mapproval->Gettabel()->result_array();
        $data['kodeunik'] = $this->mapproval->buat_kode();
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('master_aproval/data_aproval', $data);
	}

    public function ajax_listaproveview()
    {
    	$this->load->model('mapproval');
        $list = $this->mapproval->get_datatablesalum();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkalum) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.$produkalum->k_aprove.'</center>';
            $row[] = '<center>'.$produkalum->n_aprove.'</center>';   

             $row[] = '<center><a data-toggle="modal" href="#modal_edit'.$produkalum->idaproval.'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit">&nbspUpdate</i></a>&nbsp&nbsp&nbsp<a class="hapus_record btn btn-xs btn-danger" href="Approval/hapus/'.$produkalum->idaproval.'" title="Hapus" onClick="return doconfirm()"><i class="glyphicon glyphicon-trash">&nbspDelete</i></a><center>
             ';
					    	     
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mapproval->count_all(),
                        "recordsFiltered" => $this->mapproval->count_filteredalum(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function savedata(){
        $this->load->model('mapproval');

         $k_aprove = $_POST['k_aprove'];
         $n_aprove = $_POST['n_aprove'];
         
          $datatgl = $this->mapproval->Gettabel("where k_aprove='$k_aprove'")->result_array();

        $data = array(  
            'k_aprove' => $k_aprove,
            'n_aprove' => $n_aprove,
            'createby' =>  $this->session->userdata('nama'),            
            );
        
        $pbid = isset($datatgl[0]['k_aprove']);
                if($pbid == $k_aprove ){

            $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>DATA tersebut sudah ada!!!</strong></div>");
            header('location:'.base_url().'Approval');
        }else{
            $result = $this->mapproval->Save($data);

        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
            header('location:'.base_url().'Approval');
        }
        
    }

    function update(){


    $dt = new DateTime();


        date_default_timezone_set("Asia/Jakarta");
        $waktu =date("Y-m-d H:i:s");
   
    $data = array(
    'idaproval' =>$this->input->post('idaproval'),
    'k_aprove' =>$this->input->post('k_aprove'),
    'n_aprove' =>$this->input->post('n_aprove'),
    'updateby' =>  $this->session->userdata('nama'),
    'updatedate' =>  $waktu,
    
    );
    $this->load->model('mapproval');
    $hasil = $this->mapproval->Update($data);
    if($hasil>=0){
    $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
    header('location:'.base_url().'Approval');
    }else{
    $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
    header('location:'.base_url().'Approval');
    }
    }

    function hapus($kode = 1){
    $this->load->model('mapproval');    
    $result = $this->mapproval->Hapus('master_approval', array('idaproval' => $kode));
    if($result == 1){
    $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Hapus data BERHASIL dilakukan</strong></div>");
    header('location:'.base_url().'Approval');
    }else{
    $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
    header('location:'.base_url().'Approval');
    }
    }
}

