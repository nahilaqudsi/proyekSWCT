<?php $this->load->view('header');?>

<div id="page-wrapper">
<div><br><center><h3><b>PEDOMAN SWCT DAN STD SETTING</b></h3></center><hr></div>
    <div class="row">
        <div class="panel-body">
 
                <?php if(isset($success)){ ?>
                <div id="div-alert" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($success)) echo $success;?>
                </div>
                <?php } ?>
                <?php if(isset($success_update)){ ?>
                <div id="div-alert" class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php if(isset($success_update)) echo $success_update;?>
                </div>
                <?php } ?>
                         <table class="table table-bordered" id="example2" >
                                    <thead>
                                        <td> elemen kerja</td>
                                        <td> detail elemen kerja</td>
                                       <!--  <td> keterangan</td> -->
                                        <!-- <td> syarat 1 </td> -->
                                        <td> ket </td>
                                        <td style="width: 5pt"> value work</td>
                                        <td> non value work</td>
                                        <td> langkah </td>
                                        <td> erm</td>
                                        <td> inp</td>
                                        <td> floor</td>
                                        <td> door</td>
                                        <td class="col-sm-1"> action </td>
                                    </thead>
                                     <tbody>
                                        <?php foreach ($daftar_pedoman as $key) { ?>
                                        <tr>


                                            <td> <?php echo $key->elemen_kerja?></td>
                                            <td> <?php echo $key->detail_ek?> </td>
                                            <!-- <td> <?php echo $key->ket ?></td> -->
                                            <!-- <td> <?php echo $key->syarat1 ?></td> -->
                                            <td> <?php echo $key->syarat_a ?> - <?php echo $key->syarat_b ?> <?php echo $key->ket ?></td>
                                    <?php if ($key->vw=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->nvw=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                    <?php if ($key->langkah=="1") {?>
                                        <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                                    <?php } else {?>
                                        <td></td>
                                    <?php }?>
                                            <td> <?php echo $key->erm?></td>
                                            <td> <?php echo $key->inp?></td>
                                            <td> <?php echo $key->floor?></td>
                                            <td> <?php echo $key->door?></td>

                                            
                                             <td><center>
                                               <!-- <a href="<?php echo site_url('Crud_setting/editPedoman/').$key->id?>" type="button" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a href="<?php echo site_url('Crud_setting/deletePedoman/').$key->id?>" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                                </a> --></center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody> 
                                </table>
      
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
        <br>
<?php $this->load->view('footer');?>