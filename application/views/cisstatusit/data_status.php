<!--MENU ATAS-->	
	<section class="content-header">
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_status"><b>STATUS</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it"><b>1. STANDAR INDUK</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_man"><b>2. STANDAR MAN</b></a></li>

			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_methode"><b>3. METHODE</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_material"><b>4. MATERIAL</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_machine"><b>5. MACHINE</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_money"><b>6. MONEY</b></a></li>
		</ul>							
	</div>
	</div>
	 </section>
	<!--END MENU ATAS-->
	
        <section class="content-header">
        <h1>
          <b>DATA STATUS </b>
		  <br>CIS DEP TI RSH BARU TIPE C
        </h1>
      </section>
	 
	 <?php 
	 //if($this->session->userdata('koderole')=='1'):
		$koderole=($this->session->userdata('koderole'));
		if($koderole=='1' OR $koderole=='5' OR $koderole=='10' OR $koderole=='4' OR $koderole=='14' OR $koderole=='25' OR $koderole=='27' OR $koderole=='35' OR $koderole=='15' OR $koderole=='26' OR $koderole=='17' OR $koderole=='28' OR $koderole=='29'):
	 ?> 
	 
        <!-- Main content -->
        <section class="content">
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			<div class="box box-primary">
              <div class='box-header with-border'> 
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>cis_it_status/add" class="btn btn-primary no-radius dropdown-toggle">
			  <i class="fa fa-plus"></i> TAMBAH </a>
			  
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanCisDeptIT/Cetak_CisDeptIT" target='blank' class="btn btn-success">
			  <i class="fa fa-thumb-tack"></i> PRINT PDF salah </a>
			  
			  <button data-toggle="modal" data-target="#myModal" class="btn btn-success"> <span class="fa fa-thumb-tack"></span> CETAK PDF </button>
			   -->
			 
			<!--  
			<form action="<?php echo base_url(); ?>LaporanCisMoneyIT/Cetak_CisMoneyIT_D" method="POST">
			<?php foreach($namadept as $dt) { ?>
			<input type="hidden" name="nama_cis" value="<?php echo $dt['nama_cis'] = "money"; ?>"  class="form-control">
			<input type="submit" class="btn btn-info" value="6. DOWNLOAD CIS MONEY">
			<?php  } ?>
			</form>-->

			  </div>
				
				<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
				<span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
	
				<div class="box-body table-responsive">
                 <table id="tb-datatables3" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="10" style="vertical-align:middle;text-align:center">NO</th>
                      <th width="100" style="vertical-align:middle;text-align:center">NAMA DEPT</th>
                      <th width="100" style="vertical-align:middle;text-align:center">DOKUMEN CIS</th>
                      <th width="100" style="vertical-align:middle;text-align:center">MENGETAHUI</th>
                      <th width="100" style="vertical-align:middle;text-align:center">MENYETUJUI</th>
                      <th width="100" style="vertical-align:middle;text-align:center">STATUS (Approve)</th>
                      <th style="vertical-align:middle;text-align:center">EDIT</th>
                      <th style="vertical-align:middle;text-align:center">HAPUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_status_cis as $dt) { $no++ ?>
                    <tr>
                      <td width="10" style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td width="100" style="vertical-align:middle;text-align:left"><?php echo $dt['kode_role']; ?></td>
					  <td width="100" style="vertical-align:middle;text-align:left">
						<?php 
						if($dt['nama_cis'] == "induk") {
							echo '<p>1. CIS INDUK</p>';
						}elseif($dt['nama_cis'] == "man"){
							echo '<p>2. CIS MAN</p>';
						}elseif($dt['nama_cis'] == "methode"){
							echo '<p>3. CIS METHODE</p>';
						}elseif($dt['nama_cis'] == "material"){
							echo '<p>4. MATERIAL</p>';
						}elseif($dt['nama_cis'] == "machine"){
							echo '<p>5. MACHINE</p>';
						}elseif($dt['nama_cis'] == "money"){
							echo '<p>6. MONEY</p>';
						}else{
							echo '<p>dll</p>';
						}
						?>
					  </td>
					  <td width="100" style="vertical-align:middle;text-align:left"><?php echo $dt['mengetahui']; ?></td>
					  <td width="100" style="vertical-align:middle;text-align:left"><?php echo $dt['menyetujui']; ?></td>
                      <td width="80" style="vertical-align:middle;text-align:center">
					  <?php 
						if($dt['status'] == "Approve_dir") {
							echo '<p style="background-color:green;color:white;"><b>Disetujui Direktur</b></p>';
						}elseif($dt['status'] == "Not_Approved_dir"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Direktur</b></p>';
						}elseif($dt['status'] == "Revisi_dir"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Direktur</b></p>';
						}elseif($dt['status'] == "Approve_mk"){
							echo '<p style="background-color:green;color:white;"><b>Disetujui Kepala Departemen</b></p>';
						}elseif($dt['status'] == "Not_Approved_mk"){
							echo '<p style="background-color:red;color:white;"><b>Ditolak Kepala Departemen</b></p>';
						}elseif($dt['status'] == "Revisi_mk"){
							echo '<p style="background-color:blue;color:white;"><b>Revisi Kepala Departemen</b></p>';
						}else{
							echo '<p style="background-color:gold;color:black;"><b>Menunggu</b></p>';
						}
						?>
					  </td>
					  
                      <td width="50" style="vertical-align:middle;text-align:center">
                      <a class="btn btn-warning btn-sm" title="Edit" href="<?php echo base_url(); ?>cis_it_status/edit/<?php echo $dt['id_status']; ?>"><i class="fa fa-pencil"></i></a>
                      </td>
					  <td width="50" style="vertical-align:middle;text-align:center">
					  <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" title="Hapus" href="<?php echo base_url(); ?>cis_it_status/hapus/<?php echo $dt['id_status']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
	  <?php endif;?>

	<!-- <?php 
		//$koderole=($this->session->userdata('koderole'));
		//if($koderole!='1' && $koderole!='5' && $koderole!='10' OR $koderole!='4'):
	 ?>  -->
	 
	 <!-- belum di ubaaahhhhhhhhhhhhh ntar aja belakangan	 -->

	  <?php// endif;?>
	  
	  
    <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMPIL</h4></td>
      </div>
	      <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanCisDeptIT/Cetak_CisDeptIT" target='blank' method="POST">
        <div class="form-group"> 
             KODE DEPT :<br>
         <select name="kode_role" class="form-control">
       <!--<option value='0'> Pilih : </option>-->
            <?php foreach($koderoles as $datakd) {
                if(!in_array($datakd['kode_role'],$idfor_post)){ ?>
                <option  value="<?php echo $datakd['kode_role'] ?>">
				<?php echo $datakd['kode_role']?> :  ( <?php echo $datakd['kode_role'] ?> ) </option> 
                <?php } else { ?>
                <option selected="selected" value="<?php echo $datakd['kode_role'] ?>">
				<?php echo $datakd['kode_role']?> : ( <?php echo $datakd['kode_role'] ?> ) </option>
            <?php }} ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                           
  <!-- end modal --> 