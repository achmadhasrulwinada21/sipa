	<section class="content-header">
		<h4>
          <b>IMPORT EXCEL DETAIL PRODUK ALUM</b>
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
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/detail_produkalum.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			  <p style="color: red;">*download format excel jika belum ada</p>
			  
			 <!--  <a style="margin-bottom:3px" href="<?php //echo base_url("excel/import_detail_prod.xlsx");?>" 
			  class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> BACKUP DATA FORMAT SEBELUMNYA </a> -->
			 </div>
			  

		<div class="box-body ">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/C_mstproduk/formalum"); ?>" enctype="multipart/form-data">
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
		echo "<form method='post' action='".base_url("index.php/C_mstproduk/importalum")."'>";

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
			
			<th style='text-align:center;'>KODE PRODUK</th>
			<th style='text-align:center;'>NAMA PRODUK</th>
			<th style='text-align:center;'>KOMPOSISI</th>
			<th style='text-align:center;'>TIPE PRODUK</th>
			<th style='text-align:center;'>KODE PERUSAHAAN</th>
			<th style='text-align:center;'>HARGA</th>
			<th style='text-align:center;'>SATUAN</th>
			<th style='text-align:center;'>MERK</th>

			
			
			
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 


			// Ambil data pada excel sesuai Kolom
			// $koded_prod = $row['A'];
			// $pabrikid = $row['B'];
			$kode_produk = $row['A']; // Ambil data 
			$nama_produk = $row['B']; // Ambil data
			$deskripsi = $row['C'];
			$tipe_produk = $row['D']; // Ambil data 
			$koper = $row['E']; // Ambil data 
			$harga = $row['F'];
			$satuanid = $row['G'];
			$merk = $row['H']; // Ambil data

			

			
			
			
			// Cek jika semua data tidak diisi
			if(empty($kode_produk) && empty($nama_produk) && empty($deskripsi) && empty($tipe_produk) && empty($koper) && empty($harga) && empty($satuanid) && empty($merk))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$kode_produk_a = ( ! empty($kode_produk))? "" : " "; 
				$nama_produk_a = ( ! empty($nama_produk))? "" : " ";
				$deskripsi_a   = ( ! empty($deskripsi))? "" : " "; 
				$tipe_produk_a = ( ! empty($tipe_produk))? "" : " ";
				$koper_a = ( ! empty($koper))? "" : " ";
				$harga_a = ( ! empty($harga))? "" : " ";
				$satuanid_a = ( ! empty($harga))? "" : " ";
				$merk_a = ( ! empty($merk))? "" : " ";

				
				
				
			if(empty($kode_produk) && empty($nama_produk) && empty($deskripsi) && empty($tipe_produk) && empty($koper) && empty($harga) && empty($satuanid) && empty($merk)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$kode_produk_a.">".$kode_produk."</td>";
				echo "<td".$nama_produk_a.">".$nama_produk."</td>";
				echo "<td".$deskripsi_a.">".$deskripsi."</td>";
				echo "<td".$tipe_produk_a.">".$tipe_produk."</td>";
				echo "<td".$koper_a.">".$koper."</td>";
				echo "<td".$harga_a.">".$harga."</td>";
				echo "<td".$satuanid_a.">".$satuanid."</td>";
				echo "<td".$merk_a.">".$merk."</td>";

				
				
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
			echo " <input type='submit' name='cancel'> <a href='".base_url("index.php/C_mstproduk/formalum")."'>  Cancel </a>";
		}
		
		echo "</form>";
	}
	?>
	
	<br><br>
	</div>
	  <br><br>
		<a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_mstproduk/alum"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->