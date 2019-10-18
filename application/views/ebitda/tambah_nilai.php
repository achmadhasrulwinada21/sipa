<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>NILAI REAL EBITDA</b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">

           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Ebitda/savedata_real" method="POST" enctype="multipart/form-data">
                    <table class="table-common">
                        <div class="panel panel-primary"></div>
                     <div class="col-lg-4">
                     <input type="hidden" class="form-control" value="<?php echo $ebit->idebitda ?>" id="" name="kode_nilai" style="background-color:#7FFFD4">

                      <div class="form-group">
                      <label for="">BULAN</label>
                        <select id="idtarebit" name="idtarebit" class="form-control" required>
                          <option value="-">--Pilih Bulan--</option>
                          <?php foreach($bulans as $row) { ?>
                              <option value="<?php echo $row['idtarebit'] ?>"><?php echo $row['namabulan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

                      <input type="hidden" class="form-control" value="" name="kodebulan" id=""/> 
                      <input type="hidden" class="form-control" value="" name="namabulan" id=""/>                 
                    </div>
                    

                 <div class="col-lg-4">

                    <div class="form-group">
                      <label for="">Nilai Target</label>
                       <input type="text" onkeypress="return wajibAngka(event)" class="form-control" value="" name="nilai_target" id="" readonly/>                 
                    </div>
                 </div>
                    <div class="col-lg-4">

                     <div class="form-group">
                  <label for="">Nilai Real</label>
                  <input onkeypress="return wajibAngka(event)" type="text" class="form-control"  value=""  name="nilai_real" id="" placeholder="" required/> </div> 
                  </div>
                   
          <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat" onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');">Simpan</button>
                  <a href="<?php echo base_url(); ?>Ebitda" class="btn btn-warning btn-block btn-flat">Kembali</a>
               </div>
                </table>
                
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            
              
          
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <tr>   <td width="100">RUMAH SAKIT</td><td width="10">:</td><td width="300"><?php echo $ebit->namars ?> </td>
                   </tr>
                   <tr>   <td width="120">PERIODE</td><td width="10">:</td><td width="300"><?php echo $ebit->periode ?> </td>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger" style="font-weight: bold">
                      <th style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Bulan</th>
                      <th style="vertical-align: middle;text-align: center;">Nilai Target</th>
                      <th style="vertical-align: middle;text-align: center;">Nilai Real</th>
                      <th style="vertical-align: middle;text-align: center;">Aksi</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_nilai as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="info" style="text-align: center;font-weight: bold">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['namabulan']; ?></td>
                      <td><?php echo $row['nilai_target']; ?></td>
                      <td><?php echo $row['nilai_real']; ?></td>
                     <td style="text-align: center;">
                      <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Ebitda/editrealisasi/<?php echo $row['idnilebit']; ?>"><i class="fa fa-edit"></i></a>
                      <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Ebitda/hapusrealisasi/<?php echo $row['idnilebit']; ?>/<?php echo $row['kode_nilai']; ?>"><i class="glyphicon glyphicon-remove"></i></a>                                         
                     <!--  <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['idnilebit'];?>"><i class="glyphicon glyphicon-remove"></i></a> -->
                     </td>
                      
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div>
              
                <!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

<?php
        foreach($data_nilai as $i){
        $idnilebit = $i['idnilebit'];
        $kode_nilai = $i['kode_nilai'];
        $kodebulan = $i['kodebulan'];
        $namabulan = $i['namabulan'];
        $nilai_target = $i['nilai_target'];
        $nilai_real = $i['nilai_real'];          
              
              
         ?>
<div id="modal_edit<?php echo $idnilebit;?>" class="modal fade">
  <div class="modal-dialog modal-sm">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">HAPUS</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>ebitda/hapusreal" method="POST" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <input type="hidden" class="form-control" value="<?php echo $idnilebit;?>" id="" name="idnilebit">
                      <input type="hidden" class="form-control" value="<?php echo $kode_nilai;?>" id="" name="kode_nilai">
                      <input type="hidden" class="form-control" value="<?php echo $kodebulan;?>" id="" name="kodebulan">
                      <input type="hidden" class="form-control" value="<?php echo $namabulan;?>" id="" name="namabulan">
                       <input type="hidden" class="form-control" value="<?php echo $nilai_target;?>" id="" name="nilai_target">
                      <input type="hidden" class="form-control" value="<?php echo $nilai_real;?>" id="" name="nilai_real">
                        </div>
                             <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block btn-flat">yakin hapus</button>
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->

