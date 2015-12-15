<?php get_header(); ?>

	<main role="main">

		<section>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</a>
					<?php endif; ?>

					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author">Published by <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'alpha' ), __( '1 Comment', 'alpha' ), __( '% Comments', 'alpha' )); ?></span>

					<?php the_content();?>
					
					<?php wp_link_pages(); ?>

					<?php the_tags(); ?>

					<p><?php echo 'Categorized in: '; the_category(', '); ?></p>

					<p><?php echo 'This post was written by '; the_author(); ?></p>

					<?php edit_post_link(); ?>

					<?php comments_template(); ?>

				</article>

			<?php endwhile; ?>

			<?php else: ?>

				<article>
					<h2>Sorry, nothing to display.</h2>
				</article>

			<?php endif; ?>

		</section>

	</main>

<?php get_sidebar(); ?>