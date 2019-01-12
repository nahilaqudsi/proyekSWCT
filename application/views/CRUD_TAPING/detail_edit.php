<?php $this->load->view('header'); ?>
<div id="page-wrapper">


    <div class="row">
    <div class="panel-body">

<!-- input master -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong> EDIT DETAIL ELEMEN KERJA</strong>
                        </h3>   
                    </div>
        
                    <div class=" panel-body">
                        <?php echo form_open_multipart('taping_elemen/editDetail/'.$this->uri->segment(3)); ?>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label>Elemen Kerja</label>
                                <select class="form-control" name="idt_elemen" id="idt_elemen">
                                    <?php foreach ($listelemen as $key) { ?>
                                        <option value="<?php echo $key['idt_elemen'] ?>" 
                                            <?php 
                                                if($key["idt_elemen"] == $daftar_taping_detail[0]->idt_elemen)
                                                    { echo $key["idt_elemen"] = 'selected'; }
                                            ?>>
                                            <?php echo $key["t_elemen"] ?>
                                        </option>
                                       
                                   <?php } ?> 
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label>Detail Elemen Kerja</label>
                                    <input type="text" name="t_detail" class="form-control" value="<?php echo $daftar_taping_detail[0]->t_detail ?>"><br>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div align="center">
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