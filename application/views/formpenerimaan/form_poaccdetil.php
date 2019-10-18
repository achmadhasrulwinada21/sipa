 <section class="content-header">
        <br/>

        <h4 style="text-align: center;font-family:verdana;">
          <b>TAMBAH PRODUK PENERIMAAN ALKES</b><br><br>
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

 <!-- <select id="" name="harga[]" class="dara99 form-control">
                            <option value=<?php echo $row->harga; ?>><?php echo $row->nama_produk;?> : Rp. <?php echo number_format($row->harga);?>
                             </option> 
                          <?php foreach($tampil as $p) { ?>
                       <option value="<?php echo $p->harga; ?>"><?php echo $p->nama_produk;?> : Rp. <?php echo number_format($p->harga);?>
                       </option>
                          <?php  } ?>
                       </select> -->

       <!--  <input type="hidden" value="<?php echo $row->kode_produk ?>" name="kode_produk[]"> -->
         <!--  <input type="text" value="<?php echo number_format($row->harga) ?>"  class="form-control" name="total[]" readonly><input type="hidden" value="<?php echo $row->harga ?>" name="harga[]" class="form-control" readonly> -->
 

<div class="well">
    <h4 class="alert alert-info alert-sm" style="text-align: center;font-weight:bold;font-family:verdana;"> Daftar Barang</h4>
        <div class="row-fluid">

          <form role="form" form name="form2" action="<?php echo site_url('C_poacc/simpan_acc') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $tr->k_nopo ?>" name="k_nopo">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-condensed" id='tb-datatables'>
                <thead>
                <tr bgcolor="#4682B4" style="font-family: arial; color: white;">
                    <th style='text-align:center;'>No</th>
                    <th style='text-align:center;'>Status Pengajuan</th>
                    <th style='text-align:center;'>Peruntukan</th>
                    <th style='text-align:center;'>Nama Barang</th>
                    <th style='text-align:center;'>Qty</th>
                     <th style='text-align:center;'>Qty Acc</th>
                    <th style='text-align:center;'>Harga</th>
                </tr>
                </thead>
                <tbody>
                 <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                    $this->load->model('m_poacc');
                     $idpodtl=$row->idpodtl;
                       if(isset($idpodtl)){
                   $id=$idpodtl;
                  $tampil = $this->m_poacc->view_alkes_final($id);
                 
              }
                        ?>
                        <tr>
                    <td style='text-align:center;'><?php echo $no++; ?><input type="hidden" value="1" name="status"></td>
                    <td style='text-align:center;'><?php echo $row->status_pengajuan?><input type="hidden" value="<?php echo $row->status_pengajuan ?>" name="status_pengajuan[]"></td>
                    <td style='text-align:justify;'><?php echo $row->nm_lokasi?> <input type="hidden" value="<?php echo $row->nopo ?>" name="nopo"><input type="hidden" value="<?php echo $row->kode_produk ?>" name="kode_produkdulu[]"></td>
                    <td style='text-align:center;'><?php echo $row->nama_produk?>
                         <input type="hidden" value="<?php echo $row->kode_produk ?>" name="kode_produk[]">
                         <!-- <select id="kode_produk" name="kode_produk[]" class="dara99 form-control">
                            <option data-harga="<?php echo $row->harga; ?>" value="<?php echo $row->kode_produk; ?>" selected><?php echo $row->nama_produk;?>
                             </option> 
                          <?php foreach($tampil as $p) { ?>
                       <option data-harga="<?php echo $p->total; ?>" value="<?php echo $p->kode_produk; ?>"><?php echo $p->nama_produk;?>
                       </option>
                          <?php  } ?>
                       </select> -->
                    </td>
                    <td style='text-align:center;'><?php echo $row->jumlah?><input type="hidden" value="<?php echo $row->jumlah ?>" name="jumlah[]"><input type="hidden" value="<?php echo $row->peruntukan ?>" name="peruntukan[]"></td>
                    <td style='text-align:center;'><input type="text" value="0" name="jumlahacc[]" class="form-control"><input type="hidden" value="<?php echo $row->hargaakhir ?>" name="hargaakhir[]"><input type="hidden" value="<?php echo $row->harga ?>" name="hargadulu[]" class="form-control" readonly></td>
                     <td style='text-align:right;'>

                        <input  type="text" value="<?php echo number_format($row->harga) ?>"  class="dd form-control" name="total[]" readonly>
                        <input class="dd" type="hidden" value="<?php echo $row->harga ?>" name="harga[]" class="form-control" readonly>
                   
                    </td>
                      </tr>
                  <?php }
                }
                ?>
                </tbody>
            </table>
             
            </div>
</div></div>
<div class='row'>
                  <div class='col-sm-12' style='padding-right: 0px;'>
                  </div>
                  <div class='col-sm-6'></div>
                  <div class='col-sm-6' style="margin-left:90%;">
                    <button onclick="return confirm('Apakah Data Detail Sudah Terisi ?... ');" type='submit' class='btn btn-primary btn-plat btn-md' id='Simpann'>
                      <i class='fa fa-floppy-o'></i> Simpan
                    </button>
                   </div>
                </div>
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
 
    