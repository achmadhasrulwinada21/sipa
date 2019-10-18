 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span>RR-LISTING DATA PRODUK DEPBANG<br>
           <b>tanggal transaksi <span> : </span><?php echo $tr->tanggal ?></b>
          </span></b>
        </h4>
        </section>
               
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                 <form role="form" action="<?php echo base_url(); ?>Lapdepbang/expor_detildepbang21" method="POST"  enctype="multipart/form-data" target="blank">
                         
              <div class="form-group" hidden>
                    <label>PERIODE AWAL</label>
                       <input type="text" name="tanggal_tr" value="<?php echo $tr->tanggal ?>" id="" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div> 
            <div style="text-align:left;margin-left:3%;" class="form-actions">
            <button  type="submit" class="btn btn-info"><i class="fa fa-print"></i> PRINT </button>
            
         </form>               
                 <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>Depbangtr/cetakdepbang"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
                 <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                     
                </div><!-- /.box-title -->
               
                <div class="table-responsive">
                   <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr bgcolor="grey" style="font-family:verdana;color:white;font-weight:bold;">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">PERUSAHAAN</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_alum as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="font-family:verdana;color:black;font-weight:bold;">
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                      <td style="vertical-align: middle;text-align: justify;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['nm_perusahaan']; ?></a></td>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div><!-- /.box -->
          </div><!-- /.col -->
       
       
       <!-- /.row -->

    <!-- /.content -->

<!------- modal -------->

<?php
      foreach($data_alum as $i){
       $idpr2 = $i['idpr2'];        
         ?>

<div id="modal_edit<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body modal-lg">
          <?php 
              $this->load->model('produkom2');
          if (isset($idpr2)) {
      
    $tampil= $this->produkom2->Getprodukms2alum("where kode_tr='$idpr2' and (statusdetil='0'
      or statusdetil is null or statusdetil='5')")->result_array();
    $prod = $this->db->get_where('v_produkodepbang',['idpr2'=>$idpr2])->row();

    }
        ?>
                        <?php include 'tampil_produkdepbang.php';?>
                 
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>


  
    
