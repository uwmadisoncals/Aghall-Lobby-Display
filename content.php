<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-color:<?php the_field('slide_bg_color'); ?>">
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>
	<div id="soloimg" class="noblur" style="background-image:url(<?php the_field('solo_image'); ?>); background-size: cover; background-position: right center;">
	</div>
	<div class="mask">
    <div id="soloimg" class="blurred" style="background-image:url(<?php the_field('solo_image'); ?>); background-size: cover; background-position: right center;">
    </div>
	</div>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
        	<h3><?php the_field('sub_heading'); ?></h3>

	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_field('text_content');  ?>
	
	</div><!-- .entry-content -->
<aside class="call-action" style="background-color:<?php the_field('cta_color'); ?>">
			<h4><?php the_field('call_to_action'); ?></h4>
		</aside>
	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
