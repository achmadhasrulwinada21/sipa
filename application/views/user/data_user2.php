

<section class="content-header">
    <h1>
        Menu User
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu User</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                    <!--<h3 class='box-title'><a href="<?php echo base_url('user/add'); ?>" class="btn btn-primary btn-small">
                            <i class="glyphicon glyphicon-plus"></i> Tambah Data</a></h3>-->
                            <label calss='control-label' ></label>
                </div>

                 <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body table-responsive">
                  <!--   <table id="example1" class="table table-bordered table-striped" cellspacing="0" width="100%"> -->
                     <table id="tb-datatables" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>User Name</th>
                                <th>Cabang RS</th>
                                <th>Status User</th>
                                <th>Role</th> 
                                <th>Tanggal Dibuat</th>   
                                <th>Tanggal Diupdate</th>  
                                <th>Foto Profil</th>                                                 
                                <th>Edit</th>   
                               <!--  <th>Delete</th>  -->                                
                            </tr>
                        </thead>
                       <?php
             $no=1;
                       function chek($id) {
                            $CI = get_instance();
                            $result = $CI->db->get_where('', array('u_id' => $id))->row_array();
                            return $result['nama_menu'];
                        }
             foreach ($data_user as $r){    
                                                         
               echo"
                 <tr>
                 <td>$no</td>

                 <td>".$r->nama."</td>
                 <td>".$r->u_name."</td>
                 <td>".$r->namars."</td>
                 <td>".$r->nama_status."</td>
                 <td>".$r->nama_role."</td>
                 <td>".$r->createddate."</td>
                 <td>".$r->updateddate."</td>
                 <td><img style='width:80px;height:80px;' src='../assets/upload/$r->fotoprofil'/></td>
            
                                       
                                       
                 <td>" . anchor('user/edituser2/' . $r->u_id, '<i class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i>') . "</td>
                 ";
               $no++;
             }
             ?>
                    </Table> 

			<!-- <td>" . anchor('user/hapususer/' . $r->u_id, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
                              --> 
			</tr>




                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
