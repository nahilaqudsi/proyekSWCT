<div class="panel-footer" style="margin-bottom: 0;background-color:#244282;">
    <center><p style="color: white">Coyright © 2018 PT. Surabaya Autocomp Indonesia</p></center>
</div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('');?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/dataTables.buttons.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/jszip.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/chosen/chosen.jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('');?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('');?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url('');?>assets/data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('');?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('');?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('');?>assets/dist/js/sb-admin-2.js"></script>
    <script>
        $(".chosen").chosen();
        $(document).ready(function(){
                $("#div-alert").fadeIn("slow");
                $("#div-alert").fadeOut(3000);
            });
        
        $('#dataTables-example').DataTable({
             responsive: true
        });
        $('#example').DataTable({
             responsive: true,
            dom: 'Bfrtip',
            buttons: [
            'print']
        });

    // });
    </script>
    <script type="text/javascript">
        $(".chosen").choasen();
    </script>

</body>

</html>