<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                 <img style="width:60px;height:60px" src="<?php echo base_url(); ?>assets/upload/<?php echo  $this->session->userdata('fotoprofil'); ?>" class="img-circle" alt="Profil Menunggu" />
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('nama'); ?></p>
                <p><?php echo $this->session->userdata('namars'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
       

        <ul class="sidebar-menu">
            <li class="header bg-blue-active">NAVIGASI MENU</li>            
            <?php
                  

                  $kd_role=$this->session->userdata('koderole');
                  $kd_view=$this->session->userdata('view');
                  // $ijinkases=$this->session->userdata('');


          
                 $main = $this->model->GetNavigasiMenu("where koderole ='$kd_role' and view='$kd_view' and link='#' order by nmmenu asc ", array('kt_menu' => 0)); 

                 // $main = $this->db->get_where('v_hakaksesfullaplikasi', array('kt_menu' => 0)); 
              
         
                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                          // $sub = $this->db->get_where('v_hakaksesfullaplikasi', array('kt_menu' => $m->id_menu));
                        
                         $id_menu = $m->id_menu;
                         $sub = $this->model->GetNavigasiMenu("where koderole='$kd_role' and kt_menu='$id_menu'"); 

                        // $sub = $this->model->GetNavigasiMenu("where koderole ='$kd_role'");

                      if ($sub->num_rows() > 0  ) {

                        // buat menu + sub menu

                        echo '<li>' . anchor($m->link, '<i class="' . $m->icon . '"></i>
                                                         <span class="treeview">' .$m->nmmenu . '</span>
                                                         <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle')); 

                        echo "<ul class='treeview-menu'>"; 

                    

                        foreach ($sub->result() as $s) {
                            echo '<li>' . anchor($s->link, '<i class="' . $s->icon . '"></i>' . $s->nmmenu) . '</li>';
                        }  


 
                        echo "</ul>";  


                        echo '</li>';     


                    } else {
                        // single menu
                        echo '<li>' . anchor($m->link, '<i class="' . $m->icon . ' fa-lg">
                                                         </i>  <span class="treeview">' . $m->nmmenu . '</span>') . '</li>';
                    }

                   
                 
                            
                } 

            ?>
        </ul><!--/.nav-list-->    
		 
    </section>
    <!-- /.sidebar -->
</aside>
