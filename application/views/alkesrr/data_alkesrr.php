
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> LISTING RR  PRODUK ALAT KESEHATAN</b></span>
        </h4>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                   <?php
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='75' || $dara =='76' || $dara =='1'):?>
                  <form role="form" action="<?php echo base_url(); ?>Alkesrr/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-12">
                
<div class="col-lg-6">

               <div class="form-group">
                 <label for="">KODE TRANSAKSI</label>
                <input type="text" class="form-control" value="<?php echo $prid; ?>" name="kode_transaksi" autocomplete="off" placeholder="isi kode transaksi" readonly>
               </div>
          
           <?php
           date_default_timezone_set("Asia/Jakarta");
      $waktusaatini =date("Y-m-d"); ?>
               <div class="form-group">
                      <label for="">Tanggal Transaksi :</label>
                        <input type="text" class="form-control"  value="<?php echo $waktusaatini; ?>" id="datepicker11" name="tgl_tr" autocomplete="off">            
                    </div>

                 <div class="form-group">
                      <label for="foto">PERUSAHAAN</label>
					             <br> <select data-placeholder="Pilih Perusahaan" id="koper" name="koper" class="form-control" required>
                          <option required></option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option required value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
						  </select>
                    
        </div>
        
                    </div> 
                     <div class="col-lg-6">
                       <label for="">Contact Person</label><br>
                       <textarea rows="4" cols="50" name="contact"></textarea><br>
                       <div class="form-group" hidden>
                      <label for="">TIPE PRODUK</label>
                        <select name="id_tipe_produk" class="dara form-control" required>
                          <option value="TP003">--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_produk as $row) { ?>
                              <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>  
              <div class="form-group">
                 <label for="">Fee Management (5%)</label><br>
                <input type="hidden" value="5" name="fee" class="form-control" readonly>
                <!--- cash=1 sponsorship=0 -->
                 <input type="radio" id="jenis_pembayaran" name="jenis_pembayaran" value="1" checked="checked">CASH<br>
                        <input type="radio" id="jenis_pembayaran" name="jenis_pembayaran" value="0">SPONSORSHIP<br>
               </div> 
                 <div class="form-group">
                <label for="">JENIS LISTING</label><br>
                        <input type="radio" id="jenis_listing" name="jenis_listing" value="1" checked="checked"> Listing Alkes Baru<br>
                        <input type="radio" id="jenis_listing" name="jenis_listing" value="0"> Listing Alkes Lama<br>
                   </div>
                    
      </div>

    </div>
     <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
           <a href="<?php echo base_url(); ?>Alkesrr" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>  
       </div></div>
    </form>
</div></div></section><br><br>
<?php endif;?> <section>
            <div class="col-md-12">
                      <br>
              
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="tablealkesrr" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th style="vertical-align: middle; text-align: center;">Fee Management</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Listing</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                           <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76'):  ?>
                    <th style="vertical-align: middle; text-align: center;">Tambah</th>
            <?php endif; ?>
             <?php
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82' || $ynwa=='10'):  ?>
                    <th style="vertical-align: middle; text-align: center;">Approve per detail</th>
            <?php endif; ?>
                      <th style="vertical-align: middle; text-align: center;">Approve</th>
                      <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76' || $ynwa=='69' || $ynwa =='57'):  ?>
            <th style="vertical-align: middle; text-align: center;">Update</th>
                     <th style="vertical-align: middle; text-align: center;">Hapus</th>
                      <?php endif; ?>
                  </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th style="vertical-align: middle; text-align: center;">Fee Management</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Listing</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                    <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76'):  ?>
                    <th style="vertical-align: middle; text-align: center;">Tambah</th>
            <?php endif; ?>
            <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82' || $ynwa=='10'):  ?>
                    <th style="vertical-align: middle; text-align: center;">Approve per detail</th>
            <?php endif; ?>
              <th style="vertical-align: middle; text-align: center;">Approve</th>
                              <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76' || $ynwa =='69' || $ynwa =='57'):  ?>
                   <th style="vertical-align: middle; text-align: center;">Update</th>
                   <th style="vertical-align: middle; text-align: center;">Hapus</th>
                      <?php endif; ?>
               </tr>
            </tfoot>
        </table>
    </div>
  </div>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        
     
<!------- modal -------->


<?php
        foreach($data_alkesrr as $i){
       $kode_transaksi=$i['kode_transaksi'];
       $koper=$i['koper'];
        $jenis_listing=$i['jenis_listing'];
        ?>
<div id="modal_edit<?php echo $kode_transaksi;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Aprove</h4></td>
      </div>
        <div class="modal-body">
     <form role="form" action="<?php echo base_url(); ?>Alkesrr/updateaprove" method="POST">
        <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='75' || $ynwa=='76'):  ?>
               <b>Yakin Approve?</b><br><br>
                <div class="form-group">
                   <label>Kode Transaksi</label>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $kode_transaksi ?>" id="" name="kode_transaksi" placeholder="" readonly>            
                    </div>
               <div class="form-group" hidden>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="menunggu approve" id="" name="status_app" placeholder="" readonly>

                <input type="text" class="form-control" autocomplete="off"  
                        value="diajukan" id="" name="diajukan" placeholder="" readonly>            
                    </div>
                     <div class="form-group" hidden>
                      <label for="">staff</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="-" id="" name="ttd_staff" placeholder="" readonly>
                                  
                    </div>
                <div class="form-group" hidden>
                      <label for="">nama staff</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_staff" placeholder="" readonly>     
                         
                    </div>
                <div class="form-group" hidden>
                      <label for="">nama staff</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('departemen'); ?>" id="" name="dept" placeholder="" readonly>     
                         
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan staff</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_staff" placeholder="" readonly>  
                                 
                    </div>
                     <div class="form-group" hidden>
              <label for="">Catatan</label>
              <textarea  name='catatan_statusapp' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;'>-</textarea>

            </div>
            

             <?php endif;?>
<?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='69'):  ?>
               <b>Yakin Approve?</b><br><br>
                <div class="form-group">
                   <label>Kode Transaksi</label>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $kode_transaksi ?>" id="" name="kode_transaksi" placeholder="" readonly>            
                    </div>
                     <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="ttd_mengetahui" class="dara form-control">
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select></div>
               <div class="form-group" hidden>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="Disetujui Manager Jangmed KSO" id="" name="status_app" placeholder="" readonly>            
                    </div>
                    
                <div class="form-group" hidden>
                      <label for="">nama manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>     
                         
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>  
                                 
                    </div>
                     <div class="form-group" hidden>
              <label for="">Catatan</label>
              <textarea  name='catatan_statusapp' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;'>-</textarea>

            </div>
            

             <?php endif;?>  

             <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='57'):  ?>
               <b>Yakin Approve?</b><br><br>
                <div class="form-group">
                   <label>Kode Transaksi</label>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $kode_transaksi ?>" id="" name="kode_transaksi" placeholder="" readonly>            
                    </div>
                     <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="ttd_mengetahui2" class="dara form-control">
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select></div>
               <div class="form-group" hidden>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="Disetujui Kadep Jangmed" id="" name="status_app" placeholder="" readonly>            
                    </div>
                    
                <div class="form-group" hidden>
                      <label for="">nama manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui2" placeholder="" readonly>     
                         
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui2" placeholder="" readonly>  
                                 
                    </div>
                     <div class="form-group" hidden>
              <label for="">Catatan</label>
              <textarea  name='catatan_statusapp' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;'>-</textarea>

            </div>
            

             <?php endif;?>      
              <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82'):  ?>
               <b>Yakin Approve?</b><br><br>
                <div class="form-group">
                   <label>Kode Transaksi</label>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $kode_transaksi ?>" id="" name="kode_transaksi" placeholder="" readonly>            
                    </div>
                   
                <div class="form-group"> 
        <label>Approval :</label><b style="color:red;">&nbsp*</b><br>
          <select  id="messagetype" name="status_app" class="dara form-control" data-placeholder="-- Pilih Approval --" required>
                <option required></option>
                 <option value="Disetujui Kadep Pengadaan">Disetujui</option>
                 <option value="ditolak">ditolak</option>
           </select>
        </div>
                              
               <div class="form-group" >
              <label for="">Catatan</label>
              <textarea  name='catatan_statusapp' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;'>-</textarea>

            </div>
            

             <?php endif;?>  

                  <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):  ?>
               <b>Yakin Approve?</b><br><br>
                <div class="form-group">
                   <label>Kode Transaksi</label>
                       <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $kode_transaksi ?>" id="" name="kode_transaksi" placeholder="" readonly>   
                         <input type="hidden" class="form-control" autocomplete="off"  
                        value="<?php echo $koper ?>" id="" name="koper" placeholder="" readonly>  
                        <input type="hidden" class="form-control" autocomplete="off"  
                        value="<?php echo  $jenis_listing   ?>" id="" name="jenis_listing" placeholder="" readonly>             
                    </div>
                     <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="ttd_menyetujui" class="dara form-control">
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select></div>
               <div class="form-group"> 
        <label>Approval :</label><b style="color:red;">&nbsp*</b><br>
          <select  id="messagetype" name="status_app" class="dara form-control" data-placeholder="-- Pilih Approval --" required>
                <option required></option>
                 <option value="Disetujui Direktur Ops & Umum">Disetujui</option>
                 <option value="ditolak">ditolak</option>
           </select>
        </div>
                    
                <div class="form-group" hidden>
                      <label for="">nama manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_menyetujui" placeholder="" readonly>     
                         
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan manager</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_menyetujui" placeholder="" readonly>  
                                 
                    </div>
                     <div class="form-group">
              <label for="">Catatan</label>
              <textarea  name='catatan_statusapp' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;'>-</textarea>

            </div>    
                <?php endif;?>  
               
               <input type="submit" class="btn btn-primary" value="PILIH">
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
    
