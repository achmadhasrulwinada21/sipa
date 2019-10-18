
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <title>Codeigniter File Upload Example</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {

            padding-top: 5rem;
        }

        .starter-template {
          
          padding: 3rem 1.5rem;
          
          text-align: center;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>/index.php/upload"">Upload File <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h3>Codeigniter File Upload Example</h3>
            <br /><br />
        <?php echo form_open_multipart('/upload/upload_file'); ?>
           <?php echo $error; ?>
            <input type="file" name="userfile" size="20" class=" mr-sm-2" />
            <br /><br />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Upload File</button>

        </form>

      </div>

    </main><!-- /.container -->

  </body>
</html>
