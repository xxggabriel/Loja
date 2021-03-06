<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/resource/site/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resource/site/css/font-awesome.min.css" rel="stylesheet">
    <link href="/resource/site/css/prettyPhoto.css" rel="stylesheet">
    <link href="/resource/site/css/price-range.css" rel="stylesheet">
    <link href="/resource/site/css/animate.css" rel="stylesheet">
	<link href="/resource/site/css/main.css" rel="stylesheet">
	<link href="/resource/site/css/responsive.css" rel="stylesheet">
	<link href="/resource/site/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/resource/site/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/resource/site/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/resource/site/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/resource/site/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/resource/site/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>62 9 9478-8555</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> programador.gabrieloliveira@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/programaremcasa/notifications/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/xxggabriel"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/in/gabrieloliveiradesouza/"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="/"><img src="/resource/site/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Brasil
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Brasil</a></li>
									<li><a href="">U.S</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Real
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Real</a></li>
									<li><a href="">Dollar</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-star"></i> Lista de Desejos</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
								<?php if( empty($_SESSION['logged_user']) ){ ?><li><a href="/login"><i class="fa fa-lock"></i> Login</a></li><?php }elseif( empty($_SESSION['logged_user']) ){ ?><li><a href="/login"><i class="fa fa-lock"></i> Admin</a></li><?php }else{ ?><li><a href="/account"><i class="fa fa-user"></i> Minha Conta</a></li><?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/" class="active">Home</a></li>
                            	<li><a href="/products">Produtos</a></li>     
                                </li> 
								<li class="dropdown">
									<a href="#">Blog</a>
								</li> 
								<li><a href="/contact">Contato</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
