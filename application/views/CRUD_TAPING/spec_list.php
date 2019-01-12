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
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Length (mm)
                            </h3> 
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open_multipart('taping_spec/createLength/'); ?>
                                <?php echo validation_errors(); ?>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" class="form-control" name="awal_length" placeholder="Awal Length">
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" class="form-control" name="akhir_length" placeholder="Akhir Length" required>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <button class="btn btn-default" type="submit" value="Simpan" name="simpan" ><i class="glyphicon glyphicon-save"></i>Simpan</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                            <br><br>
                            <h3 class="panel-title"><strong>LIST LENGHT</strong></h3>
                            <div class="row">
                                <div class="panel-body">
                                <table class="table table-bordered" id="example3">
                                        <thead>
                                            <td> Length</td>
                                            <td> Action </td>
                                        </thead>
                                         <tbody>
                                            <?php foreach ($length_list as $key) { ?>
                                            <tr>
                                                <td width="60%">
                                                    <?php if(is_null($key->awal_length)OR $key->awal_length==0){
                                                        echo $key->akhir_length; 
                                                    }
                                                    else{
                                                        echo $key->awal_length.'&lt;'.'x'.'<'.$key->akhir_length; 
                                                    }
                                                    ?>
                                                </td>
                                                <td width="40%">
                                                    <a href="<?php echo site_url('taping_spec/editLength/').$key->idt_length?>" type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                                    </a>
                                                    <a href="<?php echo site_url('taping_spec/deleteLength/').$key->idt_length?>" type="button" class="btn btn-danger btn-xs" onclick="return deletechecked();"><i class="glyphicon glyphicon-trash"></i> Delete
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
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Tube Size (dim)
                            </h3> 
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open_multipart('taping_spec/createTube/'); ?>
                                <?php echo validation_errors(); ?>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" class="form-control" name="batas_awal" placeholder="Batas Awal">
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <input type="number" class="form-control" name="batas_akhir" placeholder="Batas Akhir" required>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <button class="btn btn-default" type="submit" value="Simpan" name="simpan" ><i class="glyphicon glyphicon-save"></i>Simpan</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                            <br><br>
                            <h3 class="panel-title"><strong>LIST TUBE SIZE</strong></h3>
                            
                            <div class="row">
                                <div class="panel-body">
                                <table class="table table-bordered" id="example4">
                                        <thead>
                                            <td> Tube Size</td>
                                            <td> Action </td>
                                        </thead>
                                         <tbody>
                                            <?php foreach ($tube_list as $key) { ?>
                                            <tr>
                                                <td width="60%"><?php if(is_null($key->batas_awal)OR $key->batas_awal==0){
                                                        echo $key->batas_akhir; 
                                                    }
                                                    else{
                                                        echo $key->batas_awal.'&lt;'.'x'.'<'.$key->batas_akhir; 
                                                    }
                                                    ?></td>
                                                <td width="40%">
                                                    <a href="<?php echo site_url('taping_spec/editTube/').$key->idt_tube?>" type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                                    </a>
                                                    <a href="<?php echo site_url('taping_spec/deleteTube/').$key->idt_tube?>" type="button" class="btn btn-danger btn-xs" onclick="return deletechecked();"><i class="glyphicon glyphicon-trash"></i> Delete
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
    </div>

            
</div>
<!-- tampilan pop-up edit detail -->
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