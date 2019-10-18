
      <!-- Content Header (Page header) -->
            <section class="content-header">
              <!-- <div class="box"> -->
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <!-- <div class="box-title"> --> 
        <h1>
         <b> DATA PESERTA</b>
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">


            <!--MENU ATAS-->  
  <div class="row">
  <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
      <li class="active">
      <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>Konfirmpeserta">Data Kehadiran Peserta</a></li>
      
      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>dafdir">Data Memo Konsumsi</a></li>
      
      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>memodafdir">Surat Memorandum Acara</a></li>

      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>formpermohonan">Surat Formulir Permohonan</a></li>


        </ul>             
  </div>
  </div>
  <!--END MENU ATAS-->

          <div class="item">
         
          <!-- Small boxes (Stat box) -->
          <div class="row">
          <div class="col-md-12">
			     <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span>&nbspPRINT </button><br> -->
           <!--  <br>
            <br>
            <br> -->

            <div class="row">
            <div class="form-group">
            <div class="col-md-6 ">
          
<!-- Untuk Membuat Nama Acara -->

          <!--<label for="">NAMA ACARA</label>--> 
              <!-- <form role="form" action="<?php echo base_url(); ?>dafdir/savedata" method="POST" enctype="multipart/form-data">
                  <div>

                   <label for="">NAMA ACARA : </label>
                   <div class="input-group" style="margin:0px 0px 0px 0px;">
                      
                        <input type="text" class="form-control" name="" placeholder="Isikan nama acara" required><span class="input-group-btn">               
                  <button type="submit" class="btn btn-primary">Simpan</button> </span>
                    </div></form></div> -->
              
             <!-- <table border="0">
            <thead>
              <tr>

                <th style="vertical-align:top;text-align:left" width="130">NAMA ACARA</th>
                <th style="vertical-align:top;text-align:left width="100"> </th>
              </tr>
              <tr>
                <th style="vertical-align:top;text-align:left" width="400"><input type="text" class="form-control" value="" id="" name="nm_acara" placeholder="Isikan Nama Acara" required>  </th>
                 <th style="vertical-align:top;text-align:left width="100"> </th>
                <th style="vertical-align:top;text-align:left"> <button data-toggle="modal" data-target="#myModal" class="btn btn-primary"><span class=""></span>Simpan</button></th>
              </tr>
            </thead> -->
           <!--  </table> -->
            <!-- <br>     
              <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button> -->

            </div>
            </div>
            </div>

            <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Konfirmpeserta/addkonfirm" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA </a> 
              <div class="box">
                <!-- <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span> -->
                <div class="box-title">
                  
                </div><!-- /.box-title -->

              <br>
              <!-- <div class="box">
        			<div class="table-responsive"> -->

                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE</th>
                      <th>KEPADA YTH.</th>
                      <th>TANGGAL MEMO</th>
                      <th>ACARA</th>
                      <th>DEPARTEMEN</th>
                      <th>JUMLAH PESERTA</th>
                      <th>PANITIA</th>
                      <th>TOTAL</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_konfirm as $dk) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $dk['kode_peserta']; ?></td>
                      <td><?php echo $dk['pemohon']; ?></td>
                      <td><?php echo $dk['tgl_memo']; ?></td>
                      <td><?php echo $dk['perihal_acara']; ?></td>
                      <td><?php echo $dk['departemen']; ?></td>
                      <td><?php echo $dk['jumlah_peserta']; ?></td>
                      <td><?php echo $dk['panitia']; ?></td>
                      <td><?php echo $dk['total']; ?></td>
                      
                      
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Konfirmpeserta/editkonfirmpeserta/<?php echo $dk['idkonfirmpeserta']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Konfirmpeserta/hapusKonfirmpeserta/<?php echo $dk['idkonfirmpeserta']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->


	  <!-- modal cetak daftar hadir-->
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">CETAK</h4></td>
          </div>
            <div class="modal-body">
              <form action="<?php echo base_url(); ?>LaporanDafdir/cetak_daftarhadir" target='_blank' method="POST">
                <div class="form-group"> 
                PILIH:<br>
                  <select name="kd_form_hdr" class="form-control">
                    <option>  nama acara : </option>
                      <?php foreach($kd_form_hdr as $dt) { ?>
                    <option value=<?php echo $dt['kd_form_hdr'] ; ?>>
                      <?php echo $dt['nama_acara']?></option>
                      <?php  } ?>
                  </select>
                </div>
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                    <input type="submit" class="btn btn-primary" value="CETAK">
                </div>
                  </fieldset>
              </form>   
            </div>
        </div>
      </div>
    </div>
  </div>                          
  <!-- end modal -->
	 
   <section class="content-header">

    <h1>
          <b>DAFTAR PESERTA</b>
    </h1>

    </section>
    
     <section class="content">
          <!-- Small boxes (Stat box) -->
          <a  href="<?php echo base_url(); ?>dafdir/adddafdir" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA</a>
      <button data-toggle="modal" data-target="#myModal2" class="btn btn-info"><span class="fa fa-desktop"></span>&nbspPencarian Data</button>
      <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span>&nbspPRINT </button><br>

      <!-- <body> -->

            <!-- <div class="col-md-12"> -->
         <!-- <table class=""> 
               <tr>  
                    <td>Jumlah Record</td>      
                    <td><?php echo $jum; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Halaman</td>
                    <td><?php echo $halaman; ?></td>
                </tr> 
                
               <tr>
                    <td>Total &nbsp;</td>
                    <td>:&nbsp;<?php


                    foreach ($totalbiaya as $jt) {
                      

                      $jumlahtotal=$jt['total'];
                    }


                     echo "<b> Rp.". number_format($jumlahtotal).",-</b>";?></td>
                </tr>
               
            
            </table>-->


          <div class="row">
            <div class="col-md-12">
              <div class="box">
              <div class="table-responsive">
                <div class="box-body">
                 <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE FORM HADIR</th>
                      <th>NAMA</th>
                      <th>JUMLAH</th>
                      <th>KETERANGAN</th>
                      <th>TANGGAL</th>
                      <th>DEPARTEMEN</th>
                      
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; 
                    $total=0;

                    foreach($mpit as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kd_form_hdr']; ?></td>
                      <td><?php echo $row['nm_peserta']; ?></td>
                      <td> Rp. <?php echo number_format( $row['jumlah_biaya'], 0, ".", "."); ?>,-</td>
                      <td><?php echo $row['keterangan']; ?></td>
                      <td><?php echo $row['tgl_suratdafdir']; ?></td>
                      <td><?php echo $row['departemen3']; ?></td>
                      
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>dafdir/editdafdir/<?php echo $row['id_dafdir']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>dafdir/hapusdafdir/<?php echo $row['id_dafdir']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        $total=$total+$row['jumlah_biaya'];
          }
          ?>
                   <tr>
            <td colspan="2"></td>
          <td bgcolor="skyblue"><b>Total</b> &nbsp;</td>
                    <td bgcolor="skyblue">:&nbsp;<?php
                echo "<b> Rp.". number_format($total).",-</b>";?></td>
                </tr>    

                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
         </div><!-- /.row -->
         </div><!-- /.row (main row) -->
    </section>  
    </div>
    </div>
    </div><!-- /.content-wrapper -->
    
  </div><!-- ./wrapper -->
  <!-- page script -->
 

  <!-- modal -->
    <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">CETAK</h4></td>
          </div>
            <div class="modal-body">
              <form action="<?php echo base_url(); ?>LaporanDafdir/cetak_daftarhadir" target='_blank' method="POST">
                <div class="form-group"> 
                PILIH:<br>
                  <select name="kd_form_hdr" class="form-control">
                    <option>  nama acara : </option>
                      <?php foreach($kd_form_hdr as $dt) { ?>
                    <option value=<?php echo $dt['kd_form_hdr'] ; ?>>
                      <?php echo $dt['nama_acara']?></option>
                      <?php  } ?>
                  </select>
                </div>
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                    <input type="submit" class="btn btn-primary" value="CETAK">
                </div>
                  </fieldset>
              </form>   
            </div>
        </div>
      </div>
    </div>
  </div>                          
  <!-- end modal -->
  
  <!-- modal -->
      <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMPIL</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Konfirmpeserta" method="POST">
        <div class="form-group"> 
             Nama Acara:<br>
         <select name="kd_form_hdr" class="form-control">
       <option> Pilih Nama Acara : </option>
     <?php foreach($kd_form_hdr as $im) { ?>
            <option value=<?php echo $im['kd_form_hdr'] ; ?>>
             <?php echo $im['nama_acara']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="TAMPIL">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal --> 
    
    
