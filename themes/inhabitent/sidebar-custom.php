<?php
/**
 * The sidebar containing the main widget area.s
 *
 * @package RED_Starter_Theme
 */

if ( ! is_active_sidebar( 'custom' ) ): ?>
<!-- <?php endif; ?> -->

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'custom' ); ?>
	<aside id="text-1" class="widget widget_text">
		<h2 class="widget-title">Contact Info</h2>
		<div class="textwidget">
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
		</div>
	</aside>
	<aside id="text-2" class="widget widget_text">
		<h3>Business Hours</h3>
		<p><span>Monday-Friday:</span> 9am to 5pm</p>
		<p><span>Saturday:</span> 10am to 2pm</p>
		<p><span>Sunday:</span> Closed</p>
	</aside>

</div><!-- #secondary -->
