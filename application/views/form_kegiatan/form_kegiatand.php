	 <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?>
  <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>form_kegiatan">Form Rencana</a></li>
     <li class=""><a href="<?php echo base_url(); ?>form_kegiatan/Disetujui_rencana">Form Realisasi</a></li>
     <li class=""><a href="<?php echo base_url(); ?>form_kegiatan/selesai">Form Laporan</a></li>
	  <li class=""><a href="<?php echo base_url(); ?>mkegiatan">Master Acara</a></li>
    <li class=""><a href="<?php echo base_url(); ?>msesi">Master Kegiatan</a></li>	 
	</ul> 
<?php endif;?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b> FORM RENCANA ANGGARAN</b>
        </h4>
        </section>
   
        <!-- Main content -->
        <section class="content">
           <div class="row">
          <!-- Small boxes (Stat box) -->
                     <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?>  
         
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-6">
                   <!--  <div class="form-group">
                      <label for="">ID PRODUK</label>
                        <input type="text" class="form-control" value="<?php //echo $prid; ?>" id="" name="prid" required readonly>
                    </div> -->

                    <div class="form-group">
                      <label for="">NAMA ACARA</label>
                        <select name="kode_kegiatan" class="form-control" required>
                          <option value="-">--Pilih Kegiatan--</option>
                          <?php foreach($kegiatan as $row) { ?>
                              <option value="<?php echo $row['kode_kegiatan'] ?>"><?php echo $row['nama_kegiatan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                      <label for="">DESKRIPSI</label>
                        <input type="text" class="form-control" value="" id="" name="judul_kegiatan" required></div>
                      
                     <label for="">PILIH PELAKSANA</label>
                  <div class="form-group">
                  <input type="checkbox" id="rs" onclick="myFunction()">RUMAH SAKIT<br>
                 <input type="checkbox" id="dept" onclick="myFunction2()">DEPARTEMEN<br>
                  </div>     
                  <div class="form-group" id="text" style="display: none;">
                      <label for="">PELAKSANA</label>
                        <select name="nama_rs" class="form-control" required>
                          <option value="-">--Pilih Rumah Sakit--</option>
                          <?php foreach($rs as $row) { ?>
                              <option value="<?php echo $row['namars'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                   
                     <div class="form-group" id="textt" style="display: none;">
                     <label for="">PELAKSANA</label>
                        <select name="departemen" class="form-control" required>
                          <option value="-">--Pilih Departemen--</option>
                          <?php foreach($dept as $row) { ?>
                              <option value="<?php echo $row['nama_depar'] ?>"><?php echo $row['nama_depar'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

                     <div class="form-group">
                      <label for="">TANGGAL ACARA</label>
                        <input type="date" class="form-control" value="" id="" name="tanggal_acara" required></div>
                      
             
						           
           
        
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('form_kegiatan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
<?php endif;?>
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="info" style="color:black;font-weight: bold;">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">NAMA ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">DESKRIPSI</th>
                      <th  style="vertical-align: middle;text-align: center;">PELAKSANA</th>
                      <th  style="vertical-align: middle;text-align: center;">TANGGAL ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">STATUS</th>
                      <th  style="vertical-align: middle;text-align: center;">CATATAN</th>
                        <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
					            <th  style="vertical-align: middle;text-align: center;">TAMBAH SUMBER DANA</th>
                      <th  style="vertical-align: middle;text-align: center;">TAMBAH PERENCANAAN</th>
                       <th  style="vertical-align: middle;text-align: center;">RESET STATUS</th>
                      <?php endif;?>
                      <th  style="vertical-align: middle;text-align: center;">PRINT Rencana</th>
                      <th  style="vertical-align: middle;text-align: center;">EDIT</th>
                        <?php 
              $ynwa = ($this->session->userdata('koderole'));
                    if($ynwa!='10'):?> 
                       <th  style="vertical-align: middle;text-align: center;">HAPUS</th>                                 <?php endif;?>
                    </tr>
                    <!-- <tr class="info" style="color:black;font-weight: bold;">
                      <th>RUMAH SAKIT</th>
                      <th>DEPARTEMEN</th>
                    </tr> -->
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($form_kegiatan as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="color:black;font-weight: bold;">
                      <td><?php echo $no; ?></td>
                      <td><a href="<?php echo base_url(); ?>form_kegiatan/tampil_rencana/<?php echo $row['idfkeg']; ?>"><?php echo $row['nama_kegiatan']; ?></a></td>
                       <td><?php echo $row['judul_kegiatan']; ?></td>
                      <?php if($row['nama_rs'] !='-' and $row['departemen'] =='-' ): ?>
                      <td><?php echo $row['nama_rs']; ?></td>
                       <?php endif;?>
                       <?php if($row['departemen'] !='-' and $row['nama_rs'] =='-' ): ?>
                      <td><?php echo $row['departemen']; ?></td>
                      <?php endif;?>
                      <td><?php echo $row['tanggal_acara']; ?></td>
                       <td  style="text-align: center; vertical-align: middle;">
                <?php 
            if($row['status'] == "Approve_rencana") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Anggaran</p>';
            }elseif($row['status'] == "Approve_realisasi"){
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Realisasi</p>';
            }elseif($row['status'] == "Revisi_rencana"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi Anggaran</p>';
               }elseif($row['status'] == "Revisi_realisasi"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi Realisasi</p>';
              }elseif($row['status'] == "Not_Approved_rencana"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak Anggaran</p>';
               }elseif($row['status'] == "Not_Approved_realisasi"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak Realisasi</p>';
               }elseif($row['status'] == "realisasi"){
              echo '<p style="background-color:red;color:white;text-align:center;">Realisasi</p>';
              }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Menunggu Disetujui</p>';
            }
            ?>
            </td>
            <td><?php echo $row['catatan']; ?></td>
                        <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
					            <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>form_kegiatan/addsumber/<?php echo $row['idfkeg']; ?>"><i class="fa fa-plus"></i></a></td>
                        <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>form_kegiatan/adddetail/<?php echo $row['idfkeg']; ?>"><i class="fa fa-plus"></i></a></td>
                        <td><a style="margin-top:8px;margin-left: 10px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idfkeg'];?>"><i class="glyphicon glyphicon-home"></i></a></td>
                        <?php endif;?>
                        <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>Laporananggarann/cetak_anggaranrencana/<?php echo $row['idfkeg']; ?>"><i class="fa fa-print"></i></a></td>
                        <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>form_kegiatan/editabk/<?php echo $row['idfkeg']; ?>"><i class="fa fa-edit"></i></a></td>
                          <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
                       
                        

                        <!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idpr']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 

                     <!-  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/tampil/<?php// echo $row['idpr']; ?>"><i class="fa fa-desktop"></i></a>  -->

                      
                    <!--  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php// echo base_url(); ?>produko/editproduko/<?php// echo $row['idpr']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                     <td style="vertical-align: middle;text-align: center;">
                      <a  onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>form_kegiatan/hapusprod/<?php echo $row['idfkeg']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                     <?php endif;?>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div></div>
            <?php   $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):?> 
               <br><br>
               <div class="panel panel-primary"></div>
                <section class="content-header">
        <h4 style="text-align: center;">
          <b> FORM REALISASI</b>
        </h4>
        </section>
               <span id="pesan-flash"><?php echo $this->session->flashdata('suksess'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables3" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="info" style="color:black;font-weight: bold;">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">NAMA ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">DESKRIPSI</th>
                      <th  style="vertical-align: middle;text-align: center;">PELAKSANA</th>
                      <th  style="vertical-align: middle;text-align: center;">TANGGAL ACARA</th>
                      <th  style="vertical-align: middle;text-align: center;">STATUS</th>
                      <th  style="vertical-align: middle;text-align: center;">CATATAN</th>
                        <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
                      <th  style="vertical-align: middle;text-align: center;">TAMBAH SUMBER DANA</th>
                      <th  style="vertical-align: middle;text-align: center;">TAMBAH PERENCANAAN</th>
                      <?php endif;?>
                       <th  style="vertical-align: middle;text-align: center;">PRINT Realisasi</th>
                        <!-- <th  style="vertical-align: middle;text-align: center;">EDIT</th> -->
                        <?php 
              $ynwa = ($this->session->userdata('koderole'));
                    if($ynwa!='10'):?> 
                       <th  style="vertical-align: middle;text-align: center;">HAPUS</th>                                 <?php endif;?>
                    </tr>
                    <!-- <tr class="info" style="color:black;font-weight: bold;">
                      <th>RUMAH SAKIT</th>
                      <th>DEPARTEMEN</th>
                    </tr> -->
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($form_kegiatanreal as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="color:black;font-weight: bold;">
                      <td><?php echo $no; ?></td>
                      <td><a href="<?php echo base_url(); ?>form_kegiatan/tampil/<?php echo $row['idfkeg']; ?>"><?php echo $row['nama_kegiatan']; ?></a></td>
                       <td><?php echo $row['judul_kegiatan']; ?></td>
                      <?php if($row['nama_rs'] !='-' and $row['departemen'] =='-' ): ?>
                      <td><?php echo $row['nama_rs']; ?></td>
                       <?php endif;?>
                       <?php if($row['departemen'] !='-' and $row['nama_rs'] =='-' ): ?>
                      <td><?php echo $row['departemen']; ?></td>
                      <?php endif;?>
                      <td><?php echo $row['tanggal_acara']; ?></td>
                       <td  style="text-align: center; vertical-align: middle;">
                 <?php 
            if($row['status'] == "Approve_rencana") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Anggaran</p>';
            }elseif($row['status'] == "Approve_realisasi"){
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Realisasi</p>';
            }elseif($row['status'] == "Revisi_rencana"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi Anggaran</p>';
               }elseif($row['status'] == "Revisi_realisasi"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi Realisasi</p>';
              }elseif($row['status'] == "Not_Approved_rencana"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak Anggaran</p>';
               }elseif($row['status'] == "Not_Approved_realisasi"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak Realisasi</p>';
              }elseif($row['status'] == "realisasi"){
              echo '<p style="background-color:red;color:white;text-align:center;">Realisasi</p>';
              }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Menunggu Disetujui</p>';
            }
            ?>
            </td>
            <td><?php echo $row['catatan']; ?></td>
                        <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
                      <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>form_kegiatan/addsumber/<?php echo $row['idfkeg']; ?>"><i class="fa fa-plus"></i></a></td>
                        <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>form_kegiatan/adddetail/<?php echo $row['idfkeg']; ?>"><i class="fa fa-plus"></i></a></td>
                        <?php endif;?>
                        <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php echo base_url(); ?>Laporananggarann/cetak_anggarann/<?php echo $row['idfkeg']; ?>"><i class="fa fa-print"></i></a></td>
                        <!-- <td style="vertical-align: middle;text-align: center;">
                        <a target="blank" class="btn btn-secondary btn-lg" href="<?php// echo base_url(); ?>Laporananggarann/excel_anggaran/<?php// echo $row['idfkeg']; ?>"><i class="fa fa-download"></i></a></td> -->
                        <!-- <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-warning btn-sm" href="<?php //echo base_url(); ?>form_kegiatan/editrealisasi/<?php //echo $row['idfkeg']; ?>"><i class="fa fa-edit"></i></a></td> -->
                          <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
                       
                        

                        <!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idpr']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 

                     <!-  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/tampil/<?php// echo $row['idpr']; ?>"><i class="fa fa-desktop"></i></a>  -->

                      
                    <!--  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php// echo base_url(); ?>produko/editproduko/<?php// echo $row['idpr']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                     <td style="vertical-align: middle;text-align: center;">
                      <a  onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>form_kegiatan/hapusprod/<?php echo $row['idfkeg']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                     <?php endif;?>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div></div>
                <?php endif;?>
            </div><!-- /.box -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
         
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->


<?php
        foreach($form_kegiatan as $i){
       $idfkeg=$i['idfkeg'];
    $kode_kegiatan = $i['kode_kegiatan'];
    $judul_kegiatan = $i['judul_kegiatan'];
    $departemen = $i['departemen'];
    $nama_rs = $i['nama_rs']; 
    $tanggal_acara = $i['tanggal_acara'];
    $status = $i['status']; 
    $catatan = $i['catatan']; 
             
              
              
         ?>
<div id="modal_edit<?php echo $idfkeg;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">STATUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>form_kegiatan/updaterealisasi" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idfkeg;?>" id="" name="idfkeg">
                      <input type="hidden" class="form-control" value="<?php echo $kode_kegiatan;?>" id="" name="kode_kegiatan">
                      <input type="hidden" class="form-control" value="<?php echo $judul_kegiatan;?>" id="" name="judul_kegiatan">
                      <input type="hidden" class="form-control" value="<?php echo $departemen;?>" id="" name="departemen">
                       <input type="hidden" class="form-control" value="<?php echo $nama_rs;?>" id="" name="nama_rs">
                      <input type="hidden" class="form-control" value="<?php echo $tanggal_acara;?>" id="" name="tanggal_acara">
                       <input type="hidden" class="form-control" value="<?php echo $catatan;?>" id="" name="catatan">
                      <input type="hidden" class="form-control" value="Menunggu Disetujui" id="" name="status">
                     

                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin reset status!</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

    