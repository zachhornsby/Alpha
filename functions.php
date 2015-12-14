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
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

?>