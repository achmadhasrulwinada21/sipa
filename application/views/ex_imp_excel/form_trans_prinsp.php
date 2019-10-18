

	<section class="content-header">
    <h1 style="text-align:center;" >
        FORM IMPORT DATA PRINSIPAL (TRANSAKSI PRINSIPAL)
        <small></small>
    </h1>
     	<td style="text-align:center"><a class="btn btn-default" href="<?php echo base_url("produko"); ?>">Kembali</a></td>
    </section>
	
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>

<section class="content">
          <!-- Small boxes (Stat box) -->
          
   <div class="row">
      <section class="col-lg-12">
            <!-- Chat box -->
         <div class="box">       
           <div class="box-body chat" id="chat-box">
                <!-- chat item -->
             <div class="item">
	
				
				
				<table border="1" cellpadding="8" class="table table-bordered table-striped" >
				<thead bgcolor="#99BBFF">
				<tr>
					<th style="text-align:center">Download template</th>
					<tbody>
					<tr>
					<td style="text-align:center"><a class="btn btn-warning" href="<?php echo base_url("excel/import_data_transprinsipal.xlsx"); ?>">Download</a></td>
				    </tr>
					</tbody>
				</tr>
				</thead>
				<thead bgcolor="#99BBFF">
				<tr>
					<th style="text-align:center">Preview File</th>
					</tr>
				</thead>

			</table>	
				<table>
				<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
				<form method="post" action="<?php echo base_url("ci_to_excel/form_prinsp"); ?>" enctype="multipart/form-data">

				<!-- 
					-- Buat sebuah input type file
					-- class pull-left berfungsi agar file input berada di sebelah kiri
					-->
					<input  type="file" name="file">
		        <h4>Sebelum mengupload, pastikan file anda berformat <strong>.xlsx</strong></h4>
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		--><br>
				<br>
					<input class="btn btn-success" type="submit" name="preview" value="Preview">
					
				</form>
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
		echo "<br><b><i>Data Berhasil di Munculkan...! Silahkan Klik Tombol</i> IMPORT <i>Dibawah Tabel Ini</i><b></br>";
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("ci_to_excel/import_prinsp")."'>";
		
		// Buat sebuah div untuk alert validasi kosong

		
		echo "<table border='1' cellpadding='1'>
		<tr>
			<th colspan='9' style='background: #FFFF00;'>Preview Data</th>
		</tr>
		<tr>
			
			<th style='text-align: center ;' width='auto' >Pabrik Id</th>
			<th width='auto' >Tipe Produk</th>
			<th width='auto' >Kode Supplier</th>
			<th width='auto' >Nama PT.</th>
		
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$pabrik_id = $row['A']; // Ambil data NIS
			$tipe_produk = $row['B']; // Ambil data nama
			$s_kode = $row['C']; // Ambil data jenis kelamin
			$nama_pt = $row['D'];
			// $s_fax = $row['E'];
			// $s_kontak = $row['F'];			// Ambil data alamat
			
			// Cek jika semua data tidak diisi
			if(empty($pabrik_id) && empty($tipe_produk) && empty($s_kode) && empty($nama_pt))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$pbrk_id = ( ! empty($pabrik_id))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$t_prod = ( ! empty($tipe_produk))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$s_kd = ( ! empty($s_kode))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$nm_pt = ( ! empty($nama_pt))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				// $s_fx = ( ! empty($s_fax))? "" : " style='background: #E07171;'";
				// $s_kontk = ( ! empty($s_kontak))? "" : " style='background: #E07171;'";
				
								
				// Jika salah satu data ada yang kosong
				if(empty($pabrik_id) && empty($tipe_produk) && empty($s_kode) && empty($nama_pt)){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$pbrk_id.">".$pabrik_id."</td>";
				echo "<td".$t_prod.">".$tipe_produk."</td>";
				echo "<td".$s_kd.">".$s_kode."</td>";
				echo "<td".$nm_pt.">".$nama_pt."</td>";
				// echo "<td".$s_fx.">".$s_fax."</td>";
				// echo "<td".$s_kontk.">".$s_kontak."</td>";
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
			echo "<a href='".base_url("ci_to_excel/form_prinsp")."'>Cancel</a>";
		}
		
		echo "</form>";
	}
	?>

				</div>
			</div>
		</div>
	</section>
</div>
	</section>
