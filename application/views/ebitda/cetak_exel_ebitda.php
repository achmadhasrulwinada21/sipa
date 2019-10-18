<?php header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=ebitda.xls");
?>
        <!-- Main content -->

        
                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>
                  
                    <tr>   <td width="120"><b>RUMAH SAKIT</b></td><td width="10">:</td><td width="300"><b><?php echo $namars ?></b> </td>
                   </tr>
                   
                    
                    <!-- <?php// } ?> -->
                 </table>
                 <br> 
                  <b style="margin-left:20px"><u>A. EBITDA PER BULAN</u></b><br>
                 
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
               
                <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
                 
                 <table id="" class="table table-bordered table-striped">
                  <thead>
                  
            <canvas id="demobar6" style="margin-left: 10px" width="150" height="75"></canvas>
    

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar6").getContext("2d");
        var data = {
                  labels: ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
                  datasets: [
                  {
                    label: '<?php echo $periode_awal ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($realbul as $p ) 
                      { 
                        echo '"' . $p['nilai_realjan'] . '","' . $p['nilai_realfeb'] . '","' . $p['nilai_realmar'] . '","' . $p['nilai_realapr'] . '","' . $p['nilai_realmei'] . '","' . $p['nilai_realjuni'] . '","' . $p['nilai_realjuli'] . '","' . $p['nilai_realagust'] . '","' . $p['nilai_realsept'] . '","' . $p['nilai_realokt'] . '","' . $p['nilai_realnov'] . '","' . $p['nilai_realdes'] . '",';
                      }
                      ?>]
                  },
                {
                    label: '<?php echo $periode_akhir ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($realbul1 as $p ) 
                      { 
                        echo '"' . $p['nilai_realjan'] . '","' . $p['nilai_realfeb'] . '","' . $p['nilai_realmar'] . '","' . $p['nilai_realapr'] . '","' . $p['nilai_realmei'] . '","' . $p['nilai_realjuni'] . '","' . $p['nilai_realjuli'] . '","' . $p['nilai_realagust'] . '","' . $p['nilai_realsept'] . '","' . $p['nilai_realokt'] . '","' . $p['nilai_realnov'] . '","' . $p['nilai_realdes'] . '",';
                      }
                      ?>]
                  },

                  {
                    label: 'Target <?php echo $periode_akhir ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "orange",
                    borderColor: "orange",
                    pointHoverBackgroundColor: "rgba(255,150,0,0.5)",
                    data: [<?php foreach($targetbul as $p ) 
                      { 
                        echo '"' . $p['nilai_targetjan'] . '","' . $p['nilai_targetfeb'] . '","' . $p['nilai_targetmar'] . '","' . $p['nilai_targetapr'] . '","' . $p['nilai_targetmei'] . '","' . $p['nilai_targetjuni'] . '","' . $p['nilai_targetjuli'] . '","' . $p['nilai_targetagust'] . '","' . $p['nilai_targetsept'] . '","' . $p['nilai_targetokt'] . '","' . $p['nilai_targetnov'] . '","' . $p['nilai_targetdes'] . '",';
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
                            min: 0,
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
              
                <b style="margin-left:20px"><u>B. EBITDA PER TRIWULAN </u></b><br>
                
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
               
               
               <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
                 
                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   
            <canvas id="demobar5" style="margin-left: 10px" width="150" height="75"></canvas>
    </div>

        <script  type="text/javascript">

        var ctx = document.getElementById("demobar5").getContext("2d");
        var data = {
                  labels: ["TW-1","TW-2","TW-3","TW-4"],
                  datasets: [
                  {
                    label: '<?php echo $periode_awal  ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(201, 29, 29, 1)",
                    borderColor: "rgba(201, 29, 29, 1)",
                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
                    
                    pointHoverBorderColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($realtri as $p ) 
                      { 
                        echo '"' . $p['real_triwulan_1'] . '","' . $p['real_triwulan_2'] . '","' . $p['real_triwulan_3'] . '","' . $p['real_triwulan_4'] . '",';
                      }
                      ?>]
                  },
                {
                    label: '<?php echo $periode_akhir ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 100, 222, 1)",
                    borderColor: "rgba(59, 100, 222, 1)",
                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
                    data: [<?php foreach($realtri1 as $p ) 
                      { 
                        echo '"' . $p['real_triwulan_1'] . '","' . $p['real_triwulan_2'] . '","' . $p['real_triwulan_3'] . '","' . $p['real_triwulan_4'] . '",';
                      }
                      ?>]
                  },

                  {
                    label: 'Target <?php echo $periode_akhir ?>',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "orange",
                    borderColor: "orange",
                    pointHoverBackgroundColor: "rgba(255,150,0,0.5)",
                    data: [<?php foreach($targettri as $p ) 
                      { 
                        echo '"' . $p['target_triwulan_1'] . '","' . $p['target_triwulan_2'] . '","' . $p['target_triwulan_3'] . '","' . $p['target_triwulan_4'] . '",';
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
                            min: 0,
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
               

               
       
           <!-- <?php  // foreach($data_abk as $row) { ?> -->
             
                
                <b style="margin-left:20px"><u>B. EBITDA PER TAHUN </u></b><br>
               

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
                
                </table>
                 <script src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
                 
                 <table id="" class="table table-bordered table-striped">
                  <thead>
                   
            <canvas id="demobar4" style="margin-left: 10px" width="150" height="75"></canvas>
    
        <script  type="text/javascript">

         var ctx = document.getElementById("demobar4").getContext("2d");
        var data = {
                  labels: [<?php foreach($periode as $p ) 
                      { 
                        echo '"' . $p['periode'] . '",';
                      }
                      ?>],
                  datasets: [
                  {
                    label: "TARGET",
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
                    label: "REALISASI",
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
                            min: 0,
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
              


