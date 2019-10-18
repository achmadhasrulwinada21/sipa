 <section class="content-header">
         <br/>
                     <?php

                      $principal= $prod->principal;
                      $solo_agent= $prod->solo_agent;
                      $distributor= $prod->distributor;
                      $subdistributor= $prod->subdistributor;
                      $status='-';

                      if ($principal=='v'){
                        $status='Principal';
                      }elseif($solo_agent=='v'){
                        $status='Solo Agent';
                      }elseif($distributor=='v'){
                        $status='Distributor';
                        }elseif($subdistributor=='v'){
                        $status='Subdistributor';
                      }else{
                         $status='-';
                        }
?>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK ALKES</b><br>
          <b><?php echo $prod->nm_perusahaan ?></b><br>
           <b>Status Rekanan</b><span> : </span><b><?php echo $status; ?></b><br>
          <b>Tanggal Transaksi</b><span> : </span><b><?php echo $prod->tanggal_tr ?></b>
        </h4>
        
        </section>
 <div class="box">
              <div class="box-body chat" id="chat-box">
        <!-- Main content -->
               <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
               <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
<a class="btn btn-success btn-md" href="<?php echo base_url(); ?>Alkestransaksi/lihattralkes/<?php echo $prod->tanggal_tr ?>/<?php echo $prod->kode_trans ?>" style="margin-left:1%"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a>       
<br><br>
         <div class="panel panel-primary"></div>    
          </div></div>   
                  </div>
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Nama Produk</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Merk</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;width:20%">Tipe</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga(X)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">DISCOUNT(%)(Z)</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Harga Akhir (P =(X*Z))</th>
                   <th rowspan="4" style="vertical-align: middle;text-align: center;">Total Harga(A=(P*ppn%))</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">E-KAT</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Non E-KAT</th>
                      <th colspan="19" style="vertical-align: middle;text-align: center;">Garansi</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Register</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Non Register</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Cash Back(%)(Y)</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Cash Back(A*Y)</th>
                    <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya Free</th>
                      <th rowspan="4" style="vertical-align: middle;text-align: center;">Biaya Non Free</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Nominal Biaya</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Keterangan</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Catatan</th>
                     <th rowspan="4" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                     <th colspan="19" style="vertical-align: middle;text-align: center;">Kontrak Servis</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Free</th>
                      <th rowspan="2" style="vertical-align: middle;text-align: center;">Full</th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Tahun ke</th>
                      <th style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Persentase (%) (B)</th>
                      <th  style="vertical-align: middle;text-align: center;"></th>
                      <th colspan="5" style="vertical-align: middle;text-align: center;">Nominal (Rp) L = (A x B)</th>
                  </tr>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                   <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;"></th>
                   <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  <th style="vertical-align: middle;text-align: left;"></th>
                  <th style="vertical-align: middle;text-align: left;">1</th>
                  <th style="vertical-align: middle;text-align: left;">2</th>
                  <th style="vertical-align: middle;text-align: left;">3</th>
                  <th style="vertical-align: middle;text-align: left;">4</th>
                  <th style="vertical-align: middle;text-align: left;">5</th>
                  </tr>
                    
                  </thead><tbody>
<?php
$no=0;
          foreach ($data_prods2 as $tr){
            $no++
?>
        <tr  style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['type']; ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['harga'], 0,',','.'); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['discount']; ?> %</td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['harga_akhir'], 0,',','.'); ?></td>
           <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['total'], 0,',','.'); ?></td>  
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['e_kat']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['non_e_kat']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansifree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['garansi']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke2']; ?></td>  <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tahunke5']; ?></td> 
            <td style="vertical-align: middle;text-align: center;"></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase1']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase2']; ?></td>  <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase3']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase4']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['persentase5']; ?></td>
            <td style="vertical-align: middle;text-align: center;"></td>
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominal1'], 0,',','.'); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominal2'], 0,',','.'); ?></td>  
<td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format( $tr['nominal3'], 0,',','.'); ?></td>
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominal4'], 0,',','.'); ?></td> 
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominal5'], 0,',','.'); ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['register']; ?></td>  <td style="vertical-align: middle;text-align: center;"><?php echo $tr['non_register']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['cashback']; ?></td> 
            <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominal_cashback'], 0,',','.'); ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['biayafree']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['biayanonfree']; ?></td>
           <td style="vertical-align: middle;text-align: center;">Rp.<?php echo number_format($tr['nominalbiaya'], 0,',','.'); ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ket']; ?></td> 
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['note']; ?></td>
            <td style="vertical-align: middle;text-align: center;">   
             <a style="margin-bottom:3px;" target="blank" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Laporanalkes/cetak_alkesproduk/<?php echo $tr['iddetailalkes']; ?>"><i class="fa fa-print">&nbspPRINT</i></a>
                     
                   </td>
        </tr>
            <?php  } ?>
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods2); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>




