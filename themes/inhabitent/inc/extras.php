<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// Add a custom logo to the WordPress login page
function inhabitent_login_logo() {
	echo '<style type="text/css">
			#login h1 a { background: url('.get_stylesheet_directory_uri() . '/images/logos/inhabitent-logo-text-dark.svg) !important;
			background-size: 300px 53px !important; height: 53px !important; width: 295px !important;
		}

			#login .button.button-primary {
				background-color: #248A83;
			}
	</style>';
}

add_action('login_head', 'inhabitent_login_logo');

// Change the WordPress Login Page logo URL
// @param string $url the URL the logo image link points to.
//@return string

   function inhabitent_login_logo_url($url) {
     return home_url();
   }
   add_filter('login_headerurl', 'inhabitent_login_logo_url');

	 // Change title attribute for the  of logo image
// @return string

function inhabitent_login_title() {
	return 'Inhabitent';
}

add_filter( 'login_headertitle', 'inhabitent_login_title' );

// Add image from custom field for About page
function inhabitent_about_image() {
	if (!is_page_template('page-templates/about.php')) {
		return;
	}

	$bg_image = CFS()->get( 'about_header_image' );

	if(!$bg_image) {
		return;
	}

	$hero_css = ".page-template-about .entry-header {
    background:
        linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
        url({$bg_image}) no-repeat center bottom;
    background-size: cover, cover;
	}";
		wp_add_inline_style( 'inhabitent-style', $hero_css );
}
	add_action( 'wp_enqueue_scripts', 'inhabitent_about_image' );

	function inhabitent_archive_posts_sort( $query ) {

    if ( is_post_type_archive('products') ) {

      $query->set( 'posts_per_page', 16 );
			$query->set( 'orderby', 'title' );
      $query->set( 'order', 'ASC' );
        return;
    }
}
add_action( 'pre_get_posts', 'inhabitent_archive_posts_sort' );

// function inhabitent_archive_posts_cat_sort( $query ) {
//
// 	if ( is_post_type_archive('products') ) {
//
// 		$query->set( 'posts_per_page', 16 );
// 		$query->set( 'orderby', 'title' );
// 		$query->set( 'order', 'DSC' );
// 			return;
// 	}
// }
// add_action( 'pre_get_posts', 'inhabitent_archive_posts_cat_sort' );

function change_archive_title ($title) {
  if( is_post_type_archive('products') ) {
    $title = ( 'Shop Stuff' );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'change_archive_title' );


/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;

	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');

		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );

		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );

		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );

		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );

		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );

		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );

		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}

	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );

/**
 * Custom archive title.
 *
 * @param  string Title of archive page.
 * @return string
 */

function custom_archive_title( $title ) {
    // Remove any HTML, words, numbers, and spaces before the archive title.
    return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}

add_filter( 'get_the_archive_title', 'custom_archive_title' );
?>
