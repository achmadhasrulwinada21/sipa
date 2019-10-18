<section class="content-header">
  <br>
    <h1>
      <b>   SP Penurunan Suku Bunga Bank</b>
        <small></small>
    </h1>
    <br>

</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
         
          <!--- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>Laporanbunga/cetak_bunga" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT </a> -->

        <!-- <button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><span class="fa fa-print"></span>PRINT</button> -->
        
          <div class="box">

            <nav class="navbar navbar-default">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a>
      </div>
  <ul class="nav navbar-nav">
     <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;"><a href="<?php echo base_url(); ?>Bunga"">BUNGA</a></li>
    <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;"><a href="<?php echo base_url(); ?>Pinjaman">PINJAMAN</a></li>           
</ul>
</div>
</nav> 
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>



          <!-- <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>bunga/disetujuidirut" class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-ok"></i> &nbsp DISETUJUI DIRUT</a> -->

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/direvisi" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-retweet"></i> &nbsp DIREVISI DIREKTUR</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/direvisikadep" class="btn btn-danger no-radius dropdown-toggle"><i class="glyphicon glyphicon-retweet"></i> &nbsp DIREVISI KADEP</a>

          


<br><br>
          

                <div class="box-title">
                </div><!-- /.box-title -->
                <div class="box-body">
        <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr  class="info">
                      <th style="vertical-align: middle;text-align:center;">NO</th>
                      <th style="vertical-align: middle;text-align:center;">NO SURAT</th>
                      <th style="vertical-align: middle;text-align:center;">RUMAH SAKIT</th>
                      <th style="vertical-align: middle;text-align:center;">PERIHAL</th>
                      <th style="vertical-align: middle;text-align:center;">LAMPIRAN</th>
                      <th style="vertical-align: middle;text-align:center;">TANGGAL</th>
                      <th style="vertical-align: middle;text-align:center;">TUJUAN</th>
                      <th style="vertical-align: middle;text-align:center;">PEMBERI PINJAMAN</th>
                      <th style="vertical-align: middle;text-align:center;">BUNGA</th>
                      <th style="vertical-align: middle;text-align:center;">APPROVAL</th>
                      <th style="vertical-align: middle;text-align:center;">CATATAN KADEP</th>
                       <th style="vertical-align: middle;text-align:center;">CATATAN DIREKTUR</th>
                        <th style="vertical-align: middle;text-align:center;">UBAH</th>
                      <th style="vertical-align: middle;text-align:center;">DOWNLOAD LAMPIRAN</th>
                      <th style="vertical-align: middle;text-align:center;">PRINT SUKU BUNGA</th>
                              </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_bunga as $db) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $db['no_surat']; ?></td>
                       <td><?php echo $db['namars']; ?></td>
                      <td><?php echo $db['perihal']; ?></td>
                      <td><?php echo $db['lampiran']; ?></td>
                      <td><?php echo $db['tanggal']; ?></td>
                      <td><?php echo $db['tujuan']; ?></td>
                      <td><?php echo $db['bank']; ?></td>
                      <td><?php echo $db['bunga']; ?></td>
                                   
            <td  style="text-align: center; vertical-align: middle;">
                <?php 
            if($db['mengetahuidirekturcheck'] == "Approve") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Direktur</p>';
              }elseif($db['mengetahuidirekturcheck'] == "Approve_kadep"){
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Kadep</p>';
            }elseif($db['mengetahuidirekturcheck'] == "Approve_dirut"){
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui Dirut</p>';
            }elseif($db['mengetahuidirekturcheck'] == "Not_Approved_dirut"){
              echo '<p style="background-color:mediumseagreen;color:white;text-align:center;">Ditolak Dirut</p>';
             }elseif($db['mengetahuidirekturcheck'] == "Not_Approved_kadep"){
              echo '<p style="background-color:mediumseagreen;color:white;text-align:center;">Ditolak Kadep</p>';
            }elseif($db['mengetahuidirekturcheck'] == "Not Approved"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
              }elseif($db['mengetahuidirekturcheck'] == "Revisi"){
              echo '<p style="background-color:green;color:white;text-align:center;">Revisi</p>';
             } elseif($db['mengetahuidirekturcheck'] == "Revisi_dirut"){
              echo '<p style="background-color:green;color:white;text-align:center;">Revisi Dirut</p>';
            }elseif($db['mengetahuidirekturcheck'] == "Revisi_kadep"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi Kadep</p>';
            }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Draf</p>';
            }
            ?>
            </td>

                      <td><?php echo $db['catatan_kadep']; ?></td>
                      <td><?php echo $db['catatan']; ?></td>

              <td style="text-align: center;vertical-align: middle;">
                <a  class="btn btn-warning btn-md" href="<?php echo base_url(); ?>Bunga/editbunga/<?php echo $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>

               <td style="text-align: center; vertical-align: middle;">
                      <a class="btn btn-info btn-md" href="<?php echo base_url(); ?>assets/upload/<?php echo $db['foto']; ?>" download="<?php echo $db['foto']; ?>"><i class="glyphicon glyphicon-download"></i></a>
                      </td>
                <td style="text-align: center;vertical-align: middle;">
                      <a target="blank" class="btn btn-primary btn-md" href="<?php echo base_url(); ?>Lapbung/cetak_bungaa/<?php echo $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-print"></i></a>

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


      </section><!-- /.content -->
  
<!--- end tabel kedua -->


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

<form action="<?php echo base_url(); ?>LaporanBunga/cetak_bunga" method="POST" target="blank">
        <div class="form-group"> 
             no surat:<br>
         <select name="no_surat" class="form-control">
       <option> Pilih no surat : </option>
     <?php foreach($no_bunga as $nb) { ?>
            <option value=<?php echo $nb['no_surat'] ; ?>>
             <?php echo $nb['no_surat']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                       
  <!-- end modal -->
    
