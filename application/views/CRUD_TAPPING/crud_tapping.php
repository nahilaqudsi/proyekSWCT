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
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER TAPPING
                            </h3>   
                        </div>
                        <br>
                         <label class="col-lg-2 control-label">+ type Elemen</label>
                            <?php echo form_open_multipart('Crud_tapping/createElemen'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="elemen" class="form-control" placeholder="elemen" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_tapping/lihatElemen/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                         <label class="col-lg-2 control-label">+ Detail Elemen</label>
                            <?php echo form_open_multipart('Crud_tapping/createDetail'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="detail_ek" class="form-control" placeholder="detail elemen kerja" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_tapping/lihatDetail/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                        <label class="col-lg-2 control-label">+ tube size</label>
                            <?php echo form_open_multipart('Crud_tapping/createTubesize'); ?>
                            <div class="col-lg-2">
                                <input type="text" name="tubesize1" class="form-control" placeholder="Tubesize1">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="tubesize2" class="form-control" placeholder="Tubesize2">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_tapping/lihatTubesize/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                        <label class="col-lg-2 control-label">+ Length</label>
                        <?php echo form_open_multipart('Crud_tapping/createLength'); ?>
                            <div class="col-lg-2">
                                <input type="text" name="length1" class="form-control" placeholder="length1">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="length2" class="form-control" placeholder="length2">
                            </div>


                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_tapping/lihatLength/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                        <?php echo form_close(); ?>
                        <br><br>
                    </div>
            </div>
<!-- end input master -->

<!-- input master SWCT -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER TAPPING <a href="<?php echo site_url('Crud_tapping/lihatPedoman/')?>"> <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                
                            </h3>   

                        </div>
                        <br>
                        <?php echo form_open_multipart('Crud_tapping/createPedoman'); ?>
                        <label class="col-lg-2 control-label">elemen kerja</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="id_e" name="id_e" required>
                                    <option value=""> - Select Element - </option>
                                    
                                        <?php foreach ($tappingElemen_list as $key){
                                            if($key->id_e==$this->input->post('id_e')){
                                                echo "<option value='".$key->id_e."'selected>".$key->elemen."</option>";
                                            } else{
                                                echo "<option value='".$key->id_e."'>".$key->elemen."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                            <br><br>
                        <label class="col-lg-2 control-label">detail elemen kerja</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="id_detail" name="id_detail" required>
                                    <option value=""> - Select Detail Element - </option>
                                    
                                        <?php foreach ($tappingDetail_list as $key){
                                            if($key->id_detail==$this->input->post('id_detail')){
                                                echo "<option value='".$key->id_detail."'selected>".$key->detail_ek."</option>";
                                            } else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                            <br><br>
                        <label class="col-lg-2 control-label">JUMLAH LILITAN</label>
                            <div class="col-lg-7">
                                <input type="text" name="jml_lilitan" class="form-control" placeholder="jumlah lilitan">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">tube size</label>
                            <div class="col-lg-7">
                               <select class="form-control chosen" id="id_tube" name="id_tube">
                                    <option value=""> - select TUBE SIZE - </option>
                                        <?php foreach ($tappingTubesize_list as $key){
                                            if($key->id_tube==$this->input->post('tubesize')){
                                                echo "<option value='".$key->id_tube."'selected>".$key->tube1."-".$key->tube2."</option>";
                                            } else{
                                                echo "<option value='".$key->id_tube."'>".$key->tube1."-".$key->tube2."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">length</label>
                            <div class="col-lg-7">
                               <select class="form-control chosen" id="id_length" name="id_length">
                                    <option value=""> - select LENGTH - </option>
                                        <?php foreach ($tappingLength_list as $key){
                                            if($key->id_length==$this->input->post('length')){
                                                echo "<option value='".$key->id_length."'selected>".$key->length1."-".$key->length2."</option>";
                                            } else{
                                                echo "<option value='".$key->id_length."'>".$key->length1."-".$key->length2."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">JUMLAH CCT</label>
                            <div class="col-lg-7">
                                <input type="text" name="jml_cct" class="form-control" placeholder="jumlah cct">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">ITENSITAS</label>
                            <div class="col-lg-7">
                                <input type="text" name="itensitas" class="form-control" placeholder="itensitas">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">Kategori</label>
                            <div >
                                <input type="radio" name="B" value="NON VALUE WORK"> NON VALUE WORK
                                   
                                <input type="radio" name="B" value="VALUE WORK"> VALUE WORK

                                <input type="radio" name="B" value="LANGKAH"> LANGKAH
                                
                            </div>
                        <br><br>
                       <label class="col-lg-2 control-label">FAMILY</label>
                            <div class="col-lg-2">
                                <input type="text" name="erm" class="form-control" placeholder="ERM">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="inp" class="form-control" placeholder="INP">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="floor" class="form-control" placeholder="FLOOR/GEAR">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" name="door" class="form-control" placeholder="DOOR">
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