<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIPA| Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">  
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">        
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet"> 

        <link rel="shortcut icon" href="<?= base_url('') ?>assets/img/HerminaIcon.ico">    
        <style>


        p{

            font-size:20px;


        }


       </style>

    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#" ><b></b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">SISTEM INFORMASI PROSES ADMINISTRASI </p>
                <p class="login-box-msg"><img src="assets/img/LogoHHG.jpg" width="120px;" /></p>
                <?php
                    echo form_open('login/proses');                       
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                        ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
                    <?php } ?>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Nama Pengguna"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
					
                    <div class="form-group has-feedback">
                        <input type="password" name="password" value="" id="mypass" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<br>
					<input type=button id="show" value="Show Password" onclick="ShowPassword()" class="btn btn-danger btn-xs pull-right">
					<input type=button style="display:none" id="hide" value="Hide Password" onclick="HidePassword()" class="btn btn-danger btn-xs pull-right">
                    </div>
					
					<script>
					function ShowPassword()
					{
						if(document.getElementById("mypass").value!="")
						{
						document.getElementById("mypass").type="text";
						document.getElementById("show").style.display="none";
						document.getElementById("hide").style.display="block";
						}
					}

					function HidePassword()
					{
						if(document.getElementById("mypass").type == "text")
						{
						document.getElementById("mypass").type="password"
						document.getElementById("show").style.display="block";
						document.getElementById("hide").style.display="none";
						}
					}
					</script>
					
					
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>                        
                        </div><!-- /.col -->
						<br><br>
					   <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>                
                <div class="social-auth-links text-center">
                    <p style="font-size:100%;">Copyright©2019 PT. Medikaloka Hermina, Tbk. </p>
                   <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                    -->
                    </div>

              <!--   <a href="#">Lupa Password</a><br>
                <a href="#" class="text-center">Registrasi</a> -->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>       
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
