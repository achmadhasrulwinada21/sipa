<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_katalog_obat.xls");

  function ubahbulan($namabln)
{
  switch($namabln){
  case 1:
  return 'Januari';
  break;
  case 2:
  return 'Februari';
  break;
  case 3:
  return 'Maret';
  break;
  case 4:
  return 'April';
  break;
  case 5:
  return 'Mei';
  break;
  case 6:
  return 'Juni';
  break;
  case 7:
  return 'Juli';
  break;
  case 8:
  return 'Agustus';
  break;
  case 9:
  return 'September';
  break;
  case 10:
  return 'Oktober';
  break;
  case 11:
  return 'November';
  break;
  case 12:
  return 'Desember';
  break;
  default:
  echo $namabln;
  break;
  }
}
               
                $data= $data=date('d m Y',strtotime($tglawal));
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);
 
 ?>
 <h4 style="text-align: center;">
          <b><span>Laporan Detail E - Katalog Obat<br>
           <b>tanggal transaksi <span> : </span><?php echo $tgl; ?> <?php echo $bulan; ?> <?php echo $thn; ?></b>
          </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">Distributor</th>
             <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
             <th style="vertical-align: middle;text-align: center;">Komposisi</th>
             <th style="vertical-align: middle;text-align: center;">Harga</th>
             <th style="vertical-align: middle;text-align: center;">Diskon</th>
             <th style="vertical-align: middle;text-align: center;">Tipe Harga</th>
      </tr></table>
 <?php 
      foreach ($expor_detilfarmasi as $h) {
        ?>
            <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span>
                        
<?php
              $koper=$h['koper'];
              $tanggal_tr=$h['tanggal_tr'];

          $cetak_farmasi = $this->farmasikat->Getprodukm("where koper='$koper' and tanggal_tr='$tanggal_tr'")->result_array();
?>
           <table>     
           <?php        
                foreach ($cetak_farmasi as $row) 
        {
          
          ?>

    <tr style="vertical-align:middle;">  
     <td style="text-align:left;"><?php echo $row['kodis']; ?></td>  
   <td style="text-align:justify;"><?php echo $row['nama_produk']; ?></td>
    <td style="text-align:justify;"><?php echo $row['deskripsi']; ?></td>  
   <td style="text-align:right;"><?php echo $row['harga']; ?></td>
    <td style="text-align:center;"><?php echo $row['discount']; ?></td>  
   <td style="text-align:center;"><?php echo $row['tipe_harga']; ?></td>
  </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>

          
