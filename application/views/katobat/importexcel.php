	<section class="content-header">
		<h4>
          <b>IMPORT EXCEL</b>
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
			   </div> 
			  

		<div class="box-body ">
		<div class="col-md-12">
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/Obattr/form"); ?>" enctype="multipart/form-data">
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
		<br>
                <p style="margin-left:10%;color:red;">FORMAT .XLSX</p>

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
	if(isset($_POST['preview'])){ 
		if(isset($upload_error)){ 
			echo "<div style='color: red;'>".$upload_error."</div>"; 
			die; 
		}
		
		
		echo "<form method='post' action='".base_url("index.php/Obattr/import")."'>";

	
		
		echo "<table border='1' cellpadding='1'>
		<tr>
			<th colspan='10' style='background: #FFFF00;'>Preview Data</th>
		</tr>
		<tr>
			
			
			<th style='text-align:center;'>ID DETAIL</th>
			<th style='text-align:center;'>KODE DETAIL</th>
			<th style='text-align:center;'>Harga</th>
			<th style='text-align:center;'>Diskon</th>
			<th style='text-align:center;'>Tipe Harga</th>
			<th style='text-align:center;'>Kode Distributor</th>
			<th style='text-align:center;'>Kode Perusahaan</th>
			<th style='text-align:center;'>Kode Obat</th>
			<th style='text-align:center;'>Kode transaksi</th>
			<th style='text-align:center;'>ID Obat</th>
		</tr>
		";
		
		$numrow = 1;
		$kosong = 0;
		
		
		foreach($sheet as $row){ 


			
			$iddetailprod2 = $row['A']; 
			$koded_prod = $row['B']; 
			$harga = $row['C']; 
			$discount = $row['D'];
			$tipe_harga = $row['E']; 
			$kodis = $row['F'];
			$koper = $row['G']; 
			$kode_obat = $row['I'];
			$kode_th = $row['K']; 
			$idobat = $row['L'];
			
			if(empty($iddetailprod2) && empty($koded_prod)&& empty($harga)&& empty($discount)&& empty($tipe_harga)&& empty($kodis)&& empty($koper)&& empty($kode_obat)&& empty($kode_th)&& empty($idobat))
				continue; 
			if($numrow > 1){
				
				$iddetailprod2_a = ( ! empty($iddetailprod2))? "" : " ";
				$koded_prod_a = ( ! empty($koded_prod))? "" : " "; 
				$harga_a = ( ! empty($harga))? "" : " ";
				$discount_a = ( ! empty($discount))? "" : " ";
				$tipe_harga_a = ( ! empty($tipe_harga))? "" : " ";
				$kodis_a = ( ! empty($kodis))? "" : " ";
				$koper_a = ( ! empty($koper))? "" : " ";
				$kode_obat_a = ( ! empty($kode_obat))? "" : " ";
				$kode_th_a = ( ! empty($kode_th))? "" : " ";
				$idobat_a = ( ! empty($idobat))? "" : " ";
				
			if(empty($iddetailprod2) && empty($koded_prod)&& empty($harga) && empty($discount) && empty($tipe_harga) && empty($kodis) && empty($koper) && empty($kode_obat) && empty($kode_th) && empty($idobat) ){
					$kosong++; 
				}
				
				echo "<tr>";
				
				echo "<td".$iddetailprod2_a.">".$iddetailprod2."</td>";
				echo "<td".$koded_prod_a.">".$koded_prod."</td>";
				echo "<td".$harga_a.">".$harga."</td>";
				echo "<td".$discount_a.">".$discount."</td>";
				echo "<td".$tipe_harga_a.">".$tipe_harga."</td>";
				echo "<td".$kodis_a.">".$kodis."</td>";
				echo "<td".$koper_a.">".$koper."</td>";
				echo "<td".$kode_obat_a.">".$kode_obat."</td>";
				echo "<td".$kode_th_a.">".$kode_th."</td>";
				echo "<td".$idobat_a.">".$idobat."</td>";
				
				echo "</tr>";
				
			}
			
			$numrow++; 
		}
		
		echo "</table>";
		
		
		
			
			
			echo "<button type='submit' name='import'></button>";
			echo " <input type='submit' name='cancel'> <a href='".base_url("index.php/Obattr/form")."'>  Cancel </a>";
		
		
		echo "</form>";
	}
	?>
	
	<br><br>
	</div>
	  <br><br>
		<a style="margin-bottom:3px" href="<?php echo base_url("index.php/Obattr"); ?>" 
			  class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-arrow-left"></i> KEMBALI </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
