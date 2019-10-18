
   <section class="content-header">
    <h1>
        Data Paket Kerja Rekanan Listrik
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu STPD</li>
    </ol>
</section>


      <section class="content-header">
        <h1>
          <b>TAMBAH DATA </b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

		
	    <!-- Perkalian Otomatis -->	
		
					<script>
						function startCalc(){
						interval = setInterval("calc()",1);}
						function calc(){
						one = document.form1.volume.value;
						two = document.form1.harga.value;
						three = document.form1.harga1.value;
						four = document.form1.harga2.value;
						five = document.form1.harga3.value;
						six = document.form1.Semua_total_harga.value;
						seven = document.form1.Pot_PPN.value;
						eight = document.form1.Grand_total.value;
						nine = document.form1.Semua_total_harga1.value;
						ten = document.form1.Pot_PPN1.value;
						eleven = document.form1.Grand_total1.value;
						tweleve = document.form1.Semua_total_harga2.value;
						thirteen = document.form1.Pot_PPN2.value;
						fourteen = document.form1.Grand_total2.value;
						fiveteen = document.form1.Semua_total_harga3.value;
						sixteen = document.form1.Pot_PPN3.value;
						seventeen = document.form1.Grand_total3.value;
						
											
						document.form1.total_harga.value = (one * two);
						document.form1.total_harga1.value = (one * three);
						document.form1.total_harga2.value = (one * four);
						document.form1.total_harga3.value = (one * five);
						document.form1.Semua_total_harga.value = (one * two);
						document.form1.Pot_PPN.value = (six * 0.1);
						document.form1.Grand_total.value = ((one * two) + (six * 0.1));
						document.form1.Semua_total_harga1.value = (one * three);
						document.form1.Pot_PPN1.value = (nine * 0.1);
						document.form1.Grand_total1.value = ((one * three) + (nine * 0.1));
						document.form1.Semua_total_harga2.value = (one * four);
						document.form1.Pot_PPN2.value = (tweleve * 0.1);
						document.form1.Grand_total2.value = ((one * four) + (tweleve * 0.1));
						document.form1.Semua_total_harga3.value = (one * five);
						document.form1.Pot_PPN3.value = (fiveteen * 0.1);
						document.form1.Grand_total3.value = ((one * five) + (fiveteen * 0.1));
						
						
						}
						function stopCalc(){
						clearInterval(interval);}
					</script>
				
		
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
                <h3 class="box-title">INPUTAN INDEX HHG</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" form name="form1" action="<?php echo base_url(); ?>PktKerjaListrik/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
			      <div class="form-group">
                      <label for="">Nama Rumah Sakit</label>
                        <select name="koders" class="form-control" required>
                          <option>--Pilih Nama RS--</option>
                          <?php foreach($optRS as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

					
					<div class="form-group">
                      <label for="">NAMA MATERIAL</label>
                        <select name="nm_material" class="form-control" required>
                          <option>--Pilih Paket Pekerjaan--</option>
                          <?php foreach($optpaket_lsitrik as $row) { ?>
                              <option value="<?php echo $row['nm_material'] ?>"><?php echo $row['nm_material'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
					
					<div class="form-group">
                      <label for="">SATUAN</label>
                        <select name="satuan" class="form-control" required>
                          <option>--Pilih Satuan--</option>
                          <?php foreach($optpaket_lsitrikS  as $row) { ?>
                              <option value="<?php echo $row['satuan'] ?>"><?php echo $row['satuan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

                    <div class="form-group">
                        <label for="">VOLUME</label>
                        <input type="text" class="form-control" value="" id="" name="volume" placeholder="Isi Volume" onFocus="startCalc();" onBlur="stopCalc();">
                    </div>
                    <div class="form-group">
                        <label for="">HARGA</label>
                        <input type="text" class="form-control" value="" id="" name="harga" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
                    </div>
                    <div class="form-group">
                        <label for="">TOTAL HARGA</label>
                        <input readonly type="text" class="form-control" value="" name="total_harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" readonly>
                    </div>
					<div class="box-header">
					<i class="fa fa-plus"></i>
					<h3 class="box-title">INPUTAN HARGA TRISAHABAT JAYA PRIMA</h3>
					</div>
					<div class="form-group">
                        <label for="">HARGA</label>
                        <input type="text" class="form-control" value="" id="" name="harga1" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
                    </div>
                    <div class="form-group">
                        <label for="">TOTAL HARGA</label>
                        <input readonly type="text" class="form-control" value='0' name="total_harga1" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
                    </div>
					<div class="box-header">
					<i class="fa fa-plus"></i>
					<h3 class="box-title">INPUTAN HARGA KM MANDIRI</h3>
					</div>
					<div class="form-group">
                        <label for="">HARGA</label>
                        <input type="text" class="form-control" value="" id="" name="harga2" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
                    </div>
                    <div class="form-group">
                        <label for="">TOTAL HARGA</label>
                        <input readonly type="text" class="form-control" value='0' name="total_harga2" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
                    </div>
										<div class="box-header">
					<i class="fa fa-plus"></i>
					<h3 class="box-title">INPUTAN HARGA TRISANDIRA</h3>
					</div>
					<div class="form-group">
                        <label for="">HARGA</label>
                        <input type="text" class="form-control" value="" id="" name="harga3" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
                    </div>
                    <div class="form-group">
                        <label for="">TOTAL HARGA</label>
                        <input readonly type="text" class="form-control" value='0' name="total_harga3" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
                    </div>
					
					
					<input type="hidden" class="form-control" value="" id="" name="Semua_total_harga" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Pot_PPN" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Grand_total" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Semua_total_harga1" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Pot_PPN1" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Grand_total1" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Semua_total_harga2" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Pot_PPN2" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Grand_total2" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Semua_total_harga3" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Pot_PPN3" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					<input type="hidden" class="form-control" value="" id="" name="Grand_total3" placeholder="Isi Harga" onFocus="startCalc();" onBlur="stopCalc();">
					
					
									
					
                  </div>
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>PktKerjaListrik" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

  