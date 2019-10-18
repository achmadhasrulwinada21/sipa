<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>form_kegiatan">Form Rencana</a></li>
     <li class=""><a href="<?php echo base_url(); ?>form_kegiatan/Disetujui_rencana">Form Realisasi</a></li>
     <li class=""><a href="<?php echo base_url(); ?>form_kegiatan/selesai">Form Laporan</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>mkegiatan">Master Acara</a></li>
    <li class=""><a href="<?php echo base_url(); ?>msesi">Master Kegiatan</a></li>  
  </ul> 
	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master Acara
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
                  <form role="form" action="<?php echo base_url(); ?>mkegiatan/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">
				
                    <div class="form-group">
                      <label for="">Kode Kegiatan</label>
                        <input readonly type="text" class="form-control" value="<?php echo $kode_kegiatan; ?>" id="" name="kode_kegiatan">
                    </div>
					
					<div class="form-group">
                      <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" value="" id="" name="nama_kegiatan" placeholder="isi nama kegiatan" required>
                    </div>
										
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('mkegiatan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>

 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
					             <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Kode Kegiatan</th>
					            <th style="text-align:center;">Nama Kegiatan</th>
                      <th style="text-align:center;"> Delete </th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_kegiatan as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					 <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['kode_kegiatan']); ?></td>
					  <td style="text-align:left;"><?php echo ($pkj['nama_kegiatan']); ?></td>
             <td style="text-align:center;">
                      
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>mkegiatan/hapus_item/<?php echo $pkj['idkeg']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
					  </td>
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



