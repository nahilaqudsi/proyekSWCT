<?php $this->load->view('header');?>
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
<div><br><center><h3><b>PEDOMAN SWCT DAN STD HOUSING</b></h3></center><hr></div>
    <div class="row">
     
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
<div class="table-responsive" id="data_detail">
     <table class="table table-bordered" id="example2">
        <thead>
            <td class="col-sm-1"> elemen kerja</td>
            <td class="col-sm-3"> detail elemen kerja</td>
            <td> keterangan</td>
            <td> syarat 1 </td>
            <td> syarat 2 </td>
            <td class="col-sm-1"> value work</td>
            <td class="col-sm-1"> non value work</td>
            <td class="col-sm-1"> langkah </td>
            <td class="col-sm-1"> erm</td>
            <td class="col-sm-1"> inp</td>
            <td class="col-sm-1"> floor</td>
            <td class="col-sm-1"> door</td>
            <td class="col-sm-1"> action </td>
        </thead>
        <tbody>
            <?php foreach ($daftar_pedoman as $key) { ?>
            <tr>
                <td> <?php echo $key->nama_elemen?></td>
                <td> <?php echo $key->detail_ek?> </td>
                <td> <?php echo $key->ket ?></td>
                <td> <?php echo $key->syarat1 ?></td>
                <td> <?php echo $key->syarat2a ?> - <?php echo $key->syarat2b ?> <?php echo $key->dot ?></td>
                <?php if ($key->value_work=="1") {?>
                <td align="center"><img width="12" height="12px" src="<?php echo base_url('');?>assets/img/bullet.png"></td>
                <?php } else {?>
                <td></td>
                <?php }?>
                <?php if ($key->non_value_work=="1") {?>
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
                    <a href="<?php echo site_url('Crud_housing/editPedoman/').$key->id?>"><i class="glyphicon glyphicon-edit"></i> </a>
                    <a href="<?php echo site_url('Crud_housing/deletePedoman/').$key->id?>" ><i class="glyphicon glyphicon-trash"></i> </a></center>
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
        <br>
         <script type="text/javascript">
            $(document).ready(function() {
                $('#example2').DataTable();
            } );
        </script>
<?php $this->load->view('footer');?>