<section class="content-header">
        <h4 style="text-align: center;font-weight:bold;font-family:verdana;">
          <b><span> FORM PENERIMAAN ALKES</span></b>
        </h4>
        </section>
               
                  
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">    
             
               <br>
                           

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                </div><!-- /.box-title -->
                 <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
           <form role="form" action="<?php echo base_url(); ?>C_poacc/simpan_header_po" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-4">
                    </div>
                  <div class="col-lg-4"><br>
                     <?php
           date_default_timezone_set("Asia/Jakarta");
      $waktusaatini =date("Y-m-d"); ?>
               <div class="form-group">
                      <label for="">Tanggal Penerimaan :</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $waktusaatini; ?>" id="datepicker11" name="tgl_penerimaan" placeholder="">            
                    </div>
                   <div class="form-group"> 
        <label>No PO :</label><br>
          <select id="" name="k_nopo" class="dara form-control" required>
            <option required></option>
            <option value="">Pilih No PO</option> 
                 <?php foreach($data_po as $row) { ?> 
                 <option required value="<?php echo $row['k_nopo']; ?>"><?php echo $row['nopo']; ?></option>
             <?php  } ?> 
          </select>
        </div> 
         <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('C_poacc/tampilpoacc')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div></div></form> <div class="col-lg-4">
                    </div> </div> 
         <?php endif; ?>
<br> 
 <div class="col-lg-12">
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="table117" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Penerimaan</th>
                    <th style="vertical-align: middle; text-align: center;">No Po</th>
                     <th style="vertical-align: middle; text-align: center;">Rumah Sakit</th>
                    <th style="vertical-align: middle; text-align: center;">Supplier</th>
                  <th style="vertical-align: middle; text-align: center;">Qty</th>
                    <th style="vertical-align: middle; text-align: center;">Grand Total</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                      <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='88'):  ?>
                     <th style="vertical-align: middle; text-align: center;">Approve</th>
                      <?php endif;?>
                        <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
                      <th style="vertical-align: middle; text-align: center;">Tambah Detail</th>
                      <th style="vertical-align: middle; text-align: center;">Tanda Tangan</th>
                      <?php endif;?>
                   <th style="vertical-align: middle; text-align: center;">Detail</th>
                   <th style="vertical-align: middle; text-align: center;">Print</th>
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
                    <th style="vertical-align: middle; text-align: center;">Tanggal Penerimaan</th>
                    <th style="vertical-align: middle; text-align: center;">No Po</th>
                     <th style="vertical-align: middle; text-align: center;">Rumah Sakit</th>
                    <th style="vertical-align: middle; text-align: center;">Supplier</th>
                 <th style="vertical-align: middle; text-align: center;">Qty</th>
                    <th style="vertical-align: middle; text-align: center;">Grand Total</th>
                     <th style="vertical-align: middle; text-align: center;">Status</th>
                      <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='88'):  ?>
                     <th style="vertical-align: middle; text-align: center;">Approve</th>
                      <?php endif;?>
                       <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='88'):  ?>
                      <th style="vertical-align: middle; text-align: center;">Tambah Detail</th>
                      <th style="vertical-align: middle; text-align: center;">Tanda Tangan</th>
                      <?php endif;?>
                   <th style="vertical-align: middle; text-align: center;">Detail</th>
                   <th style="vertical-align: middle; text-align: center;">Print</th>
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
                  <form role="form" action="<?php echo base_url(); ?>C_poacc/updateaprovecekcui" method="POST">
       <?php
          $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='77'):  ?>

        <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="mengetahui" class="dara form-control">
                <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
          </select>
        </div>
         <div class="form-group" hidden> 
        <label>Disetujui :</label><br>
          <input type="text" value="Disetujui Direktur RS"  name="nm_app">       
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
                        value="Disetujui Manager RS" id="" name="nm_app" placeholder="" readonly>            
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
               <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="diterima" id="" name="nm_app" placeholder="" readonly>            
                    </div>
                    <div class="form-group"> 
        <label>Disetujui :</label><br>
          <select name="mengetahui" class="dara form-control">
                <?php foreach($ttdrs as $row) { ?>
                  <option value=<?php echo $row['foto'] ; ?>><?php echo $row['nama_user']?>
                </option>
            <?php  } ?>
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
                   
                    <div class="form-group" hidden>
                      <label for="">nama</label>
                        <input type="text" class="form-control" autocomplete="off"  
                        value="<?php echo $k_nopo; ?>" id="" name="k_nopo" placeholder="" readonly>            
                    </div>
                
           <div class="form-group" hidden>
               <label for="">koders</label>
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