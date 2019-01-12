 <?php $this->load->view('header'); ?>
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
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="tapingAll">
                            <thead>
                                <td></td>
                                <td>Elemen Kerja</td>
                                <td>Detail</td>
                                <td>Lilitan</td>
                                <td>Tube Size</td>
                                <td>Length</td>
                                <!-- <td>CCT</td>
                                <td>Intensitas</td> -->
                                <td>Value Work</td>
                                <td>Non Value Work</td>
                                <td>Langkah</td>
                                <!-- <td>ERM</td>
                                <td>INP</td>
                                <td>Floor</td>
                                <td>Door</td> -->
                                <td>Critical</td>
                                <td>Related OS</td>
                                <!-- <td>Action</td> -->
                            </thead>

                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($taping_all_list as $key) {
                                ?>
                                <td class="col-sm-1">
                                    <a href="<?php echo site_url('taping_all/editAll/').$key->idt_all?>">
                                        <button type="button" class="btn btn-success btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                     <a href="<?php echo site_url('taping_all/deleteAll/').$key->idt_all?>">
                                        <button type="button" OnClick = "return confirm('Apakah anda yakin menghapus data ini?'); "class="btn btn-danger btn-xs" data-title="delete" data-toggle="modal" data-target="#delete"> <i class="fa fa-trash"></i>
                                        </button>
                                    </a> 
                                </td>
                                <td><?php echo $key->t_elemen ?></td>
                                <td><?php echo $key->t_detail; ?></td>
                                <td><?php echo $key->jumlah_lilitan ?></td>
                                <td><?php echo $key->batas_awal.'-'.$key->batas_akhir; ?></td>
                                <td><?php echo $key->awal_length.'-'.$key->akhir_length ?></td>
                                <!-- <td><?php echo $key->jumlah_cct; ?></td>
                                <td><?php echo $key->jumlah_intensitas ?></td> -->
                                <td align="center">
                                    <?php 
                                        if($key->jenis=='Value Work')
                                        { ?>
                                            <i class="fa fa-circle"></i>
                                            <?php
                                        }
                                    ?>       
                                </td>
                                <td align="center">
                                    <?php 
                                        if($key->jenis=='Non Value Work')
                                        { ?>
                                            <i class="fa fa-circle"></i>
                                            <?php
                                        }
                                    ?>  
                                </td>
                                <td align="center">
                                    <?php 
                                        if($key->jenis=='Langkah')
                                        { ?>
                                            <i class="fa fa-circle"></i>
                                            <?php
                                        }
                                    ?>  
                                </td>
                                <!-- <td><?php echo $key->t_erm ?></td>
                                <td><?php echo $key->t_inp ?></td>
                                <td><?php echo $key->t_floor_rear ?></td>
                                <td><?php echo $key->t_door ?></td> -->
                                <td><?php echo $key->t_critical ?></td>
                                <td><?php echo $key->t_os ?></td>
                            </tbody>
                            <?php } ?>
                        </table>
                        <a href="<?php echo site_url('taping_all'); ?>"> <button type="button" class="btn btn-default">Back</button></a>
                    </div>

                </div>
            </div>           
            

        </div>
<!-- end input master -->

         
            
    </div>
    </div>
</div>
!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
        <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function() {
                $('#tapingAll').DataTable();
            } );
        </script>

<?php $this->load->view('footer');?>