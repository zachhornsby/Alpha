<?php get_header(); ?>

		<?php if (have_posts()) : ?>

			<?php
				the_archive_title( '<h2 class="page-title">', '</h2>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

			<?php get_template_part( 'inc/nav'); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<div <?php post_class() ?>>
				
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
						<?php get_template_part( 'inc/meta'); ?>

						<div class="entry">
							<?php the_content(); ?>
						</div>

				</div>

			<?php endwhile; ?>

			<?php get_template_part( 'inc/nav'); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
