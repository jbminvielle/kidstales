<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo $viewTitle; ?></title>
 
		<!-- meta -->
		<meta name="description" content="">
 
		<!-- mon icon -->
		<!--- <link rel="shortcut icon" href="favicon.ico"> --->
 
		<!-- mon template.css --> 
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="public/css/reset.css" type="text/css" media="screen"  />
		<link rel="stylesheet" href="public/css/kidstales.css" type="text/css" media="screen"  />
		<link rel="stylesheet" href="public/css/form.css" type="text/css" media="screen"  />
		<link rel="stylesheet" href="public/css/dashboard.css" type="text/css" media="screen"  />

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="public/js/lib/modernizr-2.5.3.min.js"></script>
		<script type="text/javascript" src="public/js/lib/jquery.easing.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type="text/javascript" src="public/js/kidstales.js"></script>
	</head>
 
 
	<body onload="initialize()">
		<div id="map_canvas" <?php if(!$map) echo 'class="hidden"'; ?>></div>
		
		<div id="app">
			<header<?php if($smallHeader) echo ' class="small" '; ?>>
				<!-- menu du haut -->
				<nav>
					<ul>
						<li><h1><a href="home" title="Page d'accueil">Kids' <span>Tales</span></a></h1></li>
						<a href="explore" title="Explorer"><li>Explorer</li></a>
						<a href="register" title="S'inscrire à l'outil"><li>Inscription<br />Connexion</li></a>
					</ul>
				</nav>
			</header>

	<div id="ajaxContent">