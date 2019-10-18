
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA MEMORANDUM </b>
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
                <h3 class="box-title">FORM TAMBAH MEMORANDUM</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>memodafdir/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">                         
                    <div class="form-group">
                      <label for="">Kepada Yth</label>
                        <input type="text" class="form-control" value="" id="" name="kepada" placeholder="Isikan Kepada" required>
                    </div>

                    <?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
          ?> 
            <div class="form-group">
                      <label for="">Dari</label>
                       <select name="dari" class="form-control" required>
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
                      <label for="">Dari</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="dari" readonly>
                    </div>
          <?php endif;?>

<!--                    <div class="form-group">
                      <label for="">Dari</label>
                        <input type="text" class="form-control" value="" id="" name="dari" placeholder="Isikan Dari" required>
                    </div> -->

                    <div class="form-group">
                      <label for="">Tanggal Memo</label>
                        <input type="date" class="form-control" value="" id="" name="tgl_memo_dafdir" placeholder="Isikan Tanggal" required>                     
                    </div>

                    <div class="form-group">
                      <label for="">Perihal Surat</label>
                        <input type="text" class="form-control" value="" id="" name="perihal" placeholder="Isikan Perihal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Acara</label>
                        <input type="text" class="form-control" value="" id="" name="nm_acara" placeholder="Isikan Acara" required>
                    </div>
                                           
                    <div class="form-group">
                      <label for="">Tanggal Acara</label>
                         <input type="date" class="form-control" value="" id="" name="tgl_acara" placeholder="Isikan Tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">Waktu Acara</label>
                         <input type="text" class="form-control" value="" id="" name="waktu_acara" placeholder="Isikan Waktu Acara" required>
                    </div>

                    <div class="form-group">
                      <label for="">Tempat Acara</label>
                         <input type="text" class="form-control" value="" id="" name="tempat_acara" placeholder="Isikan Tempat" required>
                    </div>

                    <div class="form-group">
                      <label for="">Permohonan</label>
                         <input type="text" class="form-control" value="" id="" name="permohonan" placeholder="Isikan Ulasan Permohonan Insentif" required>
                    </div>

                   <div class="form-group">
                      <label for="">Jumlah Pengeluaran</label>
                        <input type="text" class="form-control" value="" id="jml_pengeluaran" onkeyup="terbilang();" name="jml_pengeluaran" placeholder="Isikan Angka Saja" required>

                      </div>
                       
                       <!--  <div class="form-group">
                      <label for="">Terbilang</label>   
                        <div class="form-control" id="terbilang" name="terbilang" value="0">
                        </div> -->                           
                   

                  
                    <div class="form-group">
                      <label for="">TTD PEMBUAT SURAT</label>
                        <select name="ttd_pembuat" class="form-control" required>
                          <option>--TTD PEMBUAT SURAT--</option>
                          <?php foreach($ttd as $row) { ?>
                              <option value="<?php echo $row['foto'] ?>"><?php echo $row['nama_user'] ?></option>
                          <?php } ?>
                        </select>    
                  </div>

                    <!-- <div class="form-group">
                      <label for="">Mengetahui</label>
                        <input type="text" class="form-control" value="" id="" name="mengetahui" placeholder="Isikan Nama" required>
                    </div>  -->   

                    <!-- <div class="form-group">
                      <label for="">Menyetujui</label>
                        <input type="text" class="form-control" value="" id="" name="menyetujui" placeholder="Isikan menyetujui" required>
                    </div>             
 -->
                      
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

 <!--  <script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

</script> -->

