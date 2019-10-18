 <section class="content-header">
    <h1 style="text-align:center;" >
        LAPORAN RR-LISTING PRODUK ALUM
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 	<br>
             <a style="margin-left:2%" class="btn btn-success btn-md" href="<?php echo base_url(); ?>produko2/alum"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="datatables4" class="table table-bordered table-striped">

            <thead>
            <tr bgcolor="grey"  style="color:white;font-weight:bold;font-family:verdana;">    
					     <th style="text-align:center;">No</th>
               <th style="text-align:center;">Tanggal</th>
               <th style="text-align:center;">Aksi</th>
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_aprove as $pkj) 
					{

					$no++ ?>
				<tr>
                     
					  <td style="text-align:center;"><?php echo $no; ?></td>
					  <td style="text-align:center;"><?php echo ($pkj['tanggal']); ?></td>
            <!-- <td style="text-align:justify;"><?php echo ($pkj['namars']); ?></td> -->
             <td style="text-align:center;"> 
              <a style="margin-bottom:3px;" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>produko2/lihattralumlap/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat transaksi</i></a> 
              <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>lapalum/cetak_alum/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div></div></div></div></div></section>
