<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>
		<?php wp_title( ); ?>
	</title>

	<?php wp_head();?>
</head>

<body>
<header>
	<nav>
		<div class="nav_menu_mobile">
			 <span><i class="fas fa-bars"></i> Menu</span>
		</div>
		<div class="nav_menu">
			<?php wp_nav_menu( array( 'theme-location' => 'header-menu' ) ); ?>
		</div>
</nav>
	<div class="banner">

    <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>">

	</div>
</header>