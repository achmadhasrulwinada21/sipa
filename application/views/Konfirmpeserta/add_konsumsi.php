
      <section class="content-header">
        <h1>
          <b>TAMBAH DATA KONSUMSI</b>
        </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Chat box -->
            <div class="box">
              <div class="box-header">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">FORM TAMBAH</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>Konsumsi/savedata" method="POST" enctype="multipart/form-data">

                    <div class="col-lg-12">

                   <div class="form-group">
                      <label for="">KODE KONSUMSI</label>
                        <select type="" name="kode_kons" class="form-control" >
                          
                          <?php foreach($data_konsumsi as $row) { ?>
                              <option ="" value="<?php echo $row['kode_peserta'] ?>"><?php echo $row['kode_peserta'] ?></option>
                          <?php } ?>
                        </select>                        
                    </div> 

                    <div class="form-group">
                      <label for="">DESKRIPSI</label>
                        <input type="text" class="form-control" value="" id="" name="deskripsi" placeholder="Isikan deskripsi" required>
                    </div>
                    <div class="form-group">
                      <label for="">HARGA</label>
                        <input type="text" class="form-control" value="" id="" name="harga" placeholder="Isikan harga" required>                     
                    </div>

                    <div class="form-group">
                      <label for="">QTY</label>
                        <input type="text" class="form-control" value="" id="" name="qty" placeholder="Isikan qty" required>
                    </div>

                    
                    <?php 
            $koderole=($this->session->userdata('koderole'));
            if($koderole=='1' OR $koderole=='5' OR $koderole=='10'):
          ?> 
            <div class="form-group">
                      <label for="">Departemen</label>
                       <select name="departemen4" class="form-control" required>
                          <option>--Pilih Departemen--</option>
                          <?php foreach($optrole as $row)  {  $macamrole=$row['nama_role']; $kodemacamrole=$row['nama_role'];?>
                           
                              <option value="<?php echo $row['nama_role'] ?>"><?php echo $row['nama_role'] ?></option>


                          <?php } ?>
                        </select>  
                    </div>
          <?php endif;?>          

          <?php 
              $koderole=($this->session->userdata('koderole'));
              if($koderole!='1' && $koderole!='5' && $koderole!='10'):
              ?> 
          <div class="form-group">
                      <label for="">Departemen</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_role'); ?>" id="" name="departemen4" readonly>
                    </div>
          <?php endif;?>
                          
                   
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>dafdir" class="btn btn-warning btn-block btn-flat">Kembali</a>
                </div><!-- /.col -->
               </form>
              </div><!-- /.chat -->
            </div><!-- /.box (chat box) -->
          </section><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section><!-- right col -->
        </div><!-- /.row (main row) -->

      </section><!-- /.content -->

  <script>
    $(function() {
    $( "#datepicker1" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

    $(function() {
    $( "#datepicker2" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

      $(function() {
    $( "#datepicker3" ).datepicker({ dateFormat: "dd-mm-yy"});
    });

</script>
