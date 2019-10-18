 <section class="content-header">
        <br/>
<!--
        <h4 style="text-align: center;">
          <b>DETAIL PRODUK OBAT BARUweqe</b><br>
      <b>PRINSIPAL</b><span> : </span><b><?php echo $prod->nm_perusahaan ?></b><br>
      <b>DISTRIBUTOR</b><span> : </span><b><?php echo $prod->nm_distributor ?></b>
    
	   </h4>-->
        </section>
		<a  style="margin-left:10px" href="<?php echo base_url(); ?>obat_reg/laporan_po_non_rr" class="btn btn-success"><i class="icon-remove-sign"></i> KEMBALI </a>

                <div class="box-title"><br>
         <div class="panel panel-primary"></div>
       
         
   
                 <br>
                </div>
                <div class="table-responsive">
                <div class="box-body">
				<form method="post" action="<?php echo base_url(); ?>obat_reg/save_ditolak_item" id="form-delete2">
                  <table id="tb-datatables" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="danger">
                      <th style="vertical-align: middle;text-align: center;">NO</th>
                      <th style="vertical-align: middle;text-align: center;">KODE OBAT</th>
                      <th style="vertical-align: middle;text-align: center;">NAMA OBAT</th>
                      <th style="vertical-align: middle;text-align: center;">JUMLAH</th>
                      <th style="vertical-align: middle;text-align: center;">HARGA</th>
                      <th style="vertical-align: middle;text-align: center;">DISCOUNT</th>
                      <th style="vertical-align: middle;text-align: center;">DISCOUNT KHUSUS</th>
                      <th style="vertical-align: middle;text-align: center;">PPN</th>
                      <th style="vertical-align: middle;text-align: center;">SUBTOTAL</th>

					  
                  </tr>
				  
                                                       
                    </tr>
                    
                  </thead>
                  <tbody>
                   <?php $no=0;
				   $qty3=0;
                    
                     foreach($data_prods2 as $row) { 
                               $qty3 += $row['subtotal'];
							   $no++                              
                                
                      ?>
                    <tr>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $no; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['obatid']; ?></td>
                       <td><?php echo $row['obatnama']; ?></td>
                       <td style="vertical-align: middle;text-align: center;"><?php echo $row['jumlah']; ?></td>
                       <td>Rp.<?php echo number_format ($row['hargasatuan'], 2,',','.'); ?></td>
                       <td style="text-align: center;"><?php echo $row['disc']; ?> %</td>
                       <td style="text-align: center;"><?php echo $row['disckhusus']; ?> %</td>
                       <td style="text-align: center;"><?php echo $row['ppn'];  ?></td>
                       <td>Rp.<?php echo number_format ($row['subtotal'], 2,',','.'); ?></td>
					  
				
				   
                      
                    </tr>
                        <?php
                             }?>
                  </tbody>
                
                </table>

                 <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
				 <tr  bgcolor="skyblue">  <td width="140"><b>GRAND TOTAL</b></td><td width="10">:</td><td width="50%"><b>Rp. <?php echo number_format ($qty3, 2,',','.'); ?></b></td></tr>
                   <tr  bgcolor="skyblue">  <td width="140"><b>JUMLAH PRODUK</b></td><td width="10">:</td><td width="50%"><b> <?php echo count($data_prods2); ?></b></td></tr>
                   </tr>
                    </table>
                </div>
               </div>
            </div>
            </div>
          </div>
        </div>




