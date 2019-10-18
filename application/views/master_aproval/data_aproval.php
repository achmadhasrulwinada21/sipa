<section class="content-header">
        <h4 style="text-align: center;">
          <b><span>MASTER APPROVAL</span></b>
        </h4>
        </section>
               
                  
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">    
            </div>   
             <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
               <form role="form" action="<?php echo base_url(); ?>Approval/savedata" method="POST"  enctype="multipart/form-data">
                  
          
                  <!-- <div class="box-body chat" id="chat-box"> -->

                  <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
                      <div class="form-group">
                      <label for="">KODE APPROVAL</label>&nbsp<label style="color: red;">*</label>
                        <input type="text" class="form-control" id="" name="k_aprove" value="<?= $kodeunik; ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">APPROVAL</label>&nbsp<label style="color: red;">*</label>
                        <input type="text" class="form-control" id="" name="n_aprove" autocomplete="off" required>
                    </div>                    
            </div>
                      
            
       <br>

        <div class="col-lg-12">
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('Approval')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>
</div></div>
                     <div class="col-lg-12">
                        

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
        
              
                </div><!-- /.box-title -->
                
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="table101" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                <th style="vertical-align: middle; text-align: center;">No</th>
                <th style="vertical-align: middle; text-align: center;">Kode Approve</th>
                <th style="vertical-align: middle; text-align: center;">Approve</th>
                <th style="vertical-align: middle; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: arial; color: white;">
                <th style="vertical-align: middle; text-align: center;">No</th>
                <th style="vertical-align: middle; text-align: center;">Kode Approve</th>
                <th style="vertical-align: middle; text-align: center;">Approve</th>
                <th style="vertical-align: middle; text-align: center;">Aksi</th>
                  </tr>
            </tfoot>
        </table>
    </div></div>
  </div></div></div></div></section>

        
        <!-- Main row -->
 <?php
      foreach($aprove as $i){
      $idaproval= $i['idaproval'];
      $k_aprove= $i['k_aprove'];
      $n_aprove = $i['n_aprove'];        
         ?>

    <div id="modal_edit<?php echo $idaproval;?>" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content"> 
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">EDIT</h4></td>
            </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Approval/update" method="POST" enctype="multipart/form-data">
                 
                 <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idaproval; ?>" id="" name="idaproval" readonly>
                    </div>

                   <div class="form-group">
                      <label for="">Kode Approve</label>
                        <input type="text" class="form-control" value="<?php echo $k_aprove; ?>" id="" name="k_aprove" readonly >
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="">Approve</label>
                        <input type="text" class="form-control" value="<?php echo $n_aprove; ?>" id="" name="n_aprove" autocomplete="off" required >
                    </div>
                   <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>