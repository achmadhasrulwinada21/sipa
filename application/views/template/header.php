<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="logo"><b>SIPA</b><b></b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
              
                <!-- Notifications: style can be found in dropdown.less -->
              
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <!--    <i class="fa fa-flag-o"></i> -->
                       <!--  <span class="label label-danger">9</span> -->
                    </a>
                   
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <img style="width:20px;height:20px" src="<?php echo base_url(); ?>assets/upload/<?php echo  $this->session->userdata('fotoprofil'); ?>" class="img-circle" alt="Profil Menunggu" /> 
                        <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                         <img style="width:80px;height:80px" src="<?php echo base_url(); ?>assets/upload/<?php echo  $this->session->userdata('fotoprofil'); ?>" class="img-circle" alt="Profil Menunggu" />
                            <p>
                                <?php echo $this->session->userdata('nama'); ?> / <?php echo $this->session->userdata('nama_role'); ?>
                                <small>Dibuat Pada : <?php echo $this->session->userdata('createddate'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-12 text-center" align="center">
                                <a href="#"> <b><?php echo $this->session->userdata('namars'); ?></a></b>
                            </div>
                           <!-- <div class="col-xs-4 text-center">
                                <a href="#">Departemen</a>
                            </div>-->
                            <div class="col-xs-4 text-center">
                                <a href="#"></a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <!-- <div class="pull-left">
                                <a href="<?php// echo site_url('dashboard/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-right">
                                <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-danger btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
