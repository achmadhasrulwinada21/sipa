	<script type="text/javascript">
$(function() {
    $( "#datepicker71" ).datepicker({  format: 'yyyy-mm-dd'});
    });
$(function() {
    $( "#datepicker81" ).datepicker({  format: 'yyyy-mm-dd'});
    });
$(function() {
    $( "#datepicker91" ).datepicker({  format: 'yyyy-mm-dd'});
    });
$(function() {
    $( "#datepicker61" ).datepicker({  format: 'yyyy-mm-dd'});
    });
</script>
  <ul class="nav nav-tabs">
	  <li class=""><a href="<?php echo base_url(); ?>produko">Data Produk Obat</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>produko/compare">Compare Produk Obat Ecatalog</a></li>
	 
	</ul>
	    
	 <section class="content-header">
        <h4 style="text-align: center;">
          <b>Compare Produk Ecatalog</b>
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
                

                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                <div class="table-responsive box-body">
               
                   <a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanCompare/cetak_compare_obat2" target='blank' class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-print"></i> PRINT</a>
                
                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Nama Pricipal</th>
                      <th style="vertical-align: middle;text-align: center;">Kode Distributor</th>
                      <th style="vertical-align: middle;text-align: center;"> < = E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> = E-Cat</th>
					  <th style="vertical-align: middle;text-align: center;"> < 10% E-Cat</th>
					  <th style="vertical-align: middle;text-align: center;"> > 10% E-Cat</th>
					                                               
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_compare as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td><?php echo $row['nama_pt']; ?></td>
                      <td style="text-align:left;"><?php echo $row['s_kode']; ?></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr']; ?>"><?php echo $row['harga_kecil_e_cat']; ?></a></td>
					  <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit2<?php echo $row['idpr']; ?>"><?php echo $row['harga_sama_e_cat']; ?></a></td>
					  <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit3<?php echo $row['idpr']; ?>"><?php echo $row['harga_dibawahten']; ?></a></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit4<?php echo $row['idpr']; ?>"><?php echo $row['harga_diataten']; ?></a></td>
					                    
                    </tr>
                              <?php
                    
                             }?>
                    </tbody>
				   </table>
                  </div>
                 </div>               
               </div>
            </div>
		
			<!-- /.box -->
</section>
</section>
   

<?php
      foreach($compare as $i){
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
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
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah <= E-Cat'  AND hapus =0 order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                                
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
             
                        
                       <td><?php echo $tr['produko']; ?></td>
            
                     <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>
				</div>
              </div>
			  </div>
			  </div>
			  </div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($compare as $i){
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit2<?php echo $idpr;?>" class="modal fade">
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
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah = E-Cat' AND hapus =0 order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                   <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                     <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['produko']; ?></td>
            
             <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($compare as $i){
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit3<?php echo $idpr;?>" class="modal fade">
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
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah < 10 % E-Cat'  AND hapus =0 order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                   <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                         <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['produko']; ?></td>
             <
             <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->
 
 <?php
      foreach($compare as $i){
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit4<?php echo $idpr;?>" class="modal fade">
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
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah > 10 % E-Cat'  AND hapus =0order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                                      
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                  <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['produko']; ?></td>
            
            <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->


 
 <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//('#modalBarang').modal('show');
			 $('#pabrik_id').on('input',function(){
                
                var pabrik_id=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_pabrik')?>",
                    dataType : "JSON",
                    data : {pabrik_id: pabrik_id},
                    cache:false,
                    success: function(data){
                        $.each(data,function(pabrik_id, idpr, nama_pt, s_kode, harga_sama_e_cat, harga_kecil_e_cat, harga_dibawahten, harga_diataten ){
							$('[name="pabrik_id"]').val(data.pabrik_id);
							$('[name="idpr"]').val(data.idpr);
                            $('[name="nama_pt"]').val(data.nama_pt);
                            $('[name="s_kode"]').val(data.s_kode);
							$('[name="harga_kecil_e_cat"]').val(data.harga_kecil_e_cat);
                            $('[name="harga_sama_e_cat"]').val(data.harga_sama_e_cat);
							$('[name="harga_dibawahten"]').val(data.harga_dibawahten);
                            $('[name="harga_diataten"]').val(data.harga_diataten);
                       
                            
                        });
                        
                    }
                });
                return false;
           });
		   
		});
	
</script>

 <!-- modal print by tanggal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">CETAK PER TANGGAL</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Lapebitda/cetak_ebitda" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker61" type="text" name = "tanggal_awal" placeholder="tanggal_awal..." autocomplete="off" required />
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker71" type="text" name = "tanggal_akhir" placeholder="tanggal_akhir..." autocomplete="off" required />
      </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit"  class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->

   <!-- modal lihat by tanggal -->
      <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">LIHAT PER TANGGAL</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>produko/periode" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker81" type="text" name = "tanggal_awal" placeholder="tanggal_awal..." autocomplete="off" required />
     </div>
     <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker91" type="text" name = "tanggal_awal" placeholder="tanggal_akhir..." autocomplete="off" required />
     </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit"  class="btn btn-info" value="LIHAT">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->

 