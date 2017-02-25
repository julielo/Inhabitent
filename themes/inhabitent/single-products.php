<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="container">
				<section class="prod-container-single">
				<div class="prod-image"><?php the_post_thumbnail( array(536,403) ); ?></div>

				<div class = "prod-content">
						<div class="prod-title-single"><?php the_title(); ?></div>
						<div class="prod-price-single"><?php echo CFS()->get('product_price'); ?></div>
						<div class="prod-desc-single"><?php echo the_content(); ?></div>
				</div>
			</section>
		</div>


			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>
		<div class = "social-media-wrapper">
			<div class="facebook-btn">
					<a href="#"><i class="fa fa-facebook"></i>Like</a>
			</div>
			<div class="twitter-btn">
					<a href="#"><i class="fa fa-twitter"></i>Tweet</a>
			</div>
			<div class="pinterest-btn">
					<a href="#"><i class="fa fa-pinterest"></i>Pin</a>
			</div>
		</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
