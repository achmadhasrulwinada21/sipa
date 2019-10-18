      
<section class="content-header">
    <h1>
        Transaksi VAR
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Transaksi VAR</li>
    </ol>
</section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <div id="tomboltambahkan">
            <a  style="margin-bottom:3px" href="<?php echo base_url(); ?>transaksikeu/addtransaksikeu" class="btn btn-primary no-radius dropdown-toggle"><i class="fa fa-plus"></i> TAMBAH TRANSAKSI VAR </a>
                 </div>             
              <div class="box">
                <span id="pesan-flash"><?php echo $this->session->flashdata('sukses'); ?></span>
                <span id="pesan-error-flash"><?php echo $this->session->flashdata('alert'); ?></span>
                <div  class="box-title">
                  
                </div><!-- /.box-title -->
                
                  <div class="box-body table-responsive">
                 <table id="tb-datatables" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA RUMAH SAKIT</th>
                      <th>PERIODE</th>
                      <th>KODE URAIAN</th>
                      <th>NILAI URAIAN</th>
                      <th>TANGGAL</th>
                      <th>WARNA CELL</th>
                      <th>STATUS VALID DATA</th>
                      <th>CATATAN</th>
                      <th>KELOLA DATA</th>
                      <th>HAPUS DATA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($data_transaksikeu as $row) { $no++ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['namars']; ?></td>
                      <td><?php echo $row['periode']; ?></td>
                      <td><?php echo $row['kodeur']; ?></td>
                      <td><?php echo $row['nilai_uraian']; ?></td>
                      <td><?php echo $row['cdate']; ?></td> 
                      <td><?php echo $row['colorcell']; ?></td>
                        <td>
                       <?php 
            if($row['status'] == "1") {
              echo '<p style="background-color:green;color:white;text-align:center;">Disetujui</p>';
            }elseif($row['status'] == "2"){
              echo '<p style="background-color:red;color:white;text-align:center;">Ditolak</p>';
            }elseif($row['status'] == "3"){
              echo '<p style="background-color:blue;color:white;text-align:center;">Revisi</p>';
            }else{
              echo '<p style="background-color:gold;color:white;text-align:center;">Draf</p>';
            }
            ?>   
                      </td>
                      <td><?php echo $row['catatan']; ?></td>

                        <td>
                      <a  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"   href="<?php echo base_url(); ?>transaksikeu/edittransaksikeu/<?php echo $row['id_trkeu']; ?>"></a></td>
                      <td><a href="<?php echo base_url(); ?>transaksikeu/hapustransaksikeu/<?php echo $row['id_trkeu']; ?>" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" onclick="return confirm(' Anda Benar Akan Menghapus data ini??');"></a></td>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
 
<!--Modal-->
<div class="modal fade" id="modalwaktu" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Peringatan!!</h4>
            </div>
            <div class="modal-body">
                <p>Batas Waktu Pengisian Eksekutif Keuangan Sampai Dengan Tanggal 10. Diharapkan Untuk Segera Mengisi Data Dengan Benar. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 
</body>
</html>

<script>
  function updateClock() {
    var now = new Date(), 
        date = [now.getDate()];
    var setwaktu=document.getElementById('time').innerHTML = [date].join('');

if(setwaktu>'4'){
  $('#modalwaktu').modal({
       show: 'true'
     });

} else if (setwaktu<='25'){

  $('#modalwaktu').modal({
       show: 'true'
     });
 } else {
  function hide (elements) {
  elements = elements.length ? elements : [elements];
   for (var index = 0; index < elements.length; index++) {
     elements[index].style.display = 'none';
   }
 }
hide(document.getElementById('tomboltambahkan'));
} 
}
updateClock(); 
</script>