 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>UPDATE PRODUK PO</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>c_po/viewallpo"> <i class="fa fa-home"></i> Home</a></li>

    </ul>
<ul class="nav nav-tabs">
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">            

                <div class="container">

        <h4 class="alert alert-info alert-sm" style="text-align:center;font-weight:bold;font-family:verdana;">Keterangan</h4>
        <div class="row-fluid">
            <?php if(isset($dt_penjualan)){
                foreach($dt_penjualan as $row){
                    ?>
                    <div class="col-sm-6">
                         <dl class="dl-horizontal">
                            <dt>No Po :</dt>
                            <dd><?php echo $row->nopo?></dd>
                            <br/>
                            <dt>Tanggal Po :</dt>
                            <dd><?php echo date("d M Y",strtotime($row->tglpo));?></dd>
                            <br/>
                            <dt>Rumah Sakit :</dt>
                            <dd><?php echo $row->namars?></dd>
                         </dl>
                    </div></div>
                    <div class="col-sm-6">
                            <dl class="dl-horizontal">
                            <dt>Perusahaan :</dt>
                            <dd><?php echo $row->nm_perusahaan?></dd>
                            <br/>
                            <dt>Keterangan :</dt>
                            <dd><?php echo $row->keterangan?></dd>
                        </dl>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>

<div class="well">
    <h4 class="alert alert-info alert-sm" style="text-align: center;font-weight:bold;font-family:verdana;"> Daftar Barang</h4>
        <div class="row-fluid">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed" id='tb-datatables'>
                <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style='text-align:center;'>No</th>
                    <th style='text-align:center;'>Status Pengajuan</th>
                    <th style='text-align:center;'>Peruntukan</th>
                     <th style='text-align:center;'>Target Penggunaan Per Bulan</th>
                    <th style='text-align:center;'>Tarif per Penggunaan</th>
                    <th style='text-align:center;'>Kode Barang</th>
                    <th style='text-align:center;'>Nama Barang</th>
                    <th style='text-align:center;'>Qty</th>
                    <th style='text-align:center;'>Harga</th>
                    <th style='text-align:center;'>Subtotal</th>
                    <th style='text-align:center;'>Update</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                    <td style='text-align:center;'><?php echo $no++; ?></td>
                    <td style='text-align:center;'><?php echo $row->status_pengajuan?></td>
                    <td style='text-align:justify;'><?php echo $row->nm_lokasi?></td>
                     <td style='text-align:center;'><?php echo $row->tgtjml_guna_perbulan?></td>
                    <td style='text-align:right;'><?php echo number_format($row->trf_perguna)?></td>
                    <td style='text-align:center;'><?php echo $row->kode_produk?></td>
                    <td style='text-align:justify;'><?php echo $row->nama_produk?></td>
                    <td style='text-align:center;'><?php echo $row->jumlah?></td>
                     <td style='text-align:right;'>Rp. <?php echo number_format($row->harga)?></td>
                    <td style='text-align:right;'>Rp. <?php echo number_format($row->hargaakhir)?></td>
                     <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row->idpodtl; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                        </tr>
                  <?php }
                }
                ?>
                </tbody>
            </table>

            </div>
</div></div>

</div>
                              
                </div>                         
</section>
                             
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>




 <?php
        foreach($data_aprove as $dara){
       $idpodtl=$dara->idpodtl;
       $k_nopo=$dara->k_nopo;
       $jumlah=$dara->jumlah;
       $harga=$dara->harga;
       $hargaakhir=$dara->hargaakhir;
       $kode_produk=$dara->kode_produk;
       $nama_produk=$dara->nama_produk;
       $peruntukan=$dara->peruntukan;
       $nm_lokasi=$dara->nm_lokasi;
       $status_pengajuan=$dara->status_pengajuan;
       $tgtjml_guna_perbulan=$dara->tgtjml_guna_perbulan;
       $trf_perguna=$dara->trf_perguna;
       $koper=$dara->koper;
       $biaya_kirim=$dara->ongkir;
       $includeongkir=$dara->includeongkir;
          ?>
<div id="modal_edit<?php echo $idpodtl;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update</h4></td>
      </div>
        <div class="modal-body">
              <?php
                 $this->load->model('m_po');
             if(isset($koper)){
                   $id=$koper;
                  $tampil = $this->m_po->view_alkes_final($id);
              }
               $lokasi = $this->m_po->lokasi()->result_array();
               ?>
                  <form role="form"  action="<?php echo base_url(); ?>c_po/updatedetail" method="POST">
        <div class="form-group">
           <label for="">No PO</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $k_nopo ; ?>" id="" name="k_nopo" placeholder="" readonly>            
        </div>
        <div class="form-group"> 
        <label>Nama Produk :</label><br>
          <select id="" name="kode_produk" class="v3 form-control">
            <?php foreach($tampil as $row) { ?>
                     <option <?php if ($row->kode_produk == $kode_produk) echo 'selected' ; ?> value="<?php echo $row->kode_produk; ?>"><?php echo $row->nama_produk;?>
                    </option>
                <?php  } ?>
          </select>
        </div>
         <div class="form-group" hidden>
           <label for="">idpodtl</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $idpodtl ; ?>" id="" name="idpodtl" placeholder="" readonly>            
        </div>
          <div class="form-group">
           <label for="">Harga</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $harga ; ?>" id="" name="harga_akhir_baru" readonly>            
        </div>
        <div class="form-group">
           <label for="">Ongkir</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $biaya_kirim ; ?>" id="" name="biaya_kirim" readonly>            
        </div>
        <div class="form-group" hidden>
           <label for="">Ongkir</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $includeongkir ; ?>" id="" name="includeongkir" readonly >            
        </div>
         <div class="form-group">
           <label for="">Biaya Ongkir</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="" id="" name="biaya_ongkir" readonly >            
        </div>
         <div class="form-group">
           <label for="">jumlah</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $jumlah ; ?>" id="" name="jumlah" onFocus="startCalc88();" onBlur="stopCalc88();" placeholder="">            
        </div>
        <div class="form-group">
           <label for="">Target Jumlah Penggunaan Perbulan :</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $tgtjml_guna_perbulan ; ?>" id="" name="tgtjml_guna_perbulan">            
        </div>
        <div class="form-group">
           <label for="">Tarif Per Penggunaan :</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $trf_perguna ; ?>" id="" name="trf_perguna">            
        </div>
        <div class="form-group"> 
        <label>Status Pengajuan :</label><br>
              <select   name="status_pengajuan" class="dara form-control">
                    <option value="<?php echo $status_pengajuan; ?>"><?php echo $status_pengajuan; ?></option>
                    <option value="Baru" required>Baru</option>
                    <option value="Pergantian Barang Lama" required>Pergantian Barang Lama</option>
                    <option value="Service" required>Service</option>
                    <option value="Kalibrasi" required>Kalibrasi</option>
             </select>
        </div>      
        <div class="form-group"> 
        <label>Peruntukan :</label><br>
          <select  name="peruntukan" class="dara form-control">
             <?php foreach($lokasi as $row) { ?>
                 <option <?php if ($row['kode_lokasi'] == $peruntukan) echo 'selected' ; ?> value="<?php echo $row['kode_lokasi']; ?>"><?php echo $row['nm_lokasi'];?>
                </option>
            <?php  } ?>
          </select>
        </div>
       
      
            </div>
                   <div class="form-group" align="right" style="margin-right:14px;margin-bottom:15px;">
                   <input type="submit" class="btn btn-primary glyphicon glyphicon-save" value="SIMPAN">
                   </div><!-- /.col -->                     
                   
                           </div><!-- /.item -->
                
               </form>   
 
              </div></div></div></div> 
             <?php } ?>
              <!-- END MODAL edit -->