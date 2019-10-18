	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master Tipe Harga
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 		  
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Mastertpharga/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  <div class="col-lg-6">
				  <div class="box-body chat" id="chat-box">
                   <div class="form-group">
                      <label for="">Tipe Harga</label>
                        <input type="text" class="form-control"  value="" id="" name="tipe_harga" placeholder="Tipe Harga" autocomplete="off"required>   

                    </div>                  
                     
					
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('Mastertpharga')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
</div>
 <div class="box-body">
				
           <div class="box-body table-responsive">
              <table id="datatables4" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
					            <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Tipe Harga</th>
					            <th style="text-align:center;"> Aksi </th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_tpharga as $pkj) 
					{

					$no++ ?>
				<tr>         
					  <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['tipe_harga']); ?></td>
					  <td style="text-align:center;">
              <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $pkj['idtipeharga'];?>"><i class="glyphicon glyphicon-edit"></i></a>
              <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Mastertpharga/hapus_item/<?php echo $pkj['idtipeharga']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
					  
                      </td>
					<?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div>

<?php
        foreach($data_tpharga as $i){
         $idtipeharga = $i['idtipeharga'];
         $tipe_harga = $i['tipe_harga'];
                    
          ?>

 <div id="modal_edit<?php echo $idtipeharga;?>" class="modal fade">
   <div class="modal-dialog modal-md">
      <div class="modal-content"> 
   <div class="panel panel-danger">
        <div class="panel-heading">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">EDIT</h4></td>
       </div>
         <div class="modal-body">
                   <form role="form" action="<?php echo base_url(); ?>Mastertpharga/updateharga" method="POST" enctype="multipart/form-data">
                   <div class="col-md-12">
                     <div class="form-group">
                       <input type="hidden" class="form-control" value="<?php echo $idtipeharga; ?>" id="" name="idtipeharga">
                     </div>

                     <div class="form-group">
                       <label for="">TIPE HARGA</label>
                         <input type="text" class="form-control" value="<?php echo $tipe_harga; ?>" id="" name="tipe_harga" required>
                     </div>

                     </div>
                              <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
               </div>
                          </div>
                
               </form>   
 
               </div></div></div></div> 
             <?php } ?>



















