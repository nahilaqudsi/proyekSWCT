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
                                Tube (dim)
                            </h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open_multipart('taping_spec/editTube/'.$this->uri->segment(3)); ?>
                                <?php echo validation_errors(); ?>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <label class="col-sm-3 control-label">Batas Awal</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="batas_awal" name="batas_awal" placeholder="Batas Awal" required value="<?php echo $tube[0]->batas_awal ?>">
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <label class="col-sm-3 control-label">Batas Akhir</label>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" class="form-control" id="batas_akhir" name="batas_akhir" placeholder="Batas Akhir" required value="<?php echo $tube[0]->batas_akhir ?>">
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
        <br>
<?php $this->load->view('footer');?>