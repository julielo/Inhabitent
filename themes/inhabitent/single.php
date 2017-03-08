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
			<div class="journal-wrapper">
				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<div class = "social-media-wrapper1">
					<div class="facebook-btn">
							<a href="#"><i class="fa fa-facebook"></i>Like</a>
					</div>
					<div class="twitter-btn">
							<a href="#"><i class="fa fa-twitter"></i>Tweet</a>
					</div>
					<div class="pinterest-btn">
							<a href="#"><i class="fa fa-pinterest"></i>Pin</a>
					</div>
				</div> <!-- social-media-wrapper -->
			</div> <!-- journal-wrapper -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
