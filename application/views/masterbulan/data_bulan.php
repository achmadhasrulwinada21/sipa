<!-- <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>form_kegiatan">Form Rencana</a></li>
    <li class=""><a href="<?php echo base_url(); ?>mkegiatan">Master Kegiatan</a></li>
    <li class="active"><a href="<?php echo base_url(); ?>msesi">Master Rincian</a></li>  
  </ul>  -->
	 <section class="content-header">
    <h1 style="text-align:center;" >
        Master Bulan
        <small></small>
    </h1><br>
    <div class="col-lg-10">
      <div style="margin-left:22%;" class="panel panel-primary"></div></div>
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 		  
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Bulan/savedata" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12">
				  
				  <div class="box-body chat" id="chat-box">
				
                    <div hidden class="form-group">
                      <label for="">kode bulan</label>
                        <input readonly type="text" class="form-control" value="<?php echo $kodebulan; ?>" id="" name="kodebulan">
                    </div>
					
					<div class="form-group">
                      <label for="">Nama Bulan</label>
                        <input type="text" class="form-control" value="" id="" name="namabulan" placeholder="MASUKAN NAMA BULAN"  required>
                    </div>
										
				</div>
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('Bulan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>

 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
					             <th style="text-align:center;">No</th>
                      <!-- <th style="text-align:center;">Sesi</th> -->
					            <th style="text-align:center;">Nama Bulan</th>
                      <th style="text-align:center;"> Delete </th>
                      </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_sesi as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					 <td style="text-align:center;"><?php echo $no; ?></td>
					<!--   <td style="text-align:center;"><?php //echo ($pkj['sesi']); ?></td> -->
					  <td style="text-align:center;"><?php echo ($pkj['namabulan']); ?></td>
             <td style="text-align:center;">
                      
                      <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Bulan/hapus_item/<?php echo $pkj['idbul']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
					  </td>
					<?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div>






