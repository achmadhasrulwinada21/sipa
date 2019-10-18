

	<table>
				<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
				<form method="post" action="<?php echo base_url("xl_import/import_data"); ?>" enctype="multipart/form-data">

				<!-- 
					-- Buat sebuah input type file
					-- class pull-left berfungsi agar file input berada di sebelah kiri
					-->
					<input  type="file" name="file" >
		        <h4>Sebelum mengupload, pastikan file anda berformat <strong>.xlsx</strong></h4>
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		--><br>
				<br>
				<?php
					echo form_submit(null, 'Upload');
				?>
				</br><h4>Total data : <?php echo $num_rows;?></h4>
			</br>	
