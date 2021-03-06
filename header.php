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
	<META HTTP-EQUIV="refresh" CONTENT="1800">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" charset="utf-8"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.simpleWeather.js" charset="utf-8"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.slides.min.js" charset="utf-8"></script>
	<link href='https://fonts.googleapis.com/css?family=Pontano+Sans|Open+Sans:300,700|Quicksand:300,400|Roboto+Mono:300' rel='stylesheet' type='text/css'>

	<script src="https://unpkg.com/flickity@1.1/dist/flickity.pkgd.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/flickity@1.1/dist/flickity.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/kiosk.js"></script>

<script type="text/javascript">



    $(document).ready(function() {
  getWeather(); //Get the initial weather.
  setInterval(getWeather, 600000); //Update the weather every 10 minutes.
            getLocation('0573','kiosk');
          getLocation('0184','kiosk');
          setPage();
});

setInterval(function() {
    setPage();
}, 33333)


function setPage() {
    update('0573', 'Eastbound ','kiosk');
    update('0184', 'Westbound ','kiosk');
}

function getWeather() {
      $.simpleWeather({
    woeid: '12781045', //12781045
    unit: 'f',
    success: function(weather) {
      html = '<i class="icon-'+weather.code+'"></i>';
      html += '<h2>'+weather.temp+'<nogap>&deg;</nogap></h2>';
      html += '<div class="desc"><h3 class="currently">'+weather.currently+'</h3></div>';

      $(".weather").html(html);
    },
    error: function(error) {
      $(".weather").html('<p>'+error+'</p>');
    }
  });

}

$(document).ready(function(){

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
	  pauseAutoPlayOnHover: false,
	  setGallerySize: false
	});

	var windowW = $(window).width();
	var sideW = $(".sidebar").width();
	var newWidth = windowW - sideW;

	$(".mask").css("margin-left",newWidth);

	function resizeCheck() {
		var windowW = $(window).width();
		var sideW = $(".sidebar").width();
		var newWidth = windowW - sideW;

		$(".mask").css("margin-left",newWidth);
	}

	$(window).resize(function() {
		resizeCheck();
	});

	setInterval(function() {
		resizeCheck();
	},5000);
});

$(document).ready(function(){
function tick(){
    $('.site-footer .socialIcons li:first').animate({'opacity':0}, 200, function () {
    $(this).appendTo($('.site-footer .socialIcons')).css('opacity', 1); });
}

setInterval(function(){ tick () }, 4000);

});

</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>



	<div id="content" class="site-content">
