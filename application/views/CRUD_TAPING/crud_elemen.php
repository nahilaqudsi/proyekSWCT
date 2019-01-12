<?php $this->load->view('header'); ?>
<div id="page-wrapper">


    <div class="row">
    <div class="panel-body">

        <!-- AWAL ALERT  -->
            <?php 
                if($this->session->flashdata('suksesD') != "") {
                    echo '<div id="div-alert" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Sukses</strong> Data Detail Elemen Berhasil Diperbarui
                          </div>';
                }
            ?>
             <?php 
                if($this->session->flashdata('failedD') != "") {
                    echo '<div id="div-alert" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Gagal</strong> Data Detail Elemen Gagal Diperbarui
                          </div>';
                }
            ?>

            <?php 
                if($this->session->flashdata('sukses') != "") {
                    echo '<div id="div-alert" class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Sukses</strong> Data Elemen Berhasil Diperbarui
                          </div>';
                }
            ?>
             <?php 
                if($this->session->flashdata('failed') != "") {
                    echo '<div id="div-alert" class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Gagal</strong> Data Elemen Gagal Diperbarui
                          </div>';
                }
            ?>

        <!-- AKHIR ALERT -->

<!-- input master -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> ELEMEN KERJA</strong>
                        </h3>   
                    </div>
        
                    <div class=" panel-body">
                        <?php echo form_open_multipart('taping_elemen/createElemen'); ?>
                        <div class="form-group">
                            <div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="t_elemen" class="form-control" placeholder="Masukkan Elemen Kerja" required="">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> LIST ELEMEN KERJA</strong>
                        </h3> 
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <td align="center">No</td>
                                <td align="center">Elemen Kerja</td>
                                <td align="center"> Action</td>
                            </thead>

                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($taping_elemen_list as $key) {
                                ?>
                                <td align="center"><?php echo $no++; ?></td>
                                <td> <?php echo $key->t_elemen ?></td>
                                <td width="40%" align="center">
                                    <a href="<?php echo site_url('taping_elemen/editElemen/').$key->idt_elemen?>">
                                        <button type="button" class="btn btn-success btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                     <a href="<?php echo site_url('taping_elemen/deleteElemen/').$key->idt_elemen?>">
                                        <button type="button" OnClick = "return confirm('Apakah anda yakin menghapus data ini?'); "class="btn btn-danger btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </a>
                                </td>
                                
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    

                   
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>DETAIL ELEMEN KERJA</strong>
                        </h3>   
                    </div>
                    
                   <div class=" panel-body">
                        <?php echo form_open_multipart('taping_elemen/createDetailElemen'); ?>
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

                        <div align="right">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div> 

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> LIST DETAIL ELEMEN KERJA</strong>
                        </h3> 
                    </div>

                    

                    <div class="panel-body">
                        <table class="table table-bordered" id="example3">
                            <thead>
                                <!-- <td>No</td> -->
                                <td align="center">Elemen</td>
                                <td align="center">Detail Elemen</td>
                                <td align="center">Action</td>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($taping_detail_list as $key) {
                                ?>
                                <!-- <td><?php echo $no; ?></td> -->
                                <td><?php echo $key->t_elemen; ?></td>
                                <td><?php echo $key->t_detail; ?></td>
                                <td align="center">
                                    <a href="<?php echo site_url('taping_elemen/editDetail/').$key->idt_detail?>">
                                        <button type="button" class="btn btn-success btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                     <a href="<?php echo site_url('taping_elemen/deleteDetail/').$key->idt_detail?>">
                                        <button type="button" OnClick = "return confirm('Apakah anda yakin menghapus data ini?'); "class="btn btn-danger btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </a>
                                </td>
                            </tbody>
                            <?php } ?>
                        </table>
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
        <br>
<?php $this->load->view('footer');?>