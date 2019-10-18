	<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DATA PRODUK OBAT</b><br>
            <b>TANGGAL TRANSAKSI<span>&nbsp:&nbsp</span></b><b><?php echo $tr->tanggal ?></b></span>
        </h4>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                   <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                  <form role="form" action="<?php echo base_url(); ?>Farmasitransaksi/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-12">
              <input type="hidden" class="form-control" value="<?php echo $tr->idtrcom ?>" id="" name="kode_th">                              
              <input type="hidden" class="form-control" value="<?php echo $tr->tanggal ?>" id="" name="tanggal_tr"> 

            <div class="col-lg-6">
                 <div class="form-group">
                      <label for="foto">NAMA PRINSIPAL</label>
					             <br> <select id="koper" name="koper" class="form-control" required>
                          <option value="" required>pilih prinsipal</option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>" required><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
						  </select><br><br>
               
                                     
                      <label for="">DISTRIBUTOR</label>
                        <input type="text" class="form-control" value="" id="" name="kodis" required>
            </div>  </div>      
               <div class="col-lg-6">
             <div class="form-group" hidden>
                      <label for="">TIPE PRODUK</label>
                        <select name="tipe_produk" class="form-control" required>
                          <option value="TP001">--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_produk as $row) { ?>
                              <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>      
                    
        </div></div>
        <div style="text-align:left;margin-left:10%" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
           <a href="<?php echo base_url(); ?>Farmasitransaksi" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div></div></section><br><br>
<?php endif;?> <section>
            <div class="col-md-12">
                      <br>
              
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRINSIPAL</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA DISTRIBUTOR</th>
                      <th style="vertical-align: middle;text-align: center;">FOI</th>
                      <th style="vertical-align: middle;text-align: center;">MOU JKN</th>
                      <th style="vertical-align: middle;text-align: center;">PKS RENEWAL</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>                           
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_produko as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                     <!--  <td><a data-toggle="modal" href="#modal_edit<?php// echo $row['idpr']; ?>"><?php //echo $row['prid']; ?></a></td> -->
                       <td><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['nm_perusahaan']; ?></a></td>
                       <td><?php echo $row['kodis']; ?></td>
                        <td><?php echo $row['foi']; ?></td>
                       <td><?php echo $row['mou']; ?></td>
                       <td><?php echo $row['pks']; ?></td>
                                         
					             <td style="vertical-align: middle;text-align: center;">
                          <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/adddetail/<?php echo $row['idpr2']; ?>/<?php echo $row['koper']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
                         <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/hapusheadfarmasi/<?php echo $row['idpr2']; ?>/<?php echo $row['kode_th']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                         <?php endif;?> 
                       <!--  <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idtrfarmasi']; ?>/<?php echo $row['pabrik_id']; ?>"><i class="fa fa-print">&nbspPRINT</i></a>  -->                     
                  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/editheadfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                     
                     </td>
                    
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div>
            </div>
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

<!------- modal -------->

<?php
      foreach($data_prod as $i){
       $idpr2 = $i['idpr2'];     
         ?>
<div id="modal_edit<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('farmasikat');
          if (isset($idpr2)) {
      
    $tampil= $this->farmasikat->Getprodukm("where idpr2=$idpr2 order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

                <?php include 'tampil_detailall.php';?>

                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->



    
