<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wadi
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-wrap">
			<?php
            /**
             * Wadi Site info Footer
             */
            ?>
			<div class="footer-section">
				<div class="wadi__site-info">
					<div class="wadi__site-url">
						<a href="<?php echo site_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
					</div>
					<div class="wadi__search-footer">
						<?php
                            echo get_search_form()
                        ?>
					</div>
				</div>
			</div>
			<?php
            /**
             * Recent Posts Widget
             */
            ?>
			<div class="footer-section">
            	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('wadi-footer-column-one-widget')) {
                ;
            } ?>
        	</div>
			<?php
            /**
             * Topic Widget (Categories)
             */
            ?>
        	<div class="footer-section">
        	    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('wadi-footer-column-two-widget')) {
                ;
            } ?>
        	</div>
			<?php
            /**
             * Wadi Contact Footer
             */
            ?>
			<div class="footer-section">
			<div class="wadi__footer-contact">
				<h4 class="wadi__contact-head">
					Contact
				</h4>
				<ul class="wadi__contact-list">
					<li>
					<i class="fas fa-envelope"></i><a href="https://www.wadiweb.com/contact">Email</a>
					</li>
					<li>
					<i class="fab fa-facebook-f"></i><a href="https://www.facebook.com/WadiWeb">Facebook</a>
					</li>
					<li>
					<i class="fab fa-twitter"></i><a href="https://www.twitter.com/WadiWeb">Twitter</a>
					</li>
				</ul>
			</div>	
			</div>


		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
