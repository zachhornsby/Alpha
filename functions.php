<?php
	
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );
	
	// Load jQuery
	function mytheme_enqueue_scripts() {
			 wp_deregister_script('jquery');
			 wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.7.1');
			 wp_enqueue_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

	// Sidebar Support
	function alpha_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'alpha' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'alpha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	add_action( 'widgets_init', 'alpha_widgets_init' );


	// Set content width
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

?>