<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.simpleWeather.js" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.slides.min.js" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.theme.default.min.css">
<link href='https://fonts.googleapis.com/css?family=Pontano+Sans|Open+Sans:300,700|Lato:700|Fredoka+One|Patua+One|Nixie+One|Forum|Corben:700|Concert+One|Averia+Serif+Libre:700|Averia+Libre:700' rel='stylesheet' type='text/css'>

<script type="text/javascript">
$(function() {

			$.simpleWeather({
				 	location:'madison, wi',
					unit: 'f',
					success: function(weather) {
						html = '<h2>Today&rsquo;s Weather is Currently:<br />'+weather.currently+'</h2>';
						html += '<img class="pic"  src="'+weather.image+'">';
						html += '<div class="temp"><p>'+weather.temp+'&deg;</p></div>';
						html += '<p class="now">High: '+weather.high+'&deg; / Low: '+weather.low+'&deg;<br/>';
						html += '<span class="weatherTime">'+weather.updated+'</span></p>';

						$("#weather").html(html);
					},
					error: function(error) {
						$("#weather").html('<p>'+error+'</p>');
					}
		});
});

$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
		items:1,
		loop:true,
		autoplay:true,
		autoplayTimeout:11111,
		smartSpeed:555,
		mouseDrag: true,
		lazyLoad: false,
	});
});


</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>



	<div id="content" class="site-content">
