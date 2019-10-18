 <section class="content-header">
        <br/>
<!--
        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT BARUweqe</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
    
	   </h4>-->
        </section>
		<?php
			$darabus=($this->session->userdata('koderole'));
				if($darabus !='67'):?>
		<a  style="margin-left:10px" href="<?php echo base_url(); ?>obat_reg/publisfarmasi" class="btn btn-success"><i class="icon-remove-sign"></i> KEMBALI </a>
			
                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
      
         
   
                 <br>
                </div>
				 <?php endif;?> 
                <div class="table-responsive">
                <div class="box-body">
				<form method="post" action="<?php echo base_url(); ?>obat_reg/save_ditolak_item" id="form-delete2">
                  <table id="tb-datatables" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">DISTRIBUTOR</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA PRODUK</th>
                      <th style="vertical-align: middle;text-align: center;">GOLONGAN</th>
                      <th style="vertical-align: middle;text-align: center;">KOMPOSISI</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA SATUAN</th>
                      <th style="vertical-align: middle;text-align: center;">DISKON</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA AKHIR</th>
                      <th style="vertical-align: middle;text-align: center;">CATATAN</th>

					  
                  </tr>
				  
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
                    
                     foreach($data_prods2 as $row) { 
                               $no++                              
                             
                      ?>
                    <tr>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                       <td><?php echo $row['nm_distributor']; ?></td>
                       <td><?php echo $row['nama_obat']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['golonganid']; ?></td>
                       <td><?php echo $row['komposisi']; ?></td>
                       <td style="text-align: center;">Rp.<?php echo number_format($row['harga_baru'], 2,',','.'); ?></td>
                       <td style="text-align: center;"><?php echo $row['discount_baru']; ?> %</td>
                       <td style="text-align: center;">Rp.<?php echo number_format($row['harga_akhir_baru'], 2,',','.'); ?></td>
                       <td><?php echo $row['catatan']; ?></td>
					  
				
				   
                      
                    </tr>
                        <?php
                             }?>
                  </tbody>
                
                </table>

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




