
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EDIT NOTA PEMBAYARAN RENCANA KENDALI ANGGARAN TENAGA KERJA RS BARU</b>
        </h4>
        
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">

                <!-- Tampilan BUSDEV-->
                <?php if($this->session->userdata('koderole')=='7'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title"> EDIT NOTA PEMBAYARAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>notapembayaran/updatenota" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                     <div class="form-group">
                      <h7> * Isi Data yang Masih Kosong</h7>
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_trnota;?>" id="" name="id_trnota">
                    </div>

                    <!--  <div class="form-group">
                      <label for="">Nama Perusahaan </label>
                      <label for="Nama Perusahaan"></label>
                        <input type="text" class="form-control" value="<?php echo $nama_pt;?>" id="" name="nama_pt" placeholder="" readonly="" >
                    </div> -->

                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <select name="nama_pt" class="form-control" readonly>
                          <option>--Pilih Perusahaan--</option>
                      
                            <?php foreach($perusahaan as $datapt) {

                          if(!in_array($datapt['kodep'],$pt_post)){ ?>
                              <option  value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                      
                    <div class="form-group">

                      <label for="">No. Bukti </label>
                        <input type="text" class="form-control" value="<?php echo $no_bukti;?>" id4r6 ="" name="no_bukti" placeholder="No. Bukti" readonly>
                    </div>

                   <!--  <div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier;?>" id="" name="supplier" placeholder="supplier" readonly="">                        
                    </div> -->

                    <div class="form-group">
                      <label for="">Supplier</label>
                        <select name="supplier" class="form-control" readonly>
                          <option>--Pilih Supplier--</option>
                      
                            <?php foreach($supplier as $datasupp) {

                          if(!in_array($datasupp['kode_supplier'],$supp_post)){ ?>
                              <option  value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                      <div class="form-group">
                      <label for="">No. Perkiraan</label>
                        <input type="text" class="form-control" value="<?php echo $no_perkiraan;?>" id="" name="no_perkiraan" placeholder="No. Perkiraan" readonly="">                        
                    </div>
                
                     <div class="form-group">
                      <label for="">No. Giro / Cek</label>
                        <input type="text" class="form-control" value="<?php echo $no_girocek;?>" id="" name="no_girocek" placeholder="No. Giro / Cek" readonly="">                        
                    </div>
                     <div class="form-group">
                      <label for="">No. Rekening</label>
                        <input type="text" class="form-control" value="<?php echo $no_rek;?>" id="" name="no_rek" placeholder="No. Rekening" readonly="">                        
                    </div>
                     <div class="form-group">
                      <label for="">Bank</label>
                          <input type="text" class="form-control" value="<?php echo $bank;?>" id="" name="bank" placeholder="Bank" readonly=""> 
                    </div>

                     <div class="form-group">
                      <label for="">Keterangan</label>
                      <input type="text" class="form-control" value="<?php echo $keterangan;?>" id="" name="keterangan" placeholder="Keterangan" readonly=""> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">No. Invoice</label>
                      <input type="text" class="form-control" value="<?php echo $no_invoice;?>" id="" name="no_invoice" placeholder="No. Invoice" readonly=""> 
                    </div>

                     <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" readonly="">                        
                    </div>

                     <div class="form-group">
                      <label for="">Tagihan</label>
                      <input type="text" class="form-control" value="<?php echo $tagihan;?>" id="" name="tagihan" placeholder="Tagihan" readonly=""> 
                    </div>

                    <div class="form-group">
                      <label for="">Pembayaran</label>
                      <input type="text" class="form-control" value="<?php echo $pembayaran;?>" id="" name="pembayaran" placeholder="Pembayaran" readonly=""> 
                    </div>

                    <div class="form-group">
                      <label for="">Sisa</label>
                      <input type="text" class="form-control" value="<?php echo $sisa;?>" id="" name="sisa" placeholder="Sisa" readonly=""> 
                    </div>

                    <div class="form-group">
                    <label for="">Upload Lampiran</label>
                      <input type="hidden" name="lampiran" value="<?php echo $lampiran; ?>">
                        <input type="file" class="form-control" value="" id="" name="file_uploadlampiran" placeholder="">
                        <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $lampiran; ?>" class="img-circl" alt="User Image" />  
                             
                    </div>

                     <div class="form-group">
                      <label for="">Nama PIC</label>
                      <input type="text" class="form-control" value="<?php echo $pic;?>" id="" name="pic" placeholder="Isi Nama PIC" readonly="" > 
                    </div>
                
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemohon;?>" id="" name="pemohon" placeholder="Tanda Tangan Pemohon" required> 
                    </div>

                <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemohon;?>" id="" name="nama_pemohon" placeholder="Nama Penandatangan Pemohon" required> 
                    </div>

                    <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $ptgs_jurnal;?>" id="" name="ptgs_jurnal" placeholder="Tanda Tangan Petugas Jurnal" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_jurnal;?>" id="" name="nama_jurnal" placeholder="Nama Penandatangan Petugas Jurnal" required> 
                    </div>

                    <div class="form-group">       
                      <input type="hidden" class="form-control" value="<?php echo $bag_akuntansi;?>" id="" name="bag_akuntansi" placeholder="Tanda Tangan Bagian Akuntansi" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_akuntansi;?>" id="" name="nama_akuntansi" placeholder="Nama Penandatangan Bagian Akuntansi" required> 
                    </div>

                    <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $perse_bayar;?>" id="" name="perse_bayar" placeholder="Tanda Tangan Persetujuan Bayar" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_persebayar;?>" id="" name="nama_persebayar" placeholder="Nama Penandatangan Persetujuan Bayar" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemeriksa;?>" id="" name="pemeriksa" placeholder="Tanda Tangan Pemeriksa" required> 
                    </div>

                <div class="form-group"> 
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemeriksa;?>" id="" name="nama_pemeriksa" placeholder="Nama Penandatangan Pemeriksa" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek1;?>" id="" name="sign_cek1" placeholder="Nama Penandatangan signcek1" required> 
                    </div>

                <div class="form-group"> 
                      <input type="hidden" class="form-control" value="<?php echo $nama_signcek1;?>" id="" name="nama_signcek1" placeholder="Nama Penandatangan nama signcek1" required> 
                    </div>

                    <div class="form-group">  
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Tanda Tangan Cek 2" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Nama Penandatangan Cek 2" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $catatan;?>" id="" name="catatan" placeholder="Catatan" required> 
                    </div>

                    <?php endif;?>

                <!-- Tampilan Read Only-->
                 <?php
                 $edit=($this->session->userdata('koderole'));

                  if($edit=='10' OR $edit=='25' OR $edit=='26' OR $edit=='27' OR $edit=='29' OR $edit=='28' OR $edit=='17'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title"> EDIT NOTA PEMBAYARAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>notapembayaran/updatenota" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                     <div class="form-group">
                      <h7> * Isi Data yang Masih Kosong</h7>
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_trnota;?>" id="" name="id_trnota">
                    </div>

                    <!--  <div class="form-group">
                      <label for="">Nama Perusahaan </label>
                      <label for="Nama Perusahaan"></label>
                        <input type="text" class="form-control" value="<?php echo $nama_pt;?>" id="" name="nama_pt" placeholder="" readonly="" >
                    </div> -->

                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <select name="nama_pt" class="form-control" readonly>
                          <option>--Pilih Perusahaan--</option>
                      
                            <?php foreach($perusahaan as $datapt) {

                          if(!in_array($datapt['kodep'],$pt_post)){ ?>
                              <option  value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                      
                    <div class="form-group">

                      <label for="">No. Bukti </label>
                        <input type="text" class="form-control" value="<?php echo $no_bukti;?>" id4r6 ="" name="no_bukti" placeholder="No. Bukti" readonly>
                    </div>

                   <!--  <div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier;?>" id="" name="supplier" placeholder="supplier" readonly="">                        
                    </div> -->

                    <div class="form-group">
                      <label for="">Supplier</label>
                        <select name="supplier" class="form-control" readonly>
                          <option>--Pilih Supplier--</option>
                      
                            <?php foreach($supplier as $datasupp) {

                          if(!in_array($datasupp['kode_supplier'],$supp_post)){ ?>
                              <option  value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                      <div class="form-group">
                      <label for="">No. Perkiraan</label>
                        <input type="text" class="form-control" value="<?php echo $no_perkiraan;?>" id="" name="no_perkiraan" placeholder="No. Perkiraan" readonly="">                        
                    </div>
                
                     <div class="form-group">
                      <label for="">No. Giro / Cek</label>
                        <input type="text" class="form-control" value="<?php echo $no_girocek;?>" id="" name="no_girocek" placeholder="No. Giro / Cek" readonly="">                        
                    </div>
                     <div class="form-group">
                      <label for="">No. Rekening</label>
                        <input type="text" class="form-control" value="<?php echo $no_rek;?>" id="" name="no_rek" placeholder="No. Rekening" readonly="">                        
                    </div>
                     <div class="form-group">
                      <label for="">Bank</label>
                          <input type="text" class="form-control" value="<?php echo $bank;?>" id="" name="bank" placeholder="Bank" readonly=""> 
                    </div>

                     <div class="form-group">
                      <label for="">Keterangan</label>
                      <input type="text" class="form-control" value="<?php echo $keterangan;?>" id="" name="keterangan" placeholder="Keterangan" readonly=""> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">No. Invoice</label>
                      <input type="text" class="form-control" value="<?php echo $no_invoice;?>" id="" name="no_invoice" placeholder="No. Invoice" readonly=""> 
                    </div>

                     <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" readonly="">                        
                    </div>

                     <div class="form-group">
                      <label for="">Tagihan</label>
                      <input type="text" class="form-control" value="<?php echo $tagihan;?>" id="" name="tagihan" placeholder="Tagihan" readonly=""> 
                    </div>

                    <div class="form-group">
                      <label for="">Pembayaran</label>
                      <input type="text" class="form-control" value="<?php echo $pembayaran;?>" id="" name="pembayaran" placeholder="Pembayaran" readonly=""> 
                    </div>

                    <div class="form-group">
                      <label for="">Sisa</label>
                      <input type="text" class="form-control" value="<?php echo $sisa;?>" id="" name="sisa" placeholder="Sisa" readonly=""> 
                    </div>

                    <div class="form-group">
                    <label for="">Upload Lampiran</label>
                      <input type="hidden" name="lampiran" value="<?php echo $lampiran; ?>">
                        <input type="file" class="form-control" value="" id="" name="file_uploadlampiran" placeholder="">
                        <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $lampiran; ?>" class="img-circl" alt="User Image" />  
                             
                    </div>

                     <div class="form-group">
                      <label for="">Nama PIC</label>
                      <input type="text" class="form-control" value="<?php echo $pic;?>" id="" name="pic" placeholder="Isi Nama PIC" readonly="" > 
                    </div>
                
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemohon;?>" id="" name="pemohon" placeholder="Tanda Tangan Pemohon" required> 
                    </div>

                <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemohon;?>" id="" name="nama_pemohon" placeholder="Nama Penandatangan Pemohon" required> 
                    </div>

                    <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $ptgs_jurnal;?>" id="" name="ptgs_jurnal" placeholder="Tanda Tangan Petugas Jurnal" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_jurnal;?>" id="" name="nama_jurnal" placeholder="Nama Penandatangan Petugas Jurnal" required> 
                    </div>

                    <div class="form-group">       
                      <input type="hidden" class="form-control" value="<?php echo $bag_akuntansi;?>" id="" name="bag_akuntansi" placeholder="Tanda Tangan Bagian Akuntansi" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_akuntansi;?>" id="" name="nama_akuntansi" placeholder="Nama Penandatangan Bagian Akuntansi" required> 
                    </div>

                    <div class="form-group">                      
                      <input type="hidden" class="form-control" value="<?php echo $perse_bayar;?>" id="" name="perse_bayar" placeholder="Tanda Tangan Persetujuan Bayar" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_persebayar;?>" id="" name="nama_persebayar" placeholder="Nama Penandatangan Persetujuan Bayar" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemeriksa;?>" id="" name="pemeriksa" placeholder="Tanda Tangan Pemeriksa" required> 
                    </div>

                <div class="form-group"> 
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemeriksa;?>" id="" name="nama_pemeriksa" placeholder="Nama Penandatangan Pemeriksa" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek1;?>" id="" name="sign_cek1" placeholder="Nama Penandatangan signcek1" required> 
                    </div>

                <div class="form-group"> 
                      <input type="hidden" class="form-control" value="<?php echo $nama_signcek1;?>" id="" name="nama_signcek1" placeholder="Nama Penandatangan nama signcek1" required> 
                    </div>

                    <div class="form-group">  
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Tanda Tangan Cek 2" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Nama Penandatangan Cek 2" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $catatan;?>" id="" name="catatan" placeholder="Catatan" required> 
                    </div>

                    <?php endif;?>

            <!-- Tampilan HRD -->

            <?php if($this->session->userdata('koderole')=='18'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title"> EDIT NOTA PEMBAYARAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>notapembayaran/updatenota" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                     <div class="form-group">
                      <h7> * Isi Data yang Masih Kosong</h7>
                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_trnota;?>" id="" name="id_trnota">
                    </div>

                    
                   <!--  <div class="form-group">
                      <label for="">Nama Perusahaan </label>
                      <label for="Nama Perusahaan"></label>
                        <input type="text" class="form-control" value="<?php echo $nama_pt;?>" id="" name="nama_pt" placeholder="" readonly="" >
                    </div> -->

                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <select name="nama_pt" class="form-control" >
                          <option>--Pilih Perusahaan--</option>
                      
                            <?php foreach($perusahaan as $datapt) {

                          if(!in_array($datapt['kodep'],$pt_post)){ ?>
                              <option  value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datapt['kodep'] ?>"><?php echo $datapt['nm_perusahaan'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>
                      
                    <div class="form-group">

                      <label for="">No. Bukti </label>
                        <input type="text" class="form-control" value="<?php echo $no_bukti;?>" id4r6 ="" name="no_bukti" placeholder="No. Bukti" required>
                    </div>

                   <!--  <div class="form-group">
                      <label for="">Supplier</label>
                        <input type="text" class="form-control" value="<?php echo $supplier;?>" id="" name="supplier" placeholder="supplier" readonly="">                        
                    </div> -->

                    <div class="form-group">
                      <label for="">Supplier</label>
                        <select name="supplier" class="form-control" >
                          <option>--Pilih Supplier--</option>
                      
                            <?php foreach($supplier as $datasupp) {

                          if(!in_array($datasupp['kode_supplier'],$supp_post)){ ?>
                              <option  value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option> 

                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datasupp['kode_supplier'] ?>"><?php echo $datasupp['nama_supplier'] ?></option>


                          <?php }} ?>

                        </select> 
                    </div>

                      <div class="form-group">
                      <label for="">No. Perkiraan</label>
                        <input type="text" class="form-control" value="<?php echo $no_perkiraan;?>" id="" name="no_perkiraan" placeholder="No. Perkiraan" required>                        
                    </div>
                
                     <div class="form-group">
                      <label for="">No. Giro / Cek</label>
                        <input type="text" class="form-control" value="<?php echo $no_girocek;?>" id="" name="no_girocek" placeholder="No. Giro / Cek" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">No. Rekening</label>
                        <input type="text" class="form-control" value="<?php echo $no_rek;?>" id="" name="no_rek" placeholder="No. Rekening" required>                        
                    </div>
                     <div class="form-group">
                      <label for="">Bank</label>
                          <input type="text" class="form-control" value="<?php echo $bank;?>" id="" name="bank" placeholder="Bank" required> 
                    </div>

                     <div class="form-group">
                      <label for="">Keterangan</label>
                      <input type="text" class="form-control" value="<?php echo $keterangan;?>" id="" name="keterangan" placeholder="Keterangan" required> 
                    </div>
                     
                    <div class="form-group">
                      <label for="">No. Invoice</label>
                      <input type="text" class="form-control" value="<?php echo $no_invoice;?>" id="" name="no_invoice" placeholder="No. Invoice" required> 
                    </div>

                     <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" required>                        
                    </div>

                     <div class="form-group">
                      <label for="">Tagihan</label>
                      <input type="text" class="form-control" value="<?php echo $tagihan;?>" id="" name="tagihan" placeholder="Tagihan" required> 
                    </div>

                    <div class="form-group">
                      <label for="">Pembayaran</label>
                      <input type="text" class="form-control" value="<?php echo $pembayaran;?>" id="" name="pembayaran" placeholder="Pembayaran" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sisa;?>" id="" name="sisa" placeholder="Sisa" required> 
                    </div>

                    <div class="form-group">
                    <label for="">Upload Lampiran</label>
                      <input type="hidden" name="lampiran" value="<?php echo $lampiran; ?>">
                        <input type="file" class="form-control" value="" id="" name="file_uploadlampiran" placeholder="">
                        <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $lampiran; ?>" class="img-circl" alt="User Image" />  
                             
                    </div>

                     <div class="form-group">
                      <label for="">Nama PIC</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pic" placeholder="Isi Nama PIC" readonly> 
                    </div>

                     <!-- <div class="form-group">
                      <input type="hidden" class="form-control" value="Menunggu Disetujui" id="" name="approval" placeholder="Tanda Tangan Pemeriksa" required> 
                    </div> -->
                  
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemohon;?>" id="" name="pemohon" placeholder="Tanda Tangan Pemohon" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemohon;?>" id="" name="nama_pemohon" placeholder="Nama Penandatangan Pemohon" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $ptgs_jurnal;?>" id="" name="ptgs_jurnal" placeholder="Tanda Tangan Petugas Jurnal" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_jurnal;?>" id="" name="nama_jurnal" placeholder="Nama Penandatangan Petugas Jurnal" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $bag_akuntansi;?>" id="" name="bag_akuntansi" placeholder="Tanda Tangan Bagian Akuntansi" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_akuntansi;?>" id="" name="nama_akuntansi" placeholder="Nama Penandatangan Bagian Akuntansi" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $perse_bayar;?>" id="" name="perse_bayar" placeholder="Tanda Tangan Persetujuan Bayar" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_persebayar;?>" id="" name="nama_persebayar" placeholder="Nama Penandatangan Persetujuan Bayar" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $pemeriksa;?>" id="" name="pemeriksa" placeholder="Tanda Tangan Pemeriksa" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_pemeriksa;?>" id="" name="nama_pemeriksa" placeholder="Nama Penandatangan Pemeriksa" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek1;?>" id="" name="sign_cek1" placeholder="Nama Penandatangan signcek1" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $nama_signcek1;?>" id="" name="nama_signcek1" placeholder="Nama Penandatangan nama signcek1" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Tanda Tangan Cek 2" required> 
                    </div>

                <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $sign_cek2;?>" id="" name="sign_cek2" placeholder="Nama Penandatangan Cek 2" required> 
                    </div>

                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $catatan;?>" id="" name="catatan" placeholder="Catatan" required> 
                    </div>

                        <?php endif;?>


                  <!-- USER PEMOHON -->


                  <?php if($this->session->userdata('koderole')=='27'):?>
                    <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control">
              <option value="Approve Pemohon">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Pemohon'){echo "selected"; } ?> value='Approve Pemohon'>Disetujui Pemohon</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
                  <div class="form-group">
                      <label type="hidden" for="">TTD PEMOHON</label>
                        <select name="pemohon" class="form-control">
                          <option>--TTD Pemohon--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$pemohon1)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                <div class="form-group">
                      <label for="">Nama Penandatangan Pemohon</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama_pemohon" placeholder="Isi Nama Penandatangan" readonly> 
                    </div>

                  <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>
                    

                        <?php endif;?>

              <!-- USER PETUGAS JURNAL & BAGIAN AKUNTANSI-->
                    
                    <?php $uul=($this->session->userdata('koderole'));
              $nama=($this->session->userdata('nama'));  
           if($uul=='7' AND $nama=='Ita' OR $nama=='Said'):?>
                      <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control" required>
              <option value="Menunggu Disetujui">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Petugas Jurnal'){echo "selected"; } ?> value='Approve Petugas Jurnal'>Disetujui Petugas Jurnal</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
                 <div class="form-group">
                      <label type="hidden" for="">TTD PETUGAS JURNAL</label>
                        <select name="ptgs_jurnal" class="form-control">
                          <option>--TTD Petugas Jurnal--</option>
                            <?php foreach($idjurnal as $data) {
                          if(!in_array($data['foto'],$jurnal)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Nama Penandatangan Petugas Jurnal</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama_jurnal" placeholder="Isi Nama Penandatangan" readonly> 
                    </div>

                    <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>

                        <?php endif;?>

                       <!-- USER BAGIAN AKUNTANSI-->
                    
                    <?php
             $uul=($this->session->userdata('koderole'));
              $nama=($this->session->userdata('nama'));  
           if($uul=='7' AND $nama=='Riza' OR $nama=='Fitri'):?>

  
                      <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control">
              <option value="Approve Petugas Jurnal">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Bagian Akuntansi'){echo "selected"; } ?> value='Approve Bagian Akuntansi'>Disetujui Bagian Akuntansi</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
  
                 <div class="form-group">
                      <label type="hidden" for="">TTD BAGIAN AKUNTANSI</label>
                        <select name="bag_akuntansi" class="form-control">
                          <option>--TTD Bagian Akuntansi--</option>
                            <?php foreach($idakuntansi as $data) {
                          if(!in_array($data['foto'],$akuntansi)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Nama Penandatangan Bagian Akuntansi</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama_akuntansi" placeholder="Isi Nama Penandatangan" readonly> 
                    </div>

                    <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>
                    

                        <?php endif;?>
                   
                <!-- USER PERSETUJUAN BAYAR-->

                     <?php if($this->session->userdata('koderole')=='26'):?>
                       <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control">
              <option value="Approve Pemohon">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Persetujuan Bayar'){echo "selected"; } ?> value='Approve Persetujuan Bayar'>Disetujui Persetujuan Bayar</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
                  <div class="form-group">
                      <label type="hidden" for="">TTD PERSETUJUAN BAYAR</label>
                        <select name="perse_bayar" class="form-control">
                          <option>--TTD Persetujuan Bayar--</option>
                            <?php foreach($idbayar as $data) {
                          if(!in_array($data['foto'],$bayar)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Nama Penandatangan Persetujuan Bayar</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama_persebayar" placeholder="Isi Nama Penandatangan" readonly> 
                    </div>

                  <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>
                    

                        <?php endif;?>

                        <!-- USER PEMERIKSA-->

                     <?php if($this->session->userdata('koderole')=='25'):?>
                       <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control">
              <option value="Approve Persetujuan Bayar">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Pemeriksa'){echo "selected"; } ?> value='Approve Pemeriksa'>Disetujui Pemeriksa</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
                  <div class="form-group">
                      <label type="hidden" for="">TTD PEMERIKSA</label>
                        <select name="pemeriksa" class="form-control">
                          <option>--TTD Pemeriksa--</option>
                            <?php foreach($idbayar as $data) {
                          if(!in_array($data['foto'],$pemeriksa1)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                <div class="form-group">
                      <label for="">Nama Penandatangan Pemeriksa</label>
                      <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nama_pemeriksa" placeholder="Isi Nama Penandatangan" readonly> 
                    </div>

                    <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>
                    

                        <?php endif;?>


                <!-- USER PENANDATANGANAN CEK 1 & 2-->

                        <?php
                 $ttd=($this->session->userdata('koderole'));

                  if($ttd=='10' OR $ttd=='29' OR $ttd=='28' OR $ttd=='17'):?>

              <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
              <select name="approval" id="approval" class="form-control">
              <option value="Approve Pemeriksa">--Pilih Status--</option>
              <option <?php if( $approval=='Approve Sign Cek 1'){echo "selected"; } ?> value='Approve Sign Cek 1'>Disetujui Sign Cek 1</option>
              <option <?php if( $approval=='Approve Sign Cek 2'){echo "selected"; } ?> value='Approve Sign Cek 2'>Disetujui Sign Cek 2</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
              </select><option>
              </div> 
              

                 <div class="form-group">
                      <label type="hidden" for="">TTD CEK 1</label>
                        <select name="sign_cek1" class="form-control">
                          <option>--TTD Cek 1--</option>
                            <?php foreach($idsigncek1 as $data) {
                          if(!in_array($data['foto'],$signcek1)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                   <!--  <div class="form-group">
                      <label for="">Nama Penandatangan Petugas Cek 1</label>
                      <input type="text" class="form-control" value="<?php echo $nama_signcek1;?>" id="" name="nama_signcek1" placeholder="Isi Nama Penandatangan" > 
                    </div> -->

                     <div class="form-group">
                      <label type="hidden" for="">NAMA TTD CEK 1</label>
                        <select name="nama_signcek1" class="form-control">
                          <option>--Nama TTD Cek 1--</option>
                            <?php foreach($idnamacek1 as $data) {
                          if(!in_array($data['nama_user'],$namasigncek1)){ ?>
                              <option  value="<?php echo $data['nama_user'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_user'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                 <div class="form-group">
                      <label type="hidden" for="">TTD CEK 2</label>
                        <select name="sign_cek2" class="form-control">
                          <option>--TTD Cek 2--</option>
                            <?php foreach($idsigncek2 as $data) {
                          if(!in_array($data['foto'],$signcek2)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <!-- <div class="form-group">
                      <label for="">Nama Penandatangan Cek 2</label>
                      <input type="text" class="form-control" value="<?php echo $nama_signcek2;?>" id="" name="nama_signcek2" placeholder="Isi Nama Penandatangan" > 
                    </div>


 -->
                    <div class="form-group">
                      <label type="hidden" for="">NAMA TTD CEK 2</label>
                        <select name="nama_signcek2" class="form-control">
                          <option>--Nama TTD Cek 2--</option>
                            <?php foreach($idnamacek2 as $data) {
                          if(!in_array($data['nama_user'],$namasigncek2)){ ?>
                              <option  value="<?php echo $data['nama_user'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['nama_user'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>
                    
                        <?php endif;?>

                        
                        <?php if($this->session->userdata('koderole')==''):?>

                      <div class="form-group">
              <label type="hidden" for="">Status Approval</label>
                      <select name="approval" id="approval" class="form-control">
              <option>--Pilih Status--</option>
              <option <?php if( $approval=='Approve Penerima Pembayaran'){echo "selected"; } ?> value='Approve Penerima Pembayaran'>Disetujui Penerima Pembayaran</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
                      </select><option>
                  </div>
                 <div class="form-group">
                      <label type="hidden" for="">TTD PENERIMA PEMBAYARAN</label>
                        <select name="penerima_pemb" class="form-control">
                          <option>--TTD Penerima Pembayaran--</option>
                            <?php foreach($idpenerima as $data) {
                          if(!in_array($data['foto'],$penerima)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                      <label for="">Nama Penandatangan Penerima Pembayaran</label>
                      <input type="text" class="form-control" value="<?php echo $nama_penerima;?>" id="" name="nama_penerima" placeholder="Isi Nama Penandatangan Cek 1" required> 
                    </div>

                    <div class="form-group">
                      <label for="">CATATAN</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>

                        <?php endif;?>
    
                </div><!-- /.item -->

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>notapembayaran" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->