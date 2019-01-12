<?php $this->load->view('header');?>

<div id="page-wrapper">
<div><br><center><h3><b>SYARAT 2 HOUSING</b></h3></center><hr></div>
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

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                         <table class="table table-bordered" id="example2">
                                    <thead>
                                        <td> syarat 2</td>
                                        <td> action </td>
                                    </thead>
                                     <tbody>
                                        <?php foreach ($daftar_syarat2 as $key) { ?>
                                        <tr>
                                            <td><?php echo $key->syarat2a?> - <?php echo $key->syarat2b?> <?php echo $key->dot?></td>
                                            <td class="col-sm-2"><center>
                                                <a href="<?php echo site_url('Crud_housing/editSyarat2/').$key->id_s2?>" type="button" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a href="<?php echo site_url('Crud_housing/deleteSyarat2/').$key->id_s2?>" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                                </a></center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody> 
                                </table>
            </div>         
        </div>
            </div>
            
</div>

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
        <script>
            function pindah(value,value2){
                document.getElementById('id_export').value=value;
                document.getElementById('data_std').value=value2;
            }
        </script>
        <br>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
<?php $this->load->view('footer');?>