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
                                <strong> SWCT TAPING</strong>     
                            </h3>   
                        </div>
                        <!-- search -->
                        <div class="panel-body">
                            <!-- <?php echo json_encode($_POST);?> -->
                            <?php echo form_open_multipart('Taping_henkaten/searchByUjung'); ?>
                            <?php echo validation_errors(); ?>
                                <label class="col-lg-2 control-label">Ujung</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="ujung" name="ujung" onchange="this.form.submit()">
                                    <option value=""> - Pilih Ujung - </option>
                                    <?php foreach ($ujung as $key) {
                                            if($key->ujung==$this->input->post('ujung')){
                                                echo "<option value='".$key->ujung."' selected>".$key->ujung."</option>";
                                            }else{
                                                echo "<option value='".$key->ujung."'>".$key->ujung."</option>";
                                            }
                                        } ?>
                                 </select>
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
                        <?php if(isset($henkaten_list)){
                            $this->load->model('Taping_transaksi_model');
                            if($henkaten_list=="tidaktau"){?>
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
                                        <th><center>Ujung</center></th>
                                        <th><center>Material</center></th>
                                        <th><center>Method</center></th>
                                        <th><center>Critical</center></th>
                                        <th><center>Remarks</center></th>
                                        <th><center>Detail Elemen</center></th>
                                        <th><center>ERM</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($henkaten_list as $key) { ?>
                                    <tr>
                                    <td><?php echo $key->ujung ?></td>
                                    <td><?php 
                                            $length=0;
                                            $cct=0;
                                            $intesitas=1;
                                            $tube=0;
                                            $lilitan=0;
                                            if(is_null($key->mat_new)){
                                                echo $key->mat_old;
                                                preg_match_all('#L=([^\s]+)#', $key->mat_old, $matches);
                                                $length = implode(' ', $matches[1]);
                                                if (empty($length)) {
                                                    $length=0;
                                                }
                                            }else{
                                                echo $key->mat_new;
                                                preg_match_all('#L=([^\s]+)#', $key->mat_new, $matches);
                                                $length = implode(' ', $matches[1]);
                                                if (empty($length)) {
                                                    $length=0;
                                                }
                                            } ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if(is_null($key->method_new)){
                                                echo $key->method_old;
                                            }else{
                                                echo $key->method_new;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $key->critical ?></td>
                                    <td><?php echo $key->remarks ?></td>
                                    <td><?php 

                                        if(is_null($key->method_new)){
                                            $array = explode(',', $key->method_old);
                                        }else{
                                            $array = explode(',', $key->method_new);
                                        }

                                        $datapoints = [];
                                        for ($i = 0; $i < count($array); $i++) {
                                            // echo $array[$i];
                                            preg_match_all('#N=([^\s]+)#', $array[$i], $matches);
                                            $lilitan = implode(' ', $matches[1]);
                                            if (empty($lilitan)) {
                                                $lilitan = 0;
                                            }
                                            preg_match_all('#W=([^\s]+)#', $array[$i], $matches);
                                            $tube = implode(' ', $matches[1]);
                                            if (empty($tube)) {
                                                $tube = 0;
                                            }
                                            $datas = array(
                                                "detail" => $array[$i],
                                                "length" => $length,
                                                "lilitan" => $lilitan,
                                                "cct" => $cct,
                                                "tube" => $tube,
                                                "intensitas" => $intesitas
                                                );
                                            array_push($datapoints, $datas);
                                        }

                                        foreach ($datapoints as $i => $item) {
                                            $detail1 = $datapoints[$i]['detail'];
                                            $length1 =  $datapoints[$i]['length'];
                                            $lilitan1 = $datapoints[$i]['lilitan'];
                                            $tube1 =  $datapoints[$i]['tube'];
                                            $intensitas1 =  $datapoints[$i]['intensitas'];
                                            $cct1 =  $datapoints[$i]['cct'];
                                            if (empty($detail1)) {
                                                echo "";
                                            }else{
                                                echo $datapoints[$i]['detail'];
                                            }
                                        }

                                        //echo $detail = $array[0];
                                        //print_r($array);
                                        // if (empty($detail)) {
                                        //     echo "";
                                        // }else{
                                        //     $result = $this->Taping_transaksi_model->cek($detail, $length);
                                        //     //var_dump($result);
                                        //     foreach($result as $item){         
                                    ?>
                                    </td>
                                    <td>
                                        <?php 
                                            foreach ($datapoints as $i => $item) {
                                                $detail1 = $datapoints[$i]['detail'];
                                                $length1 =  $datapoints[$i]['length'];
                                                $lilitan1 = $datapoints[$i]['lilitan'];
                                                $tube1 =  $datapoints[$i]['tube'];
                                                $intensitas1 =  $datapoints[$i]['intensitas'];
                                                $cct1 =  $datapoints[$i]['cct'];
                                                echo "Detail = ".$detail1."<br>";
                                                echo "length = ".$length1."<br>";
                                                echo "lilitan = ".$lilitan1."<br>";
                                                echo "tube = ".$tube1."<br>";
                                                echo "intesitas = ".$intensitas1."<br>";
                                                echo "cct = ".$cct1."<br>";

                                                if (empty($detail1)) {
                                                    echo "";
                                                }else{
                                                    $result = $this->Taping_transaksi_model->cek($detail1, $length1, $lilitan1, $cct1, $intensitas1, $tube1);
                                                    foreach($result as $item){ 
                                                        echo $i."index".$item->t_erm;
                                                    }
                                                }
                                            }
                                        ?>
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
                                    <td width="25%"><b>CAR MODEL </b> </td>
                                    <td> <?php if (!empty($kop)) {echo $kop->carModel ;}?></td>
                                    <td width="25%"><b>W/H TYPE </b></td>
                                    <td> <?php if (!empty($kop)) {echo $kop->type;} ?></td>
                                </tr>
                                <tr>
                                    <td width="25%"><b>NO. REV</b></td>
                                    <td> <?php if (!empty($kop)) {echo $kop->noRev;} ?></td>
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
                          <input type="text" class="form-control" name="t_critical" placeholder="Masukkan CRITICAL POINT (Jika Ada)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Related OS </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="t_os" placeholder="Masukkan RELATED OS (Jika Ada)">
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
                    <?php echo form_open_multipart('Taping_transaksi/addNoAssy/'); ?>
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <div class="col-sm-12" align="center">
                         <input type="text" class="form-control" name="no_assy" placeholder="masukkan Nomer Assy" maxlength="14" required>
                        </div>
                    </div>
                </div>
                
           </div>
                <!-- <?php //echo json_encode($_POST);?> -->
                
                    
            <div class="modal-footer">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
            </div>
            
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
                        <label class="col-sm-3 control-label">Car Model</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="carModel1" name="carModel" placeholder="Masukkan Car Model">
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
                          <input type="text" class="form-control" id="carModel" name="carModel" placeholder="Masukkan Nama CAR MODEL" maxlength="12" required>
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
            function pindah(value,value2,value3){
                document.getElementById('idt_all').value=value;
                document.getElementById('t_std').value=value2;
                document.getElementById('t_detail').value=value3;
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