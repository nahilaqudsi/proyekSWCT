 
<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()",1000);  
        function waktu() {   
        var tanggal = new Date();  
        setTimeout("waktu()",1000);  
        document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
    }
    </script>
    <script language="JavaScript" type="text/javascript">
        function deletechecked()
        {
            if(confirm("Apakah anda yakin menghapus data ini?"))
            {
                return true;
            }
            else
            {
                return false;  
            } 
        }
    </script>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

        var popupWindow = null;
        function centeredPopup(url,winName,w,h,scroll){
        LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
        popupWindow = window.open(url,winName,settings)
    }
    </script>

    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Database Standart Time</title>

    <link href="<?php echo base_url('');?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/chosen/chosen.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/sweety/dist/sweetalert2.min.css')?>">

    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>

        <script src="<?php echo base_url('');?>assets/sweety/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url('');?>assets/sweety/dist/sweetalert.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#show').click(function() {
          $('.menu').toggle("slide");
        });
    });
    </script>

    <script>
    $(document).ready(function(){
        $('#show2').click(function() {
          $('.menu2').toggle("slide");
        });
    });
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#244282;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: white">Database Standart Time    </a>&nbsp&nbsp
                <a class="navbar-brand" href="#" style="color: white; size: 0.1" class="Tanggal" ><script language="JavaScript">document.write(tanggallengkap);</script></a><a class="navbar-brand" href="#" style="color: white" id="output" class="jam"></a>
            </div>
            <!-- /.navbar-header -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <center><div>
                                    <img src="<?php echo base_url();?>assets/img/y.png" height="35" width="230"  alt="User Image" />
                                </div>
                                <div class="info">
                                    

                                </div>
                                </center>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
               
                        <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> SWCT <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('home');?>"> 1. Housing</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('setting');?>"> 2. Setting</a>
                                </li>
                              <li>
                                     <a href="<?php echo site_url('taping_transaksi');?>"> 3. Taping</a>
                                </li> 
                                <!-- <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Offline</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Material Supply</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Special Process (SP)</a>
                                </li>
                                 <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> expander Grommet</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Electrical Check</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Dimension check</a>
                                </li>
                                 <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Visual Check</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> Double Check</a>
                                </li>
                                <li>
                                     <a href="#"><span class="glyphicon glyphicon-new-window"></span> PPO </a>
                                </li> -->
                            </ul>
                        </li>

                    <?php if (isset($validasi_admin)): ?>
                        <?php if ($validasi_admin=="admin"): ?>
                            <li><a href="#"><span class="glyphicon glyphicon-file"></span> Kelola Database Standart Time <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('crud_housing');?>"> 1. Master Data Housing</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('crud_setting');?>"> 2. Master Data Setting</a>
                                </li>
                                <li>
                                    <a href="#"> 3. Master Data Taping <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo site_url('taping_elemen');?>">Elemen dan Detail Elemen</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('taping_spec');?>">Spek Kondisi</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('taping_all');?>">Database Taping</a>
                                        </li>
                                     </ul>
                                </li>
                            </ul>
                        </li>
                        <li>                                
                            <a href="<?php echo site_url('login/toUser');?>"><span class="glyphicon glyphicon-user"></span> Kelola Pengguna</a>
                        </li>
                        <?php endif ?>
                    <?php endif ?>
                   
                        <li>
                            <a href="<?php echo site_url('login/toFaq');?>"><span class="glyphicon glyphicon-question-sign"></span> FAQ</a>
                        </li>
                    
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="<?php echo site_url() ?>/login/logout"><i class="fa fa-sign-out fa-fw"></i><font color="white"> Logout</font></a>
                </li>
            </ul>
        </nav>
              