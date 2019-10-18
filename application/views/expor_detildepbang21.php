 <?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=laporan_RR-Listing_detil_depbang.xls");

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
          <b><span>Laporan RR-Listing Detail Depbang<br>
           <b>tanggal transaksi <span> : </span><?php echo $tgl; ?> <?php echo $bulan; ?> <?php echo $thn; ?></b>
          </span></b>
        </h4>

  <table border="1" cellspacing="1" cellpadding="2">
            <tr style="font-weight:bold;text-align:left;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
             <th style="vertical-align: middle;text-align: center;">Spesifikasi Teknis</th>
             <th style="vertical-align: middle;text-align: center;">Merk</th>
             <th style="vertical-align: middle;text-align: center;">Garansi</th>
             <th style="vertical-align: middle;text-align: center;">Regional</th>
            <th  style="vertical-align: middle;text-align: center;">Harga Lama</th>
            <th  style="vertical-align: middle;text-align: center;">Harga Baru</th>
            <th  style="vertical-align: middle;text-align: center;">Satuan</th>
            <th  style="vertical-align: middle;text-align: center;">Persentase Kenaikan</th>
            <th  style="vertical-align: middle;text-align: center;">Harga exc Ppn</th>
            <th  style="vertical-align: middle;text-align: center;">Harga inc Ppn (A)</th>
            <th  style="vertical-align: middle;text-align: center;">Harga inc Ppn fee (B)</th>
            <th  style="vertical-align: middle;text-align: center;">Persentase ((B-A)/B)</th>
           <th  style="vertical-align: middle;text-align: center;">Contact Person</th>
            <th  style="vertical-align: middle;text-align: center;">Keterangan</th>
            </tr></table>
 <?php 
      foreach ($expor_detilalum as $h) {
        ?>
            <br>
                      <span style="font-weight:bold;">PERUSAHAAN</span><span style="font-weight:bold;"> : </span><span style="font-weight:bold;"><?php echo $h['nm_perusahaan']; ?></span>
                        
<?php
              $koper=$h['koper'];
              $tanggal_tr=$h['tanggal_tr'];

          $cetak_alum = $this->produkom2->Getprodukoutdep("where koper='$koper' and tanggal_tr='$tanggal_tr' and statusdetil !='1' and statusdetil !='01' and statusdetil!='2' and statusdetil!='3' and statusdetil!='4'")->result_array();
?>
           <table>     
           <?php        
            $i=0;   
      foreach ($cetak_alum as $row) 
        {
          $i++;
          ?>

    <tr style="vertical-align:middle;align:center";>    
   <td style="text-align:left;"><?php echo $row['nama_produk']; ?></td>
    <td style="text-align:left;"><?php echo $row['deskripsi']; ?></td>
   <td style="text-align: left;"><?php echo $row['merk']; ?></td>
   <td style="text-align: left;"><?php echo $row['garansi']; ?></td>
   <td style="text-align: left;"><?php echo $row['nm_regional']; ?></td>
   <td style="text-align: right;"><?php echo number_format($row['harga_lama']); ?></td>
   <td style="text-align: right;"><?php echo number_format($row['harga_baru']);?></td>
    <td style="text-align: left;"><?php echo $row['satuannama']; ?></td>
   <td style="text-align: right;"><?php echo number_format($row['persentase']);?>%</td>
   <td style="text-align: right;"><?php echo number_format($row['harga_excppn']);?></td>
   <td style="text-align: right;"><?php echo number_format($row['harga_incppn']);?></td>
   <td style="text-align: right;"><?php echo number_format($row['harga_incppnfee']);?></td>
    <td style="text-align: right;"><?php echo number_format($row['persentase_ppn']);?>%</td>
     <td style="text-align: left;"><?php echo $row['contact']; ?></td>
     <td style="text-align: left;"><?php echo $row['ket']; ?></td>
              </tr>
      <?php
          }
        ?>
</table>
<?php
}
        ?>
<br><br>
          
