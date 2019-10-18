  <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DETAIL PRODUK OBAT</span></b>
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
                    <td style="text-align:left;"><?php echo $daraanisa->nm_perusahaan ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>FOI</td>
                    <td style="text-align:left;"><?php echo $daraanisa->foi ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>MOU</td>
                    <td style="text-align:left;"><?php echo $daraanisa->mou ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>PKS RENEWAL</td>
                    <td style="text-align: left;"><?php echo $daraanisa->pks ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>DISTRIBUTOR</td>
                    <td style="text-align: left;"><?php echo $daraanisa->nm_distributor ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>NAMA PRODUK</td>
                    <td style="text-align: left;"><?php echo $daraanisa->nama_obat ?></td>
                  </tr>
                  <tr style="font-family:verdana;">
                    <td>HARGA SATUAN</td>
                    <td style="text-align:left;">RP. <?php echo number_format($daraanisa->harga, 0,',','.') ?>,-</td>
                  </tr>
                 <tr style="font-family:verdana;">
                    <td>TIPE HARGA</td>
                    <td style="text-align:left;"><?php echo $daraanisa->tipe_harga ?></td>
                  </tr>     
                  <!-- <tr style="font-family:verdana;">
                    <td>DISKON</td>
                    <td style="text-align:left;"><?php echo number_format($daraanisa->discount, 0,',','.') ?> %</td>
                  </tr> -->
                  <tr style="font-family:verdana;">
                    <td>KOMPOSISI</td>
                    <td style="text-align:left;"><?php echo $daraanisa->komposisi ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>GOLONGAN</td>
                    <td style="text-align:left;"><?php echo $daraanisa->klasifikasinama ?></td>
                  </tr>  
                  <tr style="font-family:verdana;">
                    <td>NOTE</td>
                    <td style="text-align:left;"><?php echo $daraanisa->catatan ?></td>
                  </tr>                               
              </table>        
      </section></section>
