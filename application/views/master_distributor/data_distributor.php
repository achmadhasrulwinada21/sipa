
	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master Distributor
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 		  
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>cmasterdistrib/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">
                 	<div class="form-group">
                      <label for="">Nama Distributor</label>
                        <select name="s_kode" class="form-control" required>
                          <option>--Pilih Nama Distributor--</option>
                          <?php foreach($kode_distrib as $row) { ?>
                              <option value="<?php echo $row['s_kode'] ?>"><?php echo $row['s_nama'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
					
                    <div class="form-group">
                      <label for="">Kode Distributor</label>
                        <input type="text" class="form-control"  value="" id="" name="kd_distributor" placeholder="Isikan Kode Distributor" required>                        
                    </div>
					
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('cmasterdistrib')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>

 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                 
					  <th style="text-align:center;">Nama Distributor</th>
                      <th style="text-align:center;">Kode Distributor</th>
                      <th style="text-align:center;"> Aksi </th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_distributor as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:left;"><?php echo ($pkj['s_nama']); ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['kd_distributor']); ?></td>
					  <td style="text-align:center;">
                      <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $pkj['iddistributor']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>cmasterdistrib/hapus_item/<?php echo $pkj['iddistributor']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
					  <!--<a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik/<?php echo $pkj['iddistributor']; ?>" target="blank"><i class="fa fa-print"></i></a>-->
                      </td>
					<?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div>


<?php
      foreach($data_distributor as $i){
      $iddistributor = $i['iddistributor'];
      $s_kode = $i['s_kode'];
	  $s_nama = $i['s_nama'];
       $kd_distributor = $i['kd_distributor'];
              
         ?>

<div id="modal_edit<?php echo $iddistributor;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>cmasterdistrib/update_distributor" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $iddistributor; ?>" id="" name="iddistributor">
                    </div>

                    <div hidden class="form-group">
                      <label for="">kode Distributor</label>
                        <input type="text" class="form-control" value="<?php echo $s_kode; ?>" id="" name="s_kode" required readonly>
                    </div>
					
					 <div class="form-group">
                      <label for="">Nama Distributor</label>
                        <input type="text" class="form-control" value="<?php echo $s_nama; ?>" id="" name="s_nama" required readonly>
                    </div>

                    <div class="form-group">
                      <label for="">Kode Distributor</label>
                        <input type="text" class="form-control" value="<?php echo $kd_distributor; ?>" id="" name="kd_distributor" > 
                      </div>  
                    
					<br></br>
                    
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                           </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>

















<!-- ============ MODAL ADD PENJUALAN BARANG =============== -->
<!--
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL MATERIAL</h4></td>
      </div>
	      <div class="modal-body">

        <form action="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistriku" target='blank' method="POST">
        <div class="form-group"> 
             CARI ITEM MATERIAL    :<br>
         <select name="koders" class="form-control">
       <option> -- Pilihan Material --</option>
	   <?php foreach($optRS as $row) { ?>
            <option value=<?php echo $row['koders'] ; ?>><?php echo $row['namars']?>
			</option>
            <?php  } ?>
          </select>
        </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" target='blank' class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>       

-->


<!--
<div id="modalAddPenjualanBarang" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL MATERIAL</h4></td>
      </div>
	 <div class="modal-body">
     <form id="frm" name="frm"  method="post" action="<?php echo base_url('cpengajuancab/add')?>">
        <div class="modal-body" style="min-height: 300px">
		
           <div class="form-group">
		   <label class="control-label">DAFTAR MATERIAL</label>
                        <select id="id_material" name="id_material" class="form-control">
						<option> -- Pilihan Material --</option>
						<?php 
						    if(isset($data_material)){
                            foreach($data_material as $row){
                                ?>
                                <option value="<?php echo $row['id_material'] ?>"><?php echo $row['nm_material'] ?></option>
                            <?php
                            }
                        }
                        ?>
					</select>
                </div>
				
		
				 <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" class="form-control" value="" id="" name="id_material" readonly="readonly">
                    </div>

					<div class="form-group">
                        <label for="">Nama Material</label>
                        <input type="text" class="form-control" value="" id="" name="nm_material" readonly="readonly">
                    </div>
					
					<div class="form-group">
                        <label for="">Nama Satuan</label>
                        <input type="text" class="form-control" value="" id="" name="satuan" readonly="readonly">
                    </div>
					
					<div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" value="" id="example2" name="harga" readonly="readonly">
                    </div>
					
					<div class="form-group">
                        <label for="">Volume</label>
                        <input name="volume" type="text" class="form-control" placeholder="Input Jumlah Pengadaan...">
                    </div>
					
				
	      <div id="data_material" >
		  </div>
		  
	  
				
				
<!--				
		<input type="submit"  id="add" name="add" target='blank' class="btn btn-primary" value="">
</form>
		
-->



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//('#modalBarang').modal('show');
			 $('#id_material').on('change',function(){
                
                var id_material=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cpengajuancab/get_barang')?>",
                    dataType : "JSON",
                    data : {id_material: id_material},
                    cache:false,
                    success: function(data){
                        $.each(data,function(id_material, nm_material, harga, satuan){
							$('[name="id_material"]').val(data.id_material);
                            $('[name="nm_material"]').val(data.nm_material);
                            $('[name="harga"]').val(data.harga);
                            $('[name="satuan"]').val(data.satuan);
                            
                        });
                        
                    }
                });
                return false;
           });

				function startCalc(){
						interval = setInterval("calc()",1);}
						function calc(){
						one = document.form2.volume.value;
						two = document.form2.harga.value;
											
						document.form2.subtotal.value = (one * two);
				
						
						}
						function stopCalc(){
						clearInterval(interval);}   
		   
		
		   
		   
		});
	
</script>



