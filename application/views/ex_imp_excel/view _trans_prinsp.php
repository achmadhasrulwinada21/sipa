
	<section class="content-header">
    <h1 style="text-align:center;" >
        IMPORT DATA PRINSIPAL (MASTER PT.)
        <small></small>
    </h1>
      
    </section>
	
<section class="content">
          <!-- Small boxes (Stat box) -->
          
   <div class="row">
      <section class="col-lg-12">
            <!-- Chat box -->
         <div class="box">       
           <div class="box-body chat" id="chat-box">
                <!-- chat item -->
             <div class="item">
	
	
               
	
				<!--<button href="<?php echo base_url(); ?>ci_to_excel/form/" style="text-align:center;"  class="btn btn-success"><i class="icon-ok-sign icon-white"></i> IMPORT </button>-->
				<a class="btn btn-success "style="text-align:center;" href="<?php echo base_url("ci_to_excel/form"); ?>">Import</a><br><br>
                 <p></p>
				 
				<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
				
				
				<table id="datatables7"  border="1" class="table table-responsive" >
				<thead style="text-align:center;" bgcolor="#99BBFF">
				<tr style="text-align:center;">
					<th style="text-align:center;">No</th>
					<th style="text-align:center;">Kode Supplier</th>
					<th style="text-align:center;">Nama Supplier</th>
					<th style="text-align:center;">Alamat</th>
					<th style="text-align:center;">Telp</th>
					<th style="text-align:center;">Fax</th>
					<th style="text-align:center;">Kontak</th>
				</tr>
				</thead>
				<?php $no=0;
				if( ! empty($supplier)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
					foreach($supplier as $data){ 
						$no++ ;  // Lakukan looping pada variabel siswa dari controller
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data->s_kode."</td>";
						echo "<td>".$data->s_nama."</td>";
						echo "<td>".$data->s_alamat."</td>";
						echo "<td>".$data->s_telp."</td>";
						echo "<td>".$data->s_fax."</td>";
						echo "<td>".$data->s_kontak."</td>";
						echo "</tr>";
					}
				}else{ // Jika data tidak ada
					echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
				}
				?>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
	</section>
