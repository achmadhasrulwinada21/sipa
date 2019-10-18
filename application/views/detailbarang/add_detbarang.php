      <section class="content-header">
        <h1>
          <b>FORM DATA </b>
		  <br>FORMULIR PERSETUJUAN DIREKSI GROUP 
		  <br>ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">
				FORMULIR DETAIL BARANG</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>detailbarang/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
				  
				 	<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
					?> 
				    <div class="form-group">
                      <label for="">Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['nama_role'];?>
                           
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
					<?php endif;?>
					
						  <?php 
							$koderole=($this->session->userdata('koderole'));
							if($koderole!='1' && $koderole!='5' && $koderole!='10'):
							?> 
					<div class="form-group">
                      <label for="">Departemen</label>
						<input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="namadepartemen" readonly>
                    </div>
					<?php endif;?>
					
					<!--<div class="form-group">
                      <label for="">Departemen</label>
                        <select name="id_formulir" class="form-control" required>
                         <!--<option>--Pilih ID Formulir--</option>
                          <?php foreach($optrole as $row) { ?>
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>-->
					
					<div class="form-group">
                      <label for="">ID Formulir Permintaan Barang</label>
                        <select name="id_formulir" class="form-control" required>
                          <option>--Pilih ID Formulir--</option>
                          <?php foreach($optformulir as $row) { ?>
                              <option value="<?php echo $row['id_formulir'] ?>"><?php echo $row['no_formulir'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>
				   
				    <div class="form-group">
                        <label for="">Nama Barang/Item Barang</label>
                        <input type="text" class="form-control" value="" id="" name="nama_barang" placeholder="Isi Nama Barang" required>
                    </div>
					
					 <div class="form-group">
                        <label for="">Pengajuan Barang (Barang Baru/Barang Lama)
						<br>*Untuk Pengajuan Barang Lama, Maka Tahun Barang Lama harus di isi</label>
                        <input type="text" class="form-control" value="" id="" name="kondisi_barang" placeholder="Isi Pengajuan Barang (Barang Baru/Barang Lama)" required>
                    </div>
					
					<!--<div class="form-group">
						<label for="">Pengajuan Barang (Baru/Lama)</label>
	                    <select name="kondisi_barang" id="kondisi_barang" class="form-control">
	                    	<option value=" ">-Pilih (Baru/Lama)-</option>
	                    	<option value="Baru">Baru</option>
	                    	<option value="Lama">Lama</option>
	                    </select>
	                </div>-->
					
					<div class="form-group">
                        <label for="">Untuk Ruangan/Instalasi</label>
                        <input type="text" class="form-control" value="" id="" name="instalasi" placeholder="Isi Instalasi" required>
                    </div>
					
					<div class="form-group">
                        <label for="">Tanggal Permintaan</label>
                        <input type="date" class="form-control" value="" id="" name="tanggal" placeholder="Isi Tanggal" required>
                    </div>
					
					</div>

					<div class="col-lg-6">
					<div class="form-group">
                        <label for="">Qty/Jumlah (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="" id="" name="jumlah" placeholder="Isi Jumlah" onkeypress="return hanyaAngka(event)"/ required>
                    </div>
				   
				   <div class="form-group">
                        <label for="">Harga Satuan/Harga Per Unit (Di isi hanya Angka)</label><br><p><span id="format"></span></p> 
                        <input type="text" class="form-control" value="" id="" name="harga" placeholder="Isi Harga" onkeypress="return hanyaAngka(event)" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" required>
                    </div>
				   
                    <div class="form-group">
                        <label for="">Disc % (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="" id="" name="discper" placeholder="Isi Disc" onkeypress="return hanyaAngka(event)"/ required>
                    </div>
					
                    <div class="form-group">
                        <label for="">Extra Dics % (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="" id="" name="e_discper" placeholder="Isi Extra Disc %" onkeypress="return hanyaAngka(event)"/ required>
                    </div>
					
					<div class="form-group">
                        <label for="">PPN (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="" id="" name="ppn" placeholder="Isi PPN" onkeypress="return hanyaAngka(event)"/ required>
                    </div>
                                         
                  </div>

				<script>
					function hanyaAngka(evt) {
					var charCode = (evt.which) ? evt.which : event.keyCode
					if (charCode > 31 && (charCode < 48 || charCode > 57))

					return false;
					return true;
					} 
 
				</script>
				
				<script type="text/javascript">
					function formatCurrency(num) {
					num = num.toString().replace(/\$|\,/g,'');
					if(isNaN(num))
					num = "0";
					sign = (num == (num = Math.abs(num)));
					num = Math.floor(num*100+0.50000000001);
					cents = num%100;
					num = Math.floor(num/100).toString();
					if(cents<10)
					cents = "0" + cents;
					for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
					num = num.substring(0,num.length-(4*i+3))+'.'+
					num.substring(num.length-(4*i+3));
					return (((sign)?'':'-') + 'Rp. ' + num + ',' + cents);
					}
				</script>
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>detailbarang" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

  