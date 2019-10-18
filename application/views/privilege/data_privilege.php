<section class="content-header">
    <h1>
        Hak Akses Aplikasi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Hak Akses Aplikasi</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <h3 class='box-title'><a href="<?php echo base_url('privilege/add'); ?>" class="btn btn-primary btn-small">
                            <i class="glyphicon glyphicon-plus"></i> Tambah Data Akses Aplikasi</a></h3>
                            <label calss='control-label' ></label>
                </div>
                  <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>

                <div class="box-body table-responsive">
                    <table id="tb-datatables" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Menu</th>
                                <th>Role</th>
                                <th>Link</th>
                                 <th>Kategori Menu</th>     
                                <th>View</th>    
                                <th>Add</th>                                                      
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Appproval</th>   
                                <th>Edit</th>   
                                <th>Delete</th>     

                            </tr>
                        </thead>
                      

                       <?php $no=1; 


                    
                       foreach ($record as $r){ ?>   
                     
                            


                        <tr>

                            <td><?php echo $no ?></td>
                            <td><?php echo $r['nmmenu']; ?></td>
                            <td><?php echo $r['nama_role']; ?></td>
                            <td><?php echo $r['link']; ?></td>
                            <td><?php echo $r['kategorimenu']; ?></td>

                            <td><input type="checkbox" disabled="" <?php echo $c1= $r['view']; if($c1=='t') echo " Checked "?>></td>
                            <td><input type="checkbox" disabled="" <?php echo $c1= $r['add']; if($c1=='t') echo " Checked "?>></td>
                            <td><input type="checkbox" disabled="" <?php echo $c1= $r['edit']; if($c1=='t') echo " Checked "?>></td>
                            <td><input type="checkbox" disabled="" <?php echo $c1= $r['delete']; if($c1=='t') echo " Checked "?>></td>
                            <td><input type="checkbox" disabled="" <?php echo $c1= $r['approval']; if($c1=='t') echo " Checked "?>></td>


                     <td><a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>privilege/edit/<?php echo $r['id_privilege']; ?>"></a></td>

                      <td><a href="<?php echo base_url(); ?>privilege/delete/<?php echo $r['id_privilege']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>




                        </tr>




                                                  
          


             

               
            <?php   $no++; }
             ?>


                    </table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
