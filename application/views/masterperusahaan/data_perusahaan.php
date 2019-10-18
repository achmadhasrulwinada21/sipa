     <!--<ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>masterperusahaan">Master Perusahaan Obat</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_depbang">Master Perusahaan Depbang</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alum">Master Perusahaan Alum</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alkes">Master Perusahaan Alkes</a></li>
	</ul> -->
	 
<ul class="nav nav-tabs">
  <?php
   $kodedara=($this->session->userdata('koderole'));
     if($kodedara =='1' or $kodedara =='67' ):?>
        <li class="active"><a href="<?php echo base_url(); ?>masterperusahaan">Master Perusahaan Obat</a></li>
    <?php endif;?>

    <?php
     $kodedara=($this->session->userdata('koderole'));
       if($kodedara =='1'):?>
          <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alkes">Master Perusahaan Alkes</a></li>
     <?php endif;?>

    <?php
     $kodedara=($this->session->userdata('koderole'));
       if($kodedara =='1' or $kodedara =='66' or $kodedara =='72' or $kodedara =='74' ):?>
          <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_alum">Master Perusahaan Alum</a></li>
    <?php endif;?>

     <?php
      $kodedara=($this->session->userdata('koderole'));
        if($kodedara =='1'):?>
          <li class=""><a href="<?php echo base_url(); ?>masterperusahaan/dataperusahaan_depbang">Master Perusahaan Depbang</a></li>
     <?php endif;?>
   </ul>    
	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> DATA MASTER PERUSAHAAN OBAT</b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>masterperusahaan/addperusahaan" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Excel_import/perobat" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>
			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush_obat" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL </a>
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			<div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>masterperusahaan/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  
		            <input type="hidden" class="form-control" value="TP001" id="" name="id_tipe_produk" required readonly>
			    <input type="hidden" class="form-control" value="OBAT" id="" name="tipe_produk" required readonly>
			  
				
			
				  
                    <div class="form-group">
                      <label for="">Kode perusahaan</label> <a style="color: red;">*</a>
                        <input type="text" class="form-control" value="" id="" name="koper" placeholder="Isikan Kode Perusahaan" autocomplete="off" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"     >
                    </div>
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label> <a style="color: red;">*</a>
                        <input type="text" class="form-control" autocomplete="off"  value="" id="" name="nm_perusahaan" placeholder="Isikan Nama Perusahaan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" >            
                    </div>
		
					
			
			
		
                 <div id="alkes"  class=""> 

			    <div class="form-group">
                      <label for="">Isian Checklist :</label> <a style="color: red;">*</a>
                                              
                   </div>


			 <div class="col-lg-6">   
				     <div class="checkbox">
                      <label><input type="checkbox"  value="1" id="" name="foi" required>FOI</label>
                                               
                   </div>
				   </div>
				   
				    <div class="col-lg-6">   
				     <div class="checkbox">
                      <label><input type="checkbox"  value="1" id="" name="mou" required>MOU</label>
                                              
                   </div>
				   </div>
   
                  	          
                 
				     <div  class="form-group">
                      <label for="">Pks Renewal</label> <a style="color: red;">*</a>
                        <input type="text" class="form-control" autocomplete="off" value="" id="" name="pks" placeholder="Isikan Pks Renewal" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">                        
                   </div>
				
				   
				  
				   
				   
				   
				   
				   
                   <!-- <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="datepicker1" class="form-control" value="" id="datepicker1" name="createdate" placeholder="Isikan Tanggal" required>                        
                    </div>
                  </div>-->
                   
                <!--</div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>masterperusahaan" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div>
               </form>-->
     </form>
		<div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('masterperusahaan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">NO</th>
                      <th style="text-align:center;">KODE</th>
                      <th style="text-align:center;">NAMA PERUSAHAAN</th>
					  <th style="text-align:center;">TIPE</th>
					  <th style="text-align:center;">FOI</th>
					  <th style="text-align:center;">MOU</th>
					  <th style="text-align:center;">PKS RENEWAL</th>
                      <th style="text-align:center;">AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_perusahaan as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:center;"><?php echo $row['koper']; ?></td>
                      <td><?php echo $row['nm_perusahaan']; ?></td>
					   <td style="text-align:center;"><?php echo $row['tipe_produk']; ?></td>
					   <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['foi']; if($c1=='1') echo " Checked "?>></td>
					   <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['mou']; if($c1=='1') echo " Checked "?>></td>
					   <td style="text-align:center;"><?php echo $row['pks']; ?></td>
                      <td style="text-align:center;">
					  <!--<a href="<?php echo base_url(); ?>masterperusahaan/editmasterperusahaan/<?php echo $row['id_perusahaan']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>-->
                      <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_perusahaan']; ?>"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Anda Yakin Hapus Data <?php echo $row['koper']; ?> ....??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masterperusahaan/hapus_perusahaan/<?php echo $row['id_perusahaan']; ?>"><i class="fa fa-close"></i></a>

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
      foreach($data_perusahaan as $i){
      $id_perusahaan= $i['id_perusahaan'];
	  $koper= $i['koper'];
      $nm_perusahaan = $i['nm_perusahaan'];
	  $foi = $i['foi'];
	  $mou = $i['mou'];
	  $pks = $i['pks'];


              
         ?>

	<div id="modal_edit<?php echo $id_perusahaan;?>" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EDIT</h4></td>
			</div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>masterperusahaan/update_perusahaan" method="POST" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_perusahaan; ?>" id="" name="id_perusahaan" readonly>
                    </div>

					<div class="form-group">
                      <label for="">Kode Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $koper; ?>" id="" name="koper" readonly >
                    </div>
					
					
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" value="<?php echo $nm_perusahaan; ?>" id="" name="nm_perusahaan" required >
                    </div>
					
				   <div class="form-group">
                      <label for="">Isian Checklist :</label>
                                              
                   </div>
					
					<div class="col-lg-12"> 
						<div class="col-lg-3"> 				  
							<div class="form-group">
								<input type="checkbox"  value='1' name="foi" <?php echo $c1=$foi; if($c1=='1') echo " checked "?>> FOI </input> 
						</div>
					</div>
					
					<div class="col-lg-3"> 
						<div class="form-group">
							<input type="checkbox"  value='1' name="mou" <?php echo $c1=$mou; if($c1=='1') echo " checked "?>> MOU </input> 
						</div>
					</div>
					</div>
								
				  
				    <div class="form-group">
                      <label for="">Pks Renewal</label>
                        <input type="text" class="form-control" value="<?php echo $pks; ?>" id="" name="pks" required >
                    </div>
					
                	<br></br>
                    
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>

	   
	   
	   
	   
