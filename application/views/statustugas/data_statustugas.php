

<section class="content-header">
    <h1>
        Data Status Tugas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu Status Tugas</li>
    </ol>
</section>
<section class="content">
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>statustugas/addstatustugas" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA STATUS TUGAS </a> 
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
                      <th>STATUS DOKUMEN</th>
                      <th>CABANG RS</th>
                       <th>KELOLA DATA</th>   
                       <th>HAPUS DATA</th>
                        <th>NO SURAT</th>
                        <th>NAMA KEPALA DEPARTEMEN</th>
                        <th>JABATAN KEPALA DEPARTEMEN</th>
                        <th>NAMA PETUGAS</th>
                        <th>JABATAN PETUGAS</th>
                        <th>WAKTU TUGAS</th>
                        <th>TUJUAN TEMPAT</th>
                        <th>DASAR PENUGASAN</th>
                        <th>KEGIATAN PENUGASAN</th>
                        <th>MENGETAHUI SEKRETARIS DIREKTUR REGIONAL</th>
                        <th>FOTO</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_statustugas as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                        <td>
                <?php 
            if($row['status'] == "Approve") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui</p>';
            }elseif($row['status'] == "Not Approved"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
            }elseif($row['status'] == "Revisi"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi</p>';
            }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Draf</p>';
            }
            ?>
            </td> 
            <td><?php echo $row['cbgrs']; ?></td>

                     <td>                  
                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit"  data-toggle="tooltip" title="Edit"  href="<?php echo base_url(); ?>statustugas/editstatustugas/<?php echo $row['id_tugas']; ?>" hidden=''></a></td>

                      <td><a href="<?php echo base_url(); ?>statustugas/hapusstatustugas/<?php echo $row['id_tugas']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"  onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>

                      
                      <td><?php echo $row['nosurat']; ?></td>
                      <td><?php echo $row['namakadep']?></td>
                      <td><?php echo $row['jabatankadep']; ?></td>
                      <td><?php echo $row['namayangditugaskan']; ?></td>
                      <td><?php echo $row['jabatanyangtugas']?></td>
                      <td><?php echo $row['waktutugas']; ?></td>
                      <td><?php echo $row['tujuantempat']; ?></td>  
                      <td><?php echo $row['dasarpenugasan']?></td>
                      <td><?php echo $row['kegiatanpenugasan']; ?></td>
                      <td><?php echo $row['mengetahuisekretarisdirekturregional']; ?></td>
                      <td>
                      <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo $row['foto']; ?>" class="img-circl" alt="User Image" />
                      </td>                  
                    </tr>                     
                    <?php } ?>
                  </tbody>
                </table>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>



