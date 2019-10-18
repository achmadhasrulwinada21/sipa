<section class="content-header">
    <h1>
        Tambah Privilege Akses Aplikasi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Setting</a></li>
        <li class="active">Tambah Privilege</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open('privilege/edit');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden"  name="id" value="<?php echo $record['id_privilege'] ?>"  >
                            <label for="example">1. Nama Role</label>
                            <select name="role" class="form-control">
                                    <option value='0'>Pilih Role</option>
                                    <?php
                                    foreach ($viewrole as $k) {
                                        echo "<option value='$k->koderole'";
                                        echo $record['koderole'] == $k->koderole ? 'selected' : '';
                                        echo">$k->nama_role</option>";
                                    }
                                    ?>
                                </select>
                        </div>                                           
                       <!--  <div class="form-group">
                            <label for="">Icon</label>
                            <input type="text" class="form-control" name="icon" required oninvalid="setCustomValidity('Icon di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="ex : fa fa-dashboard">
                            <?php echo form_error('merek', '<div class="text-red">', '</div>'); ?>
                        </div>  -->  


                          <div class="form-group">
                            <label for="">2. Nama Sub Menu(Child)</label>
                            <select name='namamenu' class="form-control ">
                            <option value='0'>Pilih Menu Aplikasi</option>
                                <?php
                                 foreach ($viewmenu as $n) {
                                        echo "<option value='$n->id_menu'";
                                        echo $record['id_menu'] == $n->id_menu ? 'selected' : '';
                                        echo">$n->nama_menu</option>";
                                    }
                                ?>
                            </select>
                        </div>   
                       
                        <div class="form-group">
                            <label for="">3. Kategori Menu(Parent)</label>
                            <select name='kepalamenu' class="form-control ">
                            <option value='0'>Menu Utama</option>
                                <?php
                                 foreach ($recordmenu as $k) {
                                        echo "<option value='$k->id_menu'";
                                        echo $record['kt_menu'] == $k->id_menu ? 'selected' : '';
                                        echo">$k->nama_menu</option>";
                                    }

                                    //   foreach ($record as $r) {
                                    //     echo "<option value=".$r->id_menu.">".$r->nama_menu."</option>";                                        
                                    // }

                                
                                ?>
                            </select>
                        </div>   

                           
                       
                            <table id="isianprivilege" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>4.View</th>  
                      <th>5.Add</th>
                      <th>6.Edit</th>   
                      <th>7.Delete</th>
                      <th>8.Approval</th>
                   
                    
                    </tr>
                  </thead>
                  <tbody>


                    <tr>
                      <td>  <input type="checkbox"  name="view"   <?php echo $a1=$record['view']; if( $a1=='t') echo ' Checked '?> ></input></td>
                      <td>   <input type="checkbox"  name="add"  <?php echo $a1=$record['add']; if( $a1=='t') echo ' Checked '?>></input> </td>  

                     <td>  <input type="checkbox"  name="edit" 
                                   <?php echo $a1=$record['edit']; if( $a1=='t') echo ' Checked '?> ></input></td>

                      <td><input type="checkbox"  name="delete" 
                                   <?php echo $a1=$record['delete']; if( $a1=='t') echo ' Checked '?> ></input></td>

                    

                       <td><input type="checkbox"  name="approval" 
                                  <?php echo $a1=$record['approval']; if( $a1=='t') echo ' Checked '?> placeholder="ex : menu/add atau #"></input></td>
           
                    </tr>  


                   
               
                   
                  </tbody>
                </table>
 
                       
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo site_url('privilege'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>