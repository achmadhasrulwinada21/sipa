<style type="text/css">

th{
    border:0px solid black;
  font-weight: bold;
  color:#000000;
    }
  
td{
    border:0px solid black;
    }
  
  .col3{
    color:#000000;
        position: absolute;
        width: 3em;
        height: 8em;
        left: 0em;
        top: 2em;
    }
  .col4{
    color:#000000;
        position: absolute;
        width: 7em;
        height: 8em;
        left: 4em;
        top: 2em;
    }
  
  .col5{
    color:#000000;
        position: absolute;
        width: 10em;
        height: 8em;
        left: 12em;
         top: 2em;
    }

  .col1{
    background-color: #E6E6FA;
        position: absolute;
        width: 3em;
        height: 2em;
        left: 0em;
        top: auto;
    font-weight: bold;
    color:#000000;
    text-align:center;
    }
  .col2{
    background-color: #E6E6FA;
        position: absolute;
        width: 7em;
    height: 2em;
        left: 4em;
        top: auto;
    font-weight: bold;
    color:#000000;
    }
  
  .col6{
    background-color: #E6E6FA;
        position: absolute;
        width: 10em;
    height: 2em;
        left: 12em;
        top: auto;
    font-weight: bold;
    color:#000000;
    }
  
</style>

      <section class="content-header">
        <h1>
          <b>DATA KINERJA RUMAH SAKIT BAGIAN DIREKTUR   </b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <!-- <a style="margin-bottom:3px" href="<?php echo base_url(); ?>kinerjarusak/addkrs" class="btn btn-primary no-radius dropdown-toggle"><i class="glyphicon glyphicon-plus"></i> TAMBAH KINERJA </a> -->
               <form role="form" action="<?php echo base_url(); ?>laporan_kinerjahermina/cetak_kinerja" method="POST" enctype="multipart/form-data"> 
				
				<div class="form-group">
					<div class="input-group col-sm-5" >
					
						<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
							<input type="text" autocomplete="off" id="tanggal" name="inputtanggal" class="form-control" >
						<span class="input-group-btn">

					<button formtarget="_blank" type="submit" class="btn btn-primary btn-block btn-flat" >Print PDF</button> 

			</form> 
			 </div>  
			  
			  <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body table-responsive">
                 <table border="1" id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <th width="30" colspan="1" rowspan="2" style="vertical-align:middle;text-align:center;color:white;">................................</th> 

                      <th class="col3" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="30" rowspan="2" align="center">NO</th>
                      <th class="col4" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="50" rowspan="2" align="center">PERIODE</th>
                      <th class="col5" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150" rowspan="1" align="center">URAIAN KINERJA</th>         
                      <th width="3%" colspan="3" align="center">JTN</th>
                      <th width="3%" colspan="3" align="center">KMYR</th>
                      <th width="3%" colspan="3" align="center">BKS</th>
                      <th width="3%" colspan="3" align="center">DPK</th>
                      <th width="3%" colspan="3" align="center">DM</th>
                      <th width="3%" colspan="3" align="center">BGR</th>                    
                      <th width="3%" colspan="3" align="center">PST</th>
                      <th width="3%" colspan="3" align="center">PDRN</th>
                      <th width="3%" colspan="3" align="center">TPRAHU</th>
                      <th width="3%" colspan="3" align="center">SKBM</th>
                      <th width="3%" colspan="3" align="center">TGR</th>
                      <th width="3%" colspan="3" align="center">GW</th>
                      <th width="3%" colspan="3" align="center">ARCA</th>
                      <th width="3%" colspan="3" align="center">GLXY</th>
                      <th width="3%" colspan="3" align="center">PLB</th>
                      <th width="3%" colspan="3" align="center">CPT</th>
                      <th width="3%" colspan="3" align="center">MKS</th>
                      <th width="3%" colspan="3" align="center">SPG</th>
                      <th width="3%" colspan="3" align="center">BYMK</th>
                      <th width="3%" colspan="3" align="center">SOLO</th>
                      <th width="3%" colspan="3" align="center">CIRUAS</th>
                      <th width="3%" colspan="3" align="center">YOGYA</th>
                      <th width="3%" colspan="3" align="center">BITUNG</th>
                      <th width="3%" colspan="3" align="center">MKSR</th>
                      <th width="3%" colspan="3" align="center">BLP</th>
                      <th width="3%" colspan="3" align="center">MDN</th>
                      <th width="3%" colspan="3" align="center">PDM</th>
                      <th width="3%" colspan="3" align="center">PWT</th>

                      <th width="3%" rowspan="3" align="center">AKM</th>                    
                    </tr>
        
               <tr>  

                  <th  width="2.5%" align="center"></th>
                  <th  width="2.5%" align="center">T</th> <!--JTN-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--KMYR-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th> 
                  <th  width="2.5%" align="center">T</th> <!--BKS-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--DPK-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--DM-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>         
                  <th  width="2.5%" align="center">T</th> <!--BGR-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--PST-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--PDRN-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--TPRAHU-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--SKBM-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--TGR-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--GW-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--ARCA-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--GLXY-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--PLB-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--CPT-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--MKS-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th> 
                  <th  width="2.5%" align="center">T</th> <!--SPG-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--BYMK-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--SOLO-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>         
                  <th  width="2.5%" align="center">T</th> <!--CIRUAS-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--YOGYA-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--BITUNG-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--MKSR-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--BLP-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--MDN-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--PDM-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  <th  width="2.5%" align="center">T</th> <!--PWT-->
                  <th  width="2.5%" align="center">R</th>
                  <th  width="2.5%" align="center">%</th>
                  
          
               </tr>
                  </thead>
                  <tbody>

                    <?php $no=0; foreach($data_krsd as $row) { $no++ ?>
                    <?php 
                    $akmjtn       = ($row['jtnr'] / $row['jtnt']) * 100;
                    $akmkmyr      = ($row['kmyrr'] / $row['kmyrt']) * 100;
                    $akmbks       = ($row['bksr'] / $row['bkst']) * 100;
                    $akmdpk       = ($row['dpkr'] / $row['dpkt']) * 100;
                    $akmdm        = ($row['dmr'] / $row['dmt']) * 100;
                    $akmbgr       = ($row['bgrr'] / $row['bgrt']) * 100;
                    $akmpst       = ($row['pstr'] / $row['pstt']) * 100;
                    $akmpdrn      = ($row['pdrnr'] / $row['pdrnt']) * 100;
                    $akmtprahu    = ($row['tprahur'] / $row['tprahut']) * 100;
                    $akmskbm      = ($row['skbmr'] / $row['skbmt']) * 100; 
                    $akmtgr       = ($row['tgrr'] / $row['tgrt']) * 100;
                    $akmgw        = ($row['gwr'] / $row['gwt']) * 100;
                    $akmarca      = ($row['arcar'] / $row['arcat']) * 100;
                    $akmglxy      = ($row['glxyr'] / $row['glxyt']) * 100;
                    $akmplb       = ($row['plbr'] / $row['plbt']) * 100;
                    $akmcpt       = ($row['cptr'] / $row['cptt']) * 100;
                    $akmmks       = ($row['mksr'] / $row['mkst']) * 100;
                    $akmspg       = ($row['spgr'] / $row['spgt']) * 100;
                    $akmbymk      = ($row['bymkr'] / $row['bymkt']) * 100;
                    $akmsolo      = ($row['solor'] / $row['solot']) * 100;
                    $akmciruas    = ($row['ciruasr'] / $row['ciruast']) * 100;
                    $akmyogya     = ($row['yogyar'] / $row['yogyat']) * 100;
                    $akmbitung    = ($row['bitungr'] / $row['bitungt']) * 100;
                    $akmmksr      = ($row['mksrr'] / $row['mksrt']) * 100;
                    $akmblkppn    = ($row['blkppnr'] / $row['blkppnt']) * 100;
                    $akmmdn       = ($row['mdnr'] / $row['mdnt']) * 100;
                    $akmpdm       = ($row['pdmr'] / $row['pdmt']) * 100;
                    $akmpwt       = ($row['pwtr'] / $row['pwtt']) * 100;

                    $capai= $row['jtnr'] + $row['kmyrr'] + $row['bksr'] + $row['dpkr'] + $row['dmr'] + $row['bgrr'] + $row['pstr']  + $row['tprahur'] + $row['skbmr'] + $row['tgrr'] + $row['gwr'] + $row['arcar'] + $row['glxyr'] + $row['plbr'] + $row['cptr'] + $row['mksr'] + $row['spgr'] + $row['bymkr'] + $row['solor'] + $row['ciruasr'] + $row['yogyar'] + $row['bitungr'] + $row['mksrr'] + $row['mdnr'] + $row['blkppnr'] + $row['pdmr'] + $row['pwtr'];
                    $target= $row['jtnt'] + $row['kmyrt'] + $row['bkst'] + $row['dpkt'] + $row['dmt'] + $row['bgrt'] + $row['pstt']  + $row['tprahut'] + $row['skbmt'] + $row['tgrt'] + $row['gwt'] + $row['arcat'] + $row['glxyt'] + $row['plbt'] + $row['cptt'] + $row['mkst'] + $row['spgt'] + $row['bymkt'] + $row['solot'] + $row['ciruast'] + $row['yogyat'] + $row['bitungt'] + $row['mksrt'] + $row['mdnt'] + $row['blkppnt'] + $row['pdmt'] + $row['pwtt'] ;
                    $akm=$capai/$target*100;
                    ?>
                    <tr>
                      <td width="470" style="vertical-align:middle;text-align:center;color:white;">.................................................................................</td>
                      <td class="col1"><?php echo $no; ?></td>
                      <td class="col2"><?php echo $row['periode']; ?></td>
                      <td class="col6"><?php echo $row['uraian_rsk']; ?></td>
                       <!--JTN-->
                       <td><?php echo $row['jtnt']; ?></td>
                       <td <?php 
                           if($row['jtnr'] < $row['jtnt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['jtnr'] > $row['jtnt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['jtnr']; ?></td>
                       <td style="background-color:#A9A9A9;"> <?php echo number_format($akmjtn,1); ?></td>
                       <!--KMYR-->
                       <td><?php echo $row['kmyrt']; ?></td>
                       <td <?php 
                           if($row['kmyrr'] < $row['kmyrt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['kmyrr'] > $row['kmyrt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['kmyrr']; ?></td>
                       <td style="background-color:#A9A9A9;"> <?php echo number_format($akmkmyr,1); ?></td>
                       <!--BKS-->
                       <td><?php echo $row['bkst']; ?></td>
                       <td <?php 
                           if($row['bksr'] < $row['bkst'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bksr'] > $row['bkst']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bksr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbks,1); ?></td>
                       <!--DPK -->
                       <td><?php echo $row['dpkt']; ?></td>
                       <td <?php 
                           if($row['dpkr'] < $row['dpkt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['dpkr'] > $row['dpkt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['dpkr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmdpk,1); ?></td>
                       <!--DM -->
                       <td><?php echo $row['dmt']; ?></td>
                       <td <?php 
                           if($row['dmr'] < $row['dmt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['dmr'] > $row['dmt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['dmr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmdm,1); ?></td>
                       <!--BGR -->
                       <td><?php echo $row['bgrt']; ?></td>
                       <td <?php 
                           if($row['bgrr'] < $row['bgrt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bgrr'] > $row['bgrt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bgrr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbgr,1); ?></td>
                       <!--PST -->
                       <td><?php echo $row['pstt']; ?></td>
                       <td <?php 
                           if($row['pstr'] < $row['pstt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pstr'] > $row['pstt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pstr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpst,1); ?></td>
                       <!--PDRN -->
                       <td><?php echo $row['pdrnt']; ?></td>
                       <td <?php 
                           if($row['pdrnr'] < $row['pdrnt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pdrnr'] > $row['pdrnt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pdrnr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpdrn,1); ?></td>
                       <!--TPRAHU -->
                       <td><?php echo $row['tprahut']; ?></td>
                       <td <?php 
                           if($row['tprahur'] < $row['tprahut'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['tprahur'] > $row['tprahut']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['tprahur']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmtprahu,1); ?></td>
                       <!--SKBM -->
                       <td><?php echo $row['skbmt']; ?></td>
                       <td <?php 
                           if($row['skbmr'] < $row['skbmt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['skbmr'] > $row['skbmt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['skbmr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmskbm,1); ?></td>
                       <!--TGR -->
                       <td><?php echo $row['tgrt']; ?></td>
                       <td <?php 
                           if($row['tgrr'] < $row['tgrt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['tgrr'] > $row['tgrt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['tgrr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmtgr,1); ?></td>
                       <!--GW -->
                       <td><?php echo $row['gwt']; ?></td>
                       <td <?php 
                           if($row['gwr'] < $row['gwt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['gwr'] > $row['gwt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['gwr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmgw,1); ?></td>
                       <!--ARCA -->
                       <td><?php echo $row['arcat']; ?></td>
                       <td <?php 
                           if($row['arcar'] < $row['arcat'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['arcar'] > $row['arcat']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['arcar']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmarca,1); ?></td>
                       <!--GLXY -->
                       <td><?php echo $row['glxyt']; ?></td>
                       <td <?php 
                           if($row['glxyr'] < $row['glxyt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['glxyr'] > $row['glxyt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['glxyr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmglxy,1); ?></td>
                       <!--PLB -->
                       <td><?php echo $row['plbt']; ?></td>
                       <td <?php 
                           if($row['plbr'] < $row['plbt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['plbr'] > $row['plbt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['plbr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmplb,1); ?></td>
                       <!--CPT -->
                       <td><?php echo $row['cptt']; ?></td>
                       <td <?php 
                           if($row['cptr'] < $row['cptt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['cptr'] > $row['cptt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['cptr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmcpt,1); ?></td>
                       <!--MKS -->
                       <td><?php echo $row['mkst']; ?></td>
                       <td <?php 
                           if($row['mksr'] < $row['mkst'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mksr'] > $row['mkst']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mksr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmks,1); ?></td>
                       <!--SPG -->
                       <td><?php echo $row['spgt']; ?></td>
                       <td <?php 
                           if($row['spgr'] < $row['spgt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['spgr'] > $row['spgt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['spgr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmspg,1); ?></td>
                      <!--BYMK -->
                       <td><?php echo $row['bymkt']; ?></td>
                       <td <?php 
                           if($row['bymkr'] < $row['bymkt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bymkr'] > $row['bymkt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bymkr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbymk,1); ?></td>
                      <!--SOLO -->
                       <td><?php echo $row['solot']; ?></td>
                       <td <?php 
                           if($row['solor'] < $row['solot'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['solor'] > $row['solot']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['solor']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmsolo,1); ?></td>
                      <!--CIRUAS -->
                       <td><?php echo $row['ciruast']; ?></td>
                       <td <?php 
                           if($row['ciruasr'] < $row['ciruast'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['ciruasr'] > $row['ciruast']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['ciruasr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmciruas,1); ?></td>
                      <!--YOGYA -->
                       <td><?php echo $row['yogyat']; ?></td>
                       <td <?php 
                           if($row['yogyar'] < $row['yogyat'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['yogyar'] > $row['yogyat']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['yogyar']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmyogya,1); ?></td>
                      <!--BITUNG -->
                       <td><?php echo $row['bitungt']; ?></td>
                       <td <?php 
                           if($row['bitungr'] < $row['bitungt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bitungr'] > $row['bitungt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bitungr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbitung,1); ?></td>
                      <!--MKSR -->
                       <td><?php echo $row['mksrt']; ?></td>
                       <td <?php 
                           if($row['mksrr'] < $row['mksrt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mksrr'] > $row['mksrt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mksrr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmksr,1); ?></td>
                      <!--BLP -->
                       <td><?php echo $row['blkppnt']; ?></td>
                       <td <?php 
                           if($row['blkppnr'] < $row['blkppnt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['blkppnr'] > $row['blkppnt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['blkppnr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmblkppn,1); ?></td>
                      <!--MDN -->
                       <td><?php echo $row['mdnt']; ?></td>
                       <td <?php 
                           if($row['mdnr'] < $row['mdnt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mdnr'] > $row['mdnt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mdnr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmdn,1); ?></td>
                      <!--PDM -->
                       <td><?php echo $row['pdmt']; ?></td>
                       <td <?php 
                           if($row['pdmr'] < $row['pdmt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pdmr'] > $row['pdmt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pdmr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpdm,1); ?></td>
                      <!--PWT -->
                       <td><?php echo $row['pwtt']; ?></td>
                       <td <?php 
                           if($row['pwtr'] < $row['pwtt'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pwtr'] > $row['pwtt']){
                           echo 'style="background-color:Skyblue;color:white;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pwtr']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpwt,1); ?></td>

                        <td style="background-color:#708090;"> <?php echo number_format($akm,1); ?></td>



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

       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <footer style="text-align: center;">
      
      <strong>Copyright &copy; <?php echo date('Y');?> <a href="#"></a></strong>
    </footer>
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
   

</html>