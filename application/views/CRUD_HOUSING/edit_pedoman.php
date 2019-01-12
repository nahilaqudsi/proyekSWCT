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


<!-- input master SWCT -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary"><?php echo json_encode($_POST);?>
                        
                        <?php echo form_open_multipart('Crud_housing/editPedoman/'.$this->uri->segment(3)); ?>
                        <label class="col-lg-2 control-label">elemen kerja</label>
                            <div class="col-lg-7">
                                <input type="text" name="elemen_kerja" class="form-control" value="<?php echo $daftar_pedoman[0]->elemen_kerja ?>">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">detail elemen kerja</label>
                            <div class="col-lg-7">
                                <input type="text" name="detail_ek" class="form-control" value="<?php echo $daftar_pedoman[0]->detail_ek?>" readonly>
                                <input type="text" name="idd" hidden value="<?php echo $daftar_pedoman[0]->idd?>">
                            </div>

                            <br><br>
                        <label class="col-lg-2 control-label">keterangan</label>
                            <div class="col-lg-7">
                                <input type="text" name="ket" class="form-control" value="<?php echo $daftar_pedoman[0]->ket?>">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">syarat 1</label>
                            <div class="col-lg-7">
                                <input type="text" name="syarat1" class="form-control" value="<?php echo $daftar_pedoman[0]->syarat1?>" readonly>
                                <input type="text" name="ids1" hidden value="<?php echo $daftar_pedoman[0]->ids1?>">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">syarat 2</label>
                            <div class="col-lg-2">
                                <input type="text" name="syarat2a" class="form-control" value="<?php echo $daftar_pedoman[0]->syarat2a?>" readonly>
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="syarat2b" class="form-control" value="<?php echo $daftar_pedoman[0]->syarat2b?>" readonly>
                                </div>
                                <div class="col-lg-2">
                                <input type="text" name="dot" class="form-control" value="<?php echo $daftar_pedoman[0]->dot?>"  readonly>
                                <input type="text" name="ids2" hidden value="<?php echo $daftar_pedoman[0]->ids2?>">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">???</label>
                            <div >
                               
                
                                
                                <?php if ($daftar_pedoman[0]->value_work=="1") {?>
                                         
                                    <input type="radio" name="B" value="VALUE WORK" checked="checked"> VALUE WORK
                                    <?php } else {?>
                                        <input type="radio" name="B" value="VALUE WORK"> VALUE WORK
                                    <?php }?>
                                    <?php if ($daftar_pedoman[0]->non_value_work=="1") {?>
                                        <input type="radio" name="B" value="NON VALUE WORK" checked="checked"> NON VALUE WORK
                                    <?php } else {?>
                                        <input type="radio" name="B" value="NON VALUE WORK" > NON VALUE WORK
                                    <?php }?>
                                    <?php if ($daftar_pedoman[0]->langkah=="1") {?>
                                        <input type="radio" name="B" value="LANGKAH" checked="checked"> LANGKAH
                                    <?php } else {?>
                                        <input type="radio" name="B" value="LANGKAH"> LANGKAH
                                    <?php }?>
        


                            </div>
                        <br><br>
                       <label class="col-lg-2 control-label">FAMILY</label>
                            <div class="col-lg-2">
                                <input type="text" name="erm" class="form-control" value="<?php echo $daftar_pedoman[0]->erm?>">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="inp" class="form-control" value="<?php echo $daftar_pedoman[0]->inp?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="floor" class="form-control" value="<?php echo $daftar_pedoman[0]->floor?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="door" class="form-control" value="<?php echo $daftar_pedoman[0]->door?>">
                            </div>
                        <br><br><br>
                        <div>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                        <br>
                    </div>
                     <?php echo form_close(); ?>
            </div>
<!-- end input master SWCT-->
            
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
<?php $this->load->view('footer');?>