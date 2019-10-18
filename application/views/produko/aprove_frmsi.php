<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>produko">Data Produk</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>produko/aprove">Perbandingan Produk Ecatalog</a></li>
   
  </ul>
	 <section class="content-header">
    <h1 style="text-align:center;" >
        PERBANDINGAN HARGA PRODUK
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 	<br>
              <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
                          <b style="margin-left:4%"><a href="<?php echo base_url(); ?>produko/aprove_kadep"><span class=" btn btn-warning">Disetujui Kadep</span></a></b>
                           <a href="<?php echo base_url(); ?>produko/aprove_selesai"><span class=" btn btn-success">Disetujui Direktur</span></a>

              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>produko/savedata_aprove" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">

           <!--  <input type="checkbox" id="obat" onclick="myFunction3()">OBAT<br>
            <input type="checkbox" id="alum" onclick="myFunction4()">ALUM<br>
            <input type="checkbox" id="alkes" onclick="myFunction5()">ALKES<br><br> -->
				  <div class="col-lg-6">
					        <div class="form-group">
                    <label>Tanggal Transaksi</label>
                       <input type="text" name="tanggal" value="" id="datepicker11" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div>                 
                   <!--  <div class="form-group">
                      <label>Tanggal Transaksi Obat</label>
                    <input type="text" name="tanggal_obat" value="" id="datepicker51" autocomplete="off" placeholder="masukan tanggal" class="form-control">
                    </div>    -->                                   
					
					</div></div></div>
				</div>
        <div style="text-align:left;margin-left:4%;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            
        </div>
    </form>
</div>
<?php endif;?> 
 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="datatables9" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
					     <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_aprove as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
           
             <td style="text-align:center;"> 
                 <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='15' ):?>
              <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko/aprove_detail/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
              <?php endif;?> 
                <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='15' or $kode =='1' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>produko/editaprove/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-edit">&nbspedit</i></a> 
                        <?php endif;?>
                <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>LaporanCompare/cetak_compare_obat2/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div><br><br><p style="margin-left: 40%;"><b>PERBANDINGAN PRODUK SEMUA DATA</b></p>
<div class="table-responsive box-body">
                             
                  <table id="datatables4" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Nama Prinsipal</th>
                      <th style="vertical-align: middle;text-align: center;">Kode Distributor</th>
                      <th style="vertical-align: middle;text-align: center;"> < = E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> = E-Cat</th>
            <th style="vertical-align: middle;text-align: center;"> < 10% E-Cat</th>
            <th style="vertical-align: middle;text-align: center;"> > 10% E-Cat</th>
                                                         
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_compare as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td><?php echo $row['nama_pt']; ?></td>
                      <td style="text-align:left;"><?php echo $row['s_kode']; ?></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr']; ?>"><?php echo $row['harga_kecil_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit2<?php echo $row['idpr']; ?>"><?php echo $row['harga_sama_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit3<?php echo $row['idpr']; ?>"><?php echo $row['harga_dibawahten']; ?></a></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit4<?php echo $row['idpr']; ?>"><?php echo $row['harga_diataten']; ?></a></td>
                              
                    </tr>
                              <?php
                    
                             }?>
                    </tbody>
           </table>
                  </div><br><br>    


<?php
      foreach($compare as $i){
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit<?php echo $idpr;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom');
          if (isset($idpr)) {
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah < = E-Cat'  order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                                
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table   class="table table-bordered table-striped">
                  <tr class="danger">
                    <th style="text-align:center;">No</th>
                    <th style="text-align:left;">Nama Produk</th>
                    <th style="text-align:center;">harga</th>
                  </tr>
                   
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="text-align:center;" ><?php echo $no; ?></td>
                       <td><?php echo $tr['produko']; ?></td>
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
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit2<?php echo $idpr;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom');
          if (isset($idpr)) {
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah = E-Cat' order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                <table  class="table table-bordered table-striped">
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
              
                       <td><?php echo $tr['produko']; ?></td>
            
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
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit3<?php echo $idpr;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom');
          if (isset($idpr)) {
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah < 10 % E-Cat'   order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     
                   
                    
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
              
                       <td><?php echo $tr['produko']; ?></td>
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
       $idpr = $i['idpr'];
       $s_kode = $i['s_kode'];
       $nama_pt = $i['nama_pt'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit4<?php echo $idpr;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('produkom');
          if (isset($idpr)) {
      
    $tampil_kurang_ecat= $this->produkom->Getprodukm("where idpr=$idpr AND tipe_harga='Jumlah > 10 % E-Cat'  order  by idpr asc")->result_array();
    $prod = $this->db->get_where('v_produko',['idpr'=>$idpr])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                                      
                    
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
              
                       <td><?php echo $tr['produko']; ?></td>
            
            <td style="text-align: center;">Rp. <?php echo number_format($tr['harga']); ?></td>
                        
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>
                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->
