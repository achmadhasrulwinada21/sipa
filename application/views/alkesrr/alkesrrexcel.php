 <section class="content">
	<div class="row">
	 <div class="item">
		<br />
		<h3 align="center">IMPORT DATA RR LISTING ALKES</h3>
		<a style="margin-bottom:3px; margin-left: 5px" href="<?php echo base_url("download/detail_alkesrr.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			 

			  <span style="color: red;">*download format excel jika belum ada</span>
			  <br>
			  <br>
<form method="post" id="import_alkesrr21" enctype="multipart/form-data">
			<p align="center"><label>Select Excel File</label>
				
			<input type="file" name="file" id="file" class="btn btn-default no-radius dropdown-toggle" required accept=".xls, .xlsx, .ods" /></p>
			<p align="center" style="color: red;">Format .xls .xlsx .ods
			<br />
			<div align="center">
			<div class="form-group">
				<label>Kode Transaksi :</label><br>
			 <input type="text" name="kode_transaksi" id="uul1" value="<?php echo $prod->kode_transaksi ?>" class="form-class" readonly style="background-color:lightgray;font-weight:bold;text-align:center;"/></div>
			 <div class="form-group">
				<label>Perusahaan :</label><br>
			  <input type="text" name="" id="" value="<?php echo $prod->nm_perusahaan ?>" class="form-class" readonly style="background-color:lightgray;font-weight:bold;text-align:center;"/>
			  <input type="hidden" name="koper" id="uul2" value="<?php echo $prod->koper ?>" class="form-class"/></div>
			   <div class="form-group">
				<label>Fee (%) :</label><br>
			   <input type="text" name="fee" id="uul3" value="<?php echo $prod->fee ?>" class="form-class" readonly style="background-color:lightgray;font-weight:bold;text-align:center;"/><br></div>
<!-- 			    <div class="form-group">
				<label>Jenis Pembayaran :</label><br>
			   <input type="text" name="jenis_pembayaran" id="uul4" value="<?php echo $prod->jenis_pembayaran ?>" class="form-class" readonly style="background-color:lightgray;font-weight:bold;text-align:center;"/></div> -->
			    <input type="hidden" name="tahunke1" id="uul5" value="1" class="form-class"/><br>
			     <input type="hidden" name="tahunke2" id="uul6" value="2" class="form-class"/><br>
			      <input type="hidden" name="tahunke3" id="uul7" value="3" class="form-class"/><br>
			       <input type="hidden" name="tahunke4" id="uul8" value="4" class="form-class"/><br>
			        <input type="hidden" name="tahunke5" id="uul9" value="5" class="form-class"/><br>
			    </div>
			<div align="center">
			<input type="submit" name="import" value="Import" class="btn btn-warning no-radius dropdown-toggle" />
			 <a href="<?php echo base_url(); ?>Alkesrr/adddetail/<?php echo $prod->kode_transaksi ?>/<?php echo $prod->jenis_listing ?>/<?php echo $prod->koper ?>"></i> Kembali </a></p> </div>
		</form>
		<br />
		<div class="col-lg-12" align="center">
		<div class="table-responsive" id="rralkes_dara">
			 <div class="box-body"></div>
		</div>
		</div>
	</div></div></div></section>



