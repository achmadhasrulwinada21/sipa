

      <section class="content-header">
        <h1>
          <b>EDIT DATA SATUAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
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
                <i class="fa fa-plus"></i>
                <h3 class="box-title">EDIT SATUAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstsatuan/update" method="POST" enctype="multipart/form-data">
                  
                    
		     <div class="col-lg-4">
		     <div class="form-group">
                     <label for="">ID Satuan</label>
                      <input type="text" class="form-control" value="<?php echo $satuanid; ?>" id="" name="satuanid" readonly>
                    </div>
                   
                       <div class="form-group">
                      <label for="">NAMA SATUAN</label>
                        <input type="text" class="form-control" value="<?php echo $satuannama; ?>" id="" name="satuannama" required>
                    </div>

                   <!-- <div class="form-group">
                      <label for="">SATUAN RACIKAN</label>
                        <input type="text" class="form-control" value="<?php echo $satuanracikan; ?>" id="" name="satuanracikan" required>
                    </div>

                    <div class="form-group">
                      <label for="">SATUAN ID CONFORM</label>
                        <input type="text" class="form-control" value="<?php echo $satuanidconform; ?>" id="" name="satuanidconform" > 
                      </div> --> 

              

                   
                    </div>
                  </div>
                                                                     
                   
                           </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>C_mstsatuan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>   
             </div>
           </div>
         </div>
       </section>
     </div>
   </section>
    
    

