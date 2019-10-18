
 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>HISTORI LISTING RR  PRODUK ALAT KESEHATAN</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
   <div class="col-lg-12">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <form role="form"  action="<?php echo base_url(); ?>Alkesrr/historiexcelalkesrr" method="POST" enctype="multipart/form-data">
                                 <div class="form-group"> 
                                         PERUSAHAAN:<br>
                                     <select name="koper" id="dara" class="form-control" data-placeholder="pilih perusahaan">
                                   <option></option>
                                   <?php foreach($kpr as $dt) { ?>
                                        <option value=<?php echo $dt['koper'] ; ?>>
                                         <?php echo $dt['nm_perusahaan']?></option>
                                        <?php  } ?>
                                      </select>
                                    </div>

                                <div class="form-group">
                                         PERIODE AWAL:<br>
                                        <input type="text" id="datepicker11" name="tglawal" class="form-control" autocomplete="off" >
                                    </div>
                                      <b>s/d</b><br><br>
                                    <div class="form-group">
                                        PERIODE AKHIR:<br>
                                        <input type="text" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off" >
                                    </div>
                          
                        </div>
                        <div class="col-lg-4"></div>
                        </div>
                         <div style="text-align:center;" class="form-actions">
            <button  type="submit" class="btn btn-info"><i class="fa fa-print"></i> Expor to Excel </button>
            <a href="<?php echo base_url(); ?>Alkesrr/historialkes" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div><br>
     </form>
   
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                     <dl class="dl-horizontal">
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                
                </div><!-- /.box-title -->
      <div class="well">
   
        <div class="row-fluid">
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="tablehistori" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th style="vertical-align: middle; text-align: center;">Fee Management</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                     <th style="vertical-align: middle; text-align: center;">Type</th>
                      <th style="vertical-align: middle; text-align: center;">Merk</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Barang</th>
                     <th style="vertical-align: middle; text-align: center;">Harga</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: verdana; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Tanggal Transaksi</th>
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th style="vertical-align: middle; text-align: center;">Fee Management</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Produk</th>
                     <th style="vertical-align: middle; text-align: center;">Type</th>
                      <th style="vertical-align: middle; text-align: center;">Merk</th>
                    <th style="vertical-align: middle; text-align: center;">Jenis Barang</th>
                     <th style="vertical-align: middle; text-align: center;">Harga</th>
                    <th style="vertical-align: middle; text-align: center;">lihat</th>
                   </tr>
            </tfoot>
        </table>
    </div>
  </div>
               </div>
            </div><!-- /.box -->
         
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        
     
<!------- modal -------->


