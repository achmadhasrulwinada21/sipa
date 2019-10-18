<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TARGET EBITDA</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">

           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Ebitda/savedata_rencana" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
                 <div class="col-lg-12">
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $ebit->idebitda ?>" id="" name="kode_target">                              
                               
                     <div class="form-group">
                      <label for="">BULAN</label>
                        <select id="kodebulan" name="kodebulan" class="form-control" required>
                          <option value="-">--Pilih Bulan--</option>
                          <?php foreach($bulan as $row) { ?>
                              <option value="<?php echo $row['kodebulan'] ?>"><?php echo $row['namabulan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                     <input type="hidden" class="form-control" value="" name="namabulan" id="" required/>                 
                    </div>
                  </div>
                    <div class="col-lg-6">
                    
                    <div class="form-group">
                      <label for="">NILAI TARGET</label>
                       <input type="text" onkeypress="return wajibAngka(event)" class="form-control" value="" name="nilai_target" id="" required/>                 
                    </div></div>
                  
          <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>Ebitda" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </table>
                
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            
              
          
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;font-weight: bold;">
                   <tr>
                  
                    <tr>   <td width="100">RUMAH SAKIT</td><td width="10">:</td><td width="300"><?php echo $ebit->namars ?> </td>
                   </tr>
                   
                    <tr>   <td width="120">PERIODE</td><td width="10">:</td><td width="300"><?php echo $ebit->periode ?> </td>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">BULAN</th>
                      <th style="vertical-align: middle;text-align: center;">NILAI TARGET</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_target as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['namabulan']; ?></td>
                      <td><?php echo $row['nilai_target']; ?></td>
                      <td style="text-align: center;">       
                       <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Ebitda/editdetail/<?php echo $row['idtarebit']; ?>"><i class="fa fa-edit"></i></a>                                   
                      <!-- <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-remove"></i></a> -->
                     </td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>
               </div>
              
                <!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">




