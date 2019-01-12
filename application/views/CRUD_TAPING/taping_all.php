<?php $this->load->view('header'); ?>
<div id="page-wrapper">


    <div class="row">
    <div class="panel-body">
        <?php 
                if($this->session->flashdata('sukses') != "") {
                    echo '<div id="div-alert" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Sukses</strong> Data Berhasil Diperbarui
                          </div>';
                }
            ?>
             <?php 
                if($this->session->flashdata('failed') != "") {
                    echo '<div id="div-alert" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Gagal</strong> Data Gagal Diperbarui
                          </div>';
                }
            ?>
<!-- input master -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> DATABASE TAPING </strong>
                        </h3>
                        
                    </div>
        
                    <div class=" panel-body">
                        <?php echo form_open_multipart('taping_all/createAll'); ?>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Detail Elemen</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <select class="form-control chosen" name="idt_detail" id="idt_detail">
                                        <option> -- Detail Elemen Kerja --</option>
                                        <?php 
                                            foreach ($listdetail as $key) { 
                                            echo "<option value='$key[idt_detail]' required='required'>$key[t_elemen] // $key[t_detail]</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Spec Kondisi</label>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="number" name="jumlah_lilitan" class="form-control" placeholder="Jumlah Lilitan">
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                   <input type="number" name="jumlah_cct" class="form-control" placeholder="Jumlah CCT">
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="text" name="jumlah_intensitas" class="form-control" placeholder="Jumlah Intensitas">
                                </div>
                            </div>
                           <br><br>

                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <select class="form-control chosen" name="idt_tube" id="idt_tube">
                                        <option> -- Tube Size --</option>
                                        <?php 
                                            foreach ($listtube as $key) { 
                                            echo "<option value='$key[idt_tube]'>$key[batas_awal] < X < $key[batas_akhir]</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <select class="form-control chosen" name="idt_length" id="idt_length">
                                        <option> -- Length --</option>
                                        <?php 
                                            foreach ($listlength as $key) { 
                                            echo "<option value='$key[idt_length]'>$key[awal_length] < X < $key[akhir_length]</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                           <br><br>

                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Kategori</label>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Value Work" required="required"> Value Work
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Non Value Work" required="required"> Non Value Work
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="radio" name="jenis" value="Langkah" required="required"> Langkah
                                </div>
                                
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>STD TIME (detik)</label>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <input type="number" name="t_erm" class="form-control" placeholder="ERM" required="">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <input type="number" name="t_inp" class="form-control" placeholder="INP" required="">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <input type="number" name="t_floor_rear" class="form-control" placeholder="FLOOR/REAR" required="">
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <input type="number" name="t_door" class="form-control" placeholder="DOOR" required="">
                                </div>
                                
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Critical</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <input type="text" name="t_critical" class="form-control" placeholder="Critical">
                                </div>
                            </div>
                            <br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <label>Related OS</label>
                                </div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <input type="text" name="t_os" class="form-control" placeholder="Related OS">
                                </div>
                            </div>
                            <br><br>


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
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