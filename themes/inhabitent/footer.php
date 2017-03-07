<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<!-- <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'WordPress' ); ?></a> -->
				</div><!-- site-info -->
				<div class="footer-info">
          <div class="contact">
            <h3>Contact Info</h3>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="mailto:info@inhabitent.com">info@inhabitent.com</a>
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              	<a href="tel:778-456-7891">778-456-7891</a>
            </p>
            <p>
              <span>
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
              </span>
              <span>
                <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
              </span>
              <span>
                <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
              </span>
            </p>
          </div><!--contact  -->
          <div class="business-hours">
            <h3>Business Hours</h3>
            <p><span>Monday-Friday:</span> 9am to 5pm</p>
            <p><span>Saturday:</span> 10am to 2pm</p>
            <p><span>Sunday:</span> Closed</p>
          </div><!--business-hours-->
          <div class="text-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            	<img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-text.svg" alt="Image of Inhabitent logo" />
            </a>
          </div><!-- text-logo -->
        </div><!-- footer-info -->
				<div class="copyright">
					<span>Copyright &copy; 2016 Inhabitent</span>
				</div>

			</div><!--footer-info -->

			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
