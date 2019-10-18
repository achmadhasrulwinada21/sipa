 <?php
 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=cetak_rekanan_alum.xls");
 
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

	  
	   date_default_timezone_set("Asia/Jakarta");

                $data=date('d m Y');
                $tgl=substr($data,0,2);
                $bulan=ubahbulan(substr($data,3,2));
                $thn=substr($data,6,4);

          $waktusaatini =date("H:i:s");
 
 ?>
  <h4 style="text-align: center;">
          <b><span>Laporan Database Rekanan Alat Umum<br>
          <!-- <b>tanggal transaksi <span> : </span><?php echo $tgl; ?></b>&nbsp;</span><?php echo $bulan; ?></b>&nbsp;</span><?php echo $thn; ?></b>-->
          </span></b>
        </h4>

  <table border="1" cellspacing="1" cellpadding="2">
            <tr style="font-weight:bold;text-align:left;" bgcolor="#A9A9A9">  
             <th style="vertical-align: middle;text-align: center;">No</th>
                       <th style="vertical-align: middle;text-align: center;">Kode Perusahaan</th>
                      <th  style="vertical-align: middle;text-align: center;">Nama Perusahaan</th>
            </tr></table>

  <?php                      
            $i=0;   
      foreach ($report_alum as $row) 
        {
          $i++;
          ?>
          <table border ="1" ><tr style="vertical-align:middle;align:center";>
	<td style="text-align:left;"><?php echo $i ?></td>
   <td style="text-align:left;"><?php echo $row['koper']; ?></td>
   <td style="text-align: left;"><?php echo $row['nm_perusahaan']; ?></td>
   
              </tr>
      <?php
          }
        ?>
			
</table><br><br>

		  
		  <h5 style="text-align: right;">
          
           Jakarta,&nbsp;<?php echo $tgl; ?>&nbsp;<?php echo $bulan; ?>&nbsp;<?php echo $thn; ?>
          
        </h5>

		<table border="0">
                   <table border="0">
		
				   
					<tr>
					<td width="30"> </td>
					<td width="100" align="left">Disetujui Oleh.</td>
				
					<td width="100" align="left">Mengetahui</td>
					</tr>
				  </table>
				
				   <table border="0">
					<tr>
					<td width="30"> </td>
					<td rowspan="5" hight="200" align="left"></td>
					
					<td rowspan="5" hight="200" align="left"></td>
					</tr>
                   </table>
				
					<table border="0">
					<tr>
					<td width="30"> </td>
					<td width="100" align="left">Kepala Departemen Penunjang Umum</td>
					
					<td width="100" align="left">Direktur Operasional & Umum</td>
					</tr>


               </table>

           </table>
