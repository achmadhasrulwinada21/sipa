<!--MENU ATAS-->	
	<section class="content-header">
	<div class="row">
	<div class="col-md-12 clearfix">
		<ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_status"><b>STATUS</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it"><b>1. STANDAR INDUK</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_man"><b>2. STANDAR MAN</b></a></li>

			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_methode"><b>3. METHODE</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_material"><b>4. MATERIAL</b></a></li>
			
			<li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_machine"><b>5. MACHINE</b></a></li>
			
			<li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
			<a href="<?php echo base_url(); ?>cis_it_money"><b>6. MONEY</b></a></li>
		</ul>							
	</div>
	</div>
	 </section>
	<!--END MENU ATAS-->
	
	<section class="content-header">
		<h4>
          <b>STANDAR MACHINE CIS DEP TI RSH BARU TIPE C</b>
        </h4>
    </section>
<style type="text/css">
table {
	width: 100%;
    border-collapse: collapse;
}

table{
    border: 1px solid #A9A9A9;
}

th{
	border: 1px solid #A9A9A9;
	height: 30px;
	font-weight: bold;
	color:#000000;
}

td{
    border: 1px solid #A9A9A9;
	 height: 25px;
	 color:#000000;
	 padding: 5px;
}
	
</style>		
        
<!-- Main content -->
        <section class="content">
	
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			 <div class="box box-primary">
              <div class='box-header with-border'> 
			  <a style="margin-bottom:3px" href="<?php echo base_url("index.php/cis_it_machine/form"); ?>" class="btn btn-warning no-radius dropdown-toggle">
			  <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA </a>

			   <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>#" target='blank' class="btn btn-success">
			  <i class="fa fa-thumb-tack"></i> PRINT PDF </a> -->
			  
			  <!--<button data-toggle="modal" data-target="#myModal" class="btn btn-success"> <span class="fa fa-thumb-tack"></span> CETAK PDF </button>
			  -->
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/import_data_machine_cis_it.xlsx");?>" 
			  class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> BACKUP DATA </a>

			  <a style="margin-bottom:3px" href="<?php echo base_url(); ?>cis_it_machine/delete" 
			  class="btn btn-danger no-radius dropdown-toggle"><i class="glyphicon glyphicon-trash"></i> DELETE </a>
				
			<div class="col-md-12">
			
				<div class="col-md-1">
					<form action="<?php echo base_url(); ?>LaporanCisMachineIT/Cetak_CisMachineIT" target='blank' method="POST">
					<?php foreach($namadept as $dt) { ?>
					<input type="hidden" name="nama_cis" value="<?php echo $dt['nama_cis'] = "machine"; ?>"  class="form-control">
					<input type="submit" class="btn btn-success" value="LIHAT PDF">
					<?php  } ?>
					</form>
				</div>
		
				<div class="col-md-1">
					<form action="<?php echo base_url(); ?>LaporanCisMachineIT/Cetak_CisMachineIT_D" method="POST">
					<?php foreach($namadept as $dt) { ?>
					<input type="hidden" name="nama_cis" value="<?php echo $dt['nama_cis'] = "machine"; ?>"  class="form-control">
					<input type="submit" class="btn btn-info" value="DOWNLOAD PDF">
					<?php  } ?>
					</form>
				</div>
			
			</div>
				
				<div class="box-body table-responsive">	
                 <table id="tb-datatables">
                  <thead>
                    <tr style="background-color: #E6E6FA;">
						<th style="vertical-align:middle;text-align:center;" width="5">#</th>
						<th style="vertical-align:middle;text-align:center;" width="5">NO.</th>
						<th style="vertical-align:middle;text-align:center;" width="120">MACHINE</th>
						<th style="vertical-align:middle;text-align:center;" width="120">BAGIAN</th>
						<th style="vertical-align:middle;text-align:center;" width="80">SPESIFIKASI</th>
						<th style="vertical-align:middle;text-align:center;" width="40">JUMLAH</th>
						<th style="vertical-align:middle;text-align:center;" width="80">HARGA</th>
						<th style="vertical-align:middle;text-align:center;" width="80">TOTAL</th>
						<th style="vertical-align:middle;text-align:center;" width="80">KETERANGAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($CIS_MACHINE_IT as $dt) { $no++ ?>
                    <tr>
						<td style="text-align:center;" width="5"><?php echo $no; ?></td>
						<td style="text-align:center;" width="5"><?php echo $dt->no_it_mac; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->machine; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->bagian; ?></td>
						<td style="text-align:left;" width="80"><?php echo $dt->spek; ?></td>
						<td style="text-align:center;" width="40"><?php echo $dt->jumlah; ?></td>
						<td style="text-align:left;" width="80">Rp. <?php echo number_format ($dt->harga, 0, ".", "."); ?></td>
						<td style="text-align:left;" width="80">Rp. <?php echo number_format ($dt->total, 0, ".", "."); ?></td>
						<td style="text-align:left;" width="80"><?php echo $dt->keterangan; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->

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

<form action="<?php echo base_url(); ?>LaporanCisMachineIT/Cetak_CisMachineIT" target='blank' method="POST">
        <div class="form-group"> 
             NAMA CIS :<br>
         <select name="nama_cis" class="form-control">
       <!--<option value='0'> Pilih : </option>-->
	   <?php foreach($namadept as $dt) { ?>
            <option value=<?php echo $dt['nama_cis'] ; ?>>
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
			 </option>
            <?php  } ?>
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