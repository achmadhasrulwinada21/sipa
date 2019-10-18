 <section class="content-header">
    <h1 style="text-align:center;" >
        KATALOG PRODUK OBAT
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
            
 <div class="box-body">
				  
           <div class="box-body table-responsive">
              <table id="datatables9" class="table table-bordered table-striped">

                  <thead bgcolor="#DCDCDC" >
                    <tr>
                     
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
           
             <td style="text-align:center;"> 
              <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/lihattrfarmasi/<?php echo $pkj['idtrcom']; ?>/<?php echo $pkj['tanggal']; ?>"><i class="fa fa-desktop">&nbsplihat</i></a> 
             <!--  <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/aprove_detail/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-plus">&nbsptambah detail</i></a>  -->
              <!-- <a style="margin-bottom:3px;" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/editaprove/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-edit">&nbspedit</i></a>  -->
                <!-- <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Farmasitransaksi/hapustrfarmasi/<?php echo $pkj['idtrcom']; ?>"><i class="glyphicon glyphicon-remove"></i></a> -->
                <a style="margin-bottom:3px;" target="blank" class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>Laporanprinsipal/cetak_compare_obat2/<?php echo $pkj['idtrcom']; ?>"><i class="fa fa-print">&nbspPRINT</i></a> 
             </td>
            <?php } ?>
                  </tbody> 				  
        </table>

    </form>
</div>
</div></tr></tbody></table></div></div></div></div></section>