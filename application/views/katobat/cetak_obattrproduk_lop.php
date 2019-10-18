  <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DETAIL PRODUK OBAT</span></b>
        </h4>
        </section>
		
	
			<a style="margin-left:2%" href="<?php echo base_url(); ?>obat_reg/addtrfarmasinew" class="btn btn-success"><i class="icon-remove-sign"></i> KEMBALI </a>    
     
		
		
		
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
                    <td style="text-align:left;"><?php echo $obatview_lop->nm_perusahaan ?></td>
                  </tr> 
                   <tr style="font-family:verdana;">
                    <td>DISTRIBUTOR</td>
                    <td style="text-align: left;"><?php echo $obatview_lop->nm_distributor ?></td>
                  </tr> 
				  <tr style="font-family:verdana;">
				  <td>KODE PRODUK</td>
                    <td style="text-align:left;"><?php echo $obatview_lop->kode_obat ?></td>
                  </tr> 
                  <tr style="font-family:verdana;">
                    <td>NAMA PRODUK</td>
                    <td style="text-align: left;"><?php echo $obatview_lop->nama_obat ?></td>
                  </tr>
                  <tr style="font-family:verdana;">
                    <td>HARGA SATUAN</td>
                    <td style="text-align:left;">RP. <?php echo number_format($obatview_lop->harga_akhir_baru, 0,',','.') ?>,-</td>
                  </tr>
                
                  <!-- <tr style="font-family:verdana;">
                    <td>DISKON</td>
                    <td style="text-align:left;"><?php echo number_format($obatview_lop->discount_baru, 0,',','.') ?> %</td>
                  </tr> -->
                  <tr style="font-family:verdana;">
                    <td>KOMPOSISI</td>
                    <td style="text-align:left;"><?php echo $obatview_lop->komposisi ?></td>
                  </tr>  
                   <tr style="font-family:verdana;">
                    <td>GOLONGAN</td>
                    <td style="text-align:left;"><?php echo $obatview_lop->golonganid ?></td>
                  </tr>  
                  <tr style="font-family:verdana;">
                    <td>NOTE</td>
                    <td style="text-align:left;"><?php echo $obatview_lop->catatan ?></td>
                  </tr>                               
              </table>        
      </section></section>
