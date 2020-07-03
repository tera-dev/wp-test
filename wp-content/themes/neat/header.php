<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="freehtml5.co" />
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />
		<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?> > 
		
		<div class="fh5co-loader"></div>
		
		<div id="page">
			<nav class="fh5co-nav <?php echo is_admin_bar_showing() ? 'show-with-admin-bar' : ''?>" role="navigation">
				
				<div class="container-wrap menu-container">
					<div class="top-menu">
						<div class="row">
							<div class="col-xs-2">
								<div id="fh5co-logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
							</div>
							<div class="col-xs-10 text-right menu-1">
							<?php wp_nav_menu( [
								'theme_location'  => 'main',
								'menu'            => 'main', 
								'container'       =>  null, 
								// 'container_class' => '', 
								// 'container_id'    => '',
								// 'menu_class'      => 'menu', 
								// 'menu_id'         => '',
								'echo'            => true,
								'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
								'walker'		  => new NavMenu()

							] );?>
							<!-- <hr> -->
								<!-- <ul>
									<li class="active"><a class="main-level-menu" href="index.html">Home</a></li>
									<li><a href="work.html" class="main-level-menu">Work</a></li>
									<li class="has-dropdown">
										<a href="blog.html" class="main-level-menu">Blog</a>
										<ul class="dropdown">
											<li><a href="#">Web Design</a></li>
											<li><a href="#">eCommerce</a></li>
											<li><a href="#">Branding</a></li>
											<li><a href="#">API</a></li>
										</ul>
									</li>
									<li><a href="about.html" class="main-level-menu">About</a></li>
									<li><a href="contact.html" class="main-level-menu">Contact</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</nav>