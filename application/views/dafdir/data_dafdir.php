
      <!-- Content Header (Page header) -->
               <section class="content-header">
    <h1>
          <b>DATA HISTORY ACARA</b>
    </h1>

    
</section>



        <!-- Main content -->
        <section class="content">

          <!--MENU ATAS-->  
  <div class="row">
  <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" style="border-width:5px" data-toggle="tabs">
      <li class="active">
      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>Konfirmpeserta">Data Kehadiran Peserta</a></li>
      
      <li class="active" style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>dafdir">Data Memo Konsumsi</a></li>
      
      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>memodafdir">Surat Memorandum Acara</a></li>

      <li style="border:none; outline: none; cursor:pointer;background-color:#F0F8FF;">
      <a href="<?php echo base_url(); ?>formpermohonan">Surat Formulir Permohonan</a></li>


        </ul>             
  </div>
  </div>
  <!--END MENU ATAS-->

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
            <br>
              <button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span>PRINT </button><br>
              <div class="box">
              <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE FORM</th>
                      <th>PERIHAL</th>
                      <!-- <th>NAMA ACARA</th> -->
                      <th>DEPARTEMEN</th>

                     <!--  <th>STATUS</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_history as $row) { $no++ ?>

                      <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['kode_form']; ?></td>
                      <td><?php echo $row['perihal']; ?></td>
                      <!-- <td><?php echo $row['nm_acara']; ?></td> -->
                      <td><?php echo $row['departemen2']; ?></td>

                      
                      <!-- <td>
                      <?php if($row['status'] == "Disetujui"){ echo '<span class="label label-success">Disetujui</span>';?>
                      <?php } else if($row['status'] == "Draft") { ?>
                      <span class="label label-info">Draft</span>

                      <?php } else if($row['status'] == "Direvisi") { ?>
                      <span class="label label-warning">Direvisi</span>

                      <?php }else if($row['status'] == "Ditolak"){?>

                      <span class="label label-danger">Ditolak</span><?php
                      }else{

                     echo '<span class="label label-danger">Menunggu Persetujuan</span>';

                      } ?>
                       </td> -->

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    
    <section class="content-header">

    <h1>
          <b>DATA KONSUMSI</b>
    </h1>

    </section>
    
     <section class="content">
          <!-- Small boxes (Stat box) -->

      <a  href="<?php echo base_url(); ?>Konsumsi/addkon" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA</a>
      <button data-toggle="modal" data-target="#myModal2" class="btn btn-info"><span class="fa fa-desktop"></span>&nbspPencarian Data </button><br>
      

      <!-- <body> -->

            <!-- <div class="col-md-12"> -->
            <!-- <table class="">
                
                <tr>
                    <td>Total &nbsp;</td>
                    <td>:&nbsp;<?php

                    foreach ($totalseluruh as $jt) {
                      
                      $jml_tot=$jt['total'];
                    }

                     echo "<b> Rp.". number_format($jml_tot).",-</b>";?></td>
                </tr>
               
            </table> -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
              <div class="table-responsive">
                <div class="box-body">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE KONSUMSI</th>
                      <th>DESKRIPSI</th>
                      <th>HARGA</th>
                      <th>QTY</th>
                      <th>TOTAL</th>
                      <th>DEPARTEMEN</th>
                       <th>AKSI</th>
                    </tr>
                  </thead>
                  
                    <?php $no=0;
                $total=0;
                  foreach($konsumsi as $di) { $no++ ?>
                    <tr class="odd gradeX">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $di['kode_kons']; ?></td>
                      <td><?php echo $di['deskripsi']; ?></td>
                      <td>Rp. <?php echo number_format ($di['harga'], 0, ".", "."); ?></td>
                      <td><?php echo $di['qty']; ?></td>
                      <td>Rp. <?php echo number_format ($di['total'], 0, ".", "."); ?></td>
                      <td><?php echo $di['departemen4']; ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>Konsumsi/editkonsumsi/<?php echo $di['idkonsumsi']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a onclick="return confirm('Yakin Akan Hapus Data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Konsumsi/hapuskonsumsi/<?php echo $di['idkonsumsi']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
          
                    <?php
                        $total=$total+$di['total'];
          }
          ?>
                                            
           <tr>
            <td colspan="4"></td>
          <td bgcolor="skyblue"><b>Total</b> &nbsp;</td>
                    <td bgcolor="skyblue">:&nbsp;<?php
                echo "<b> Rp.". number_format($total).",-</b>";?></td>
                </tr>    
                    </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
         </div><!-- /.row -->
         </div><!-- /.row (main row) -->
    </section>  
    </div>
    </div>
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <!-- <b>Version</b> 2.0 -->
      </div>
      <strong>Copyright &copy; <?php echo date('Y');?></strong> All rights reserved.
    </footer>
  </div><!-- ./wrapper -->
 

  <!-- modal cetak biaya konsumsi-->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">CETAK</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>LaporanBkon/cetak_bkon" method="POST" target="blank">
        <div class="form-group"> 
             Nama Acara:<br>
         <select name="id_memo_dafdir" class="form-control">
       <option> Pilih Nama Acara : </option>
     <?php foreach($id_memo as $im) { ?>
            <option value=<?php echo $im['id_memo_dafdir'] ; ?>>
             <?php echo $im['nm_acara']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
  
  <!-- modal -->
      <div id="myModal2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-primary">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMPIL</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>dafdir" method="POST">
        <div class="form-group"> 
             Nama Acara:<br>
         <select name="id_memo_dafdir" class="form-control">
       <option> Pilih Nama Acara : </option>
     <?php foreach($id_memo as $im) { ?>
            <option value=<?php echo $im['id_memo_dafdir'] ; ?>>
             <?php echo $im['nm_acara']?></option>
            <?php  } ?>
          </select>
        </div>
          
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-primary" value="TAMPIL">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal --> 
      
    