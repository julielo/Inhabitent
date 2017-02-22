<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
	<section class="home-hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-full.svg" alt="Image of Inhabitent logo" />
  </section>



	<section>
		<h2 class="entry-title">Shop Stuff</h2>
	</section>
	<section>
		<h2 class="entry-title">Inhabitent Journal</h2>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class = "journal-container">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php global $post;
					$args = array( 'posts_per_page' => 3, 'order'=> 'DSC' );
					$postslist = get_posts( $args );
					foreach ( $postslist as $post ) :
					  setup_postdata( $post ); ?>
						<div class = "home-post">

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium' ); ?>
									<?php the_title( sprintf( '<h3 class="home-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								<?php endif; ?>

								<?php if ( 'post' === get_post_type() ) : ?>
								<div class="home-entry-meta">
									<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
								</div><!-- .entry-meta -->
								<?php endif; ?>
							</header><!-- .entry-header -->

						</article><!-- #post-## -->
					</div>
					<?php
					endforeach;
					wp_reset_postdata();
					?>

				</section>
				<section>
					<h2 class="entry-title">Latest Adventures</h2>
				</section>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
