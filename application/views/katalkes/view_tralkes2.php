
  
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>      
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span>RR LISTING PRODUK ALAT KESEHATAN</b><br>
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
               <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>Alkestransaksi"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
              </div><br></section>
              <section>  
            <div class="col-md-12">
                      <br>
              
                            

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
				<span id="pesan-error-flash"><?php echo $this->session->flashdata('reject'); ?></span>
                <div class="box-title"><br>
        
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                <div class="table-responsive">
				<form method="post" action="<?php echo base_url(); ?>Alkestransaksi/update_viewtralkes" id="form-delete">
                <div class="box-body">
				<!--<button style="margin-left:900px" id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> REJECT </button>-->
                  <table id="datatables4" class="table table-bordered table-striped" style="vertical-align: middle;width:100%;">
                  <thead>
                    <tr class="danger">
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">NO</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">PERUSAHAAN</th>
                      <th colspan="4" style="vertical-align: middle;text-align: center;">STATUS REKANAN</th>
                       <th rowspan="2" style="vertical-align: middle;text-align: center;">JUMLAH PRODUK</th>
					   <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69'):?>
						<th style="vertical-align: middle;text-align: center;">AKSI</th>
				<?php endif;?>						
                  </tr>
                   <tr class="danger">
                      <th style="vertical-align: middle;text-align: center;">PRINCIPAL</th>
                      <th style="vertical-align: middle;text-align: center;">SOLO AGENT</th>
                      <th style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                       <th style="vertical-align: middle;text-align: center;">SUB DISTRIBUTOR</th>
					
					
					 <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69'):?>
					<th style="text-align:center;"><input type="checkbox" id="check-all"><br><button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-close"></i> ALL REJECT </button></th>					   
                  <?php endif;?>
				  </tr>                 
					 
                   
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_produko as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                      <td style="vertical-align: middle;text-align: left;"><?php echo $row['nm_perusahaan']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['principal']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['solo_agent']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['distributor']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['subdistributor']; ?></td> 
                       <td style="vertical-align: middle;text-align: center;"><a  data-toggle="modal" href="#modal_editdara<?php echo $row['idpr2']; ?>"><?php echo $row['jumlah']; ?></a></td>
					   
					  <?php
						$kodedara=($this->session->userdata('koderole'));
							if($kodedara =='82' or $kodedara =='57' or $kodedara =='10' or $kodedara =='69' ):?>
					   <td style="vertical-align: middle;text-align: center;">
					   <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/adddetail/<?php echo $row['idpr2']; ?>"><i class="fa fa-desktop">&nbsp </i>LIHAT DETAIL</a>
						&nbsp&nbsp 
							<input type='checkbox' class='check-item' name='idpr2[]' value="<?php echo $row['idpr2']; ?>">
							<input  type='hidden' name='tanggal' value="<?php echo $row['tanggal_tr']; ?>">
							<input  type='hidden' name='kode_trans' value="<?php echo $row['kode_trans']; ?>">
						&nbsp&nbsp<input type="text" class="form-control" autocomplete="off"  value=""  id="catatheadrev" name='catatanheadrevisi[]' placeholder="Isikan Catatan Ditolak"  >
					   
							<select style="display: none;" name='statushead[]' class="form-control">
						
								<option value="1"></option>

							</select>
					   
					   
					   </td>
					   <?php endif;?>
					   
					   </td> 					   
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
				</form>
               </div>
            </div>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        

     

<!------- modal -------->

<?php
      foreach($data_prod as $i){
       $idpr2 = $i['idpr2'];     
         ?>
<div id="modal_editdara<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('alkeskat');
          if (isset($idpr2)) {
      
    $tampil= $this->alkeskat->Getprodukm("where idpr2= $idpr2 order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('view_alkes1',['idpr2'=>$idpr2])->row();

    }
        ?>

             <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALAT KESEHATAN</b><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
                    
                    <!-- <?php// } ?> -->
                 
                 <br>
                                     
              <div class="table-responsive">
                 <div class="box-body">
                <table id="" class="datatables49 table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Nama Produk</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Merk</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Tipe</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga(X)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">DISCOUNT(%)(Z)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir(P =(X*Z))</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Total Harga (A=(P*ppn%))</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">E-KAT</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Non E-KAT</th>
                      <th colspan="19" style="vertical-align: middle;text-align: center;">Garansi</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Register</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Non Register</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Cash Back(%)(Y)</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Cash Back(A*Y)</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya free</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya non free</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Biaya</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Keterangan</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th colspan="19" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th rowspan="2" style="vertical-align: middle;text-align: center;">Free</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Full</th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Tahun ke</th>
                      <th style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%) (B)</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal (Rp) L = (A x B)</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;width:8%;">
                   <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;"></th>
                   <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;"></th>
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  </tr>
                    
                  </thead><tbody>
<?php
$no=0;
          foreach ($tampil as $tr){
            $no++
?>
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['type']; ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['harga'], 0,',','.')); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['discount']; ?> %</td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['harga_akhir'], 0,',','.')); ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['total'], 0,',','.')); ?></td>   
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['e_kat']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['non_e_kat']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansi']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke2']; ?></td>  <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke5']; ?></td> 
            <td style="vertical-align: middle;text-align: center;"></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase2']; ?></td>  <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase5']; ?></td>
            <td style="vertical-align: middle;text-align: center;"></td>
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominal1'], 0,',','.')); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominal2'], 0,',','.')); ?></td> 
 <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format( $tr['nominal3'], 0,',','.')); ?></td>
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominal4'], 0,',','.')); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominal5'], 0,',','.')); ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['register']; ?></td>  
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['non_register']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['cashback']; ?></td> 
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominal_cashback'], 0,',','.')); ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['biayafree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['biayanonfree']; ?></td>
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($tr['nominalbiaya'], 0,',','.')); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ket']; ?></td>     
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['note']; ?></td> 
        </tr>
            <?php  } ?>
               </tbody></table>
                    </div> 
                                       
 
              </div></div>

                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

    
