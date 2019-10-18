 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b><p> MASTER SETUP</p><p>WILAYAH PENGIRIMAN PER PERUSAHAAN</p></b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
   <!--  <a style="margin-left:1%;" href="<?php echo base_url(); ?>Alkesrr" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a> -->
    <br><br>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                     <dl class="dl-horizontal">
               <div class="col-lg-12">
                       <div class="col-lg-4"></div>
				  <div class="col-lg-4">
 <form role="form" action="<?php echo base_url(); ?>C_set_wil/savedata" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                      <label for="">PERUSAHAAN</label><br>
                        <select data-placeholder="Pilih Perusahaan" name="koper" class="form-control chosendara1" required>
                          <option></option>
                          <?php foreach($kpr as $row) { ?>
                              <option value="<?php echo $row['koper'] ?>"><?php echo $row['nm_perusahaan'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>

                    <input type="radio" name="tab" value="" onclick="show1();" />
                      Regional
                     <input type="radio" name="tab" value="" onclick="show2();" />
                      Rumah Sakit<br><br>

                  <div class="form-group" id="divdara1" style="display: none;">
                      <label for="">REGIONAL</label><br>
                        <select data-placeholder="pilih regional" name="kode_wilayah[]" multiple class="form-control chosendara1">
                          <option value="-"></option>
                          <?php foreach($kodereg as $row) { ?>
                              <option value="<?php echo $row['kode_regional'] ?>"><?php echo $row['nm_regional'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                
                      <div class="form-group" id="divdara2" style="display: none;">
                      <label for="">Rumah Sakit</label><br>
                        <select data-placeholder="Pilih Rumah Sakit" multiple  name="kode_wilayah[]"  class="form-control chosendara1">
                          <option value="-"></option>
                          <?php foreach($kdrsedit as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
            </div><div class="col-lg-4"></div></div>
                      
            
        </div>
        <div class="col-lg-12">
        <div style="text-align:center;" class="form-actions">
            <button type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo site_url('C_set_wil')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>
</div>
 <div class="well">
   
        <div class="row-fluid">
           
                      <br>                

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        <div class="table-responsive">
          <table id="darasetwil" class="table table-bordered table-striped table-hover table-condensed" style="width: 100%">
                   <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">NO</th>
                    <th style="vertical-align: middle; text-align: center;">PERUSAHAAN</th>
                    <th style="vertical-align: middle; text-align: center;">KODE WILAYAH</th>
                    <th style="vertical-align: middle; text-align: center;">REGIONAL</th>
                     <th style="vertical-align: middle; text-align: center;">RUMAH SAKIT</th>
                    <th style="vertical-align: middle; text-align: center;">DELETE</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                   <tr bgcolor="grey" style="font-family: verdana; color: white;">
                     <th style="vertical-align: middle; text-align: center;">NO</th>
                    <th style="vertical-align: middle; text-align: center;">PERUSAHAAN</th>
                    <th style="vertical-align: middle; text-align: center;">KODE WILAYAH</th>
                    <th style="vertical-align: middle; text-align: center;">REGIONAL</th>
                     <th style="vertical-align: middle; text-align: center;">RUMAH SAKIT</th>
                   <th style="vertical-align: middle; text-align: center;">DELETE</th>
               </tr>
            </tfoot>
                
                </table>
               </div></div></div>
               
  