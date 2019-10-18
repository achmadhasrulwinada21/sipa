<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_poacc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('u_name')){
		$this->session->set_flashdata("alerts", "<div class='alerts alert-danger'><strong>Sesi Anda Telah Habis, Silahkan login kembali..</strong></div>");
			redirect('dashboard');

		}
	}

		
	function get_perush_PO(){
		$this->load->model('m_poacc');
		$koper=$this->input->post('koper');
		$data=$this->m_poacc->get_data_perush_PO($koper);
		echo json_encode($data);
	}

  function get_detilbarangpo(){
    $this->load->model('m_poacc');
    $dara22=$this->input->post('kode_produk');
    $data=$this->m_poacc->get_data_barang_PO($dara22);
    echo json_encode($data);
  }
	

	function remove(){
        $row_id=$this->uri->segment(3);
        $koper=$this->uri->segment(4);
        $k_nopo=$this->uri->segment(5);
        $this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
         redirect('C_poacc/detailcart/'.$koper.'/'.$k_nopo.'');
    }
	
	public function index()
	{
		$this->load->model('m_poacc');
	
		$data = array(
			'namars' => $this->session->userdata('namars'),	
			'koders' => '',
			'cdate' => '',
			'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'kodeunik' => $this->m_poacc->buat_kode(),
			'kodeunik21' => $this->m_poacc->buat_koderelasi(),
			'kode_alkes'=> $this->m_poacc->GetKode_Perush_POalkes("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array(),
			// 'data_barang'=>$this->m_poacc->getBarangALKESPO($koper),
			
		);

	  $this->template->Display('po/form_poacc',$data);
	}

     function detailcart()
    {
         $koper= $this->uri->segment(3);
         $k_nopo= $this->uri->segment(4);
        $this->load->model('m_poacc');
            $data = array(
            'tr' => $this->db->get_where('poheader',['k_nopo'=>$k_nopo])->row(),
             'pr' => $this->db->get_where('v_pohead',['k_nopo'=>$k_nopo])->row(),
            'namars' => $this->session->userdata('namars'), 
            'koders' => '',
            'cdate' => '',
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'kodeunik' => $this->m_poacc->buat_kode(),
            'kodeunik21' => $this->m_poacc->buat_koderelasi(),
            'kode_alkes'=> $this->m_poacc->GetKode_Perush_POalkes("where id_tipe_produk='TP003' order by nm_perusahaan ASC")->result_array(),
            'data_barang'=>$this->m_poacc->getBarangALKESPO($koper),
            
        );

      $this->template->Display('po/form_poacc2',$data);
    }


function Tambah_penjualan(){
        $this->load->model('m_poacc');
        $ids= $this->uri->segment(3);
        $id=str_replace("%20","",str_replace("%2F","/",$ids));
        $data=array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'namars' => $this->session->userdata('namars'), 
            'dt_penjualan'=>$this->m_poacc->getDataPenjualan($id),
            'barang_jual'=>$this->m_poacc->getBarangPenjualan($id),
            'tr'=>$this->db->get_where('accpoheader',['k_nopo'=>$id])->row(),
        );
       $this->template->Display('formpenerimaan/form_poaccdetil',$data);
    }

    function simpan_acc(){
        $this->load->model('m_poacc');
            $kode_produk = $_POST['kode_produk'];
            $k_nopo = $_POST['k_nopo'];
            $nopo = $_POST['nopo'];
            $jumlahAcc = $_POST['jumlahacc'];
            $harga = $_POST['harga'];
            $status= $_POST['status'];
            $jumlah = $_POST['jumlah'];
            $status_pengajuan= $_POST['status_pengajuan'];
            $peruntukan= $_POST['peruntukan'];
            $nm_app='kirim data';
                                             
      $data = array();
        for ($i = 0; $i < count($this->input->post('kode_produk')); $i++)
             {
            
        $data[$i]= array(   
            'k_nopo' => $k_nopo,
            'nopo' => $nopo,
            'kode_produk' => $kode_produk[$i],
            'jumlahacc' => $jumlahAcc[$i],
            'harga' => $harga[$i],
            'jumlah' => $jumlah[$i],
            'peruntukan' => $peruntukan[$i],
            'status_pengajuan' => $status_pengajuan[$i],
            );

        }
         
   
          $dataannisa = array(
            'k_nopo'=> $k_nopo,
            'status'=>$status,  
            'nm_app'=>$nm_app,         
             );
           $this->m_poacc->uul($dataannisa);
          $this->m_poacc->Simpanall('accpodetail', $data);
         
          redirect('C_poacc/tampilpoacc');
        
    }
    
	function detail_penjualan(){
		$this->load->model('m_poacc');
        $ids= $this->uri->segment(3);
        $id=str_replace("%20","",str_replace("%2F","/",$ids));
        $data=array(
        	'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),	
            'dt_penjualan'=>$this->m_poacc->getDataPenjualan21($id),
            'barang_jual'=>$this->m_poacc->getBarangPenjualan($id),
            'barang_jual2'=>$this->m_poacc->getBarangPenjualan21($id),
        );
       $this->template->Display('formpenerimaan/v_dtlreceive',$data);
    }

    function detail_edit(){
    $this->load->model('m_poacc');
        $ids= $this->uri->segment(3);
        $id=str_replace("%20","",str_replace("%2F","/",$ids));
        $data=array(
         'nama' => $this->session->userdata('nama'), 
         'cabang' => $this->session->userdata('cabang'),
         'namars' => $this->session->userdata('namars'), 
         'dt_penjualan'=>$this->m_poacc->getDataPenjualan21($id),
         'barang_jual'=>$this->m_poacc->getBarangPenjualan($id),
         'data_aprove' => $this->m_poacc->getBarangPenjualan21($id),
         'barang_jual2'=>$this->m_poacc->getBarangPenjualan21($id)
        );
       $this->template->Display('formpenerimaan/receiveedit',$data);
    }

    function cetakpo(){
    	$this->load->library('Tpdf');
		$this->load->model('m_poacc');
        $id= $this->uri->segment(3);
        $data=array(
        	'nama' => $this->session->userdata('nama'),	
			'cabang' => $this->session->userdata('cabang'),
			'namars' => $this->session->userdata('namars'),	
            'dt_penjualan'=>$this->m_poacc->getDataPenjualan21($id),
            'barang_jual'=>$this->m_poacc->getBarangPenjualan($id),
            'barang_jual2'=>$this->m_poacc->getBarangPenjualan21($id),
        );
       $this->load->view('formpenerimaan/cetakreceive',$data);
    }

    
    function simpan_header_po(){
        
        $this->load->model('m_poacc');

         $nm_app ='Draff';
         $k_nopo= $_POST['k_nopo'];
         $tgl=$_POST['tgl_penerimaan'];
         $nm_mengetahui=$this->session->userdata('nama');
         $jb_mengetahui=$this->session->userdata('nama_role');
         
        $data = array(
            'k_nopo'=>$k_nopo,
            'tglpenerimaan'=>$tgl,
            'nm_app'=>$nm_app,
            'nm_mengetahui'=>$nm_mengetahui,
            'jb_mengetahui'=>$jb_mengetahui,       
          
        );
        $this->m_poacc->insertData("accpoheader",$data);

	 redirect('C_poacc/tampilpoacc');
    }
	
	function simpan_po(){
		
		$this->load->model('m_poacc');
              $k_nopo=$_POST['k_nopo'];
            $data = array(
            'nopo'=>$this->input->post('nopo'),
            'k_nopo'=> $k_nopo,
            // 'disc'=>$this->input->post('disc'),
            // 'ppn'=>$this->input->post('ppn'),
           
        );
          $this->m_poacc->Updatehead($data);

         foreach($this->cart->contents() as $items){
            $kode_produk = $items['id'];
            $jumlah = $items['qty'];
            $harga = $items['price'];
            $subtotal = $items['subtotal'];
            $data_detail = array(
                'nopo' => $this->input->post('nopo'),
                'k_nopo' => $this->input->post('k_nopo'),
                'kode_produk'=> $kode_produk,
                'jumlah'=>$jumlah,
                'harga'=>$harga,
                'hargaakhir'=>$subtotal,
            );
            $this->m_poacc->insertData("podetail",$data_detail);

          
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
      // redirect('C_poacc/viewallpo');
    redirect('C_poacc/kirim_emailsimpan/'.$k_nopo.'');
    }

    function tampilpoacc()
	{
		$namars=($this->session->userdata('namars'));
        $koders=($this->session->userdata('koders'));
        $namarole=($this->session->userdata('nama_role'));
		$dept=($this->session->userdata('departemen'));
		$this->load->model('m_poacc');
         $data['data_po'] = $this->m_poacc->viewpo("WHERE v_poditerima.k_nopo NOT IN (SELECT k_nopo FROM accpoheader) and koders='$koders'")->result_array();
        $data['ttd'] = $this->m_poacc->masterttd("where role='$namarole'")->result_array();
        $data['ttdrs'] = $this->m_poacc->masterttd("where role='$namarole' and cbgrs='$koders'")->result_array();
        $data['data_aprove'] = $this->m_poacc->viewpoacc()->result_array();
        $data['nama']=$this->session->userdata('nama');	
		$data['cabang'] = $this->session->userdata('cabang');  			

		$this->template->display('formpenerimaan/tampilacc', $data);
	}

     public function ajax_listalkespoacc()
    {
        
    	$this->load->model('m_poacc');
        $list = $this->m_poacc->get_datatablesalkes();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $produkpo) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';
            $row[] = '<center>'.date('Y-m-d',strtotime($produkpo->tglpenerimaan)).'</center>';
            $row[] = '<center>'.$produkpo->nopo.'</center>';
             $row[] = '<center>'.$produkpo->namars.'</center>';
              $row[] = '<center>'.$produkpo->nm_perusahaan.'</center>';
            $row[] = '<center>'.$produkpo->jumlah.'</center>';
            $row[] = '<center>Rp. '. number_format($produkpo->totalharga, 0,',','.') .',-</center>';

            if($produkpo->nm_app == "Disetujui Direktur RS") {              
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;">Disetujui Direktur RS</p></center>';
            }elseif($produkpo->nm_app == "Disetujui Manager RS"){
            $row[] =  '<center><p style="background-color:blue;color:white;text-align:center;">Disetujui Manager RS</p></center>';
            }elseif($produkpo->nm_app == "diterima"){
            $row[] =  '<center><p style="background-color:green;color:white;text-align:center;font-weight:bold;">Produk Diterima</p></center>';
                 }else{
            $row[] =  '<center><p style="background-color:yellow;color:black;text-align:center;font-weight:bold;">Draff</p></center>';
                 }
             $ynwa = ($this->session->userdata('koderole'));
             if($ynwa=='88' && $produkpo->status == "0" ):  
                $row[] = '<center><a href="Tambah_penjualan/'.$produkpo->k_nopo.'" class="edit_record btn btn-sm btn btn-primary" title="Tambah Detail" onclick=""><i class="glyphicon glyphicon-plus"></i></a></center>';
                  endif;

                   $ynwa = ($this->session->userdata('koderole'));
             if($ynwa=='88' && $produkpo->status == "1" ):  
                $row[] = '<center><span class="edit_record btn btn-sm btn" title="Tambah Detail" onclick=""><i class="glyphicon glyphicon-plus"></i></span></center>';
                  endif;
                $ynwa = ($this->session->userdata('koderole'));
         if($produkpo->nm_app <> "Draff"):
             $row[] = '<center><a title="approve" style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit'.$produkpo->k_nopo.'"><i class="glyphicon glyphicon-ok"></i></a></center>';
              endif;
                   $ynwa = ($this->session->userdata('koderole'));
         if($produkpo->nm_app == "Draff"):
             $row[] = '<center><span title="kirim data" style="margin-bottom:3px;" class="btn btn-sm"><i class="glyphicon glyphicon-ok"></i></span></center>';
              endif;
            $row[] = '<center><a href="detail_penjualan/'.$produkpo->k_nopo.'" class="edit_record btn btn-sm btn btn-warning" title="Detail" onclick=""><i class="glyphicon glyphicon-eye-open"></i></a></center>';

            $row[] = '<center><a target="blank" href="cetakpo/'.$produkpo->k_nopo.'" class="btn btn-sm btn-info" title="print" onclick=""><i class="glyphicon glyphicon-print"></i></a></center>';
                
          $ynwa = ($this->session->userdata('koderole'));
         if($ynwa=='88' && ($produkpo->nm_app == "Draff" || $produkpo->nm_app == "kirim data")):  
             $row[] = '<center><a href="detail_edit/'.$produkpo->k_nopo.'" class="edit_record btn btn-sm btn-primary" title="Update" onclick=""><i class="glyphicon glyphicon-edit"></i></a></center>';
            $row[] = '<center>  <a class="btn btn-danger btn-sm" title="Hapus" href="hapus/'.$produkpo->k_nopo.'" onclick="return doconfirm();"> <i class="glyphicon glyphicon-trash"></i></a>
				</center>';	 
                endif;   	 
           $ynwa = ($this->session->userdata('koderole'));
         if($ynwa=='88' && ($produkpo->nm_app <> "Draff" || $produkpo->nm_app <> "kirim data") ):
             $row[] = '<center><span class="edit_record btn btn-sm" title="Update" onclick=""><i class="glyphicon glyphicon-edit"></i></span></center>';
            $row[] = '<center>  <span class="btn btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></span>
        </center>';  
                endif;         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_poacc->count_all(),
                        "recordsFiltered" => $this->m_poacc->count_filteredalkes(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function hapus(){
    	$this->load->model('m_poacc');
        $hapus = $this->uri->segment(3);
       
        $result = $this->m_poacc->Hapus('accpoheader', array('k_nopo' => $hapus));
        $result2 = $this->m_poacc->Hapus('accpodetail', array('k_nopo' => $hapus));
        if($result == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'C_poacc/tampilpoacc');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'C_poacc/tampilpoacc');
        }
        if($result2 == 1){
            $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Hapus data BERHASIL dilakukan</strong></div>");
            header('location:'.base_url().'C_poacc/tampilpoacc');
        }else{
            $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Hapus data GAGAL di lakukan</strong></div>");
            header('location:'.base_url().'C_poacc/tampilpoacc');
        }
    }
     
   
    function updateaprovecekcui(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('m_poacc');

             $k_nopo=$_POST['k_nopo'];
             $mengetahui=$_POST['mengetahui'];
             $nm_mengetahui=$_POST['nm_mengetahui'];
             $jb_mengetahui=$_POST['jb_mengetahui'];    
        $status=$_POST['nm_app'];
        $dataannisa = array(
        'k_nopo' =>$this->input->post('k_nopo'),
        'mengetahui' =>$this->input->post('mengetahui'),
        'nm_mengetahui' =>$this->input->post('nm_mengetahui'),
        'jb_mengetahui' =>$this->input->post('jb_mengetahui'),
        'nm_app'=>$status,
                );
        $this->load->model('m_poacc');
        $hasil = $this->m_poacc->uul($dataannisa);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'C_poacc/tampilpoacc');
        // header('location:'.base_url().'C_poacc/kirim_email/'.$k_nopo.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'C_poacc/tampilpoacc');
        // header('location:'.base_url().'C_poacc/kirim_email/'.$k_nopo.'');
        }
   }

function updatedetail(){
       $ynwa = ($this->session->userdata('koderole'));
     $this->load->model('m_poacc');

             $idpodtlacc=$_POST['idpodtlacc'];
             $k_nopo=$_POST['k_nopo'];
             $kode_produk=$_POST['kode_produk'];
             $harga=$_POST['total'];
             $jumlah=$_POST['jumlah'];
                                        
        $data = array(
        'k_nopo' =>$k_nopo,
        'idpodtlacc' =>$idpodtlacc,
        'kode_produk' =>$kode_produk,
        'harga' =>$harga,
        'jumlahacc' =>$jumlah,
             );
       
         $this->load->model('m_poacc');
        $hasil = $this->m_poacc->Updatedetilpo($data);
         if($hasil>=0){
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>approve BERHASIL di lakukan</strong></div>");
        header('location:'.base_url().'C_poacc/detail_edit/'.$k_nopo.'');
        }else{
        $this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>reset data GAGAL di lakukan</strong></div>");
        header('location:'.base_url().'C_poacc/detail_edit/'.$k_nopo.'');
        }
    
}



function kirim_email()
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
        
         $this->load->model('m_poacc');
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
       $this->load->model('m_poacc');
       $koders = ($this->session->userdata('koders'));
      
      $kirim_email = $this->db->get_where('v_pohead',['k_nopo'=> $k_nopo])->row();
      $recipientArr = array('satu@example.com', 'dua@example.com', 'tiga@example.com');
       $data_r ='';
       $kontak = $this->m_poacc->v_user($koders);
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

                        
                $barang_jual=$this->m_poacc->getBarangPenjualan($k_nopo);
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
         $this->email->subject('Surat Pengajuan PO ' .$kirim_email->nopo);
         $this->email->message($html); 
        if ($this->email->send())
            {
        $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL di lakukan dan dikirim</strong></div>");
           header('location:'.base_url().'C_poacc/tampilpoacc');
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

   	
}
	
	
	
	