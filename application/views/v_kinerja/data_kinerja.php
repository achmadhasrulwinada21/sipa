

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
        width: 2em;
        height: 5em;
        left: 1em;
        top: 2em;
    }
  /*.col4{
    color:#000000;
        position: absolute;
        width: 7em;
        height: 4.5em;
        left: 5em;
        top: 2em;
    }*/
  
  .col5{
    color:#000000;
        position: absolute;
        width: 10em;
        height: 5em;
        left: 4em;
         top: 2em;
    }

  .col1{
    background-color: #E6E6FA;
        position: absolute;
        width: 2em;
        height: 1.5em;
        left: 1em;
        top: auto;
    font-weight: bold;
    color:#000000;
    text-align:center;
    }
  /*.col2{
    background-color: #E6E6FA;
        position: absolute;
        width: 7em;
    height: 2em;
        left: 5em;
        top: auto;
    font-weight: bold;
    color:#000000;
    }*/
  
  .col6{
    background-color: #E6E6FA;
        position: absolute;
        width: 10em;
    height: 1.5em;
        left: 4em;
        top: auto;
    font-weight: bold;
    color:#000000;
    }
  
</style>
<head>
  <link href="<?php echo base_url(); ?>assets/dist/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />



  <style>
{
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=date] {
  padding: 0px;
  font-size: 14px;
  border: 1px solid grey;
  float: left;
  margin-left: 20px;
  width: 15%;
  background: #f1f1f1;
}

form.example1 input[type=text] {
  padding: 6px;
  font-size: 14px;
  border: 1px solid grey;
  float: left;
  margin-left: 20px;
  width: 15%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: right;
  width:10%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 10px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example1 button {
  float: left;
  width:2%;
  padding: 3px;
  background: #2196F3;
  color: white;
  font-size: 14px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

form.example1 button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example1::after {
  content: "";
  clear: both;
  display: table;
}
  </style>
</head>
 
        <br/>

        <h1 style="text-align: center;">
          <b>DATA KINERJA RUMAH SAKIT</b>
        </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-md-12">
              
              <button style="margin-bottom:3px" data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="fa fa-print"></span>&nbspPRINT BY DATE</button>

               <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
        <div class="table-responsive">
                <div class="box-body">
                 
               <!--  <div class="box-title"><br>
                 

                 <div class="form-group">
                  <p style="margin-left:  20px"><b>Pencarian berdasarkan uraian</b></p>
                  <form class="example1" action="<?php echo site_url('cetak_laporankinerja/search_keywords');?>" method = "post">
                  <input type="text" name = "keyword" placeholder="NAMA URAIAN" />
                  <button type="submit" value="cari"><i class="fa fa-search"></i>
                   </form>
        </div><br> -->
                  <div class="form-group">
                  
                  <form class="example" action="<?php echo site_url('Cetak_laporankinerja');?>" method = "post">
                 <script type='text/javascript' src='//code.jquery.com/jquery-1.8.3.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script type='text/javascript'>
$(function(){
$('.input-daterange').datepicker({
    autoclose: true,
    format:'yyyy-mm-dd'
      
});
});

</script>
</head>
<body>
<div class="container">
<h1>Filter data berdasarkan tanggal</h1>

<div class="input-daterange input-group" id="datepicker">
    <input type="text" class="input-sm form-control" name="tanggal1" placeholder="From date" required />
    <span class="input-group-addon">s/d</span>
    <input type="text" class="input-sm form-control" name="tanggal2" placeholder="To date" required />
</div>

    <button type="submit"  value="cari"><i class="fa fa-search"></i>
 
                   </form>


                 
        </div>
      
                  

                </div><!-- /.box-title -->

            <!--  <script type="text/javascript">
function toggle_visibility(id) {
var e = document.getElementById(id);
if(e.style.display == 'none')
e.style.display = 'block';
else
e.style.display = 'none';
}
</script> -->
             <section class="content-header" >
                <div class="box-body table-responsive"> 
                 <table border="1" id="tb-datatables" class="table table-bordered table-striped" >
                  <thead >
                    <span>
                    <tr align="center" >
                      <th width="30" colspan="1" rowspan="2" style="vertical-align:middle;text-align:center;color:white;">.....................................</th> 

                      <th class="col3" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="30" rowspan="2" align="center">NO</th>
                      <!-- <th class="col4" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="50" rowspan="2" align="center">TANGGAL</th> -->
                      <th class="col5" style="vertical-align:middle;text-align:center;background-color:#D3D3D3;" width="150" rowspan="1" align="center">URAIAN KINERJA</th>         
                      <th width="3%" colspan="3" align="center">JTN</th>
                      <th width="3%" colspan="3" align="center">KMY</th>
                      <th width="3%" colspan="3" align="center">BKS</th>
                      <th width="3%" colspan="3" align="center">DPK</th>
                      <th width="3%" colspan="3" align="center">DMG</th>
                      <th width="3%" colspan="3" align="center">BGR</th>                    
                      <th width="3%" colspan="3" align="center">PST</th>
                      <th width="3%" colspan="3" align="center">PDN</th>
                      <th width="3%" colspan="3" align="center">TKP</th>
                      <th width="3%" colspan="3" align="center">SKB</th>
                      <th width="3%" colspan="3" align="center">TGR</th>
                      <th width="3%" colspan="3" align="center">GW</th>
                      <th width="3%" colspan="3" align="center">ARC</th>
                      <th width="3%" colspan="3" align="center">GLX</th>
                      <th width="3%" colspan="3" align="center">PLB</th>
                      <th width="3%" colspan="3" align="center">CPT</th>
                      <th width="3%" colspan="3" align="center">MRS</th>
                      <th width="3%" colspan="3" align="center">SPG</th>
                      <th width="3%" colspan="3" align="center">BM</th>
                      <th width="3%" colspan="3" align="center">SL</th>
                      <th width="3%" colspan="3" align="center">CRS</th>
                      <th width="3%" colspan="3" align="center">YGY</th>
                      <th width="3%" colspan="3" align="center">BTG</th>
                      <th width="3%" colspan="3" align="center">MKR</th>
                      <th width="3%" colspan="3" align="center">BLP</th>
                      <th width="3%" colspan="3" align="center">MDN</th>
                      <th width="3%" colspan="3" align="center">PDM</th>
                      <th width="3%" colspan="3" align="center">PWK</th>

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
                </span>
                  <tbody>

                    <?php $no=0; foreach($data_kinerja as $row) { $no++ ?>
                    <?php 
                    
                    $row['jtn_r'] = $row['jtn_r'];
                    $row['jtn_t'] = $row['jtn_t'];
                    if ($row['jtn_t'] == 0) {
                    $akmjtn = 0;
                    } else { //jika pembagi tidak 0
                    $akmjtn = ($row['jtn_r'] / $row['jtn_t']) * 100;
                    }
                    //$akmjtn       = ($row['jtnr'] / $row['jtnt']) * 100;

                    $row['kmyr_r'] = $row['kmyr_r'];
                    $row['kmyr_t'] = $row['kmyr_t'];
                    if ($row['kmyr_t'] == 0) {
                    $akmkmyr = 0;
                    } else { //jika pembagi tidak 0
                    $akmkmyr = ($row['kmyr_r'] / $row['kmyr_t']) * 100;
                    }
                    // $akmkmyr      = ($row['kmyrr'] / $row['kmyrt']) * 100;

                    $row['bks_r'] = $row['bks_r'];
                    $row['bks_t'] = $row['bks_t'];
                    if ($row['bks_t'] == 0) {
                    $akmbks = 0;
                    } else { //jika pembagi tidak 0
                    $akmbks = ($row['bks_r'] / $row['bks_t']) * 100;
                    }
                    // $akmbks       = ($row['bksr'] / $row['bkst']) * 100;

                    $row['dpk_r'] = $row['dpk_r'];
                    $row['dpk_t'] = $row['dpk_t'];
                    if ($row['dpk_t'] == 0) {
                    $akmdpk = 0;
                    } else { //jika pembagi tidak 0
                    $akmdpk = ($row['dpk_r'] / $row['dpk_t']) * 100;
                    }
                    // $akmdpk       = ($row['dpkr'] / $row['dpkt']) * 100;

                    $row['dm_r'] = $row['dm_r'];
                    $row['dm_t'] = $row['dm_t'];
                    if ($row['dm_t'] == 0) {
                    $akmdm = 0;
                    } else { //jika pembagi tidak 0
                    $akmdm = ($row['dm_r'] / $row['dm_t']) * 100;
                    }
                    // $akmdm        = ($row['dmr'] / $row['dmt']) * 100;

                    $row['bgr_r'] = $row['bgr_r'];
                    $row['bgr_t'] = $row['bgr_t'];
                    if ($row['bgr_t'] == 0) {
                    $akmbgr = 0;
                    } else { //jika pembagi tidak 0
                    $akmbgr = ($row['bgr_r'] / $row['bgr_t']) * 100;
                    }
                    // $akmbgr       = ($row['bgrr'] / $row['bgrt']) * 100;

                    $row['pst_r'] = $row['pst_r'];
                    $row['pst_t'] = $row['pst_t'];
                    if ($row['pst_t'] == 0) {
                    $akmpst = 0;
                    } else { //jika pembagi tidak 0
                    $akmpst = ($row['pst_r'] / $row['pst_t']) * 100;
                    }
                    // $akmpst       = ($row['pstr'] / $row['pstt']) * 100;

                    $row['pdrn_r'] = $row['pdrn_r'];
                    $row['pdrn_t'] = $row['pdrn_t'];
                    if ($row['pdrn_t'] == 0) {
                    $akmpdrn = 0;
                    } else { //jika pembagi tidak 0
                    $akmpdrn = ($row['pdrn_r'] / $row['pdrn_t']) * 100;
                    }
                    // $akmpdrn      = ($row['pdrnr'] / $row['pdrnt']) * 100;

                    $row['tprahu_r'] = $row['tprahu_r'];
                    $row['tprahu_t'] = $row['tprahu_t'];
                    if ($row['tprahu_t'] == 0) {
                    $akmtprahu = 0;
                    } else { //jika pembagi tidak 0
                    $akmtprahu = ($row['tprahu_r'] / $row['tprahu_t']) * 100;
                    }
                    // $akmtprahu    = ($row['tprahur'] / $row['tprahut']) * 100;

                    $row['skbm_r'] = $row['skbm_r'];
                    $row['skbm_t'] = $row['skbm_t'];
                    if ($row['skbm_t'] == 0) {
                    $akmskbm = 0;
                    } else { //jika pembagi tidak 0
                    $akmskbm = ($row['skbm_r'] / $row['skbm_t']) * 100;
                    }
                    // $akmskbm      = ($row['skbmr'] / $row['skbmt']) * 100;

                    $row['tgr_r'] = $row['tgr_r'];
                    $row['tgr_t'] = $row['tgr_t'];
                    if ($row['tgr_t'] == 0) {
                    $akmtgr = 0;
                    } else { //jika pembagi tidak 0
                    $akmtgr = ($row['tgr_r'] / $row['tgr_t']) * 100;
                    }
                    // $akmtgr       = ($row['tgrr'] / $row['tgrt']) * 100;

                    $row['gw_r'] = $row['gw_r'];
                    $row['gw_t'] = $row['gw_t'];
                    if ($row['gw_t'] == 0) {
                    $akmgw = 0;
                    } else { //jika pembagi tidak 0
                    $akmgw = ($row['gw_r'] / $row['gw_t']) * 100;
                    }
                    // $akmgw        = ($row['gwr'] / $row['gwt']) * 100;

                    $row['arca_r'] = $row['arca_r'];
                    $row['arca_t'] = $row['arca_t'];
                    if ($row['arca_t'] == 0) {
                    $akmarca = 0;
                    } else { //jika pembagi tidak 0
                    $akmarca = ($row['arca_r'] / $row['arca_t']) * 100;
                    }
                    // $akmarca      = ($row['arcar'] / $row['arcat']) * 100;

                    $row['glxy_r'] = $row['glxy_r'];
                    $row['glxy_t'] = $row['glxy_t'];
                    if ($row['glxy_t'] == 0) {
                    $akmglxy = 0;
                    } else { //jika pembagi tidak 0
                    $akmglxy = ($row['glxy_r'] / $row['glxy_t']) * 100;
                    }
                    // $akmglxy      = ($row['glxyr'] / $row['glxyt']) * 100;

                    $row['plb_r'] = $row['plb_r'];
                    $row['plb_t'] = $row['plb_t'];
                    if ($row['plb_t'] == 0) {
                    $akmplb = 0;
                    } else { //jika pembagi tidak 0
                    $akmplb = ($row['plb_r'] / $row['plb_t']) * 100;
                    }
                    // $akmplb       = ($row['plbr'] / $row['plbt']) * 100;

                    $row['cpt_r'] = $row['cpt_r'];
                    $row['cpt_t'] = $row['cpt_t'];
                    if ($row['cpt_t'] == 0) {
                    $akmcpt = 0;
                    } else { //jika pembagi tidak 0
                    $akmcpt = ($row['cpt_r'] / $row['cpt_t']) * 100;
                    }
                    // $akmcpt       = ($row['cptr'] / $row['cptt']) * 100;

                    $row['mks_r'] = $row['mks_r'];
                    $row['mks_t'] = $row['mks_t'];
                    if ($row['mks_t'] == 0) {
                    $akmmks = 0;
                    } else { //jika pembagi tidak 0
                    $akmmks = ($row['mks_r'] / $row['mks_t']) * 100;
                    }
                    // $akmmks       = ($row['mksr'] / $row['mkst']) * 100;

                    $row['spg_r'] = $row['spg_r'];
                    $row['spg_t'] = $row['spg_t'];
                    if ($row['spg_t'] == 0) {
                    $akmspg = 0;
                    } else { //jika pembagi tidak 0
                    $akmspg = ($row['spg_r'] / $row['spg_t']) * 100;
                    }
                    // $akmspg       = ($row['spgr'] / $row['spgt']) * 100;

                    $row['bymk_r'] = $row['bymk_r'];
                    $row['bymk_t'] = $row['bymk_t'];
                    if ($row['bymk_t'] == 0) {
                    $akmbymk = 0;
                    } else { //jika pembagi tidak 0
                    $akmbymk = ($row['bymk_r'] / $row['bymk_t']) * 100;
                    }
                    // $akmbymk      = ($row['bymkr'] / $row['bymkt']) * 100;

                    $row['solo_r'] = $row['solo_r'];
                    $row['solo_t'] = $row['solo_t'];
                    if ($row['solo_t'] == 0) {
                    $akmsolo = 0;
                    } else { //jika pembagi tidak 0
                    $akmsolo = ($row['solo_r'] / $row['solo_t']) * 100;
                    }
                    // $akmsolo      = ($row['solor'] / $row['solot']) * 100;

                    $row['ciruas_r'] = $row['ciruas_r'];
                    $row['ciruas_t'] = $row['ciruas_t'];
                    if ($row['ciruas_t'] == 0) {
                    $akmciruas = 0;
                    } else { //jika pembagi tidak 0
                    $akmciruas = ($row['ciruas_r'] / $row['ciruas_t']) * 100;
                    }
                    // $akmciruas    = ($row['ciruasr'] / $row['ciruast']) * 100;

                    $row['yogya_r'] = $row['yogya_r'];
                    $row['yogya_t'] = $row['yogya_t'];
                    if ($row['yogya_t'] == 0) {
                    $akmyogya = 0;
                    } else { //jika pembagi tidak 0
                    $akmyogya = ($row['yogya_r'] / $row['yogya_t']) * 100;
                    }
                    // $akmyogya     = ($row['yogyar'] / $row['yogyat']) * 100;

                    $row['bitung_r'] = $row['bitung_r'];
                    $row['bitung_t'] = $row['bitung_t'];
                    if ($row['bitung_t'] == 0) {
                    $akmbitung = 0;
                    } else { //jika pembagi tidak 0
                    $akmbitung = ($row['bitung_r'] / $row['bitung_t']) * 100;
                    }
                    // $akmbitung    = ($row['bitungr'] / $row['bitungt']) * 100;

                    $row['mksr_r'] = $row['mksr_r'];
                    $row['mksr_t'] = $row['mksr_t'];
                    if ($row['mksr_t'] == 0) {
                    $akmmksr = 0;
                    } else { //jika pembagi tidak 0
                    $akmmksr = ($row['mksr_r'] / $row['mksr_t']) * 100;
                    }
                    // $akmmksr      = ($row['mksrr'] / $row['mksrt']) * 100;

                    $row['blkppn_r'] = $row['blkppn_r'];
                    $row['blkppn_t'] = $row['blkppn_t'];
                    if ($row['blkppn_t'] == 0) {
                    $akmblkppn = 0;
                    } else { //jika pembagi tidak 0
                    $akmblkppn = ($row['blkppn_r'] / $row['blkppn_t']) * 100;
                    }
                    // $akmblkppn    = ($row['blkppnr'] / $row['blkppnt']) * 100;

                    $row['mdn_r'] = $row['mdn_r'];
                    $row['mdn_t'] = $row['mdn_t'];
                    if ($row['mdn_t'] == 0) {
                    $akmmdn = 0;
                    } else { //jika pembagi tidak 0
                    $akmmdn = ($row['mdn_r'] / $row['mdn_t']) * 100;
                    }
                    // $akmmdn       = ($row['mdnr'] / $row['mdnt']) * 100;

                    $row['pdm_r'] = $row['pdm_r'];
                    $row['pdm_t'] = $row['pdm_t'];
                    if ($row['pdm_t'] == 0) {
                    $akmpdm = 0;
                    } else { //jika pembagi tidak 0
                    $akmpdm = ($row['pdm_r'] / $row['pdm_t']) * 100;
                    }
                    // $akmpdm       = ($row['pdmr'] / $row['pdmt']) * 100;

                    $row['pwt_r'] = $row['pwt_r'];
                    $row['pwt_t'] = $row['pwt_t'];
                    if ($row['pwt_t'] == 0) {
                    $akmpwt = 0;
                    } else { //jika pembagi tidak 0
                    $akmpwt = ($row['pwt_r'] / $row['pwt_t']) * 100;
                    }
                    // $akmpwt       = ($row['pwtr'] / $row['pwtt']) * 100;

                    $capai= $row['jtn_r'] + $row['kmyr_r'] + $row['bks_r'] + $row['dpk_r'] + $row['dm_r'] + $row['bgr_r'] + $row['pst_r']  + $row['tprahu_r'] + $row['skbm_r'] + $row['tgr_r'] + $row['gw_r'] + $row['arca_r'] + $row['glxy_r'] + $row['plb_r'] + $row['cpt_r'] + $row['mks_r'] + $row['spg_r'] + $row['bymk_r'] + $row['solo_r'] + $row['ciruas_r'] + $row['yogya_r'] + $row['bitung_r'] + $row['mksr_r'] + $row['mdn_r'] + $row['blkppn_r'] + $row['pdm_r'] + $row['pwt_r'];
                    $target= $row['jtn_t'] + $row['kmyr_t'] + $row['bks_t'] + $row['dpk_t'] + $row['dm_t'] + $row['bgr_t'] + $row['pst_t']  + $row['tprahu_t'] + $row['skbm_t'] + $row['tgr_t'] + $row['gw_t'] + $row['arca_t'] + $row['glxy_t'] + $row['plb_t'] + $row['cpt_t'] + $row['mks_t'] + $row['spg_t'] + $row['bymk_t'] + $row['solo_t'] + $row['ciruas_t'] + $row['yogya_t'] + $row['bitung_t'] + $row['mksr_t'] + $row['mdn_t'] + $row['blkppn_t'] + $row['pdm_t'] + $row['pwt_t'] ;

                    if($target == 0 ){
                      $akm = 0;
                    }else{
                    $akm = $capai/$target*100;
                  }
                    ?>
                    <tr>
                      <td width="470" style="vertical-align:middle;text-align:center;color:white;">........................................</td>
                      <td class="col1"><?php echo $no; ?></td>
                      <!-- <td class="col2"><?php echo $row['tanggal']; ?></td> -->
                      <td class="col6"><?php echo $row['nama_uraiankrs']; ?></td>
                       <!--JTN-->
                       <td><?php echo number_format($row['jtn_t'],1); ?></td>
                       <td <?php 
                           if($row['jtn_r'] < $row['jtn_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['jtn_r'] > $row['jtn_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['jtn_r']; ?></td>
                       <td style="background-color:#A9A9A9;"> <?php echo number_format($akmjtn,1); ?></td>
                       <!--KMYR-->
                       <td><?php echo number_format($row['kmyr_t'],1); ?></td>
                       <td <?php 
                           if($row['kmyr_r'] < $row['kmyr_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['kmyr_r'] > $row['kmyr_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['kmyr_r']; ?></td>
                       <td style="background-color:#A9A9A9;"> <?php echo number_format($akmkmyr,1); ?></td>
                       <!--BKS-->
                       <td><?php echo number_format($row['bks_t'],1); ?></td>
                       <td <?php 
                           if($row['bks_r'] < $row['bks_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bks_r'] > $row['bks_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bks_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbks,1); ?></td>
                       <!--DPK -->
                       <td><?php echo number_format($row['dpk_t'],1); ?></td>
                       <td <?php 
                           if($row['dpk_r'] < $row['dpk_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['dpk_r'] > $row['dpk_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['dpk_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmdpk,1); ?></td>
                       <!--DM -->
                       <td><?php echo number_format($row['dm_t'],1); ?></td>
                       <td <?php 
                           if($row['dm_r'] < $row['dm_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['dm_r'] > $row['dm_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['dm_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmdm,1); ?></td>
                       <!--BGR -->
                       <td><?php echo number_format($row['bgr_t'],1); ?></td>
                       <td <?php 
                           if($row['bgr_r'] < $row['bgr_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bgr_r'] > $row['bgr_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bgr_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbgr,1); ?></td>
                       <!--PST -->
                       <td><?php echo number_format($row['pst_t'],1); ?></td>
                       <td <?php 
                           if($row['pst_r'] < $row['pst_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pst_r'] > $row['pst_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pst_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpst,1); ?></td>
                       <!--PDRN -->
                       <td><?php echo number_format($row['pdrn_t'],1); ?></td>
                       <td <?php 
                           if($row['pdrn_r'] < $row['pdrn_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pdrn_r'] > $row['pdrn_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pdrn_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpdrn,1); ?></td>
                       <!--TPRAHU -->
                       <td><?php echo number_format($row['tprahu_t'],1); ?></td>
                       <td <?php 
                           if($row['tprahu_r'] < $row['tprahu_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['tprahu_r'] > $row['tprahu_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['tprahu_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmtprahu,1); ?></td>
                       <!--SKBM -->
                       <td><?php echo number_format($row['skbm_t'],1); ?></td>
                       <td <?php 
                           if($row['skbm_r'] < $row['skbm_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['skbm_r'] > $row['skbm_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['skbm_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmskbm,1); ?></td>
                       <!--TGR -->
                       <td><?php echo number_format($row['tgr_t'],1); ?></td>
                       <td <?php 
                           if($row['tgr_r'] < $row['tgr_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['tgr_r'] > $row['tgr_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['tgr_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmtgr,1); ?></td>
                       <!--GW -->
                       <td><?php echo number_format($row['gw_t'],1); ?></td>
                       <td <?php 
                           if($row['gw_r'] < $row['gw_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['gw_r'] > $row['gw_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['gw_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmgw,1); ?></td>
                       <!--ARCA -->
                       <td><?php echo number_format($row['arca_t'],1); ?></td>
                       <td <?php 
                           if($row['arca_r'] < $row['arca_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['arca_r'] > $row['arca_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['arca_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmarca,1); ?></td>
                       <!--GLXY -->
                       <td><?php echo number_format($row['glxy_t'],1); ?></td>
                       <td <?php 
                           if($row['glxy_r'] < $row['glxy_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['glxy_r'] > $row['glxy_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['glxy_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmglxy,1); ?></td>
                       <!--PLB -->
                       <td><?php echo number_format($row['plb_t'],1); ?></td>
                       <td <?php 
                           if($row['plb_r'] < $row['plb_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['plb_r'] > $row['plb_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['plb_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmplb,1); ?></td>
                       <!--CPT -->
                       <td><?php echo number_format($row['cpt_t'],1); ?></td>
                       <td <?php 
                           if($row['cpt_r'] < $row['cpt_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['cpt_r'] > $row['cpt_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['cpt_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmcpt,1); ?></td>
                       <!--MKS -->
                       <td><?php echo number_format($row['mks_t'],1); ?></td>
                       <td <?php 
                           if($row['mks_r'] < $row['mks_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mks_r'] > $row['mks_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mks_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmks,1); ?></td>
                       <!--SPG -->
                       <td><?php echo number_format($row['spg_t'],1); ?></td>
                       <td <?php 
                           if($row['spg_r'] < $row['spg_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['spg_r'] > $row['spg_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['spg_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmspg,1); ?></td>
                      <!--BYMK -->
                       <td><?php echo number_format($row['bymk_t'],1); ?></td>
                       <td <?php 
                           if($row['bymk_r'] < $row['bymk_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bymk_r'] > $row['bymk_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bymk_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbymk,1); ?></td>
                      <!--SOLO -->
                       <td><?php echo number_format($row['solo_t'],1); ?></td>
                       <td <?php 
                           if($row['solo_r'] < $row['solo_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['solo_r'] > $row['solo_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['solo_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmsolo,1); ?></td>
                      <!--CIRUAS -->
                       <td><?php echo number_format($row['ciruas_t'],1); ?></td>
                       <td <?php 
                           if($row['ciruas_r'] < $row['ciruas_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['ciruas_r'] > $row['ciruas_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['ciruas_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmciruas,1); ?></td>
                      <!--YOGYA -->
                       <td><?php echo number_format($row['yogya_t'],1); ?></td>
                       <td <?php 
                           if($row['yogya_r'] < $row['yogya_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['yogya_r'] > $row['yogya_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['yogya_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmyogya,1); ?></td>
                      <!--BITUNG -->
                       <td><?php echo number_format($row['bitung_t'],1); ?></td>
                       <td <?php 
                           if($row['bitung_r'] < $row['bitung_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['bitung_r'] > $row['bitung_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['bitung_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmbitung,1); ?></td>
                      <!--MKSR -->
                       <td><?php echo number_format($row['mksr_t'],1); ?></td>
                       <td <?php 
                           if($row['mksr_r'] < $row['mksr_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mksr_r'] > $row['mksr_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mksr_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmksr,1); ?></td>
                      <!--BLP -->
                       <td><?php echo number_format($row['blkppn_t'],1); ?></td>
                       <td <?php 
                           if($row['blkppn_r'] < $row['blkppn_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['blkppn_r'] > $row['blkppn_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['blkppn_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmblkppn,1); ?></td>
                      <!--MDN -->
                       <td><?php echo number_format($row['mdn_t'],1); ?></td>
                       <td <?php 
                           if($row['mdn_r'] < $row['mdn_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['mdn_r'] > $row['mdn_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['mdn_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmmdn,1); ?></td>
                      <!--PDM -->
                       <td><?php echo number_format($row['pdm_t'],1); ?></td>
                       <td <?php 
                           if($row['pdm_r'] < $row['pdm_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pdm_r'] > $row['pdm_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pdm_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpdm,1); ?></td>
                      <!--PWT -->
                       <td><?php echo number_format($row['pwt_t'],1); ?></td>
                       <td <?php 
                           if($row['pwt_r'] < $row['pwt_t'] ) {
                           echo 'style="background-color:Firebrick;color:white;">';
                           }elseif($row['pwt_r'] > $row['pwt_t']){
                           echo 'style="background-color:Skyblue;color:black;">';
                           }else{
                           echo 'style="background-color:white;color:black;">';
                           } ?> <?php echo $row['pwt_r']; ?></td>
                        <td style="background-color:#A9A9A9;"> <?php echo number_format($akmpwt,1); ?></td>

                        <td style="background-color:#708090;"> <?php echo number_format($akm,1); ?></td>



                    </tr>
                    <?php } ?>
                  
                  </tbody>
                
                </table>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
        </div><!-- /.row (main row) -->
</form>
      </section><!-- /.content -->


       <!-- modal -->
      <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
  <div class="panel panel-info" >
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 align="center" class="modal-title" >CETAK</h4></td>
      </div>
        <div class="modal-body">

<form action="<?php echo base_url(); ?>Cetak_laporankinerja/cetak_kinerja" method="POST" target="blank">

      <div class="form-group">
       <input class="form-control" style="margin-bottom: : 3px" id="datepicker6" type="DATE" name = "tanggal1" placeholder="periode_awal..." required />
     </div>
     <div class="form-group">
       <p align="center"><b>s/d</b></p>
     </div>
     <div class="form-group">
       <input class="form-control"  style="margin-bottom: : 3px" id="datepicker7" type="DATE" name = "tanggal2" placeholder="periode_akhir..." required/>
      </div>    
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
          <input type="submit" class="btn btn-info" value="CETAK">
        </div>
                </fieldset>
                </form>   
                </div></div></div></div></div>                          
  <!-- end modal -->
