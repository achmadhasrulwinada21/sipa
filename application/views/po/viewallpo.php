<section class="content-header">
        <h4 style="text-align: center;font-weight:bold;font-family:verdana;">
          <b><span> PO ALKES</span></b>
        </h4>
        </section>
               
                  
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">    
            </div>   
               <br>
                           

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                </div><!-- /.box-title -->
                 <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
         <a style="margin-left:2%;font-weight:bold;font-family:verdana;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>c_po">
<i class="glyphicon glyphicon-plus"></i>&nbspTambah Po</a>
<?php endif; ?>
<br> 
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="table17" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Po</th>
                    <th style="vertical-align: middle; text-align: center;">No Po</th>
                     <th style="vertical-align: middle; text-align: center;">Rumah Sakit</th>
                    <th style="vertical-align: middle; text-align: center;">Supplier</th>
                  <th style="vertical-align: middle; text-align: center;">Qty</th>
                    <th style="vertical-align: middle; text-align: center;">Grand Total</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                    <!--  <th style="vertical-align: middle; text-align: center;">Catatan</th> -->
                    <th style="vertical-align: middle; text-align: center;">Download</th>
                    <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='88'):  ?>
                     <th style="vertical-align: middle; text-align: center;">Approve</th>
                      <?php endif;?>
                      <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
                      <th style="vertical-align: middle; text-align: center;">Kirim</th>
                      <?php endif;?>
                   <th style="vertical-align: middle; text-align: center;">Detail</th>
                   <th style="vertical-align: middle; text-align: center;">Print PO</th>
                   <th style="vertical-align: middle; text-align: center;">Print Form Persetujuan</th>
                   <?php
                    $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
            <th style="vertical-align: middle; text-align: center;">Update</th>
                   <th style="vertical-align: middle; text-align: center;">Hapus</th>
                 <?php endif;?>
                  </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Po</th>
                    <th style="vertical-align: middle; text-align: center;">No Po</th>
                     <th style="vertical-align: middle; text-align: center;">Rumah Sakit</th>
                    <th style="vertical-align: middle; text-align: center;">Supplier</th>
                 <th style="vertical-align: middle; text-align: center;">Qty</th>
                    <th style="vertical-align: middle; text-align: center;">Grand Total</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                    <!--  <th style="vertical-align: middle; text-align: center;">Catatan</th> -->
                    <th style="vertical-align: middle; text-align: center;">Download</th>
                        <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='88'):  ?>
                     <th style="vertical-align: middle; text-align: center;">Approve</th>
                      <?php endif;?>
                            <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
                      <th style="vertical-align: middle; text-align: center;">Kirim</th>
                      <?php endif;?>
                   <th style="vertical-align: middle; text-align: center;">Detail</th>
                   <th style="vertical-align: middle; text-align: center;">Print PO</th>
                   <th style="vertical-align: middle; text-align: center;">Print Form Persetujuan</th>
                     <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
                   <th style="vertical-align: middle; text-align: center;">Update</th>
                   <th style="vertical-align: middle; text-align: center;">Hapus</th>
                 <?php endif;?>
                    </tr>
            </tfoot>
        </table>
    </div>
  </div></div></div></div></section>

        
        <!-- Main row -->

<?php
        foreach($data_aprove as $i){
       $k_nopo=$i['k_nopo'];
       $mengetahui=$i['mengetahui'];
       $nm_mengetahui=$i['nm_mengetahui'];
       $jb_mengetahui=$i['jb_mengetahui'];
       $grandtotal=$i['grand_total'];
        $koders=$i['koders'];
          ?>
<div id="modal_edit<?php echo $k_nopo;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Aprove</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>c_po/updateaprovecekcui" method="POST">
                    <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):  ?>

                          <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="menyetujui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttd as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
        <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" >
        <input type="hidden" class="form-control" value="<?php echo $nm_mengetahui; ?>" id="" name="nm_mengetahui" >
         <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui" >
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Direktur Ops & Umum">Disetujui Direktur Ops & Umum</option>
                 <option value="ditolak Direktur Ops & Umum">ditolak Direktur Ops & Umum</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>

                    <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='83' || $ynwa=='84' || $ynwa=='85' || $ynwa=='86' || $ynwa=='87'):  ?>

                          <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="menyetujui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttd as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
        <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" >
        <input type="hidden" class="form-control" value="<?php echo $nm_mengetahui; ?>" id="" name="nm_mengetahui" >
         <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui" >
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Direktur Regional">Disetujui Direktur Regional</option>
                 <option value="ditolak Direktur Regional">ditolak Direktur Regional</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>

                   <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='17'):  ?>

                          <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="menyetujui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttd as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
        <input type="hidden" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" >
        <input type="hidden" class="form-control" value="<?php echo $nm_mengetahui; ?>" id="" name="nm_mengetahui" >
         <input type="hidden" class="form-control" value="<?php echo $jb_mengetahui; ?>" id="" name="jb_mengetahui" >
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Direktur Utama">Disetujui Direktur Utama</option>
                 <option value="ditolak Direktur Utama">ditolak Direktur Utama</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>

                     <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='77'):  ?>

        <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="mengetahui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Direktur RS">Disetujui Direktur RS</option>
                 <option value="ditolak Direktur RS">ditolak Direktur RS</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>            
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>
                   <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='81'):  ?>
               <b>Yakin Approve?</b><br><br>
               <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="Disetujui Manager RS" id="" name="nm_acc" placeholder="" readonly>            
                    </div>

                    <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="-" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="-" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>

                     <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>            
                    </div>
                    
             <?php endif;?>
 <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
               <b>Yakin Kirim Data?</b><br><br>
               <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="menunggu approve" id="" name="nm_acc" placeholder="" readonly>            
                    </div>

                    <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="-" id="" name="nm_menyetujui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="-" id="" name="jb_menyetujui" placeholder="" readonly>            
                    </div>

                     <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>            
                    </div>
            
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>            
                    </div>
                    
             <?php endif;?>
 <!--  style="display: none;" -->
  <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='57'):  ?>

        <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="mengetahui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Kadep Jangmed">Disetujui Kadep Jangmed</option>
                 <option value="ditolak Kadep Jangmed">ditolak Kadep Jangmed</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>            
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>
                   <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='82'):  ?>

        <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="mengetahui" class="dara form-control">
                <option> --pilih ttd Disetujui --</option>
                  <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
         <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select id="messagetype" name="nm_acc" class="dara form-control" onchange="fun_show()">
                <option> -- Pilih Disetujui --</option>
                 <option value="Disetujui Kadep Pengadaan">Disetujui Kadep Pengadaan</option>
                 <option value="ditolak Kadep Pengadaan">ditolak Kadep Pengadaan</option>
           </select>
        </div>
        <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama'); ?>" id="" name="nm_mengetahui" placeholder="" readonly>            
                    </div>
                      
        <div class="form-group" hidden>
                      <label for="">Jabatan</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="jb_mengetahui" placeholder="" readonly>            
                    </div>
                  <?php endif;?>
   <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='88' and $ynwa!='81'):  ?>
              <div class="form-group"  id="">
                      <label for="">Catatan</label>
              <textarea id="mobileno" name='catatan' class='form-control' rows='2' placeholder="catatan" style='resize: vertical; width:83%;' required></textarea>

            </div>
             <?php endif;?>
                    <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $k_nopo; ?>" id="" name="k_nopo" placeholder="" readonly>            
                    </div>
                    <div class="form-group" hidden>
               <label for="">grand</label>
                 <input type="text" class="form-control" autocomplete="off"  
                    value="<?php echo $grandtotal; ?>" id="" name="grandtotal" placeholder="" readonly>            
           </div>
            <div class="form-group" hidden>
               <label for="">grand</label>
                 <input type="text" class="form-control" autocomplete="off"  
                    value="<?php echo $koders; ?>" id="" name="koders" placeholder="" readonly>            
           </div>

                   <input type="submit" class="btn btn-primary" value="PILIH">
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
