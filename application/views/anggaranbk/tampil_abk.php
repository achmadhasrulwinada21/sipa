
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <style>
{
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 6px;
  font-size: 14px;
  border: 1px solid grey;
  float: left;
  width: 20%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width:3%;
  padding: 6px;
  background: #2196F3;
  color: white;
  font-size: 14px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
  </style>
</head>
 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>ANGGARAN DETAIL</b>
        </h4>
        
        </section>
               
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                     <td width="80">NAMA ACARA</td><td width="10">:</td><td width="300"><?php echo $abk->nama_acara ?> </td></tr>
                      <tr>   <td width="100">RUANGAN</td><td width="10">:</td><td width="300"><?php echo $abk->ruangan ?></td>
                   </tr>
                    <tr>  <td width="100">DEPARTEMEN</td><td width="10">:</td><td width="300"><?php echo $abk->departemen ?> </td></tr>
                    <tr>   <td width="100">RUMAH SAKIT</td><td width="10">:</td><td width="300"><?php echo $abk->rumah_sakit ?> </td>
                   </tr>
                    <!-- <?php// } ?> -->
                 </table>
                 <br>
                </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                  <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">SESI</th>
                      <th style="vertical-align: middle;text-align: center;">KEBUTUHAN</th>
                      <th style="vertical-align: middle;text-align: center;">JUMLAH</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">SUBTOTAL</th>
                                                       
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_abk as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['sesi']; ?></td>
                      <td><?php echo $row['nama_kebutuhan']; ?></td>
                      <td style="text-align: center;"><?php echo $row['jumlah']; ?></td>
                      <td>Rp.<?php echo (number_format($row['harga'], 2,',','.')); ?></td>
                      <td>Rp.<?php echo (number_format($row['subtotal'], 2,',','.')); ?></td>
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->


       <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Laporananggaransiang/cetak_anggarankliniksian" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker7" type="text" name = "periode_awal" placeholder="periode_awal..." />
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker8" type="text" name = "periode_akhir" placeholder="periode_akhir..." />
      </div>    
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
