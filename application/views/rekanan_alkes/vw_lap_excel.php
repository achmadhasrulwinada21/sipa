<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
 <html lang="en">
 <head>
      <meta charset="utf-8">
      <title><?php echo $title ?></title>
      <style>
           ::selection { background-color: #E13300; color: white; }
           ::-moz-selection { background-color: #E13300; color: white; }
 
           body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
           }
 
           main {
                width: 80%;
                padding: 20px;
                background-color: white;
                min-height: 300px;
                border-radius: 5px;
                margin: 30px auto;
                box-shadow: 0 0 8px #D0D0D0;
           }
           table {
                border-top: solid thin #000;
                border-collapse: collapse;
           }
           th, td {
                border-top: border-top: solid thin #000;
                padding: 6px 12px;
           }
 
           a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
           }
      </style>
 </head>
 
 <body>
      <main>
           <h1>Laporan Excel</h1>
           <p><a href="<?php echo base_url('C_rekananalkes/export_excel') ?>">Export ke Excel</a> ||
           <a href="<?php echo base_url("index.php/C_rekananalkes"); ?>"></i> Kembali </a></p> 
           <table border="1" width="100%">
                <thead>
                     <tr>
                          <th rowspan="2">Kode Perusahaan</th>
 
                          <th rowspan="2">Nama Perusahaan</th>
                          <th colspan="4">Status Rekanan</th>
                      </tr>
                      <tr>
                          <th >Principal</th>
 
                          <th>Solo Agent</th>

                          <th>Distributor</th>

                          <th>Sub Distributor</th>

                          

                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($exp_rekanan as $exp) { ?>
                     <tr>
                          <td><?php echo $exp->koper; ?></td>
                          <td><?php echo $exp->nm_perusahaan; ?></td>
                          <td align="center"><?php echo $exp->principal; ?></td>
                          <td align="center"><?php echo $exp->solo_agent; ?></td>
                          <td align="center"><?php echo $exp->distributor; ?></td>
                          <td align="center"><?php echo $exp->subdistributor; ?></td>
                          
                          
                     </tr>
                     <?php $i++; } ?>
                </tbody>
           </table>
      </main>
 </body>
 </html>