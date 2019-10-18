
	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master Produk
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
                  <form role="form" action="<?php echo base_url(); ?>obater/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">

            <input type="checkbox" id="obat" onclick="myFunction3()">OBAT<br>
            <input type="checkbox" id="alum" onclick="myFunction4()">ALUM<br>
            <input type="checkbox" id="alkes" onclick="myFunction5()">ALKES<br><br>
				  
					<div class="form-group" id="textobat" style="display: none;">
                      <label for="">Nama Obat</label>
                        <select id="obatid" name="obatid" class="form-control" required>
                          <option value="-">--Pilih Nama Obat--</option>
                          <?php foreach($kode_obat as $row) { ?>
                              <option value="<?php echo $row['obatid'] ?>"><?php echo $row['obatnama'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

                    <div class="form-group">
                       <input type="hidden" name="obatnama" value="-">
                    </div>

                    <div class="form-group" id="textalkes" style="display: none;">
                      <label for="">Nama Alkes</label>
                     <input type="text" name="alkes"  value="-">
                    </div>

                    <div class="form-group" id="textalum" style="display: none;">
                      <label for="">Nama Alum</label>
                     <input type="text" name="alum"  value="-">
                    </div>

					
					
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('obater')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>

 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
					     <th style="text-align:center;">No</th>
              <th style="text-align:center;">Obat</th>
              <th style="text-align:center;">Alkes</th>
              <th style="text-align:center;">Alum</th>
            <!-- <th style="text-align:center;"> Aksi </th> -->
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_obat as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['obatnama']); ?></td>
					  <td style="text-align:left;"><?php echo ($pkj['alkes']); ?></td>
             <td style="text-align:left;"><?php echo ($pkj['alum']); ?></td>
					 <!-- <td style="text-align:center;">
                      
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>obater/hapus_item/<?php echo $pkj['idobat']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
		     <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik/<?php echo $pkj['idpktkrj']; ?>" target="blank"><i class="fa fa-print"></i></a>
                      </td> -->
					<?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div>

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



