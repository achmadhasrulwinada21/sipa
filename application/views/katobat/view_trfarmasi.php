 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DATA PRODUK FARMASI</b><br>
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
                <!-- chat item --><br><br>
               <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>Obattr"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
              </div><br></section>
              <section>  
            <div class="col-md-12">
                      <br>
              
                            

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                    
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="datatables4" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRINSIPAL</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA DISTRIBUTOR</th>
                       <th style="vertical-align: middle;text-align: center;"> < = E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> = E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> < 10% E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> > 10% E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;"> Penyesuaian dengan E-Cat</th>
                      <th style="vertical-align: middle;text-align: center;">FOI</th>
                      <th style="vertical-align: middle;text-align: center;">MOU JKN</th>
                      <th style="vertical-align: middle;text-align: center;">PKS RENEWAL</th>
                       		   <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69'):?>
						<th style="vertical-align: middle;text-align: center;">AKSI<br><input type="checkbox" id="check-all"><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> ALL REJECT </button></th>					   
                  <?php endif;?>	                          
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
                       <td><?php echo $row['nm_distributor']; ?></td>
                        <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>"><?php echo $row['harga_kecil_e_cat']; ?></a></td>
                       <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_editt<?php echo $row['idpr2']; ?>"><?php echo $row['harga_sama_e_cat']; ?></a></td>
                       <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_editts<?php echo $row['idpr2']; ?>"><?php echo $row['harga_dibawahten']; ?></a></td> 
                      <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_edittdara<?php echo $row['idpr2']; ?>"><?php echo $row['harga_diataten']; ?></a></td>
                      <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_edittdara21<?php echo $row['idpr2']; ?>"><?php echo $row['harga_sesuai']; ?></a></td>
                        <td style="vertical-align: middle;text-align: center;"><?php echo $row['foi']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['mou']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['pks']; ?></td>
			  <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69' ):?>
					   <td style="vertical-align: middle;text-align: center;">
					   <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Obattr/adddetail/<?php echo $row['idpr2']; ?>"><i class="fa fa-desktop">&nbsp </i>LIHAT DETAIL</a>
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='idpr2[]' value="<?php echo $row['idpr2']; ?>">
							<input  type='hidden' name='tanggal' value="<?php echo $row['tanggal_tr']; ?>">
							
						&nbsp&nbsp<input type="text" class="form-control" autocomplete="off"  value=""  id="catatheadrev" name='catatanheadrevisi[]' placeholder="Isikan Catatan Ditolak"  >
					   
							<select style="display: none;" name='statushead[]' class="form-control">
						
								<option value="1"></option>

							</select>
					   
					   
					   </td>
					   <?php endif;?>
					   
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
              $this->load->model('obatkat');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->obatkat->GetprodukVdetail("where koded_prod='$idpr2' AND tipe_harga='Jumlah < = E-Cat'")->result_array();
    $prod = $this->db->get_where('v_obat_tr',['idpr2'=>$idpr2])->row();

    }
        ?>
                   
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                <table class="datatables49 table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Golongan</th>
                    <th>Komposisi</th>
                    <th>Harga Satuan</th>
                    <th>Diskon</th>
                    <th>Note</th>
                    </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_obat']; ?></td>
                      <td><?php echo $tr['klasifikasinama']; ?></td> 
                     <td><?php echo $tr['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
             <td><?php echo $tr['discount']; ?> %</td>
             <td><?php echo $tr['catatan']; ?></td>
              
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($data_produko as $i){
       $idpr2 = $i['idpr2'];
           ?>

<div id="modal_editt<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
           <?php 
              $this->load->model('obatkat');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->obatkat->GetprodukVdetail("where koded_prod='$idpr2' AND tipe_harga='Jumlah = E-Cat'")->result_array();
    $prod = $this->db->get_where('v_obat_tr',['idpr2'=>$idpr2])->row();

    }
        ?>
                  
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                <table class="datatables58 table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                   <th>Golongan</th>
                  <th>Komposisi</th>
                    <th>Harga Satuan</th>
                    <th>Diskon</th>
                    <th>Note</th>
                    </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_obat']; ?></td>
                       <td><?php echo $tr['klasifikasinama']; ?></td>
                       <td><?php echo $tr['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
               <td><?php echo $tr['discount']; ?> %</td>
               <td><?php echo $tr['catatan']; ?></td>
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->


<?php
      foreach($data_produko as $i){
       $idpr2 = $i['idpr2'];
           ?>

<div id="modal_editts<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
           <?php 
              $this->load->model('obatkat');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->obatkat->GetprodukVdetail("where koded_prod='$idpr2' AND tipe_harga='Jumlah < 10 % E-Cat'")->result_array();
    $prod = $this->db->get_where('v_obat_tr',['idpr2'=>$idpr2])->row();

    }
        ?>
                  
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                <table class="datatables58 table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Golongan</th>
                  <th>Komposisi</th>
                    <th>Harga Satuan</th>
                    <th>Diskon</th>
                    <th>Note</th>

                    </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_obat']; ?></td>
            
               <td><?php echo $tr['klasifikasinama']; ?></td>
                       <td><?php echo $tr['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
               <td><?php echo $tr['discount']; ?> %</td>
              <td><?php echo $tr['catatan']; ?></td>
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($data_produko as $i){
       $idpr2 = $i['idpr2'];
           ?>

<div id="modal_edittdara<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
           <?php 
              $this->load->model('obatkat');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->obatkat->GetprodukVdetail("where koded_prod='$idpr2' AND tipe_harga='Jumlah > 10 % E-Cat'")->result_array();
    $prod = $this->db->get_where('v_obat_tr',['idpr2'=>$idpr2])->row();

    }
        ?>
                  
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                <table class="datatables58 table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Golongan</th>
                  <th>Komposisi</th>
                    <th>Harga Satuan</th>
                    <th>Diskon</th>
                    <th>Note</th>

                    </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_obat']; ?></td>
            
               <td><?php echo $tr['klasifikasinama']; ?></td>
                       <td><?php echo $tr['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
               <td><?php echo $tr['discount']; ?> %</td>
               <td><?php echo $tr['catatan']; ?></td>
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->

<?php
      foreach($data_produko as $i){
       $idpr2 = $i['idpr2'];
           ?>

<div id="modal_edittdara21<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
           <?php 
              $this->load->model('obatkat');
          if (isset($idpr2)) {
      
    $tampil_kurang_ecat= $this->obatkat->GetprodukVdetail("where koded_prod='$idpr2' AND tipe_harga='Penyesuaian dengan E-Cat'")->result_array();
    $prod = $this->db->get_where('v_obat_tr',['idpr2'=>$idpr2])->row();

    }
        ?>
                  
              <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
              <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b><br>
                <table class="datatables58 table table-bordered table-striped">
                   <thead>
                  <tr class="danger">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Golongan</th>
                  <th>Komposisi</th>
                    <th>Harga Satuan</th>
                    <th>Diskon</th>
                    <th>Note</th>

                    </tr>
                   </thead>
<?php
$no=0;
          foreach ($tampil_kurang_ecat as $tr){
            $no++
?>
                  <tr class="info">
                      <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              
                       <td><?php echo $tr['nama_obat']; ?></td>
            
               <td><?php echo $tr['klasifikasinama']; ?></td>
                       <td><?php echo $tr['komposisi']; ?></td>
              <td style="text-align: center;">Rp.<?php echo number_format($tr['harga']); ?></td>
               <td><?php echo $tr['discount']; ?> %</td>
               <td><?php echo $tr['catatan']; ?></td>
                     
                        
                      
                    </tr>

            <?php  } ?>
                 </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="yellow">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="14"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <div class="panel panel-primary"></div>
        </div>
              </div>
        </div>
        </div>
        </div> 
             <?php } ?>

 
<!------- end modal -------->
    
