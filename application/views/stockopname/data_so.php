<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <?php $this->load->view('inc/head'); ?>
  
</head>
<body class="skin-blue">
  <!-- wrapper di bawah footer -->
  <div class="wrapper">

    <?php $this->load->view('inc/head2'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php $this->load->view('inc/sidebar'); ?>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>DATA SURAT PERMOHONAN FIXED ASSET</b>
        </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
               <?php if($this->session->userdata('roles')=='11'):?>
              <a style="margin-bottom:3px"href="<?php echo base_url(); ?>stockopname/addstockopname" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
                <?php endif;?>

                <?php if($this->session->userdata('roles')=='16'):?>
              <a style="margin-bottom:3px"href="<?php echo base_url(); ?>stockopname/addstockopname" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
                <?php endif;?>

              <button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span> LIHAT & CETAK SURAT</button>

              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TANGGAL</th>
                      <th>NO. SURAT</th>
                      <th>LAMPIRAN</th>
                      <th>PERIHAL</th>
                      <th>TANGGAL DATA ASSET</th>
                      <!-- <th>DATE LOCK 1</th>
                      <th>DATE LOCK 2</th>
                      <th>DATE LOCK 3</th>
                      <th>DATE LOCK 4</th> -->
                      <th>CATATAN</th>
                      <th>APPROVAL</th>
                       <?php if($this->session->userdata('roles')=='10'):?>
                      <th>AKSI</th>
                      <?php endif;?>
                      <?php if($this->session->userdata('roles')=='11'):?>
                      <th>AKSI</th>
                      <?php endif;?>
                      <?php if($this->session->userdata('roles')=='16'):?>
                      <th>AKSI</th>
                      <?php endif;?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_so as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['no_sp']; ?></td>
                      <td><?php echo $row['lampiran']; ?></td>
                      <td><?php echo $row['perihal']; ?></td>
                      <td><?php echo $row['tgl_dataaset']; ?></td>
                      <!-- <td><?php echo $row['tgl_stockopname']; ?></td>
                      <td><?php echo $row['tgl_analisanilai']; ?></td>
                      <td><?php echo $row['tgl_hasil']; ?></td>
                      <td><?php echo $row['tgl_koreksi']; ?></td> -->
                      <td><?php echo $row['catatan']; ?></td>

                      <td>
                <?php 
            if($row['approval'] == "Approve") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui</p>';
            }elseif($row['approval'] == "Not Approved"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
            }elseif($row['approval'] == "Revisi"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi</p>';
            }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Menunggu Disetujui</p>';
            }
            ?>
            </td>
                      <td>
                      <!-- <a style="margin-bottom:4px; background-color:green " target='_blank' class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>lampiranviewfixedasset/view_stockopname_fixedasset/<?php echo $row['no_sp']; ?>"><i class="fa fa-desktop"></i></a> -->
                      <?php if($this->session->userdata('roles')=='10'):?>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>stockopname/editstockopname/<?php echo $row['id_sp']; ?>"><i class="fa fa-edit"></i></a>
                      <?php endif;?>
                      <?php if($this->session->userdata('roles')=='11'):?>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>stockopname/editstockopname/<?php echo $row['id_sp']; ?>"><i class="fa fa-edit"></i></a>
                      <?php endif;?>
                      <?php if($this->session->userdata('roles')=='16'):?>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>stockopname/editstockopname/<?php echo $row['id_sp']; ?>"><i class="fa fa-edit"></i></a>
                      <?php endif;?>
                       <?php if($this->session->userdata('roles')=='11'):?>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>stockopname/hapusstockopname/<?php echo $row['id_sp']; ?>"><i class="fa fa-trash"></i></a>
                      <?php endif;?>
                        <?php if($this->session->userdata('roles')=='16'):?>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>stockopname/hapusstockopname/<?php echo $row['id_sp']; ?>"><i class="fa fa-trash"></i></a>
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
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
  
<!-- modal -->
     <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">LIHAT & CETAK SURAT</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>laporanfixedasset/cetak_stockopname_fixedasset" target='blank' method="POST">
        <div class="form-group"> 
             No Surat :<br>
         <select name="no_sp" class="form-control">
       <option> Pilih No Surat : </option>
     <?php foreach($no_sp as $nb) { ?>
            <option value=<?php echo $nb['no_sp'] ; ?>>
             <?php echo $nb['no_sp']?></option>
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
  
