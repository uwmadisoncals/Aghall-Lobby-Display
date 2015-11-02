<?php

function five_posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 5 );
    }
}
add_action( 'pre_get_posts', 'five_posts_on_homepage' );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'bg_load_google_fonts' );
function bg_load_google_fonts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Pontano+Sans|Open+Sans:700', array(), CHILD_THEME_VERSION );
}

function custom_excerpt_length( $length ) {
	return 5;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slide-options',
		'title' => 'Slide Options',
		'fields' => array (
			array (
				'key' => 'field_56269f176473d',
				'label' => 'Sub-Heading',
				'name' => 'sub_heading',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Appears beneath Title',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626aa975aa23',
				'label' => 'Call to Action',
				'name' => 'call_to_action',
				'type' => 'text',
				'instructions' => 'Text within &lt;r&gt;...&lt;/r&gt; will be red. Use &lt;w&gt;...&lt;/w&gt; for white.',
				'default_value' => '',
				'placeholder' => 'Black Text, <r>Red</r> and <w>White</w>.',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5627dcf9d29fb',
				'label' => 'CTA Color',
				'name' => 'cta_color',
				'type' => 'text',
				'instructions' => 'Insert Color Hex Code, Use # ',
				'default_value' => '#B70101',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5626accea32da',
				'label' => 'Use a Solo Image?',
				'name' => 'use_a_solo_image',
				'type' => 'checkbox',
				'instructions' => 'Replace Slide Contents with an Image',
				'choices' => array (
					'yes' => 'Yes',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5626ad537aa29',
				'label' => 'Solo Image',
				'name' => 'solo_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5626accea32da',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (

			),
		),
		'menu_order' => 0,
	));
}

?>
