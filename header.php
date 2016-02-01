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
	<META HTTP-EQUIV="refresh" CONTENT="21600">
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
<link href='https://fonts.googleapis.com/css?family=Pontano+Sans|Open+Sans:300,700|Quicksand:300,400|Roboto+Mono:300' rel='stylesheet' type='text/css'>

<script src="https://npmcdn.com/flickity@1.1/dist/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="https://npmcdn.com/flickity@1.1/dist/flickity.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">

<script type="text/javascript">
    $(document).ready(function() {  
  getWeather(); //Get the initial weather.
  setInterval(getWeather, 600000); //Update the weather every 10 minutes.
});

function getWeather() {
      $.simpleWeather({
    woeid: '12781045', //12781045
    unit: 'f',
    success: function(weather) {
      html = '<i class="icon-'+weather.code+'"></i>';
      html += '<h2>'+weather.temp+'<nogap>&deg;</nogap></h2>';
      html += '<div class="desc"><h3 class="currently">'+weather.currently+'</h3></div>';
  
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });

}

$(document).ready(function(){
  /*$(".owl-carousel").owlCarousel({
		items:1,
		loop:true,
		autoplay:true,
		autoplayTimeout:11111,
		smartSpeed:777,
		mouseDrag: false,
		lazyLoad: false,
        lazyContent: false,
        transitionStyle : false,
	});*/
	
	
	$('.main-gallery').flickity({
	  // options
	  cellSelector: '.gallery-cell',
	  cellAlign: 'left',
	  contain: true,
	  autoPlay: true,
	  autoPlay: 12000,
	  wrapAround: true,
	  prevNextButtons: false,
	  pageDots: false,
	  pauseAutoPlayOnHover: false
	});
	
	var windowW = $(window).width();
	var sideW = $(".sidebar").width();
	var newWidth = windowW - sideW;
	
	$(".mask").css("margin-left",newWidth);
	
	$(window).resize(function() {
		var windowW = $(window).width();
	var sideW = $(".sidebar").width();
	var newWidth = windowW - sideW;
	
	$(".mask").css("margin-left",newWidth);
	});
});


</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>



	<div id="content" class="site-content">
