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

<script type='text/javascript'>
    function addFields(){
        // Number of inputs to create
        var number = document.getElementById("member").value;
        // Container <div> where dynamic content will be placed
        var container = document.getElementById("container");
        // Clear previous contents of the container
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i=0;i<number;i++){
            // Append a node with a random text
            container.appendChild(document.createTextNode("Nomor Assy : "));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "field[" + i + "]";
            container.appendChild(input);
            // Append a line break 
            container.appendChild(document.createElement("br"));
        }
    }
</script>

<style type="text/css">
     #newFields input {
    display:block;
} 
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
                                <strong> SWCT TAPING</strong>     
                            </h3>   
                        </div>
                        <!-- search -->
                        <div class="panel-body">
                            <!-- <?php echo json_encode($_POST);?> -->
                            <?php echo form_open_multipart('Taping_transaksi/filterSearch'); ?>
                            <?php echo validation_errors();?>
                            <label class="col-lg-2 control-label">Family</label>  
                            <div class="col-lg-7">
                                <select name="data_tampil" id="data_tampil" class="form-control" required="required">
                                    <option value="">-- Pilih STD TIME (dtk) --</option>
                                    <!-- <?php if($data_tampil == "all"){?>
                                        <option value="all" selected>ALL</option>
                                    <?php }else {?>
                                        <option value="all">ALL</option>
                                    <?php }?> -->
                                    <?php if($data_tampil == "t_erm"){?>
                                        <option value="t_erm" selected>ERM</option>
                                    <?php }else {?>
                                        <option value="t_erm">ERM</option>
                                    <?php }?>
                                    <?php if($data_tampil == "t_inp"){?>
                                        <option value="t_inp" selected>INP</option>
                                    <?php }else {?>
                                        <option value="t_inp">INP</option>
                                    <?php }?>
                                    <?php if($data_tampil == "t_floor_rear"){?>
                                        <option value="t_floor_rear" selected>Floor/Rear</option>
                                    <?php }else {?>
                                        <option value="t_floor_rear">Floor/Rear</option>
                                    <?php }?>
                                    <?php if($data_tampil == "t_door"){?>
                                        <option value="t_door" selected>Door</option>
                                    <?php }else {?>
                                        <option value="t_door">Door</option>
                                    <?php }?>
                                </select>
                            </div>
                            <br><br>

                            <label class="col-lg-2 control-label">Detail Elemen</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="detail" name="detail" onchange="this.form.submit()">
                                    <option value=""> - Masukkan Element Kerja - </option>
                                    <?php foreach ($detail as $key) {
                                            if($key->idt_detail==$this->input->post('detail')){
                                                echo "<option value='".$key->idt_detail."' selected>".$key->t_detail."</option>";
                                            }else{
                                                echo "<option value='".$key->idt_detail."'>".$key->t_detail."</option>";
                                            }
                                        } ?>
                                 </select>
                            </div>

                            <?php if (isset($syarat_list)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat;
                            ?></label>
                                <div class="col-lg-2">
                                    <input type="number" placeholder="masukkan <?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat;
                                }?>" name="syarat" id="syarat" class="form-control" value="<?php echo $this->input->post('syarat');  ?>">
                                </div>
                            <?php } ?>
                            <?php if (isset($syarat_list3)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat3;
                            ?></label>
                                <div class="col-lg-2">
                                    <input type="number" placeholder="<?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat3;
                                }?>" name="syarat3" id="syarat3" class="form-control" value="<?php echo $this->input->post('syarat3');  ?>">
                                </div>
                            <?php } ?>
                            <?php if (isset($syarat_list2)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat2;
                            ?></label>
                                <div class="col-lg-2">
                                    <input type="number" placeholder="<?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat2;
                                }?>" name="syarat2" id="syarat2" class="form-control" value="<?php echo $this->input->post('syarat2');  ?>">
                                </div>
                            <?php } ?>
                            <?php if (isset($syarat_list4)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat4;
                            ?></label>
                                <div class="col-lg-2">
                                    <input type="number" placeholder="<?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat4;
                                }?>" name="syarat4" id="syarat4" class="form-control" value="<?php echo $this->input->post('syarat4');  ?>">
                                </div>
                            <?php } ?>
                            <?php if (isset($syarat_list5)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat5;
                            ?></label>
                                <div class="col-lg-2">
                                    <input type="number" placeholder="<?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat5;
                                }?>" name="syarat5" id="syarat5" class="form-control" value="<?php echo $this->input->post('syarat5');  ?>">
                                </div>
                            <?php } ?>
                            
                            <div class="form-group">
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
                        <?php if(isset($taping_list)){
                            if($taping_list=="tidaktau"){?>
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
                                        <th><center>Critical</center></th>
                                        <th><center>Related OS</center></th>
                                        <th><center>Value Work</center></th>
                                        <th><center>Non Value Work</center></th>
                                        <th><center>Langkah</center></th>
                                        <?php if($data_tampil=="t_erm" || $data_tampil=="all"){?>
                                            <th><center>ERM</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="t_inp" || $data_tampil=="all"){?>
                                            <th><center>INP</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="t_floor_rear" || $data_tampil=="all"){?>
                                            <th><center>Floor/Rear</center></th>
                                        <?php } ?>
                                        <?php if($data_tampil=="t_door" || $data_tampil=="all"){?>
                                            <th><center>Door</center></th>
                                        <?php } ?>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($taping_list as $key) { ?>
                                    <tr>
                                    <td><?php echo $key->t_detail ?></td>
                                    <td><?php echo $key->t_critical ?></td>
                                    <td><?php echo $key->t_os ?></td>
                                    <?php if ($key->jenis=="Value Work") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/belahketupat.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->jenis=="Non Value Work") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/bunder.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->jenis=="Langkah") {?>
                                        <td align="center"><img width="20" height="20px" src="<?php echo base_url('');?>assets/img/waru.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>

                                    <?php if($data_tampil=="t_erm" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_erm; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="t_inp" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_inp; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="t_floor_rear" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_floor_rear; ?></td>                          
                                    <?php } ?>
                                    <?php if($data_tampil=="t_door" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_door; ?></td>
                                    <?php } ?>
                                    <td align="center">
                                        <!-- validasi untuk mengecek ada huruf xxx dan yyy -->
                                         <?php
                                            if (count(explode("X",$key->t_detail)) >3){ 
                                                $export_x = count(explode("X",$key->t_detail));
                                            }
                                            if (explode("varian dimensi COT",$key->t_detail)){ 
                                                $export_vc = count(explode("varian dimensi COT",$key->t_detail));
                                            }
                                            if (explode("varian dimensi HPVC",$key->t_detail)){ 
                                                $export_vh = count(explode("varian dimensi HPVC",$key->t_detail));
                                            }
                                            if (explode("all material",$key->t_detail)){ 
                                                $export_am = count(explode("all material",$key->t_detail));
                                            }

                                            if (explode("panjang dimensi",$key->t_detail)){ 
                                                $export_d = count(explode("panjang dimensi",$key->t_detail));
                                            }
                                        ?>
                                        <a data-toggle="modal" class="btn btn-primary" href="#myModal" onclick="return pindah(<?php echo $key->idt_all.",'".$key->$data_tampil."','".$key->t_detail."','".$key->t_critical."','".$key->t_os."'"; ?>);<?php $label_temp=$key->t_detail; ?>"><i class="glyphicon glyphicon-edit"></i></a> 
                                    </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table><?php } }?>
                        </div>
                        
                    </div>
                        <!-- end tabel hasil cari -->
                    

                    



 <!-- tabel data SWCT -->
            <?php //if(!empty($export)){?>          
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td width="40%"><h3 class="panel-title"> 
                                    <i class="glyphicon glyphicon-book"> </i> DATA SWCT TAPING BARU   </h3>  
                                </td>
                                <td width="15%">
                                    <a href="<?php echo site_url('Taping_transaksi/excel')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-export">Excel</i> </a>
                                    <a onclick="javascript:return confirm('Apakah anda ingin menghapus semua data SWCT ini ?')" href="<?php echo site_url('Taping_transaksi/resetDatabase/')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-trash">Reset</i></a>
                                    <a data-toggle="modal" class="btn btn-default" href="#ModalAsi"> <i class="glyphicon glyphicon-plus">Assy</i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="table-responsive" id="data_detail">
                            <table class="table table-bordered table-hover table-condensed table-striped">
                                <tr> 
                                    <td colspan="4">
                                    <center>
                                        <strong> IDENTITAS SWCT TAPING </strong> 
                                        <?php if (empty($kop)) {?>
                                        <a data-toggle="modal" href="#ModalTambahKop" class="btn btn-default"><i class="glyphicon glyphicon-plus"> </i></a>
                                        <?php } ?> 
                                            <?php if (!empty($kop)) {?>
                                                <a data-toggle="modal" href="#ModalUpdateKop"  class="btn btn-default" onclick="return forUpdateKop(<?php echo $kop->id_kop.",'".$kop->station."','".$kop->customer."','".$kop->carModel."','".$kop->type."','".$kop->tanggal."','".$kop->noRev."'"; ?>);"><i class="glyphicon glyphicon-edit"></i></a>
                                        <?php } ?> 
                                    </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center">
                                        <h3><?php if (!empty($kop)) {echo "TAPING-".$kop->station;} ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="25%"><b>CUSTOMER </b> </td>
                                    <td> <?php if (!empty($kop)) {echo $kop->customer;} ?></td>
                                    <td width="25%"><b>TANGGAL </b></td>
                                    <td> <?php if (!empty($kop)) {echo date('d-m-Y', strtotime($kop->tanggal)) ;}?></td>
                                </tr>
                                <tr>
                                    <td width="25%"><b>CAR CODE </b> </td>
                                    <td> <?php if (!empty($kop)) {echo $kop->carModel ;}?></td>
                                    <td width="25%"><b>NO. REV</b></td>
                                    <td> <?php if (!empty($kop)) {echo $kop->noRev;} ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="25%"><b>W/H TYPE </b></td>
                                    <td> <?php if (!empty($kop)) {echo $kop->type;} ?></td>
                                    <?php echo $namatabel;  ?>
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
                                            <th class="col-sm-1"><center><?php echo str_replace("SaI", "", $key->kode_assy);?><br><a href="<?php echo site_url('Taping_transaksi/hapusKodeAsi/').$key->kode_assy ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></th>
                                        <?php }?>
                                        <!-- <th align="center">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($export as $key) { ?>
                                        <tr>
                                            <td width="5dp">
                                                <a class="btn btn-default" href="<?php echo site_url('Taping_transaksi/delete/').$key->idt_hapus ?>" onclick="return deletechecked();"> <i class="glyphicon glyphicon-trash"></i></a>
                                                <a class="btn btn-default" data-toggle="modal" href="#ModalUpdateExport" onclick="return forUpdate(<?php echo $key->idt_hapus.",'".$key->t_detail_update."','".$key->t_critical."','".$key->t_os."'"; ?>);"><i class="glyphicon glyphicon-edit"></i></a>
                                            </td>
                                            <td><?php echo $key->t_detail_update; ?></td>
                                            <td><?php echo $key->t_critical ?></td>
                                            <td><?php echo $key->t_os ?></td>
                                            <?php if ($key->jenis=="Value Work") {?>
                                                <td align="center">
                                                    <font face="Symbol" size="5" color="blue"> ¨ </font>
                                                </td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->jenis=="Non Value Work") {?>
                                                <td align="center">
                                                    <font face="Symbol" size="5" color="red"> O </font>
                                                </td>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <?php if ($key->jenis=="Langkah") {?>
                                                <td align="center">
                                                    <font face="Symbol" size="5" color="green"> § </font>
                                                </td>
                                                
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                                <td><?php echo $key->t_std ?></td>
                                                <?php foreach ($tb_assy as $key2) {
                                                 $a = $key2->kode_assy;?>
                                                <?php if($key->$a==0){ ?>
                                                    <td style="background-color: #ccc">
                                                        <center><a href="<?php echo site_url('Taping_transaksi/changeStatus/').$key->idt_hapus.'/'.$key2->kode_assy.'/'.$key->t_std; ?>" ><i class="glyphicon glyphicon-remove"></i></a></center>
                                                    </td>
                                                    <?php }else{?>
                                                    <td style="background-color: #fff">
                                                        <center><a href="<?php echo site_url('Taping_transaksi/deleteStatus/').$key->idt_hapus.'/'.$key2->kode_assy; ?>" ><i class="glyphicon glyphicon-ok"></i></a></center> 
                                                    </td>
                                                    <?php }?>
                                                <?php } ?>
                                            <td>
                                            
                                            </td>
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
                <?php //} ?>
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
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Form Pengganti Kode</strong></h3>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <?php echo form_open_multipart('Taping_transaksi/selectTaping'); ?>
                    <?php echo validation_errors(); ?>

                    <div class="form-group">
                        <center><strong><?php echo $label_temp;?></strong></center>
                        <input type="text" name="idt_all" id="idt_all" hidden>
                        <input type="text" name="t_detail" id="t_detail" hidden>
                        <input type="text" name="t_std" id="t_std" hidden>
                    </div>

                    <?php if($export_am>1){?>
                    <div class="form-group">
                        <label class="control-label col-sm-3 ">All Material</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="am" placeholder="Masukkan All Material">
                        </div>
                    </div>
                    <?php } ?>
                     
                    <?php if($export_d>1){?>
                    <div class="form-group">
                        <label class="control-label col-sm-6 ">Panjang Dimensi</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="dimensi" placeholder="Masukkan Panjang dimensi" >
                        </div>
                    </div>
                    <?php }?>
                    
                    
                    <?php if($export_x>3){?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">XXXX</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="xxxx" placeholder="Masukkan XXXX" >
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($export_vc>1){?>
                    <div class="form-group">
                        <label class="control-label col-sm-4 ">Varian Dimensi COT</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="variancot" placeholder="Masukkan Varian Dimensi COT" >
                        </div>
                    </div>
                     <?php } ?>
                     
                     <?php if($export_vh>1){?>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Varian Dimensi HPVC</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="varianhpvc" placeholder="Masukkan Varian Dimensi HPVC" >
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Information </strong> Silahkan isi data dibawah ini jika diperlukan
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">CRITICAL </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="t_critical" id="t_critical" placeholder="Masukkan CRITICAL POINT (Jika Ada)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Related OS </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="t_os" id="t_os" placeholder="Masukkan RELATED OS (Jika Ada)">
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Batal</button>
                
            </div>    
        </div>
    </div>
</div>
</div>
<!-- end tampilan pop-up kode xxx -->

<!-- tampilan pop-up Assy -->
<div id="ModalAsi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>No Assy </strong></h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">                    
                    <!--  FORM ASSY -->
                    <form action="<?php echo site_url(); ?>/Taping_transaksi/addNoAssy" method="post">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Jumlah Assy</label>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <input type="text" id="member" name="member" value="">Number of members: (max. 10)<br />
                                <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
                                <div class="form-group" id="container"></div>
                            </div>
                            
                        </div>
                    
                    <!--  FORM ASSY -->
                </div>
            </div>                
                    
            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
            </div>
            </form>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up Assy -->

<!-- tampilan pop-up update data export  -->
<div id="ModalUpdateExport" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><center><strong>Edit Data Critical and OS</strong></center></h3>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                <?php echo form_open_multipart('Taping_transaksi/updateDataExport/'); ?>
                <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <input type="text" id="id_update" name="id_update" hidden>
                        <label class="control-label col-sm-3" for="email">Detail </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="t_detail_update" name="t_detail_update" placeholder="detail update">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Critical </label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="t_critical" name="t_critical" placeholder="masukkan CRITICAL POINT (Jika Ada)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">OS </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="t_os" name="t_os" placeholder="masukkan RELATED OS (Jika Ada)">
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="modal-footer">
                <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
            </div>
            <?php echo form_close(); ?>       
        </div>
    </div>
</div>
<!-- end tampilan pop-up update data export-->

<!-- tampilan pop-up edit Kop  -->
<div id="ModalUpdateKop" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><center><strong>Update Kop</strong></center></h3>
            </div>
                <?php echo form_open_multipart('Taping_transaksi/updateKop/'); ?>
                <?php echo validation_errors(); ?>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <input type="text" id="id_kop1" name="id_kop" hidden>
                        <label class="col-sm-3 control-label">Taping Station </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="station1" name="station" placeholder="Masukkan Nama Station">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer1" name="customer" placeholder="Masukkan Nama Customer">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Car CODE</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="carModel1" name="carModel" placeholder="Masukkan Car Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="type1" name="type" placeholder="Masukkan Tipe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal1" name="tanggal" placeholder="Masukkan Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Rev</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="noRev1" name="noRev" placeholder="Masukkan Nomor Rev">
                        </div>
                    </div>
                </div>
            </div>           
            <div class="modal-footer">
                <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- end tampilan pop-up  edit kop -->

<!-- tampilan pop-up  ModalTambahKop -->
<div id="ModalTambahKop" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Identitas SWCT</strong></h3>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <?php echo form_open_multipart('Taping_transaksi/tambahKop/'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">TAPING </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="station" name="station" placeholder="contoh : 01 " maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">CUSTOMER </label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="customer" name="customer" placeholder="Masukkan Nama Customer" maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">CAR CODE </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="carModel" name="carModel" placeholder="Masukkan Nama CAR CODE" maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">W/H TYPE </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="type" name="type" placeholder="Masukkan W/H Type" maxlength="12" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">TANGGAL</label>
                        <div class="col-sm-6">
                          <input type="date" class="form-control" id="tanggal" data-date-format="dd-mm-yyyy" name="tanggal" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">NO. REV </label>
                        <div class="col-sm-2">
                          <input type="number" class="form-control" id="noRev" name="noRev" placeholder="XX" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Batal</button>
                
            </div>    
        </div>
    </div>
</div>
<!-- end tampilan pop-up ModalTambahKop  -->


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
            function pindah(value,value2,value3, value4, value5){
                document.getElementById('idt_all').value=value;
                document.getElementById('t_std').value=value2;
                document.getElementById('t_detail').value=value3;
                document.getElementById('t_critical').value=value4;
                document.getElementById('t_os').value=value5;
            }
            function hanyaAngka(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                   if (charCode > 31 && (charCode < 48 || charCode > 57))
         
                    return false;
                  return true;
            }
             function forUpdate(idt_hapus,t_detail_update,t_critical,t_os) {
                document.getElementById('id_update').value=idt_hapus;
                document.getElementById('t_detail_update').value=t_detail_update;
                document.getElementById('t_critical').value=t_critical;
                document.getElementById('t_os').value=t_os;
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
        </script>
        <br>
<?php $this->load->view('footer');?>