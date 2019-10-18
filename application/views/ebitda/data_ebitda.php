	 <!-- <?php 
 //$ynwa = //($this->session->userdata('koderole'));
         // if($ynwa!='10'):?>
  <ul class="nav nav-tabs">
	  <li class="active"><a href="<?php //echo base_url(); ?>form_kegiatan">Form Rencana</a></li>
     <li class=""><a href="<?php //echo base_url(); ?>form_kegiatan/Disetujui_rencana">Form Realisasi</a></li>
     <li class=""><a href="<?php //echo base_url(); ?>form_kegiatan/selesai">Form Laporan</a></li>
	  <li class=""><a href="<?php //echo base_url(); ?>mkegiatan">Master Acara</a></li>
    <li class=""><a href="<?php //echo base_url(); ?>msesi">Master Kegiatan</a></li>	 
	</ul> 
<?php// endif;?> -->

<script type='text/javascript' src='//code.jquery.com/jquery-1.8.3.js'></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css') ?>">
    <script type='text/javascript' src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true,
    format:'yyyy'
      
});
});

</script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>	    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b> FORM EBITDA</b>
        </h4>
        </section>
   
        <!-- Main content -->
        <section class="content">
           <div class="row">
          <!-- Small boxes (Stat box) -->
                     <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?>  
         
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Ebitda/savedatas" method="POST"  enctype="multipart/form-data">
                  <div class="col-lg-12" >
          
				  <div class="box-body chat" id="chat-box" >
<br>
				  <div class="col-lg-6">
                   <div class="form-group">
                      <label for="">Kode Transaksi</label>
                        <input type="text" class="form-control" value="<?php echo $kode_ebitda; ?>" id="" name="kode_ebitda" required readonly>
                    </div> 
<br>
                    <div class="form-group">
                      <label for="">Rumah Sakit</label>
                        <select id="koders" name="koders" class="form-control" required>
                          <option value="-">--Pilih Rumah Sakit--</option>
                          <?php foreach($rs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                     
                        <input type="hidden" class="form-control" value="" id="" name="namars" required></div>
<br>
                   
                    <div class="form-group">
                      <label for="">PERIODE</label>
                        <input type="text" class="form-control" value="" id="datepicker21" name="periode" autocomplete="off" required></div>              
             
        
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit"  class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('Ebitda')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
    </form>
</div>
<?php endif;?>
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 
                 
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
      <a data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fa fa-print"></i> PRINT BY PERIODE </a>
      <a data-toggle="modal" data-target="#myModal1" class="btn btn-danger"><i class="fa fa-bar-chart"></i> PERBANDINGAN </a>
      <!-- <a data-toggle="modal" data-target="#myModal2" class="btn btn-warning"><i class="fa fa-bar-exel"></i> CETAK EXEL </a>
      <a data-toggle="modal" data-target="#myModal3" class="btn btn-danger"><i class="fa fa-bar-chart"></i> CETAK PERBANDINGAN </a> -->
         <!-- <a style="margin-bottom:3px;margin-left: 7px;" href="<?php //echo base_url(); ?>produko/addabk" class="btn btn-info no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a> -->
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables6" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="info" style="color:black;font-weight: bold;">
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                      <th  style="vertical-align: middle;text-align: center;">KODE TRANSAKSI</th>
                      <th  style="vertical-align: middle;text-align: center;">RUMAH SAKIT</th>
                      <th  style="vertical-align: middle;text-align: center;">PERIODE</th>
                        <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
					            <th  style="vertical-align: middle;text-align: center;">TAMBAH TARGET</th>
                      <th  style="vertical-align: middle;text-align: center;">TAMBAH NILAI REAL</th>
                       <?php endif;?>
                      <th  style="vertical-align: middle;text-align: center;">EDIT</th>
                        <?php 
              $ynwa = ($this->session->userdata('koderole'));
                    if($ynwa!='10'):?> 
                       <th  style="vertical-align: middle;text-align: center;">HAPUS</th>                                 <?php endif;?>
                    </tr>
                    <!-- <tr class="info" style="color:black;font-weight: bold;">
                      <th>RUMAH SAKIT</th>
                      <th>DEPARTEMEN</th>
                    </tr> -->
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_ebitda as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="danger" style="color:black;font-weight: bold;">
                      <td><?php echo $no; ?></td>
                       <td><a href="<?php echo base_url(); ?>Ebitda/tampil_rencana/<?php echo $row['idebitda']; ?>"><?php echo $row['kode_ebitda']; ?></a></td>
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                    <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
					            <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Ebitda/adddetail/<?php echo $row['idebitda']; ?>"><i class="fa fa-plus"></i></a></td>
                        <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Ebitda/adddetail2/<?php echo $row['idebitda']; ?>"><i class="fa fa-plus"></i></a></td>
                         <?php endif;?>
                         <td style="vertical-align: middle;text-align: center;">
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Ebitda/editabk/<?php echo $row['idebitda']; ?>"><i class="fa fa-edit"></i></a></td>
                          <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
                       
                        

                        <!-- <a style="margin-bottom:3px;" target="blank" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Laporanprodukob/cetak_produkob/<?php echo $row['idpr']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 

                     <!-  <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php// echo base_url(); ?>produko/tampil/<?php// echo $row['idpr']; ?>"><i class="fa fa-desktop"></i></a>  -->

                      
                    <!--  <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php// echo base_url(); ?>produko/editproduko/<?php// echo $row['idpr']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  -->
                     <td style="vertical-align: middle;text-align: center;">
                      <a  onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Ebitda/hapusprod/<?php echo $row['idebitda']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
                     </td>
                     <?php endif;?>
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
              
               </div></div>
                
            </div><!-- /.box -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
         
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->




     <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">CETAK EBITDA PER PERIODE</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Lapebitda/cetak_ebitda" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker22" type="text" name = "periode_awal" placeholder="periode_awal..." autocomplete="off" required />
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker23" type="text" name = "periode_akhir" placeholder="periode_akhir..." autocomplete="off" required />
      </div> 
      <?php $namars=($this->session->userdata('namars')); ?>
       <input class="form-control"  style="margin-bottom: : 3px" id="" value="<?php echo $namars; ?>" type="hidden" name = "namars" placeholder="" required />   
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit"  class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->


 <div id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">PILIH PERIODE</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Lapebitda/data_perbandingan" method="POST" >

      <div class="input-daterange input-group" id="datepicker">
    <input type="text" class="input-sm form-control" name="periode_awal" placeholder="From date" required autocomplete="off" />
    <span class="input-group-addon">s/d</span>
    <input type="text" class="input-sm form-control" name="periode_akhir" placeholder="To date" required autocomplete="off"/>
</div><br>
 <?php $namars=($this->session->userdata('namars')); ?>
       <input class="form-control"  style="margin-bottom: : 3px" id="" value="<?php echo $namars; ?>" type="hidden" name = "namars" placeholder="" required />
          <input type="submit"  class="btn btn-info" value="PROSES">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          
                </fieldset>
                </form>   
                </div></div></div></div></div>  



                <div id="myModal3" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">PILIH PERIODE</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Lapebitda/cetak_perbandingan" method="POST" >

      <div class="input-daterange input-group" id="datepicker">
    <input type="text" class="input-sm form-control" name="periode_awal" placeholder="From date" required />
    <span class="input-group-addon">s/d</span>
    <input type="text" class="input-sm form-control" name="periode_akhir" placeholder="To date" required />
</div><br>
 <?php $namars=($this->session->userdata('namars')); ?>
       <input class="form-control"  style="margin-bottom: : 3px" id="" value="<?php echo $namars; ?>" type="hidden" name = "namars" placeholder="" required />
          <input type="submit"  class="btn btn-info" value="PROSES">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          
                </fieldset>
                </form>   
                </div></div></div></div></div>  



                 <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content modal-sm">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color:black;">CETAK EBITDA PER PERIODE</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Lapebitda/cetak_exel" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker24" type="text" name = "periode_awal" placeholder="periode_awal..." autocomplete="off" required />
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker25" type="text" name = "periode_akhir" placeholder="periode_akhir..." autocomplete="off" required />
      </div> 
      <?php $namars=($this->session->userdata('namars')); ?>
       <input class="form-control"  style="margin-bottom: : 3px" id="" value="<?php echo $namars; ?>" type="hidden" name = "namars" placeholder="" required />   
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit"  class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div> 