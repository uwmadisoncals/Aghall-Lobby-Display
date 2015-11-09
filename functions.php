<?php

//function five_posts_on_homepage( $query ) {
//    if ( $query->is_home() && $query->is_main_query() ) {
//        $query->set( 'posts_per_page', 5 );
//    }
//}
//add_action( 'pre_get_posts', 'five_posts_on_homepage' );

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

//Custom Fields:

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slide-options',
		'title' => 'Slide Options',
		'fields' => array (
			array (
				'key' => 'field_5640fc0ae3e09',
				'label' => 'Type of Slide',
				'name' => 'imgVtxt',
				'type' => 'radio',
				'required' => 1,
				'choices' => array (
					'image' => 'Image Slide',
					'text' => 'Textbased Slide',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'image',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5626ad537aa29',
				'label' => 'Upload Image',
				'name' => 'solo_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_56269f176473d',
				'label' => 'Sub-Heading',
				'name' => 'sub_heading',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'text',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Appears beneath Title',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5640fd456cd3f',
				'label' => 'Content',
				'name' => 'text_content',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'text',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5626aa975aa23',
				'label' => 'Call to Action',
				'name' => 'call_to_action',
				'type' => 'text',
				'instructions' => 'Text within &lt;r&gt;...&lt;/r&gt; will be red. Use &lt;w&gt;...&lt;/w&gt; for white. Use &lt;u&gt;...&lt;/u&gt; for underlined text.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'text',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Black next to <r>Red</r> and <w>White</w>',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5627dcf9d29fb',
				'label' => 'Call to Action Background Color',
				'name' => 'cta_color',
				'type' => 'text',
				'instructions' => 'Insert Color Hex Code, Use # ',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'text',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '#B70101',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5640fef1cc8b9',
				'label' => 'Slide Background Color',
				'name' => 'slide_bg_color',
				'type' => 'text',
				'instructions' => 'Insert Color Hex Code, Use # ',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5640fc0ae3e09',
							'operator' => '==',
							'value' => 'text',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#E0E0E0',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
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
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}



// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');



?>
