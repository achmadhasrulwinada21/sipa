<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>  -->    
 <section class="content-header">
        <h4 style="text-align: center;">
          <b><span> MASTER SETUP RS REGIONAL</span></b>
        </h4>
        </section>
             
          <div class="row">
              <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">       
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>C_setrs_reg/savedata" method="POST"  enctype="multipart/form-data">
                 
          <div class="box-body chat" id="chat-box">
               <div class="col-lg-12">
                       <div class="col-lg-4"></div>
          <div class="col-lg-4">
                  <div class="form-group">
                      <label for="">REGIONAL</label><br>
                        <select data-placeholder="Pilih Regional" name="kode_regional" class="form-control chosendara1" required id="regfranco" onchange="francors()">
                          <option></option>
                          <?php foreach($kodereg as $row) { ?>
                              <option value="<?php echo $row['kode_regional'] ?>"><?php echo $row['nm_regional'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                
                      <div class="form-group" id="francors21" hidden>
                      <label for="">RUMAH SAKIT</label><br>
                        <select data-placeholder="Pilih Rumah Sakit" name="koders[]" multiple  class="form-control dara-select" id="rs21">
                          <option></option>
                          <?php foreach($kdrs as $row) { ?>
                              <option value="<?php echo $row['koders'] ?>"><?php echo $row['namars'] ?></option>
                          <?php } ?>
                        </select>    
                    </div>
                     <div class="form-group" id="francors" hidden>
                      <label for="">RUMAH SAKIT</label><br>
                        <select data-placeholder="Pilih Rumah Sakit" name="koders[]" multiple  class="form-control dara-select" id="rs31">
                          <option></option>
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
            <a href="<?php echo site_url('C_setrs_reg')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
        </div>
        </div>
    </form>
</div>
 </section> 
            <div class="col-md-12">
                      <br>                

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
        
              
                </div><!-- /.box-title -->
                
                <div class="table-responsive">
                <div class="box-body">

                  
        <div class="table100 ver5 m-b-110">
          

                  <table id="datatables5" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center" class="row100 head" bgcolor="#000080" style="font-weight: bold;color: white;">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">REGIONAL</th>
                      <th style="vertical-align: middle;text-align: center;">RUMAH SAKIT</th>
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>          
                    </tr>
                  </thead>
               
              

              <div class="table100-body js-pscroll">
            
                  <tbody>
                <?php $no=0;
                    
                     foreach($data_setdis as $row) { 
                               $no++                              
                             
                      ?> 
                    <tr class="row100 body">
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                       <td><?php echo $row->nm_regional; ?></td>
                       <td><?php echo $row->namars; ?></td>
                       <td style="vertical-align: middle;text-align: center;">
                      <a title="update" style="margin-bottom:3px;" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $row->idsetregional; ?>"><i class="fa fa-edit"></i></a>
         
                      <a title="hapus" style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>C_setrs_reg/hapus/<?php echo $row->idsetregional; ?>"><i class="glyphicon glyphicon-trash"></i></a> 
                     </td>
                    </tr>
                            <?php  } ?>               
                                </tbody>
                
                </table>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
       
  <?php
      foreach($data_setdis as $i){
      $idsetregional= $i->idsetregional;
      $kode_regional= $i->kode_regional;
      $koders = $i->koders;
      $nm_regional= $i->nm_regional;
      $namars = $i->namars;  
         ?>

<div id="modal_edit<?php echo $idsetregional;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT</h4></td>
      </div>
        <div class="modal-body">
                  <form role="form" action="<?php echo base_url(); ?>C_setrs_reg/update" method="POST" enctype="multipart/form-data">
                 
                     <div class="form-group">
                      <input type="hidden" class="form-control" value="<?php echo $idsetregional; ?>" id="" name="idsetregional" readonly>
                    </div>

        <div class="form-group"> 
            <label>Peruntukan :</label><br>
              <select  name="kode_regional" class="dara form-control">
                 <?php foreach($kodereg as $row) { ?>
                     <option <?php if ($row['kode_regional'] == $kode_regional) echo 'selected' ; ?> value="<?php echo $row['kode_regional']; ?>"><?php echo $row['nm_regional'];?>
                    </option>
                <?php  } ?>
              </select>
        </div>    

         <div class="form-group"> 
            <label>Peruntukan :</label><br>
              <select  name="koders" class="dara form-control">
                 <?php foreach($kdrsedit as $row) { ?>
                     <option <?php if ($row['koders'] == $koders) echo 'selected' ; ?> value="<?php echo $row['koders']; ?>"><?php echo $row['namars'];?>
                    </option>
                <?php  } ?>
              </select>
        </div>    
                  <br></br>
                    
                  <div class="form-group">
                  <button  type="submit" name="" class="btn btn-success btn-block btn-flat">Simpan</button>
                 
                </div>                
                   
                </div>
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
     
     