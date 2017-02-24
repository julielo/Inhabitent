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

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="shop-category-container">
				<?php
					$terms = get_terms( array(
		    		'taxonomy' => 'product_type',
						'orderby' => 'name',
		    		'hide_empty' => false,
					) );
				?>

				<?php foreach ($terms as $term) : ?>
					<?php echo '<a class="shop-category-link" href="'.get_term_link($term).'">'.$term->name.'</a>' ?>
				<?php endforeach; ?>
			</div>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class = "shop-wrapper">

					<?php	get_template_part( 'template-parts/content' ); ?>
				</div>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
