<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){
        ?>

        <div class="row-fluid">
            <div class="span6">
                <div hidden class="form-group">
                    <label class="control-label">Kode Barang</label>
                    <div class="controls">
                        <input class="form-control" name="kode_produk" type="text" value="<?php echo $row->kode_produk; ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <input class="form-control" name="nama_produk" type="text" value="<?php echo $row->nama_produk; ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label">Harga</label>
                    <div class="controls ">
                        <input class="form-control" name="total" type="text" value="<?php echo $row->total; ?>" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="span6">
    

                <div class="form-group">
                    <label class="control-label">Jumlah Pengadaan</label>
                    <div class="controls">
                        <input class="form-control" name="jumlah" type="text" class="" placeholder="Input Jumlah Pengadaan...">
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}
?>
