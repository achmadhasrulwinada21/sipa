
            




<section class="content-header">
    <h1>
        Menu BPD
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu STPD</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            

                 <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body table-responsive">
                  <!--   <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%"> -->
                      <table id="tb-datatables" class="table table-bordered table-striped">


  <thead>
                    <tr>
                      <th>NO</th>
                      <th>STATUS DOKUMEN</th>
                      <th>NAMA PEMOHON</th>
                      <th>JABATAN</th>
                      <th>NAMA YANG DITUGASKAN</th>
                      <th>TUJUAN/TEMPAT</th>
                      <th>WAKTU TUGAS</th>
                      <th>DASAR PENUGASAN</th>
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_bpd as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                             <td>
                      <?php if($row['nama_statusdoc'] == "Disetujui"){ echo '<span class="label label-success">Disetujui</span>';?>
                      <?php } else if($row['nama_statusdoc'] == "Draft") { ?> 
                      <span class="label label-warning">Draft</span>
                      <?php }else if($row['nama_statusdoc'] == "Direvisi"){?>

                      <span class="label label-warning">Direvisi</span><?php 
                      }else{ 

                     echo '<span class="label label-danger">Ditolak</span>';

                      } ?>

                      </td> 
                      <td><?php echo $row['namakadep']; ?></td>
                      <td><?php echo $row['jabatankadep']; ?></td>
                      <td><?php echo $row['namayangditugaskan']; ?></td>
                      <td><?php echo $row['tujuantempat']; ?></td>
                      <td><?php echo $row['waktutugas']; ?></td>
                      <td><?php echo $row['dasarpenugasan']; ?></td>
                      <td>
               


                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>bpd/editbpd/<?php echo $row['id_bpd']; ?>"></a></td>

                      <td><a href="<?php echo base_url(); ?>bpd/hapususer/<?php echo $row['id_bpd']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>


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



