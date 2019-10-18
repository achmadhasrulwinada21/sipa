   
          <section class="content-header">
    <h1>
        Pengadaan Obat
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Menu STPD</li>
    </ol>
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>pengadaan/addpengadaan" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH </a>
				<!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>LaporanPengadaan/cetak_pengadaan" target='blank' class="btn btn-danger"><i class="fa fa-thumb-tack"></i> PRINT ALL </a> -->
			  <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>&nbspPRINT BY NO PKS</button>
			  <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				<div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                  <th width="150" rowspan="2" style="text-align:center;vertical-align: middle;" >NO PKS</th>
                  <th width="200" rowspan="2" style="text-align:center;vertical-align: middle;">RS / PT</th>
                  <th width="200" rowspan="2" style="text-align:center;vertical-align: middle;">REKANAN</th>
                  <th width="100" rowspan="2" style="text-align:center;vertical-align: middle;">TENTANG</th>
                  <th width="100" rowspan="2" style="text-align:center;vertical-align: middle;">TANGGAL PERJANJIAN</th>
                  <th width="100" rowspan="2" style="text-align:center;vertical-align: middle;">JANGKA WAKTU PERJANJIAN</th>
                  <th width="200" rowspan="2" style="text-align:center;vertical-align: middle;">HARGA / DISKON</th>
                  <th width="100" colspan="2" style="text-align:center;">HAK DAN KEWAJIBAN PARA PIHAK</th>
                  <th width="100" rowspan="2" style="text-align:center;vertical-align: middle;">PIC</th>
                  <th width="100" rowspan="2" style="text-align:center;vertical-align: middle;">STATUS</th>
                  <th width="400"  >AKSI</th>
                    </tr>
                        <tr>
                         <th width="200">RS/ PT</th>
                         <th width="200">REKANAN</th>
                        </tr>
                  </thead>
                  <tbody>
                     <?php $no=0; 
                       foreach($data_pengadaan as $m) { $no++ ?>
                    <tr>
                      <td width="150" ><?php echo $m['no_pks']; ?></td>
                      <td width="200"><?php echo $m['rs']; ?></td>
                      <td width="200"><?php echo $m['rekanan']; ?></td>
                      <td width="100"><?php echo $m['tentang']; ?></td>
                      <td width="100"><?php echo $m['tanggal_perjanjian']; ?></td>
                      <td width="200"><?php echo $m['jangka_waktu']; ?></td>
                      <td width="100"><?php echo $m['harga']; ?></td>
                      <td width="700"><?php echo $m['hak_rs']; ?></td>
                      <td width="700"><?php echo $m['hak_rekanan']; ?></td>
                      <td width="100"><?php echo $m['pic']; ?></td>
                      <td width="100"><?php echo $m['status']; ?></td>
                      <td>
                      <a style="margin-bottom:5px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>pengadaan/editpengadaan/<?php echo $m['id_pengadaan']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                      <a  style="margin-bottom:5px;" onclick="return confirm('Anda Yakin Hapus Data ini??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>pengadaan/hapuspengadaan/<?php echo  $m['id_pengadaan']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                 <?php } ?>
                   
                  </tbody>
                </table>
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

<form action="<?php echo base_url(); ?>LaporanPengadaan/cetak_pengadaan" target='blank' method="POST">
        <div class="form-group"> 
             KODE:<br>
         <select name="no_pks" class="form-control">
       <option> Pilih Kode : </option>
	   <?php foreach($id_pengadaan as $dt) { ?>
            <option value=<?php echo $dt['no_pks'] ; ?>>
             <?php echo $dt['no_pks']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
    
   