<?php get_header(); ?>

	<main role="main">
		
		<section>

			<h1><?php echo "Search Results for", $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>