

 <!--<ul class="nav nav-tabs">

        <li class="active"><a href="<?php echo base_url(); ?>obat_reg/laporan_po_non_rr">Laporan PO Non RR</a></li>
  

  
          <li class=""><a href="<?php echo base_url(); ?>obat_reg/laporan_khusus_rko">Laporan Khusus RKO</a></li>
    

          <li class=""><a href="<?php echo base_url(); ?>obat_reg/laporan_beli_obat_per_rs">Laporan Pembelian Obat Per RS</a></li>
  
 
   
   </ul>  -->  
	 
       <!-- Left col --><span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

 <section class="content-header">
    <h1 style="text-align:center;" >
        LAPORAN PO NON RR
        <small></small>
    </h1>
      
    </section>
          
	<section class="content">
	
	<div class="col-lg-4"></div>
			
	<div class="col-lg-4">
	
	 <form action="<?php echo base_url(); ?>laporan_po_non_rr/cari_po_non_rr" method="POST">
			<div class="form-group"> 
				 RUMAH SAKIT :<br>
			 <select name="namars" id="dara" class="form-control">
				<option value=""> Pilih Rumah Sakit : </option>
					<?php foreach($get_rs as $dt) { ?>
						<option value="<?php echo $dt['koders'] ; ?>">
						<?php echo $dt['namars']?></option>
				<?php  } ?>
			  </select>
			</div>
			
	
			<div class="form-group">
				PERIODE AWAL:<br>
				<input type="text" value="" id="datepicker11" name="tglawal" class="form-control" autocomplete="off">
			</div>
			  <b>s/d</b><br><br>
			<div class="form-group">
				PERIODE AKHIR:<br>
				<input type="text" value="" id="datepicker51" name="tglakhir" class="form-control" autocomplete="off">
			</div>
			
		
				<div style="text-align:left;margin-left:35%" class="form-actions">
					<button  type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i>&nbsp CARI </button>
				    <?php 
					error_reporting(0);
					if ($_REQUEST['namars'] && $_REQUEST['kodis'] && $_REQUEST['flagobat'] <>"") { ?>
					<?php } ?>
				 <a href="<?php echo base_url(); ?>obat_reg/laporan_po_non_rr" class="btn btn-default"><i class="icon-remove-sign"></i> BATAL </a>
				</div>
						</fieldset>
						</form>
						<br>
						</div>
						
			<form action="<?php echo base_url(); ?>laporan_po_non_rr/cetak_excel_non_rr" method="POST">

			
		<input type="hidden" name="keyword_koders" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['namars']; ?>">
		<input type="hidden" name="keyword_kodis" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['kodis']; ?>">
		<input type="hidden" name="keyword_tglawal" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['tglawal']; ?>">
		<input type="hidden" name="keyword_tglakhir" class="form-control" placeholder="Search..." value="<?php echo $_REQUEST['tglakhir']; ?>">
		
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
   
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box"> 	<br>
            
			<div class="box-body">
		<!--	<a  style="margin-left:10px" href="<?php echo base_url(); ?>laporan_po_non_rr/cari_po_non_rr" class="btn btn-success"><i class="icon-remove-sign"></i> KEMBALI </a>
			    
				  <a  style="margin-left:10px" id="excelku" class="btn btn-success"><i class="icon-remove-sign"></i> EXPORT EXCEL </a>	
         --->  
		 <div id="obatreg" class="form-group">
                      
              <label for="">JENIS REKAP</label><br>
                        <input type="radio" id="obatregx" name="flagobat" value="" onclick="myFunction_cariob()" required> Rekap Pencarian <br>
                        <input type="radio" id="obatregx" name="flagobat" value="" onclick="myFunction_cariob()" required> Rekap Semua (Obat) <br>
                       
            </div> 
		 
		 
		   <div id="obatregxy" style="display:none;" class="form-group">
		 <button  style="margin-left:10px" name="excel_search" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-new-window"></i>&nbsp Export To Excel Search </button>
		   </div>
		   <div id="obatregst" style="display:none;" class="form-group">
		 <button  style="margin-left:10px"name="excel_perobat"  type="submit" class="btn btn-success"><i class="glyphicon glyphicon-new-window"></i>&nbsp Export To Excel Obat </button>
		 <!--<a href="<?php echo base_url(); ?>laporan_po_non_rr/cetak_excel_non_rr_obat" class="btn btn-warning"><i class="icon-remove-sign"></i> Export To Excel Obat </a>-->
		   </div>
		   
		   </form>

		  
				  <br>  
             <div class="table-responsive">
                <div class="box-body">
				

				  <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
					  <th style="vertical-align: middle;text-align: center;">NO PO</th>
					  <th style="vertical-align: middle;text-align: center;">TANGGAL PO</th>
                      <th style="vertical-align: middle;text-align: center;">SUPPLIER</th>
                      <th style="vertical-align: middle;text-align: center;">PRINCIPAL</th>
                       <th style="vertical-align: middle;text-align: center;">NAMA RS</th>			 					   
                      <th style="vertical-align: middle;text-align: center;">AKSI</th>

					</tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_produko as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo $row['nopo']; ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo date('Y-m-d',strtotime($row['tglpo'])); ?></td>
					  <td style="vertical-align: middle;text-align: center;"><?php echo $row['s_nama']; ?></a></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['prinsipal']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['namars']; ?></td>
                      
							
							<td style="vertical-align: middle;text-align: center;">
								 
								<a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>obat_reg/lihatpononrr/<?php echo $row['nopo']; ?>"><i class="fa fa-desktop">&nbsplihat</i></a> 

								<?php
									$darabus=($this->session->userdata('koderole'));
									if($darabus =='82'):?>
								<a style="margin-bottom:3px;" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_editdara<?php echo $row['idpr2'];?>"><i class="glyphicon glyphicon-ok"></i>&nbsppublish</a>
								<?php endif;?> 
	
                         
                       <!--<a style="margin-bottom:3px;" class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>obat_reg/editheadfarmasi/<?php echo $row['idpr2']; ?>"><i class="glyphicon glyphicon-edit"></i></a> -->
                     
                     </td>
					
                    
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
				
				
         
				
				
				
               </div>
			   
			     
            </div>
</section>

 