<?php
$uri = $this->uri->segment ( 2 );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quran & Hadits 9 Imam</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Haidar Mar'ie">

<!-- Le styles -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"
	rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/main.css"
	rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/keyboard-arabic.css"
	rel="stylesheet">
<style type="text/css">

</style>

<script type="text/javascript">
</script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon"
	href="<?php echo base_url(); ?>assets/ico/favicon.png">
</head>

<body>
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav"
		role="banner">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="glyphicon glyphicon-bar"></span> <span
						class="glyphicon glyphicon-bar"></span> <span
						class="glyphicon glyphicon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url()?>search">Quran
					Hadits Lengkap</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse"
				role="navigation">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url()?>search"><i
							class="glyphicon glyphicon-home white"></i> Home</a></li>
					<li><a href="<?php echo site_url()?>search"><i
							class="glyphicon glyphicon-search white"></i> Advanced Search</a></li>
					<li><a href="<?php echo site_url()?>list_notes"><i
							class="glyphicon glyphicon-bookmark white"></i> Bookmarks</a></li>
					<li><a href="#contact"><i
							class="glyphicon glyphicon-envelope white"></i> Contact</a></li>
				</ul>
				<p class="navbar-text pull-right">
					<i class="glyphicon glyphicon-user white"></i> <a href="#"
						class="navbar-link">Username</a>
				</p>
				<form class="navbar-form pull-left"
					action="<?php echo site_url();?>search/result/" method="POST">
					<input type="text" name="search_bool"
						class="search-query form-control" placeholder="Search">
					<button type="submit" value="Search" name="search"
						class="btn btn-default">Submit</button>
				</form>
			</nav>
		</div>
	</header>




	<div class="container  bs-docs-container">
		<div class="row">
			<div class="col-md-2">
				<div class="well sidebar-nav">
					<ul class="nav">
						<li class="nav-header active"><a
							href="<?php echo site_url();?>quran"><i
								class="glyphicon glyphicon-book"></i>Qur'an</a></li>
						<li class="divider"></li>
						<li class="nav-header active"><a><i
								class="glyphicon glyphicon-book"></i> Hadits</a></li>
						<li <?php echo $uri =='bukhari'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/bukhari">Shahih Bukhari</a></li>
						<li <?php echo $uri =='muslim'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/muslim">Shahih Muslim</a></li>
						<li <?php echo $uri =='abudaud'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/abudaud">Sunan Abu Daud</a></li>
						<li <?php echo $uri =='tirmidzi'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/tirmidzi">Sunan Tirmidzi</a></li>
						<li <?php echo $uri =='nasai'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/nasai">Sunan Nasa'i</a></li>
						<li <?php echo $uri =='ibnumajah'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/ibnumajah">Sunan Ibnu Majah</a></li>
						<li <?php echo $uri =='ahmad'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/ahmad">Musnad Ahmad</a></li>
						<li <?php echo $uri =='malik'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/malik">Muwatha' Malik</a></li>
						<li <?php echo $uri =='darimi'?'class="active"':''; ?>><a
							href="<?php echo site_url();?>kitab/darimi">Sunan Darimi</a></li>
					</ul>
				</div>
				<!--/.well -->
			</div>
			<!--/span-->