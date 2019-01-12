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
                                Length (mm)
                            </h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open_multipart('taping_spec/editLength/'.$this->uri->segment(3)); ?>
                                <?php echo validation_errors(); ?>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <label class="col-sm-3 control-label">Awal Length</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="awal_length" name="awal_length" placeholder="Awal Length" required value="<?php echo $length[0]->awal_length ?>">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <label class="col-sm-3 control-label">Akhir Length</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="akhir_length" name="akhir_length" placeholder="Akhir Length" required value="<?php echo $length[0]->akhir_length ?>">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" >
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
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
                <script type="text/javascript">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#example3').DataTable();
            } );
        </script>
        <br>
<?php $this->load->view('footer');?>