<div id="#" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Input Data SWCT</strong></h3>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <?php echo form_open_multipart('Taping_Henkaten/createSWCT'); ?>
                    <?php echo validation_errors(); ?>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Material</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="material" id="mat_old">
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-3">Elemen Kerja</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="no" id="no">
                            <input type="text" class="form-control" name="method" id="method_old">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jenis" id="jenis">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Critical</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="critical" id="critical">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Related OS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="remarks" id="remarks">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">STD</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="std_time" id="erms">
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
                <!-- <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Batal</button> -->
                
            </div>    
        </div>
    </div>
</div>
</div>