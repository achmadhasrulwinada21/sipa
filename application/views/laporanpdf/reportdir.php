
      <section class="content-header">
        <h1>
          <b>DATA EKSEKUTIF REPORT DIR</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>


        <!-- Main content -->
        <section class="content">

         
         
      <form role="form" action="<?php  echo base_url(); ?>CetakEksDir/cetak_eks" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
   <div class="input-group col-sm-5">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="tanggal" name="inputtanggal" class="form-control" >
      <span class="input-group-btn">
     <button formtarget="_blank" type="submit" class="btn btn-primary btn-block btn-flat" >Print PDF</button> 
     

  </span> 

 


     </form> 

   </div>
</div>   

 
  <form role="form" action="<?php  echo base_url(); ?>laporanpdfdir/Refresh" method="POST" enctype="multipart/form-data"> 
        <div class="form-group">
   <div class="input-group col-sm-5">
      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
      <input type="text" id="tanggal2" name="inputtanggalrefresh" class="form-control" >
      <span class="input-group-btn">
     <button  type="submit" class="btn btn-primary btn-block btn-flat" >Refresh All</button> 
     

  </span> 

 


     </form> 

   </div>
</div>   




<br/>
<br/>
<div id="tampil_report" class="row"></div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
         
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                  <div class="table-responsive">
                 <table id="tb-datatables" class="table table-borde#ff7f7f table-striped">
                 <thead>
                    <tr>
                     
                      <th>PERIODE</th>
                      <th  style="width:300px;"  >URAIAN</th>
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
                    
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($report as $row) { 

          $real1=$row['hhg'];
          $before1=$row['hhg_bulanlalu']; 
          $target1=$row['hhg_hasmoro'];


          $target2=$row['jtn_hasmoro'];
          $real2=$row['jtn'];
          $before2=$row['jtn_bulanlalu'];


          $target3=$row['kmyr_hasmoro'];
          $real3=$row['kmyr']; 
          $before3=$row['kmyr_bulanlalu'];

          $target4=$row['bks_hasmoro'];
          $real4=$row['bks']; 
          $before4=$row['bks_bulanlalu'];

          $target5=$row['depok_hasmoro'];
          $real5=$row['depok']; 
          $before5=$row['depok_bulanlalu'];


          $target6=$row['dm_hasmoro'];
          $real6=$row['dm'];
          $before6=$row['dm_bulanlalu'];


          $target7=$row['bogor_hasmoro'];
          $real7=$row['bogor']; 
          $before7=$row['bogor_bulanlalu'];


         $target8=$row['pst_hasmoro'];
         $real8=$row['pst']; 
         $before8=$row['pst_bulanlalu'];


         $target9=$row['pdrn_hasmoro'];
         $real9=$row['pdrn']; 
         $before9=$row['pdrn_bulanlalu'];

         $target10=$row['tprahu_hasmoro'];
         $real10=$row['tprahu']; 
         $before10=$row['tprahu_bulanlalu'];

         $target11=$row['skbm_hasmoro'];
         $real11=$row['skbm']; 
         $before11=$row['skbm_bulanlalu'];


         $target12=$row['tgr_hasmoro'];
         $real12=$row['tgr']; 
         $before12=$row['tgr_bulanlalu'];

         $target13=$row['gw_hasmoro'];
         $real13=$row['gw']; 
         $before13=$row['gw_bulanlalu'];

         $target14=$row['arca_hasmoro'];
         $real14=$row['arca']; 
         $before14=$row['arca_bulanlalu'];

         $target15=$row['glxy_hasmoro'];
         $real15=$row['glxy'];
         $before15=$row['glxy_bulanlalu'];

         $target16=$row['plb_hasmoro'];
         $real16=$row['plb']; 
         $before16=$row['plb_bulanlalu'];

         $target17=$row['cpt_hasmoro'];
         $real17=$row['cpt']; 
         $before17=$row['cpt_bulanlalu'];

         $target18=$row['mks_hasmoro'];
         $real18=$row['mks']; 
         $before18=$row['mks_bulanlalu'];

         $target19=$row['spg_hasmoro'];
         $real19=$row['spg']; 
         $before19=$row['spg_bulanlalu'];


         $target20=$row['bymk_hasmoro'];
         $real20=$row['bymk']; 
         $before20=$row['bymk_bulanlalu'];


         $target21=$row['solo_hasmoro'];
         $real21=$row['solo']; 
         $before21=$row['solo_bulanlalu'];


         $target22=$row['ciruas_hasmoro'];
         $real22=$row['ciruas']; 
         $before22=$row['ciruas_bulanlalu'];

         $target23=$row['yogya_hasmoro'];
         $real23=$row['yogya']; 
         $before23=$row['yogya_bulanlalu'];

         $target24=$row['bitung_hasmoro'];
         $real24=$row['bitung']; 
         $before24=$row['bitung_bulanlalu'];


         $target25=$row['mksr_hasmoro'];
         $real25=$row['mksr']; 
         $before25=$row['mksr_bulanlalu'];


         $target26=$row['blkppn_hasmoro'];
         $real26=$row['blkppn']; 
         $before26=$row['blkppn_bulanlalu'];

         $target27=$row['mdn_hasmoro'];
         $real27=$row['mdn']; 
         $before27=$row['mdn_bulanlalu'];


         $target28=$row['pdm_hasmoro'];
         $real28=$row['pdm']; 
         $before28=$row['pdm_bulanlalu'];


         $target29=$row['pwt_hasmoro'];
         $real29=$row['pwt']; 
         $before29=$row['pwt_bulanlalu'];

//1.hhg
         if($real1>$target1){

              $warnahhg='#42e2f4';

         }

          

         elseif($real1<$before1){

            $warnahhg='#ff7f7f';

         }

           elseif($real1>=$before1){

            $warnahhg='white';

         }

            if($target1==''){

            $warnahhg='yellow';

         }
//2.jtn
         if($real2>$target2){

              $warnajtn='#42e2f4';

         }



         elseif($real2<$before2){

            $warnajtn='#ff7f7f';

         }

        elseif($real2>=$before2){

            $warnajtn='white';

         }

        if($target2==''){

            $warnajtn='yellow';

         }
 //3.kmyr
         if($real3>$target3){

              $warnakmyr='#42e2f4';

         }




         elseif($real3<$before3){

            $warnakmyr='#ff7f7f';

         }

           elseif($real3>=$before3){

            $warnakmyr='white';

         }
            if($target3==''){

            $warnakmyr='yellow';

         }
//4.bekasi
         if($real4>$target4){

              $warnabks='#42e2f4';

         }


         elseif($real4<$before4){

            $warnabks='#ff7f7f';

         }

           elseif($real4>=$before4){

            $warnabks='white';

         }
            elseif($target4==''){

            $warnabks='yellow';

         }

//5.depok
         if($real5>$target5){

              $warnadepok='#42e2f4';

         }

         elseif($real5<$before5){

            $warnadepok='#ff7f7f';

         }

           elseif($real5>=$before5){

            $warnadepok='white';

         }
            elseif($target5==''){

            $warnadepok='yellow';

         }

//6.DM
         if($real6>$target6){

              $warnadm='#42e2f4';

         }

         elseif($real6<$before6){

            $warnadm='#ff7f7f';

         }

        elseif($real6>=$before6){

            $warnadm='white';

         }

          if($target6==''){

            $warnadm='yellow';

         }


//7.BOGOR
         if($real7>$target7){

              $warnabogor='#42e2f4';

         }

         elseif($real7<$before7){

            $warnabogor='#ff7f7f';

         }

         elseif($real7>=$before7){

            $warnabogor='white';

         }

            if($target7==''){

            $warnabogor='yellow';

         }


//8.PST
         if($real8>$target8){

              $warnapst='#42e2f4';

         }

         elseif($real8<$before8){

            $warnapst='#ff7f7f';

         }

         elseif($real8>=$before8){

            $warnapst='white';

         }

            if($target8==''){

            $warnapst='yellow';

         }


//9.PDRN
         if($real9>$target9){

              $warnapdrn='#42e2f4';

         }

         elseif($real9<$before9){

            $warnapdrn='#ff7f7f';

         }

           elseif($real9>=$before9){

            $warnapdrn='white';

         }

            if($target9==''){

            $warnapdrn='yellow';

         }

//10.TPRAHU
         if($real10>$target10){

              $warnatprahu='#42e2f4';

         }

         elseif($real10<$before10){

            $warnatprahu='#ff7f7f';

         }

           elseif($real10>=$before10){

            $warnatprahu='white';

         }
            if($target10==''){

            $warnatprahu='yellow';

         }

//11.SKBM
         if($real11>$target11){

              $warnaskbm='#42e2f4';

         }

         elseif($real11<$before11){

            $warnaskbm='#ff7f7f';

         }

           elseif($real11>=$before11){

            $warnaskbm='white';

         }
            if($target11==''){

            $warnakbm='yellow';

         }

//12.TGR
         if($real12>$target12){

              $warnatgr='#42e2f4';

         }

         elseif($real12<$before12){

            $warnatgr='#ff7f7f';

         }

           elseif($real12>=$before12){

            $warnatgr='white';

         }
            if($target12==''){

            $warnagr='yellow';

         }


//13.GW
         if($real13>$target13){

              $warnagw='#42e2f4';

         }

         elseif($real13<$before13){

            $warnagw='#ff7f7f';

         }

           elseif($real13>=$before13){

            $warnagw='white';

         }
            if($target13==''){

            $warnagw='yellow';

         }


//14.ARCA
         if($real14>$target14){

              $warnaarca='#42e2f4';

         }

         elseif($real14<$before14){

            $warnaarca='#ff7f7f';

         }

          elseif($real14>=$before14){

            $warnaarca='white';

         }

            if($target14==''){

            $warnaarca='yellow';

         }

//15.GLXY
         if($real15>$target15){

              $warnaglxy='#42e2f4';

         }

         elseif($real15<$before15){

            $warnaglxy='#ff7f7f';

         }

        elseif($real15>=$before15){

            $warnaglxy='white';

         }
            if($target15==''){

            $warnaglxy='yellow';

         }

//16.PLB
         if($real16>$target16){

              $warnaplb='#42e2f4';

         }

         elseif($real16<$before16){

            $warnaplb='#ff7f7f';

         }

         elseif($real16>=$before16){

            $warnaplb='white';

         }

          if($target16==''){

            $warnaplb='yellow';

         }

//17.CPT
         if($real17>$target17){

              $warnacpt='#42e2f4';

         }

         elseif($real17<$before17){

            $warnacpt='#ff7f7f';

         }

          elseif($real17>=$before17){

            $warnacpt='white';

         }

            if($target17==''){

            $warnacpt='yellow';

         }

//18.MKS
         if($real18>$target18){

              $warnamks='#42e2f4';

         }

         elseif($real18<$before18){

            $warnamks='#ff7f7f';

         }

          elseif($real18>=$before18){

            $warnamks='white';

         }

            if($target18==''){

            $warnamks='yellow';

         }


//19.SPG
         if($real19>$target19){

              $warnaspg='#42e2f4';

         }

         elseif($real19<$before19){

            $warnaspg='#ff7f7f';

         }

          elseif($real19>=$before19){

            $warnaspg='white';

         }

            if($target19==''){

            $warnaspg='yellow';

         }

//20.BYMK
         if($real20>$target20){

              $warnabymk='#42e2f4';

         }

         elseif($real20<$before20){

            $warnabymk='#ff7f7f';

         }

         elseif($real20>=$before20){

            $warnabymk='white';

         }
            if($target20==''){

            $warnabymk='yellow';

         }


//21.SOLO
         if($real21>$target21){

              $warnasolo='#42e2f4';

         }

         elseif($real21<$before21){

            $warnasolo='#ff7f7f';

         }

          elseif($real21>=$before21){

            $warnasolo='white';

         }

            if($target21==''){

            $warnasolo='yellow';

         }


//22.CIRUAS
         if($real22>$target22){

              $warnaciruas='#42e2f4';

         }

         elseif($real22<$before22){

            $warnaciruas='#ff7f7f';

         }

          elseif($real22>=$before22){

            $warnaciruas='white';

         }

            if($target22==''){

            $warnaciruas='yellow';

         }

//23.YOGYA
         if($real23>$target23){

              $warnayogya='#42e2f4';

         }

         elseif($real23<$before23){

            $warnayogya='#ff7f7f';

         }

         elseif($real23>=$before23){

            $warnayogya='white';

         }

            if($target23==''){

            $warnayogya='yellow';

         }

//24.BITUNG
         if($real24>$target24){

              $warnabitung='#42e2f4';

         }

         elseif($real24<$before24){

            $warnabitung='#ff7f7f';

         }

          elseif($real24>=$before24){

            $warnabitung='white';

         }

            if($target24==''){

            $warnabitung='yellow';

         }


//25.MKSR
         if($real25>$target25){

              $warnamksr='#42e2f4';

         }

         elseif($real25<$before25){

            $warnamksr='#ff7f7f';

         }

          elseif($real25>=$before25){

            $warnamksr='white';

         }

            if($target25==''){

            $warnamksr='yellow';

         }



//26.BLP
         if($real26>$target26){

              $warnablp='#42e2f4';

         }

         elseif($real26<$before26){

            $warnablp='#ff7f7f';

         }

          elseif($real26>=$before26){

            $warnablp='white';

         }

            if($target26==''){

            $warnablp='yellow';

         }


//27.MDN
         if($real27>$target27){

              $warnamdn='#42e2f4';

         }

         elseif($real27<$before27){

            $warnamdn='#ff7f7f';

         }

          elseif($real27>=$before27){

            $warnamdn='white';

         }

            if($target27==''){

            $warnamdn='yellow';

         }



//28.PDM
         if($real28>$target28){

              $warnapdm='#42e2f4';

         }

         elseif($real28<$before28){

            $warnapdm='#ff7f7f';

         }

          elseif($real28>=$before28){

            $warnapdm='white';

         }

            if($target28==''){

            $warnapdm='yellow';

         }

//29.PWT
         if($real29>$target29){

              $warnapwt='#42e2f4';

         }

         elseif($real29<$before29){

            $warnapwt='#ff7f7f';

         }

          elseif($real29>=$before29){

            $warnapwt='white';

         }

            if($target29==''){

            $warnapwt='yellow';

         }






                      ?>


                    <tr>
                 
                      <td><?php echo $row['periode']; ?></td>

                      <td><?php echo $row['nama_uraian']; ?></td>

                    <td  style="background-color: <?php echo $warnahhg ?>"><?php echo $row['hhg']?></td>
 
                      <td  style="background-color: <?php echo $warnajtn ?>"><?php echo $row['jtn']; ?></td>

                      <td  style="background-color:<?php $warnakmyr ?>";"><?php echo $row['kmyr']; ?></td>

                      <td  style="background-color:<?php echo $warnabks ?>"><?php echo $row['bks']; ?></td>

                      <td  style="background-color: <?php echo $warnadepok ?>"><?php echo $row['depok']; ?></td>

                      <td  style="background-color:<?php echo $warnadm ?>"><?php echo $row['dm']; ?></td>


                      <td  style="background-color: <?php echo $warnabogor ?>;";"><?php echo $row['bogor']; ?></td>

                      <td  style="background-color:<?php echo $warnapst ?>;";"><?php echo $row['pst']; ?></td>

                      <td  style="background-color: <?php echo $warnapdrn ?>;";"><?php echo $row['pdrn']; ?></td>

                      <td  style="background-color: <?php echo $warnatprahu ?>;";"><?php echo $row['tprahu']; ?></td>

                      <td  style="background-color:<?php echo $warnaskbm ?>;";"><?php echo $row['skbm']; ?></td>

                      <td  style="background-color: <?php echo $warnatgr ?>;";"><?php echo $row['tgr']; ?></td>

                      <td  style="background-color: <?php echo $warnagw ?>;";"><?php echo $row['gw']; ?></td>

                      <td  style="background-color:<?php echo $warnaarca ?>"><?php echo $row['arca']; ?></td>

                      <td  style="background-color: <?php echo $warnaglxy ?>;";"><?php echo $row['glxy']; ?></td>

                      <td  style="background-color:<?php echo $warnaplb ?>;";"><?php echo $row['plb']; ?></td>

                      <td  style="background-color: <?php echo $warnacpt  ?>;";"><?php echo $row['cpt']; ?></td>

                      <td  style="background-color: <?php echo $warnamks ?>;";"><?php echo $row['mks']; ?></td>

                      <td  style="background-color:<?php echo $warnaspg ?>;";"><?php echo $row['spg']; ?></td>

                      <td  style="background-color: <?php echo $warnabymk ?>;";"><?php echo $row['bymk']; ?></td>

                      <td  style="background-color:<?php echo $warnasolo ?>"><?php echo $row['solo']; ?></td>

                      <td  style="background-color: <?php echo $warnaciruas ?>;";"><?php echo $row['ciruas']; ?></td>

                      <td  style="background-color: <?php echo $warnayogya  ?>;";"><?php echo $row['yogya']; ?></td>

                      <td  style="background-color: <?php echo $warnabitung ?>;";"><?php echo $row['bitung']; ?></td>

                      <td  style="background-color: <?php echo $warnamksr ?>;";"><?php echo $row['mksr']; ?></td>

                      <td  style="background-color: <?php echo $warnablp ?>;";"><?php echo $row['blkppn']; ?></td>

                      <td  style="background-color: <?php echo $warnamdn ?>;";"><?php echo $row['mdn']; ?></td>

                      <td  style="background-color: <?php echo $warnapdm ?>;";"><?php echo $row['pdm']; ?></td>

                      <td  style="background-color:<?php echo $warnapwt ?>;";"><?php echo $row['pwt']; ?></td>
 
                      <td id="id30"><?php echo number_format($row['capai'],2);   ?></td>
                     

                    </tr>
                    <?php  } ?>
                  </tbody>
                


                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
      </section><!-- /.content -->
