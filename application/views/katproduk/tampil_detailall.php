 <div class="modal-content"> 
     <div class="modal-body">
          <?php 
              $this->load->model('farmasikat');
          if (isset($idpr2)) {
      
    $tampil= $this->farmasikat->Getprodukms2("where koded_prod='$idpr2' order  by koded_prod asc")->result_array();
    $prod = $this->db->get_where('v_produko2',['idpr2'=>$idpr2])->row();

    }
        ?>

               <table style="margin-bottom:3px;margin-left: 7px;margin-top: 5px;">
                   <tr>   <td width="200">NAMA PRINSIPAL</td><td width="10">:</td><td width="300"><?php echo $prod->nm_perusahaan ?></td></tr>
                     <tr>  <td width="200">NAMA DISTRIBUTOR</td><td width="10">:</td><td width="300"><?php echo $prod->kodis ?> </td></tr>
                   </table>
                    
                    <!-- <?php// } ?> -->
                 
                 <br>
                                     
                  <div class="table-responsive">
                <table id="" class="datatables58 table table-bordered table-striped table-hover">
                   <thead>
                  <tr class="danger">
                    <th style="vertical-align: middle;text-align: center;">No</th>
                    <th style="vertical-align: middle;text-align: center;">Nama Produk</th>
                    <th style="vertical-align: middle;text-align: center;">harga</th>
                    <th style="vertical-align: middle;text-align: center;">tipe harga</th>
                  </tr>
                   </thead><tbody>
<?php
$no=0;
          foreach ($tampil as $tr){
            $no++
?>
        <tr class="info">
          <td style="vertical-align: middle;text-align: center;" ><?php echo $no; ?></td>         
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['nama_produk']; ?></td>
          <td style="vertical-align: middle;text-align: right;">Rp.<?php echo number_format($tr['harga']); ?></td>
          <td style="vertical-align: middle;text-align: center;"><?php echo $tr['tipe_harga']; ?></td>         
        </tr>
            <?php  } ?>
               </tbody></table>
                    </div> 
                                       
 
              </div></div>
            
<!------- end modal -------->
