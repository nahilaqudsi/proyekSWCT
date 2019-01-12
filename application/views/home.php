<?php $this->load->view('header');
//$data_tampil = $this->input->post('data_tampil');
$export_x=0;
$export_y=0;
$export_c=0;
$export_p=0;
$export_cs=0;
$data_std = 0;
$a ='';
$info ='';
$info2 ='';?>

<style type="text/css">
    td a { 
       display: block; 
       border: 0px solid black;
       padding: 16px; 
    }
    #data_detail{
        overflow-y:scroll;
        height:590px;
    }


/* CSS for Fixed Table Header in index4.html */
.fixed-th {
width: 100%;
border-collapse: collapse;
box-shadow: 0 2px 3px 1px #ddd;
table-layout: fixed;
border:10px solid #fff;
}
.fixed-th thead {
background-color: #333;
color:#fff;
display: block;
}
/* make it scrolled */
.fixed-th tbody {
display: block;
overflow-y: auto;
width: 100%;
max-height: 300px;
position: static;
}/* end make it scrolled */.fixed-th th,.fixed-th td{
vertical-align: top;
padding:10px 7px;
text-align: left;
}
.fixed-th th + th, .fixed-th td + td {
border-left:1px solid #ddd;
}
.fixed-th th:nth-child(1), .fixed-th td:nth-child(1) {
min-width:40px;
}
.fixed-th th:nth-child(2), .fixed-th td:nth-child(2) {
width:300px;
}
.fixed-th th:nth-child(3), .fixed-th td:nth-child(3) {
width:250px;
}/* End CSS for Fixed Table Header in index4.html */
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="panel-body">
                <?php if(isset($success)){ ?>
                <div id="div-alert" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($success)) echo $success;?>
                </div>
                <?php } ?>
                <?php if(isset($search_error)){ ?>
                <div id="div-alert" class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($search_error)) echo $search_error;?>
                </div>
                <?php } ?>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="glyphicon glyphicon-user"></i>
                                        Housing
                            </h3>   
                        </div>
                        <!-- search -->
                        <div class="panel-body">
                            <!-- <?php echo json_encode($_POST);?> -->
                            <?php echo form_open_multipart('home/filterSearch'); ?>
                            <?php echo validation_errors(); ?>
                            <label class="col-lg-2 control-label">family</label>  
                            <div class="col-lg-7">
                                <select name="data_tampil" id="data_tampil" class="form-control" required="required">
                                    <option value="">-- Pilih STD TIME (dtk) --</option>
                                    <!-- <?php if($data_tampil == "all"){?>
                                        <option value="all" selected>ALL</option>
                                    <?php }else {?>
                                        <option value="all">ALL</option>
                                    <?php }?> -->
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

                            <label class="col-lg-2 control-label">detail elemen</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="detail" name="detail" onchange="this.form.submit()">
                                    <option value=""> - Masukkan Element Kerja - </option>
                                        <?php foreach ($housingDetail_list as $key) {
                                            if($key->id_detail==$this->input->post('detail')){
                                                echo "<option value='".$key->id_detail."' selected>".$key->detail_ek."</option>";
                                            }else{
                                                echo "<option value='".$key->id_detail."'>".$key->detail_ek."</option>";
                                            }
                                        } ?>
                                 </select>
                            </div>
                            <br><br>
                            <?php if (isset($syarat1_list)) {?>
                                <label class="col-lg-2 control-label">Syarat 1</label>
                                    <div class="col-lg-7">
                                        <select class="form-control chosen" id="syarat1" name="syarat1" onchange="this.form.submit()">
                                            <option value=""> - Masukkan Kategori Circuit - </option>
                                                <?php foreach ($syarat1_list as $key){
                                                    if($key->ids1==$this->input->post('syarat1')){
                                                        echo "<option value='".$key->ids1."'selected>".$key->syarat1."</option>";
                                                    } else{
                                                        echo "<option value='".$key->ids1."'>".$key->syarat1."</option>";
                                                    }
                                                    
                                                } ?>
                                        </select>
                                    </div> 
                            <?php } ?>
                            <?php if (isset($syarat2_list)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat2;
                                }else {
                                    echo $nama_syarat2_2;
                                }
                            ?></label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="masukkan <?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat2;
                                }else {
                                    echo $nama_syarat2_2;
                                }?>" name="syarat2" id="syarat2" class="form-control" value="<?php echo $this->input->post('syarat2');  ?>">
                                </div>
                            <?php } ?>
                            <div class="form-group" style="margin-left: 350px">
                                    <button type="submit" class="btn btn-default" style="width: 100px">search <i class="glyphicon glyphicon-search"></i> </button>
                            </div>
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
                        <?php if(isset($housing_list)){
                            if($housing_list=="tidaktau"){?>
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
                                <?php foreach ($housing_list as $key) { ?>
                                    <tr>
                                    <td><?php echo $key->KUDA ?></td>
                                    <?php if ($key->value_work=="1") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/belahketupat.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->non_value_work=="1") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/bunder.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->langkah=="1") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/waru.png"></td>
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
                                                $export_y = count(explode("Y",$key->detail_ek));
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
                                        <a data-toggle="modal" class="btn btn-primary" href="#myModal" onclick="return pindah(<?php echo $key->id.",'".$key->$data_tampil."','".$key->KUDA."'"; ?>);<?php $label_temp=$key->detail_ek; ?>"><i class="glyphicon glyphicon-plus"></i></a>
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
                            <td width="300"><h3 class="panel-title"> <i class="glyphicon glyphicon-book"></i> DATA SWCT BARU   </h3>  


                            </td>
                            <td><a href="<?php echo site_url('home/excel')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-export">Excel</i></a>

                            </td>
                            <td><a onclick="javascript:return confirm('Apakah anda ingin menghapus semua data SWCT ini ?')" href="<?php echo site_url('home/resetDatabase/')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-trash">Reset</i></a></td>
                            <td align="right">
                                <a data-toggle="modal" class="btn btn-default" href="#ModalAsi"><i class="glyphicon glyphicon-plus">Assy</i></a>
                            </td>
                            </tr>
                        </table>

                    </div><br>
                   <div class="col-lg-12">
                        <div class="table-responsive" id="data_detail">
                        <table class="table table-bordered table-hover table-condensed table-striped">
                        <tr> 

                            <td colspan="5">
                            <center>
                                <b>HOUSING </b> <?php if (!empty($kop)) {echo $kop->station;} ?>
                                <?php if (empty($kop)) {?>
                                <a data-toggle="modal" href="#ModalTambahKop" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                            <?php } ?> 
                                <?php if (!empty($kop)) {?>
                                    <a data-toggle="modal" href="#ModalUpdateKop"  class="btn btn-default" onclick="return forUpdateKop(<?php echo $kop->id_kop.",'".$kop->station."','".$kop->customer."','".$kop->carModel."','".$kop->type."','".$kop->tanggal."','".$kop->noRev."'"; ?>);"><i class="glyphicon glyphicon-edit"></i></a>
                                <?php } ?> 
                            </center>
                            </td>
                        </tr>
                            <tr>
                                <td><b>CUSTOMER :</b> <?php if (!empty($kop)) {echo $kop->customer;} ?></td>
                                <td><b>CAR MODEL :</b> <?php if (!empty($kop)) {echo $kop->carModel ;}?></td>
                                <td><b>W/H TYPE : </b><?php if (!empty($kop)) {echo $kop->type;} ?></td>
                                <td><b>TANGGAL : </b><?php if (!empty($kop)) {echo $kop->tanggal ;}?></td>
                                <td><b>NO. REV : </b><?php if (!empty($kop)) {echo $kop->noRev;} ?></td>
                            </tr>
                        
                        </table> 
                            <table class="table table-bordered table-hover table-condensed table-striped " id="kuda">
                                <thead>
                                    <tr style="background-color: #cccccc ">
                                        <th ></th>
                                        <th align="center" class="col-sm-9">Detail Element Kerja</th>
                                        <th class="col-sm-2"><center>critical</center></th>

                                        <th class="col-sm-2"><center>OS</center></th>
                                        <th class="col-sm-1"><center>Value Work</center></th>
                                        <th class="col-sm-1"><center>Non Value Work</center></th>
                                        <th class="col-sm-1"><center>Langkah</center></th>
                                        <th class="col-sm-1"><center>Time STD</center></th>
                                        <?php foreach ($tb_assy as $key) {?>
                                            <th class="col-sm-1"><center><?php echo str_replace("SaI", "", $key->kode_assy);?><br><a href="<?php echo site_url('home/babayAsi/').$key->kode_assy ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></th>
                                        <?php }?>
                                        <!-- <th align="center">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($export as $key) { ?>
                                        <tr>
                                            <td width="5dp">
                                                <a class="btn btn-default" href="<?php echo site_url('home/delete/').$key->id_hapus ?>"> <i class="glyphicon glyphicon-trash"></i></a>
                                                <a class="btn btn-default" data-toggle="modal" href="#ModalUpdateExport" onclick="return forUpdate(<?php echo $key->id_hapus.",'".$key->detail_update."','".$key->critical."','".$key->os."'"; ?>);"><i class="glyphicon glyphicon-edit"></i></a>
                                            </td>
                                            <td><?php echo $key->detail_update; ?></td>
                                            <td><?php echo $key->critical ?></td>
                                            <td><?php echo $key->os ?></td>
                                            <?php if ($key->value_work=="1") {?>
                                                <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/belahketupat.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->non_value_work=="1") {?>
                                                <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/bunder.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->langkah=="1") {?>
                                                <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/waru.png"></td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                                <td><?php echo $key->std ?></td>
                                                <?php foreach ($tb_assy as $key2) {
                                                 $a = $key2->kode_assy;?>
                                                <?php if($key->$a==0){ ?>
                                                    <td style="background-color: #ccc">
                                                        <center><a onclick="return notup()" href="<?php echo site_url('home/gantiStatuse/').$key->id_hapus.'/'.$key2->kode_assy.'/'.$key->std; ?>"><i class="glyphicon glyphicon-remove"></i></a></center>
                                                    </td>
                                                    <?php }else{?>
                                                    <td style="background-color: #fff">
                                                        <center><a onclick="return notup()" href="<?php echo site_url('home/hapuskan/').$key->id_hapus.'/'.$key2->kode_assy; ?>" ><i class="glyphicon glyphicon-ok"></i></a></center> 
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
                <h5 class="modal-title">masukkan pengganti code berikut :</h5>
            </div>
            <div class="modal-body">
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('home/updateXXX'); ?>
                <?php echo validation_errors(); ?>
                <?php //echo $export_x.' dan '.$export_y; ?>
                <center><b><?php echo $label_temp;?></b></center><br>
                
                    <input type="text" name="id_export" id="id_export" hidden>
                    <input type="text" name="detail_modal" id="detail_modal" hidden>
                    <input type="text" name="data_std" id="data_std" hidden>

                    <?php if(!empty($export_x)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">XXX</label>
                        <div class="col-sm-8">
                            <?php if (strpos($label_temp, "BONDER")!==false) {
                                $info = "Type Bonder";
                            } else if(strpos($label_temp, "ctrl.no")!==false){
                                $info = "Ctrl. No";
                            } elseif (strpos($label_temp, "conn u.")!==false) {
                                $info = "u. No";
                            } elseif (strpos($label_temp, "JOINT")!==false) {
                                $info = "Ctrl. No";
                            } elseif (strpos($label_temp, "SHIELD/DC")!==false) {
                                $info = "Ctrl. No";
                            } ?>
                            <input type="text" class="form-control" name="xxx" placeholder="Masukkan <?php echo $info; ?>">
                        </div>
                    </div>
                    <?php }?>                    
                    
                    <?php if(!empty($export_y)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">YYY</label>
                        <div class="col-sm-8">
                            <?php if (strpos($label_temp, "sub Y")!==false) {
                                $info2 = "Sub Y";
                            }elseif (strpos($label_temp, "u. Y")!==false) {
                                $info2 = "Nomer U.";
                            }?>
                            <input type="text" class="form-control" name="yyy" placeholder="Masukkan <?php echo $info2;?>">
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if($export_c>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">color</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="color" placeholder="masukkan COLOR" >
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if(!empty($export_s)){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">size</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="size" placeholder="masukkan SIZE" >
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($export_p>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">part number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="p" placeholder="masukkan PART-NUMBER, contoh : XXXX-XXXX">
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($export_cs>1){?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">color</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="color" placeholder="masukkan COLOR" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">size</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="size" placeholder="masukkan SIZE" >
                        </div>
                    </div>
                    <br>
                    <?php }?>
                    
                    <div class="form-group">
<br><br><br><hr>
                        <div><font style="color: #0000FF" > <i class="glyphicon glyphicon-warning-sign"></i> isi berikut ini Jika dibutuhkan !</font> </div>
                        
                        <label class="col-sm-3 control-label">critical</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="critical" placeholder="masukkan CRITICAL POINT (Jika Ada)">
                            
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label">OS </label>                            
                        </div>
                        <div class="col-sm-8">
                            <?php if (count($pilih_OS)>0): ?>                                
                                <select class="form-control" id="pilih_os" name="pilih_os" onclick="document.getElementById('os').value=''">
                                    <option value=""> - Masukkan OS - </option>
                                    <?php foreach ($pilih_OS as $key){                                        
                                        echo "<option value='".$key->nama_os."'>".$key->nama_os."</option>";           
                                    } ?>
                                </select>
                                <input type="text" class="form-control" id="os" name="os" placeholder="masukkan RELATED OS (Jika Ada)" onclick="document.getElementById('pilih_os').selectedIndex = 0;">
                            <?php else :?>
                                <input type="text" class="form-control" id="os" name="os" placeholder="masukkan RELATED OS (Jika Ada)">
                            <?php endif ?>
                        </div>
                    </div>
                    <br><br><br>
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
                <?php echo form_open_multipart('home/addNoAssy/'); ?>
                <?php echo validation_errors(); ?>
                    <br>
                        <label class="col-sm-3 control-label">No Assy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_assy" placeholder="masukkan Nomer Assy" maxlength="12" required>
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up asi -->
<!-- tampilan pop-up  -->
<div id="ModalUpdateExport" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center>Edit Data Critical and OS</center></h4>
            </div>
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('home/updateDataExport/'); ?>
                <?php echo validation_errors(); ?>
                        <br>
                        
                        <label class="col-sm-3 control-label">detail</label>
                        <div class="col-sm-8"> 
                        <input type="text" id="id_update" name="id_update" hidden>
                            <input type="text" class="form-control" id="detail_update1" name="detail_update" placeholder="detail update">
                        </div>
                        <br>
                        <label class="col-sm-3 control-label">Critical</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="critical_update" name="critical" placeholder="masukkan CRITICAL POINT (Jika Ada)">
                        </div>
                        <br>
                        <label class="col-sm-3 control-label">OS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="os_update" name="os" placeholder="masukkan RELATED OS (Jika Ada)">
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up asi -->

<!-- tampilan pop-up  -->
<div id="ModalTambahKop" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center>Isi Identitas SWCT yang baru :</center></h4>
            </div>
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('home/tambahKop/'); ?>
                <?php echo validation_errors(); ?>
                        <br>
                        <label class="col-sm-3 control-label">HOUSING </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="station" name="station" placeholder="Masukkan Nama HOUSING, contoh : xx (SA xx)" maxlength="12" required>
                        </div>
                        <label class="col-sm-3 control-label">CUSTOMER </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer" name="customer" placeholder="Masukkan Nama Customer" maxlength="12" required>
                        </div>
                        <label class="col-sm-3 control-label">CAR MODEL </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="carModel" name="carModel" placeholder="Masukkan Nama CAR MODEL" maxlength="12" required>
                        </div>
                        <label class="col-sm-3 control-label">W/H TYPE </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="type" name="type" placeholder="Masukkan W/H Type" maxlength="12" required>
                        </div>
                        <label class="col-sm-3 control-label">TANGGAL </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="masukkan tanggal pembuatan, contoh : yyyy-mm-dd" maxlength="12" required>
                        </div>

                     
                        <label class="col-sm-3 control-label">NO.REV</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="noRev" name="noRev" placeholder="Masukkan Nomer Rev" maxlength="12" required>
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up  -->

<!-- tampilan pop-up  -->
<div id="ModalUpdateKop" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center>update Kop</center></h4>
            </div>
                
                <?php echo form_open_multipart('home/updateKop/'); ?>
                <?php echo validation_errors(); ?>

                        <br>
                        <input type="text" id="id_kop1" name="id_kop" hidden>
                        <label class="col-sm-3 control-label">HOUSING </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="station1" name="station" placeholder="masukkan nama housing">
                        </div>
                        <label class="col-sm-3 control-label">customer</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer1" name="customer" placeholder="masukkan nama customer">
                        </div>
                        <br>
                        <label class="col-sm-3 control-label">car model</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="carModel1" name="carModel" placeholder="masukkan nama carModel">
                        </div>
                        <label class="col-sm-3 control-label">type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="type1" name="type" placeholder="Masukkan type">
                        </div>
                        <label class="col-sm-3 control-label">tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal1" name="tanggal" placeholder="masukkan tanggal">
                        </div>
                        <label class="col-sm-3 control-label">noRev</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="noRev1" name="noRev" placeholder="Masukkan noRev">
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up  -->


<!-- jQuery -->
        <script src="<?php echo base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
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
            });
        </script>
        <script>
            function pindah(value,value2,value3){
                document.getElementById('id_export').value=value;
                document.getElementById('data_std').value=value2;
                document.getElementById('detail_modal').value=value3;
            }

            function forUpdate(id,detail_update,critical,os) {
                document.getElementById('id_update').value=id;
                document.getElementById('detail_update1').value=detail_update;
                document.getElementById('critical_update').value=critical;
                document.getElementById('os_update').value=os;
            }
             function forUpdateKop(id,station,customer,carModel,type,tanggal,noRev) {
                document.getElementById('id_kop1').value=id;
                document.getElementById('station1').value=station;
                document.getElementById('customer1').value=customer;
                document.getElementById('carModel1').value=carModel;
                document.getElementById('type1').value=type;
                document.getElementById('tanggal1').value=tanggal;
                document.getElementById('noRev1').value=noRev;
            }
            function manual() {
                document.getElementById('os').hide = false;
                document.getElementById('pilih_os').hide = true;
            }
            // function hanyaAngka(evt) {
            //     var charCode = (evt.which) ? evt.which : event.keyCode
            //        if (charCode > 31 && (charCode < 48 || charCode > 57))
         
            //         return false;
            //       return true;
            // }
        </script>


        <br>
<?php $this->load->view('footer');?>