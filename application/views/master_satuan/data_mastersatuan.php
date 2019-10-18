
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>

    
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">	 

   <script src="<a class="vglnk" href="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" rel="nofollow"><span>https</span><span>://</span><span>oss</span><span>.</span><span>maxcdn</span><span>.</span><span>com</span><span>/</span><span>html5shiv</span><span>/</span><span>3</span><span>.</span><span>7</span><span>.</span><span>2</span><span>/</span><span>html5shiv</span><span>.</span><span>min</span><span>.</span><span>js</span></a>"></script>
      <script src="<a class="vglnk" href="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" rel="nofollow"><span>https</span><span>://</span><span>oss</span><span>.</span><span>maxcdn</span><span>.</span><span>com</span><span>/</span><span>respond</span><span>/</span><span>1</span><span>.</span><span>4</span><span>.</span><span>2</span><span>/</span><span>respond</span><span>.</span><span>min</span><span>.</span><span>js</span></a>"></script>
       
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA SATUAN</span></b>
        </h4>
        </section>
              
               
             
        <!-- Main content -->
        
          <!-- Small boxes (Stat box) -->
        <div class='box-header with-border'> 
        <a style="margin-bottom:3px" href="<?php echo base_url("Excel_import"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a>

        <a style="margin-bottom:3px" href="<?php echo base_url('C_mstsatuan/v_export_excel') ?>" class="btn btn-danger no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-upload"></i> EXPORT DATA TO EXCEL </a>
      </div>
  
             
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstsatuan/savedata" method="POST"  enctype="multipart/form-data">
                  
          
				  <!-- <div class="box-body chat" id="chat-box"> -->

				  <div class="col-lg-4"> </div>
<div class="col-lg-4">
                   

              <div class="form-group">
                      <label for="">SATUAN ID</label>
                      <input type="text" class="form-control" id="" name="satuanid" required>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA SATUAN</label>
                      <input type="text" class="form-control" id="" name="satuannama" required>
                    </div>

                   <!-- <div class="form-group">
                      <label for="">SATUAN RACIKAN</label>
                      <input type="text" class="form-control" id="" name="satuanracikan" required>
                    </div>

                    <div class="form-group">
                      <label for="">SATUAN ID CONFORM</label>
                      <input type="text" class="form-control" id="" name="satuanidconform" required>
                    </div>-->


                  </div>
                  
                      
            
       
        <div class="col-lg-12">
        <div style="text-align:center;" class="form-actions">
            <button type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('C_mstsatuan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>

 
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
        
              
                </div><!-- /.box-title -->
                
               <body>

   
      <div class="table-responsive">
                <div class="box-body">

                  
        <!-- <div class="table100 ver5 m-b-110"> -->
          

                  <!-- <table id="datatables5" class="table table-bordered table-striped"> -->
        
        <br>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Satuan ID</th>
                    <th>Nama Satuan</th>
                    <th>Aksi</th>
                    
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Satuan ID</th>
                    <th>Nama Satuan</th>
                    <th>Aksi</th>

                    
                </tr>
            </tfoot>
        </table>
    </div>
  </div>

 


 
</body>
          </div><!-- /.col -->
        
        <!-- Main row -->
       
       <!-- EDIT DATA -->
        <?php
        foreach($data_satuan as $i){
        $satuanid = $i['satuanid'];
        $satuannama = $i['satuannama'];
        $satuanracikan = $i['satuanracikan'];
        $satuanidconform = $i['satuanidconform'];
        
        
         ?>
<div id="modal_edit<?php echo $satuanid;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_mstsatuan/update" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    

                    <div class="form-group">
                      <label for="">SATUAN ID</label>
                        <input type="text" class="form-control" value="<?php echo $satuanid; ?>" id="" name="satuanid" required>
                    </div>

                    <div class="form-group">
                      <label for="">NAMA SATUAN</label>
                        <input type="text" class="form-control" value="<?php echo $satuannama; ?>" id="" name="satuannama" > 
                      </div>         
                    

                    <div class="form-group">
                      <label for="">SATUAN RACIKAN</label>
                        <input type="text" class="form-control" value="<?php echo $satuanracikan; ?>" id="" name="satuanracikan" > 
                      </div>

                      <div class="form-group">
                      <label for="">SATUAN ID CONFORM</label>
                        <input type="text" class="form-control" value="<?php echo $satuanidconform; ?>" id="" name="satuanidconform" > 
                      </div>         
                    </div>         
                    </div>


                                                                     
                   
                          
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_mstsatuan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>   
              
              </div>
            </div>
          </div>
        </div> 
             <?php } ?>

  <!--jquery dan select2-->
  <!--  <script src="<?php //echo base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
        <script src="<?php //echo base_url('assets/js/select2.min.js') ?>"></script>
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
			
        </script> -->
