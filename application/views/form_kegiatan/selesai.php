	 <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?>
  <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>form_kegiatan">Form Rencana</a></li>
     <li class=""><a href="<?php echo base_url(); ?>form_kegiatan/Disetujui_rencana">Form Realisasi</a></li>
      <li class="active"><a href="<?php echo base_url(); ?>form_kegiatan/selesai">Form Laporan</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>mkegiatan">Master Acara</a></li>
    <li class=""><a href="<?php echo base_url(); ?>msesi">Master Kegiatan</a></li>	 
	</ul> 
<?php endif;?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b>LAPORAN</b>
        </h4>
        </section>
               
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- Small boxes (Stat box) -->
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

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="info" style="color:black;font-weight: bold;">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">NAMA ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">DESKRIPSI</th>
                      <th  style="vertical-align: middle;text-align: center;">PELAKSANA</th>
                      <th  style="vertical-align: middle;text-align: center;">TANGGAL ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">PRINT Rencana</th>
                      <th  style="vertical-align: middle;text-align: center;">PRINT Realisasi</th>
                    </tr>
                    <!-- <tr class="info" style="color:black;font-weight: bold;">
                      <th>RUMAH SAKIT</th>
                      <th>DEPARTEMEN</th>
                    </tr> -->
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($form_kegiatan as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="color:black;font-weight: bold;">
                      <td><?php echo $no; ?></td>
                      <td><a href="<?php echo base_url(); ?>form_kegiatan/tampil/<?php echo $row['idfkeg']; ?>"><?php echo $row['nama_kegiatan']; ?></a></td>
                       <td><?php echo $row['judul_kegiatan']; ?></td>
                      <?php if($row['nama_rs'] !='-' and $row['departemen'] =='-' ): ?>
                      <td><?php echo $row['nama_rs']; ?></td>
                       <?php endif;?>
                       <?php if($row['departemen'] !='-' and $row['nama_rs'] =='-' ): ?>
                      <td><?php echo $row['departemen']; ?></td>
                      <?php endif;?>
                      <td><?php echo $row['tanggal_acara']; ?></td>
                      
                        <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>Laporananggarann/cetak_anggaranrencana/<?php echo $row['idfkeg']; ?>"><i class="fa fa-print"></i></a></td>
                        <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>Laporananggarann/cetak_anggarann/<?php echo $row['idfkeg']; ?>"><i class="fa fa-print"></i></a></td>
                                                                  
                        

                        <!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idpr']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 

                     <!-  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/tampil/<?php// echo $row['idpr']; ?>"><i class="fa fa-desktop"></i></a>  -->

                      
                    <!--  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php// echo base_url(); ?>produko/editproduko/<?php// echo $row['idpr']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                     
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
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     <tr><td width="200">TIPE PRODUK</td><td width="10">:</td><td width="300"><?php echo $prod->tipe_produk ?> </td></tr>
                   </tr>
                   
                    
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
              <?php 
                         $a=$prod->tipe_produk;
                   if($a=='OBAT'):  
                   ?>
                       <td><?php echo $tr['produko']; ?></td>
             <?php endif;?>

                    <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALUM'):  
                   ?>
                        <td><?php echo $tr['produkom']; ?></td>
             <?php endif;?>
             <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALKES'):  
                   ?>
                        <td><?php echo $tr['alkes']; ?></td>
             <?php endif;?>
              <td style="text-align: center;"><?php echo number_format($tr['harga']); ?></td>
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

    