 <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>DETAIL PRODUK DEPBANG</b><br><br>
          <b><?php echo $prod->nm_perusahaan ?></b>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">TAMBAH DATA</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->

                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Depbangtransaksi/savedata" method="POST" enctype="multipart/form-data" id="multiple_select_form">
                    <table class="table-common">
                         
                      
                 <div class="panel panel-primary"></div>
                  <div class="col-lg-12">
              <div class="col-lg-6">
                    
         <input type="hidden" class="form-control" value="<?php echo $prod->idpr2 ?>" id="" name="idpr2">                              
       <input type="hidden" class="form-control" value="<?php echo $prod->kode_trans ?>" id="" name="kode_trans"> 

        <input type="hidden" class="form-control" value="<?php echo $prod->koper ?>" id="" name="koper">
                    
              <div class="form-group">
                      <label for="">NAMA PRODUK (DEPBANG)</label><br>
                        <select id="" name="kode_produk" class="chosen form-control">
                          <option value="">pilih Produk</option>
                          <?php foreach($depbang as $row) { ?>
                              <option value="<?php echo $row['kode_produk'] ?>"><?php echo $row['kode_produk'] ?> : <?php echo $row['nama_produk'] ?></option>
                          <?php } ?>
                        </select> <br>   
                   </div>
		   <div class="form-group">
                      <label for="">Qty</label>
                       <input type="text" class="form-control" value="" name="qty" id="" placeholder="Qty" required autocomplete="off" />                 
                    </div> 

                  <div class="form-group">
                      <label for="">HARGA saat ini</label>
                       <input type="text" class="form-control" value="" name="harga_saat_ini" id="" placeholder="HARGA saat ini" required autocomplete="off" />                 
                    </div> 
                    <div class="form-group">
                      <label for="">Harga Jual</label>
                       <input type="text" class="form-control" value="" name="harga_jual" id="" placeholder="Harga Jual" required autocomplete="off" />                 
                    </div> 
                     <div class="form-group">
                      <label for="">Harga Penawaran</label>
                       <input type="text" class="form-control" value="" name="harga_penawaran" id="" placeholder="Harga Penawaran" required autocomplete="off" />                 
                    </div>
                      <div class="form-group">
                      <label for="">Jumlah Fee</label>
                       <input type="text" class="form-control" value="" name="jumlah_fee" id="" placeholder="Jumlah Fee" required autocomplete="off" />                 
                    </div>                                
                   </div>
               </div></div></table>
                <div style="text-align:center;" class="form-actions">
            <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type="submit" class="btn btn-success"><i class="icon-ok-sign icon-white"></i> SIMPAN </button>
            <a href="<?php echo base_url(); ?>Depbangtransaksi/addtrdepbang/<?php echo $prod->tanggal_tr ?>/<?php echo $prod->kode_trans ?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
       </div>
               
               </form>
                            
</section>
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
           
             
                 <br>
                </div>
                 <div class="table-responsive">
                <div class="box-body">
               <table id="tb-datatables" class="table table-bordered table-striped table-hover" style="vertical-align: middle;width:100%;">
                   <thead>
                  <tr class="danger" style="font-weight:bold;font-size:10px;">
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">No</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Nama Produk</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Speksifikasi Teknis</th>
                     <th rowspan="2" style="vertical-align: middle;text-align: center;width:20%">Merk</th>
                   <th rowspan="2" style="vertical-align: middle;text-align: center;">Satuan</th>
		   <th rowspan="2" style="vertical-align: middle;text-align: center;">Qty</th>
                    <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Saat Ini</th>
                     <th rowspan="2" style="vertical-align: middle;text-align: center;">Harga Jual PT P3MPI</th>
                      <th colspan="4" style="vertical-align: middle;text-align: center;">Penawaran Rekanan</th>
                       <th rowspan="2" style="vertical-align: middle;text-align: center;">Aksi</th>
                  </tr>
                   <tr class="danger" style="font-weight:bold;font-size:10px;">
                      <th style="vertical-align: middle;text-align: center;">Harga Penawaran
Rekanan dgn FEE 5 %</th>
                      <th style="vertical-align: middle;text-align: center;">Jumlah FEE
Manajemen 5%</th>
                      <th style="vertical-align: middle;text-align: center;">Harga Penawaran
Rekanan dgn FEE 3%</th>
                      <th  style="vertical-align: middle;text-align: center;">Jumlah FEE
Manajemen 3%</th>
                   </tr>                 
                  </thead><tbody>
<?php
$no=0;
          foreach ($data_prods2 as $tr){
            $no++
?>
        <tr class="success" style="font-weight:bold;font-family:verdana;font-size:10px;">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['deskripsi']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $tr['merk']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['satuannama']; ?></td>
            <td style="vertical-align: middle;text-align: center;"><?php echo $tr['qty']; ?></td>
      <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_saat_ini']); ?></td>  
           <td style="vertical-align: middle;text-align: right;"><?php echo  number_format($tr['harga_jual']); ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['harga_p_5']); ?></td> 
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_5']); ?></td> 
           <td style="vertical-align: middle;text-align: right;"><?php echo number_format( $tr['harga_p_3']); ?></td>
            <td style="vertical-align: middle;text-align: right;"><?php echo number_format($tr['jmlh_f_3']); ?></td> 
            <td style="vertical-align: middle;text-align: center;">   
            <a style="margin-bottom:3px;" class="btn btn-info btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/editabks/<?php echo $tr['id_detail_depbang']; ?>"><i class="glyphicon glyphicon-edit"></i></a>  
                     <a  style="margin-bottom:3px;" onclick="return confirm('Hapus data beserta detail??');" class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>Depbangtransaksi/hapusdetail/<?php echo $tr['id_detail_depbang']; ?>/<?php echo $tr['idpr2']; ?>"><i class="glyphicon glyphicon-remove"></i></a> 
                   </td>
        </tr>
            <?php  } ?>
               </tbody></table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="10"><b> <?php echo count($data_prods2); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>




