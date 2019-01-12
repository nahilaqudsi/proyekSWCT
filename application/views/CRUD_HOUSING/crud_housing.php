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
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER HOUSING
                            </h3>   
                        </div>
                        <br>
                        <label class="col-lg-2 control-label">+ Elemen</label>
                            <?php echo form_open_multipart('Crud_housing/createE'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="nama_elemen" class="form-control" placeholder="masukkan elemen kerja" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_housing/lihatE/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                         <label class="col-lg-2 control-label">+ Detail Elemen</label>
                            <?php echo form_open_multipart('Crud_housing/createDetail'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="detail_ek" class="form-control" placeholder="detail elemen kerja" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_housing/lihatDetail/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                        <label class="col-lg-2 control-label">+ Syarat 1</label>
                            <?php echo form_open_multipart('Crud_housing/createSyarat1'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="syarat1" class="form-control" placeholder="syarat1">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_housing/lihatSyarat1/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br><br>
                        <label class="col-lg-2 control-label">+ Syarat 2</label>
                        <?php echo form_open_multipart('Crud_housing/createSyarat2'); ?>
                            <div class="col-lg-2">
                                <input type="text" name="syarat2a" class="form-control" placeholder="x">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="syarat2b" class="form-control" placeholder="y">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="dot" class="form-control" placeholder="satuan">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_housing/lihatSyarat2/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
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
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER HOUSING <a href="<?php echo site_url('Crud_housing/lihatPedoman/')?>"> <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                
                            </h3>   

                        </div>
                        <br>
                        <?php echo form_open_multipart('Crud_housing/createPedoman'); ?>
                        <label class="col-lg-2 control-label">elemen kerja</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="id_e" name="id_e" required>
                                    <option value=""> - Select Element - </option>
                                    
                                        <?php foreach ($daftar_elemen as $key){
                                            if($key->id_e==$this->input->post('id_e')){
                                                echo "<option value='".$key->id_e."'selected>".$key->nama_elemen."</option>";
                                            } else{
                                                echo "<option value='".$key->id_e."'>".$key->nama_elemen."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">detail elemen kerja</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="id_detail" name="id_detail" required>
                                    <option value=""> - Select Detail Elemen - </option>
                                    
                                        <?php foreach ($housingDetail_list as $key){
                                            if($key->id_detail==$this->input->post('id_detail')){
                                                echo "<option value='".$key->id_detail."'selected>".$key->detail_ek."</option>";
                                            } else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                            <br><br>
                        <label class="col-lg-2 control-label">keterangan</label>
                            <div class="col-lg-7">
                                <input type="text" name="ket" class="form-control" placeholder="keterangan">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">syarat 1</label>
                            <div class="col-lg-7">
                               <select class="form-control chosen" id="id_s1" name="id_s1">
                                    <option value=""> - select syarat 1 - </option>
                                        <?php foreach ($housingSyarat1_list as $key){
                                            if($key->id_s1==$this->input->post('syarat1')){
                                                echo "<option value='".$key->id_s1."'selected>".$key->syarat1."</option>";
                                            } else{
                                                echo "<option value='".$key->id_s1."'>".$key->syarat1."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">syarat 2</label>
                            <div class="col-lg-7">
                               <select class="form-control chosen" id="id_s2" name="id_s2">
                                    <option value=""> - select syarat 2 - </option>
                                        <?php foreach ($housingSyarat2_list as $key){
                                            if($key->id_s2==$this->input->post('syarat2')){
                                                echo "<option value='".$key->id_s2."'selected>".$key->syarat2a."-".$key->syarat2b.$key->dot."</option>";
                                            } else{
                                                echo "<option value='".$key->id_s2."'>".$key->syarat2a."-".$key->syarat2b.$key->dot."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">Kategori </label>
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