  <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>"/>      
 <section class="content-header">

        <h4 style="text-align: center;">
          <b><span> DATA PRODUK DEPBANG</b><br>
            <b>TANGGAL TRANSAKSI<span>&nbsp:&nbsp</span></b><b><?php echo $tr->tanggal ?></b><br>
             <b>RUMAH SAKIT<span>&nbsp:&nbsp</span></b><b><?php echo $tr->namars ?></b>
           </span>
        </h4>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <section class="col-lg-12">
            <!-- Chat box -->
           <div class="box">
              <div class="box-body chat" id="chat-box">
                <!-- chat item --><br><br>
                <form role="form" action="<?php echo base_url(); ?>Laporandepbang/expor_detildepbang" method="POST"  enctype="multipart/form-data" target="blank">
                         
              <div class="form-group" hidden>
                    <label>PERIODE AWAL</label>
                       <input type="text" name="tanggal_tr" value="<?php echo $tr->tanggal ?>" id="" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                       <input type="text" name="koders" value="<?php echo $tr->koders ?>" id="" autocomplete="off" placeholder="masukan tanggal" class="form-control" required>
                    </div> 
            <div style="text-align:left;margin-left:3%;" class="form-actions">
            <button  type="submit" class="btn btn-info"><i class="fa fa-print"></i> PRINT </button>
            
         </form>               
               <a class="btn btn-success btn-md" href="<?php echo base_url(); ?>Depbangtransaksi/cetakdepbang"><i class="glyphicon glyphicon-home"></i>&nbsp KEMBALI</a><br>
                <div class="item">
              </div><br></section>
              <section>  
            <div class="col-md-12">
                      <br>
              
                            

                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div class="box-title"><br>
        
             </div><!-- /.box-title -->
                <div class="table-responsive">
                <div class="box-body">

                 <table id="datatables4" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center" class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">Perusahaan</th>
                      <th style="vertical-align: middle;text-align: center;">Bidang Pekerjaan</th>
                       <th style="vertical-align: middle;text-align: center;">Sub Jenis Pekerjaan</th>
                        <th style="vertical-align: middle;text-align: center;">Lokasi</th>
                      <th style="vertical-align: middle;text-align: center;">Maincon</th>
                      <th style="vertical-align: middle;text-align: center;">Subcon</th>
                      <th style="vertical-align: middle;text-align: center;">Konsultan</th>
                       <th style="vertical-align: middle;text-align: center;">Keterangan</th>
                                               
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_produko as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                       <td><a style="margin-bottom:3px;margin-left:3px;margin-right:3px;" data-toggle="modal" href="#modal_editdara<?php echo $row['idpr2']; ?>"><?php echo $row['nm_perusahaan']; ?></a></td>
                       <td><?php echo $row['bidang_pekerjaan']; ?></td>
                        <td><?php echo $row['nm_sub_jenis_pekerjaan']; ?></td>
                         <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['maincon']; ?></td>
                       <td><?php echo $row['subcon']; ?></td>
                       <td><?php echo $row['konsultan']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>                                   
                    </tr>
                              <?php
                    
                             }?>
                  </tbody>
                
                </table>
               </div>
            </div>
               </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        

     

<!------- modal -------->

<?php
      foreach($data_produko as $i){
       $idpr2 = $i['idpr2'];     
         ?>
<div id="modal_editdara<?php echo $idpr2;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
  <div class="panel panel-success">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DETAIL</h4></td>
      </div>
        <div class="modal-body">
          <?php 
              $this->load->model('depbangkat');
          if (isset($idpr2)) {
      
    $tampil= $this->depbangkat->Getprodukms2("where idpr2=$idpr2 order  by idpr2 asc")->result_array();
    $prod = $this->db->get_where('v_produkos2',['idpr2'=>$idpr2])->row();

    }
        ?>

                <?php include 'tampil_detailall.php';?>

                </div>                
                   
                           </div>
                
               
 
              </div></div></div></div> 
             <?php } ?>

 
<!------- end modal -------->