<?php $this->load->view('header'); ?>
<div id="page-wrapper">


    <div class="row">
    <div class="panel-body">

<!-- input master -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> EDIT ELEMEN KERJA</strong>
                        </h3>   
                    </div>
        
                    <div class=" panel-body">
                        <?php echo form_open_multipart('taping_elemen/editElemen/'.$this->uri->segment(3)); ?>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3">
                                    <label>Elemen Kerja</label>
                                </div>
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <input type="text" name="t_elemen" class="form-control" value="<?php echo $daftar_taping_elemen[0]->t_elemen ?>">
                                </div>
                                
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                    <?php echo form_close(); ?>
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
         <script type="text/javascript">
            $(document).ready(function() {
                $('#elemen').DataTable();
            } );
        </script>

<?php $this->load->view('footer');?>