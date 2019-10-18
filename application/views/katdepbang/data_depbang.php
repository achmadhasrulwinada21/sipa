
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DATA PRODUK DEPBANG</b><br>
          <b>TANGGAL TRANSAKSI<span>&nbsp:&nbsp</span></b><b><?php echo $trdep->tanggal ?></b></span><br>
             <b>RUMAH SAKIT<span>&nbsp:&nbsp</span></b><b><?php echo $trdep->namars ?></b></span>
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
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='68' || $dara =='1'):?>
                  <form role="form" action="<?php echo base_url(); ?>Depbangtransaksi/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-12">
                                       
              <input type="hidden" class="form-control" value="<?php echo $trdep->tanggal ?>" id="" name="tanggal_tr"> 
               <input type="hidden" class="form-control" value="<?php echo $trdep->kode_trans ?>" id="" name="kode_trans"> 
               <input type="hidden" class="form-control" value="<?php echo $trdep->koders ?>" id="" name="koders"> 
<div class="col-lg-4">
           <div class="form-group">
                      <label for="foto">PERUSAHAAN</label>
                       <br> <select id="koper" name="koper" class="form-control">
                          <option value="-">PILIH PERUSAHAAN</option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
              </select><br><br>

                 <div class="form-group">
                      <label for="foto">Sub Jenis Pekerjaan</label>
					             <br> <select  name="kode_sub_jenis_pekerjaan" class="chosen form-control" required>
                          <option value="" required>PILIH Sub Jenis Pekerjaan</option>
                          <?php foreach($kode_pekerjaan as $row) { ?>
                              <option value="<?php echo $row['kode_sub_jenis_pekerjaan'] ?>" required><?php echo $row['nm_sub_jenis_pekerjaan'] ?></option>
                          <?php } ?>
						  </select><br><br>

              <div class="form-group">
                      <label for="foto">Lokasi</label>
                       <br> <select  name="kodelokasi" class="chosen form-control" required>
                          <option value="" required>PILIH Lokasi</option>
                          <?php foreach($lok as $row) { ?>
                              <option value="<?php echo $row['kodelokasi'] ?>" required><?php echo $row['deskripsi'] ?></option>
                          <?php } ?>
              </select><br><br>

          <div class="col-lg-6">
             <div class="form-group" hidden>
                      <label for="">TIPE PRODUK</label>
                        <select name="tipe_produk" class="form-control" required>
                          <option value="TP004">--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_produk as $row) { ?>
                              <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>      
                    
        </div></div>
        <div style="text-align:left;margin-left:10%" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
           <a href="<?php echo base_url(); ?>Depbangtransaksi" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
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
                      <th style="vertical-align: middle;text-align: center;">Perusahaan</th>
                      <th style="vertical-align: middle;text-align: center;">Bidang Pekerjaan</th>
                       <th style="vertical-align: middle;text-align: center;">Sub Jenis Pekerjaan</th>
                        <th style="vertical-align: middle;text-align: center;">Lokasi</th>
                      <th style="vertical-align: middle;text-align: center;">Maincon</th>
                      <th style="vertical-align: middle;text-align: center;">Subcon</th>
                      <th style="vertical-align: middle;text-align: center;">Konsultan</th>
                       <th style="vertical-align: middle;text-align: center;">Keterangan</th>
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
                       <td><?php echo $row['nm_perusahaan']; ?></td>
                       <td><?php echo $row['bidang_pekerjaan']; ?></td>
                        <td><?php echo $row['nm_sub_jenis_pekerjaan']; ?></td>
                         <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['maincon']; ?></td>
                       <td><?php echo $row['subcon']; ?></td>
                       <td><?php echo $row['konsultan']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>                 
					             <td style="vertical-align: middle;text-align: center;">
                          <?php
                    $kodedara=($this->session->userdata('koderole'));
                   if($kodedara !='10' and $kodedara !='60' ):?>
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/adddetail/<?php echo $row['idpr2']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
                         <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/hapusheaddepbang/<?php echo $row['idpr2']; ?>/<?php echo $row['kode_trans']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                         <?php endif;?> 
                         <a style="margin-bottom:3px;margin-left:3px;margin-right:3px;" data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-desktop">view</a>            
                  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editheaddepbang/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                     
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

<!------- modal -------->

<?php
      foreach($data_produko as $i){
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
              $this->load->model('depbangkat');
          if (isset($idpr2)) {
      
    $tampil= $this->depbangkat->Getprodukms2("where idpr2=$idpr2 order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produkos2',['idpr2'=>$idpr2])->row();

    }
        ?>

                <?php include 'tampil_detailall.php';?>

                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->



    