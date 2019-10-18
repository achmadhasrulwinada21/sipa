	<section class="content-header">
		<h4>
          <b>IMPORT DATA CIS DEPT. IT</b>
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
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/cis_induk_it.xlsx");?>" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-download-alt"></i> Download Format </a>
			  </div>
			  

				<div class="box-body table-responsive">
				
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?php echo base_url("index.php/cis_it/form"); ?>" enctype="multipart/form-data">
		<!-- 
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file">
		
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
	<br>
	<br>
		<input type="submit" name="preview" value="Preview"><br><br>
	</form>	
	
<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/cis_it/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
			<th>KOMPONEN</th>
			<th>SUB KOMPONEN</th>
			<th>JUMLAH</th>
			<th>PENCAPAIAN</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$komponen = $row['A']; // Ambil data NIS
			$sub_komponen = $row['B']; // Ambil data nama
			$jumlah = $row['C']; // Ambil data jenis kelamin
			$pencapaian = $row['D']; // Ambil data alamat
			
			// Cek jika semua data tidak diisi
			if(empty($komponen) && empty($sub_komponen) && empty($jumlah) && empty($pencapaian))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$komponen_td = ( ! empty($komponen))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$sub_komponen_td = ( ! empty($sub_komponen))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$jumlah_td = ( ! empty($jumlah))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$pencapaian_td = ( ! empty($pencapaian))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				
				// Jika salah satu data ada yang kosong
				if(empty($komponen) or empty($sub_komponen) or empty($jumlah) or empty($pencapaian)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$komponen_td.">".$komponen."</td>";
				echo "<td".$sub_komponen_td.">".$sub_komponen."</td>";
				echo "<td".$jumlah_td.">".$jumlah."</td>";
				echo "<td".$pencapaian_td.">".$pencapaian."</td>";
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
			echo "<button type='submit' name='import'>Import</button>";
			echo "  <button><a href='".base_url("index.php/cis_it")."'> Cancel </a></button>";
		}
		
		echo "</form>";
	}
	?>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->