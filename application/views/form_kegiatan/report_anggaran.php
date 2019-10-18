<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN</b>
        </h4>
        
        </section>
 
        <!-- Main content -->

        <section class="content">
             
           <div class="box"><br>
             <span style="margin-left: 20px;"><a href="<?php echo base_url(); ?>form_kegiatan" class="btn btn-success"><i class="fa fa-home">&nbspKembali</i></a></span>
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
                 
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                </div><!-- /.box-title -->
               
                <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger" style="font-weight: bold">
                      <th style="vertical-align: middle;text-align: center;" colspan="2">Rencana Anggaran</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah</th>
                      <th style="vertical-align: middle;text-align: center;">Harga</th>
                      <th style="vertical-align: middle;text-align: center;">Total</th>
                     </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                         $rencana=0;
                         $jum = 1;
                              foreach($data_abkss as $row) { 
                                                        
                             
                      ?>
                    <tr class="info" style="font-weight: bold">
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
                      <td>Rp.<?php echo (number_format($row['total'], 0,',','.')); ?>,-</td> 
                                           
                    </tr>
                              <?php
                              
                              $rencana+=$row['total'];
                                }?>

                              <tr style="background-color:#AFEEEE;font-weight: bold">
                               <td colspan="4" style="vertical-align:middle;text-align:center;"><b>JUMLAH</b></td>
                                <td>Rp.<?php echo (number_format($rencana, 0,',','.')); ?>,-</td>
                                </tr>
                  </tbody>
                
                </table>
              
               </div></div></div></div></div></div></div></section>
                <!-- /.col -->
               



