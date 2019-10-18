
      <section class="content-header">
        <h1>
          <b>EDIT SURAT PERMOHONAN FIXED ASSET</b>
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
                 <?php if($this->session->userdata('roles')=='12'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT SURAT PERMOHONAN FIXED ASSET</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stockopname/updatestockopname" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_sp;?>" id="" name="id_sp">
                    </div>

                    <div class="form-group">

                      <label for="">Tanggal Surat</label>
                       <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" required>
                    </div>

                     
                    <div class="form-group">
                      <label for="">No. Surat</label>
                        <input type="text" class="form-control" value="<?php echo $no_sp; ?>" id="" name="no_sp" placeholder="NO. SURAT" required>                        
                    </div>

                      <div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" placeholder="LAMPIRAN" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" placeholder="PERIHAL" required>                        
                    </div>

                    
                    <div class="form-group">
                      <label for="">Tanggal Data Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_dataaset;?>" id="" name="tgl_dataaset" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Di Tanda Tangani Oleh Penanggung Jawab Ruangan Serta Petugas Fixed Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_stockopname;?>" id="" name="tgl_stockopname" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Melaporkan Hasil Stock Opname kepada DepJangUm dan DepJangMed</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_analisanilai;?>" id="" name="tgl_analisanilai" required>                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Diserahkannya Hasil Stock Opname ke Departemen Keuangan</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_hasil;?>" id="" name="tgl_hasil" required>                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Departemen Keuangan Melakukan Koreksi Atas Laporan Hasil Stock Opname</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_koreksi;?>" id="" name="tgl_koreksi" required>                        
                    </div>

                    <?php endif;?>

                    <?php if($this->session->userdata('roles')=='11'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT SURAT PERMOHONAN FIXED ASSET</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stockopname/updatestockopname" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_sp;?>" id="" name="id_sp">
                    </div>

                    <div class="form-group">

                      <label for="">Tanggal Surat</label>
                       <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" required>
                    </div>

                    <div class="form-group">
                      <label for="">No. Surat</label>
                        <input type="text" class="form-control" value="<?php echo $no_sp; ?>" id="" name="no_sp" placeholder="NO. SURAT" required>                        
                    </div>

                      <div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" placeholder="LAMPIRAN" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" placeholder="PERIHAL" required>                        
                    </div>

                    
                    <div class="form-group">
                      <label for="">Tanggal Data Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_dataaset;?>" id="" name="tgl_dataaset" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Di Tanda Tangani Oleh Penanggung Jawab Ruangan Serta Petugas Fixed Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_stockopname;?>" id="" name="tgl_stockopname" required>                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Melaporkan Hasil Stock Opname kepada DepJangUm dan DepJangMed</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_analisanilai;?>" id="" name="tgl_analisanilai" required>                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Diserahkannya Hasil Stock Opname ke Departemen Keuangan</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_hasil;?>" id="" name="tgl_hasil" required>                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Departemen Keuangan Melakukan Koreksi Atas Laporan Hasil Stock Opname</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_koreksi;?>" id="" name="tgl_koreksi" required>                        
                    </div>

                    <?php endif;?>

                    <?php if($this->session->userdata('roles')=='5'):?>
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT SURAT PERMOHONAN FIXED ASSET</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>stockopname/updatestockopname" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_sp;?>" id="" name="id_sp">
                    </div>

                    <div class="form-group">

                      <label for="">Tanggal Surat</label>
                       <input type="date" class="form-control" value="<?php echo $tanggal;?>" id="" name="tanggal" readonly="">
                    </div>

                    <div class="form-group">
                      <label for="">No. Surat</label>
                        <input type="text" class="form-control" value="<?php echo $no_sp; ?>" id="" name="no_sp" placeholder="NO. SURAT" readonly="">                        
                    </div>

                      <div class="form-group">
                      <label for="">Lampiran</label>
                        <input type="text" class="form-control" value="<?php echo $lampiran; ?>" id="" name="lampiran" placeholder="LAMPIRAN" readonly="">                        
                    </div>

                    <div class="form-group">
                      <label for="">Perihal</label>
                        <input type="text" class="form-control" value="<?php echo $perihal; ?>" id="" name="perihal" placeholder="PERIHAL" readonly="">                        
                    </div>

                    
                    <div class="form-group">
                      <label for="">Tanggal Data Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_dataaset;?>" id="" name="tgl_dataaset" readonly="">                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Di Tanda Tangani Oleh Penanggung Jawab Ruangan Serta Petugas Fixed Asset</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_stockopname;?>" id="" name="tgl_stockopname" readonly="">                        
                    </div>

                    <div class="form-group">
                      <label for="">Batas Tanggal Melaporkan Hasil Stock Opname kepada DepJangUm dan DepJangMed</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_analisanilai;?>" id="" name="tgl_analisanilai" readonly="">                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Diserahkannya Hasil Stock Opname ke Departemen Keuangan</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_hasil;?>" id="" name="tgl_hasil" readonly="">                        
                    </div>

                     <div class="form-group">
                      <label for="">Batas Tanggal Departemen Keuangan Melakukan Koreksi Atas Laporan Hasil Stock Opname</label>
                        <input type="date" class="form-control" value="<?php echo $tgl_koreksi;?>" id="" name="tgl_koreksi" readonly="">                        
                    </div>

                     
              
                    <div class="form-group">
            <label type="hidden" for="">Approve Direktur Operasional Dan Umum</label>
                      <select name="approval" id="approval" class="form-control">
              <option>--Pilih Status--</option>
              <option <?php if( $approval=='Approve'){echo "selected"; } ?> value='Approve'>Disetujui</option>
              <option <?php if( $approval=='Not Approved'){echo "selected"; } ?> value='Not Approved'>Ditolak</option>
              <option <?php if( $approval=='Revisi'){echo "selected"; } ?> value='Revisi'>Revisi</option>
              <option <?php if( $approval=='Menunggu Disetujui'){echo "selected"; } ?> value='Menunggu Disetujui'>Draf</option>
                      </select><option>
                  </div>
           <div class="form-group">
                      <label for="">CATATAN REVISI</label>
                        <textarea type="text" class="form-control" id="" name="catatan"><?php echo $catatan; ?></textarea>                      
                    </div>

          <div class="form-group">
                      <label type="hidden" for="">TTD Mengetahui</label>
                        <select name="ttd_approv" class="form-control">
                          <option>--TTD Mengetahui--</option>
                            <?php foreach($idmengetahui as $data) {
                          if(!in_array($data['foto'],$untuk)){ ?>
                              <option  value="<?php echo $data['foto'] ?>"><?php echo $data['nama_user'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $data['foto'] ?>"><?php echo  $data['nama_user'] ?></option>
                          <?php }} ?>
                        </select> 
                    </div>
          <?php endif;?>

                     <!--  <?php if($this->session->userdata('roles')=='1'):?>
                     <div class="form-group">
                      <label for="">Approve Direktur Operasional & Umum</label>
                      <br/>                    
                       <input type="checkbox"   name="approval" <?php echo $c1=$approval; if($c1=='t') echo " Checked "?>
                       >Ya,Sudah Dilihat Dan Dibaca</input> 
                    </div>
                    <?php endif;?> -->
                    
                   

                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>stockopname" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
    
       
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
