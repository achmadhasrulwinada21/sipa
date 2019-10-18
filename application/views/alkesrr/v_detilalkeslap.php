 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>DETAIL PRODUK ALKES</b><br><b><?php echo $prod->nm_perusahaan;?></b><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs"><br>
 <a style="margin-left:1%" href="<?php echo base_url('Alkesrr/cetakalkes')?>" class="btn-sm btn-plat btn-success"><i class="fa fa-home"></i>&nbspHome</a>
     <br><br>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid">
                     <dl class="dl-horizontal">
                            </div>
                    </div>
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="well">
   
        <div class="row-fluid">
          <form method="post" action="<?php echo base_url(); ?>Alkesrr/updateproduk_aktif" id="form-delete21">
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr  style="font-weight:bold;color:white" bgcolor="#4682B4">
                  <th  style="vertical-align: middle;text-align: center;">No</th>
                  <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                  <th  style="vertical-align: middle;text-align: center;">Merk</th>
                  <th  style="vertical-align: middle;text-align: center;">Type</th>
                  <th  style="vertical-align: middle;text-align: center;">Jenis Barang</th>
                   <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
                  <th  style="vertical-align: middle;text-align: center;">Aktif/non Aktif</th>
                <?php endif; ?>
                  <th style="vertical-align: middle;text-align: center;">Status</th>
                  <th style="vertical-align: middle;text-align: center;">Catatan</th>
                    <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
                  <th style="text-align:center;"><input type="checkbox" id="check-all21">CHECK ALL<br> <button id="btn-delete21" class="btn btn-danger no-radius dropdown-toggle"><i class='fa fa-floppy-o'></i>&nbspOK</button></th>
                <?php endif; ?>
                   </tr>
                                                  
                    
                  </thead><tbody>
 <?php
$no=0;
          foreach ($data_alkes as $tr){
            $no++
?> 
        <tr  style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;">
            <input type="hidden" name="kode_produk[]" value="<?php echo $tr['kode_produk'] ; ?>">
            <input type="hidden" name="kode_transaksi" value="<?php echo $tr['kode_transaksi'] ; ?>">
            <?php echo $tr['nama_produk']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['type']; ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['jns_barang']; ?></td>
           <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
          <td style="vertical-align: middle;text-align: center;">
             <select  id="liverpool" name="stsproduk_detil[]" class="daracui form-control" data-placeholder="-- Pilih Status --" required>
                <option required></option>
                 <option <?php if ($tr['stsproduk_detil'] == "aktif") echo 'selected' ; ?> value="aktif">aktif</option>
                 <option <?php if ($tr['stsproduk_detil'] == "non aktif") echo 'selected' ; ?> value="non aktif">non aktif</option>
           </select><br><br>
            <textarea style="display: none" id="kopites" name='ctt_stsproduk[]' id="" class='form-control' rows='2' placeholder="Isikan Catatan" style='resize: vertical; width:83%;'><?php echo $tr['ctt_stsproduk']; ?></textarea>
          </td>
        <?php endif; ?>
          <td style="vertical-align: middle;text-align: center;">
            <?php 
          $status= $tr['stsproduk_detil'];
           if($status=='aktif'){
          ?>
          <p style="color:white;font-weight:bold;background-color:green;line-height:20px;"><?php echo $status; ?></p>
           <?php }else{ ?>
           <p style="color:white;font-weight:bold;background-color:red;line-height:20px;"><?php echo $status; ?></p>
         <?php } ?>
          </td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['ctt_stsproduk']; ?></td>
                              <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
          <td style="vertical-align: middle;text-align: center;">
                  <input type="checkbox" name="iddetilalkesrr[]" value="<?php echo $tr['iddetilalkesrr']; ?>" class="check-item21">          
                   </td>
              <?php endif; ?>
        </tr>
            <?php  } ?> 
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b>  <?php echo count($data_alkes); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
            </div>
            </div>

</form>


