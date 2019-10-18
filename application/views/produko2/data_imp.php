<section class="content-header">
		<h4>
          <b style="text-align: center;">IMPORT DETAIL PRODUK</b>
        </h4>
    </section>
<style type="text/css">
table {
	width: 100%;
    border-collapse: collapse;
}

table{
    border: 1px solid #A9A9A9;
}

th{
	border: 1px solid #A9A9A9;
	height: 30px;
	font-weight: bold;
	color:#000000;
}

td{
    border: 1px solid #A9A9A9;
	 height: 25px;
	 color:#000000;
	 padding: 5px;
}
	
</style>		
        
<!-- Main content -->
        <section class="content">
	
	
          <!-- Small boxes (Stat box) -->
          <div class="row">
          	<span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
            <div class="col-md-12">
			 <div class="box box-primary">
              <div class='box-header with-border'> 
			  <a style="margin-bottom:3px" href="<?php echo base_url("index.php/C_Impexel/form"); ?>" class="btn btn-warning no-radius dropdown-toggle">
			  <i class="glyphicon glyphicon-download-alt"></i> IMPORT DATA </a>

			
			<div class="col-md-12">
			
				
		
				
			
			</div>
			
				<div class="box-body table-responsive">	
                 <table id="tb-datatables">
                  <thead>
                    <tr style="background-color: #E6E6FA;">
						<th style="vertical-align:middle;text-align:center;" width="5">NO.</th>
						<th style="vertical-align:middle;text-align:center;" width="120">PABRIK ID</th>
						<th style="vertical-align:middle;text-align:center;" width="120">NAMA PRODUK</th>
						<th style="vertical-align:middle;text-align:center;" width="120">HARGA</th>
						<th style="vertical-align:middle;text-align:center;" width="120">DISKON</th>
						<th style="vertical-align:middle;text-align:center;" width="50">KODE PRODUK</th>
						<th style="vertical-align:middle;text-align:center;" width="120">KOMPOSISI</th>
						<th style="vertical-align:middle;text-align:center;" width="100">KODE DISTRIBUTOR</th>
						<th style="vertical-align:middle;text-align:center;" width="100">TIPE HARGA</th>
						
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($dataprod as $dt) { $no++ ?>
                    <tr>
						<td style="text-align:center;" width="5"><?php echo $no; ?></td>
						<td style="text-align:center;" width="5"><?php echo $dt->koper; ?></td>
						<td style="text-align:center;" width="5"><?php echo $dt->nama_produk; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->harga; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->discount; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->kode_produk; ?></td>
						<td style="text-align:left;" width="120"><?php echo $dt->deskripsi; ?></td>
						<td style="text-align:center;" width="50"><?php echo $dt->kodis; ?></td>
						<td style="text-align:center;" width="50"><?php echo $dt->tipe_harga; ?></td>
						
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content 