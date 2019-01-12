

<!-- HTML -->



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
<!-- Styles -->
<style>
#chartdiv {
    width   : 100%;
    height  : 500px;
}                       
</style>
<?php
    $dataPoints = [];
    $lastindex = 0;
    foreach ($export as $key) {
        $data_inspection = array(
                    "name" => "",
                    "startTime" => $lastindex,
                    "endTime" => $key->t_grafik,
                    "color" => "#FF0F00"


        );
    
        // $index = /
      $lastindex = $key->t_grafik;

  array_push($dataPoints, $data_inspection);
  }
?>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<script type="text/javascript">
    var chart = AmCharts.makeChart("chartdiv", {
    "theme": "none",
    "type": "serial",
    "dataProvider": <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
    "valueAxes": [{
        "axisAlpha": 0,
        "gridAlpha": 0.1
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]</b><br>starts at [[startTime]]<br>ends at [[endTime]]",
        "colorField": "color",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "openField": "startTime",
        "type": "column",
        "valueField": "endTime"
    }],
    "rotate": true,
    "columnWidth": 1,
    "categoryField": "name",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0.1,
        "position": "left"
    },
    "export": {
        "enabled": true
     }
});
</script>
</script>
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
                            <?php echo validation_errors(); ?>
                            <label class="col-lg-2 control-label">Family</label>  
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

                            <label class="col-lg-2 control-label">Detail Elemen</label>
                            <div class="col-lg-7">
                                <select class="form-control chosen" id="detail" name="detail" onchange="this.form.submit()">
                                    <option value=""> - Masukkan Element Kerja - </option>
                                    <?php 
                                            foreach ($detail as $key) { 
                                            echo "<option value='$key[idt_detail]'>$key[t_elemen] // $key[t_detail]</option>";
                                        } ?>
                                 </select>
                            </div>
                            <br><br>
                            <br><br>
                            <!-- <?php if (isset($syarat1_list)) {?>
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
                            <?php } ?> -->
                            <?php if (isset($syarat_list)) {?>
                            <br><br>
                            <label class="col-lg-2 control-label"><?php 
                                echo $nama_syarat;
                            ?></label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="masukkan <?php 
                                if ($this->input->post('detail')==1) {
                                    echo $nama_syarat;
                                }?>" name="syarat" id="syarat" class="form-control" value="<?php echo $this->input->post('syarat');  ?>">
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
                                <?php foreach ($taping_list as $key) { ?>
                                    <tr>
                                    <td><?php echo $key->t_detail ?></td>
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

                                    <?php if($data_tampil=="erm" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_erm; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="inp" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_inp; ?></td>
                                    <?php } ?>
                                    <?php if($data_tampil=="floor" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_floor_rear; ?></td>                          
                                    <?php } ?>
                                    <?php if($data_tampil=="door" || $data_tampil=="all"){?>
                                        <td><?php echo $key->t_door; ?></td>
                                    <?php } ?>
                                    <td>
                                        <!-- validasi untuk mengecek ada huruf xxx dan yyy -->
                                        <!-- <?php
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
                                        ?> -->
                                        <!-- <a data-toggle="modal" class="btn btn-primary" href="#myModal" onclick="return pindah(<?php echo $key->idt_all.",'".$key->$data_tampil."','".$key->t_elemen."'"; ?>);<?php $label_temp=$key->idt_detail; ?>"><i class="glyphicon glyphicon-plus"></i></a> -->
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
                    <div class="col-lg-12">
                        <div class="table-responsive" id="data_detail">
                            <a href="<?php echo site_url('CobaBar/excel')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-export">Excel</i> </a>
                            <table class="table table-bordered table-hover table-condensed table-striped " id="kuda">
                                <thead>
                                    <tr style="background-color: #cccccc ">
                                        <th ></th>
                                        <th align="center" class="col-sm-9">Detail Element Kerja</th>
                                        <th class="col-sm-1"><center>Value Work</center></th>
                                        <th class="col-sm-1"><center>Non Value Work</center></th>
                                        <th class="col-sm-1"><center>Langkah</center></th>
                                        <th class="col-sm-1"><center>Time STD</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($export as $key) { ?>
                                        <tr>
                                            <td><?php echo $key->t_detail_update; ?></td>
                                            <?php if ($key->jenis=="Value Work") {?>
                                                <td align="center">
                                                    <!-- <img width="20" height="20px" src="<?php echo base_url('');?>assets/img/belahketupat.png"> -->
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
                                            <td>
                                               <?php 
                $merah = $key->t_std; 
                $putih = $key->t_grafik - $key->t_std;
                ?>
                <img src="<?php echo base_url('');?>assets/img/barputih.png" height="5" width="<?php echo $putih; ?>">
                 <img src="<?php echo base_url('');?>assets/img/bar.png" height="5" width="<?php echo $merah; ?>">
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

<!-- tampilan pop-up  -->
<!-- end tampilan pop-up asi -->

<!-- tampilan pop-up  -->
<!-- end tampilan pop-up  -->

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