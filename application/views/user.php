<?php $this->load->view('header'); ?>
<div id="page-wrapper">

            <div class="row">
            <div class="panel-body">
                <?php if(isset($success)){ ?>
                <div id="div-alert" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($success)) echo $success;?>
                </div>
                <?php } ?>
                <?php if(isset($success_update)){ ?>
                <div id="div-alert" class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($success_update)) echo $success_update;?>
                </div>
                <?php } ?>
<!-- input master -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="glyphicon glyphicon-user"></i> DATA USER
                                <a data-toggle="modal" href="#ModalTambahUser" type="button" class="btn btn-xs btn-success pull-right"><i class="glyphicon glyphicon-plus"> Tambah</i> </a>
                            </h3>   
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <td>Username</td>
                                    <td>Password</td>
                                    <td>Level</td>
                                    <td>Action </td>
                                </thead>
                                <tbody>
                                    <?php foreach ($daftar_user as $key) { ?>
                                    <tr>
                                        <td><?php echo $key->username?></td>
                                        <td><?php echo md5($key->password); ?></td>
                                        <td><?php 
                                                if ($key->level=="") {
                                                    echo "User";
                                                }else{
                                                    echo "Admin";
                                                }
                                         ?></td>
                                        <td class="col-sm-2"><center>
                                            <?php if ($validasi_admin !== 1): ?>
                                                <a href="<?php echo site_url('login/deleteUser/').$key->id?>" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                                 <a data-toggle="modal" href="#ModalUpdate"  class="btn btn-default" onclick="return forUpdate(<?php echo $key->id.",'".$key->username."','".$key->password."'"; ?>);"><i class="glyphicon glyphicon-edit"></i></a>
                                            
                                            <?php endif ?>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                        <br>
                        
                        <br><br>
                    </div>
            </div>
<!-- end input master -->
            
            </div>
            </div>
</div>
<!-- tampilan pop-up  -->
<div id="ModalUpdate" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center>Update</center></h4>
            </div>
            <?php echo form_open_multipart('login/updateUser/'); ?>
            <?php echo validation_errors(); ?>
            <div class="modal-body">
                <div class="form-horizontal">
                <div class="form-group">
                    <input type="text" id="id1" name="id" hidden>
                    <label class="control-label col-sm-3" for="email">Username </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username1" name="username" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Password </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="password1" name="password">
                    </div>
                </div>
                </div>
            </div>                          
            <div class="modal-footer">
                <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- end tampilan pop-up  -->

<!-- popup tambah user -->
<div id="ModalTambahUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Tambah User</strong></h3>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <?php echo form_open_multipart('Login/createUser/'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Username </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="username1" name="username" placeholder="Username" maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Password </label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="password1" name="password" placeholder="Password" maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Level </label>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="radio" name="level" value="admin" required="required"> Admin
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="radio" name="level" value="" required="required"> User
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Batal</button>
                
            </div>    
        </div>
    </div>
</div>
<!-- pop up tambah user end -->
<script type="text/javascript">
    function forUpdate(id,username,password) {
                document.getElementById('id1').value=id;
                document.getElementById('username1').value=username;
                document.getElementById('password1').value=password;
            }
</script>

<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
        <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script type="text/javascript">
            $(".chosen").chosen();
            $(document).ready(function() {
                $('#coba').DataTable({
                    "ordering": false
                    "searching": false
                    "bSortable": false 
                });
                $('#kuda').DataTable({});
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
<?php $this->load->view('footer');?>