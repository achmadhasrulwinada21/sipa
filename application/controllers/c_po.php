<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_po extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('u_name')){
    $this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
      redirect('dashboard');

    }
  }

    
  function get_perush_PO(){
    $this->load->model('m_po');
    $koper=$this->input->post('koper');
    $data=$this->m_po->get_data_perush_PO($koper);
    echo json_encode($data);
  }

  function get_detilbarangpo(){
    $this->load->model('m_po');
    $dara22=$this->input->post('kode_produk');
    $data=$this->m_po->get_data_barang_PO($dara22);
    echo json_encode($data);
  }

  function get_detilbarangpo21(){
    $this->load->model('m_po');
    $wisnu=$this->input->post('kode_produk');
    $data=$this->m_po->get_data_barang_PO21($wisnu);
    echo json_encode($data);
  }
  
 function get_lokasi(){
    $this->load->model('m_po');
    $dara91=$this->input->post('kode_lokasi');
    $data=$this->m_po->get_data_lokasi_PO($dara91);
    echo json_encode($data);
  }

  function get_detail(){
    $this->load->model('m_po');
        $id['kode_produk']=$this->input->post('kode_produk');
        $rs=$this->session->userdata('koders');
        $data=array(
             'detail_barang'=>$this->m_po->getSelectedData('v_rralkes_detail',$id)->result(),
        );
        $this->load->view('po/ajax_detail',$data);
    }

  
  
  function tambah_item_to_cart(){
        $k_nopo= $_POST['k_nopo'];
         $koper= $_POST['koper'];
    $kode=$this->input->post('kode_produk');
    $status_pengajuan=$this->input->post('status_pengajuan');
    $peruntukan=$this->input->post('peruntukan');
    $nm_lokasi=$this->input->post('nm_lokasi');
    $trf_perguna=$this->input->post('trf_perguna');
    $tgtjml_guna_perbulan=$this->input->post('tgtjml_guna_perbulan');
    $jumlah=$this->input->post('jumlah');
    $total=$this->input->post('harga_akhir_baru');
    $nama_produk=$this->input->post('nama_produk');
    $biaya_kirim=$this->input->post('biaya_kirim');
    $includeongkir=$this->input->post('includeongkir');
        $data = array(
            'id'    => $kode,
            'qty'   => $jumlah,
            'price' => $total,
            'name'  => $nama_produk,
            'status_pengajuan'=>$status_pengajuan,
            'peruntukan'=>$peruntukan,
            'nm_lokasi'=>$nm_lokasi,
            'tgtjml_guna_perbulan'=>$tgtjml_guna_perbulan,
            'trf_perguna'=>$trf_perguna,
            'biaya_kirim'=>$biaya_kirim,
            'includeongkir'=>$includeongkir,
        );
      $daraannisa=$this->cart->contents();

         foreach ($daraannisa as $dara) {
          $dara['id'];
         }

         if($kode == $dara['id']){
      $this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong> barang dengan kode : ".$kode."  tersebut sudah ada!!!</strong></div>");
      header('location:'.base_url().'c_po/detailcart/'.$koper.'/'.$k_nopo.'');
    }else{
      $this->cart->insert($data);
        redirect('c_po/detailcart/'.$koper.'/'.$k_nopo.'');
    }
  }

  function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        redirect('c_po');
    }
  
  
  function remove(){
        $row_id=$this->uri->segment(3);
        $koper=$this->uri->segment(4);
        $k_nopo=$this->uri->segment(5);
        $this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
         redirect('c_po/detailcart/'.$koper.'/'.$k_nopo.'');
    }
  
  public function index()
  {
    $this->load->model('m_po');
  
    $data = array(
      'namars' => $this->session->userdata('namars'), 
      'koders' => '',
      'cdate' => '',
      'nama' => $this->session->userdata('nama'), 
      'cabang' => $this->session->userdata('cabang'),
      'kodeunik' => $this->m_po->buat_kode(),
      'kodeunik21' => $this->m_po->buat_koderelasi(),
      'kode_alkes'=> $this->m_po->GetKode_Perush_POalkes("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array(),
      // 'data_barang'=>$this->m_po->getBarangALKESPO($koper),
      
    );

    $this->template->Display('po/form_po',$data);
  }

     function detailcart()
    {
         $koper= $this->uri->segment(3);
         $k_nopo= $this->uri->segment(4);
        $this->load->model('m_po');
            $data = array(
            'tr' => $this->db->get_where('poheader',['k_nopo'=>$k_nopo])->row(),
             'pr' => $this->db->get_where('v_pohead',['k_nopo'=>$k_nopo])->row(),
            'namars' => $this->session->userdata('namars'), 
            'koders' => '',
            'cdate' => '',
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'kodeunik' => $this->m_po->buat_kode(),
            'kodeunik21' => $this->m_po->buat_koderelasi(),
            'kode_alkes'=> $this->m_po->GetKode_Perush_POalkes("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array(),
            'data_barang'=>$this->m_po->getBarangALKESPO($koper),
             'lokasi'=>$this->m_po->lokasi()->result_array(),
            
        );

      $this->template->Display('po/form_po2',$data);
    }

  function detail_penjualan(){
    $this->load->model('m_po');
        $ids= $this->uri->segment(3);
        $id=str_replace("%20","",str_replace("%2F","/",$ids));
        $data=array(
          'nama' => $this->session->userdata('nama'), 
      'cabang' => $this->session->userdata('cabang'),
      'namars' => $this->session->userdata('namars'), 
            'dt_penjualan'=>$this->m_po->getDataPenjualan($id),
            'barang_jual'=>$this->m_po->getBarangPenjualan($id),
        );
       $this->template->Display('po/form_podetil',$data);
    }

     function detail_edit(){
    $this->load->model('m_po');
        $ids= $this->uri->segment(3);
        $id=str_replace("%20","",str_replace("%2F","/",$ids));
        $data=array(
          'nama' => $this->session->userdata('nama'), 
      'cabang' => $this->session->userdata('cabang'),
      'namars' => $this->session->userdata('namars'), 
            'dt_penjualan'=>$this->m_po->getDataPenjualan($id),
            'barang_jual'=>$this->m_po->getBarangPenjualan($id),
             'data_aprove' => $this->m_po->getBarangPenjualan($id),
        );
       $this->template->Display('po/form_poedit',$data);
    }

    function cetakpo(){
      $this->load->library('Tpdf');
    $this->load->model('m_po');
        $id= $this->uri->segment(3);
        $data=array(
          'nama' => $this->session->userdata('nama'), 
      'cabang' => $this->session->userdata('cabang'),
      'namars' => $this->session->userdata('namars'), 
            'dt_penjualan'=>$this->m_po->getDataPenjualan($id),
            'barang_jual'=>$this->m_po->getBarangPenjualan($id),
        );
       $this->load->view('po/cetakpo',$data);
    }

    function cetakform(){
        $this->load->library('Tpdf');
        $this->load->model('m_po');
        $id= $this->uri->segment(3);
        $data=array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'namars' => $this->session->userdata('namars'), 
            'dt_penjualan'=>$this->m_po->getDataPenjualan($id),
            'barang_jual'=>$this->m_po->getBarangPenjualan($id),
        );
       $this->load->view('po/cetakform',$data);
    }

    function simpan_header_po(){
        
        $this->load->model('m_po');

         $configttd = array(
            'upload_path' => './assets/upload',
            'allowed_types' => 'gif|jpg|JPG|png|jpeg|pdf|xls|xlsx|ods',
            'max_size' => '2048',

        );
        $this->load->library('upload', $configttd); 
        $this->upload->do_upload('file_uploadttd');
        $upload_foto = $this->upload->data();
         $file_name = $upload_foto['file_name'];
         $nm_acc ='Draff';
         $k_nopo= $_POST['k_nopo'];
         $koper= $_POST['koper'];
         $nm_mengetahui=$this->session->userdata('nama');
         $jb_mengetahui=$this->session->userdata('nama_role');
         $jenis_permintaan= $_POST['jenis_permintaan'];
         $tgl_kebutuhan= $_POST['tgl_kebutuhan'];
         
        $data = array(
            'nopo'=>$this->input->post('nopo'),
            'k_nopo'=>$k_nopo,
            'koper'=> $koper,
            'keterangan'=>$this->input->post('keterangan'),
            'koders'=>$this->input->post('koders'),
            'foto'=>$file_name,
            'nm_acc'=>$nm_acc,
            'nm_mengetahui'=>$nm_mengetahui,
            'jb_mengetahui'=>$jb_mengetahui,  
            'jenis_permintaan'=>$jenis_permintaan,
            'tgl_kebutuhan'=>$tgl_kebutuhan,          
          
        );
        $this->m_po->insertData("poheader",$data);

   redirect('c_po/detailcart/'.$koper.'/'.$k_nopo.'');
    }
  
  function simpan_po(){
    
    $this->load->model('m_po');
              $k_nopo=$_POST['k_nopo'];
            $data = array(
            'nopo'=>$this->input->post('nopo'),
            'k_nopo'=> $k_nopo,
            // 'disc'=>$this->input->post('disc'),
            // 'ppn'=>$this->input->post('ppn'),
           
        );
          $this->m_po->Updatehead($data);

         foreach($this->cart->contents() as $items){
            $kode_produk = $items['id'];
            $status_pengajuan = $items['status_pengajuan'];
            $peruntukan = $items['peruntukan'];
            $trf_perguna= $items['trf_perguna'];
            $tgtjml_guna_perbulan= $items['tgtjml_guna_perbulan'];
            $jumlah = $items['qty'];
            $harga = $items['price'];
            $biaya_kirim = $items['biaya_kirim'];
            $includeongkir = $items['includeongkir']; 
            $subtotal = $items['subtotal'] + $items['biaya_kirim'];

            $data_detail = array(
                'nopo' => $this->input->post('nopo'),
                'k_nopo' => $this->input->post('k_nopo'),
                'kode_produk'=> $kode_produk,
                'jumlah'=>$jumlah,
                'harga'=>$harga,
                'hargaakhir'=>$subtotal,
                'status_pengajuan' => $status_pengajuan,
                'peruntukan' => $peruntukan,
                'trf_perguna' => $trf_perguna,
                'tgtjml_guna_perbulan' => $tgtjml_guna_perbulan,
                'ongkir'=>$biaya_kirim,
                'includeongkir'=>$includeongkir,
            );
            $this->m_po->insertData("podetail",$data_detail);

          
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
       redirect('c_po/viewallpo');
//    redirect('c_po/kirim_emailsimpan/'.$k_nopo.'');
    }

    function viewallpo()
  {
    $namars=($this->session->userdata('namars'));
        $koders=($this->session->userdata('koders'));
        $namarole=($this->session->userdata('nama_role'));
    $dept=($this->session->userdata('departemen'));
    $this->load->model('m_po');
        $data['data_aprove'] = $this->m_po->viewpo()->result_array();
        $data['ttd'] = $this->m_po->masterttd("where role='$namarole'")->result_array();
        $data['ttdrs'] = $this->m_po->masterttd("where role='$namarole' and cbgrs='$koders'")->result_array();
        $data['nama']=$this->session->userdata('nama'); 
    $data['cabang'] = $this->session->userdata('cabang');       

    $this->template->display('po/viewallpo', $data);
  }

     public function ajax_listalkespo()
    {
        
      $this->load->model('m_po');
        $list = $this->m_po->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkpo) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.date('Y-m-d',strtotime($produkpo->tglpo)).'</center>';
            $row[] = '<center>'.$produkpo->nopo.'</center>';
             $row[] = '<center>'.$produkpo->namars.'</center>';
              $row[] = '<center>'.$produkpo->nm_perusahaan.'</center>';
            $row[] = '<center>'.$produkpo->jumlah.'</center>';
            $row[] = '<center>Rp. '. number_format($produkpo->grand_total_var, 0,',','.') .',-</center>';
              
               if($produkpo->nm_acc == "Disetujui Direktur RS") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Direktur RS</p></center>';
                }elseif($produkpo->nm_acc == "ditolak Direktur RS"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Direktur RS</p></center>';
            }elseif($produkpo->nm_acc == "Disetujui Direktur Regional"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Direktur Regional</p></center>';
            }elseif($produkpo->nm_acc == "ditolak Direktur Regional"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Direktur Regional</p></center>';
             }elseif($produkpo->nm_acc == "Disetujui Direktur Ops & Umum"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Direktur Ops & Umum</p></center>';
             }elseif($produkpo->nm_acc == "ditolak Direktur Ops & Umum"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Direktur Ops & Umum</p></center>';
        }elseif($produkpo->nm_acc == "Disetujui Direktur Utama"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Direktur Utama</p></center>';
             }elseif($produkpo->nm_acc == "ditolak Direktur Utama"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Direktur Utama</p></center>';
             }elseif($produkpo->nm_acc == "Disetujui Kadep Jangmed"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Kadep Jangmed</p></center>';
             }elseif($produkpo->nm_acc == "ditolak Kadep Jangmed"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Kadep Jangmed</p></center>';
              }elseif($produkpo->nm_acc == "Disetujui Kadep Pengadaan"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Kadep Pengadaan</p></center>';
             }elseif($produkpo->nm_acc == "ditolak Kadep Pengadaan"){
            $row[] =  '<center><p style="background-color:red;color:white;text-align:center;">Ditolak Kadep Pengadaan</p></center>';
             }elseif($produkpo->nm_acc == "Disetujui Manager RS"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Manager RS</p></center>';
                  }elseif($produkpo->nm_acc == "menunggu approve"){
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">menunggu approve</p></center>';
                 }else{
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">Draff</p></center>';
                 }

            // $row[] = '<center>'.$produkpo->catatan.'</center>';

             $row[] = '<center> <a class="btn btn-info btn-sm" title="download" href="'.base_url().'assets/upload/'.$produkpo->foto.'" download="'.$produkpo->foto.'"><i class="glyphicon glyphicon-download"></i></a></center>';

            $row[] = '<center><a title="approve" style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit'.$produkpo->k_nopo.'"><i class="glyphicon glyphicon-ok"></i></a></center>';
             
            $row[] = '<center><a href="detail_penjualan/'.$produkpo->k_nopo.'" class="edit_record btn btn-sm btn btn-warning" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a></center>';

            $row[] = '<center><a target="blank" href="cetakpo/'.$produkpo->k_nopo.'" class="btn btn-sm btn btn-info" title="print" onclick=""><i class="glyphicon glyphicon-print"></i></a></center>';

              $row[] = '<center><a target="blank" href="cetakform/'.$produkpo->k_nopo.'" class="btn btn-sm btn btn-primary" title="print" onclick=""><i class="glyphicon glyphicon-print"></i></a></center>';
                 
        $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88' && $produkpo->nm_acc == "Draff" ):  
             $row[] = '<center><a href="detail_edit/'.$produkpo->k_nopo.'" class="edit_record btn btn-sm btn btn-info" title="Update" onclick=""><i class="glyphicon glyphicon-edit"></i></a></center>';
            $row[] = '<center>  <a class="btn btn-danger btn-sm" title="Hapus" href="hapus/'.$produkpo->k_nopo.'" onclick="return doconfirm();"> <i class="glyphicon glyphicon-trash"></i></a>
        </center>';  
                endif;     
           $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88' && $produkpo->nm_acc <> "Draff" ):  
             $row[] = '<center><span class="edit_record btn btn-sm" title="Update" onclick=""><i class="glyphicon glyphicon-edit"></i></span></center>';
            $row[] = '<center>  <span class="btn btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></span>
        </center>';  
                endif;       
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_po->count_all(),
                        "recordsFiltered" => $this->m_po->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function hapus(){
      $this->load->model('m_po');
        $hapus = $this->uri->segment(3);
       
        $result = $this->m_po->Hapus('poheader', array('k_nopo' => $hapus));
        $result2 = $this->m_po->Hapus('podetail', array('k_nopo' => $hapus));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'c_po/viewallpo');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'c_po/viewallpo');
        }
        if($result2 == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'c_po/viewallpo');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'c_po/viewallpo');
        }
    }
     
   
    function updateaprovecekcui(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('m_po');

             $k_nopo=$_POST['k_nopo'];
             $koders=$_POST['koders'];
             $grandtotal=$_POST['grandtotal'];
             $menyetujui=$_POST['menyetujui'];
             $nm_menyetujui=$_POST['nm_menyetujui'];
             $jb_menyetujui=$_POST['jb_menyetujui'];
              $mengetahui=$_POST['mengetahui'];
             $nm_mengetahui=$_POST['nm_mengetahui'];
             $jb_mengetahui=$_POST['jb_mengetahui']; 
             $catatan=$_POST['catatan'];   
        $status=$_POST['nm_acc'];
        $data = array(
        'k_nopo' =>$this->input->post('k_nopo'),
        'menyetujui' =>$this->input->post('menyetujui'),
        'nm_menyetujui' =>$this->input->post('nm_menyetujui'),
        'jb_menyetujui' =>$this->input->post('jb_menyetujui'),
         'mengetahui' =>$this->input->post('mengetahui'),
        'nm_mengetahui' =>$this->input->post('nm_mengetahui'),
        'jb_mengetahui' =>$this->input->post('jb_mengetahui'),
        'nm_acc'=>$status,
        'catatan'=>$catatan
                );
        if($ynwa!='10'  and $ynwa!='17' and $ynwa!='77' and $ynwa!='83' and $ynwa!='84' and $ynwa!='85' and $ynwa!='86' and $ynwa!='87'):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }
    endif;

          if($ynwa=='77' and $grandtotal <= 10000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }
    endif;
     if($ynwa=='77' and $grandtotal >= 10000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }
    endif;
    if(($ynwa=='83' || $ynwa=='84' || $ynwa=='85' || $ynwa=='86' || $ynwa=='87') and $grandtotal >= 50000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }
    endif;
    if(($ynwa=='83' || $ynwa=='84' || $ynwa=='85' || $ynwa=='86' || $ynwa=='87') and $grandtotal < 50000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }
    endif;
    if($ynwa=='10' and $grandtotal >= 500000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/viewallpo');
        }
    endif;
    if($ynwa=='10' and $grandtotal <= 500000000):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }
    endif;
   if($ynwa=='17'):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }
    endif;
    if($ynwa=='88'):
        $this->load->model('m_po');
        $hasil = $this->m_po->Updateapp($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/kirim_email/'.$k_nopo.'/'.$koders.'');
        }
    endif;
}

function updatedetail(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('m_po');

             $idpodtl=$_POST['idpodtl'];
             $k_nopo=$_POST['k_nopo'];
             $kode_produk=$_POST['kode_produk'];
             $harga=$_POST['harga_akhir_baru'];
             $jumlah=$_POST['jumlah'];
             $biaya_kirim=$_POST['biaya_kirim'];
             $subtotal=($harga*$jumlah)+$biaya_kirim;
             $includeongkir=$_POST['includeongkir'];
             $status_pengajuan=$_POST['status_pengajuan'];
             $peruntukan=$_POST['peruntukan'];
             $tgtjml_guna_perbulan=$_POST['tgtjml_guna_perbulan'];
             $trf_perguna=$_POST['trf_perguna'];
                            
        $data = array(
        'k_nopo' =>$k_nopo,
        'idpodtl' =>$idpodtl,
        'kode_produk' =>$kode_produk,
        'harga' =>$harga,
        'jumlah' =>$jumlah,
        'ongkir'=>$biaya_kirim,
        'hargaakhir' =>$subtotal,
        'includeongkir'=>$includeongkir,
        'status_pengajuan'=>$status_pengajuan,
        'peruntukan'=>$peruntukan,
        'trf_perguna'=>$trf_perguna,
        'tgtjml_guna_perbulan'=>$tgtjml_guna_perbulan,
            );
       
         $this->load->model('m_po');
        $hasil = $this->m_po->Updatedetilpo($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/detail_edit/'.$k_nopo.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'c_po/detail_edit/'.$k_nopo.'');
        }
    
}

function kirim_email()
    {
         $k_nopo= $this->uri->segment(3);
         $koders= $this->uri->segment(4);
            function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
        
         $this->load->model('m_po');
         $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://m001.dapurhosting.com',
               'smtp_user' => 'sipa.apps@herminahospitals.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'sipaappshermina',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
    ];          
                
        $this->load->library('email', $config);
        $this->load->helper('html');
       $this->load->model('m_po');
       // $koders = ($this->session->userdata('koders'));
      
       // $query['dt_penjualan']=$this->m_po->getDataPenjualan1($k_nopo);
       // $query['barang_jual']=$this->m_po->getBarangPenjualan2($k_nopo);

       // $filename90=$this->load->view('po/viewemail',$query,'',true);

 $cui=date('d m Y');
                $tanggal=substr($cui,0,2);
                $bulanss=(substr($cui,3,2));
                $tahun=substr($cui,6,4);

      $kirim_email = $this->db->get_where('v_pohead',['k_nopo'=> $k_nopo])->row();
      $recipientArr = array('sipa.apps@gmail.com', 'dua@example.com', 'tiga@example.com');
       $data_r ='';
       $kontak = $this->m_po->v_user($koders);
           foreach($kontak as $key => $row ){
                  if($key==0){
                    $data_r .= $row->email;}
                    else{ 
                     $data_r .= ','.$row->email; }
                   }

      $data=date('d m Y',strtotime($kirim_email->tglpo));
                $tgl=substr($data,0,2);
                $bulan=(substr($data,3,2));
                $thn=substr($data,6,4);

                  $bulanlist=array(
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                    );

             $html='
                 <table border="0">

                    <tr>
                     <td width="330" ></td>
    <td width="300" style="text-align:center;font-size:18;font-weight:bold;">'.$kirim_email->namars.'</td>
                    </tr>
            
                    <tr>
                    <td width="330" ></td>
                        <td width="300" style="text-align:center;font-size:10;">'.$kirim_email->alamat.'
                        <br>Website : www.herminahospitalgroup.com
                        </td></tr>
                    </table><hr height="2px"/>
             <b style="margin-bottom:4px;"></b> 
                    
 <b>tanggal <span> : </span>'.$tgl.' '.$bulanlist[$bulan].' '.$thn.'</b><br>
 <b>Status Surat PO <span> : </span>'.$kirim_email->nm_acc.'</b>

                             <p align="center"><b>SURAT PESANAN</b><br>
                             <b>'.$kirim_email->nopo.'</b></p>
<table border="0">
<tr>
<td width="110">Yang memberi pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama</td><td width="5">:</td>
<td width="220">'.$kirim_email->nm_mengetahui.'</td>
</tr>
<tr>
<td width="110">Jabatan</td><td width="5">:</td>
<td width="220">'.$kirim_email->jb_mengetahui.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="220">'.$kirim_email->alamat.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="110">Yang menerima pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama Suplier</td><td width="5">:</td>
<td width="400">'.$kirim_email->nm_perusahaan.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="400">'.$kirim_email->s_alamat.'</td>
</tr>
<tr>
<td width="110">Telepon</td><td width="5">:</td>
<td width="400">'.$kirim_email->s_telp.'</td>
</tr>
</table>
<br>
<br>
 <span>Untuk Melakukan pengadaan alat medis '.$kirim_email->namars.', dengan jumlah dan spesifikasi sebagai berikut :</span><br><br>       
         <table border="1" cellspacing="0"  cellpadding="2">
                            
                      <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
                      <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
                      <th style="text-align:center;line-height:15px;"> Kode Produk </th>
                      <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>       
                      <th width="40" style="text-align:center;line-height:15px;"> Qty </th>
                      <th style="text-align:center;line-height:15px;"> Harga </th>
                       <th style="text-align:center;line-height:15px;"> Subtotal </th>
                      </tr>
            ';

                        
                $barang_jual=$this->m_po->getBarangPenjualan($k_nopo);
                             $no=0;
                              $qty=0;
                        foreach($barang_jual as $row ){
                             $no++; 
                $html.='
                    <tr>
                    <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
                        <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
                        <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
                        <td width="40" align="center" style="line-height:15px;">'.$row->jumlah.'</td>
                        <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga).'</td>
                        <td align="right" style="line-height:15px;">Rp. '.number_format($row->hargaakhir).'</td>
                    </tr>   
                  
                    ';
                    $qty=$qty+$row->hargaakhir; 
                }
                   $html.=' <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>TOTAL</b></td>
                    <td align="right"><b>Rp. '.number_format($qty).'</b></td>
                   </tr>';
                $html.=' <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Diskon</b></td>
                    <td align="right"><b>'.($kirim_email->disc).' %</b></td>
                   </tr>
                    <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Ppn</b></td>
                    <td align="right"><b>'.($kirim_email->ppn).' %</b></td>
                   </tr>
                    <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Grand Total</b></td>
                    <td align="right"><b>Rp. '.number_format($kirim_email->grand_total).'</b></td>
                   </tr>
                   </table>
                   <p><b>Terbilang : <i>'.terbilang($kirim_email->grand_total).' rupiah</i></b></p> 
                                     
                     ';
                      $html.='<span>Adapun persyaratan - persyaratan yang harus dipenuhi adalah sebagai berikut :</span><br>
                  <table border="0">
                   <tr>
                    <td width="10">1. </td>
                    <td width="10"></td>
                    <td width="400">Pengiriman barang dilakukan segera setelah Surat Pesanan (SP) ini diterima </td>
                   </tr>
                    <tr>
                    <td width="10">2. </td>
                    <td width="10"></td>
                    <td width="100">Cara Pembayaran :</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">a.</td>
                    <td>Fraktur dan kuitansi atas nama '.$kirim_email->nm_perus.'</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">b.</td>
                    <td>dibayarkan dengan tempo 2 (dua) minggu setelah barang diterima dalam kondisi baik</td>
                   </tr>
                  </table>
                   ';

                   $html.='<br><br>
          ';

          $html.='
          <table border="0">
          <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left"></td>
          <td width="120"> </td>
          <td width="200" align="left">Jakarta, '.$tanggal.' '.$bulanlist[$bulanss].' '.$tahun.'</td>         
          </tr>
                    <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left">Yang menerima pesanan,</td>
          <td width="120"> </td>
          <td width="200" align="left">Yang memberi pesanan,</td>         
          </tr>
          <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left"></td>
          <td width="120"> </td>
          <td width="200" align="left">'.$kirim_email->namars.'</td>          
          </tr>
          </table>';
          
          $html.='
          <table border="0">
          <tr>
            <td width="100" align="left"></td>
            <td width="200"  align="left" style="line-height:80px;"><br></td>';
          
           $html.='   <td width="120"> </td>
              <td width="200"  align="left" style="line-height:80px;"><br></td>
          </tr> </table>';
          
          $html.='
          <table border="0">
            <tr>
            <td width="100" align="left"></td>
            <td width="200" align="left">'.$kirim_email->nm_perusahaan.'</td>
            <td width="120"> </td>
            <td width="200" align="left"><u>'.$kirim_email->nm_mengetahui.'</u></td>
            </tr>
            <tr>
            <td width="100" align="left"></td>
            <td width="200" align="left"></td>
            <td width="120"> </td>
            <td width="200" align="left">'.$kirim_email->jb_mengetahui.'</td>
            </tr>
            </table>
                    ';

            $foto=$kirim_email->foto;
          if($foto <>'')
          {
            $filename21 = './assets/upload/'.$kirim_email->foto;
          }else{
              $filename21 ='./assets/upload/hhg-logo.png';
          }
         
         $this->email->from('sipa.apps@herminahospitals.com','Sistem Informasi Proses Administrasi');
        $this->email->attach($filename21); 
    $this->email->to($data_r .','.$kirim_email->s_email.',empat@example.com');
     $this->email->cc($recipientArr);
    //$this->email->cc('ndra.cyber@gmail.com');
         $this->email->subject('SURAT PESANAN ' .$kirim_email->nopo);
         $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'c_po/viewallpo');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    function kirim_emailsimpan()
    {
         $k_nopo= $this->uri->segment(3);
            function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
        
         $this->load->model('m_po');
         $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://m001.dapurhosting.com',
               'smtp_user' => 'sipa.apps@herminahospitals.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'sipaappshermina',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
    ];          
                
        $this->load->library('email', $config);
       $this->load->helper('html');
       $this->load->model('m_po');
       $koders = ($this->session->userdata('koders'));
       $cui=date('d m Y');
                $tanggal=substr($cui,0,2);
                $bulanss=(substr($cui,3,2));
                $tahun=substr($cui,6,4);
      $kirim_email = $this->db->get_where('v_pohead',['k_nopo'=> $k_nopo])->row();
      $recipientArr = array('satu@example.com', 'dua@example.com', 'tiga@example.com');
       $data_r ='';
       $kontak = $this->m_po->v_user($koders);
           foreach($kontak as $key => $row ){
                  if($key==0){
                    $data_r .= $row->email;}
                    else{ 
                     $data_r .= ','.$row->email; }
                   }

      $data=date('d m Y',strtotime($kirim_email->tglpo));
                $tgl=substr($data,0,2);
                $bulan=(substr($data,3,2));
                $thn=substr($data,6,4);

       // $datas=date('d m Y ');
       //          $tgll=substr($datas,0,2);
       //          $bulann=ubahbulan(substr($datas,3,2));
       //          $thnn=substr($datas,6,4);

                $bulanlist=array(
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                    );

             $html='
                 <table border="0">

                    <tr>
                     <td width="330" ></td>
    <td width="300" style="text-align:center;font-size:18;font-weight:bold;">'.$kirim_email->namars.'</td>
                    </tr>
            
                    <tr>
                    <td width="330" ></td>
                        <td width="300" style="text-align:center;font-size:10;">'.$kirim_email->alamat.'
                        <br>Website : www.herminahospitalgroup.com
                        </td></tr>
                    </table><hr height="2px"/>
             <b style="margin-bottom:4px;"></b> 
                    
 <b>tanggal <span> : </span>'.$tgl.' '.$bulanlist[$bulan].' '.$thn.'</b><br>
 <b>Status Surat PO <span> : </span>'.$kirim_email->nm_acc.'</b>

                             <p align="center"><b>SURAT PESANAN</b><br>
                             <b>'.$kirim_email->nopo.'</b></p>
<table border="0">
<tr>
<td width="110">Yang memberi pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama</td><td width="5">:</td>
<td width="220">'.$kirim_email->nm_mengetahui.'</td>
</tr>
<tr>
<td width="110">Jabatan</td><td width="5">:</td>
<td width="220">'.$kirim_email->jb_mengetahui.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="220">'.$kirim_email->alamat.'</td>
</tr>
</table><br>
<table border="0">
<tr>
<td width="110">Yang menerima pesanan</td><td width="5">:</td>
</tr>
<tr>
<td width="110">Nama Suplier</td><td width="5">:</td>
<td width="400">'.$kirim_email->nm_perusahaan.'</td>
</tr>
<tr>
<td width="110">Alamat</td><td width="5">:</td>
<td width="400">'.$kirim_email->s_alamat.'</td>
</tr>
<tr>
<td width="110">Telepon</td><td width="5">:</td>
<td width="400">'.$kirim_email->s_telp.'</td>
</tr>
</table>
<br>
<br>
 <span>Untuk Melakukan pengadaan alat medis '.$kirim_email->namars.', dengan jumlah dan spesifikasi sebagai berikut :</span><br><br>       
         <table border="1" cellspacing="0"  cellpadding="2">
                            
                      <tr bgcolor="grey" style="font-weight:bold;line-height:15px;">
                      <th width="25" style="text-align:center; bolt;line-height:15px;" > No </th>              
                      <th style="text-align:center;line-height:15px;"> Kode Produk </th>
                      <th width="200" style="text-align:center;line-height:15px;"> Nama Produk </th>       
                      <th width="40" style="text-align:center;line-height:15px;"> Qty </th>
                      <th style="text-align:center;line-height:15px;"> Harga </th>
                       <th style="text-align:center;line-height:15px;"> Subtotal </th>
                      </tr>
            ';

                        
                $barang_jual=$this->m_po->getBarangPenjualan($k_nopo);
                             $no=0;
                              $qty=0;
                        foreach($barang_jual as $row ){
                             $no++; 
                $html.='
                    <tr>
                    <td width="25" align="center" style="line-height:15px;">'.$no.'</td>
                        <td  align="center" style="line-height:15px;">'.$row->kode_produk.'</td>
                        <td width="200" align="justify" style="line-height:15px;">'.$row->nama_produk.'</td>
                        <td width="40" align="center" style="line-height:15px;">'.$row->jumlah.'</td>
                        <td align="right" style="line-height:15px;">Rp. '.number_format($row->harga).'</td>
                        <td align="right" style="line-height:15px;">Rp. '.number_format($row->hargaakhir).'</td>
                    </tr>   
                  
                    ';
                    $qty=$qty+$row->hargaakhir; 
                }
                   $html.=' <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>TOTAL</b></td>
                    <td align="right"><b>Rp. '.number_format($qty).'</b></td>
                   </tr>';
                $html.=' <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Diskon</b></td>
                    <td align="right"><b>'.($kirim_email->disc).' %</b></td>
                   </tr>
                    <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Ppn</b></td>
                    <td align="right"><b>'.($kirim_email->ppn).' %</b></td>
                   </tr>
                    <tr>
                    <td colspan="5" align="center" bgcolor="skyblue"><b>Grand Total</b></td>
                    <td align="right"><b>Rp. '.number_format($kirim_email->grand_total).'</b></td>
                   </tr>
                   </table>
                   <p><b>Terbilang : <i>'.terbilang($kirim_email->grand_total).' rupiah</i></b></p> 
                   <br><br>                  
                     ';

                        $html.='<span>Adapun persyaratan - persyaratan yang harus dipenuhi adalah sebagai berikut :</span><br>
                  <table border="0">
                   <tr>
                    <td width="10">1. </td>
                    <td width="10"></td>
                    <td width="400">Pengiriman barang dilakukan segera setelah Surat Pesanan (SP) ini diterima </td>
                   </tr>
                    <tr>
                    <td width="10">2. </td>
                    <td width="10"></td>
                    <td width="100">Cara Pembayaran :</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">a.</td>
                    <td>Fraktur dan kuitansi atas nama '.$kirim_email->nm_perus.'</td>
                   </tr>
                   <tr>
                    <td width="30"></td>
                    <td width="10">b.</td>
                    <td>dibayarkan dengan tempo 2 (dua) minggu setelah barang diterima dalam kondisi baik</td>
                   </tr>
                  </table>
                   ';

                   $html.='<br><br>
          ';

          $html.='
          <table border="0">
          <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left"></td>
          <td width="120"> </td>
          <td width="200" align="left">Jakarta, '.$tanggal.' '.$bulanlist[$bulanss].' '.$tahun.'</td>         
          </tr>
                    <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left">Yang menerima pesanan,</td>
          <td width="120"> </td>
          <td width="200" align="left">Yang memberi pesanan,</td>         
          </tr>
          <tr>
          <td width="100" align="left"></td>
          <td width="200" align="left"></td>
          <td width="120"> </td>
          <td width="200" align="left">'.$kirim_email->namars.'</td>          
          </tr>
          </table>';
          
          $html.='
          <table border="0">
          <tr>
            <td width="100" align="left"></td>
            <td width="200"  align="left" style="line-height:80px;"><br></td>';
          
           $html.='   <td width="120"> </td>
              <td width="200"  align="left" style="line-height:80px;"><br></td>
          </tr> </table>';
          
          $html.='
          <table border="0">
            <tr>
            <td width="100" align="left"></td>
            <td width="200" align="left">'.$kirim_email->nm_perusahaan.'</td>
            <td width="120"> </td>
            <td width="200" align="left"><u>'.$kirim_email->nm_mengetahui.'</u></td>
            </tr>
            <tr>
            <td width="100" align="left"></td>
            <td width="200" align="left"></td>
            <td width="120"> </td>
            <td width="200" align="left">'.$kirim_email->jb_mengetahui.'</td>
            </tr>
            </table>
                    ';

            $foto=$kirim_email->foto;
          if($foto <>'')
          {
            $filename21 = './assets/upload/'.$kirim_email->foto;
          }else{
              $filename21 ='./assets/upload/hhg-logo.png';
          }
         
         $this->email->from('sipa.apps@herminahospitals.com','Sistem Informasi Proses Administrasi');
        $this->email->attach($filename21); 
       $this->email->to($data_r);
       $this->email->cc($recipientArr);  
       $this->email->subject('SURAT PESANAN ' .$kirim_email->nopo);
         $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'c_po/viewallpo');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

  
}
  
  
  
  
