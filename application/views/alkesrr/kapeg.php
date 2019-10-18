<?php
function savedetil(){
		$this->load->model('malkesrr');

		$kode_trans = $_POST['kode_transaksi'];
		$jenis_listing = $_POST['jenis_listing'];
		$koper = $_POST['koper'];
		$stse_kat = $_POST['stse_kat'];
        $stsregister = $_POST['stsregister'];
        $includeongkir=$_POST['includeongkir'];
        $biaya_pengiriman = $_POST['biaya_pengiriman'];
      //  $jenis_pembayaran = $_POST['jenis_pembayaran'];
        $ppn = $_POST['ppn'];
		$kode_produk = $_POST['kode_produk'];
		$harga = $_POST['harga'];
		$tahunke1 = $_POST['tahunke1'];
		$tahunke2 = $_POST['tahunke2'];
		$tahunke3 = $_POST['tahunke3'];
		$tahunke4 = $_POST['tahunke4'];
		$tahunke5 = $_POST['tahunke5'];
	    $persentase1 = $_POST['persentase1'];
		$persentase2 = $_POST['persentase2'];
		$persentase3 = $_POST['persentase3'];
		$persentase4 = $_POST['persentase4'];
		$persentase5 = $_POST['persentase5'];
		$fee = $_POST['fee'];
		$ket = $_POST['ket'];
        $discount = $_POST['discount'];
		$garansi = $_POST['garansi'];
		$garansifree = $_POST['garansifree'];
		$note = $_POST['note'];
		$isi ='1';
		$statuslist_detil ='diajukan';

        $datatgl = $this->malkesrr->Getalkesdetil("where kode_produk='$kode_produk' and kode_transaksi='$kode_trans'")->result_array();
            
		$data= array(	
			'kode_transaksi' => $kode_trans,
			'kode_produk' => $kode_produk,
			'koper' => $koper,
			'harga_baru' => $harga,
			'diskon_baru' => $discount,
			'ppn_baru' => $ppn,
			'stse_kat' => $stse_kat,
			'stsregister' => $stsregister,
      'includeongkir'=>$includeongkir,
			'tahunke1' => $tahunke1,
			'tahunke2' => $tahunke2,
			'tahunke3' => $tahunke3,
			'tahunke4' => $tahunke4,
			'tahunke5' => $tahunke5,  
			'persentase1' => $persentase1,
			'persentase2' => $persentase2,
			'persentase3' => $persentase3,
			'persentase4' => $persentase4,
			'persentase5' => $persentase5,
			'fee' => $fee,
			//'jenis_pembayaran' =>$jenis_pembayaran,
			'biaya_pengiriman' =>$biaya_pengiriman,
			'ket' => $ket,
			'garansi' => $garansi,
			'garansifree' => $garansifree,
			'note' => $note,
			'statuslist_detil' =>$statuslist_detil,
		   	'createby' =>  $this->session->userdata('nama'),			
			);

			
		
		$obid = isset($datatgl[0]['kode_produk']);
		$tgltr = isset($datatgl[0]['kode_transaksi']);

				if($obid == $kode_produk && $tgltr == $kode_trans){

			$this->session->set_flashdata("sukses", "<div class='alert alert-danger'><strong>Obat tersebut sudah ada!!!</strong></div>");
			header('location:'.base_url().'Alkesrr/adddetail/'.$kode_trans.'/'.$jenis_listing.'/'.$koper.'');
		}else{

$daraannisa=$this->db->query("select * from m_kapeg where kode_produk='$kode_produk'")->result_array();

         foreach ($daraannisa as $dara) {
          $dara['kode_produk'];
          }

      if($kode_produk != $dara['kode_produk']):
         $this->session->set_flashdata("sukses", "<div class='alert alert-warning'><strong>produk belum kapeg!!!</strong></div>");
      endif;
      if($kode_produk == $dara['kode_produk']):
			$result = $this->malkesrr->Save_alkesrrdetil($data);
			$head="UPDATE listingrrhead set  
		                        isi='$isi' 
								WHERE kode_transaksi = '$kode_trans'";
	            $this->db->query($head);
              $this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Proses Simpan data  BERHASIL dilakukan.Terima Kasih</strong></div>");
      endif;  
		
			header('location:'.base_url().'Alkesrr/adddetail/'.$kode_trans.'/'.$jenis_listing.'/'.$koper.'');
		}
		
	}