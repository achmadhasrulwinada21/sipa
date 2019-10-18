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
                    echo form_open('privilege/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">1. Nama Role</label>
                            <select name='role' class="form-control ">
                            <option value='0'>Pilih Role</option>
                                <?php
                                if (!empty($viewrole)) {
                                    foreach ($viewrole as $r) {
                                        echo "<option value=".$r->koderole.">".$r->nama_role."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>     


                         <div class="form-group">
                            <label for="">2. Nama Menu</label>
                            <select name='namamenu' class="form-control ">
                            <option value='0'>Pilih Sub Menu</option>
                                <?php
                                if (!empty($viewmenu)) {
                                    foreach ($viewmenu as $r) {
                                        echo "<option value=".$r->id_menu.">".$r->nama_menu."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>                                         
                      
                      
                        <div class="form-group">
                            <label for="">3. Kategori Menu</label>
                            <select name='kat_menu' class="form-control ">
                            <option value='0'>Menu Utama</option>
                                <?php
                                if (!empty($record)) {
                                    foreach ($record as $r) {
                                        echo "<option value=".$r->id_menu.">".$r->nama_menu."</option>";                                        
                                    }
                                }
                                ?>
                            </select>
                        </div>   
                       
                            <table id="isianprivilege" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>3.View</th>  
                      <th>4.Add</th>
                      <th>5.Edit</th>   
                      <th>6.Delete</th>
                      <th>7.Approval</th>
                   
                    
                    </tr>
                  </thead>
                  <tbody>




                  
                    <tr>
                      <td>  <input type="checkbox"  name="view" 
                                  ></input></td>
                      <td>   <input type="checkbox"  name="add" 
                                  ></input> </td>  

                     <td>  <input type="checkbox"  name="edit" 
                                   ></input></td>

                      <td><input type="checkbox"  name="delete" 
                                   ></input></td>

                    

                       <td><input type="checkbox"  name="approval" 
                                   ></input></td>
           
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