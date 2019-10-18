  <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DETAIL PRODUK ALUM</span></b>
        </h4>
        </section>
    
        <section class="content">
               <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
                    <!-- chat item -->
                <div class="item">
                 
            <div class="col-md-12">
                      <br>
              
              <div class="box">
            </div>
               <table  class="table table-bordered table-striped table-havor"> 
                  <tr style="font-family:verdana;">
                    <td>PERUSAHAAN</td>
                    <td style="text-align:left;"><?php echo $alum->nm_perusahaan ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>KONTAK</td>
                    <td style="text-align:left;"><?php echo $alum->contact ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>WILAYAH</td>
                    <td style="text-align:left;"><?php echo $alum->nm_regional ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>NAMA PRODUK</td>
                    <td style="text-align: left;"><?php echo $alum->nama_produk ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>Spesifikasi Teknis</td>
                    <td style="text-align:left;"><?php echo $alum->deskripsi ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>MERK</td>
                    <td style="text-align: left;"><?php echo $alum->merk ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>SATUAN</td>
                    <td style="text-align: left;"><?php echo $alum->satuannama ?></td>
                  </tr>
                  <tr style="font-family:verdana;">
                    <td>GARANSI</td>
                    <td style="text-align: left;"><?php echo $alum->garansi ?> TAHUN</td>
                  </tr>
                  <tr style="font-family:verdana;">
                    <td>VOLUME</td>
                    <td style="text-align: left;"><?php echo $alum->volume ?></td>
                  </tr>


                  <!--<tr style="font-family:verdana;">
                    <td>HARGA BARU</td>
                    <td style="text-align:left;">RP. <?php echo number_format($alum->harga_baru, 0,',','.') ?>,-</td>
                  </tr>-->
                  <!--<tr style="font-family:verdana;">
                    <td>HARGA LAMA</td>
                    <td style="text-align:left;">RP. <?php echo number_format($alum->harga_lama, 0,',','.') ?>,-</td>
                  </tr>-->
                  <!--<tr style="font-family:verdana;">
                    <td>PERSENTASE KENAIKAN / PENURUNAN</td>
                    <td style="text-align:left;"><?php echo number_format($alum->persentase, 0,',','.') ?> %</td>
                  </tr>-->  
                  <!--<tr style="font-family:verdana;">
                    <td>HARGA EXC PPN</td>
                    <td style="text-align:left;">RP. <?php echo number_format($alum->harga_excppn, 0,',','.') ?>,-</td>
                  </tr>-->
                  <!--<tr style="font-family:verdana;">
                    <td>HARGA INC PPN</td>
                    <td style="text-align:left;">RP. <?php echo number_format($alum->harga_incppn, 0,',','.') ?>,-</td>
                  </tr>-->    
                  <tr style="font-family:verdana;">
                    <td>HARGA </td>
                    <td style="text-align:left;">RP. <?php echo number_format($alum->harga_incppnfee, 0,',','.') ?>,-</td>
                  </tr>
                  <!--<tr style="font-family:verdana;">
                    <td>PERSENTASE KENAIKAN / PENURUNAN</td>
                    <td style="text-align:left;"><?php echo number_format($alum->persentase_ppn, 0,',','.') ?> %</td>
                  </tr>--> 
                  <tr style="font-family:verdana;">
                    <td>KETERANGAN</td>
                    <td style="text-align:left;"><?php echo $alum->ket ?></td>
                  </tr>                              
              </table>        
      </section></section>
