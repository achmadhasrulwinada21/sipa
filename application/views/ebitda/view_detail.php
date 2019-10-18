<section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>EBITDA</b>
        </h4>
        
        </section>
 
        <!-- Main content -->

        <section class="content">
             
           <div class="box"><br>
             
             <span style="margin-left: 20px;"><a href="<?php echo base_url(); ?>Ebitda" class="btn btn-success"><i class="fa fa-home">&nbspKembali</i></a></span>
                         <div class="box-header">
                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                    <tr>   <td width="120"><b>RUMAH SAKIT</b></td><td width="10">:</td><td width="300"><b><?php echo $ebit->namars ?></b> </td>
                   </tr>
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br> 
                  <b style="margin-left:20px"><u>A. EBITDA PER BULAN</u></b><br>
                 <div class="table-responsive">
                <div class="box-body">

                 <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;" rowspan="2">NO</th>
                      <th style="vertical-align: middle;text-align: center;" rowspan="2">PERIODE</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">JANUARI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">FEBRUARI</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">MARET</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">APRIL</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">MEI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">JUNI</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">JULI</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">AGUSTUS</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">SEPTEMBER</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">OKTOBER</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">NOVEMBER</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">DESEMBER</th>
                    </tr>
                     <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                       <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                         
                     foreach($data_ebitda as $row) { 
                       $no++;                              
                             
                      ?>
                    <tr class="info">
                       <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['nilai_targetjan']; ?></td>
                      <td><?php echo $row['nilai_realjan']; ?></td>
                        <td><?php echo $row['nilai_targetfeb']; ?></td>
                      <td><?php echo $row['nilai_realfeb']; ?></td>
                       <td><?php echo $row['nilai_targetmar']; ?></td>
                      <td><?php echo $row['nilai_realmar']; ?></td>
                       <td><?php echo $row['nilai_targetapr']; ?></td>
                      <td><?php echo $row['nilai_realapr']; ?></td>
                       <td><?php echo $row['nilai_targetmei']; ?></td>
                      <td><?php echo $row['nilai_realmei']; ?></td>
                       <td><?php echo $row['nilai_targetjuni']; ?></td>
                      <td><?php echo $row['nilai_realjuni']; ?></td>
                       <td><?php echo $row['nilai_targetjuli']; ?></td>
                      <td><?php echo $row['nilai_realjuli']; ?></td>
                       <td><?php echo $row['nilai_targetagust']; ?></td>
                      <td><?php echo $row['nilai_realagust']; ?></td>
                       <td><?php echo $row['nilai_targetsept']; ?></td>
                      <td><?php echo $row['nilai_realsept']; ?></td>
                       <td><?php echo $row['nilai_targetokt']; ?></td>
                      <td><?php echo $row['nilai_realokt']; ?></td>
                       <td><?php echo $row['nilai_targetnov']; ?></td>
                      <td><?php echo $row['nilai_realnov']; ?></td>
                       <td><?php echo $row['nilai_targetdes']; ?></td>
                      <td><?php echo $row['nilai_realdes']; ?></td>
                      </tr>
                   <?php } ?>
                               </tbody>
                
                </table>
               </div></div>
               <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
                
                 <div class="table-responsive">
                <div class="box-body">

                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   <div class="container" style="min-width: 2px;
 height: 2px; margin: 0 auto"></div>
            <canvas id="demobar" style="margin-left: 10px" width="250" height="75"></canvas>
    </div>

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar").getContext("2d");
        var data = {
                  labels: ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
                  datasets: [
                  {
                    label: "Data Target",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($target as $p ) 
                      { 
                        echo '"' . $p['nilai_targetjan'] . '","' . $p['nilai_targetfeb'] . '","' . $p['nilai_targetmar'] . '","' . $p['nilai_targetapr'] . '","' . $p['nilai_targetmei'] . '","' . $p['nilai_targetjuni'] . '","' . $p['nilai_targetjuli'] . '","' . $p['nilai_targetagust'] . '","' . $p['nilai_targetsept'] . '","' . $p['nilai_targetokt'] . '","' . $p['nilai_targetnov'] . '","' . $p['nilai_targetdes'] . '",';
                      }
                      ?>]
                  },
                  {
                    label: "Data Real",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    data: [<?php foreach($real as $p ) 
                      { 
                        echo '"' . $p['nilai_realjan'] . '","' . $p['nilai_realfeb'] . '","' . $p['nilai_realmar'] . '","' . $p['nilai_realapr'] . '","' . $p['nilai_realmei'] . '","' . $p['nilai_realjuni'] . '","' . $p['nilai_realjuli'] . '","' . $p['nilai_realagust'] . '","' . $p['nilai_realsept'] . '","' . $p['nilai_realokt'] . '","' . $p['nilai_realnov'] . '","' . $p['nilai_realdes'] . '",';
                      }
                      ?>]
                  }
                  
                  ]
                  };

        var myBarChart = new Chart(ctx, {
                  type: 'line',
                  data: data,
                  options: {
                  barValueSpacing: 20,
                  scales: {
                    yAxes: [{
                        ticks: {
                            min: -1000,
                        }
                    }],
                    xAxes: [{
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                    }
                }
              });
      </script>
                  </thead>
                 
                
                </table>
               </div></div>           
          
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                </div><!-- /.box-title -->
                <b style="margin-left:20px"><u>B. EBITDA PER TRIWULAN </u></b><br>
                <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;" rowspan="2">NO</th>
                      <th style="vertical-align: middle;text-align: center;" rowspan="2">PERIODE</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">TRIWULAN I</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">TRIWULAN II</th>
                       <th style="vertical-align: middle;text-align: center;" colspan="2">TRIWULAN III</th>
                      <th style="vertical-align: middle;text-align: center;" colspan="2">TRIWULAN IV</th>
                  </tr>
                     <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                       <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                      <th style="vertical-align: middle;text-align: center;">Target</th>
                      <th style="vertical-align: middle;text-align: center;" >Real</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                         
                     foreach($data_ebitdatri as $row) { 
                       $no++;                              
                             
                      ?>
                    <tr class="info" style="vertical-align: middle;text-align: center;">
                       <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['target_triwulan_1']; ?></td>
                      <td><?php echo $row['real_triwulan_1']; ?></td>
                        <td><?php echo $row['target_triwulan_2']; ?></td>
                      <td><?php echo $row['real_triwulan_2']; ?></td>
                       <td><?php echo $row['target_triwulan_3']; ?></td>
                      <td><?php echo $row['real_triwulan_3']; ?></td>
                       <td><?php echo $row['target_triwulan_4']; ?></td>
                      <td><?php echo $row['real_triwulan_4']; ?></td>
                      </tr>
                   <?php } ?>
                               </tbody>
                
                </table>
               
               </div>
               </div></div>
               <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
                
                 <div class="table-responsive">
                <div class="box-body">

                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   <div class="container" style="min-width: 2px;
 height: 2px; margin: 0 auto"></div>
            <canvas id="demobar1" style="margin-left: 10px" width="250" height="75"></canvas>
    </div>

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar1").getContext("2d");
        var data = {
                  labels: ["TW-1","TW-2","TW-3","TW-4"],
                  datasets: [
                  {
                    label: "Data Target",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($targettri as $p ) 
                      { 
                        echo '"' . $p['target_triwulan_1'] . '","' . $p['target_triwulan_2'] . '","' . $p['target_triwulan_3'] . '","' . $p['target_triwulan_4'] . '",';
                      }
                      ?>]
                  },
                  {
                    label: "Data Real",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    data: [<?php foreach($realtri as $p ) 
                      { 
                        echo '"' . $p['real_triwulan_1'] . '","' . $p['real_triwulan_2'] . '","' . $p['real_triwulan_3'] . '","' . $p['real_triwulan_4'] . '",';
                      }
                      ?>]
                  }
                  
                  ]
                  };

        var myBarChart = new Chart(ctx, {
                  type: 'line',
                  data: data,
                  options: {
                  barValueSpacing: 20,
                  scales: {
                    yAxes: [{
                        ticks: {
                            min: -1000,
                        }
                    }],
                    xAxes: [{
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                    }
                }
              });
      </script>
                  </thead>
                 
                
                </table>
               </div></div>

              
          <div class="row">
            <div class="col-md-12">
                      
              
              <div class="box">
                 

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                </div><!-- /.box-title -->
                <b style="margin-left:20px"><u>B. EBITDA PER TAHUN </u></b><br>
                <div class="table-responsive">
                <div class="box-body">

                  <table id="" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">PERIODE</th>
                       <th style="vertical-align: middle;text-align: center;">TARGET</th>
                      <th style="vertical-align: middle;text-align: center;">REAL</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                         
                     foreach($data_ebitdatahun as $row) { 
                       $no++;                              
                             
                      ?>
                    <tr class="info" style="vertical-align: middle;text-align: center;">
                       <td><?php echo $no; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['target_tahun']; ?></td>
                      <td><?php echo $row['real_tahun']; ?></td>
                      </tr>
                   <?php } ?>
                               </tbody>
                
                </table></div></div>
                 <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
               

                 <div class="table-responsive">
                <div class="box-body">

                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   <div class="container" style="min-width: 2px;
 height: 2px; margin: 0 auto"></div>
            <canvas id="demobar2" style="margin-left: 10px" width="250" height="75"></canvas>
    </div>

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar2").getContext("2d");
        var data = {
                  labels: ["2016","2017","2018","2019","2020"],
                  datasets: [
                  {
                    label: "Data Target",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($targetth as $p ) 
                      { 
                        echo '"' . $p['target_tahun'] . '",';
                      }
                      ?>]
                  },
                  {
                    label: "Data Real",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    data: [<?php foreach($realth as $p ) 
                      { 
                        echo '"' . $p['real_tahun'] . '",';
                      }
                      ?>]
                  }
                  
                  ]
                  };

        var myBarChart = new Chart(ctx, {
                  type: 'line',
                  data: data,
                  options: {
                  barValueSpacing: 20,
                  scales: {
                    yAxes: [{
                        ticks: {
                            min: -1000,
                        }
                    }],
                    xAxes: [{
                                gridLines: {
                                    color: "rgba(0, 0, 0, 0)",
                                }
                            }]
                    }
                }
              });
      </script>
                  </thead>
                 
                
                </table>
               
               
               
                <!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
          <section class="col-lg-5 connectedSortable">



