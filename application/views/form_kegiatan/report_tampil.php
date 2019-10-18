<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN REALISASI</b>
        </h4>
        
        </section>
 
        <!-- Main content -->

        <section class="content">
             
           <div class="box"><br>
             <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa=='10'):?> 
            <span style="margin-left: 20px;"><a href="<?php echo base_url(); ?>form_kegiatan" class="btn btn-success"><i class="fa fa-home">&nbspKembali</i></a></span>
            <?php endif;?>
                                  <?php 
 $ynwa = ($this->session->userdata('koderole'));
          if($ynwa!='10'):?> 
             <span style="margin-left: 20px;"><a href="<?php echo base_url(); ?>form_kegiatan/disetujui_rencana" class="btn btn-success"><i class="fa fa-home">&nbspForm Realisasi</i></a></span>
              <span style="margin-left: 20px;"><a href="<?php echo base_url(); ?>form_kegiatan/selesai" class="btn btn-info"><i class="fa fa-home">&nbspForm Laporan</i></a></span>
             <?php endif;?>
              <div class="box-header">
                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <td width="120"><b>NAMA ACARA</b></td><td width="10">:</td><td width="300"><b><?php echo $abk->nama_kegiatan ?></b> </td></tr>
                     <?php if($abk->departemen !='-' and  $abk->nama_rs =='-' ): ?>
                      <tr>  <td width="120"><b>DEPARTEMEN</b></td><td width="10">:</td><td width="300"><b><?php echo $abk->departemen ?></b> </td></tr>
                      <?php endif;?>
                      <?php if( $abk->nama_rs !='-' and $abk->departemen =='-' ): ?>
                    <tr>   <td width="120"><b>RUMAH SAKIT</b></td><td width="10">:</td><td width="300"><b><?php echo $abk->nama_rs ?></b> </td>
                   </tr>
                   <?php endif;?>
                    <tr>   <td width="120"><b>TANGGAL ACARA</b></td><td width="10">:</td><td width="300"><b><?php echo $abk->tanggal_acara ?> </b></td>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <br> 
                  <b style="margin-left:20px"><u>A. SUMBER DANA</u></b><br>
                 <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">No</th>
                      <th style="vertical-align: middle;text-align: center;">Sumber Dana</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah</th>
                      <th style="vertical-align: middle;text-align: center;">Harga</th>
                      <th style="vertical-align: middle;text-align: center;">Total</th>
                      
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                        $total=0;
                     foreach($dana as $row) { 
                               $no++                              
                             
                      ?>
                    <tr class="info">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['sumber_dana']; ?></td>
                       <td><?php echo $row['qty']; ?></td>
                      <td><?php echo (number_format($row['harga'], 0,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['total'], 0,',','.')); ?>,- </td>                   
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                              $total+=$row['total'];
                             }?>

                             <tr style="background-color:#AFEEEE">
                               <td colspan="4" style="vertical-align:middle;text-align:center;font-size:21px;"><b>JUMLAH</b></td>
                                <td>Rp.<?php echo (number_format($total, 0,',','.')); ?>,-</td>
                             </tr>
                  </tbody>
                
                </table>
               </div></div></div></div>           
           <div class="panel panel-primary"></div>
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                </div><!-- /.box-title -->
                <b style="margin-left:20px"><u>B. REALISASI BIAYA</u></b><br>
                <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;" colspan="2">Rencana Anggaran</th>
                       <th style="vertical-align: middle;text-align: center;">Jumlah Rencana</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Rencana</th>
                       <th style="vertical-align: middle;text-align: center;">Jumlah Realisasi</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Realisasi</th>
                      <th style="vertical-align: middle;text-align: center;">Perencanaan</th>
                      <th style="vertical-align: middle;text-align: center;">Realisasi</th>
                      <!-- <th style="vertical-align: middle;text-align: center;">Selisih</th> -->
                                                                            
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                         $rencana=0;
                         $real=0;
                         $selisih=0;
                          $jum = 1;
                     foreach($data_abks as $row) { 
                                                     
                             
                      ?>
                    <tr class="info">
                       <?php   if($jum <= 1) { ?>
                      <td rowspan="<?php echo $row['jumlah1']; ?>"><?php echo $row['nama_sesi']; ?></td>
                       <?php
                       $jum = $row['jumlah1'];      
                                          
                      } else {
                    $jum = $jum - 1;
                          }

                          ?>
                      <td><?php echo $row['kegiatan']; ?></td>
                      <td style="text-align: center;"><?php echo (number_format($row['jumlah'], 0,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['harga'], 0,',','.')); ?>,-</td>
                      <td style="text-align: center;"><?php echo (number_format($row['jumlah_real'], 0,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['harga_real'], 0,',','.')); ?>,-</td>
                      <td>Rp.<?php echo (number_format($row['perencanaan'], 0,',','.')); ?>,- </td>
                      <td>Rp.<?php echo (number_format($row['realisasi'], 0,',','.')); ?>,-</td>
                      <!--  <td>Rp.<?php// echo (number_format($row['selisih'], 0,',','.')); ?>,-</td>  -->
                                           
                    </tr>
                              <?php
                              
                              $rencana+=$row['perencanaan'];
                              $real+=$row['realisasi'];
                              // $selisih+=$row['selisih'];
                             }?>

                              <tr style="background-color:#AFEEEE">
                               <td colspan="6" style="vertical-align:middle;text-align:center;font-size:21px;"><b>JUMLAH</b></td>
                                <td>Rp.<?php echo (number_format($rencana, 0,',','.')); ?>,-</td>
                                <td>Rp.<?php echo (number_format($real, 0,',','.')); ?>,-</td>
                                <!-- <td>Rp.<?php //echo (number_format($selisih, 0,',','.')); ?>,-</td> -->
                             </tr>
                  </tbody>
                
                </table>
               <br><br>
               <div class="panel panel-primary"></div>
               <b style="margin-left:20px"><u>C. SELISIH PENDAPATAN DAN PENGELUARAN BIAYA</u></b><br>
                 <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">Total Pendapatan</th>
                      <th style="vertical-align: middle;text-align: center;">Total Pengeluaran</th>
                      <th style="vertical-align: middle;text-align: center;">Total Selisih</th>
                                           
                                                       
                    </tr>
                  </thead>
                  <tbody>
                 <?php  $hasil=$real-$total; ?>
                    <tr class="info">
                      <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($total, 0,',','.')); ?>,-</td>
                       <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($real, 0,',','.')); ?>,-</td>
                      <td style="vertical-align: middle;text-align: center;">Rp.<?php echo (number_format($hasil, 0,',','.')); ?>,-</td>              
                    </tr>
                             
                   
                              
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



