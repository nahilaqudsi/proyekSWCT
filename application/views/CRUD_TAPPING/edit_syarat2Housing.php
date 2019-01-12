<?php $this->load->view('header');?>

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

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="glyphicon glyphicon-user"></i>
                                       Syarat 1 Housing
                            </h3>   
                        </div>
                        <?php echo form_open_multipart('Crud_housing/editSyarat2/'.$this->uri->segment(3)); ?>
                      
                           <?php echo validation_errors(); ?>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="syarat2a" name="syarat2a" value="<?php echo $daftar_syarat2[0]->syarat2a ?>">
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="syarat2b" name="syarat2b" value="<?php echo $daftar_syarat2[0]->syarat2b ?>">
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="dot" name="dot" value="<?php echo $daftar_syarat2[0]->dot ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            
                            <?php echo form_close(); ?>
                        <br>

                        
                    </div>
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
<?php $this->load->view('footer');?>