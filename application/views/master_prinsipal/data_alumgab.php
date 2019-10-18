<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>cmasterprinsp">Prinsipal</a></li>
     <li class="active"><a href="<?php echo base_url(); ?>cmasterprinsp/alum">ALUM</a></li>
     <li class=""><a href="<?php echo base_url(); ?>cmasterprinsp/alkes">ALKES</a></li>
 </ul>
	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master ALUM
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 		  
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>cmasterprinsp/savedata_alum" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="box-body chat" id="chat-box">
				  <!--
                    <div class="form-group">
                      <label for="">Id Prinsipal</label>
                        <input readonly type="text" class="form-control" value="<?php echo $kode_prinsipal; ?>" id="" name="idprinsipal" placeholder="Isikan No Pengajuan" required>
                    </div>
					-->
         <!--  <input type="radio" name="tipe_produk" id="obat"  onclick="javascript:yesnoCheck();">PERUSAHAAN OBAT<br>
            <input type="radio" name="tipe_produk" id="alum"  onclick="javascript:yesnoCheck(); ">PERUSAHAAN ALUM<br>
            <input type="radio" name="tipe_produk" id="alkes"  onclick="javascript:yesnoCheck();">PERUSAHAAN ALKES<br><br> -->

                    <div class="form-group">
                      <label for="">Nama Alum</label><br>
                        <select id="alumid" name="alumid" class="chosen" required>
                          <option value="-"></option>
                          <?php foreach($kode_alum as $row) { ?>
                              <option value="<?php echo $row['alumid'] ?>"><?php echo $row['pt_alum'] ?></option>
                          <?php } ?>
                        </select> <br>
                         <input type="hidden" class="form-control"  value="-" id="" name="alumnama" required>                 
                      <input type="hidden" class="form-control"  value="-" id="" name="pt_alum" required><br>
                       <label for="">KODE DISTRIBUTOR</label>
                         <input type="text" class="form-control"  value="-" id="" name="distalumid" placeholder="Isikan Nama PT (Prinsipal)" required><br>
                         <label for="">NAMA DISTRIBUTOR</label>
                         <input type="text" class="form-control"  value="-" id="" name="distalumnama" placeholder="Isikan Nama PT (Prinsipal)" required>             
                    </div>
    
					
					
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('cmasterprinsp/alum')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
</div>
 

<div class="box-body">
          
           <div class="box-body table-responsive">
              <table id="datatables5" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                      <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Nama Alum</th>
                      <th style="text-align:center;">Nama Perusahaan</th>
                      <th style="text-align:center;">Kode Distributor</th>
                     <!-- <th style="text-align:center;"> Aksi </th> --!>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_alum as $pkj) 
          {

          $no++ ?>
        <tr>         
            <td style="text-align:center;"><?php echo $no; ?></td> 
            <td style="text-align:center;"><?php echo ($pkj['alumnama']); ?></td>
            <td style="text-align:left;"><?php echo ($pkj['pt_alum']); ?></td>
             <td style="text-align:left;"><?php echo ($pkj['distalumid']); ?></td>
           <!-- <td style="text-align:center;">
                      
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>cmasterprinsp/hapus_alum/<?php echo $pkj['idalums']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <!--<a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik/<?php echo $pkj['idpktkrj']; ?>" target="blank"><i class="fa fa-print"></i></a>-->
                      </td> --!>
          <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>


<?php
        // foreach($data_prinsipal as $i){
        // $id_tipe_rekanan = $i['id_tipe_rekanan'];
        // $no_tipe_rekanan = $i['no_tipe_rekanan'];
        // $nm_tipe_rekanan = $i['nm_tipe_rekanan'];
              
         // ?>
<!--
// <div id="modal_edit<?php echo $no_tipe_rekanan;?>" class="modal fade">
  // <div class="modal-dialog modal-md">
    // <!-- <div class="modal-content"> 
  // <div class="panel panel-danger">
       // <div class="panel-heading">
        // <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        // <h4 class="modal-title">EDIT</h4></td>
      // </div>
        // <div class="modal-body">
                  // <form role="form" action="<?php echo base_url(); ?>tipeproduk/updateproduk" method="POST" enctype="multipart/form-data">
                  // <div class="col-md-6">
                    // <div class="form-group">
                      // <input type="hidden" class="form-control" value="<?php echo $id_tipe_rekanan; ?>" id="" name="idpro">
                    // </div>

                    // <div class="form-group">
                      // <label for="">ID TIPE PRODUK</label>
                        // <input type="text" class="form-control" value="<?php echo $no_tipe_rekanan; ?>" id="" name="id_tipe_produk" required readonly>
                    // </div>

                    // <div class="form-group">
                      // <label for="">TIPE PRODUK</label>
                        // <input type="text" class="form-control" value="<?php echo $nm_tipe_rekanan; ?>" id="" name="tipe_produk" > 
                      // </div>  

                    // </div>
                             // <div class="form-group">
                  // <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                // </div><!-- /.col 
                           // </div>/.item 
                
               // </form>   
 
              // </div></div></div></div> 
             // <?php //} ?>


-->














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
			 $('#kode_prinsipal').on('change',function(){
                
                var kode_prinsipal=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cmasterprinsp/get_barang')?>",
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



