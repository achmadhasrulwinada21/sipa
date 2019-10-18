
       <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DATA TIPE PRODUK</b>
        </h4>
        
        </section>

         <div class="box">
          <br>
           <div class="item">
            <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title" style="color:green;">TAMBAH DATA TIPE PRODUK</h3>
              </div>
                  <form role="form" action="<?php echo base_url(); ?>tipeproduk/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">ID TIPE PRODUK</label>
                        <input type="text" class="form-control" value="<?php echo $id_tipe_produk; ?>" id="" name="id_tipe_produk" required readonly>
                    </div>

                    <div class="form-group">
                      <label for="">TIPE PRODUK</label>
                        <input type="text" class="form-control" value="" id="" name="tipe_produk" placeholder="Isi Tipe Produk">                        
                    </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?php echo base_url(); ?>tipeproduk" class="btn btn-danger">Kembali</a>
                </div><!-- /.col -->
                  
                </div><!-- /.item -->

               </form>
              </div><!-- /.chat -->
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
             <!--  <a style="margin-bottom:3px" href="<?php //echo base_url(); ?>tipeproduk" class="btn btn-info no-radius dropdown-toggle"><i class="fa fa-plus"></i>TAMBAH</a> -->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                 <div class="box-title">


                  
                </div><!-- /.box-title -->
            <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr class="danger">
                      <th>NO</th>
                      <th>ID TIPE PRODUK</th>
                      <th>TIPE PRODUK</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($datatipe_produk as $row) { $no++ ?>
                    <tr class="success">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['id_tipe_produk']; ?></td>
                      <td><?php echo $row['tipe_produk']; ?></td>
                      <td>
                      <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idpro'];?>"><i class="glyphicon glyphicon-edit"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>tipeproduk/hapusproduk/<?php echo $row['idpro']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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


<?php
        foreach($datatipe_produk as $i){
        $idpro = $i['idpro'];
        $id_tipe_produk = $i['id_tipe_produk'];
        $tipe_produk = $i['tipe_produk'];
              
         ?>
<div id="modal_edit<?php echo $idpro;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>tipeproduk/updateproduk" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idpro; ?>" id="" name="idpro">
                    </div>

                    <div class="form-group">
                      <label for="">ID TIPE PRODUK</label>
                        <input type="text" class="form-control" value="<?php echo $id_tipe_produk; ?>" id="" name="id_tipe_produk" required readonly>
                    </div>

                    <div class="form-group">
                      <label for="">TIPE PRODUK</label>
                        <input type="text" class="form-control" value="<?php echo $tipe_produk; ?>" id="" name="tipe_produk" > 
                      </div>  

                    </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>tipeproduk" class="btn btn-danger btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->
 