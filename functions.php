<?php

//////////////////////////
//  Theme Support
//////////////////////////

if (!isset($content_width)) {
	$content_width = 900;
}

if (function_exists('add_theme_support')) {
	// Add Menu Support
	add_theme_support('menus');

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	add_image_size('large', 700, '', true); // Large Thumbnail
	add_image_size('medium', 250, '', true); // Medium Thumbnail
	add_image_size('small', 120, '', true); // Small Thumbnail
	add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');
}

//////////////////////////
//  Scripts & Styles
//////////////////////////

// Load scripts (header.php)
function alpha_header_scripts() {
	wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
	wp_enqueue_script('modernizr');
	
	wp_register_script('alphablankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
	wp_enqueue_script('alphablankscripts');
}

// Load styles
function alpha_styles() {
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all'); // Normalize
	wp_enqueue_style('normalize');

	wp_register_style('alpha', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
	wp_enqueue_style('alpha');
}

// Load jQuery
function alpha_enqueue_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

//////////////////////////
//  Navigation & Sidebar
//////////////////////////

// Alpha navigation
function alpha_nav() {
	wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-{menu slug}-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		)
	);
}

// Register Alpha Navigation
function register_alpha_menu() {
	register_nav_menus(array(
		'main-menu' => __('Main Menu', 'alpha'), // Main Navigation
		'mobile-menu' => __('Mobile Menu', 'alpha') // Mobile Navigation
	));
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
	
	// Define Sidebar Widget Area 1
	register_sidebar(array(
		'name' => __('Widget Area 1', 'alpha'),
		'description' => __('Description for this widget-area...', 'alpha'),
		'id' => 'widget-area-1',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
}

//////////////////////////
//  Improvements
//////////////////////////

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
	return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
	if ($key > -1) {
		unset($classes[$key]);
	}
		
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}

	return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function alpha_pagination()
{
	global $wp_query;
		$big = 999999999;
		echo paginate_links(array(
			'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages
	));
}

//////////////////////////
//  Actions
//////////////////////////

// Add Actions
add_action('init', 'alpha_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'alpha_styles'); // Add Theme Stylesheet
add_action('init', 'register_alpha_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'alpha_pagination'); // Add our HTML5 Pagination

?>