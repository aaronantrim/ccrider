<?php

/**
 * Pro Theme Options.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Responsive Pro
 * @package  Responsive Pro
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hooks pro sections into core sections. Actually re-writes them now
 *
 * @param $sections
 *
 * @return array
 */
function responsive_pro_sections( $sections ) {

	// re-write the sections
	$new_sections = array(
		array(
			'title' => __( 'Personalize', 'responsive' ),
			'id'    => 'personalize'
		),
		array(
			'title' => __( 'Social Icons', 'responsive' ),
			'id'    => 'social'
		),
		array(
			'title' => __( 'Home Page', 'responsive' ),
			'id'    => 'home_page'
		),
		array(
			'title' => __( 'Templates', 'responsive' ),
			'id'    => 'templates'
		),
		array(
			'title' => __( 'CSS Styles', 'responsive' ),
			'id'    => 'css'
		),
		array(
			'title' => __( 'Scripts', 'responsive' ),
			'id'    => 'scripts'
		),
		array(
			'title' => __( 'Plugins', 'responsive' ),
			'id'    => 'plugins'
		)

	);

	return $new_sections;
}

add_filter( 'responsive_option_sections_filter', 'responsive_pro_sections' );

/**
 * Hooks pro options into core options
 *
 * Creates and array of options that get added to the relevant sections
 *
 * @key This must match the id of the section you want the options to appear in
 *
 * @title Title on the left hand side of the options
 * @subtitle Displays underneath main title on left hand side
 * @heading Right hand side above input
 * @type The type of input e.g. text, textarea, checkbox
 * @id The options id
 * @description Instructions on what to enter in input
 * @placeholder The placeholder for text and textarea
 * @options array used by select dropdown lists
 * @button Text for button used by uploader
 * @active Text used for plugin that has to be installed
 * @activate Text used for installed plugin
 * @installed Text used for activated plugin
 * @url url param for the plugin download
 * @settings url param for settings page
 * @width option 'full' sets up full width option
 */

function responsive_pro_options( $options ) {
	// remove theme elements' options
	unset( $options['theme_elements'] );
	$options_home_page[] = array(
		 'title'       => __( 'Featured Area Layouts', 'responsive' ),
		 'subtitle'    => '',
		 'heading'     => '',
		 'id'          => 'featured_area_layout',
		 'type'        => 'select',
		 'options'     => responsive_get_valid_featured_area_layouts()
	);
	$options['home_page'] = array_merge( $options['home_page'], $options_home_page );
	$new_options = array(
		'personalize' => array(
			array(
				'title'       => __( 'Favicon', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'upload',
				'id'          => 'favicon',
				'description' => __( 'maximum width and height 32px', 'responsive' ),
				'placeholder' => '',
				'button'      => __( 'Upload', 'responsive' )
			),
			array(
				'title'       => __( 'Apple Touch Icon', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'upload',
				'id'          => 'apple_touch_icon',
				'description' => '',
				'placeholder' => '',
				'button'      => __( 'Upload', 'responsive' )
			),
			array(
				'title'       => __( 'Disable breadcrumb list?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'breadcrumb',
				'description' => __( 'check to disable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Enable minified css?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'minified_css',
				'description' => __( 'check to enable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Disable Call to Action Button?', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'cta_button',
				'description' => __( 'check to disable', 'responsive' ),
				'placeholder' => ''
			),
			array(
				'title'       => __( 'Custom mobile menu title', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'custom_mobile_menu_title',
				'description' => __( 'Enter a custom mobile menu title', 'responsive' ),
				'placeholder' => ''
			),
		),
		'templates'   => array(
			array(
				'title'       => __( 'Excerpt Text', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'excerpts_text',
				'description' => '',
				'placeholder' => __( 'Read More...', 'responsive' )
			),
			array(
				'title'       => __( 'Excerpt Length', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'excerpts_length',
				'description' => '',
				'placeholder' => __( '50', 'responsive' )
			),
			array(
				'title'       => '<strong>' . __( 'Page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'    => __( 'Default Static Page Layout', 'responsive' ),
				'subtitle' => '',
				'heading'  => '',
				'type'     => 'select',
				'id'       => 'static_page_layout_default',
				'options'  => Responsive_Options::valid_layouts()
			),
			array(
				'title'       => '<strong>' . __( 'Blog Post Page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'    => __( 'Default Blog Posts Index Layout', 'responsive' ),
				'subtitle' => '',
				'heading'  => '',
				'type'     => 'select',
				'id'       => 'blog_posts_index_layout_default',
				'options'  => Responsive_Options::valid_layouts()
			),
			array(
				'title'       => __( 'Blog Title Toggle', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_post_title_toggle',
				'description' => ''
			),
			array(
				'title'       => __( 'Title Text', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => 'blog_post_title_text',
				'description' => '',
				'placeholder' => __( 'Blog', 'responsive' )
			),
			array(
				'title'       => __( 'Post Excerpts', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_post_excerpts',
				'description' => ''
			),
			array(
				'title'       => __( 'Featured Images', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_featured_images',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Author', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_byline_author',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Categories', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_byline_categories',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Date', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_byline_date',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Comments', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_byline_comments',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Tags', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'blog_byline_tags',
				'description' => ''
			),
			array(
				'title'       => '<strong>' . __( 'Single post page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'    => __( 'Default Single Blog Post Layout', 'responsive' ),
				'subtitle' => '',
				'heading'  => '',
				'type'     => 'select',
				'id'       => 'single_post_layout_default',
				'options'  => Responsive_Options::valid_layouts()
			),
			array(
				'title'       => __( 'Featured Images', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_featured_images',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Author', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_byline_author',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Categories', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_byline_categories',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Date', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_byline_date',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Comments', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_byline_comments',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Tags', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'single_byline_tags',
				'description' => ''
			),
			array(
				'title'       => '<strong>' . __( 'Archive page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Excerpts', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_post_excerpts',
				'description' => ''
			),
			array(
				'title'       => __( 'Featured Images', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_featured_images',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Author', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_byline_author',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Categories', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_byline_categories',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Date', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_byline_date',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Comments', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_byline_comments',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Byline Tags', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'archive_byline_tags',
				'description' => ''
			),
			array(
				'title'       => '<strong>' . __( 'Search Page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'       => __( 'Post Excerpts', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'checkbox',
				'id'          => 'search_post_excerpts',
				'description' => ''
			),
			array(
				'title'       => '<strong>' . __( '404 Page:', 'responsive' ) . '</strong>',
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'description',
				'id'          => '',
				'description' => ''
			),
			array(
				'title'       => __( '404 Title', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => '404_title',
				'description' => '',
				'placeholder' => __( '404 Error', 'responsive' )
			),
			array(
				'title'       => __( '404 Content', 'responsive' ),
				'subtitle'    => '',
				'heading'     => '',
				'type'        => 'text',
				'id'          => '404_content',
				'description' => '',
				'placeholder' => __( 'Sorry, no content found', 'responsive' )
			)

		),
		'plugins'     => array(
			array(
				'title'         => '',
				'subtitle'      => '',
				'active'        => __( 'Events Plugin Settings', 'responsive' ),
				'activate'      => __( 'Please activate The Events Calendar plugin', 'responsive' ),
				'install'       => __( 'Install Events Calendar Plugin', 'responsive' ),
				'type'          => 'plugins',
				'id'            => 'the-events-calendar',
				'url'           => 'the-events-calendar/the-events-calendar.php',
				'settings_page' => 'edit.php?post_type=tribe_events&page=tribe-events-calendar',
				'width'         => 'full'
			),
			array(
				'title'         => '',
				'subtitle'      => '',
				'active'        => __( 'WooCommerce Settings', 'responsive' ),
				'activate'      => __( 'Please activate WooCommerce plugin', 'responsive' ),
				'install'       => __( 'Install WooCommerce Plugin', 'responsive' ),
				'type'          => 'plugins',
				'id'            => 'woocommerce',
				'url'           => 'woocommerce/woocommerce.php',
				'settings_page' => 'admin.php?page=woocommerce_settings',
				'width'         => 'full'
			),
			array(
				'title'         => '',
				'subtitle'      => '',
				'active'        => __( 'BBPress Settings', 'responsive' ),
				'activate'      => __( 'Please activate BBPress plugin', 'responsive' ),
				'install'       => __( 'Install BBPress Plugin', 'responsive' ),
				'type'          => 'plugins',
				'id'            => 'bbpress',
				'url'           => 'bbpress/bbpress.php',
				'settings_page' => 'options-general.php?page=bbpress',
				'width'         => 'full'
			),
			array(
				'title'         => '',
				'subtitle'      => '',
				'active'        => __( 'Digital Downloads Settings', 'responsive' ),
				'activate'      => __( 'Please activate Easy Digital Downloads plugin', 'responsive' ),
				'install'       => __( 'Install Easy Digital Downloads Plugin', 'responsive' ),
				'type'          => 'plugins',
				'id'            => 'easy-digital-downloads',
				'url'           => 'easy-digital-downloads/easy-digital-downloads.php',
				'settings_page' => 'edit.php?post_type=download&page=edd-settings',
				'width'         => 'full'
			),

		)

	);

	$new_options = array_merge( $new_options, $options );

	return $new_options;
}

add_filter( 'responsive_options_filter', 'responsive_pro_options' );

/**
 * Hooks into core options validation to add validation needed for new pro options
 *
 * @param $input array
 *
 * @return mixed array
 */
function responsive_pro_options_validate_hook( $input ) {
	// checkbox value is either 0 or 1
	foreach( array(
				 'blog_post_excerpts',
				 'blog_featured_images',
				 'blog_byline_author',
				 'blog_byline_categories',
				 'blog_byline_date',
				 'blog_byline_comments',
				 'blog_byline_tags',
				 'single_featured_images',
				 'single_byline_author',
				 'single_byline_categories',
				 'single_byline_date',
				 'single_byline_comments',
				 'single_byline_tags',
				 'archive_post_excerpts',
				 'archive_featured_images',
				 'archive_byline_author',
				 'archive_byline_categories',
				 'archive_byline_date',
				 'archive_byline_comments',
				 'archive_byline_tags',
				 'search_post_excerpts'
			 ) as $checkbox ) {
		if( !isset( $input[$checkbox] ) ) {
			$input[$checkbox] = null;
		}
		$input[$checkbox] = ( $input[$checkbox] == 1 ? 1 : 0 );
	}

	foreach( array('featured_area_layout', ) as $layout ) {
			$input[$layout] = ( isset( $input[$layout] ) && array_key_exists( $input[$layout], responsive_get_valid_featured_area_layouts() ) ? $input[$layout] : $responsive_options[$layout] );
	}

	return $input;
}

add_filter( 'responsive_options_validate', 'responsive_pro_options_validate_hook', 10, 1 );
