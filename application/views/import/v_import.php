<form action="<?php echo base_url();?>Import/Breupload" enctype="multipart/form-data" method="post">
<input name="file" type="file" />
<input type="submit" value="Import File" />
</form>

<?php echo $this->session->flashdata('msg'); ?>
