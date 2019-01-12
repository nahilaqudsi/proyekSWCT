<?php $this->load->view('header');?>

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

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>ELEMEN KERJA</strong>
                            <!-- <input type="button" id="show" value="  Hide / Show" bgcolor=""> -->
                        </h3> 
                    </div>

                    <div class="panel-body" >
                        <div class="row">
                            <?php echo form_open_multipart('taping_elemen/createElemen'); ?>
                            <?php echo validation_errors(); ?>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                   <input type="text" name="t_elemen" class="form-control" placeholder="Masukkan Elemen Kerja" required="">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                     <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                                     <input type="button" id="show" value="Lihat Data" class="btn btn-success">
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="menu" style="display: none;">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-primary">                    
                     
                        <div class="panel-heading" >
                            <h3 class="panel-title">
                                <strong> LIST ELEMEN KERJA</strong>
                                
                            </h3> 
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <td> Elemen Kerja</td>
                                    <td> Action </td>
                                </thead>
                                <tbody>
                                    <?php foreach ($taping_elemen_list as $key) { ?>
                                    <tr>
                                        <td width="60%"><?php echo $key->t_elemen?></td>
                                        <td width="40%">
                                            <a href="<?php echo site_url('taping_elemen/editElemen/').$key->idt_elemen?>" type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                            </a>
                                            <a href="<?php echo site_url('taping_elemen/deleteElemen/').$key->idt_elemen?>" type="button" class="btn btn-danger btn-xs" onclick="return deletechecked();"><i class="glyphicon glyphicon-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                DETAIL ELEMEN KERJA
                            </h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open_multipart('taping_elemen/createDetailElemen'); ?>
                                <?php echo validation_errors(); ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Elemen Kerja</label>

                                            <div>
                                               <select class="form-control chosen" name="idt_elemen" id="idt_elemen">
                                                    <option value="0"> -- Elemen Kerja --</option>
                                                    <?php 
                                                        foreach ($listelemen as $key) { 
                                                        echo "<option value='$key[idt_elemen]'>$key[t_elemen]</option>";
                                                    } ?>
                                                </select>
                                            </div>                            
                                        </div>
                                        <div class="form-group">
                                            <label>Detail Elemen Kerja</label>
                                            <div>
                                               <input type="text" name="t_detail" class="form-control" placeholder="Masukkan Detail Elemen Kerja" required=""> 
                                            </div>                            
                                        </div>
                                        <div>
                                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                                            <?php echo form_close(); ?>
                                            <input type="button" id="show2" value="Lihat Data" class="btn btn-success">
                                            </div>
                                        </div>
                                        
                                    </div> 
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>     
            </div>         
        </div>

        <div class="menu2" style="display: none;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">                    
                     
                        <div class="panel-heading" >
                            <h3 class="panel-title">
                                <strong> LIST DETAIL ELEMEN KERJA</strong>
                                
                            </h3> 
                        </div>

                        <div class="panel-body">
                            <<table class="table table-bordered" id="example3">
                                <thead>
                                    <td align="center">Elemen</td>
                                    <td align="center">Detail Elemen</td>
                                    <td align="center">Action</td>
                                </thead>
                                 <tbody>
                                    <?php foreach ($taping_detail_list as $key) { ?>
                                    <tr width="100%">
                                        <td><?php echo $key->t_elemen; ?></td>
                                        <td><?php echo $key->t_detail; ?></td>
                                        <td width="30%" align="center">
                                            <a href="<?php echo site_url('taping_elemen/editDetail/').$key->idt_detail?>" type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                            </a>
                                            <a href="<?php echo site_url('taping_elemen/deleteDetail/').$key->idt_detail?>" type="button" class="btn btn-danger btn-xs" onclick="return deletechecked();"><i class="glyphicon glyphicon-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

    </div>

            
</div>
<!-- tampilan pop-up edit detail -->
<div id="ModalAsi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">            
                <!-- <?php //echo json_encode($_POST);?> -->
                <?php echo form_open_multipart('Crud_housing/editDetail/'.$this->uri->segment(3)); ?>
                
                <?php echo validation_errors(); ?>
                    <br>
                        <label class="col-sm-3 control-label">detail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="detail_ek" placeholder="input no ASSY" required>
                        </div>
                    
                    <div class="modal-footer">
                        <input class="btn btn-primary btn-sm pull-right" type="submit" value="Simpan" name="simpan" style="margin-right: 50px">
                    </div>
                <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
<!-- end tampilan pop-up asi -->

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
        <script>
            function pindah(value,value2){
                document.getElementById('id_export').value=value;
                document.getElementById('data_std').value=value2;
            }
        </script>
                <script type="text/javascript">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#example3').DataTable();
            } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#example4').DataTable();
            } );
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example5').DataTable();
            } );
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#exampleIntensitas').DataTable();
            } );
        </script>
        <br>
<?php $this->load->view('footer');?>