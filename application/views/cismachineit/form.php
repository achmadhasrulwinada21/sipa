	<section class="content-header">
		<h4>
          <b>STANDAR MACHINE CIS DEP TI RSH BARU TIPE C</b>
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
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/cis_machine_it.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			  
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/import_data_machine_cis_it.xlsx");?>" 
			  class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> BACKUP DATA FORMAT SEBELUMNYA </a>
			 </div>
			  

		<div class="box-body table-responsive">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/cis_it_machine/form"); ?>" enctype="multipart/form-data">
					
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
		echo "<form method='post' action='".base_url("index.php/cis_it_machine/import")."'>";

		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color:red;' id='kosong'>
		Harap dilengkapi data yang belum diisi,  
		Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div><br>";
			
		
		echo "<table border='1' cellpadding='1'>
		<tr>
			<th colspan='9' style='background: #FFFF00;'>Preview Data</th>
		</tr>
		<tr>
			<th style='text-align:center;' width='50'>NO.</th>
			<th style='text-align:center;' width='100'>MACHINE</th>
			<th style='text-align:center;' width='100'>BAGIAN</th>
			<th style='text-align:center;' width='100'>SPESIFIKASI</th>
			<th style='text-align:center;' width='40'>JUMLAH</th>
			<th style='text-align:center;' width='80'>HARGA</th>
			<th style='text-align:center;' width='80'>TOTAL</th>
			<th style='text-align:center;' width='80'>KETERANGAN</th>
			<th style='text-align:center;' width='30'>KODE ROLE</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$no_it_mac = $row['A']; // Ambil data 
			$machine = $row['B']; // Ambil data 
			$bagian = $row['C']; // Ambil data 
			$spek = $row['D']; // Ambil data 
			$jumlah = $row['E']; // Ambil data 
			$harga = $row['F']; // Ambil data 
			$total = $row['G']; // Ambil data 
			$keterangan = $row['H']; // Ambil data 
			$kode_role = $row['I']; // Ambil data 
			
			// Cek jika semua data tidak diisi
			if(empty($no_it_mac) && empty($machine) && empty($bagian) && empty($spek) && empty($jumlah) && empty($harga) && empty($total) && empty($keterangan) && empty($kode_role))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$no_it_td = ( ! empty($no_it_mac))? "" : " "; 
				$machine_td = ( ! empty($machine))? "" : " "; 
				$bagian_td = ( ! empty($bagian))? "" : " "; 
				$spek_td = ( ! empty($spek))? "" : " ";  
				$jumlah_td = ( ! empty($jumlah))? "" : " "; 
				$harga_td = ( ! empty($harga))? "" : " "; 
				$total_td = ( ! empty($total))? "" : " "; 
				$keterangan_td = ( ! empty($keterangan))? "" : " "; 
				$kode_td = ( ! empty($kode_role))? "" : " style='background: #E07171;' ";  // Jika kosong, beri warna merah style='background: #E07171;'
				
				// Jika salah satu data ada yang kosong
				if(empty($kode_role)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td style='text-align:center;' ".$no_it_td.">".$no_it_mac."</td>";
				echo "<td".$machine_td.">".$machine."</td>";
				echo "<td".$bagian_td.">".$bagian."</td>";
				echo "<td style='text-align:center;' ".$spek_td.">".$spek."</td>";
				echo "<td style='text-align:center;' ".$jumlah_td.">".$jumlah."</td>";
				echo "<td".$harga_td.">Rp. ".number_format ($harga, 0, ".", ".")."</td>";
				echo "<td".$total_td.">Rp. ".number_format ($total, 0, ".", ".")."</td>";
				echo "<td".$keterangan_td.">".$keterangan."</td>";
				echo "<td style='text-align:center;'".$kode_td.">".$kode_role."</td>";
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
			echo " <button type='submit' name='cancel'> <a href='".base_url("index.php/cis_it_machine/form")."'>  Cancel </a></button>";
		}
		
		echo "</form>";
	}
	?>
	
	<br><br>
	</div>
	  
		<a style="margin-bottom:3px" href="<?php echo base_url("index.php/cis_it_machine"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->