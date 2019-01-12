<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Halaman Login</title>
		
    <link href="<?php echo base_url('');?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/chosen/chosen.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url('');?>assets/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('') ?>assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/style.css">

	</head>
	<body>
		<style type="text/css">
			body
			{
			    background-image: url("<?php echo base_url();?>assets/img/sai.jpg");
			    background-size: 110%;
			    background-repeat: no-repeat;
			}
		</style>

		<div class="col-md-4 col-md-offset-4 form-login">
			<div class="outter-form-login">
				<center>
					
					<img width="100%" height="70px" src="<?php echo base_url();?>assets/img/yazaki2.png">
					<strong>
						<h3><font color="white" style="font-family:Tekton Pro;">*** Database Standart Time ***</font></h3>
					</strong>
					
					<img width="200px" height="200px" src="<?php echo base_url();?>assets/img/logo_pp.png">

				</center>
				<?php echo form_open_multipart('login/cekLogin') ?>
<!-- 				<h5 class="text-center title-login">
					<?php if (isset($sukses)) { ?>
					<p style="color: white;"><i><?php echo $sukses; ?>&nbsp</i></p>
					<?php } ?>
				</h5> -->
				<?php echo validation_errors(); ?>
				<br>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
				</div><br>
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div><br>
											
				<input type="submit" class="btn btn-block btn-default" value="Login" /><br><br>			
				<?php echo form_close(); ?>
	        </div>
	    </div>

	    <script src="<?php echo base_url('') ?>assets/js/jquery.min.js"></script>
	    <script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
	</body>
</html>