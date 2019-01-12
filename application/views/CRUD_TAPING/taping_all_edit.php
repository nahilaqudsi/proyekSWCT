<?php $this->load->view('header'); ?>
<div id="page-wrapper">


    <div class="row">
    <div class="panel-body">

<!-- input master -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> DATABASE TAPING </strong>
                        </h3>
                        
                    </div>
        
                    <div class=" panel-body">
                        <?php echo form_open_multipart('taping_all/editAll/'.$this->uri->segment(3)); ?>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Detail Elemen</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <select class="form-control chosen" name="idt_detail" id="idt_detail">
                                        <option value="0"> -- Detail Elemen Kerja --</option>
                                        <?php 
                                            foreach ($listdetail as $key) { ?>
                                            <option value="<?php echo $key['idt_detail']?>" <?php if($all[0]->idt_detail == $key['idt_detail']){echo 'selected';} ?>>
                                                <?php
                                                    echo $key['t_elemen'].' // '.$key['t_detail'];
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Spec Kondisi</label>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Jumlah Lilitan</label>
                                    <input type="number" name="jumlah_lilitan" id="jumlah_lilitan" value="<?php echo $all[0]->jumlah_lilitan ?>" placeholder="Intensitas" class="form-control">
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Jumlah CCT</label>
                                    <input type="number" name="jumlah_cct" id="jumlah_cct" value="<?php echo $all[0]->jumlah_cct ?>" placeholder="Intensitas" class="form-control">
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Jumlah Intensitas</label>
                                    <input type="text" name="jumlah_intensitas" id="jumlah_intensitas" value="<?php echo $all[0]->jumlah_intensitas ?>" placeholder="Intensitas" class="form-control">
                                </div>
                            </div>
                            </div>
                            <br><br><br>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    
                                </div>
                                

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <select class="form-control chosen" name="idt_tube" id="idt_tube">
                                        <option value="0"> -- Tube Size --</option>
                                        <?php 
                                            foreach ($listtube as $key) {  ?>
                                            <option value="<?php echo $key['idt_tube']?>" <?php if($all[0]->idt_tube == $key['idt_tube']){echo 'selected';} ?>>
                                                <?php
                                                    if(is_null($key['batas_awal'])OR $key['batas_awal']==0){
                                                        echo $key['batas_akhir']; 
                                                    }
                                                    else{
                                                        echo $key['batas_awal'].'&lt;'.'x'.'<'.$key['batas_akhir']; 
                                                    }
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <!-- <?php foreach($jabatan_list as $key){ ?>
                                        <option value="<?php echo $key->id_jabatan?>" <?php if($karyawan[0]->id_jabatan == $key->id_jabatan){echo 'selected';} ?> ><?php echo $key->nama_jabatan ?></option>
                                        <?php } ?> -->

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <select class="form-control chosen" name="idt_length" id="idt_length">
                                        <option value="0"> -- Length --</option>
                                        <?php 
                                            foreach ($listlength as $key) { ?>
                                            <option value="<?php echo $key['idt_length']?>" <?php if($all[0]->idt_length == $key['idt_length']){echo 'selected';} ?>>
                                                <?php
                                                    if(is_null($key['awal_length'])OR $key['awal_length']==0){
                                                        echo $key['akhir_length']; 
                                                    }
                                                    else{
                                                        echo $key['awal_length'].'&lt;'.'x'.'<'.$key['akhir_length']; 
                                                    }
                                                ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                           <br><br>

                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Kategori</label>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Value Work" 
                                        <?php
                                            if ($all[0]->jenis=='Value Work') {
                                                echo 'checked="checked"';
                                            }
                                        ?>
                                    > Value Work
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Non Value Work"  <?php
                                            if ($all[0]->jenis=='Non Value Work') {
                                                echo 'checked="checked"';
                                            }
                                        ?>> Non Value Work
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Langkah"
                                         <?php
                                            if ($all[0]->jenis=='Langkah') {
                                                echo 'checked="checked"';
                                            }
                                        ?>
                                    > Langkah
                                </div>
                                
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>STD TIME (detik)</label>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label>ERM</label>
                                    <input type="number" name="t_erm" class="form-control" placeholder="ERM" required="" value="<?php echo $all[0]->t_erm ?>">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label>INP</label>
                                    <input type="number" name="t_inp" class="form-control" placeholder="INP" required="" value="<?php echo $all[0]->t_inp ?>">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label>Floor/Rear</label>
                                    <input type="number" name="t_floor_rear" class="form-control" placeholder="FLOOR/REAR" required="" value="<?php echo $all[0]->t_floor_rear ?>">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <label>Door</label>
                                    <input type="number" name="t_door" class="form-control" placeholder="DOOR" required="" value="<?php echo $all[0]->t_door ?>">
                                </div>
                                
                            </div>
                            <br><br><br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Critical</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <input type="text" name="t_critical" class="form-control" value="<?php echo $all[0]->t_critical ?>">
                                </div>
                            </div>
                            <br><br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Related OS</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <input type="text" name="t_os" class="form-control" value="<?php echo $all[0]->t_os ?>">
                                </div>
                            </div>
                            <br><br><br>


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit </button>
                                    <?php echo form_close(); ?>
                                    <a href="<?php echo site_url('taping_all/viewData');?>" type="button" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> &nbsp;Lihat &nbsp;</a>
                                </div>
                            </div>                            
                        </div>

                    </div>
            </div>           
            

        </div>
<!-- end input master -->

         
            
    </div>
    </div>
</div>



<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
        <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>

<?php $this->load->view('footer');?>