<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporananggarann extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
			$this->load->library('Tpdf');
			$this->load->model('form_kegiatanm');
		}
	

  public function cetak_anggarann($id){

	   
	   $query['abk'] = $this->db->get_where('v_angreal',['idfkeg'=>$id])->row();                      			
      $query['dana'] = $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array();
         $query['data_abks'] = $this->form_kegiatanm->Getkegiatanviewreals("where kode_angreal='$id' and hapus_angreal=0 ")->result_array();
      
       $this->load->view('cetak_anggarann', $query);                     		
	}	

	public function cetak_anggaranrencana($id){

	   
	   $query['abk'] = $this->db->get_where('v_angreal',['idfkeg'=>$id])->row();                      			
      $query['dana'] = $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array();
         $query['data_abks'] = $this->form_kegiatanm->Getkegiatanviewrenacana("where kode_detail='$id' and hapus=0 ")->result_array();
      
       $this->load->view('cetak_anggaranrencana', $query);                     		
	}	

	public function excel_anggaran($id){

	   
	   $query['abk'] = $this->db->get_where('v_angreal',['idfkeg'=>$id])->row();                      			
      $query['dana'] = $this->form_kegiatanm->Getsumberdana("where idfkeg=$id and hapus=0 order by idfkeg asc")->result_array();
         $query['data_abks'] = $this->form_kegiatanm->Getkegiatanviewreal("where idfkeg=$id and hapus_angreal=0 order by rincian_kegiatan,idangreal asc")->result_array();
      
       $this->load->view('excel_anggaran', $query);                     		
	}	
	
   }