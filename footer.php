<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	<!--</div>.site-content -->

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cals_primary2.png" />

				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->
        <div id="weather"></div>
        <div id="social">
    <h2>Get Social with <strong>UWMadisonCALS!</strong></h2>
    <ul>
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.png" /></li>
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" /></li>
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reddit.png" /></li> 
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.png" /></li></li> 
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pinterest.png" /></li>
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/youtube.png" /></li></li>
        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png" /></li></li> 
    </ul>
</div>
	</div><!-- .sidebar -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
			?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
