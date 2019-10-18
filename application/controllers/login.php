<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_user'));
        if ($this->session->userdata('u_name')) {
            redirect('dashboard');
        }
    }
    function index() {
         //$this->load->view('login');
		 $this->load->view('loginnew');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('login');
			$this->load->view('loginnew');
        } else {

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = pg_escape_string($usr);



            $p = md5(pg_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['nama_role'] = $qad->nama_role;
                    $sess_data['koderole'] = $qad->koderole;
                    $sess_data['namars'] = $qad->namars;
                   $sess_data['nm_rs'] = $qad->nm_rs;
                    $sess_data['nm_perus'] = $qad->nm_perus;
                    $sess_data['koders'] = $qad->koders;
                    $sess_data['view'] = $qad->view;
                    $sess_data['add'] = $qad->add;
                    $sess_data['edit'] = $qad->edit;
                    $sess_data['delete'] = $qad->delete;
                    $sess_data['approval'] = $qad->approval;
                    $sess_data['fotoprofil'] = $qad->fotoprofil;
                    $sess_data['createddate'] = $qad->createddate;
                    $sess_data['departemen'] = $qad->departemen;

                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br><p style="color:red;"><b>Username atau Password yang anda masukkan salah.</b></p>');
                redirect('login');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }






}
