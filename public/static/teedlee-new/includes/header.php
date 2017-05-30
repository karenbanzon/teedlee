<!doctype html>
<html class="no-js" lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/favicons/favicon.png" />

	<title>Teedlee</title>
	<link rel="stylesheet" href="stylesheets/style.css">
	</head>
	<body>
		<div class="off-canvas-wrapper">
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

				<!-- off-canvas title bar for 'small' screen -->
				<header class="title-bar" data-responsive-toggle="widemenu" data-hide-for="large">
					<div class="row">
						<div class="small-3 columns">
							<button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
						</div>
						<div class="small-6 columns text-center">
							<div class="brand">
								<a href=""><img src="images/logo.png"></a>
							</div>
						</div>
						<div class="small-3 columns text-right">
							<div class="mobile-nav">
								<a href=""><span class="icon icon-shopping-cart"></span></a>
							</div>
						</div>
					</div>
					<div class="title-bar-right">
						
					</div>
				</header>

				<!-- off-canvas right menu -->
				<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left">
					<ul class="vertical menu">
						<li><a href="index.php">Directory</a></li>
						<li><a href="stickersheet.php">Stickersheet</a></li>
					</ul>
				</div>

				<!-- "wider" top-bar menu for 'medium' and up -->
				<header id="widemenu" class="top-bar">
					<div class="row">
						<div class="top-bar-left">
							<ul class="dropdown menu" data-dropdown-menu>
								<li>
									<div class="brand">
										<a href="/"><img src="images/logo.png"></a>
									</div>
								</li>
							</ul>
						</div>
						<div class="top-bar-right">
							<ul class="dropdown menu margin-top-10" data-dropdown-menu>
								<li><a href="">Shop</a></li>
								<li><a href="">Submit</a></li>
								<li><a href="">Vote</a></li>
								<li><a href="">Login</a></li>
								<li><a href=""><span class="icon icon-search"></span></a></li>
								<li><a href=""><span class="icon icon-shopping-cart"></span></a></li>
							</ul>
						</div>
					</div>
				</header>

				<!-- original content goes in this container -->
				<div class="off-canvas-content" data-off-canvas-content>