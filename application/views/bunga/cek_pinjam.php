<section class="content-header">
  <br>
    <h1>
      <b>  SP Pinjaman Bank</b>
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
     <li class="active"><a href="<?php echo base_url(); ?>Bunga"">BUNGA</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>Pinjaman">PINJAMAN</a></li>           
</ul>
</div>
</nav> 
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>

                   <div class="panel-body">
  <form action="<?php echo base_url(); ?>Pinjaman/cek" method="POST">
    <label>CEK STATUS SURAT ANDA</label>
     <div class="input-group" style="margin:3px 10px 10px 10px;">
        <input type="text" class="form-control" name="no_surat"
      placeholder="MASUKAN NO SURAT"><span class="input-group-btn">
      <button type="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-search"></span>
      </button> 
              </span>
        </div>      
     </form>


                <div class="box-title">
                </div><!-- /.box-title -->
                <div class="box-body">
				<div class="table-responsive">
                <div class="box-body">
                 <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr  class="info">
                      <th style="vertical-align: middle;text-align:center;">NO</th>
                      <th style="vertical-align: middle;text-align:center;">NO SURAT</th>
                      <th style="vertical-align: middle;text-align:center;">PERIHAL</th>
                      <th style="vertical-align: middle;text-align:center;">PINJAMAN</th>
                      <th style="vertical-align: middle;text-align:center;">APPROVAL</th>
					            <th style="vertical-align: middle;text-align:center;">CATATAN KADEP</th>
                       <th style="vertical-align: middle;text-align:center;">CATATAN DIREKTUR</th>
                      <th style="vertical-align: middle;text-align:center;">CATATAN DIRUT</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_bunga as $db) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $db['no_surat']; ?></td>
                      
                      <td><?php echo $db['perihal']; ?></td>
                      
                      <td><?php echo number_format ($db['pinjaman'], 0, ".", "."); ?></td>
                                   
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
                       <td><?php echo $db['catatan_dirut']; ?></td>
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
    
