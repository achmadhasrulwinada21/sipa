<?php

class M_user extends CI_Model {

    private $table = "v_user";

    function cek($username, $password) {
        $this->db->where("u_name", $username);
        $this->db->where("u_paswd", $password);
        return $this->db->get("v_user");
    }

    function semua() {
        return $this->db->get("v_usergroup");
    }

    function cekKode($kode) {
        $this->db->where("u_name", $kode);
        return $this->db->get("v_user");
    }

    function cekId($kode) {
        $this->db->where("u_id", $kode);
        return $this->db->get("v_user");
    }
    
    function getLoginData($usr, $psw) {
        $u = pg_escape_string($usr);
        $p = md5(pg_escape_string($psw));
        $q_cek_login = $this->db->get_where('v_user', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['nama_role'] = $qad->nama_role;
                    $sess_data['koderole'] = $qad->koderole;
                    $sess_data['namars'] = $qad->namars;
                    $sess_data['koders'] = $qad->koders;
                    $sess_data['view'] = $qad->view;
                    $sess_data['add'] = $qad->add;
                    $sess_data['edit'] = $qad->edit;
                    $sess_data['delete'] = $qad->delete;
                    $sess_data['approval'] = $qad->approval;
                    $sess_data['fotoprofil'] = $qad->fotoprofil;
                    $sess_data['createddate'] = $qad->createddate;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
        }
    }




    function update($id, $info) {
        $this->db->where("u_id", $id);
        $this->db->update("usersipa", $info);
    }

    function simpan($info) {
        $this->db->insert("usersipa", $info);
    }

    function hapus($kode) {
        $this->db->where("u_id", $kode);
        $this->db->delete("usersipa");
    }

}
