<?php 
$this->load->view('header');
$export_x=0;
$export_y=0;
$export_c=0;
$export_p=0;
$export_cs=0;
$data_std = 0;
$a ='';
?>
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
                                <i class="glyphicon glyphicon-dashboard"></i>
                                        Tapping
                            </h3>   
                        </div>
                        <!-- search -->
                        <div class="panel-body">
                             <?php echo json_encode($_POST);?>
                            <?php echo form_open_multipart('tapping/search'); ?>
                            <?php echo validation_errors(); ?>
                            <label class="col-lg-2 control-label">family</label>  
                            <div class="col-lg-7">
                                <select name="data_tampil" id="data_tampil" class="form-control" required="required">
                                    <option value="">-- Pilih STD TIME (dtk) --</option>
                                    <?php if($data_tampil == "erm"){?>
                                        <option value="erm" selected>ERM</option>
                                    <?php }else {?>
                                        <option value="erm">ERM</option>
                                    <?php }?>
                                    <?php if($data_tampil == "inp"){?>
                                        <option value="inp" selected>INP</option>
                                    <?php }else {?>
                                        <option value="inp">INP</option>
                                    <?php }?>
                                    <?php if($data_tampil == "floor"){?>
                                        <option value="floor" selected>Floor/Rear</option>
                                    <?php }else {?>
                                        <option value="floor">Floor/Rear</option>
                                    <?php }?>
                                    <?php if($data_tampil == "door"){?>
                                        <option value="door" selected>Door</option>
                                    <?php }else {?>
                                        <option value="door">Door</option>
                                    <?php }?>
                                </select>
                            </div>
                            <br><br>

                            <label class="col-lg-2 control-label">Elemen</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="elemen" name="elemen" onchange="this.form.submit()">
                                    <option value=""> - Pilih Element - </option>
                                        <?php foreach ($tappingElemen_list as $key) {
                                            if($key->id_e==$this->input->post('elemen')){
                                                echo "<option value='".$key->id_e."' selected>".$key->elemen."</option>";                                                    
                                            }else{
                                                echo "<option value='".$key->id_e."'>".$key->elemen."</option>";
                                            }
                                        } ?>
                                 </select>
                            </div>
                            <br><br>
                            <label class="col-lg-2 control-label">detail elemen</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="detail" name="detail" onchange="this.form.submit()">
                                    <option value=""> - Pilih Detail Element - </option>
                                        <?php foreach ($tappingDetail_list as $key) {
                                            if($key->id_detail==$this->input->post('detail')){
                                                echo "<option value='".$key->id_detail."' selected>".$key->detail_ek."</option>";                                                    
                                            }else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                 </select>
                            </div>
                            <?php if (isset($jumlah_lilitan)): ?>
                                <br><br>
                                <label class="col-lg-2 control-label" for="lilitan">Jumlah Lilitan</label>
                                <div class="col-lg-7">
                                    <input type="text" name="lilitan" id="lilitan" class="form-control" value="<?php echo $this->input->post('lilitan');  ?>">
                                 </div>
                            <?php endif ?>
                            <?php if (isset($tubesize)): ?>
                                <br><br>
                                <label class="col-lg-2 control-label" for="tubesize">Tube Size</label>
                                <div class="col-lg-7">
                                    <input type="text" name="tubesize" id="tubesize" class="form-control" value="<?php echo $this->input->post('tubesize');  ?>">
                                 </div>
                            <?php endif ?>
                            <?php if (isset($pilih_lenght)): ?>
                                <br><br>
                                <label class="col-lg-2 control-label" for="lenght">Lenght</label>
                                <div class="col-lg-7">
                                    <select class="form-control chosen" id="pilih_lenght" name="pilih_lenght" onchange="this.form.submit()">
                                    <option value=""> - Pilih Lenght - </option>
                                        <?php foreach ($lenght_list as $key) {
                                            if($key->id_detail==$this->input->post('pilih_lenght')){
                                                echo "<option value='".$key->id_detail."' selected>".$key->detail_ek."</option>";                                                    
                                            }else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                 </select>
                                 </div>    
                            <?php endif ?>
                            <?php if (isset($lenght)): ?>
                                <br><br>
                                <label class="col-lg-2 control-label" for="lenght">Lenght</label>
                                <div class="col-lg-7">
                                    <input type="text" name="lenght" id="lenght" class="form-control" value="<?php echo $this->input->post('lenght');  ?>">
                                 </div>    
                                <div class="form-group" style="margin-left: 350px">
                                    <button type="submit" class="btn btn-default" style="width: 100px">search <i class="glyphicon glyphicon-search"></i> </button>
                                </div>                            
                            <?php endif ?>
                          <?php echo form_close(); ?>
                        </div>
                        <!-- end search -->
                    </div>
            </div>

                   
            <!-- tabel hasil cari -->
                    <br>
                    <div class="col-lg-12">
                        <div class="table-responsive" id="coba">
                        <!-- not found -->
                        <?php if(isset($search_list)){
                            if($search_list=="tidaktau"){?>
                                <table class="table table-bordered table-hover table-striped">
                                    <tr style="background-color: #cccccc ">
                                        <th><center>Not Found</center></th>
                                    </tr>
                                </table>   
                            <?php }else {?>
                        <!-- end not found -->
                            <table class="table table-bordered table-hover table-striped" id="coba">
                                <thead>
                                    <tr style="background-color: #cccccc ">
                                        <th><center>Element Kerja</center></th>
                                        <th><center>Detail Element Kerja</center></th>
                                        <th><center>Value Work</center></th>
                                        <th><center>Non Value Work</center></th>
                                        <th><center>Langkah</center></th>
                                        <?php if($data_tampil=="erm" || $data_tampil=="all"){?>
                                            <th><center>ERM</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="inp" || $data_tampil=="all"){?>
                                            <th><center>INP</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="floor" || $data_tampil=="all"){?>
                                            <th><center>Floor/Rear</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="door" || $data_tampil=="all"){?>
                                            <th><center>Door</center></th>
                                        <?php } ?>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($search_list as $key) { ?>
                                    <tr>
                                    <td><?php echo $key->elemen_kerja; ?></td>
                                    <td><?php echo $key->detail_ek; ?></td>
                                    <?php if ($key->vw=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->nvw=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->langkah=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>

                                    <?php if($data_tampil=="erm" || $data_tampil=="all"){?>
                                        <td><?php echo $key->erm; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="inp" || $data_tampil=="all"){?>
                                        <td><?php echo $key->inp; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="floor" || $data_tampil=="all"){?>
                                        <td><?php echo $key->floor; ?></td>                          
                                    <?php } ?>
                                    <?php if($data_tampil=="door" || $data_tampil=="all"){?>
                                        <td><?php echo $key->door; ?></td>
                                    <?php } ?>
                                    <td>
                                        <!-- validasi untuk mengecek ada huruf xxx dan yyy -->
                                        <?php
                                            if (count(explode("X",$key->detail_ek)) >3){ 
                                                $export_x = count(explode("X",$key->detail_ek));
                                            }
                                            if (count(explode("Y",$key->detail_ek)) >3){ 
                                                $export_y = $export_y = count(explode("Y",$key->detail_ek));
                                            }
                                            if (count(explode("color",$key->detail_ek))>1 && count(explode("(diameter)",$key->detail_ek))>1){ 
                                                $export_c = count(explode("color",$key->detail_ek));
                                            }else{
                                                $export_cs = count(explode("color",$key->detail_ek));
                                            }
                                            if (explode("PART-NUMBER",$key->detail_ek)){ 
                                                $export_p = count(explode("PART-NUMBER",$key->detail_ek));
                                            }
                                        ?>
                                        <a data-toggle="modal" class="btn btn-primary" href="#myModal" onclick="return pindah(<?php echo $key->id.",".$key->$data_tampil.",'".$key->detail_ek."'"; ?>);<?php $label_temp=$key->detail_ek; ?>"><i class="glyphicon glyphicon-plus"></i></a>
                                    </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table><?php } }?>
                        </div>
                        
                    </div>
                        <!-- end tabel hasil cari -->
                    



 <!-- tabel data SWCT -->
            <?php if(!empty($export)){?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <table>
                            <tr>
                            <td width="300"><h3 class="panel-title"> <i class="glyphicon glyphicon-book"></i> DATA SWCT BARU   </h3>  </td>
                            <td><a href="<?php echo site_url('tapping/excel')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-export">Excel</i></a></td>
                            <td><a href="<?php echo site_url('tapping/resetDatabase/')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-trash">Reset</i></a></td>
                            <td align="right">
                                <a data-toggle="modal" class="btn btn-default" href="#ModalAsi"><i class="glyphicon glyphicon-plus">Assy</i></a>
                            </td>
                            </tr>
                        </table>
                        
                    </div><br>
                    <div class="col-lg-12">
                        <div class="table-responsive" id="data_detail">
                            <table class="table table-bordered table-hover table-condensed table-striped" id="kuda">
                                <thead>
                                    <tr style="background-color: #cccccc ">
                                        <th class="col-sm-1"></th>
                                        <th align="center" class="col-sm-12">Detail Element Kerja</th>
                                        <th class="col-sm-1"><center>Value Work</center></th>
                                        <th class="col-sm-1"><center>Non Value Work</center></th>
                                        <th class="col-sm-1"><center>Langkah</center></th>
                                        <th class="col-sm-1"><center>Time STD</center></th>
                                        <?php foreach ($tb_assy as $key) {?>
                                            <th class="col-sm-1"><center><?php echo str_replace("SaI", "", $key->kode_assy);?><br><a href="<?php echo site_url('tapping/hapusKodeAssy/').$key->kode_assy ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($export as $key) { ?>
                                        <tr>
                                        <td>
                                                <center><a href="#" <i class="glyphicon glyphicon-trash"></i></a></center>
                                            </td>
                                            <td><?php echo $key->detail_update ?></td>
                                            <?php if ($key->vw=="1") {?>
                                                <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->nvw=="1") {?>
                                                <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->langkah=="1") {?>
                                                <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                                <td><?php echo $key->std ?></td>
                                                <?php foreach ($tb_assy as $key2) {
                                                 $a = $key2->kode_assy;?>
                                                <?php if($key->$a==0){ ?>
                                                    <td style="background-color: #ccc">
                                                        <center><a href="<?php echo site_url('tapping/changeStatus/').$key->id_hapus.'/'.$key2->kode_assy.'/'.$key->std; ?>"><i class="glyphicon glyphicon-remove"></i></a></center>
                                                    </td>
                                                    <?php }else{?>
                                                    <td style="background-color: #fff">
                                                        <center><a href="<?php echo site_url('tapping/deleteStatus/').$key->id_hapus.'/'.$key2->kode_assy; ?>" ><i class="glyphicon glyphicon-ok"></i></a></center> 
                                                    </td>
                                                    <?php }?>
                                                <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div align="right">
                        <a><i class="glyphicon glyphicon-export"> </i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
<!-- END tabel data SWCT -->              
        </div>
            </div>
            
</div>

<!-- tampilan pop-up kode xxx -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inputkan Kode</h4>
            </div>
            <div class="modal-body">
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('tapping/selectTapping'); ?>
                <?php echo validation_errors(); ?>
                <?php //echo $export_x.' dan '.$export_y; ?>
                <center><h4><?php echo $label_temp;?></h4></center>
                <br>
                <br>
                    <input type="text" name="id_export" id="id_export" hidden>
                    <input type="text" name="detail_modal" id="detail_modal" hidden>
                    <input type="text" name="data_std" id="data_std" hidden>
                    <?php if(!empty($export_x)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">XXX</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="xxx" placeholder="input XXX">
                        </div>
                    </div>
                    <?php }?>                    
                    
                    <?php if(!empty($export_y)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">YYY</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="yyy" placeholder="input no. YYY" >
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if($export_c>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">color</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="color" placeholder="input color" >
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if(!empty($export_s)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">size</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="size" placeholder="input size" >
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <?php if($export_p>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">part number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="p" placeholder="input part-number">
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <?php if($export_cs>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">color</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="color" placeholder="input color" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">size</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="size" placeholder="input size" >
                        </div>
                    </div>
                    <?php }?>
                    <br><br>
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan_pesan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end tampilan pop-up kode xxx -->
<!-- tampilan pop-up asi -->
<div id="ModalAsi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
           
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('tapping/addNoAssy/'); ?>
                <?php echo validation_errors(); ?>
                    <br>
                        <label class="col-sm-3 control-label">No Assy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_assy" placeholder="input no ASSY" maxlength="10" required>
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up asi -->

        <script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
        <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>
        <!-- <script src="<?php //echo base_url('');?>assets/vendor/jquery/jquery.js"></script> -->
        <script src="<?php echo base_url('');?>assets/js/jquery.min.js"></script>
        
        <script type="text/javascript">
            $(".chosen").chosen();
            $(document).ready(function() {
                $('#detail').hide();
                $('#coba').DataTable({
                    "ordering": false
                    "searching": false
                    "bSortable": false 
                });
                $('#kuda').DataTable({});
            });
        </script>
        
        <script>
            function pindah(value,value2,value3){
                document.getElementById('id_export').value=value;
                document.getElementById('data_std').value=value2;
                document.getElementById('detail_modal').value=value3;
            }
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                   if (charCode > 31 && (charCode < 48 || charCode > 57))
         
                    return false;
                  return true;
            }
        </script>
        <br>
<?php $this->load->view('footer');?>