 <section class="content-header">

          <h1> 
        DATA RENCANA KENDALI ANGGARAN TENAGA KERJA RS BARU
        <small></small>
    </h1>

        </section>

        <!-- Main content -->
        <section class="content">

          <!--MENU ATAS-->  
  <div class="row">
  <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
       <ul class="nav navbar-nav">
      <li class="active">
      <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>detailnota">Rencana Kendali Anggaran</a></li>
      
      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>notapembayaran">Nota Pembayaran</a></li>

        </ul>             
  </div>
  </div>
  <!--END MENU ATAS-->

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <?php if($this->session->userdata('koderole')=='18'):?>
                <br>
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>detailnota/adddetail" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA </a>
              <?php endif;?>

              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                   <tr>
                      <th>NO</th>
                      <th>NAMA KEGIATAN</th>
                      <th>RUMAH SAKIT</th>
                      <th>PERUSAHAAN</th>
                      <th>KONTRAKTOR</th>
                      <th>PO</th>
                      <th>NO GIRO CEK</th>
                      <th>RENCANA PEMBAYARAN</th>
                      <th>BULAN DIBAYAR</th>
                      <th>KETERANGAN</th>
                      <?php if($this->session->userdata('koderole')!='18'):?>
                      <th>VIEW</th>
                      <?php endif;?>
                      <?php if($this->session->userdata('koderole')=='18'):?>
                      <th>CETAK</th>        
                      <th>UBAH</th>
                      <th>HAPUS</th>
                      <?php endif;?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_detail as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_kegiatan']; ?></td>
                      <td><?php echo $row['nama_rs']; ?></td>
                      <td><?php echo $row['nama_pt']; ?></td>
                      <td><?php echo $row['kontraktor']; ?></td>
                      <td><?php echo $row['po']; ?></td>
                      <td><?php echo $row['no_girocek']; ?></td>
                      <td>Rp. <?php echo number_format ($row['renc_pembayaran'] ,2,',','.'); ?></td>
                      <td><?php echo $row['bulan_dibayar']; ?></td>
                      <td><?php echo $row['keterangan']; ?></td>
                      
                       <?php if($this->session->userdata('koderole')!='18'):?>
                      <td>
                        <a style="margin-bottom:5px" target='_blank' class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>laporandetailnotapdf/cetak_detailnota/<?php echo $row['id_nota']; ?>"><i class="glyphicon glyphicon-print"></i></a> </td>
                        <?php endif;?>
                        <?php if($this->session->userdata('koderole')=='18'):?>
                        <td>
                        <a style="margin-bottom:5px" target='_blank' class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>laporandetailnotapdf/cetak_detailnota/<?php echo $row['id_nota']; ?>"><i class="glyphicon glyphicon-print"></i></a> </td>
                          
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>detailnota/editdetail/<?php echo $row['id_nota']; ?>"><i class="glyphicon glyphicon-edit"></i></a> </td>
                      <td>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>detailnota/hapusdetail/<?php echo $row['id_nota']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php endif;?>
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
    