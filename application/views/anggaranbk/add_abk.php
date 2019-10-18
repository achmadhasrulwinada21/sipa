<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN DETAIL</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
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
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <td width="80">NAMA ACARA</td><td width="10">:</td><td width="300"><?php echo $abk->nama_acara ?> </td></tr>
                      <tr>   <td width="100">RUANGAN</td><td width="10">:</td><td width="300"><?php echo $abk->ruangan ?></td>
                   </tr>
                    <tr>  <td width="100">DEPARTEMEN</td><td width="10">:</td><td width="300"><?php echo $abk->departemen ?> </td></tr>
                    <tr>   <td width="100">RUMAH SAKIT</td><td width="10">:</td><td width="300"><?php echo $abk->rumah_sakit ?> </td>
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
                      <th style="vertical-align: middle;text-align: center;">SESI</th>
                      <th style="vertical-align: middle;text-align: center;">KEBUTUHAN</th>
                      <th style="vertical-align: middle;text-align: center;">JUMLAH</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">SUBTOTAL</th>
                       <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_abks as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['sesi']; ?></td>
                      <td><?php echo $row['nama_kebutuhan']; ?></td>
                      <td style="text-align: center;"><?php echo $row['jumlah']; ?></td>
                      <td>Rp.<?php echo (number_format($row['harga'], 2,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['subtotal'], 2,',','.')); ?></td>
                       <td>                                          
                     <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>anggaranbk/editabks/<?php echo $row['iddetacara']; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data??');" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>anggaranbk/hapusabks/<?php echo $row['iddetacara']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                     </td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>
               </div>
               <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>anggaranbk/savedata" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6" style="margin-left:25%;">
                    <div class="form-group">
                     <input type="text" class="form-control" value="<?php echo $abk->idacara ?>" id="" name="kode_acara">                              
                    </div>               
                    <div class="form-group">
                      <label for="">SECTION</label>
                        <select name="sesi" class="form-control" required>
                          <option>--Pilih Section--</option>
                              <option value="1">Section 1</option>
                              <option value="2">Section 2</option>
                              <option value="3">Section 3</option>
                              <option value="4">Section 4</option>
                              <option value="5">Section 5</option>
                              <option value="6">Section 6</option>
                              <option value="7">Section 7</option>
                              <option value="8">Section 8</option>
                              <option value="9">Section 9</option>
                              <option value="10">Section 10</option>
                          </select> 
                          </div>   
                  <div class="form-group">
                      <label for="">KEBUTUHAN</label>
                        <select name="kebutuhan" class="form-control" required>
                          <option>--Pilih Kebutuhan--</option>
                          <?php foreach($optkebutuhan as $row) { ?>
                              <option value="<?php echo $row['kd_kebutuhan'] ?>"><?php echo $row['nama_kebutuhan'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>   
                    <div class="form-group">
                      <label for="">JUMLAH</label>
                       <input type="text" class="form-control" value="" name="jumlah" id=""/>                 
                    </div>
                    <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text" class="form-control" value="" name="harga" id="" placeholder="harga"/>                 
                    </div> 
          <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>anggaranbk" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
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



