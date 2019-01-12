<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Database Standart Time</title>
	<meta name="keyword" content="FAQ, CSS3, HTML5">
	<meta name="description" content="Halaman FAQ">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url('');?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="<?php echo base_url('');?>assets/styleFaq.css" rel="stylesheet">
</head>
<body>
		<header>
			<h1> FAQ Database Standart Time</h1>
			<h2>Preparation Production Departement</h2>
			<p><a href="<?php echo site_url('home');?>">&larr; Back to Database</a></p>
		</header>
		<center>
			 <a href="<?php echo base_url('assets/img/manbook.pdf');?>"><button type="button" class="btn btn-danger" style="width: 200px; height: 50px"> Manual Book </button></a>
			
			<a href="<?php echo base_url('assets/img/tutorSWCT.mp4');?>"><button type="button" class="btn btn-danger" style="width: 200px; height: 50px"> Video Tutorial </button></a>
			<!-- <button type="button" class="btn btn-danger" style="width: 200px; height: 50px"> FAQ & Alur Sistem</button> -->
		</center>
		<section class="faq">
			<div class="faq-left">
				
				<ul class="faq-container">
					
						<li>
							<label for="q1">Q: Bagaimana cara menambahkan elemen kerja baru di database standart time? </label> <input name="question" id="q1" type="checkbox" value="">
							<div class="big">
								<p>A : hanya admin yang dapat menambahkan elemen kerja baru. dengan cara : masuk ke menu Kelola Pedoman -> pilih bagian (HOusing  Setting) -> isi data sesuai inputan -> simpan</p>
								<p>Caranya langsung saja klik menu Tutorial Video agar lebih mudah</p>

							</div>
						</li>
						
						<li>
							<label for="q2">Q: Kenapa saya tidak terdapat menu Kelola Pedoman Standart time ? </label> <input name="question" id="q2" type="checkbox" value="">
							<div class="big">
								<p> A : karena anda tidak memiliki hak akses untuk mengelola pedoman database standart time</p>
								
							</div>
						</li>
						
						<li>
							<label for="q3">Q: Bagaimana cara saya mengetahui elemen kerja yang memiliki syarat atau tidak ? </label> <input name="question" id="q3" type="checkbox" value="" checked="checked">
							<div class="big">
								<p>A : sistem akan otomatis memberikan petunjuk jika pada elemen kerja tersebut memerlukan syarat untuk menentukan standart time.</p>

							</div>
						</li>
				</ul>	
			</div>
		<div class="faq-left"><br>
			<img src="<?php echo base_url();?>assets/img/swct.png"  width="220"  alt="User Image" /><img src="<?php echo base_url();?>assets/img/s2.png"  width="250"  alt="User Image" />
		</div>
		</section>
</body>
</html>