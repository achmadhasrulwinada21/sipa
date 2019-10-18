<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class xl_import extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		// $this->load->library('form_validation');
		// $this->load->helper('url');
	}

	public function index() {
		$data['num_rows'] = $this->db->get('master_perusahaan')->num_rows();

		$this->load->view('xl_import/v_xl_import', $data);
	}

	public function import_data() {
		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['koper']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['nm_perusahaan']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['tipe_produk'] = $sheets['cells'][$i][3];
			}

			$this->db->insert_batch('master_perusahaan', $data_excel);
			// @unlink($data['full_path']);
			redirect('xl_import');
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */