<?php $this->load->view('header');?>
<?php $this->load->model('henkaten_model'); ?>
<div id="page-wrapper">
    <div class="row">

        <!-- ALERT -->
        <div class="panel-body">
                <?php 
                if($this->session->flashdata('sukses') != "") {
                    echo '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Sukses</strong> Import Data Berhasil
                          </div>';
                }
            ?>
             <?php 
                if($this->session->flashdata('failed') != "") {
                    echo '<div id="div-alert" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Gagal</strong> Gagal import Data
                          </div>';
                }
            ?>
        <!-- ALERT -->

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>HENKATEN</strong>
                        </h3> 
                    </div>

                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label>
                                        Import Excel
                                    </label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <form action="<?php echo site_url('Taping_Henkaten/import/');?>" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" class="form-control" >
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <button type="submit" class="btn btn-success">Import</button>
                                     </form>
                                </div>
                            </div>                          
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>SWCT TAPING</strong>
                        </h3>        
                    </div>

                    <div class="panel-body">
                        <?php echo form_open_multipart('Taping_Henkaten/searchByUjung'); ?>
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Family</label>  
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

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Ujung</label>
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


                        <div class="form-group">
                            <div class="table-responsive" id="coba">
                        <!-- not found -->
                        <?php if(isset($henkaten_list)){
                            $this->load->model('henkaten_model');
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
                                        <th><center>Action</center></th>
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
                                    <?php 

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
                                                //echo "";
                                            }else{
                                                //echo $datapoints[$i]['detail'];
                                            }
                                        }     
                                    ?>
                                 
                                    <td>
                                        <?php 
                                            $erms=0;
                                            $inps=0;
                                            $floors=0;
                                            $doors=0;
                                            $jenis="";
                                            $methodku;
                                            $mater;
                                            $time;
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

                                                
                                                $result = array();
                                                if (empty($detail1)) {
                                                    echo "";
                                                }else{
                                                    if ($tube1==0) {
                                                        $result = $this->henkaten_model->cekTanpaTube($detail1, $length1, $lilitan1, $cct1, $intensitas1);
                                                    }elseif ($length1==0) {
                                                        $result = $this->henkaten_model->cekTanpaLength($detail1, $lilitan1, $cct1, $intensitas1, $tube1);
                                                    }elseif ($length1==0 && $tube1==0) {
                                                        $result = $this->henkaten_model->cekTanpaTubeLength($detail1, $lilitan1, $cct1, $intensitas1);
                                                    }else{
                                                        $result = $this->henkaten_model->cek($detail1, $length1, $lilitan1, $cct1, $intensitas1, $tube1);
                                                    }
                                                    foreach($result as $item){ 
                                                        $erms=$erms+$item->t_erm;
                                                        $inps=$inps+$item->t_inp;
                                                        $floors=$floors+$item->t_floor_rear;
                                                        $doors=$doors+$item->t_door;
                                                        $jenis = $item->jenis;
                                                        // echo $item->t_erm."<br>";
                                                        // echo $item->t_inp."<br>";
                                                        // echo $item->t_floor_rear."<br>";
                                                        // echo $item->t_door."<br>";
                                                        //echo "ERM = ".$item->t_erm."<br>";
                                                    }   
                                                }
                                            }
                                            if($data_tampil=="t_erm" || $data_tampil=="all"){
                                                echo $erms."<br>"; 
                                                $time = $erms; 
                                            }
                                            if($data_tampil=="t_inp" || $data_tampil=="all"){
                                                echo $inps."<br>";
                                                $time = $inps;  
                                            } 
                                            if($data_tampil=="t_floor_rear" || $data_tampil=="all"){
                                                echo $floors."<br>"; 
                                                $time = $floors; 
                                            }
                                            if($data_tampil=="t_door" || $data_tampil=="all"){
                                                echo $doors."<br>";
                                                $time = $doors; 
                                            } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                                if(is_null($key->method_new)){
                                                    $methodku = $key->method_old;
                                                }else{
                                                    $methodku = $key->method_new;
                                                }

                                                if(is_null($key->mat_new)){
                                                    $mater = $key->mat_old;
                                                }else{
                                                    $mater = $key->mat_new;
                                                }

                                                // echo $key->no;
                                                // echo $key->method_old;
                                                // echo $key->mat_old;
                                                // echo $key->critical;
                                                // echo $key->remarks;
                                                // echo $erms;
                                                //echo $jenis;
                                            ?>
                                            <!-- <form href="<?php echo site_url('Taping_Henkaten/createTaping');?>" method="POST">
                                                <input type="hidden" class="form-control" name="no" id="no" value="<?php echo $key->no; ?>" hidden>
                                                <input type="hidden" class="form-control" name="method_old" id="method_old" value="<?php echo $methodku; ?>" hidden>
                                                <input type="hidden" class="form-control" name="mat_old" id="mat_old" value="<?php echo $mater; ?>" hidden>
                                                <input type="hidden" class="form-control" name="critical" id="critical" value="<?php echo $key->critical; ?>" hidden>
                                                <input type="hidden" class="form-control" name="remarks" id="remarks" value="<?php echo $key->remarks; ?>" hidden>
                                                <input type="hidden" class="form-control" name="jenis" id="jenis" value="<?php echo $jenis; ?>" hidden>
                                                <input type="hidden" class="form-control" name="erms" id="erms" value="<?php echo $jenis; ?>" hidden>
                                                <input type="submit" value="Simpan">
                                            </form> -->
                                            <a class="btn btn-primary" data-toggle="modal" href="#myModal" onclick="return pindah(<?php echo $key->no.",'".$methodku."','".$key->critical."','".$time."','".$key->remarks."','".$mater."','".$jenis."'"; ?>);"><i class="glyphicon glyphicon-paperclip"></i></a>

                                            <!-- <a class="btn btn-primary" href="<?php echo site_url('Taping_Henkaten/createTaping/') ?>"><i class="glyphicon glyphicon-paperclip"></i></a> -->
                                        </center>
                                    </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table><?php } }?>
                        </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>          
</div>
</div>

<!-- tampilan pop-up kode xxx -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Input Data SWCT</strong></h3>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <?php echo form_open_multipart('Taping_Henkaten/createTaping/'); ?>
                    <?php echo validation_errors(); ?>
                     
                    <div class="form-group">
                        <label class="control-label col-sm-3">Elemen Kerja</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="no" id="no">
                            <input type="text" class="form-control" name="method_old" id="method_old">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Material</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="mat_old" id="mat_old">
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
                        <label class="control-label col-sm-3">Jenis</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jenis" id="jenis">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">STD</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="erms" id="erms">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <?php //echo form_submit('submit','Sim', 'class="btn btn-success btn-lg" id="submit"');?>
                <button type="submit" class="btn btn-effect-ripple btn-primary">Simpan</button>
                <?php echo form_close(); ?> 
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Batal</button>  
            </div>    
        </div>
    </div>
</div>
</div>
<!-- end tampilan pop-up kode xxx -->


<!-- jQuery -->
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
        <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script>
            function pindah(no, method_old, critical, erms, remarks, mat_old, jenis){
                document.getElementById('no').value=no;
                document.getElementById('method_old').value=method_old;
                document.getElementById('critical').value=critical;
                document.getElementById('erms').value=erms;
                document.getElementById('remarks').value=remarks;
                document.getElementById('mat_old').value=mat_old;
                document.getElementById('jenis').value=jenis;
            }
        </script>

        <script type="text/javascript"> 

        $(function(){ 
           
            $("#saveusers").on('click', function(){ 
                
                var fname  = $("#first_name").val();
      
                var lname  = $("#last_name").val();

                var email  = $("#email").val();
                
                $.ajax({ 

                  method: "POST",
                  url: "saverecords.php",

                  data: {"first_name": first_name, "last_name": last_name, "email": email},

                 }).done(function( data ) { 
                    var result = $.parseJSON(data); 
        
                    var str = '';

                    if(result == 1) {

                      str = 'User record saved successfully.';
                    
                    }else if( result == 2) {
                      str == 'All fields are required.';

                    } else{
                      str = 'User data could not be saved. Please try again'; 
                    }

                  $("#message").css('color', 'red').html(str);
       
              });
     
           }); 

        </script> 
<?php $this->load->view('footer');?>
