<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

	get_header();
?>
	<section class="home-hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-full.svg" alt="Image of Inhabitent logo" />
	</section>

	<section class = "container">
		<h2 class="entry-title">Shop Stuff</h2>
			<div class="wrapper">

			<?php
				$terms = get_terms( array(
	    		'taxonomy' => 'product_type',
					'orderby' => 'name',
	    		'hide_empty' => false,
				) );
				?>

				<?php foreach ($terms as $term) : ?>
					<div class="prod-type-container">
						<img class="prod-type-icons" src="<?php echo get_template_directory_uri(); ?>/images/icons/<?php echo $term->slug; ?>.svg">
						<p> <?php echo $term->description; ?></p>
						<?php echo '<a class="prod-type-btn" href="'.get_term_link($term).'">'.$term->name.' stuff</a>' ?>
					</div>
				<?php endforeach; ?>
		</div>
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2 class="entry-title">Inhabitent Journal</h2>

					<?php	while ( have_posts() ) : the_post(); ?>
						<?php echo get_template_part( 'template-parts/content', 'page' ); ?>
						<?php endwhile; // End of the loop.	?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class = "journal-container container">
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
			<?php	endforeach; ?>
			<?php wp_reset_postdata();
			?>
		</div>

	<section class="container">
		<h2 class="entry-title">Latest Adventures</h2>
		<div class="adventure-container">
		<div class = "adventure-left">
			<div class="adventure-main"></div>
		</div>
		<div class="adventure-right">
			<div class="adventure-top"></div>
			<div class="adventure-bottom1"></div>
			<div class="adventure-bottom2"></div>
		</div>
	</div>
	</section>

<?php get_footer(); ?>
