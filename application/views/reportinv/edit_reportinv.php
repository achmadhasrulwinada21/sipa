
      <section class="content-header">
        <h1>
          <b>EDIT DATA REPORT</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
      </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM EDIT REPORT</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>reportinv/updatereportinv" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label for="">ID REPORT</label>
                        <input type="hidden" class="form-control" value="<?php echo $id_invrep; ?>" id="" name="id_invrep" placeholder="Report" required>
                    </div>

                    <div class="form-group">
                      <label for="">ACCOUNT NO</label>
                        <input type="text" class="form-control" value="<?php echo $no_rek; ?>" id="" name="no_rek" placeholder="Isikan Account No" required>
                    </div>
                    <div class="form-group">
                      <label for="">DATE</label>
                        <input type="date" class="form-control" value="<?php echo $tanggal; ?>" id="" name="tanggal" placeholder="Isikan Tanggal" required>                        
                    </div>
                    <div class="form-group">
                      <label for="">VALUE DATE</label>
                        <input type="date" class="form-control" value="<?php echo $val_tanggal; ?>" id="" name="val_tanggal" placeholder="Isikan Value Tanggal" required>
                    </div>
                    <div class="form-group">
                      <label for="">ACCOUNT NO ALIAS</label>
                        <input type="text" class="form-control" value="<?php echo $atas_nama; ?>" id="" name="atas_nama" placeholder="Isikan Nama" required>
                    </div>
                    <div class="form-group">
                      <label for="">DESCRIPTION</label>
                        <input type="text" class="form-control" value="<?php echo $deskripsi; ?>" id="" name="deskripsi" placeholder="Isikan Deskripsi" required>
                    </div>
                    <div class="form-group">
                      <label for="">REFERENCE NO</label>
                        <input type="text" class="form-control" value="<?php echo $reference_no; ?>" id="" name="reference_no" placeholder="Reference" required>
                    </div>
                    <div class="form-group">
                      <label for="">DEBIT</label>
                        <input type="text" class="form-control" value="<?php echo $debit; ?>" id="" name="debit" placeholder="Masukan Nilai Debit" required>
                    </div>
                    <div class="form-group">
                      <label for="">CREDIT</label>
                        <input type="text" class="form-control" value="<?php echo $credit; ?>" id="" name="credit" placeholder="Masukan Nilai Credit" required>
                    </div>
                    <div class="form-group">
                      <label for="">Balance</label>
                        <input type="text" class="form-control" value="<?php echo $balance; ?>" id="" name="balance" placeholder="Nilai Balance" required>
					</div>
					
				  
                  </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>reportinv" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
