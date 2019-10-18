<ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>produko2">Data Produk</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>produko2/aprove">Compare Produk Ecatalog</a></li>
   
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
            <div class="box"> 	

              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <a href="<?php echo base_url(); ?>produko2/aprove"><span class=" btn btn-success">Kembali</span></a>

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
            <td style="text-align:center;"><a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>LaporanCompare2/cetak_compare_obat2/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 
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
                      <td><?php echo $row['nm_perusahaan']; ?></td>
                      <td style="text-align:left;"><?php echo $row['kodis']; ?></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['harga_kecil_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit2<?php echo $row['idpr2']; ?>"><?php echo $row['harga_sama_e_cat']; ?></a></td>
            <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit3<?php echo $row['idpr2']; ?>"><?php echo $row['harga_dibawahten']; ?></a></td>
                      <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit4<?php echo $row['idpr2']; ?>"><?php echo $row['harga_diataten']; ?></a></td>
                              
                    </tr>
                              <?php
                    
                             }?>
                    </tbody>
           </table>
                  </div><br><br>    


<?php
      foreach($compare as $i){
       $idpr2 = $i['idpr2'];
       $kodis = $i['kodis'];
       $nm_perusahaan = $i['nm_perusahaan'];
       $harga = $i['harga'];           
         ?>

<div id="modal_edit<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-md">
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
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukms2("where koded_prod='$idpr2' AND tipe_harga='Jumlah < = E-Cat'  order  by createdate asc")->result_array();
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
  <div class="modal-dialog modal-md">
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
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukms2("where koded_prod='$idpr2' AND tipe_harga='Jumlah = E-Cat'  order  by createdate asc")->result_array();
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
  <div class="modal-dialog modal-md">
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
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukms2("where koded_prod='$idpr2' AND tipe_harga='Jumlah < 10 % E-Cat'  order  by createdate asc")->result_array();
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
  <div class="modal-dialog modal-md">
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
      
    $tampil_kurang_ecat= $this->produkom2->Getprodukms2("where koded_prod='$idpr2' AND tipe_harga='Jumlah > 10 % E-Cat' order  by createdate asc")->result_array();
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


