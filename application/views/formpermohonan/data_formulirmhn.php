 
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>DATA FORMULIR PERMOHONAN</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!--MENU ATAS-->  
          <div class="row">
          <div class="col-md-12 clearfix">
            <ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
              <li class="active">
              <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
              <a href="<?php echo base_url(); ?>Konfirmpeserta">Data Kehadiran Peserta</a></li>
              
              <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
              <a href="<?php echo base_url(); ?>dafdir">Data Memo Konsumsi</a></li>
              
              <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
              <a href="<?php echo base_url(); ?>memodafdir">Surat Memorandum Acara</a></li>

              <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
              <a href="<?php echo base_url(); ?>formpermohonan">Surat Formulir Permohonan</a></li>


                </ul>             
          </div>
          </div>
          <!--END MENU ATAS-->


          <!-- Small boxes (Stat box) -->
          <!-- <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> </a>  -->

              <br>
              <br>
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
                      <th>PERIHAL</th>
                      <th>BAGIAN</th>
                      <th>PEMBAYARAN</th>
                      <th>JUMLAH</th>
                      <th>TANGGAL PEMBAYARAN</th>
                      <th>TANGGAL FORMULIR</th>
                      <th>PEMOHON</th>
                      <th>MENGETAHUI</th>
                      <th>MENYETUJUI</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_formulirmhn as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['perihal_formulir']; ?></td>
                      <td><?php echo $row['bagian']; ?></td>
                      <td><?php echo $row['untuk_byr']; ?></td>
                      <td><?php echo $row['jumlah']; ?></td>
                      <td><?php echo $row['tgl_byr']; ?></td>
                      <td><?php echo $row['tgl_formulir']; ?></td>
                      <td><?php echo $row['pemohon']; ?></td>
                      <td><?php echo $row['mengetahui']; ?></td>
                      <td><?php echo $row['menyetujui']; ?></td>
 
                      

                      <td>
                      <?php if($row['menyetujui'] == "Yulisar Khiat"){ echo '<span class="label label-success">Disetujui</span>';?>
                      
                      <?php
                      }else{

                     echo '<span class="label label-danger">Menunggu Persetujuan</span>';

                      } ?>
                       </td>
                                           
                      <td>
                      <a style="margin-bottom:5px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>formpermohonan/editformulirmhn/<?php echo $row['id_form_mhn']; ?>"><i class="fa fa-edit"></i></a>
					           <a target="blank" style="margin-bottom:5px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>LaporanPermohonan/cetak_permohonantunai/<?php echo $row['id_form_mhn']; ?>"><i class="fa fa-print"></i></a>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          
          <!-- </div> --><!-- /.col -->
       <!--  </div> --><!-- /.row -->
       
        <!-- Main row -->
       
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
  
    