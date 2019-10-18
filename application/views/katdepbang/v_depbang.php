 <section class="content-header"><br><br>
    <h1 style="text-align:center;font-weight:bold;font-family:verdana;" >
        KATALOG PRODUK DEPBANG
        <small></small>
    </h1><br>
    <div class="col-lg-4" style="margin-left:32%;">
    <div class="panel panel-primary"></div>
  </div>
    </section>      
  <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
         
 <section class="col-lg-12">

      <div class="table-responsive">
              <table id="datatables9" class="table table-bordered table-striped table-hover">

                  <thead>
                    <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">
                     
               <th style="text-align:center;">No</th>
               <th style="text-align:center;">Kode Transaksi</th>
               <th style="text-align:center;">Tanggal</th>
                <th style="text-align:center;">Rumah Sakit</th>
                <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_aprove as $pkj) 
          {

          $no++ ?>
        <tr>
                     
            <td style="text-align:center;"><?php echo $no; ?></td>
             <td style="text-align:center;"><?php echo ($pkj['kode_trans']); ?></td>
            <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
            <td style="text-align:center;"><?php echo ($pkj['namars']); ?></td>
             <td style="text-align:center;"> 
               <a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/lihattrdepbang/<?php echo $pkj['tanggal']; ?>/<?php echo $pkj['kode_trans']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
               
             <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Laporandepbang/cetak_depbang/<?php echo $pkj['kode_trans']; ?>"><i class="fa fa-print">&nbspPRINT</i></a>
             </td>
            <?php } ?>
                  </tbody>          
        </table>

    </form>
</div>
</div></tr></tbody></table>
</section>