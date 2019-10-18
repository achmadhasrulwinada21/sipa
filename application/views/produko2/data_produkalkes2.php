	<ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>produko">Data Produk</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>produko/aprove">Perbandingan Produk Ecatalog</a></li>
	 
	</ul>

<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA PRODUK</span></b>
        </h4>
        </section>
               
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
              <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>produko">Data Produk Obat</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>produko/alkes">Data Produk alkes</a></li>
     <li class=""><a href="<?php echo base_url(); ?>produko/alum">Data Produk alum</a></li>
   
  </ul>  
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
                  <form role="form" action="<?php echo base_url(); ?>produko/savedatas_alkes" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">KODE TRANSAKSI</label>
                        <input type="text" class="form-control" value="<?php echo $prid; ?>" id="" name="prid" required readonly>
                    </div>

                    <div class="form-group" hidden>
                      <label for="">TIPE PRODUK</label>
                        <select name="tipe_produk" class="form-control" required>
                          <option value="ALKES">--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_produk as $row) { ?>
                              <option value="<?php echo $row['tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

           <!--  <input type="radio" name="tipe" id="obat"  onclick="javascript:yesnoCheck();">PERUSAHAAN OBAT<br>
            <input type="radio" name="tipe" id="alum"  onclick="javascript:yesnoCheck(); ">PERUSAHAAN ALUM<br>
            <input type="radio" name="tipe" id="alkes"  onclick="javascript:yesnoCheck();">PERUSAHAAN ALKES<br><br> -->



             <div class="form-group">
                      <label for="foto">NAMA ALKES</label>
                       <br>
                        <select id="alkesid" name="alkesid" class="form-control" required>
                          <option value="-">pilih alkes</option>
                          <?php foreach($kode_alkes as $row) { ?>
                              <option value="<?php echo $row['alkesid'] ?>"><?php echo $row['pt_alkes'] ?></option>
                          <?php } ?>
              </select>

               <input type="hidden" class="form-control" value="-" id="" name="pt_alkes" required readonly>
              <input type="hidden" class="form-control" value="-" id="" name="alkesnama" required readonly>
                
                      <label for="">DISTRIBUTOR</label>
                        <input type="text" class="form-control" value="-" id="" name="distalkesid" required readonly>
            </div>
                      
             
  
            
           
        </div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('produko/alkes')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
<?php endif;?> 
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                
                <div class="table-responsive">
                <div class="box-body">

                  <table id="datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">KODE TRANSAKSI</th>
                      <th style="vertical-align: middle;text-align: center;">TIPE PRODUK</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA ALKES</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA DISTRIBUTOR</th>
                     <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>                                 <?php endif;?> 
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_alkes as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr']; ?>"><?php echo $row['prid']; ?></a></td>
                       <td><?php echo $row['tipe_produk']; ?></td>
                       <td><?php echo $row['pt_alkes']; ?></td>
                       <td><?php echo $row['distalkesid']; ?></td>
                      <!--  <td><?php// echo $row['foi']; ?></td>
                       <td><?php// echo $row['mou_jkn']; ?></td>
                       <td><?php// echo $row['pks_renewal']; ?></td> --><?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                       <td style="vertical-align: middle;text-align: center;">
                               
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko/adddetail_alkesc/<?php echo $row['idpr']; ?>/<?php echo $row['alkesid']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 

                        <!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idpr']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 

                     <!--  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/tampil/<?php// echo $row['idpr']; ?>"><i class="fa fa-desktop"></i></a>  -->

                      
                  <!-- <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>produko/editproduko/<?php echo $row['idpr']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko/hapusprodalkes/<?php echo $row['idpr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td><?php endif;?> 
                    </tr>
                              <?php
                    
                             }?>
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

<!------- modal -------->

<?php
      foreach($data_prod as $i){
       $idpr = $i['idpr'];        
         ?>

<div id="modal_edit<?php echo $idpr;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom');
          if (isset($idpr)) {
      
    $tampil= $this->produkom->Getprodukm("where idpr=$idpr  AND hapus =0 order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->pt_alkes ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->distalkesid ?> </td></tr>
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>harga</th>
                    <th style="vertical-align: middle;text-align: center;">tipe harga</th>
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['alkes']; ?></td>
            
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
               <td style="text-align: center;"><?php echo $tr['tipe_harga']; ?></td>         
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->

       <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Laporananggaransiang/cetak_anggarankliniksian" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker7" type="text" name = "periode_awal" placeholder="periode_awal..." />
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker8" type="text" name = "periode_akhir" placeholder="periode_akhir..." />
      </div>    
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
  

 
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

    