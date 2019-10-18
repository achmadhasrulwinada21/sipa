	 
	 
	 <section class="content-header">
    <h1 style="text-align:center;">
       <b> Data Alkes OutStanding</b>
        <small></small>
    </h1>
      
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <div id="form_perush">
          <div class="row">
            <div class="col-md-12">
              <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>master_jenis_pekerjaan/addperusahaan" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>excel_import" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-folder-open"></i>IMPORT_new</a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/form" class="btn btn-warning no-radius dropdown-toggle"><i class="fa fa-folder-open"></i> IMPORT DATA FROM EXCEL </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>ci_to_excel/export_perush_depbang" class="btn btn-danger no-radius dropdown-toggle"><i class="fa fa-external-link"></i> EXPORT DATA TO EXCEL  </a>-->
			  <!--<a style="margin-bottom:3px" href="<?php echo base_url(); ?>rpt_alum/report_alum" class="btn btn-default no-radius dropdown-toggle"><i class="fa fa-print"></i> CETAK EXCEL </a>-->
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
				
					
			
	   
                  <div class="box-body">
                  <div class="box-body table-responsive">
              <table id="tb-datatables" class="table table-bordered table-hover">

                  <thead bgcolor="#4682B4" style="font-family: arial; color: white;" >
                    <tr>
                      <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Perusahaan</th>
                      <th style="text-align:center;">Nama Produk</th>
					  <th style="text-align:center;">Tanggal</th>
					  <th style="text-align:center;">Catatan</th>
					  <th style="text-align:center;">Catatan Produk</th>
                      <th style="text-align:center;">Detail</th>
					  <th style="text-align:center;">Update</th>
					  <th style="text-align:center;">Approve</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_alkes_outs as $row)
                     { $no++ ?>
                    <tr>
                      <td style="text-align:center;"><?php echo $no; ?></td>
                      <td style="text-align:left;"><?php echo $row['nm_perusahaan']; ?></td>
                      <td style="text-align:left;"><?php echo $row['nama_produk']; ?></td>
					  <td style="text-align:center;"><?php echo $row['tanggal_tr']; ?></td>
					  <td style="text-align:center;"><?php echo $row['catatanheadrevisi']; ?></td>
					  <td style="text-align:center;"><?php echo $row['cttndetilrevisi']; ?></td>
                      <td style="text-align:center;">
					  <a href="<?php echo base_url(); ?>master_jenis_pekerjaan/editmaster_jenis_pekerjaan_depbang/<?php echo $row['iddetailalkes']; ?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                      </td>
					  <td style="text-align:center;">
					  <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $row['iddetailalkes']; ?>"><i class="fa fa-edit"></i></a>
                     </td>
					 <td style="text-align:center;">
					  <a onclick="return confirm('Anda Yakin Hapus Data??');" class="btn btn-success btn-sm" href="<?php echo base_url(); ?>master_jenis_pekerjaan/hapus_master_jenis_pekerjaan/<?php echo $row['iddetailalkes']; ?>"><i class="fa fa-check"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.chat -->
        </div>
		</div>
		</div>
       </section>
	   </div>
	   
	   
	   
	 