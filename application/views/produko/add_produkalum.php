 <!-- <link href="<?php //echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
<script src="<?php //echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
       <link rel="stylesheet" href="<?php //echo base_url('assets/css/bootstrap-select.min.css'); ?>"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
   <!--  <script src="<?php //echo base_url('assets/js/bootstrap-select.min.js'); ?>"></script>  -->

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
          <?php
           $a=$prod->tipe_produk;
                   if($a=='OBAT'):  
                   ?>
                  <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;font-weight:bold;">
                <tr><td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td>
                   <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                </tr>
                    <!-- <?php// } ?> -->
                 </table>
                  <?php endif;?>
<?php
                  $a=$prod->tipe_produk;
                   if($a=='ALKES'):  
                   ?>
                  <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;font-weight:bold;">
                <tr><td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->pt_alkes ?></td>
                   <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->distalkesid ?> </td></tr>
                </tr>
                    <!-- <?php// } ?> -->
                 </table>
                  <?php endif;?>
<?php
                  $a=$prod->tipe_produk;
                   if($a=='ALUM'):  
                   ?>
                  <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;font-weight:bold;">
                <tr><td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->pt_alum ?></td>
                   <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->distalumid ?> </td></tr>
                </tr>
                    <!-- <?php// } ?> -->
                 </table>
                  <?php endif;?>
           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko/savedata_alumc" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-6">
                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr ?>" id="" name="koded_prod">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->pabrik_id ?>" id="" name="pabrikid"> 
                     <input type="hidden" class="form-control" value="<?php echo $prod->alumid ?>" id="" name="alumid"> 
                  				 <?php 
                         $a=$prod->tipe_produk;
                   if($a=='OBAT'):  
                   ?>
                       <div class="form-group" >
                      <label for="">NAMA PRODUK (OBAT)</label>
                        <select id="obatid" name="obatid" class="form-control" required>
                          <option value="-">pilih obat</option>
                          <?php foreach($obat as $row) { ?>
                              <option value="<?php echo $row['obatid'] ?>"><?php echo $row['obatnama'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                 <input type="hidden" class="form-control" value="" name="produko" id="" placeholder="harga" required/> 
                 <?php endif;?>
             <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALUM'):  
                   ?>
                    <div class="form-group" >
                      <label for="">NAMA PRODUK (ALUM)</label><br>
                        <select id="barangid" name="alumpbkid" class="chosen" required>
                          <option value="-">--Pilih Tipe Produk--</option>
                          <?php foreach($alum as $row) { ?>
                              <option value="<?php echo $row['barangid'] ?>"><?php echo $row['barangnama'] ?></option>
                          <?php } ?>
                        </select>  <br>  
                    </div>
          
          <input type="hidden" class="form-control" value="" name="produkom" id="" placeholder="nama produk"/>  
          
          <?php endif;?>

          <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALKES'):  
                   ?>
                   <div class="form-group" >
                      <label for="">NAMA PRODUK (ALKES)</label>
                        <select id="alkesid" name="alkesid" class="form-control" required>
                          <option value="-">--Pilih Tipe Produk--</option>
                          <?php foreach($alkes as $row) { ?>
                              <option value="<?php echo $row['alkesid'] ?>"><?php echo $row['alkes'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
          
          <input type="hidden" class="form-control" value="" name="alkes" id="" placeholder="nama produk"/>   
          
          <?php endif;?>
                    <div class="form-group">
                      <label for="">HARGA</label>
                       <input type="text" class="form-control" value="" name="harga" id="" placeholder="harga" required/>                 
                    </div> 

                    <div class="form-group">
                      <label for="">TIPE HARGA</label>
                        <select name="tipe_harga" class="form-control" required>
                          <option value="-">--Pilih--</option>
                              <option value="Jumlah < = E-Cat">Jumlah <= E-Cat</option>
                              <option value="Jumlah = E-Cat">Jumlah = E-Cat</option>
                              <option value="Jumlah < 10 % E-Cat">Jumlah < 10 % E-Cat</option>
                              <option value="Jumlah > 10 % E-Cat">Jumlah > 10 % E-Cat</option>
                          </select> 
                          </div> 
          
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('produko/alum')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
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
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr class="danger">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th  style="vertical-align: middle;text-align: center;">TIPE HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_prods as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <!--  <td><?php // echo $row['jenis_produk']; ?></td> -->
					   
                       <td style="text-align: center;"><?php echo $row['produkom']; ?></td>
						
              <td style="text-align: center;">Rp.<?php echo number_format($row['harga'], 2,',','.'); ?></td>
                        
                      <td style="text-align: center;"><?php echo $row['tipe_harga']; ?></td>
                         <td style="text-align: center;">                                     
                     <!-- <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php //echo base_url(); ?>produko/editabks/<?php// echo $row['iddetailprod']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                      <!-- <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data??');" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/hapusabks/<?php// echo $row['iddetailprod']; ?>"><i class="glyphicon glyphicon-trash"></i></a> -->

                     <!--  <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php //echo $row['iddetailprod'];?>"><i class="glyphicon glyphicon-remove"></i></a> -->

                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko/hapusdetailalum/<?php echo $row['iddetailprod']; ?>/<?php echo $row['koded_prod']; ?>/<?php echo $row['alumid']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods); ?></b></td></tr>
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



<?php
        foreach($data_prods as $i){
        $iddetailprod = $i['iddetailprod'];
        $koded_prod = $i['koded_prod'];
         $pabrik_id = $i['pabrik_id'];
        $jenis_produk = $i['jenis_produk'];
        $produko = $i['produko'];
        $produkom = $i['produkom'];
         $alkes = $i['alkes'];
         $tipe_harga = $i['tipe_harga'];
        $harga = $i['harga'];
             
              
              
         ?>
<div id="modal_edit<?php echo $iddetailprod;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">HAPUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>produko/updateabksd" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $iddetailprod;?>" id="" name="iddetailprod">
                      <input type="hidden" class="form-control" value="<?php echo $koded_prod;?>" id="" name="koded_prod">
                      <input type="hidden" class="form-control" value="<?php echo $jenis_produk;?>" id="" name="jenis_produk">
                      <input type="hidden" class="form-control" value="<?php echo $produko;?>" id="" name="produko">
                      <input type="hidden" class="form-control" value="<?php echo $produkom;?>" id="" name="produkom">
                       <input type="hidden" class="form-control" value="<?php echo $alkes;?>" id="" name="alkes">
                      <input type="hidden" class="form-control" value="<?php echo $tipe_harga;?>" id="" name="tipe_harga">
                      <input type="hidden" class="form-control" value="<?php echo $harga;?>" id="" name="harga">
                      <input type="hidden" class="form-control" value="<?php echo $pabrik_id;?>" id="" name="pabrikid">
                     

                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin hapus</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

			  
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//('#modalBarang').modal('show');
			 $('#id_produk').on('input',function(){
                
                var id_produk=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('produko/get_barang')?>",
                    dataType : "JSON",
                    data : {id_produk: id_produk},
                    cache:false,
                    success: function(data){
                        $.each(data,function(id_produk, nm_produk, harga_ecat, alkes, alum ){
							$('[name="id_produk"]').val(data.id_produk);
                            $('[name="produko"]').val(data.nm_produk);
                            $('[name="harga_ecat"]').val(data.harga_ecat);
							 $('[name="alkes"]').val(data.alkes);
                            $('[name="produkom"]').val(data.alum);
                       
                            
                        });
                        
                    }
                });
                return false;
           });
		   
		});
	
</script>
