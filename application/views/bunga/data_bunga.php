<section class="content-header">
  <br>
  
    <h1>
      <b>  SP Penurunan Suku Bunga Bank</b>
        <small></small>
    </h1>
<br>

</section>

          <section class="content">
<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
               
          <!-- Small boxes (Stat box) -->
          <div class="box">

            <nav class="navbar navbar-default">
      <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a>
      </div>
  <ul class="nav navbar-nav">
    <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='17'):?>
    <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;"><a href="<?php echo base_url(); ?>Bunga"">BUNGA</a></li>
<?php endif;?>
    <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;"><a href="<?php echo base_url(); ?>Pinjaman">PINJAMAN</a></li>           
</ul>
</div>
</nav> 
                
<?php 
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10' AND $ynwa!='17' AND $ynwa!='15' AND $ynwa!='28' AND $ynwa!='29'):?>
         <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/Disetujui" class="btn btn-success no-radius dropdown-toggle"><i class="glyphicon glyphicon-ok"></i> &nbsp DISETUJUI</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/direvisi" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-retweet"></i> &nbsp DIREVISI</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/ditolak" class="btn btn-danger no-radius dropdown-toggle"><i class="glyphicon glyphicon-remove"></i> &nbsp DITOLAK</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/cek" class="btn btn-warning no-radius dropdown-toggle"><i class="glyphicon glyphicon-file"></i> &nbsp CEK STATUS</a>
          <br><br>


          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>Bunga/addbunga" class="btn btn-info no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
          <?php endif;?>

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
                      <th style="vertical-align: middle;text-align:center;">BANK</th>
                       <th style="vertical-align: middle;text-align:center;">PEMBERI PINJAMAN</th>
                       <th style="vertical-align: middle;text-align:center;">BUNGA</th>
                       <th style="vertical-align: middle;text-align:center;">APPROVAL</th>
					            <th style="vertical-align: middle;text-align:center;">CATATAN KADEP</th>
                       <th style="vertical-align: middle;text-align:center;">CATATAN DIREKTUR</th>
                      <th style="vertical-align: middle;text-align:center;">DOWNLOAD LAMPIRAN</th>
                      <th style="vertical-align: middle;text-align:c  nenter;">PRINT SUKU BUNGA</th>
                      <th style="vertical-align: middle;text-align:center;">UBAH</th>
                       <?php 
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10' AND $ynwa!='17' AND $ynwa!='15'  AND $ynwa!='28' AND $ynwa!='29'):?>
                      <th style="vertical-align: middle;text-align:center;">HAPUS</th>
                       <?php endif;?>
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
                      <td><?php echo $db['banku']; ?></td>
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
               <td style="text-align: center; vertical-align: middle;">
                      <a class="btn btn-info btn-md" href="<?php echo base_url(); ?>assets/upload/<?php echo $db['foto']; ?>" download="<?php echo $db['foto']; ?>"><i class="glyphicon glyphicon-download"></i></a>
                      </td>
               <td style="text-align: center;vertical-align: middle;">
                      <a target="blank" class="btn btn-success btn-md" href="<?php echo base_url(); ?>Lapbung/cetak_bungaa/<?php echo $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-print"></i></a>
                     </td>

                     <!-- <td style="text-align: center;vertical-align: middle;">
                      <a target="blank" class="btn btn-primary btn-md" href="<?php echo base_url(); ?>Lapbung/cetak_bungaaa/<?php echo $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-print"></i></a>

                      </td> -->

					     <td style="text-align: center;vertical-align: middle;">
                <a  class="btn btn-warning btn-md" href="<?php echo base_url(); ?>Bunga/editbunga/<?php echo $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                     <?php 
              $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10' AND $ynwa!='17' AND $ynwa!='15'  AND $ynwa!='28' AND $ynwa!='29'):?>
                    <td style="text-align: center;vertical-align: middle;">
                      <a onclick="return confirm('Anda Yakin Hapus Data ini??');" class="btn btn-danger btn-md" href="<?php echo base_url(); ?>Bunga/hapusbunga/<?php echo  $db['id_sbunga']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>     
                   <?php endif;?>  
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
  
<!--tabel kedua -->


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
    
