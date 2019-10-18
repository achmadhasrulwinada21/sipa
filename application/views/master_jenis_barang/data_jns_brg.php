<section class="content-header">
    <h1 style="text-align:center;">
       <b> MASTER JENIS BARANG ALKES </b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
      <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
                <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
        
          
      <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>master_jns_brg/savemaster" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
          
                    <div class="form-group" hidden>
                      <label for="">Tipe Barang </label>
                        <input type="text" class="form-control" value="TP003" id="" name="tipe_produk"> 
                    </div>
         
                    <div class="form-group">
                      <label for="">Kode Jenis Barang</label>
                        <input type="text" class="form-control" value="<?php echo $kodeunikalkes; ?>" id="" name="kd_jns_brg" placeholder="Isikan Kode Jenis Barang" maxlength="8" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Jenis Barang</label>
                        <input type="text" class="form-control" value="" id="" name="jns_barang" placeholder="Isikan Nama Jenis Barang" autocomplete="off">                        
                    </div>

                   
    
    
    <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Sudah Terisi ? ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            </form>
      <a href="<?php echo site_url('master_jns_brg/master_jenis_barang')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
     
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE JENIS BARANG</th>
                      <th style="text-align:center;">NAMA JENIS BARANG</th>
                      <!-- <th style="text-align:center;">TIPE BARANG</th> -->
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_jenis_barang as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kd_jns_brg']; ?></td>
                      <td><?php echo $row['jns_barang']; ?></td>
                     <!--   <td style="text-align:center;"><?php echo $row['tipe_produk']; ?></td> -->
                      <td style="text-align:center;">
                       
                       <!-- <a href="<?php echo base_url(); ?>master_jenis_pekerjaan/editmaster_jenis_pekerjaan_depbang/<?php echo $row['id_jenis_pekerjaan']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>-->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_jns_brg']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>master_jns_brg/hapus_master_jenis_barang/<?php echo $row['kd_jns_brg']; ?>"><i class="fa fa-close"></i></a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.chat -->
        </div>
    </div>
    </div>
       </section>
     </div>
     
     
     
     <?php
      foreach($data_jenis_barang as $i){
      $id_jns_brg= $i['id_jns_brg'];
      $kd_jns_brg= $i['kd_jns_brg'];
      $jns_barang = $i['jns_barang'];
      $tipe = $i['tipe'];    
         ?>

<div id="modal_edit<?php echo $id_jns_brg;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>master_jns_brg/updatemasterbrg" method="POST" enctype="multipart/form-data">
                 
                     <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_jns_brg; ?>" id="" name="id_jns_brg" readonly>
                    </div>

                    <div class="form-group" hidden>
                      <label for="">Tipe</label>
                      <input type="text" class="form-control" value="<?php echo $tipe; ?>" id="tipe" name="tipe" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Jenis Barang</label>
                        <input type="text" class="form-control" value="<?php echo $kd_jns_brg; ?>" id="" name="kd_jns_brg" required readonly>
                    </div>
          
            <div class="form-group">
                      <label for="">Nama Jenis Barang</label>
                        <input type="text" class="form-control" value="<?php echo $jns_barang; ?>" id="" name="jns_barang" required autocomplete="off">
                    </div>
          
      

                  <br></br>
                    
                  <div class="form-group">
                  <button  type="submit" name="" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
     
     
     
