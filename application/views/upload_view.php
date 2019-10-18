	<section class="content-header">
    <h1 style="text-align:center;" >
        FORM IMPORT DATA  (MASTER PERUSAHAAN)
        <small></small>
    </h1>
     				<td style="text-align:center"><a class="btn btn-default" href="<?php echo base_url("masterperusahaan"); ?>">Kembali</a></td>
    </section>



<section class="content">
          <!-- Small boxes (Stat box) -->
          












<form method="post" enctype="multipart/form-data">
   <label>Choose File</label>
       <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload">
    <h4>Total data :<b><?php echo $num_rows;?></b> PERUSAHAAN </h4>
</form>
