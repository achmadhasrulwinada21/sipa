 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>DETAIL PRODUK PENERIMAAN ALKES</b><br><br>
        </h4>
        
        </section>
 
        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
           <div class="box">
             <ul class="nav nav-tabs">
    <li class=""><a href="<?php echo base_url(); ?>C_poacc/tampilpoacc"> <i class="fa fa-home"></i> Home</a></li>

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
                    <th style='text-align:center;'>Kode Barang</th>
                    <th style='text-align:center;'>Nama Barang</th>
                    <th style='text-align:center;'>Qty</th>
                    <th style='text-align:center;'>Qty Acc</th>
                    <th style='text-align:center;'>Harga</th>
                    <th style='text-align:center;'>Subtotal</th>
                     <th style='text-align:center;'>Update</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $no=1;
                if(isset($barang_jual2)){
                    foreach($barang_jual2 as $row ){
                        ?>
                        <tr>
                    <td style='text-align:center;'><?php echo $no++; ?></td>
                    <td style='text-align:center;'><?php echo $row->status_pengajuan?></td>
                    <td style='text-align:justify;'><?php echo $row->nm_lokasi?></td>
                       <td style='text-align:center;'><?php echo $row->kode_produk?></td>
                        <td style='text-align:justify;'><?php echo $row->nama_produk?></td>
                         <td style='text-align:center;'><?php echo $row->jumlah?></td>
                       <td style='text-align:center;'><?php echo $row->jumlahacc?></td>
                        <td style='text-align:right;'><?php echo number_format($row->harga) ?> </td>
                       <td style='text-align:right;'><?php echo number_format($row->subtotal2) ?> </td>
                       <td style="text-align:center;"><a data-toggle="modal" href="#modal_edit<?php echo $row->idpodtlacc ?>"><i class="glyphicon glyphicon-edit"></i></a>
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
</form>
 
    <?php
        foreach($data_aprove as $dara){
       $idpodtlacc=$dara->idpodtlacc;
       $k_nopo=$dara->k_nopo;
       $jumlah=$dara->jumlah;
       $jumlahacc=$dara->jumlahacc;
       $harga=$dara->harga;
       $kode_produk=$dara->kode_produk;
       $nama_produk=$dara->nama_produk;
       $peruntukan=$dara->peruntukan;
       $nm_lokasi=$dara->nm_lokasi;
       $status_pengajuan=$dara->status_pengajuan;
          ?>
<div id="modal_edit<?php echo $idpodtlacc;?>" class="modal fade">
  <div class="modal-dialog modal-md">
    <!-- <div class="modal-content"> -->
  <div class="panel panel-danger">
       <div class="panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update</h4></td>
      </div>
        <div class="modal-body">
              <?php
                 $this->load->model('m_poacc');
             if(isset($idpodtlacc)){
                   $id=$idpodtlacc;
                  $tampil = $this->m_poacc->view_alkes_final($id);
                 
              }
               $lokasi = $this->m_poacc->lokasi()->result_array();
               ?>
                  <form role="form"  action="<?php echo base_url(); ?>C_poacc/updatedetail" method="POST">
        <div class="form-group">
           <label for="">No PO</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $k_nopo ; ?>" id="" name="k_nopo" placeholder="" readonly>            
        </div>
        <div class="form-group"> 
        <label>Nama Produk Acc :</label><br>
         <input type="hidden" class="form-control" value="<?php echo $kode_produk ; ?>" id="" name="kode_produk" placeholder="">  
             <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $nama_produk ; ?>" id="" name="" placeholder="" readonly>  
         <!--  <select id="kode_produk" name="kode_produk" class="dara100 form-control">
            <option  value="<?php echo $kode_produk; ?>"selected><?php echo $nama_produk;?>
                </option> 
                <?php foreach($tampil as $row) { ?>
                 <option value="<?php echo $row->kode_produk; ?>"><?php echo $row->nama_produk;?>
                </option>
            <?php  } ?>
          </select> -->
        </div>
         <div class="form-group" hidden>
           <label for="">idpodtl</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $idpodtlacc ; ?>" id="" name="idpodtlacc" placeholder="" readonly>            
        </div>
          <div class="form-group">
           <label for="">Harga</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $harga ; ?>" id="" name="total" readonly>            
        </div>
         <div class="form-group">
           <label for="">jumlah Acc</label>
            <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $jumlahacc ; ?>" id="" name="jumlah" onFocus="startCalc88();" onBlur="stopCalc88();" placeholder="">            
        </div>
         <div class="form-group" hidden> 
        <label>Status Pengajuan :</label><br>
              <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $status_pengajuan ; ?>" id="" name="status_pengajuan" readonly>
        </div>      
        <div class="form-group" hidden> 
        <label>Peruntukan :</label><br>
          <input type="text" class="form-control" autocomplete="off"  
            value="<?php echo $nm_lokasi ; ?>" id="" name="" readonly>
             <input type="hidden" class="form-control" autocomplete="off"  
            value="<?php echo $peruntukan ; ?>" id="" name="peruntukan" readonly>
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