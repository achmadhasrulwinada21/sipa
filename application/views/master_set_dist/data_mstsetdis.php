<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA SETUP DISTRIBUTOR</span></b>
        </h4>
        </section>
               
        <!-- Main content -->
        
          <!-- Small boxes (Stat box) -->
           <div class='box-header with-border'> 
        <a style="margin-bottom:3px" href="<?php echo base_url("Excel_import/setdis"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a>

        <a style="margin-bottom:3px" href="<?php echo base_url('C_mstsetdis/v_export_excel') ?>" class="btn btn-danger no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-upload"></i> EXPORT DATA TO EXCEL </a>
      </div>
  
             
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstsetdis/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-9">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-6">
                    
                    <div class="form-group">
                      <label for="">PERUSAHAAN</label>
                        <select data-placeholder="Pilih Perusahaan" name="koper" class="form-control chosen1" required>
                          <option></option>
                          <?php foreach($kode_perusahaan as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                
                      <div class="form-group">
                      <label for="">DISTRIBUTOR</label>
                        <select data-placeholder="Pilih Distributor" name="kodis[]" multiple  class="form-control chosen-select" required>
                          <option></option>
                          <?php foreach($kode_distributor as $row) { ?>
                              <option value="<?php echo $row['kodis'] ?>"><?php echo $row['nm_distributor'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
            </div>
                      
            
        </div>
        <div class="col-lg-12">
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('C_mstsetdis')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>
</div>
 
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
        
              
                </div><!-- /.box-title -->
                
                <div class="table-responsive">
                <div class="box-body">

                  
        <div class="table100 ver5 m-b-110">
          

                  <table id="datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger row100 head">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">PERUSAHAAN</th>
                      <th style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                     
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>                                
                    </tr>
                  </thead>
               
              

              <div class="table100-body js-pscroll">
            
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_setdis as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="row100 body">
                      <td><?php echo $no; ?></td>

                       <td><?php echo $row['nm_perusahaan']; ?></td>
                       <td><?php echo $row['nm_distributor']; ?></td>

                      
                       <td style="vertical-align: middle;text-align: center;">
                       <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>C_mstsetdis/edit/<?php echo $row['idsetdis']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
         
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>C_mstsetdis/hapus/<?php echo $row['idsetdis']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                     </td>
                    </tr>
                            <?php  } ?>  
                  </tbody>
                
                </table>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->


  <!--jquery dan select2-->
   <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>
        <script>
         $(document).ready(function () {
                // $(".select2").select2({
                    // placeholder: "Please Select"
                // });
				$(".chzn-select").chosen(); 
				 $("#s_kode").select2({
                    placeholder: "Please Select"
                });
				
            });
			
        </script>
