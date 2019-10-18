 <section class="content-header"><br><br>
    <h1 style="text-align:center;font-weight:bold;font-family:verdana;" >
        KATALOG PRODUK DEPBANG
        <small></small>
    </h1><br>
    <div class="col-lg-4" style="margin-left:32%;">
    <div class="panel panel-primary"></div>
  </div>
    </section>      
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
          <section class="col-lg-12">
            <!-- Chat box --><div class="box">
           <br>
              <?php
                    $dara=($this->session->userdata('koderole'));
                   if($dara =='68' || $dara =='1'):?>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Depbangtransaksi/savedata_aprovedepbang" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">

            <div class="col-lg-6">
               <div class="form-group">
                    <label>Kode Transaksi</label>
              <input type="text" name="kode_trans" value="<?php echo $prid ?>" id="" autocomplete="off" placeholder="" class="form-control" readonly>
            </div>
					        <div class="form-group">
                    <label>Tanggal Transaksi</label>
                       <input type="text" name="tanggal" value="" id="datepicker11" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div>   
                    <div class="form-group">
                      <label for="">Rumah Sakit</label><br>
                        <select name="koders" class="chosen form-control" required>
                          <option value="" required>--Pilih Rumah Sakit--</option>
                          <?php foreach($rs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>" required><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>          
                    
                     <input type="hidden" name="id_tipe_produk" value="TP004" id="" autocomplete="off" placeholder="" class="form-control">          
                                             
					
					</div></div></div>
				</div>
        <div style="text-align:left;margin-left:3%;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            
        </div><br><br>
    </form>
</div></div></section>
 <section class="col-lg-12">
<?php endif;?> <br><br>
 		  <div class="table-responsive">
              <table id="datatables9" class="table table-bordered table-striped table-hover">

                  <thead>
                    <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">
                     
					     <th style="text-align:center;">No</th>
               <th style="text-align:center;">Kode Transaksi</th>
               <th style="text-align:center;">Tanggal</th>
               <th style="text-align:center;">Rumah Sakit</th>
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_aprove as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:center;"><?php echo $no; ?></td>
             <td style="text-align:center;"><?php echo ($pkj['kode_trans']); ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
             <td style="text-align:center;"><?php echo ($pkj['namars']); ?></td>
             <td style="text-align:center;"> 
              <?php
                  $dara21=($this->session->userdata('koderole'));
                   if($dara21 !='10' and $dara21 !='70' ):?>
 
              <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/addtrdepbang/<?php echo $pkj['tanggal']; ?>/<?php echo $pkj['kode_trans']; ?>"><i class="fa fa-plus">&nbsptambah data</i></a> 
                     <?php endif;?>

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/viewtrdepbang/<?php echo $pkj['tanggal']; ?>/<?php echo $pkj['kode_trans']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
               <?php
                          $darabus=($this->session->userdata('koderole'));
                   if($darabus =='59' || $darabus =='1' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editaprovedepbang/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbsptanda tangan</i></a> 
                 <?php endif;?> 
                  <?php
                          $darakuy=($this->session->userdata('koderole'));
                   if($darakuy =='70' || $darakuy =='1' ):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editaprovedepbang/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspverifikasi</i></a> 
                    <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editrejectalkes/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
 <?php endif;?> 
                  <?php
                          $daradev=($this->session->userdata('koderole'));
                   if($daradev =='10' || $daradev =='1'):?>
               <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editaprovedepbang/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspapprove</i></a> 
                                       
                  <a style="margin-bottom:3px;" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editrejectalkes/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-ok">&nbspreject</i></a>
                 <?php endif;?> 
                    <?php
                  $darauy=($this->session->userdata('koderole'));
                   if($darauy !='57' and $darauy !='10' and $darauy !='59' ):?>
 
                <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/hapustralkes/<?php echo $pkj['kode_trans']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                    <?php endif;?>                
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div></tr></tbody></table>
<?php
                $darabusdev=($this->session->userdata('koderole'));
                   if($darabusdev =='59' || $darabusdev =='68' || $darabusdev =='1'):?>
<br><br><br>
<div class="panel panel-primary"></div>
<section class="content-header">
    <h1 style="text-align:center;" >
       E-KATALOG PRODUK DEPBANG REJECTED
        <small></small>
    </h1>
      
    </section>
<br><br>
<div class="box-body">
          
           <div class="table-responsive">
              <table id="datatables5" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">    
               <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
                <th style="text-align:center;">Rumah Sakit</th>
               <th style="text-align:center;">Catatan</th> 
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_reject as $pkj) 
          {

          $no++ ?>
        <tr>
                     
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
             <td style="text-align:center;"><?php echo ($pkj['namars']); ?></td>
            <td style="text-align:justify;"><?php echo ($pkj['catatan']); ?></td>
             <td style="text-align:center;"> 
             

                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/viewtrdepbang/<?php echo $pkj['tanggal']; ?>/<?php echo $pkj['kode_trans']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
             
               
               
             </td>
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>
 <?php endif;?>
</div></div></div></section>
