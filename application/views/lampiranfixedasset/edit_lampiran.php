
      <section class="content-header">
        <h1 style="text-align: center;">
          <b>EDIT LAMPIRAN FIXED ASSET</b>
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
                <i class="fa fa-pencil"></i>
                <h3 class="box-title">EDIT LAMPIRAN FIXED ASSET</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>lampiranfixedasset/updatelampiran" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                    <div class="form-group">

                      <label for=""></label>
                        <input type="hidden" class="form-control" value="<?php echo $id_sl;?>" id="" name="id_sl" placeholder="" readonly="" >
                    </div>

                    <div class="form-group">
                      <label for="">NO. SURAT</label>
                        <input type="text" class="form-control" value="<?php echo $no_sp;?>" id="" name="no_sp" placeholder="" readonly="" >
                    </div>


                    <div class="form-group">
                      <label for="">HEADER LAMPIRAN</label>
                        <textarea type="text" class="form-control" id="" name="thn_semester"><?php echo $thn_semester; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 1</label>
                        <textarea type="text" class="form-control" id="" name="lap_eks"><?php echo $lap_eks; ?></textarea>                      
                    </div>

                     <div class="form-group">
                      <label for="">LAMPIRAN 2</label>
                        <textarea type="text" class="form-control" id="" name="ba_hapus_fa"><?php echo $ba_hapus_fa; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 3</label>
                        <textarea type="text" class="form-control" id="" name="ba_hapus_brg"><?php echo $ba_hapus_brg; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 4</label>
                        <textarea type="text" class="form-control" id="" name="bk_bsr_gl"><?php echo $bk_bsr_gl; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 5</label>
                        <textarea type="text" class="form-control" id="" name="analisa_aktiva"><?php echo $analisa_aktiva; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 6</label>
                        <textarea type="text" class="form-control" id="" name="analisa_atnilai"><?php echo $analisa_atnilai; ?></textarea>                      
                    </div>
                    
                    <div class="form-group">
                      <label for="">LAMPIRAN 7</label>
                        <textarea type="text" class="form-control" id="" name="analisa_atnilai_gl"><?php echo $analisa_atnilai_gl; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 8</label>
                        <textarea type="text" class="form-control" id="" name="laporan_at"><?php echo $laporan_at; ?></textarea>                      
                    </div>

                     <div class="form-group">
                      <label for="">LAMPIRAN 9</label>
                        <textarea type="text" class="form-control" id="" name="lap_perbaikan_brg"><?php echo $lap_perbaikan_brg; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 10</label>
                        <textarea type="text" class="form-control" id="" name="lap_pemeliharaan_brg"><?php echo $lap_pemeliharaan_brg; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 11</label>
                        <textarea type="text" class="form-control" id="" name="lap_hapus_fa"><?php echo $lap_hapus_fa; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 12</label>
                        <textarea type="text" class="form-control" id="" name="jurnal_hapus"><?php echo $jurnal_hapus; ?></textarea>                      
                    </div>

                    <div class="form-group">
                      <label for="">LAMPIRAN 13</label>
                        <textarea type="text" class="form-control" id="" name="kertas_kerja"><?php echo $kertas_kerja; ?></textarea>                      
                    </div>

                </div><!-- /.item -->

                 <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>lampiranfixedasset" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
              
               
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->

        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

