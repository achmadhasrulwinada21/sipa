
<section class="content-header">
    <h1>
        PAKET PEKERJAAN LISTRIK
        <small></small>
    </h1>
	    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu</li>
    </ol>   
</section>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>PktKerjaListrik/addpkj" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>
				  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistrik" target='blank' class="btn btn-success"><i class="fa fa-thumb-tack"></i> PRINT ALL</a>-->
				   <!--<button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" target='blank' class="btn btn-warning"><span class="fa fa-print"></span>PRINT BY R.S</button>-->
				<!--<button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span> PRINT BY PAKET PEKERJAAN</button>-->
			  <div class="box box-primary">
			   <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				<div class="box-body table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
				   <tr> 
					  <th style="text-align:center;" width="50">No</th>					  
                      <th style="text-align:center;">Nama Rumah Sakit </th>
                      <th style="text-align:center;">Status </th>
					  <th width="50" style="text-align:center;">Aksi</th>
				   </tr             
                    <thead>
                  
                  <tbody>
                    <?php $no=0; foreach($data_pkjlistrik as $pkj) 
					{

					$no++ ?>
					  <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['namars']); ?></td>
					  <td style="text-align:center;" width="150"><?php echo $pkj['koders']; ?></td>
                      <td>
					  <a style="text-align:center;" href="#dialog-popup" class="print_kartu" data-toggle="modal" id="'.$pkj['namars'].'"><span class="glyphicon glyphicon-print"></a>
					 <!-- <a style="text-align:center;" href="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistriku/<?php echo $pkj['koders'] ; ?>">Show</a>
                    <!-- <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>PktKerjaListrik/editpkj/<?php echo $pkj['idpktkrj']; ?>"><i class="fa fa-pencil"></i></a>
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
  
  
 <!--Modal DIALOG PDF--> 
  <div class="modal fade" id="dialog-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="fa fa-file-pdf-o"></span>&nbsp;PREVIEW PAKET PEKERJAAN LISTRIK</h4>
      </div>
      <div class="modal-body" id="MyModalBody">
		...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>  Tutup</button>
        </div>
    </div>
  </div>
</div>
<!-- akhir kode modal dialog -->

	<script>
	$(document).ready(function() {
		// ketika tombol detail ditekan
		$('.print_kartu').on("click", function(){
		// ambil nilai id dari link print
		var namars= this.id;
		$("#MyModalBody").html('<iframe src="<?php echo base_url();?>LaporanPktkrjListrik/cetak_pkjlistriku/" frameborder="no" width="570" height="400"></iframe>');
		});	
	});
	
	</script>		
  
  
    
  
  
  
<!-- modal RS
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
	<div class="panel panel-primary">
	     <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
	      <div class="modal-body">

     <form action="<?php echo base_url(); ?>LaporanPktkrjListrik/cetak_pkjlistriku" method="POST">
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
end modal -->



    
