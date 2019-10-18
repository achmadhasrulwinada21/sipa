	<section class="content-header">
		<h4>
          <b>IMPORT EXCEL REKANAN ALAT KESEHATAN</b>
        </h4>
    </section>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>		
	
<!-- Main content -->
        <section class="content">
	
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			 <div class="box box-primary">
              <div class='box-header with-border'> 
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/rekanan_alkes.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			  <p style="color: red;">*download format excel jika belum ada</p>
			  
			 
			 </div>
			  

		<div class="box-body ">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/C_rekananalkes/form"); ?>" enctype="multipart/form-data">
			<!-- -- Buat sebuah input type file-->
			<div class="col-md-3">		
			<input type="file" name="file" class="btn btn-default no-radius dropdown-toggle">
			</div>
			<!---- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import-->
			<div class="col-md-3">
			<input type="submit" name="preview" value="LIHAT" class="btn btn-warning no-radius dropdown-toggle"><br><br>
			</div>
		</form>	
		</div>
		
		<div class="col-md-12">
		
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


<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/C_rekananalkes/import")."'>";

		//Buat sebuah div untuk alert validasi kosong
		// echo "<div style='color:red;' id='kosong'>
		// Harap dilengkapi data yang belum diisi,  
		// Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		// </div><br>";
			
		
		echo "<table border='1' cellpadding='1'>
		<tr>
			<th colspan='9' style='background: #FFFF00;'>Preview Data</th>
		</tr>
		<tr>
			
			<th style='text-align:center;'>KODE PERUSAHAAN</th>
			<th style='text-align:center;'>NAMA PERUSAHAAN</th>
			<th style='text-align:center;'>PRINCIPAL</th>
			<th style='text-align:center;'>SOLO AGENT</th>
			<th style='text-align:center;'>DISTRIBUTOR</th>
			<th style='text-align:center;'>SUB DISTRIBUTOR</th>
			
			
			
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 


			// Ambil data pada excel sesuai Kolom
			// $koded_prod = $row['A'];
			// $pabrikid = $row['B'];
			$koper = $row['A']; // Ambil data 
			$nm_perusahaan = $row['B']; // Ambil data
			$principal = $row['C'];
			$solo_agent = $row['D'];
			$distributor = $row['E'];
			$subdistributor = $row['F']; // Ambil data 
			


			
			
			
			// Cek jika semua data tidak diisi
			if(empty($koper) && empty($nm_perusahaan) && empty($principal) && empty($solo_agent) && empty($distributor) && empty($subdistributor))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$koper_a = ( ! empty($koper))? "" : " "; 
				$nm_perusahaan_a = ( ! empty($nm_perusahaan))? "" : " ";
				$principal_a   = ( ! empty($principal))? "" : " "; 
				$solo_agent_a = ( ! empty($solo_agent))? "" : " ";
				$distributor_a = ( ! empty($distributor))? "" : " ";
				$subdistributor_a = ( ! empty($subdistributor))? "" : " ";
				
				
				
			if(empty($koper) && empty($nm_perusahaan) && empty($principal) && empty($solo_agent) && empty($distributor) && empty($subdistributor)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$koper_a.">".$koper."</td>";
				echo "<td".$nm_perusahaan_a.">".$nm_perusahaan."</td>";
				echo "<td".$principal_a.">".$principal."</td>";
				echo "<td".$solo_agent_a.">".$solo_agent."</td>";
				echo "<td".$distributor_a.">".$distributor."</td>";
				echo "<td".$subdistributor_a.">".$subdistributor."</td>";
				
				
				echo "</tr>";
				
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
		if($kosong > 1){
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		}else{ // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import'>Import Data</button>";
			echo " <input type='submit' name='cancel'> <a href='".base_url("index.php/C_rekananalkes/form")."'>  Cancel </a>";
		}
		
		echo "</form>";
	}
	?>
	
	<br><br>
	</div>
	  <br><br>
		<a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_rekananalkes"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->