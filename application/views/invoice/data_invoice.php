
      <section class="content-header">
        <h1>
          <b>DATA INVOICE</b>
        </h1>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <a style="margin-bottom:3px" href="<?php echo base_url(); ?>invoice/addinvoice" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH DATA INVOICE </a> 
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title">
                  
                </div><!-- /.box-title -->
                <div class="box-body">
                <div class="table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>  
                      <th>STATUS</th>
                      <th>CATATAN</th>
                      <th>KEPADA</th>
                      <th>ALAMAT</th>
                      <th>INVOICE NO</th>
                      <th>INVOICE DATE</th>
                      <th>TERM OF PAYMENT</th>
                      <th>TANGGAL</th>
                      <th>KETERANGAN</th>
                      <th>NOMINAL</th>
					            <th>PPN</th>
<!--                       <th>TOTAL</th> -->
                      <th>ATAS NAMA</th>
                      <th>BANK</th>
                      <th>NO REKENING</th>
                      <th>NAMA PIC</th>                    
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_invoice as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                        <td>

                          <?php 
                          if($row['status'] == "Approve") {
                            echo '<p style="background-color:green;color:white;text-align:center;">Disetujui</p>';
                          }elseif($row['status'] == "Not Approved"){
                            echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
                          }elseif($row['status'] == "Revisi"){
                            echo '<p style="background-color:blue;color:white;text-align:center;">Revisi</p>';
                          }else{
                            echo '<p style="background-color:gold;color:white;text-align:center;">Menunggu Disetujui</p>';
                          }
                          ?>
                        </td>  
                         <td><?php echo $row['catatan']; ?></td>
                          <td><?php echo $row['kepada']; ?></td>
                          <td><?php echo $row['alamat']; ?></td>
                          <td><?php echo $row['invoice_no']; ?></td>
                          <td><?php echo $row['invoice_date']; ?></td>
                          <td><?php echo $row['term_pay']; ?></td>
                          <td><?php echo $row['tanggal']; ?></td>
                          <td><?php echo $row['keterangan']; ?></td>
                          <td><?php echo $row['nominal']; ?></td>
    					            <td><?php echo $row['ppn']; ?></td>
<!--                           <td><?php echo $row['total']; ?></td> -->
                          <td><?php echo $row['nama_perusahaan']; ?></td>
                          <td><?php echo $row['bank']; ?></td>
                          <td><?php echo $row['no_rekening']; ?></td>
                          <td><?php echo $row['pic']; ?></td>
                        <td>
                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>invoice/editinvoice/<?php echo $row['id_inv']; ?>"></a></td>
                      <td><a href="<?php echo base_url(); ?>invoice/hapusinvoice/<?php echo $row['id_inv']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>
                    </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

                </div><!-- /.box-body -->
            </div><!-- /.box -->

          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->
       
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
