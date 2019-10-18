<?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_detail_katalog_depbang.xls");

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
          <b><span>Laporan Detail E - Katalog Depbang<br>
           <b>Tanggal Transaksi <span> : </span><?php echo $tgl; ?> <?php echo $bulan; ?> <?php echo $thn; ?></b><br>
           <?php 
           foreach ($expor_detildepbang as $h) {
           }
        ?>
            <b>Rumah Sakit <span> : </span><?php echo $h['namars']; ?></b>
          </span></b>
        </h4>
  <table border="1" cellspacing="1" cellpadding="2">
   <tr style="font-weight:bold;" bgcolor="#A9A9A9">  
         <th rowspan="2" style="vertical-align: middle;text-align: center;">Nama Produk</th>
        <th rowspan="2" style="vertical-align: middle;text-align: center;">Speksifikasi Teknis</th>
         <th rowspan="2" style="vertical-align: middle;text-align: center;">Merk</th>
       <th rowspan="2" style="vertical-align: middle;text-align: center;">Satuan</th>
        <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Saat Ini</th>
         <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Jual PT P3MPI</th>
          <th colspan="4" style="vertical-align: middle;text-align: center;">Penawaran Rekanan</th>
   </tr>
        <tr style="font-weight:bold;" bgcolor="#A9A9A9">
          <th style="vertical-align: middle;text-align: center;">Harga Penawaran Rekanan dgn FEE 5 %</th>
          <th style="vertical-align: middle;text-align: center;">Jumlah FEE Manajemen 5%</th>
          <th style="vertical-align: middle;text-align: center;">Harga Penawaran Rekanan dgn FEE 3%</th>
          <th  style="vertical-align: middle;text-align: center;">Jumlah FEE Manajemen 3%</th>
         </tr>        
    </table>
 <?php 
      foreach ($expor_detildepbang as $h) {
        ?>
            <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span><br>
            <span style="font-weight:bold;">BIDANG PEKERJAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['bidang_pekerjaan']; ?></span><br>
            <span style="font-weight:bold;">SUB JENIS PEKERJAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_sub_jenis_pekerjaan']; ?></span><br>
            <span style="font-weight:bold;">LOKASI</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['deskripsi']; ?></span>
                        
<?php
              $koper=$h['koper'];
              $idpr2=$h['idpr2'];
              $tanggal_tr=$h['tanggal_tr'];

          $cetak_depbang = $this->depbangkat->Getprodukm("where idpr2='$idpr2' and tanggal_tr='$tanggal_tr'")->result_array();
?>
           <table>     
           <?php        
                foreach ($cetak_depbang as $tr) 
        {
          
          ?>

    <tr style="vertical-align:middle;">  
          <td style="vertical-align: middle;text-align: justify;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: justify;"><?php echo $tr['deskripsi']; ?></td>
           <td style="vertical-align: middle;text-align: justify;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['satuannama']; ?></td>
      <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['harga_saat_ini']); ?></td>  
           <td style="vertical-align: middle;text-align: right;"><?php echo $tr['harga_jual']; ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_p_5']); ?></td> 
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_5']); ?></td>  
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format( $tr['harga_p_3']); ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_3']); ?></td> 
  </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>

          
