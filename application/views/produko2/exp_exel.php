	<section class="content-header">
		<h4>
          <b>IMPORT EXEL DETAIL PRODUK</b>
        </h4>
    </section>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
   
<!-- Main content -->
        <section class="content">
             
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			 <div class="box box-primary">
          			  

		<div class="box-body ">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/C_Impexel/form"); ?>" enctype="multipart/form-data">
			
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
		echo "<form method='post' action='".base_url("index.php/C_Impexel/import")."'>";

		echo "
             <div class='col-md-3'>
					<label>PILIH PABRIK</label>
                        
                        <select id='koper' name='koper' class='chosen' style='width:500px;' required>
                          <option required> </option>";
                          foreach($dataq as $row) { 
           echo "<option value='".$row['koper']."' required>".$row['nm_perusahaan']."</option>";
                           } 
                   echo " </select> 
                    </div>
                    <br><br><br>

                    <div class='col-md-3'>
                    <input type='text' class='form-control' value='' id='' name='koded_prod' required readonly>
                </div>
		";

				
		
		echo "<table border='1' cellpadding='1'>
		<tr>
			<th colspan='9' style='background: #FFFF00;'>Preview Data</th>
		</tr>
		<tr>
			
			<th style='text-align:center;'>PRODUKO</th>
			<th style='text-align:center;'>HARGA</th>
			<th style='text-align:center;'>DISKON</th>
			<th style='text-align:center;'>OBATID</th>
			<th style='text-align:center;'>KOMPOSISI</th>
			<th style='text-align:center;'>S_KODE</th>
			<th style='text-align:center;'>TIPE HARGA</th>
			
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		
		foreach($sheet as $row){ 

			$nama_produk = $row['A']; // Ambil data 
			$harga = $row['B']; // Ambil data
			$discount = $row['C']; // Ambil data 
			$kode_produk = $row['D']; // Ambil data 
			$deskripsi = $row['E']; // Ambil data
			$kodis = $row['F']; // Ambil data 
			$tipe_harga = $row['G'];
			
			
			// Cek jika semua data tidak diisi
			if(empty($nama_produk) && empty($harga) && empty($discount) && empty($kode_produk) && empty($deskripsi) && empty($kodis) && empty($tipe_harga))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$nama_produk_a = ( ! empty($nama_produk))? "" : " "; 
				$harga_a = ( ! empty($harga))? "" : " "; 
				$discount_a = ( ! empty($discount))? "" : " ";
				$kode_produk_a = ( ! empty($kode_produk))? "" : " ";
				$deskripsi_a = ( ! empty($deskripsi))? "" : " "; 
				$kodis_a = ( ! empty($kodis))? "" : " "; // Jika kosong, beri warna merah
				$tipe_harga_a = ( ! empty($tipe_harga))? "" : " ";
				
			if(empty($nama_produk) && empty($harga) && empty($discount) && empty($kode_produk) && empty($deskripsi) && empty($kodis)  && empty($tipe_harga)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$nama_produk_a.">".$nama_produk."</td>";
				echo "<td".$harga_a.">".$harga."</td>";
				echo "<td".$discount_a.">".$discount."</td>";
				echo "<td".$kode_produk_a.">".$kode_produk."</td>";
				echo "<td".$deskripsi_a.">".$deskripsi."</td>";
				echo "<td".$kodis_a.">".$kodis."</td>";
				echo "<td".$tipe_harga_a.">".$tipe_harga."</td>";
				echo "</tr>";
				
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
	        	echo "<button type='submit' name='import'>Import Data</button>";
			echo " <a href='".base_url("index.php/C_Impexel/form")."'>  Cancel </a>";
		
		
		echo "</form>";
	}
	?>
	
	<br><br>
	</div>
	  <br><br>
		<a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_Impexel"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
