	<!-- <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>produko">Data Produk</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>produko/aprove">Perbandingan Produk Ecatalog</a></li>
	 
	</ul> -->

 
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA PRODUK ALUM</span></b>
          <br>
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
                <div class="item">
                  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                  <form role="form" action="<?php echo base_url(); ?>produko2/savedatas_alum" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-6">      
                   
             <div class="form-group">
                      <label for="foto">NAMA PERUSAHAAN</label>
                       <br>
                        <select id="koper" name="koper" class="form-control" required>
                          <option value="">pilih perusahaan</option>
                          <?php foreach($kode_alum as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
              </select></div>

              <input type="hidden" class="form-control" value="" id="" name="id_tipe_produk" required readonly>
           <input type="hidden" class="form-control" value="<?php echo $tr->idtrcom ?>" id="" name="kode_th" required readonly>  
                <input type="hidden" class="form-control" value="<?php echo $tr->tanggal ?>" id="" name="tanggal_tr" required readonly>    
             <!--  <div class="form-group">         
                      <label for="">DISTRIBUTOR</label>
                        <input type="text" class="form-control" value="" id="" name="kodis" required readonly>
            </div>           
            -->
        </div></div></div>
        <div style="text-align:left;margin-left:5%;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('produko2/alum')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
<br>
<div class="panel panel-primary"></div>
<?php endif;?> 
            <div class="col-md-12">
                      <br>                

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
                      <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th> 
                    <?php endif;?>                                 
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
                       <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                       <td style="vertical-align: middle;text-align: center;">
                         
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko2/adddetail_alumc/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
                       <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>produko2/editprodukoalum/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                       <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko2/hapusprodalum/<?php echo $row['idpr2']; ?>/<?php echo $row['kode_th']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>  
                     </td><?php endif;?>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div><!-- /.box -->
          </div><!-- /.col -->
        <!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
       

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
      
    $tampil= $this->produkom2->Getprodukms2alum("where kode_tr='$idpr2'")->result_array();
    $prod = $this->db->get_where('v_produkoalum',['idpr2'=>$idpr2])->row();

    }
        ?>
                        <?php include 'tampil_produkalum2.php';?>
                 
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>


  
    
