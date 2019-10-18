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
           <p><a href="<?php echo base_url('C_mstproduk/export_excelalum') ?>">Export ke Excel</a> ||
           <a href="<?php echo base_url("index.php/C_mstproduk/alum"); ?>"></i> Kembali </a></p> 
           <table border="1" width="100%">
                <thead>
                     <tr>
                          <th>Kode Produk</th>
 
                          <th>Nama Produk</th>

                          <th>Spesifikasi Teknis / Tipe</th>

			                    <th>Tipe Produk</th>
 
                          <th>Kode Perusahaan</th>

                          <th>Volume</th>

                          <th>Satuan</th>

                          <th>Merk</th>

                          

                     </tr>
                </thead>
                <tbody>
                     <?php $i=1; foreach($exp_alum as $exp) { ?>
                     <tr>
                          <td><?php echo $exp->kode_produk; ?></td>
                          <td><?php echo $exp->nama_produk; ?></td>
                          
                          <td><?php echo $exp->deskripsi; ?></td>
			                    <td><?php echo $exp->tipe_produk; ?></td>
                          <td><?php echo $exp->koper; ?></td>
                          <td><?php echo $exp->volume; ?></td>
                          <td><?php echo $exp->satuanid; ?></td>
                          <td><?php echo $exp->merk; ?></td>

                          
                          
                     </tr>
                     <?php $i++; } ?>
                </tbody>
           </table>
      </main>
 </body>
 </html>
