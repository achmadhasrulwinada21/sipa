        <section class="content-header">
        <h1>
          <b>DATA</b>
		 <br>FORMULIR PERSETUJUAN DIREKSI GROUP 
		  <br>ATAS PERMINTAAN ALAT KESEHATAN / ALAT UMUM INVESTASI
        </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
				<button data-toggle="modal" data-target="#myModal2" class="btn btn-success"><span class="fa fa-thumb-tack"></span>CETAK RINCIAN BARANG</button>
				<div class="box">
				<div class="table-responsive">
                <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center">
                      <!-- <th>no</th>-->
                      <th width="30" style="vertical-align:middle;text-align:center">No.</th>
                      <th width="80" style="vertical-align:middle;text-align:center">ID Formulir</th>
                      <th width="150" style="vertical-align:middle;text-align:center">NAMA BARANG</th>
                      <th width="100" style="vertical-align:middle;text-align:center">JUMLAH UNIT / SATUAN</th>
                      <th width="150" style="vertical-align:middle;text-align:center">PENGAJUAN BARANG BARU / PENGGANTIAN BARANG LAMA</th>
                      <th width="150" style="vertical-align:middle;text-align:center">UNTUK RUANGAN / INSTALASI</th>
                      <th style="vertical-align:middle;text-align:center">HARGA UNIT</th>
                      <th style="vertical-align:middle;text-align:center">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_detbarang as $dt) { $no++ ?>
                    <tr>
                      <td style="vertical-align:middle;text-align:center"><?php echo $no; ?></td>
                      <td style="vertical-align:middle;text-align:center"style="vertical-align:middle;text-align:center"><?php echo $dt['id_formulir']; ?></td>
                      <td><?php echo $dt['nama_barang']; ?></td>
                      <td style="vertical-align:middle;text-align:center"><?php echo number_format ($dt['jumlah'], 0, ".", "."); ?> Unit</td>
					  <td><?php echo $dt['kondisi_barang']; ?></td>
					  <td><?php echo $dt['instalasi']; ?></td>
                      <td>Rp. <?php echo number_format ($dt['harga'], 0, ".", "."); ?></td>
                      <td>Rp. <?php echo number_format ($dt['grand_total'], 0, ".", "."); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
  
  <!-- modal -->
     <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK FORMULIR PERSETUJUAN</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanBarang/cetak_rincian" target='blank' method="POST">
        <div class="form-group"> 
		<label type="hidden" for="">No. FORMULIR :</label>
		  
		  <select name="id_formulir" class="form-control">
                          <option value='0'>--Pilih No. FORMULIR--</option>
                            <?php foreach($formulir as $datakd) {
                          if(!in_array($datakd['id_formulir'],$idfor_post)){ ?>
                              <option  value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option> 
                               <?php } else { ?>
                              <option selected="selected" value="<?php echo $datakd['id_formulir'] ?>"><?php echo $datakd['no_formulir'] ?></option>
                          <?php }} ?>
						  
						  
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