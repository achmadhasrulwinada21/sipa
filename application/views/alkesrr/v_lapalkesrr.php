
 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>MENU AKTIF / NON AKTIF REKANAN ALAT KESEHATAN</b><br><br>
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
                            <form role="form"  action="<?php echo base_url(); ?>Alkesrr/principalexcel" method="POST" enctype="multipart/form-data">
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
                                   STATUS PERUSAHAAN:<b style="color:red;"> * </b><br>
                                <select name="status_prinsipal" id="" class="dara form-control" data-placeholder="pilih aktif/non aktif" required>
                             <option required></option>
                             <option value="aktif">AKTIF</option>
                             <option value="non aktif">NON AKTIF</option>                               
                                </select>
                              </div>       
                         <div class="form-group"> 
                                   STATUS PRODUK: <b style="color:red;"> * </b><br>
                               <select name="stsproduk_detil" id="" class="dara form-control" data-placeholder="pilih aktif/non aktif" required>
                             <option required></option>
                             <option value="aktif">AKTIF</option>
                             <option value="non aktif">NON AKTIF</option>                               
                                </select>
                              </div>                          
                        </div>
                        <div class="col-lg-4"></div>
                        </div>
                         <div style="margin-left:35%" class="form-actions">
            <button  type="submit" class="btn btn-info"><i class="fa fa-print"></i> Expor to Excel </button>
            <a href="<?php echo base_url(); ?>Alkesrr/cetakalkes" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div><br>
     </form>
    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">                   
                 <div class="row-fluid"><br>
                  <button data-toggle="modal" data-target="#myModal" class="btn btn-success" style="margin-left:2%"><span class="glyphicon glyphicon-search"></span>&nbspcari per perusahaan</button><a style="margin-left:1%" href="<?php echo base_url(); ?>Alkesrr/cetakalkes" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> REFRESH </a><br> 
                     <dl class="dl-horizontal">
                             

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
                
                </div><!-- /.box-title -->
      <div class="well">
   
        <div class="row-fluid">
     <form method="post" action="<?php echo base_url(); ?>Alkesrr/update_aktif" id="form-delete2">
        <div class='row'>
                  <div class='col-sm-12' style='padding-right: 0px;'>
                  </div>
                  <div class='col-sm-6'></div>
                  <div class='col-sm-2' style="margin-left:90%;">
                  
                   </div>
                </div>
       
                <div class="table-responsive">
                <div class="box-body">      
        <br>
        <table id="tb-datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">No</th>                 
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Perusahaan</th>
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Prinsipal</th>                 
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Solo Agent</th>
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Distributor</th>
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Sub Distributor</th>
                           <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
                     <th rowspan="2" style="vertical-align: middle; text-align: center;">Aktif/Non Aktif</th>
                   <?php endif; ?>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Status</th>
                         <th rowspan="2" style="vertical-align: middle; text-align: center;">Catatan</th>
                          <th colspan="2" style="vertical-align: middle; text-align: center;">Aksi</th></tr>
                       
                         <tr bgcolor="#4682B4" style="font-family: verdana; color: white;">
                            <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
                  <th  style="vertical-align: middle; text-align: center;"> <input type="checkbox" id="check-all">CHECK ALL<br> <button id="btn-delete" class="btn btn-danger no-radius dropdown-toggle"><i class='fa fa-floppy-o'></i>&nbspOK</button></th> 
                            <?php endif; ?>
                          <th style="vertical-align: middle; text-align: center;">lihat</th>
                            </tr>
            </thead>
            <tbody>
              <?php
$no=0;
          foreach ($data_alkes as $tr){
            $no++
?> 
             <tr style="font-family:verdana;font-size:12px;text-align:center;">
              <td><?php echo $no; ?></td>
              <td><?php echo $tr['nm_perusahaan']; ?></td>
              <td><?php echo $tr['principal']; ?></td>
              <td><?php echo $tr['solo_agent']; ?></td>
              <td><?php echo $tr['distributor']; ?></td>
              <td><?php echo $tr['subdistributor']; ?></td>
              <?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?>
              <td>
                <select  id="status_prinsipal21" name="status_prinsipal[]" class="daracui form-control" data-placeholder="-- Pilih Status --" required>
                <option required></option>
                 <option <?php if ($tr['status_prinsipal'] == "aktif") echo 'selected' ; ?> value="aktif">aktif</option>
                 <option <?php if ($tr['status_prinsipal'] == "non aktif") echo 'selected' ; ?> value="non aktif">non aktif</option>
           </select><br><br>
            <textarea style="display: none" id="catatan_stsprinsipal21" name='catatan_stsprinsipal[]' id="" class='form-control' rows='2' placeholder="Isikan Catatan" style='resize: vertical; width:83%;'><?php echo $tr['catatan_stsprinsipal']; ?></textarea>

              </td>
            <?php endif; ?>
              <td>
                <?php 
          $status= $tr['status_prinsipal'];
           if($status=='aktif'){
          ?>
          <p style="color:white;font-weight:bold;background-color:green;line-height:20px;"><?php echo $status; ?></p>
           <?php }else{ ?>
           <p style="color:white;font-weight:bold;background-color:red;line-height:20px;"><?php echo $status; ?></p>
         <?php } ?>
              </td>
              <td><?php echo $tr['catatan_stsprinsipal']; ?><input type="hidden" name="koper[]" value="<?php echo $tr['koper']?>"></td>
             
<?php 
               $ynwa = ($this->session->userdata('koderole'));
                if($ynwa=='82'):  
              ?> <td><input type="checkbox" class="check-item" id="" name="kode_transaksi[]" value="<?php echo $tr['kode_transaksi'];?>" ></td> 
                         <?php endif ?>
              <td><a href="viewdetaillaprr/<?php echo $tr['kode_transaksi'];?>" class="edit_record btn btn-xs btn btn-warning" title="Detail" onclick=""><i class="glyphicon glhypicon-eye-open"></i>Lihat Detail</a></td>
             
              </tr>
               <?php  } ?> 
            </tbody>
        </table>
    </div>
  </div>
               </div>
            </div><!-- /.box -->
         
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        
     
<!------- modal -------->


</form>

 <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-primary">
         <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CARI</h4></td>
      </div>
          <div class="modal-body">

<form action="<?php echo base_url(); ?>Alkesrr/cetakalkes" method="POST">
        <div class="form-group"> 
             PERUSAHAAN:<br>
         <select name="koper" id="" class="dara form-control">
       <option> Pilih Perusahaan : </option>
          <option> Pilih Perusahaan : </option>
       <?php foreach($kpr as $dt) { ?>
            <option value=<?php echo $dt['koper'] ; ?>>
             <?php echo $dt['nm_perusahaan']?></option>
            <?php  } ?>
          </select><br><br>
        </div>
         
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="pilih">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->