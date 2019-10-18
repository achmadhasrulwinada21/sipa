      <section class="content-header">
        <h1>
          <b>EDIT DATA</b>
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
                  <form role="form" action="<?php echo base_url(); ?>detailbarang/updatedetbarang" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
					<div class="form-group">
                     <!-- <label for="">ID</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $id_transbarang; ?>" id="" name="id_transbarang" readonly>
                    </div>
					
					<?php 
						$koderole=($this->session->userdata('koderole'));
						if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
					?>
					
					<div class="form-group">
                      <label for="">Departemen</label>
                       <select name="namadepartemen" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                            <?php foreach($role as $datarole) {
                          if(!in_array($datarole['nama_role'],$role_post)){ ?>
                              <option  value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datarole['nama_role'] ?>"><?php echo $datarole['nama_role'] ?></option>
                          <?php }} ?>
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
					
					<div class="form-group">
                      <label type="hidden" for="">No. Formulir</label>
                        <select name="id_formulir" class="form-control">
                          <option>--Pilih No. Formulir--</option>
                            <?php foreach($formulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
					
                    <div class="form-group">
                      <label for="">Nama Barang/Item Barang</label>
                        <input type="text" class="form-control" value="<?php echo $nama_barang; ?>" id="" name="nama_barang" required>                        
                    </div>
					
					<div class="form-group">
					<label for="">Pengajuan Barang (Barang Baru/Barang Lama)
						<br>*Untuk Pengajuan Barang Lama, Maka Tahun Barang Lama harus di isi</label>
						<input type="text" class="form-control" value="<?php echo $kondisi_barang; ?>" id="" name="kondisi_barang" required>
					</div>						
					
					<!--<div class="form-group">
						<label for="">Pengajuan Barang (Baru/Lama)</label>
	                    <select name="kondisi_barang" id="kondisi_barang" class="form-control">
							<option <?php if( $kondisi_barang=='Lama'){echo "selected"; } ?> value='Lama'>Lama</option>
							<option <?php if( $kondisi_barang=='Baru'){echo "selected"; } ?> value='Baru'>Baru</option>
	                    </select><option>
	                </div>-->
					
					<div class="form-group">
                      <label for="">Untuk Ruangan/Instalasi</label>
                        <input type="text" class="form-control" value="<?php echo $instalasi; ?>" id="" name="instalasi" required>                        
                    </div>
					
					<div class="form-group">
                        <label for="">Tanggal Permintaan</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" required>                        
                    </div>
					
					</div>

					<div class="col-lg-6">
					<div class="form-group"></div>
					<div class="form-group">
                      <label for="">Qty/Jumlah (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="<?php echo $jumlah; ?>" id="" name="jumlah" onkeypress="return hanyaAngka(event)"/ required>                        
                    </div>
					<div class="form-group">
                       <label for="">Harga Satuan/Harga Per Unit (Di isi hanya Angka)</label><br><p><span id="format"></span></p>  
                        <input type="text" class="form-control" value="<?php echo $harga; ?>" id="" name="harga" onkeypress="return hanyaAngka(event)" onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" required>                     
                    </div>
					
					<div class="form-group">
                       <label for="">Disc % (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="<?php echo $discper; ?>" id="" name="discper" onkeypress="return hanyaAngka(event)"/ required>                        
                    </div>
					
					<div class="form-group">
                      <label for="">Extra Dics % (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="<?php echo $e_discper; ?>" id="" name="e_discper" onkeypress="return hanyaAngka(event)"/ required>                        
                    </div>
					
					<div class="form-group">
                       <label for="">PPN (Di isi hanya Angka)</label>
                        <input type="text" class="form-control" value="<?php echo $ppn; ?>" id="" name="ppn" onkeypress="return hanyaAngka(event)"/ required>                        
                    </div>
					<!--
					<div class="form-group">
						<label for="">Approve Direktur Operasional Dan Umum</label>
	                    <select name="mengetahuidirekturcheck" id="mengetahuidirekturcheck" class="form-control">
							<option <?php if( $mengetahuidirekturcheck=='YA'){echo "selected"; } ?> value='YA'>YA</option>
							<option <?php if( $mengetahuidirekturcheck=='TIDAK'){echo "selected"; } ?> value='TIDAK'>TIDAK</option>
	                    </select><option>
	                </div>-->
					
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

                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>detailbarang" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->