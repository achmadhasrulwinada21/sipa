 
<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          
            <div class="box">
              
              <div class="box-header">
                <i  class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <p style="margin-left: 1%;"><b>tanggal transaksi : <?php echo $prod->tanggal ?></b></p>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko2/savedata_compare" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              <div class="col-lg-12">
                <input type="hidden" class="form-control" value="<?php echo $prod->idtrcom ?>" id="" name="kode_tr" required readonly>
                <!--  <input type="hidden" class="form-control" value="<?php// echo $prod->tanggal_obat ?>" id="" name="tgl_obat" required readonly> -->
                <div class="col-lg-6">
                   <div class="form-group">
                      <label for="foto">NAMA PRINSIPAL</label>
                       <br>
                        <select id="idpr2" name="idpr2" class="chosen form-control" required>
                          <option value="-">pilih prinsipal</option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option value="<?php echo $row['idpr2'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
              </select>
               <input type="hidden" class="form-control" value="-" id="" name="nm_perusahaan" required readonly>
              <input type="hidden" class="form-control" value="-" id="" name="koper" required readonly>
            </div>
          </div>
           <div class="col-lg-6">
                <div class="form-group">
                  <label for="foto">NAMA DISTRIBUTOR</label>
               <input type="text" class="form-control" value="-" id="" name="kodis" required readonly>
             </div>
           </div>

           <div class="col-lg-12">
             <div class="col-lg-3">
               <div class="form-group">
                 <label for="foto">HARGA < = E-KAT </label>
              <input type="text" class="form-control" value="-" id="" name="harga_kecil_e_cat" required readonly> 
              </div>  
            </div>
              <div class="col-lg-3">
              <div class="form-group">
                 <label for="foto">HARGA = E-KAT (Tayang LKPP)</label>
              <input type="text" class="form-control" value="-" id="" name="harga_sama_e_cat" required readonly> 
              </div>  
               </div>
              <div class="col-lg-3">
               <div class="form-group">
                 <label for="foto">HARGA < 10 % E Kat</label>
              <input type="text" class="form-control" value="-" id="" name="harga_dibawahten" required readonly> 
              </div>  
               </div>
              <div class="col-lg-3">
               <div class="form-group">
                 <label for="foto">HARGA > 10 % E Kat</label>
              <input type="text" class="form-control" value="-" id="" name="harga_diataten" required readonly> 
              </div>  </div>
               <div class="col-lg-12">
               <div class="col-lg-4">
               <div class="form-group">
                <label for="foto">FOI</label>
              <input type="text" class="form-control" value="-" id="" name="foi" required> 
              </div>  </div>
               <div class="col-lg-4">
               <div class="form-group">
                 <label for="foto">MOU JKN</label>
              <input type="text" class="form-control" value="-" id="" name="mou_jkn" required> 
              </div>  </div>
               <div class="col-lg-4">
               <div class="form-group">
                 <label for="foto">PKS RENEWAL</label>
              <input type="text" class="form-control" value="-" id="" name="pks_renewal" required> 
              </div>  </div></div>
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>produko2/aprove_detail/<?php echo $prod->idtrcom ?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
                <!-- /.col -->
               </form>
            
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
                     
          
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="datatables5" class="table table-bordered table-striped">
                  <thead>
                    <tr class="danger">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">Nama Prinsipal</th>
                      <th  style="vertical-align: middle;text-align: center;">Distributor</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA < = E-KAT</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA = E-KAT (Tayang LKPP)</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA < 10 % E Kat</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA > 10 % E Kat</th>
                      <th  style="vertical-align: middle;text-align: center;">FOI</th>
                      <th  style="vertical-align: middle;text-align: center;">MOU JKN</th>
                      <th  style="vertical-align: middle;text-align: center;">PKS RENEWAL</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                    <?php   
                    $no=0;
                 foreach($data_aprove as $row) {  
                      $no++;
                      ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td> 
                      <td style="text-align: center;"><?php echo $row['nm_perusahaan'];?></td>
                      <td style="text-align: center;"><?php echo $row['kodis']; ?></td> 
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['harga_kecil_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit2<?php echo $row['idpr2']; ?>"><?php echo $row['harga_sama_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit3<?php echo $row['idpr2']; ?>"><?php echo $row['harga_dibawahten']; ?></a></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit4<?php echo $row['idpr2']; ?>"><?php echo $row['harga_diataten']; ?></a></td>
                       <td style="text-align: center;"><?php echo $row['foi']; ?></td> 
                      <td style="text-align: center;"><?php echo $row['mou_jkn']; ?></td>
                       <td style="text-align: center;"><?php echo $row['pks_renewal']; ?></td>
                         <td style="text-align: center;">                                     
                       <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko2/hapusdetailaprove/<?php echo $row['idcompare2'];?>/<?php echo  $row['kode_tr'];?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                      
                    </tr>
                        <?php } ?>   
                  </tbody>
                
                </table>
                   
                              
               </div>
               </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

			  <?php
      foreach($compare as $i){
       $idpr2 = $i['idpr2'];
       $kodis = $i['kodis'];
       $nm_perusahaan = $i['nm_perusahaan'];
       $harga = $i['harga'];
       $tanggal = $i['tanggal'];           
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
              $this->load->model('produkom2');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukm("where idpr2=$idpr2 AND tipe_harga='Jumlah < = E-Cat'  order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->kodis ?> </td></tr>
                                
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
             
                        
                       <td><?php echo $tr['nama_produk']; ?></td>
            
                     <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($compare as $i){
       $idpr2 = $i['idpr2'];
       $kodis = $i['kodis'];
       $nm_perusahaan = $i['nm_perusahaan'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit2<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom2');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukm("where idpr2=$idpr2 AND tipe_harga='Jumlah = E-Cat' order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->kodis ?> </td></tr>
                     
                     
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                   <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                     <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_produk']; ?></td>
            
             <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($compare as $i){
       $idpr2 = $i['idpr2'];
       $kodis = $i['kodis'];
       $nm_perusahaan = $i['nm_perusahaan'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit3<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom2');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukm("where idpr2=$idpr2 AND tipe_harga='Jumlah < 10 % E-Cat' order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?> </td></tr>
                     
                     
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                   <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                         <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_produk']; ?></td>
             <
             <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->
 
 <?php
      foreach($compare as $i){
       $idpr2 = $i['idpr2'];
       $kodis = $i['kodis'];
       $nm_perusahaan = $i['nm_perusahaan'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit4<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom2');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukm("where idpr2=$idpr2 AND tipe_harga='Jumlah > 10 % E-Cat' order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->kodis ?> </td></tr>
                     
                                      
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table class="table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                  <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                    
                  </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="text-align:center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_produk']; ?></td>
            
            <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->

