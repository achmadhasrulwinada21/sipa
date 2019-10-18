 	
	<ul class="nav nav-tabs">
	  <li class=""><a href="<?php echo base_url(); ?>cpengajuancab">Data Pengajuan</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>cpengajuancab/add_pengajuan">Form Isian Pengajuan</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>cpengajuancab/add_legal_rekanan">Form Isian Data Legal Rekanan</a></li>
	</ul>
	    



	<section class="content-header">
    <h1>
        Tambah Rekanan 
        <small></small>
    </h1>
    <ol class="breadcrumb">
     
    </ol>
</section>


	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 		  
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>rekananlistrik/savedata" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-12">
				  <div hidden class="form-group">
                      <label for="">Kode Vendor</label>
                        <input readonly type="text" class="form-control" value="<?php echo $this->mvendorlis->code_otomatis('kodeunik'); ?>" id="" name="kode_vendlis" placeholder="Isikan Kode Vendor" required>
                    </div>
					<p></p>
               				
				 	<div class="form-group">
                      <label for="">Nama Rekanan</label>
                        <input type="text" class="form-control" value="" id="nm_vendor" name="nm_vendor"  placeholder="Isikan Nama Vendor" required>                        
							<datalist id="nm_vendor">
							<option value="PT. KM MANDIRI">
							<option value="PT. TRISAHABAT JAYA PRIMA">
							<option value="PT. TRISANDIRA KURNIA SAKTI">
							<option value="TRABAS REKABUANA">
							<option value="PT. SEKAWAN KONTRINDO">
							</datalist>
				    </div>

					<div class="form-group">
                      <label for="">Alamat</label>
                        <input type="text" class="form-control" value="" id="" name="alamat" placeholder="Isikan Alamat Vendor" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">No Telp</label>
                        <input type="text" class="form-control" value="" id="" name="no_telp" placeholder="Isikan No Telp Vendor" required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Kategori</label>
                        <input type="text" class="form-control" value="" id="" name="kategori" placeholder="Isikan Kategori Vendor" required>                        
                    </div>
				 
				 	<div class="form-group">
                      <label for="">Nama Proyek</label>
                        <input type="text" class="form-control" value="" id="" name="nm_proyek" placeholder="Isikan Nama Proyek" required>                        
                    </div>
					
			        <div class="form-group">
                      <label for="">Nama RS</label>
                        <input readonly type="text" class="form-control" value=" <?php echo $this->session->userdata('namars'); ?>" id="" name="namars" placeholder="Isikan Nama Rumah Sakit" required>                        
                    </div>
					<br></br>
					<p id="" style="display:none">Checkbox is CHECKED!</p>
					<fieldset><legend style="text-align:center;" >&nbsp; Upload Kelengkapan Dokumen &nbsp;</legend>
							<div class="box-body table-responsive">
							  <table id="data_table" class="table table-bordered table-striped">

								  <thead bgcolor="#DCDCDC" >
						                <tr>
										  <th width="30" rowspan="2" style="text-align:center;">NO</th>
										  <th width="200" rowspan="2" style="text-align:center;">ITEM DOKUMEN</th>
										  <th width="60" colspan="2" style="text-align:center;">KELENGKAPAN</th>
										  <th width="100" rowspan="2" style="text-align:center;">KETERANGAN</th>
										  </tr>
										  <tr>                      
										  <th width="60" style="text-align:center;">ADA</th>
										  <th width="60" style="text-align:center;">TIDAK ADA</th>
									   </tr>
								  </thead>
								  <tbody>
									  <tr>
										  <td style="text-align:center;">1</td>
										  <td style="text-align:left;">Foto Copy Akte Pendirian PT.</td>
		<td style="text-align:center;"><input type="checkbox"  id="cek_ada_1"  name="cek_ada_1" onclick="myFunction()"></input></td>
	<td style="text-align:center;"><input type="checkbox"   id="cek_tdkada_1"  name="cek_tdkada_1" value="1"></input></td>
	<td width="100" style="text-align:center;">
	 <input type="text" style="display:none" class="form-control" value="" id="tet" name="ket_1" placeholder="Isikan Nama Proyek" required> 
	<input type="file" style="display:none" class="form-control" value=""  id="text" name="ket_1" placeholder="Isikan Nama Proyek" required>
			<button id="tet" style="display:none" style="font-size:24px">Button <i class="fa fa-upload"></i></button>
									</tr>
									  <tr>
										  <td style="text-align:center;">2</td>
										  <td style="text-align:left;">Foto Copy Pengesahan Menkumham RI</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">3</td>
										  <td style="text-align:left;">Foto Copy Akta Perubahan (Jika Ada)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">4</td>
										  <td style="text-align:left;">Foto Copy Persetujuan Perubahan Anggaran Dasar PT dari Menkumham  RI (Jika Ada)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
																		  <tr>
										  <td style="text-align:center;">5</td>
										  <td style="text-align:left;">Foto Copy Surat Keterangan Domisili</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:left;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">6</td>
										  <td style="text-align:left;">Foto Copy SIUP/Izin Usaha dari Instansi berwenang</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">7</td>
										  <td style="text-align:left;">Foto Copy SIUJK dari BPMPT (Untuk Rekanan Kontraktor)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">8</td>
										  <td style="text-align:left;">Foto Copy SIUJK dari LPJK (Untuk Rekanan Kontraktor)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">9</td>
										  <td style="text-align:left;">Foto Copy SIUJK dari Gapensi (Untuk Rekanan Kontraktor)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">10</td>
										  <td style="text-align:left;">Foto Copy Tanda Daftar Perusahaan</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">11</td>
										  <td style="text-align:left;">Foto Copy NPWP</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">12</td>
										  <td style="text-align:left;">Foto Copy PKP</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">13</td>
										  <td style="text-align:left;">Foto Copy KTP Direktur Utama</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">14</td>
										  <td style="text-align:left;">Foto Copy Rekening Bank</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">15</td>
										  <td style="text-align:left;">Spesifikasi Material dengan Surat Penunjukan (Sebagai Principle/Distributor)</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									  <tr>
										  <td style="text-align:center;">16</td>
										  <td style="text-align:left;">Surat Pernyataan di atas materai</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td style="text-align:center;">17</td>
										  <td style="text-align:left;">Metode Kerja</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
										  <td rowspan="4" style="text-align:center;">18</td>
										  <td style="text-align:left;">Company Profile</td>
										  <td style="text-align:center;"></td>
										  <td style="text-align:center;"></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
								          
										  <td style="text-align:center;">Struktur Organisasi</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
								
										  <td style="text-align:center;">Sertifikat SDM</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
									<tr>
								
										  <td style="text-align:center;">Pengalaman Kerja Perusahaan</td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"><input type="checkbox"   name="trisandira" value="1"></input></td>
										  <td style="text-align:center;"></td>										
									</tr>
						
							  </tbody>
							</table>
					</fieldset>
					
				 
				    <div class="form-group">
                      <label for="">Foto Copy Akte Pendirian PT.</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_akte_pendirian" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Pengesahan Menkumham RI</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_pengesahan_menkumham" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Akta Perubahan (Jika Ada)</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_akta_perubahan" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Persetujuan Perubahan Anggaran Dasar PT dari Menkumham  RI (Jika Ada)</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_perstj_perub_angg" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Surat Keterangan Domisili</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_surat_domisili" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy SIUP/Izin Usaha dari Instansi berwenang</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_SIUP" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy SIUJK dari BPMPT (Untuk Rekanan Kontraktor)</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_SIUJK_BPMPT" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy SIUJK dari LPJK (Untuk Rekanan Kontraktor)</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_SIUJK_LPJK" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy SIUJK dari Gapensi (Untuk Rekanan Kontraktor)</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_SIUJK_Gapensi" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Tanda Daftar Perusahaan</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_TDP" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy NPWP</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_NPWP" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy PKP</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_PKP" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy KTP Direktur Utama</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_KTP_Dirut" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Foto Copy Rekening Bank</label>
                        <input type="file" class="btn"  id=""  name="file_cpy_rek_bank" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Spesifikasi Material dengan Surat Penunjukan (Sebagai Principle/Distributor)</label>
                        <input type="file" class="btn"  id=""  name="file_spek_material" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Surat Pernyataan di atas materai</label>
                        <input type="file" class="btn"  id=""  name="file_surat_pernyataan" placeholder="">                      
                     </div> 
				 
				 
				     <div class="form-group">
                      <label for="">Metode Kerja</label>
                        <input type="file" class="btn"   id=""  name="file_metode_kerja" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Struktur Organisasi</label>
                        <input type="file" class="btn"  id=""  name="file_struktur_org" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Sertifikat SDM</label>
                        <input type="file" class="btn"  id=""  name="file_sertifikasi_SDM" placeholder="">                      
                     </div> 
				 
				     <div class="form-group">
                      <label for="">Pengalaman Kerja Perusahaan</label>
                        <input type="file" class="btn"  id=""  name="file_pengalaman_perusahaan" placeholder="">                      
                     </div> 
	
                  <!-- <div class="form-group">
                      <label for="">periode</label>
                        <input type="text" class="form-control" value="" id="datepicker4" name="periode" placeholder="mohon di isi" required>
                    </div>-->

                     <!--<div class="form-group">
                        <label for="">Uraian Kerja</label>
                           <select name="uraian_kerja" class="form-control" required>
                            <option>--Pilih Uraian Kerja--</option>
                            <?php foreach($optUraian as $row) { ?>
                                <option value="<?php echo $row['uraian_kerja'] ?>"><?php echo $row['uraian_kerja'] ?></option>
                            <?php } ?>
                          </select>    
                      </div>-->

                     

 <!--                 <div class="form-group">
                      <label for="">Tanggal</label>
                        <input type="text" class="form-control" value="" id="datepicker1" name="cdate" placeholder="Isikan Tanggal" required>                        
                    </div> -->           


                <!--  <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">Kode Uraian</label>
                        <select name="kd_uraian" class="form-control" required>
                          <option>--Pilih Kode Uraian--</option>
                          <?php foreach($optUraian as $row) { ?>
                              <option value="<?php echo $row['kd_uraian'] ?>"><?php echo $row['nama_uraian'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div> 
                    
                    <div class="form-group">
                      <label for="">Nilai Uraian</label>
                        <input type="text" class="form-control" value="" id="" name="nilai_uraian" placeholder="Isikan Nilai Uraian" required>                        
                    </div>-->
                                        
                  </div>
                                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>rekananlistrik" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>TeamHermina &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->
  </div>

  
<!-- Auto Fill Nama Vendor-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#nm_vendor').on('input',function(){
                
                var nm_vendor=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('cpengajuancab/get_vendor')?>",
                    dataType : "JSON",
                    data : {nm_vendor: nm_vendor},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nm_vendor, alamat, no_telp, kategori){
							$('[name="nm_vendor"]').val(data.nm_vendor);
                            $('[name="alamat"]').val(data.alamat);
                            $('[name="no_telp"]').val(data.no_telp);
                            $('[name="kategori"]').val(data.kategori);
                            
				        });              
                    }
                });
                return false;
           });
		   
	
		   
   });
   
  					
</script>

<!--
<script type="text/javascript">
		$(document).ready(function(){
			
			
			 $('#cek_ada_1').on('click',function(){
				$("#up_file_cpy_akte_pendirian").hide();
			})
			
			   $('#cek_tdkada_1').on('click',function(){
				$("#up_file_cpy_akte_pendirian").show();
			})
			
			
	});
</script>	
-->

<script type="text/javascript">

		function myFunction() {
			var cek_ada_1 = document.getElementById("cek_ada_1");
			//var ket_1= document.getElementById("ket_1");
			if (cek_ada_1.checked == true){
				text.style.display = "block";
			} else {
			   text.style.display = "none";
			}
		}
		
</script>
