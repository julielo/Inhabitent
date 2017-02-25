<?php /* Template Name: About Page
*
* @package Inhabitent Theme
*/
?>

<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="entry-header page-template-about">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
				<?php inhabitent_about_image(); ?>

			<h2>Our Story</h2>
			<?php echo CFS()->get('about_our_story'); ?>
			<h2>Our Team</h2>
			<?php echo CFS()->get('about_our_team'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
