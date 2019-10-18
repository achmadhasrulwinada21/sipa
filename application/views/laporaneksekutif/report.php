
      <section class="content-header">
        <h1>
          <b>DATA EKSEKUTIF REPORT</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>


        <!-- Main content -->
        <section class="content">
          <!-- <div> <label for="tanggal">Tanggal</label>
                <input type="text" id="tanggal" class="tanggal" />
</div>
  <script type="text/javascript" src="jquery-ui/external/jquery/jquery.js"></script>
  <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>

  <script type="text/javascript">
   // $tgl =  $("#tanggal").datepicker();
     $( "#tanggal" ).datepicker({ dateFormat: 'yymm' });


  </script> -->
      <form role="form" action="<?php echo base_url(); ?>laporanpdf/datareport" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
   <div class="input-group col-sm-5">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="tanggal" name="inputtanggal" class="form-control" >
      <span class="input-group-btn">
    <!-- 
        <a style="margin-bottom:3px" id="tampil" href="<?php echo base_url(); ?>laporanpdf/datareport" target="_blank" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> PRINT PDF </a>  
 -->
<!--     <a style="margin-bottom:3px" id="tampil" type="submit" target="_blank" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> PRINT PDF </a>    -->


     <button formtarget="_blank" type="submit" class="btn btn-primary btn-block btn-flat" >Print PDF</button> 

     </form> 

      </span>
    
   </div>
</div>
 
<div id="tampil_report" class="row"></div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
         <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>laporanpdf/datareport" target="_blank" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> PRINT PDF </a> -->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th> 
                      <th>PERIODE</th>
                      <th>URAIAN</th>
                      <th>HHG</th>
                      <th>JTN</th>
                      <th>KMYR</th>
                      <th>BEKASI</th>
                      <th>DEPOK</th>
                      <th>DM</th>
                      <th>BOGOR</th>
                      <th>PST</th>
                      <th>PDRN</th>
                      <th>TPRAHU</th>
                      <th>SKBM</th>
                      <th>TGR</th>
                      <th>GW</th>
                      <th>ARCA</th>
                      <th>GLXY</th>
                      <th>PLB</th>
                      <th>CPT</th>
                      <th>MKS</th>
                      <th>SPG</th>
                      <th>BYMK</th>
                      <th>SOLO</th>
                      <th>CIRUAS</th>
                      <th>YOGYA</th>
                      <th>BITUNG</th>
                      <th>MKSR</th>
                      <th>BLKPPN</th>
                      <th>MDN</th>
                      <th>PDM</th>
                      <th>PWT</th>
                      <th>CAPAI</th>
                      <!-- <th>PENCAPAIAN</th> -->
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($report as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>

                      <td><?php echo $row['nama_uraian']; ?></td>

                      <td style="background-color: <?php echo $row['warnaselhhg']; ?>;" ><?php echo $row['hhg']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaseljtn']; ?>;"><?php echo $row['jtn']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselkmyr']; ?>;"><?php echo $row['kmyr']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselbekasi']; ?>;"><?php echo $row['bks']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaseldepok']; ?>;"><?php echo $row['depok']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaseldm']; ?>;"><?php echo $row['dm']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselbogor']; ?>;"><?php echo $row['bogor']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselpst']; ?>;"><?php echo $row['pst']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselpdrn']; ?>;"><?php echo $row['pdrn']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaseltprahu']; ?>;"><?php echo $row['tprahu']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselskbm']; ?>;"><?php echo $row['skbm']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaseltgr']; ?>;"><?php echo $row['tgr']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselgw']; ?>;"><?php echo $row['gw']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselarca']; ?>;"><?php echo $row['arca']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselglxy']; ?>;"><?php echo $row['glxy']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselplb']; ?>;"><?php echo $row['plb']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselcpt']; ?>;"><?php echo $row['cpt']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselmks']; ?>;"><?php echo $row['mks']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselspg']; ?>;"><?php echo $row['spg']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselbymk']; ?>;"><?php echo $row['bymk']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselsolo']; ?>;"><?php echo $row['solo']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselciruas']; ?>;"><?php echo $row['ciruas']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselyogya']; ?>;"><?php echo $row['yogya']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselbitung']; ?>;"><?php echo $row['bitung']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselmksr']; ?>;"><?php echo $row['mksr']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselblkppn']; ?>;"><?php echo $row['blkppn']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselmdn']; ?>;"><?php echo $row['mdn']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselpdm']; ?>;"><?php echo $row['pdm']; ?></td>
                      <td  style="background-color: <?php echo $row['warnaselpwt']; ?>;"><?php echo $row['pwt']; ?></td>
                      <td id="id30"><?php echo number_format($row['capai'],2);   ?></td>
                     


                     <!--                      
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>transaksi/edittransaksi/<?php echo $row['koders']; ?>"><i class="fa fa-pencil"></i></a>
                      <a onclick="return confirm('Hapus data??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>transaksi/hapustransaksi/<?php echo $row['koders']; ?>"><i class="fa fa-trash"></i></a>
                      </td> -->
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
