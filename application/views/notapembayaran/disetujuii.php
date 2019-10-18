
      <section class="content-header">

          <h1>
        NOTA PEMBAYARAN RENCANA KENDALI ANGGARAN TENAGA KERJA RS BARU
        <small></small>
    </h1>

        </section>

      

        <!-- Main content -->
        <section class="content">

           <!--MENU ATAS-->  
  <div class="row">
  <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
      <li class="active">
      <li  style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>detailnota">Rencana Kendali Anggaran</a></li>
      
      <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>notapembayaran">Nota Pembayaran</a></li>
        </ul>             
  </div>
  </div>

  <!--END MENU ATAS-->

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
            <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

             <?php
                 $tab=($this->session->userdata('koderole'));

                  if($tab=='18' OR $tab=='7'):?>
          <br>
         <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>notapembayaran/disetujui" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-ok"></i> &nbsp DISETUJUI</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>notapembayaran/direvisi" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-retweet"></i> &nbsp DIREVISI</a>

          <a style="margin-bottom:3px;margin-left:5px;" href="<?php echo base_url(); ?>notapembayaran/ditolak" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-remove"></i> &nbsp DITOLAK</a>

          <?php endif;?>
                <div class="box-title">

                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA PERUSAHAAN</th>
                      <th>NO. BUKTI</th>
                      <th>SUPPLIER</th>
                      <th>NO. PERKIRAAN</th>
                      <th>NO. GIRO / CEK</th>
                      <th>NO. REKENING</th>
                      <th>BANK</th>
                      <th>KETERANGAN</th>
                      <th>NO. INVOICE</th>
                      <th>TANGGAL</th>
                      <th>TAGIHAN</th>
                      <th>PEMBAYARAN</th>
                      <th>SISA</th>
                      <th>APPROVAL</th>
                      <th>CATATAN</th>
                      <?php if($this->session->userdata('koderole')=='18'):?>
                      <th>VIEW</th>
                      <?php endif;?>
                      <?php if($this->session->userdata('koderole')=='7'):?>
                      <th>CETAK</th>
                      <?php endif;?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_nota as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_pt']; ?></td>
                      <td><?php echo $row['no_bukti']; ?></td>
                      <td><?php echo $row['supplier']; ?></td>
                      <td><?php echo $row['no_perkiraan']; ?></td>
                      <td><?php echo $row['no_girocek']; ?></td>
                      <td><?php echo $row['no_rek']; ?></td>
                      <td><?php echo $row['bank']; ?></td>
                      <td><?php echo $row['keterangan']; ?></td>
                      <td><?php echo $row['no_invoice']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td>Rp. <?php echo number_format ($row['tagihan'] ,2,',','.'); ?></td>
                      <td>Rp. <?php echo number_format ($row['pembayaran'] ,2,',','.'); ?></td>
                      <td>Rp. <?php echo number_format ($row['sisa'] ,2,',','.'); ?></td>
                    <td>
                <?php 
            if($row['approval'] == "Approve Pemohon") {
              echo '<p style="background-color:goldenrod;color:white;text-align:center;">Disetujui Pemohon</p>';
            }elseif($row['approval'] == "Approve Petugas Jurnal"){
              echo '<p style="background-color:mediumseagreen;color:white;text-align:center;">Disetujui Petugas Jurnal</p>';
            }elseif($row['approval'] == "Approve Bagian Akuntansi"){
              echo '<p style="background-color:indianred;color:white;text-align:center;">Disetujui Bagian Akuntansi</p>';
            }elseif($row['approval'] == "Approve Persetujuan Bayar"){
              echo '<p style="background-color:orangered;color:white;text-align:center;">Disetujui Persetujuan Bayar</p>';
            }elseif($row['approval'] == "Approve Pemeriksa"){
              echo '<p style="background-color:lightskyblue;color:white;text-align:center;">Disetujui Pemeriksa</p>';
            }elseif($row['approval'] == "Approve Sign Cek 1"){
              echo '<p style="background-color:royalblue;color:white;text-align:center;">Disetujui Sign Cek 1</p>';
            }elseif($row['approval'] == "Approve Sign Cek 2"){
              echo '<p style="background-color:royalblue;color:white;text-align:center;">Disetujui Sign Cek 2</p>';
            }elseif($row['approval'] == "Approve Penerima Pembayaran"){
              echo '<p style="background-color:olivedrab;color:white;text-align:center;">Disetujui Penerima Pembayaran</p>';
            }elseif($row['approval'] == "Not Approved"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
            }elseif($row['approval'] == "Revisi"){
              echo '<p style="background-color:orange;color:white;text-align:center;">Revisi</p>';
            }else{
              echo '<p style="background-color:blue;color:white;text-align:center;">Menunggu Disetujui</p>';
            }
            ?>
            </td>
            <td><?php echo $row['catatan']; ?></td>
                      <td>
                        <a style="margin-bottom:5px" target='_blank' class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>laporannotapdf/cetak_nota/<?php echo $row['id_trnota']; ?>"><i class="glyphicon glyphicon-print"></i></a> 
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->

