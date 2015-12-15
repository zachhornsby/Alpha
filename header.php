<!doctype html>

<head <?php language_attributes(); ?> class="no-js">
	
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<?php wp_head(); ?>

</head>
	
<body <?php body_class(); ?>>

<div class="wrapper">

	<header class="header" role="banner">

		<div class="logo">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
			</a>
		</div>

		<nav class="nav" role="navigation"></nav>

	</header>