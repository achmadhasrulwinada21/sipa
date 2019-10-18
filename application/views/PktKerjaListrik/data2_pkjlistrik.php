
<!--<section class="content-header">
    <h1>
        PAKET PEKERJAAN LISTRIK
        <small></small>
    </h1>
	    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu STPD</li>
    </ol>
</section>-->

	<ul class="nav nav-tabs">
	  <li class="active"><a href="<?php echo base_url(); ?>PktKerjaListrik">Compare Harga</a></li>
	  <li><a href="<?php echo base_url(); ?>EvaluasiPekRekLis">Rekap Evaluasi</a></li>
	  <li><a href="<?php echo base_url(); ?>rekananlistrik">Database Rekanan</a></li>
	</ul>
	  
<section class="content-header">
    <h1>
        COMPARE PAKET PEKERJAAN LISTRIK
		
        <small></small>
    </h1>

</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>PktKerjaListrik/addpkj" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
				  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT ALL</a>-->
				   <button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" target='blank' class="btn btn-warning"><span class="fa fa-print"></span>PRINT BY R.S</button>
				<!--<button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span> PRINT BY PAKET PEKERJAAN</button>-->
			  <div class="box box-primary">
			   <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				<div class="box-body table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead bgcolor="#F0F8FF" >
                    <tr>
                      <th width="30" rowspan="2" style="text-align:center;">NO</th>
					  <th width="130" rowspan="2" style="text-align:center;">Nama RS</th>
					  <th colspan="5" style="text-align:center;">INDEX HHG </th>
					  <th colspan="2" style="text-align:center;">TRI SAHABAT JAYA PRIMA</th>
					  <th colspan="2" style="text-align:center;">KM MANDIRI</th>
					  <th colspan="2" style="text-align:center;">TRISANDIRA</th>
					  <th width="50" rowspan="2" style="text-align:center;">AKSI</th>
					  </tr>
					  <tr>                      
                      <th style="text-align:center;">Material</th>
                      <th style="text-align:center;">Satuan</th>
					  <th style="text-align:center;">Volume</th>
                      <th style="text-align:center;">Harga</th>
					  <th style="text-align:center;">Total Harga</th>
					  <th style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th style="text-align:center;">Total Harga  (Rp.)</th>
					  <th style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th style="text-align:center;">Total Harga  (Rp.)</th>
					  <th style="text-align:center;">Harga + Upah (Rp.)</th>
					  <th style="text-align:center;">Total Harga  (Rp.)</th>
				   </tr>
			
                 
                    <thead>
                  
                  <tbody>
                    <?php $no=0; foreach($data2_pkjlistrik as $pkj) 
					{

					$no++ ?>
					  <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:left;"><?php echo ($pkj['namars']); ?></td>
					  <td width="250"><?php echo $pkj['nm_material']; ?></td>
                      <td style="text-align:center;"><?php echo $pkj['satuan']; ?></td>
                      <td style="text-align:center;"><?php echo $pkj['volume']; ?></td>
                      <td style="text-align:center;"><?php echo number_format ($pkj['harga']); ?></td>
					  <td style="text-align:center;"><?php echo number_format ($pkj['tot_harga']); ?></td>
                      <td style="text-align:center;"><?php echo number_format ($pkj['hrg_trisahabat']); ?></td>
                      <td style="text-align:center;"><?php echo number_format ($pkj['tot_hrg_trisahabat']); ?></td> 
                      <td style="text-align:center;"><?php echo number_format ($pkj['hrg_mandiri']); ?></td> 
                      <td style="text-align:center;"><?php echo number_format ($pkj['tot_hrg_mandiri']); ?></td>    
                      <td style="text-align:center;"><?php echo number_format ($pkj['hrg_trisandira']); ?></td> 
                      <td style="text-align:center;"><?php echo number_format ($pkj['tot_hrg_trisandira']); ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>PktKerjaListrik/editpkj/<?php echo $pkj['idpktkrj']; ?>"><i class="fa fa-pencil"></i></a>
					  <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>PktKerjaListrik/hapuspkj/<?php echo $pkj['idpktkrj']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
					  <!--<a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik/<?php echo $pkj['idpktkrj']; ?>" target="blank"><i class="fa fa-print"></i></a>-->
                      </td>
					<?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
  </div>
  </div>
  
  
  
<!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
	      <div class="modal-body">

 <!----> <form action="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistriku" target='blank' method="POST">
        <div class="form-group"> 
             CARI RUMAH SAKIT :<br>
         <select name="koders" class="form-control">
       <option> --Pilih Rumah Sakit --</option>
	   <?php foreach($optRS as $row) { ?>
            <option value=<?php echo $row['koders'] ; ?>><?php echo $row['namars']?>
			</option>
            <?php  } ?>
          </select>
        </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" target='blank' class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
<!--- end modal -->
    
	
	<!--- Evaluasi Rekanan Listrik -->
	
	
