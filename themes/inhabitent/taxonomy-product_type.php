<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header container">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			</div>

			<div class = "prod-grid container">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class = "prod-grid-item">
						<div class="prod-thumbnail">
							<a href= "<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?> </a>
						</div>

						<div class = "prod-text-container">
							<div class="prod-text">
								<div class="prod-title"><?php the_title(); ?>
								<span class="dot-leader">.......................</span>
								<span class="prod-price"><?php echo CFS()->get('product_price'); ?></span>
							</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
