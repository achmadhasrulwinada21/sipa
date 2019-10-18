   <!--  <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>masterdistributor">Master Distributor Obat</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterdistributor">Master Distributor Depbang</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterdistributor">Master Distributor Alum</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterdistributor">Master Distributor Alkes</a></li>
	</ul>  -->
	 
	 
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER DISTRIBUTOR OBAT </b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterdistributor/adddistributor" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Excel_import/perdisobat" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_distrib2" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL </a>
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masterdistributor/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  
		            <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk" required readonly>
			    <input type="hidden" class="form-control" value="OBAT" id="" name="tipe_produk" required readonly>
			  
				
			
				  
                    <div class="form-group">
                      <label for="">Kode distributor</label><a style="color: red;"> *harus di isi </a>
                        <input type="text" class="form-control" value="" id="" name="kodis" placeholder="Isikan Kode distributor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <label for="">Nama distributor</label><a style="color: red;"> *harus di isi </a>
                        <input type="text" class="form-control" value="" id="" name="nm_distributor" placeholder="Isikan Nama distributor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" >                        
                    </div>
	              </form>   
              

		<div style="text-align:center;" class="form-actions">
            <button type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('masterdistributor')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
		
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA DISTRIBUTOR</th>
					  <th style="text-align:center;">TIPE</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_distributor as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['kodis']; ?></td>
                      <td><?php echo $row['nm_distributor']; ?></td>
					   <td style="text-align:center;"><?php echo $row['tipe_produk']; ?></td>
                      <td style="text-align:center;">
					 <!-- <a href="<?php echo base_url(); ?>masterdistributor/editmasterdistributor/<?php echo $row['id_distributor']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>-->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_distributor']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masterdistributor/hapus_distributor/<?php echo $row['kodis']; ?>"><i class="fa fa-close"></i></a>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.chat -->
        </div>
		</div>
		</div>
       </section>
	   </div>
	   
	   
	   
	   <?php
      foreach($data_distributor as $i){
      $id_kodis= $i['id_distributor'];
	  $kodis= $i['kodis'];
      $nm_distributor = $i['nm_distributor'];
	  $tipe_produk= $i['tipe_produk'];
      $id_tipe_produk = $i['id_tipe_produk'];


              
         ?>

	<div id="modal_edit<?php echo $id_kodis;?>" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EDIT</h4></td>
			</div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>masterdistributor/update_distributor" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_kodis; ?>" id="" name="id_distributor" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Kode distributor</label>
                        <input type="text" class="form-control" value="<?php echo $kodis; ?>" id="" name="kodis" readonly >
                    </div>
					
					
                    <div class="form-group">
                      <label for="">Nama distributor</label>
                        <input type="text" class="form-control" value="<?php echo $nm_distributor; ?>" id="" name="nm_distributor" required >
                    </div>
					
					<div hidden class="form-group">
                      <label for="">Id Tipe</label>
                        <input type="text" class="form-control" value="<?php echo $id_tipe_produk; ?>" id="" name="id_tipe_produk" required >
                    </div>
					
					<div hidden class="form-group">
                      <label for="">Tipe Produk</label>
                        <input type="text" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk" required >
                    </div>
					
					
                	<br></br>
                    
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>

	   
	   
	   
	   
