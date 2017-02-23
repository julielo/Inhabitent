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

function change_archive_title ($title) {
  if( is_post_type_archive('products') ) {
    $title = ( 'Shop Stuff' );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'change_archive_title' );
?>
