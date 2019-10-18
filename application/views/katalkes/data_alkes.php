
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> LISTING RR  PRODUK ALAT KESEHATAN</b><br>
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
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='75' || $dara =='76' || $dara =='1' || $dara =='69'):?>
                  <form role="form" action="<?php echo base_url(); ?>Alkestransaksi/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
          
				  <div class="box-body chat" id="chat-box">

				  <div class="col-lg-12">
                                       
              <input type="hidden" class="form-control" value="<?php echo $tr->tanggal ?>" id="" name="tanggal_tr"> 
               <input type="hidden" class="form-control" value="<?php echo $tr->kode_trans ?>" id="" name="kode_trans"> 
<div class="col-lg-4">
          
                 <div class="form-group">
                      <label for="foto">PERUSAHAAN</label>
					             <br> <select id="koper" name="koper" class="form-control">
                          <option value="-">PILIH PERUSAHAAN</option>
                          <?php foreach($kode_pabrik as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
						  </select><br><br>
               
          <div class="col-lg-6">
             <div class="form-group" hidden>
                      <label for="">TIPE PRODUK</label>
                        <select name="tipe_produk" class="form-control" required>
                          <option value="TP003">--Pilih Tipe Produk--</option>
                          <?php foreach($tipe_produk as $row) { ?>
                              <option value="<?php echo $row['id_tipe_produk'] ?>"><?php echo $row['tipe_produk'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>      
                    
        </div></div>
        <div style="text-align:left;margin-left:10%" class="form-actions">
            <button  type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
           <a href="<?php echo base_url(); ?>Alkestransaksi" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
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
                      <th style="vertical-align: middle;text-align: center;">Principal</th>
                      <th style="vertical-align: middle;text-align: center;">Solo Agent</th>
                      <th style="vertical-align: middle;text-align: center;">Distributor</th>
                      <th style="vertical-align: middle;text-align: center;">Subdistributor</th>
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
                       <td><?php echo $row['principal']; ?></td>
                        <td><?php echo $row['solo_agent']; ?></td>
                       <td><?php echo $row['distributor']; ?></td>
                       <td><?php echo $row['subdistributor']; ?></td>
                                         
					             <td style="vertical-align: middle;text-align: center;">
                          <?php
                    $kodedara=($this->session->userdata('koderole'));
                   if($kodedara !='10' and $kodedara !='57' and $kodedara !='82' ):?>
                        <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/adddetail/<?php echo $row['idpr2']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a> 
                         <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/hapusheadalkes/<?php echo $row['idpr2']; ?>/<?php echo $row['kode_trans']; ?>/<?php echo $row['tanggal_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                         <?php endif;?> 
                         <a style="margin-bottom:3px;margin-left:3px;margin-right:3px;" data-toggle="modal" href="#modal_edit<?php echo $row['idpr2']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-desktop">view</a>
                       <!--  <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idtrfarmasi']; ?>/<?php echo $row['pabrik_id']; ?>"><i class="fa fa-print">&nbspPRINT</i></a>  -->                     
                  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Alkestransaksi/editheadalkes/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                     
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
                <table id="" class="datatables49 table table-bordered table-striped table-hover">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Nama Produk</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Merk</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Tipe</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga(X)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">DISCOUNT(%)(Z)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir (P =(X*Z))</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Total Harga(A=(P*ppn%))</th>
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
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke2']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke5']; ?></td> 
            <td style="vertical-align: middle;text-align: center;"></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase2']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase3']; ?></td>
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

 
<!------- end modal -------->



    
