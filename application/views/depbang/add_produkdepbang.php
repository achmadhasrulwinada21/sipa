<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b> DETAIL PRODUK DEPBANG </b><br><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
         
 <div class="box">
                
                
                  <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='70'  and $kode !='82' ):?>

              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
                <?php endif;?>
              <div class="box-body chat" id="chat-box">
                       <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='70' or $kode =='82' ):?>
                       <a style="margin-top:5px;" class="btn btn-success btn-md" href="<?php echo base_url(); ?>Depbangtr/lihattralum/<?php echo $prod->kode_th ?>/<?php echo $prod->tanggal_tr ?>"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <!-- chat item -->
              <?php endif;?>
                <div class="item">
                      <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='70' and $kode !='82' ):?>
                  <form role="form" form name="form1"  action="<?php echo base_url(); ?>Depbangtr/savedata_alumc" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
              

                    
                     <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="kode_tr">                              
                    <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper2">
                   <input type="hidden" class="form-control" value="<?php echo $prod->kode_th ?>" id="" name="kode_th"> 
               

            <div class="col-lg-6">			   
            <div class="form-group" >
                      <label for="">NAMA PRODUK (DEPBANG)</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="kode_produk" name="kode_produk" class="form-control" required>
                          <option required></option>
                          <?php foreach($alum as $row) { ?>
                              <option value="<?php echo $row['kode_produk'] ?>" required><?php echo $row['kode_produk'] ?> :  <?php echo $row['nama_produk'] ?></option>
                          <?php } ?>
                        </select> 
                   </div>
				   
				    <div class="form-group" >
                      <label for="">REGIONAL</label><br>
                        <select id="" name="kode_regional" class="chosen">
                          <option value="-" >pilih regional</option>
                          <?php foreach($regional as $row) { ?>
                              <option value="<?php echo $row['kode_regional'] ?>" ><?php echo $row['kode_regional'] ?> :  <?php echo $row['nm_regional'] ?></option>
                          <?php } ?>
                        </select> 
                   </div>
				
                     
					 
                     <div class="form-group">
                      <label for="">GARANSI(per tahun)</label>
                       <input type="text" class="form-control" value="" name="garansi" id="" placeholder="garansi" autocomplete="off" />                 
                    </div> 
				
					
					 			<div class="form-group">
                      <label for="">GARANSI</label><br>
                             <label>Full WARANTY</label><input type="text" class="form-control" value="0" name="garansifull" placeholder="FULL WARANTY" /><br>
                      <label>Free WARANTY</label><input type="text" class="form-control" value="0" name="garansifree" placeholder="Free WARANTY" /><br>
                        <div class="col-lg-3">
                       <label>Tahun ke 1</label><input type="text" class="form-control" value="1" name="tahunke1" placeholder="Tahun ke 1" readonly />  
                        <label>Tahun ke 2</label><input type="text" class="form-control" value="2" name="tahunke2" placeholder="Tahun ke 2" readonly />
                         <label>Tahun ke 3</label><input type="text" class="form-control" value="3" name="tahunke3" placeholder="Tahun ke 3" readonly />  
                        <label>Tahun ke 4</label><input type="text" class="form-control" value="4" name="tahunke4" placeholder="Tahun ke 4" readonly />
                         <label>Tahun ke 5</label><input type="text" class="form-control" value="5" name="tahunke5" placeholder="Tahun ke 5" readonly />               
                    </div> 
                     <div class="col-lg-3">
                       <label>Persentase ke 1</label><input type="text" class="form-control" value="0" name="persentase1" placeholder="Persentase1"/>  
                        <label>Persentase ke 2</label><input type="text" class="form-control" value="0" name="persentase2" placeholder="Persentase2"/>  
                          <label>Persentase ke 3</label><input type="text" class="form-control" value="0" name="persentase3" placeholder="Persentase3"/>  
                        <label>Persentase ke 4</label><input type="text" class="form-control" value="0" name="persentase4" placeholder="Persentase4"/> 
                        <label>Persentase ke 5</label><input type="text" class="form-control" value="0" name="persentase5" placeholder="Persentase5"/>            
                    </div> </div></div>
	

                    <div class="col-lg-6">
					
				    <div class="form-group">
                      <label for="">HARGA LAMA</label>
                       <input type="text" class="form-control" value="0" name="harga_lama" id="" placeholder="harga lama" autocomplete="off"  />                 
                    </div> 
					
					<div class="form-group">
                      <label for="">HARGA SEKARANG</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  value="0" name="harga_baru" id="" placeholder="harga baru" autocomplete="off"  required/>                 
                    </div>
				
					
                    <div hidden class="form-group">
                      <label for="">HARGA exc PPN</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="0" name="harga_excppn" id="" onFocus="startCalc();" onBlur="stopCalc();"  placeholder="harga exclude ppn" autocomplete="off"  required/>                 
                    </div> 
         
                    <div class="form-group">
                      <label for="">HARGA inc PPN</label><b style="color:red;">&nbsp*harus diisi</b>
                       <input type="text" class="form-control" value="0" name="harga_incppn" onFocus="startCalc();" onBlur="stopCalc();"  id="" placeholder="harga include ppn" autocomplete="off"  readonly/>                 
                    </div>   
                   <div class="form-group" >
                      <label for="">JUMLAH FEE</label><b style="color:red;">&nbsp*harus diisi</b><br>
                        <select id="" name="prensentase" class="chosen" required>
                          <option value="" required>---pilih Fee----</option>
                          <?php foreach($persent as $row) { ?>
                              <option value="<?php echo $row['prensentase'] ?>" required><?php echo $row['prensentase'] ?> %</option>
                          <?php } ?>
                        </select> 
                   </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                       <input type="text" class="form-control" value="" name="ket" id="" placeholder="Keterangan" autocomplete="off"/>                 
                    </div>
                     
					 <div class="form-group">
                      <label for="">Catatan</label>
                       <input type="text" class="form-control" value="" name="note" id="" placeholder="Catatan" autocomplete="off"/>
                    </div> 

                     <div class="form-group">
                      <label for="">Contact Person</label>
                       <input type="text" class="form-control" value="" name="contact" id="" placeholder="Contact Person" autocomplete="off"/>
                    </div>
 
                </table>
                </div>
                <div style="text-align:center;" class="form-actions">
            <button type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>Depbangtr/addtralum/<?php echo $prod->kode_th ?>/<?php echo $prod->tanggal_tr ?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div></div></div>
                <!-- /.col -->
               </form>
                 <?php endif;?>

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped table-havor" style="vertical-align: middle;width:100%;">
                  <thead>
                    <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Nama Produk</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Garansi (Per Tahun)</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Regional</th>
					<th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Satuan</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Lama</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Baru</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Inc PPN </th>
				    <th rowspan="4" style="vertical-align: middle;text-align: center;">Persentase Naik / Turun</th>
                      <th colspan="19" style="vertical-align: middle;text-align: center;">Garansi</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Persentase</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Keterangan</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan</th>
					 <th rowspan="4" style="vertical-align: middle;text-align: center;">Contact</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th colspan="19" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Full</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Free</th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Tahun ke</th>
                      <th style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%) (B)</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal (Rp) L = (A x B)</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
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
          foreach ($data_prods as $tr){
            $no++
?>
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansi']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nm_regional']; ?></td>
			<td style="vertical-align: middle;text-align: center;"><?php echo $tr['satuannama']; ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['harga_lama'], 2,',','.')); ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['harga_baru'], 2,',','.')); ?></td>
		   <td style="vertical-align: middle;text-align: right;">Rp.<?php echo (number_format($tr['harga_incppn'], 2,',','.')); ?></td>
           <td style="vertical-align: middle;text-align: right;"><?php echo (number_format($tr['persentase'], 0,',','.')); ?> %</td>  
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifull']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifree']; ?></td>
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
           <td style="vertical-align: middle;text-align: center;"><?php echo number_format($tr['persentase_ppn'], 0,',','.'); ?> %</td>
		   <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ket']; ?></td> 
		   <td style="vertical-align: middle;text-align: center;"><?php echo $tr['note']; ?></td>
		   <td style="vertical-align: middle;text-align: center;"><?php echo $tr['contact']; ?></td>
            <td style="vertical-align: middle;text-align: center;">
             <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='10' and $kode !='70' and  $kode !='82'):?> 
              
           <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Depbangtr/editabksdepbang/<?php echo $tr['iddetilalum']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                      <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Depbangtr/hapusdetaildepbang/<?php echo $tr['iddetilalum']; ?>/<?php echo $tr['kode_tr']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                 <?php endif; ?>
                       <?php
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='10' or $dara =='70' or  $dara =='82'):?>
                   <a data-toggle="modal" href="#modal_editdaranisa<?php echo $tr['iddetilalum']; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove">&nbspditolak</i></a>
                       <?php endif; ?> 

 </td>
        </tr>
            <?php  } ?>
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
            </div>





<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode =='10' or $kode =='70' or $kode =='82'):?>
<?php
        foreach($data_prods as $i){
       $iddetilalum=$i['iddetilalum'];
      $ket = $i['cttndetilrevisi'];
      $kode_th = $i['kode_th'];
      $kode_tr = $i['kode_tr'];
      $koper = $i['koper'];
      $nama_produk = $i['nama_produk'];
       ?>
<div id="modal_editdaranisa<?php echo $iddetilalum;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> --> 
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Reject</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>Depbangtr/updaterejectdetil2" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $iddetilalum;?>" id="" name="iddetilalum">
                      <input type="hidden" class="form-control" value="<?php echo $kode_tr;?>" id="" name="kode_tr">
                      <input type="hidden" class="form-control" value="<?php echo $kode_th;?>" id="" name="kode_th">
                      <input type="hidden" class="form-control" value="<?php echo $koper;?>" id="" name="koper">
                      <input type="hidden" class="form-control" value="01" id="" name="statusdetil">
                     <div class="form-group">
                      <label for="">Catatan</label><br>
                        <textarea name="cttndetilrevisi" rows="4" cols="50"><?php echo $ket;?></textarea></div>                               
                    </div> 
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat"><i class="glyphicon glyphicon-ok"></i>&nbsp&nbspyakin ditolak produk : <?php echo $nama_produk ;?>?</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <?php endif;?>
              <!-- END MODAL edit -->
