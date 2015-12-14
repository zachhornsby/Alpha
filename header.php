<!doctype html>

<!--[if IE 7]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow"> 
	<?php } ?>
	
	<title><?php wp_title( '&mdash;', true, 'right' ); ?></title>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- stylesheets -->
	<link href="<?php echo get_template_directory(); ?>/css/normalize.css" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

	<!-- favicon -->
	<link href="<?php echo get_template_directory(); ?>/favicon.ico" rel="icon" type="image/x-icon">
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>