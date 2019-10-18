
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>EDIT DATA MEMO KEHADIRAN</b>
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
                <h3 class="box-title">FORM EDIT DATA MEMO KEHADIRAN</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>memodafdir/updatememodafdir" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      
                        <input type="hidden" class="form-control" value="<?php echo $id_memo_dafdir; ?>" id="" name="id_memo_dafdir" placeholder="Memo" required>
                    </div>

                    <div class="form-group">
                      <label for="">KEPADA</label>
                        <input type="text" class="form-control" value="<?php echo $kepada; ?>" id="" name="kepada" placeholder="Isikan Kepada" required>
                    </div>

                    <div class="form-group">
                      <label for="">DARI</label>
                        <input type="text" class="form-control" value="<?php echo $dari; ?>" id="" name="dari" placeholder="Isikan Dari" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">TANGGAL MEMO</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_memo_dafdir; ?>" id="" name="tgl_memo_dafdir" placeholder="Isikan Tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">PERIHAL</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" placeholder="Isikan Perihal" required>
                    </div>

                    <div class="form-group">
                      <label for="">ACARA</label>
                        <input type="text" class="form-control" value="<?php echo $nm_acara; ?>"  name="nm_acara" placeholder="Isikan Acara" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="">TANGGAL ACARA</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_acara; ?>" id="" name="tgl_acara" placeholder="Isikan Tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">WAKTU</label>
                        <input type="text" class="form-control" value="<?php echo $waktu_acara; ?>" id="" name="waktu_acara" placeholder="Isikan Waktu" required>
                    </div>

                    <div class="form-group">
                      <label for="">TEMPAT ACARA</label>
                        <input type="text" class="form-control" value="<?php echo $tempat_acara; ?>" id="" name="tempat_acara" placeholder="Isikan Tempat" required>
                    </div>

                    <div class="form-group">
                      <label for="">PERMOHONAN</label>
                        <input type="text" class="form-control" value="<?php echo $permohonan; ?>" id="" name="permohonan" placeholder="Isikan Ulasan Permohonan Insentif" required>
                    </div>

                    <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $ttd_pembuat; ?>" id="" name="ttd_pembuat"  required>
                    </div>

                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $pembuat; ?>" id="" name="pembuat"  required>
                    </div>

                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui"  required>
                    </div>


                     <div class="form-group">
                      <label for="">JUMLAH PENGELUARAN</label>
                        <input type="text" class="form-control" value="<?php echo $jml_pengeluaran; ?>" id="jml_pengeluaran" onkeyup="terbilang();" name="jml_pengeluaran" placeholder="Jumlah Pengeluaran" required>
                      </div>

                      <!-- <input type="text" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui" placeholder="Isikan Nama" required>
                    </div> -->
                     <?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole!='10' AND $koderole!='14' AND $koderole!='15'):
          ?> 
 <div class="form-group">
                      <label for="">PEMBUAT SURAT</label>
<!--                         <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required> -->
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="pembuat" readonly>
                    </div>

                    <div class="form-group">
                      <label type="hidden" for="">TTD Pembuat Surat</label>
                        <select name="ttd_pembuat" class="form-control">
                          <option>--TTD Pembuat Surat--</option>
                            <?php foreach($idpemohon as $data) {
                          if(!in_array($data['foto'],$for_pemohon)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui"  required>
                    </div>


                    <?php endif;?>


          <?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole=='10' OR $koderole=='14' OR $koderole=='15'):
          ?> 
          <div class="form-group">
                      <label for="">MENGETAHUI</label>
<!--                         <input type="text" class="form-control" value="<?php echo $mengetahui; ?>" id="" name="mengetahui" placeholder="Isikan Nama" required> -->
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="" name="mengetahui" readonly>
                    </div>

           
                    <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_mengetahui" class="form-control">
                          <!-- <option>--TTD Mengetahui--</option> -->
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$ttdmenger)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>

                    <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $ttd_pembuat; ?>" id="" name="ttd_pembuat"  required>
                    </div>

                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $pembuat; ?>" id="" name="pembuat"  required>
                    </div>

                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $menyetujui; ?>" id="" name="menyetujui"  required>
                    </div>

					   <?php endif;?>
					
                  </div>
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>memodafdir" class="btn btn-warning btn-block btn-flat">Kembali</a>
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
      <strong>Copyright &copy; 2018 <a href="#"></a></strong>
    </footer>
  </div><!-- ./wrapper -->
  <!-- page script -->  
  
  <script charset="utf-8" type="text/javascript">

function terbilang(){
    var bilangan=document.getElementById("jml_pengeluaran").value;
    var kalimat="";
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan = bilangan.length;
     
    /* pengujian panjang bilangan */
    if(panjang_bilangan > 15){
        kalimat = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for(i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
         
        var i = 1;
        var j = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(i <= panjang_bilangan){
            subkalimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
             
            /* untuk Ratusan */
            if(angka[i+2] != "0"){
                if(angka[i+2] == "1"){
                    kata1 = "Seratus";
                }else{
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka[i+1] != "0"){
                if(angka[i+1] == "1"){
                    if(angka[i] == "0"){
                        kata2 = "Sepuluh";
                    }else if(angka[i] == "1"){
                        kata2 = "Sebelas";
                    }else{
                        kata2 = kata[angka[i]] + " Belas";
                    }
                }else{
                    kata2 = kata[angka[i+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka[i] != "0"){
                if (angka[i+1] != "1"){
                    kata3 = kata[angka[i]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat = subkalimat + kalimat;
            i = i + 3;
            j = j + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")){
            kalimat = kalimat.replace("Satu Ribu","Seribu");
        }
    }
    document.getElementById("terbilang").innerHTML=kalimat;
}
</script>
  <script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

</script>
