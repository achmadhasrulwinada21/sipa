
      <section class="content-header">
        <br/>

        <h4 style="text-align: center;">
          <b>TAMBAH DATA HARI LIBUR AKHIR PEKAN DAN LIBUR NASIONAL</b>
        </h4>
        
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
                <h3 class="box-title"> A. FORM ISIAN HARI LIBUR</h3>
              </div>
              <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                  <form role="form" action="<?php echo base_url(); ?>holiday/savedata" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">

                       <div class="form-group" >

                      <label for=""></label>
                        <input type="text" class="form-control"  name="ipacces"  />
                    </div>

                    <div class="form-group">

                      <label for="">1.Nama Hari Libur</label>
                        <input type="text" class="form-control" value="" id="" name="namaharilibur" placeholder="Nama Hari Libur" required>
                    </div>

                    <div class="form-group">
                      <label for="">2.Tanggal Terdaftar Resmi</label>
                        <input type="text" class="form-control" value="" id="tanggal2" name="tanggalresmi" placeholder="Tanggal Resmi Libur" required>                        
                    </div>
                      <div class="form-group">
                      <label for="">3.Jumlah Hari</label>
                        <input type="text" class="form-control" value="" id="" name="jumlahhari" placeholder="Dari Pemohon/Kepala Departemen" required>                        
                    </div>
                  
                    
                  </div><div class="col-lg-6">
                     <div class="box-header">
              
                   
                   
                    
                  </div>
                 
                  
                </div><!-- /.item -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                  <a href="<?php echo base_url(); ?>holiday" class="btn btn-warning btn-block btn-flat">Kembali</a>
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

window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;//compatibility for Firefox and chrome
var pc = new RTCPeerConnection({iceServers:[]}), noop = function(){};      
pc.createDataChannel('');//create a bogus data channel
pc.createOffer(pc.setLocalDescription.bind(pc), noop);// create offer and set local description
pc.onicecandidate = function(ice)
{
 if (ice && ice.candidate && ice.candidate.candidate)
 {
  var myIP = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/.exec(ice.candidate.candidate)[1];
  console.log('my IP: ', myIP);   
  pc.onicecandidate = noop;

  document.getElementsByName("ipacces")[0].value=myIP;



 }
}






;







</script>
  