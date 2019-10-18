

<section class="content-header">
    <h1>
        Menu STPD
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
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('stpd/addstpd'); ?>" class="btn btn-primary btn-small" >
                            <i class="glyphicon glyphicon-plus"></i> Tambah Data STPD</a></h3>
                            <label calss='control-label' ></label>
                </div>

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
                       <th>KELOLA DATA</th>   
                       <th>HAPUS DATA</th>
                      <th>NAMA PEMOHON</th>
                      <th>HARI/TANGGAL</th>
                      <th>DEPARTEMEN</th>
                      <th>PERIHAL</th>
                      <th>LAMPIRAN</th>
                    
                    </tr>
                  </thead>
                  <tbody>




                    <?php $no=0; foreach($data_stpd as $row) { $no++ ?>


                    <tr>
                      <td><?php echo $no; ?></td>
                         <td>
                      <?php if($row['namastatus'] == "Disetujui"){ echo '<span class="label label-success">Disetujui</span>';?>
                      <?php } else if($row['namastatus'] == "Draft") { ?> 
                      <span class="label label-warning">Draft</span>
                      <?php }else if($row['namastatus'] == "Direvisi"){?>

                      <span class="label label-warning">Direvisi</span><?php 
                      }else{ 

                     echo '<span class="label label-danger">Ditolak</span>';

                      } ?>

                      </td>  

                     <td>

                  
                     <!--  <button  class="btn btn-info btn-sm glyphicon glyphicon-edit"  >EDIT</button> -->
                  

                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit"  data-toggle="tooltip" title="Edit"  href="<?php echo base_url(); ?>stpd/editstpd/<?php echo $row['id_stpd']; ?>" hidden=''></a></td>

                      <td><a href="<?php echo base_url(); ?>stpd/hapususer/<?php echo $row['id_stpd']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"  onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>


                    <?php
                    $tanggal = new DateTime($row['haritanggal']);

                    ?>

  
                      <td><?php echo $row['daripemohon']; ?></td>
                      <td><?php echo $tanggal->format('d-M-Y');?></td>
                      <td><?php echo $row['departemen']?></td>
                      <td><?php echo $row['perihal']; ?></td>
                      <td><?php echo $row['lampiran']; ?></td>
                     
                  
                    

                   





  </tr>  


                   
               
                    <?php } ?>
                  </tbody>
                </table>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>



