<!DOCTYPE html>
<html>
<head>
	<title>IMPORT DATA MASTER PERUSAHAAN</title>
	
</head>
<section>
<body>
	<div class="container">
		<br />
		<h3 align="center">Import Excel Data Perusahaan</h3>
		<form method="post" id="import_form" enctype="multipart/form-data">
			<p><label>Select Excel File .xlsx</label>
			<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
			<br />
			<input type="submit" name="import" value="Import" class="btn btn-info" />
			 <a href="<?php echo site_url('masterperusahaan')?>" class="btn"><i class="icon-remove-sign"></i> BATAL </a>
		</form>
		<br />
		<div class="table table-responsive" id="customer_data">

		</div>
	</div>
</body>
</section>
</html>

