  

	<ul class="nav nav-tabs">
	  <li><a href="<?php echo base_url(); ?>PktKerjaListrik">Compare Harga</a></li>
	  <li><a href="<?php echo base_url(); ?>EvaluasiPekRekLis">Rekap Evaluasi</a></li>
	  <li class="active"><a href="<?php echo base_url(); ?>rekananlistrik">Database Rekanan</a></li>
	</ul>

  
  
  <section class="content-header">
    <h1>
        Data Rekanan Listrik
        <small></small>
    </h1>
    <ol class="breadcrumb">
      
    </ol>
  </section>

           <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
			
			 
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>rekananlistrik/addrekanan" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA REKANAN </a>
               <a style="margin-bottom:3px" href="<?php echo base_url(); ?>laporanrekanan/cetak_rekanan" target='blank' class="btn btn-danger"><i class="fa fa-thumb-tack"></i> PRINT ALL </a>
              <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-thumb-tack"></span>PRINT BY RS</button>

              <div class="box box-primary">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">        
              </div><!-- /.box-title -->
              

			  
                <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                  <!--    <th>NO</th>-->
                    <!--   <th>IDTR</th> -->
                      <th style="text-align:center;">NO</th>

                      <th style="text-align:center;">NAMA RUMAH SAKIT</th>
                      <th style="text-align:center;">URAIAN KERJA</th>
                      <th style="text-align:center;">KM MANDIRI</th>
                      <th style="text-align:center;">TRISANDIRA</th>
                      <th style="text-align:center;">TRISAHABAT</th>
                      <th style="text-align:center;">TRABAS REKA BUANA</th>
                      <th style="text-align:center;">SEKAWAN KONTRINDO</th>
					  <th style="text-align:center;">STATUS PERSETUJUAN</th>
                      <th style="text-align:center;">AKSI</th>

                     <!-- <th>Tanggal</th>
                      <th>createddate</th>
                      <th>updateby</th>
                      <th>createddate</th>
                      <th>updatedate</th>-->
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0; foreach($data_rekanan as $row) { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                          <!--<td><?php echo $row['id_tr']; ?></td>--> 
                      <!--<td><?php echo $row ['id_rek_listrik'] ; ?></td>-->
                      <td style="text-align:left;"><?php echo $row['nm_rs'] ; ?></td>
                      <td><?php echo $row['uraian_kerja'] ; ?></td>

                      <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['km_mandiri']; if($c1=='t') echo " Checked "?>>
                      </td>

                      <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['trisandira']; if($c1=='t') echo " Checked "?>>
                      </td>

                      <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['trisahabat']; if($c1=='t') echo " Checked "?>>
                      </td>
                      <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['tribas_reka_buana']; if($c1=='t') echo " Checked "?>>
                      </td> 
                      <td style="text-align:center;"><input type="checkbox" disabled="" <?php echo $c1= $row['sekawan_kontrindo']; if($c1=='t') echo " Checked "?>>
                      </td> 
					  
					  <td>
                       <?php 
						if($row['status'] == "1") {
						  echo '<p style="background-color:green;color:white;text-align:center;">Disetujui</p>';
						}elseif($row['status'] == "2"){
						  echo '<p style="background-color:blue;color:white;text-align:center;">Direvisi</p>';
						}elseif($row['status'] == "3"){
						  echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
						}else{
						  echo '<p style="background-color:gold;color:black;text-align:center;">Menunggu Persetujuan</p>';
						}
						?>   
                      </td>
                    <!--  <td><?php echo $row['tanggal'] ; ?></td>    
                      <td><?php echo $row['createdby']; ?></td> 
                      <td><?php echo $row['updateby'] ; ?></td> 
                      <td><?php echo $row['createddate']; ?></td>         
                      <td><?php echo $row['updatedate']; ?></td>--> 
                      <td style="text-align:center;">
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>rekananlistrik/editrekanan/<?php echo $row['id_rek_listrik']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" target='_blank' href="<?php echo base_url(); ?>rekananlistrik/hapusrekanan/<?php echo $row['id_rek_listrik']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                   <?php } ?>
                  </tbody>
               </table>
              </div>
            </div>
           </div><!--/.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
	  
	  
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

 <!----> <form action="<?php echo base_url(); ?>laporanrekanan/cetak_rekanans" method="POST">
        <div class="form-group"> 
             CARI RUMAH SAKIT :<br>
         <select name="koders" class="form-control">
       <option> --Pilih Rumah Sakit --</option>
	   <?php foreach($optRumahSakit as $row) { ?>
            <option value=<?php echo $row['koders'] ; ?>><?php echo $row['nm_rs']?>
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
    
	  
	  
