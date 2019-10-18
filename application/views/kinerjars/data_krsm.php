

      <section class="content-header">
        <h1>
          <b>DATA KINERJA RUMAH SAKIT BAGIAN MANAGER   </b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>kinerjarusak/addkrs" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH KINERJA </a> -->
              <!--  <form role="form" action="<?php echo base_url(); ?>laporan_kinerjahermina/cetak_kinerja" method="POST" enctype="multipart/form-data"> 
				
				<div class="form-group">
					<div class="input-group col-sm-5" >
					
						<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
							<input type="text" autocomplete="off" id="tanggal" name="inputtanggal" class="form-control" >
						<span class="input-group-btn">

					<button formtarget="_blank" type="submit" class="btn btn-primary btn-block btn-flat" >Print PDF</button> 

			</form>  -->
			 </div>  
			  
			  <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="tb-datatable" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <th>NO URUT</th>
                      <th>PERIODE</th>
                      <th>NAMA RUMAH SAKIT</th>
                      <th>URAIAN</th>
                      <th>DATA REAL</th>
                      <th>DATA TARGET</th>
                     
                      <th>AKSI</th>
                      
                     
                      
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_krsm as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                       <td><?php echo $row['nama_rs']; ?></td>
                       <td><?php echo $row['uraian_rsk']; ?></td>
                       <td <?php 
            if($row['real_rsk'] < $row['target_rsk'] ) {
              echo '<p style="background-color:Firebrick;color:black;"></p>';
            }elseif($row['real_rsk'] > $row['target_rsk']){
              echo '<p style="background-color:skyblue;color:black;"></p>';
            }else{
              echo '<p style="background-color:white;color:black;"></p>';
            } ?> <?php echo $row['real_rsk']; ?></td>


                     <td><?php echo $row['target_rsk']; ?></td> 

                      
                       
                     
                     <td>
                     <a class="btn btn-warning btn-sm" data-toggle="modal"  data-target="#modal_edit<?php echo $row['id_krs'];?>"><i class="glyphicon glyphicon-edit"></i></a> 
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>kinerjarusak/hapuskrs/<?php echo $row['id_krs']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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

        <?php
        foreach($data_krsm as $i){
        $id_krs = $i['id_krs'];
        $uraian_rsk = $i['uraian_rsk'];
        $real_rsk = $i['real_rsk'];
        $target_rsk = $i['target_rsk'];
        
        
         ?>
        <div id="modal_edit<?php echo $id_krs;?>" class="modal fade">
        <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
        <div class="panel panel-primary">
        <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
        </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>kinerjarusak/updatekrs" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $id_krs; ?>" id="" name="id_krs">
                    </div>

                    <div class="form-group">
                      <label for="">URAIAN</label>
                        <input type="text" class="form-control" value="<?php echo $uraian_rsk; ?>" id="" name="uraian_rsk" readonly>
                    </div>

                    <div class="form-group">
                      <label for="">DATA REAL</label>
                        <input type="text" class="form-control" value="<?php echo $real_rsk; ?>" id="" name="real_rsk" readonly> 
                      </div>         
                   

                    <div class="form-group">
                      <label for="">DATA TARGET</label>
                        <input type="text" class="form-control" value="<?php echo $target_rsk; ?>" id="" name="target_rsk" required > 
                      </div>
                      </div>         
                    
                                                                     
                   
                           </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>kinerjarusak" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <footer style="text-align: center;">
      
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
    </footer>
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
   

</html>