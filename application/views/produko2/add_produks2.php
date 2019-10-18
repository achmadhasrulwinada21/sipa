<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <table  style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;font-weight:bold;">
                <tr><td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td>
                   <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="600"><?php echo $prod->kodis ?> </td></tr>
                </tr>
                    <!-- <?php// } ?> -->
                 </table>
           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko2/savedata" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="koded_prod">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper">

                  				
                       <div class="form-group" >
                      <label for="">NAMA PRODUK (OBAT)</label><br>
                        <select id="kode_produk" name="kode_produk" class="form-control" required>
                          <option required></option>
                          <?php foreach($obat as $row) { ?>
                              <option value="<?php echo $row['kode_produk'] ?>" required><?php echo $row['kode_produk'] ?> :  <?php echo $row['nama_produk'] ?></option>
                          <?php } ?>
                        </select> <br>
                        <input type="hidden" class="form-control" value="" name="nama_produk" id="" placeholder="harga" required/>   
                    </div>
                  <div class="form-group">
                      <label for="">KOMPOSISI</label>
                       <input type="text" class="form-control" value="" name="deskripsi" id="" placeholder="komposisi" required/>                 
                    </div> 
                      <div class="form-group" >
                      <label for="">DISTRIBUTOR</label>
                     <input type="text" class="form-control" value="" name="kodis" id="" placeholder="" />
                     </div>
                
               </div> <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text"  class="form-control" value="" name="harga" id="" placeholder="harga" required/>                 
                    </div> 
                       <div class="form-group">
                      <label for="">DISKON</label>
                       <input type="text" class="form-control" value="" name="discount" id="" placeholder="DISKON" required/>                 
                    </div> 


                   <div class="form-group">
                      <label for="">TIPE HARGA</label><br>
                        <select id="" name="tipe_harga" class="chosen" required>
                          <option value=""required>--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_harga as $row) { ?>
                              <option value="<?php echo $row['idtipeharga'] ?>" required><?php echo $row['tipe_harga'] ?></option>
                          <?php } ?>
                        </select>    
                          </div>  
          
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('produko2')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
                <!-- /.col -->
               </form>
             <!-- <script type="text/javascript">
               $(document).ready(function()
                  {
                     $('.chosen').chosen();
                  }
                );

             </script> -->
       
          <!-- Left col -->
         <!--  <section class="col-lg-12"> -->
            <!-- Chat box -->
            
              
          
         <!--  <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box"> -->
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
            <!--    <a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_Impexel/form"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a> -->

           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr class="danger">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                      <th style="vertical-align: middle;text-align: center;">KOMPOSISI</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th  style="vertical-align: middle;text-align: center;">DISKON</th>
                      <th  style="vertical-align: middle;text-align: center;">TIPE HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_prods2 as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <!--  <td><?php // echo $row['jenis_produk']; ?></td> -->
		       <td><?php echo $row['kodis']; ?></td> 
                       <td><?php echo $row['nama_produk']; ?></td>
		      <td><?php echo $row['deskripsi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($row['harga'], 2,',','.'); ?></td>
                        <td style="text-align: center;"><?php echo $row['discount']; ?> %</td>
                      <td style="text-align: center;"><?php echo $row['tipe_harga']; ?></td>
                         <td style="text-align: center;">                                     
                     <!-- <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php //echo base_url(); ?>produko/editabks/<?php// echo $row['iddetailprod']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                      <!-- <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data??');" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/hapusabks/<?php// echo $row['iddetailprod']; ?>"><i class="glyphicon glyphicon-trash"></i></a> -->

                     <!--  <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php //echo $row['iddetailprod'];?>"><i class="glyphicon glyphicon-remove"></i></a> -->
                         <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>produko2/editabks/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koper']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko2/hapusdetail/<?php echo $row['iddetailprod2']; ?>/<?php echo $row['koded_prod']; ?>/<?php echo $row['koper']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods2); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
               
               </div>
               </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->





			  
