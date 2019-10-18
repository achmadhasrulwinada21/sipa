<section class="content-header">
        <h4 style="text-align: center;">
          <b><span> LISTING RR OBAT</span></b>
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
                  
         <button data-toggle="modal" data-target="#myModals" class="btn btn-success" style="margin-left:2%"><span class="glyphicon glyphicon-print"></span>&nbspPRINT</button>

       <br>

                <div class="table-responsive">
                <div class="box-body">      
        <br> 
        <table id="table91" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
					<th style="vertical-align: middle; text-align: center;">Kode Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                    <th style="vertical-align: middle; text-align: center;">Komposisi</th>
                    <th style="vertical-align: middle; text-align: center;">Harga Satuan</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                   <!--  <th style="vertical-align: middle; text-align: center;">FOI</th>
                    <th style="vertical-align: middle; text-align: center;">MOU</th>
                    <th style="vertical-align: middle; text-align: center;">PKS RENEWAL</th> -->
                    <th style="vertical-align: middle; text-align: center;">Distributor</th>
                    <th style="vertical-align: middle; text-align: center;">Detail</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: arial; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
					<th style="vertical-align: middle; text-align: center;">Kode Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                     <th style="vertical-align: middle; text-align: center;">Komposisi</th>
                    <th style="vertical-align: middle; text-align: center;">Harga Satuan</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                   <!--  <th style="vertical-align: middle; text-align: center;">FOI</th>
                    <th style="vertical-align: middle; text-align: center;">MOU</th>
                    <th style="vertical-align: middle; text-align: center;">PKS RENEWAL</th> -->
                    <th style="vertical-align: middle; text-align: center;">Distributor</th>
                    <th style="vertical-align: middle; text-align: center;">Detail</th>
                  </tr>
            </tfoot>
        </table>
    </div>
  </div></div></div></div></section>

        
        <!-- Main row -->

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

<form action="<?php echo base_url(); ?>Laporandetilobatnew/expordetilobatfarmasi" method="POST" target="blank">
        <div class="form-group"> 
             PERUSAHAAN:<br>
         <select name="koper" id="dara" class="form-control">
       <option value=""> Pilih Perusahaan : </option>
       <?php foreach($kode_pabrik as $dt) { ?>
            <option value="<?php echo $dt['koper'] ; ?>">
             <?php echo $dt['nm_perusahaan']?></option>
            <?php  } ?>
          </select>
        </div>

    <div class="form-group">
        PERIODE AWAL:<br>
        <input type="text" value="" id="datepicker11" name="tglawal" class="form-control" autocomplete="off">
    </div>
      <b>s/d</b><br><br>
    <div class="form-group">
        PERIODE AKHIR:<br>
        <input type="text" value="" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off">
    </div>
	

	
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->

