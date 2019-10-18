<ul class="nav nav-tabs">
  <?php
   $kodedara=($this->session->userdata('koderole'));
     if($kodedara =='1' or $kodedara =='67' ):?>
        <li class="active"><a href="<?php echo base_url(); ?>C_mstproduk">Data Produk Obat</a></li>
    <?php endif;?>

    <?php
     $kodedara=($this->session->userdata('koderole'));
       if($kodedara =='1'):?>
          <li class=""><a href="<?php echo base_url(); ?>C_mstproduk/alkes">Data Produk alkes</a></li>
     <?php endif;?>

    <?php
     $kodedara=($this->session->userdata('koderole'));
       if($kodedara =='1' or $kodedara =='66' or $kodedara =='72' or $kodedara =='74' ):?>
          <li class=""><a href="<?php echo base_url(); ?>C_mstproduk/alum">Data Produk alum</a></li>
    <?php endif;?>

     <?php
      $kodedara=($this->session->userdata('koderole'));
        if($kodedara =='1'):?>
          <li class=""><a href="<?php echo base_url(); ?>C_mstproduk/depbang">Data Produk DepBang</a></li>
     <?php endif;?>
  </ul>    

<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>

<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">   

   <!-- <script src="<a class="vglnk" href="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" rel="nofollow"><span>https</span><span>://</span><span>oss</span><span>.</span><span>maxcdn</span><span>.</span><span>com</span><span>/</span><span>html5shiv</span><span>/</span><span>3</span><span>.</span><span>7</span><span>.</span><span>2</span><span>/</span><span>html5shiv</span><span>.</span><span>min</span><span>.</span><span>js</span></a>"></script>
      <script src="<a class="vglnk" href="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" rel="nofollow"><span>https</span><span>://</span><span>oss</span><span>.</span><span>maxcdn</span><span>.</span><span>com</span><span>/</span><span>respond</span><span>/</span><span>1</span><span>.</span><span>4</span><span>.</span><span>2</span><span>/</span><span>respond</span><span>.</span><span>min</span><span>.</span><span>js</span></a>"></script> -->


 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> DATA PRODUK OBAT</span></b>
        </h4>
        </section>
               
        <!-- Main content -->
        
          <!-- Small boxes (Stat box) -->
           <div class='box-header with-border'> 
        <!-- <a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_mstproduk/form"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a> -->

        <a style="margin-bottom:3px" href="<?php echo base_url("Excel_import/obat"); ?>" class="btn btn-warning no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA FROM EXCEL </a>

        <a style="margin-bottom:3px" href="<?php echo base_url('C_mstproduk/v_export_excel') ?>" class="btn btn-danger no-radius dropdown-toggle">
        <i class="glyphicon glyphicon-upload"></i> EXPORT DATA TO EXCEL </a>
      </div>
  
             
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_mstproduk/savedata" method="POST"  enctype="multipart/form-data">
                  
          
				  <!-- <div class="box-body chat" id="chat-box"> -->

				  <div class="col-lg-12">
          </div>
          <div class="col-lg-6">
                    <input type="hidden" class="form-control" id="" name="tipe_produk" value="TP001" required>
                    <div class="form-group">
                      <label for="">KODE OBAT</label>
                        <input type="text" class="form-control" id="" name="kode_obat">
                    </div>

                    <div class="form-group">
                      <label for="">NAMA OBAT</label>
                        <input type="text" class="form-control" id="" name="nama_obat" required>
                    </div>

                    <div class="form-group">
                      <label for="">KOMPOSISI</label>
                      <textarea rows="4" cols="54" class="form-control" name="komposisi" ></textarea>
                    </div>

                     <div class="form-group">
                      <label for="">GOLONGAN</label> <br>
                        <select data-placeholder="Pilih Golongan" name="golonganid" class="form-control chosen1" required>
                          <option></option>
                          <?php foreach($golongan as $row) { ?>
                              <option value="<?php echo $row['klasifikasiid'] ?>"><?php echo $row['klasifikasinama'] ?></option>
                          <?php } ?>
                        </select>  
                    </div>

                  </div>

                   <div class="col-lg-6">
                
                      <div class="form-group">
                      <label for="">PERUSAHAAN</label><br>
                        <select data-placeholder="Pilih Perusahaan" name="koper" class="form-control chosen1" required>
                          <option></option>
                          <?php foreach($koper as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
                        </select>  
                    </div>

                    <div class="form-group">
                      <label for="">DISTRIBUTOR</label><br>
                        <select data-placeholder="Pilih Distributor" name="kodis" class="form-control chosen1" required>
                          <option></option>
                          <?php foreach($kodis as $row) { ?>
                              <option value="<?php echo $row['kodis'] ?>"><?php echo $row['nm_distributor'] ?></option>
                          <?php } ?>
                        </select>  
                    </div>

                    <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" id="" name="harga" value="0" required>
                    </div>

                    <div class="form-group">
                      <label for="">DISCOUNT</label>
                        <input type="text" class="form-control"  id="" name="discount" value="0" required>
                    </div>

                 

                  

                    <div class="form-group">
                      <label for="">SATUAN</label><br>
                        <select data-placeholder="Pilih Satuan" name="satuanid" class="form-control chosen1" required>
                          <option></option>
                          <?php foreach($satuan as $row) { ?>
                              <option value="<?php echo $row['satuanid'] ?>"><?php echo $row['satuannama'] ?></option>
                          <?php } ?>
                        </select>  
                    </div>

                  <!--  <div class="form-group">
                      <label for="">PERSENTASE</label>
                        <input type="text" class="form-control" id="" name="persentase" required>
                    </div>

                    <div class="form-group">
                      <label for="">MERK</label>
                        <input type="text" class="form-control" id="" name="merk" required>
                    </div> -->

            </div>
                      
            
       <br>

        <div class="col-lg-12">
        <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('C_mstproduk')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>

 
            <div class="col-md-12">
                      <br>
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
        
              
                </div><!-- /.box-title -->
                
               
      <div class="table-responsive">
                <div class="box-body">

                  
        <!-- <div class="table100 ver5 m-b-110"> -->
          

                  <!-- <table id="datatables5" class="table table-bordered table-striped"> -->
        
        <br>
        <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
          
            <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Komposisi</th>
                    <th style="vertical-align: middle; text-align: center;">Golongan</th>
                    <!-- <th style="vertical-align: middle; text-align: center;">Tipe Produk</th> -->
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                    <th style="vertical-align: middle; text-align: center;">Distributor</th>

                     <th style="vertical-align: middle; text-align: center;">Harga (Rp)</th>
                      <th style="vertical-align: middle; text-align: center;">Diskon</th>
                       <th style="vertical-align: middle; text-align: center;">Satuan</th>
                      <!--  <th style="vertical-align: middle; text-align: center;">Persentase</th>
                         <th style="vertical-align: middle; text-align: center;">Merk</th> -->

                    <th style="vertical-align: middle; text-align: center;">Aksi</th>
                    
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                <tr bgcolor="grey" style="font-family: arial; color: white;">
                    <th style="vertical-align: middle; text-align: center;">No</th>
                    <th style="vertical-align: middle; text-align: center;">Kode Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Nama Obat</th>
                    <th style="vertical-align: middle; text-align: center;">Komposisi</th>
                    <th style="vertical-align: middle; text-align: center;">Golongan</th>
                    <!-- <th style="vertical-align: middle; text-align: center;">Tipe Produk</th> -->
                    <th style="vertical-align: middle; text-align: center;">Perusahaan</th>
                    <th style="vertical-align: middle; text-align: center;">Distributor</th>

                     <th style="vertical-align: middle; text-align: center;">Harga (Rp)</th>
                      <th style="vertical-align: middle; text-align: center;">Diskon</th>
                       <th style="vertical-align: middle; text-align: center;">Satuan</th>
                       <!-- <th style="vertical-align: middle; text-align: center;">Persentase</th>
                         <th style="vertical-align: middle; text-align: center;">Merk</th> -->
                    <th style="vertical-align: middle; text-align: center;">Aksi</th>

                    
                </tr>
            </tfoot>
        </table>
    </div>
</div>
        
        <!-- Main row -->
