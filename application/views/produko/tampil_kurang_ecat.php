
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
          <b>PRODUK</b>
        </h4>
        
        </section>
               
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-md-12">
                     <a href="<?php echo site_url('produko/compare')?>" class="btn btn-success" style="margin-bottom:6px"><i class="glyphicon glyphicon-home"></i>&nbspKEMBALI</a> 
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
              <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nama_pt ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->s_kode ?> </td></tr>
                     
                     <tr><td width="200">TIPE PRODUK</td><td width="10">:</td><td width="300"><?php echo $prod->tipe_produk ?> </td></tr>
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
                      <th  style="vertical-align: middle;text-align: center;">NO</th>
                     <!--  <th  style="vertical-align: middle;text-align: center;">JENIS PRODUK</th> -->
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                      <th  style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th  style="vertical-align: middle;text-align: center;">TIPE HARGA</th>
                      
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($tampil_kurang_ecat as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                       <!-- <td><?php //echo $row['jenis_produk']; ?></td> -->
              <?php 
                         $a=$prod->tipe_produk;
                   if($a=='OBAT'):  
                   ?>
                       <td><?php echo $row['produko']; ?></td>
             <?php endif;?>

                    <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALUM'):  
                   ?>
                        <td><?php echo $row['produkom']; ?></td>
             <?php endif;?>
             <?php 
                         $a=$prod->tipe_produk;
                   if($a=='ALKES'):  
                   ?>
                        <td><?php echo $row['alkes']; ?></td>
             <?php endif;?>
              <td style="text-align: center;"><?php echo $row['harga']; ?></td>
                        
                      <td><?php echo $row['tipe_harga']; ?></td>
                        
                      
                    </tr>
                              <?php
                    // SUB TOTAL per sesi
                             }?>
                  </tbody>
                
                </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($tampil_kurang_ecat); ?></b></td></tr>
                   </tr>
                    <!-- <?php// } ?> -->
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


       <!-- modal 
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
end modal -->
