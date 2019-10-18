<section class="content-header">
        <h4 style="text-align: center;">
          <b><span> LISTING RR OBAT (REGULER)</span></b>
        </h4>
        </section>
               
                  
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">    
            </div>   
               <br>
                           

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">       
              </div><!-- /.box-title -->
                  
       <button data-toggle="modal" data-target="#myModals" class="btn btn-success" style="margin-left:2%"><span class="glyphicon glyphicon-print"></span>&nbspPRINT</button><br>
                


<div class="box-body">
          
           <div class="table-responsive">
              <table id="datatables5" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="#4682B4" style="font-family: arial; color: white;">    
               <th style="text-align:center;">No</th>
			   <th style="text-align:center;">Kode</th>
			   <th style="text-align:center;">Nama Produk</th>
			   <th style="text-align:center;">Komposisi</th>
               <th style="text-align:center;">Harga Satuan</th>
               <th style="text-align:center;">Tanggal</th>
			   <th style="text-align:center;">Perusahaan</th>
			   <th style="text-align:center;">Distributor</th>

				<?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='56' ):?>				
                <th style="text-align:center;">Aksi</th>
				<?php endif;?> 
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_final as $pkj) 
          {

          $no++ ?>
        <tr>
                     
            <td style="text-align:center;"><?php echo $no; ?></td>
			<td style="text-align:left;"><?php echo ($pkj['kode_obat']); ?></td>
			<td style="text-align:left;"><?php echo ($pkj['nama_obat']); ?></td>
			<td style="text-align:center;"><?php echo ($pkj['komposisi']); ?></td>
            <td style="text-align:center;"><?php echo number_format($pkj['harga_akhir_baru']);?></td>
			<td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
			<td style="text-align:center;"><?php echo ($pkj['nm_perusahaan']); ?></td>
			<td style="text-align:center;"><?php echo ($pkj['nm_distributor']); ?></td>
             <?php
                    $kode=($this->session->userdata('koderole'));
                   if($kode !='56' ):?>
			 <td style="text-align:center;">       
                <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Detailobattr/cetak_obattrproduk_lop/<?php echo $pkj['iddetailprod2']; ?>"><i class="fa fa-desktop"></i> &nbsp LIHAT </a> 
                		
             </td>
			 <?php endif;?> 
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div>

</div></div></div>

<!-- modal -->
      <div id="myModals" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-primary">
         <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
          <div class="modal-body">

<form action="<?php echo base_url(); ?>Laporandetilobatnew_lop/expordetilobatfarmasi" method="POST" target="blank">
        <div class="form-group"> 
             PERUSAHAAN:<br>
         <select name="koper" id="dara" class="form-control">
       <option> Pilih Perusahaan : </option>
       <?php foreach($kode_pabrik as $dt) { ?>
            <option value=<?php echo $dt['koper'] ; ?>>
             <?php echo $dt['nm_perusahaan']?></option>
            <?php  } ?>
          </select>
        </div>

    <div class="form-group">
        PERIODE AWAL:<br>
        <input type="text" id="datepicker11" name="tglawal" class="form-control" autocomplete="off">
    </div>
      <b>s/d</b><br><br>
    <div class="form-group">
        PERIODE AKHIR:<br>
        <input type="text" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off">
    </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->


