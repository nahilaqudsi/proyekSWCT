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
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER SETTING
                            </h3>   
                        </div>
                        <br>
                        
                         <label class="col-lg-2 control-label">+ Detail Elemen</label>
                            <?php echo form_open_multipart('Crud_setting/createDetail'); ?>
                            <div class="col-lg-7">
                                <input type="text" name="detail_ek" class="form-control" placeholder="detail elemen kerja" required="">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_setting/lihatDetail/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                            <?php echo form_close(); ?>
                        <br>
                        <label class="col-lg-2 control-label">+ Keterangan</label>
                        <?php echo form_open_multipart('Crud_setting/createKet'); ?>
                            <div class="col-lg-2">
                                <input type="text" name="syarat_a" class="form-control" placeholder="x">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="syarat_b" class="form-control" placeholder="y">
                            </div>

                            <div class="col-lg-2">
                                <input type="text" name="ket" class="form-control" placeholder="keterangan">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></button>
                            <a href="<?php echo site_url('Crud_setting/lihatKet/')?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
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
                                <i class="glyphicon glyphicon-user"></i> PENAMBAHAN DATA MASTER SETTING <a href="<?php echo site_url('Crud_setting/lihatPedoman/')?>"> <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                
                            </h3>   

                        </div>
                        <br>
                        <?php echo form_open_multipart('Crud_setting/createPedoman'); ?>
                        <label class="col-lg-2 control-label">elemen kerja</label>
                            <div class="col-lg-7">
                                <input type="text" name="elemen_kerja" class="form-control" placeholder="elemen kerja">
                            </div>
                        <br><br>
                        <label class="col-lg-2 control-label">detail elemen kerja</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="id_detail" name="id_detail" required>
                                    <option value=""> - Select Detail Element - </option>
                                    
                                        <?php foreach ($settingDetail_list as $key){
                                            if($key->id_detail==$this->input->post('id_detail')){
                                                echo "<option value='".$key->id_detail."'selected>".$key->detail_ek."</option>";
                                            } else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                </select>
                            </div>
                            <br><br>
                       <!--  <label class="col-lg-2 control-label">syarat 1</label>
                            <div class="col-lg-7">
                                <input type="text" name="id_s1" class="form-control" placeholder="syarat 1">
                            </div>
                        <br><br> -->
                        <!-- <label class="col-lg-2 control-label">syarat 2</label>
                            <div class="col-lg-7">
                                <input type="text" name="id_s2" class="form-control" placeholder="syarat 2">
                            </div>
                        <br><br> -->
                        <label class="col-lg-2 control-label">keterangan</label>
                            <div class="col-lg-7">
                               <select class="form-control chosen" id="id_ket" name="id_ket">
                                    <option value=""> - select ket - </option>
                                        <?php foreach ($settingKet_list as $key){
                                            if($key->id_ket==$this->input->post('idket')){
                                                echo "<option value='".$key->id_ket."'selected>".$key->syarat_a."-".$key->syarat_b.$key->ket."</option>";
                                            } else{
                                                echo "<option value='".$key->id_ket."'>".$key->syarat_a."-".$key->syarat_b.$key->ket."</option>";
                                            }
                                        } ?>
                                </select>
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