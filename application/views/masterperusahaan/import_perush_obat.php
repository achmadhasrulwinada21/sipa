	<section class="content-header">
		<h4>
          <b>IMPORT EXCEL MASTER PERUSAHAAN OBAT</b>
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
			  <a style="margin-bottom:3px" href="<?php echo base_url("excel/detail_produk.xlsx");?>" 
			  class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> DOWNLOAD FORMAT UPLOAD </a>
			  <p style="color: red;">*download format excel jika belum ada</p>
			  
			 <!--  <a style="margin-bottom:3px" href="<?php echo base_url("excel/import_detail_prod.xlsx");?>" 
			  class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-floppy-save"></i> BACKUP DATA FORMAT SEBELUMNYA </a> -->
			 </div>
			  

		<div class="box-body ">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("ci_to_excel/form"); ?>" enctype="multipart/form-data">
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
// Jika user telah mengklik tombol Preview       
	if(isset($_POST['preview'])){         
	//$ip = ; // Ambil IP Address dari User         
	$nama_file_baru = 'data.xlsx';                 
	// Cek apakah terdapat file data.xlsx pada folder tmp         
		if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada           
		unlink('tmp/'.$nama_file_baru); // Hapus file tersebut                 
		$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload         
		$tmp_file = $_FILES['file']['tmp_name'];                 
		// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)         
			if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){           
			// Upload file yang dipilih ke folder tmp           
			// dan rename file tersebut menjadi data{ip_address}.xlsx           
			// {ip_address} diganti jadi ip address user yang ada di variabel $ip           
			// Contoh nama file setelah di rename : data127.0.0.1.xlsx          
			 move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);                     
			 // Load librari PHPExcel nya           
			 require_once 'PHPExcel/PHPExcel.php';                     
				 $excelreader = new PHPExcel_Reader_Excel2007();           
				 $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp           
				 $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);                     
				 // Buat sebuah tag form untuk proses import data ke database          
	 echo "<form method='post' action='ci_to_excel/import.php'>";                     
				// Buat sebuah div untuk alert validasi kosong           
						 echo "<div class='alert alert-danger' id='kosong'>           
						 Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.           
						 </div>";                     
	echo "<table class='table table-bordered'>           
 <tr>             
 <th colspan='5' class='text-center'>Preview Data</th>           
 </tr>           
 <tr>             
 <th>KODE</th>            
 <th>NAMA PERUSAHAAN</th>             
 <th>ID TIPE</th>             
 <th>TIPE</th>                      
 </tr>";                     
 $numrow = 1;           
 $kosong = 0;           
		 foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel             
		 // Ambil data pada excel sesuai Kolom             
		 $koper = $row['B']; // Ambil data NIS
			$nm_perusahaan = $row['C']; // Ambil data nama
			$id_tipe_produk = $row['D']; // Ambil data jenis kelamin
			$tipe_produk = $row['E'];                         
 // Cek jika semua data tidak diisi            
			 if(empty($koper) && empty($nm_perusahaan) && empty($id_tipe_produk)&& empty($tipe_produk))             
				 continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)                         
			 // Cek $numrow apakah lebih dari 1             // Artinya karena baris pertama adalah nama-nama kolom             
			 // Jadi dilewat saja, tidak usah diimport             
			 if($numrow > 1){               // Validasi apakah semua data telah diisi               
				 $kpr= ( ! empty($koper))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nmpr = ( ! empty($nm_perusahaan))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$idtp_prod  = ( ! empty($id_tipe_produk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$tp_prod= ( ! empty($tipe_produk))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				// $s_fx = ( ! empty($s_fax))? "" : " style='background: #E07171;'";
				// $s_kontk = ( ! empty($s_kontak))? "" : " style='background: #E07171;'";
				 if(empty($koper) && empty($nm_perusahaan) && empty($id_tipe_produk)&& empty($tipe_produk)) {                 
				 $kosong++; // Tambah 1 variabel $kosong               
				 }                             
					echo "<tr>";
						echo "<td".$kpr.">".$koper."</td>";
						echo "<td".$nmpr.">".$nm_perusahaan."</td>";
						echo "<td".$idtp_prod.">".$id_tipe_produk."</td>";
						echo "<td".$tp_prod.">".$tipe_produk."</td>";
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
				 echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";           
				 }                     
				 echo "</form>";         }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)           
				 // Munculkan pesan validasi           
				 echo "<div class='alert alert-danger'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan           
				 </div>";         
 }       
 }      
 ?>     
 </div>

		<a style="margin-bottom:3px" href="<?php echo base_url("masterperusahaan"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->