<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Rotator post type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

// FEATURED SLIDER CUSTOM POST TYPE
function thumb_link_cpt() {

	$labels = array(
		'name'                => _x( 'Thumb Links', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Thumb Link', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Thumb Links', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Thumb Link', 'text_domain' ),
		'all_items'           => __( 'All Thumb Links', 'text_domain' ),
		'view_item'           => __( 'View Thumb Link', 'text_domain' ),
		'add_new_item'        => __( 'Add New Thumb Link', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Thumb Link', 'text_domain' ),
		'update_item'         => __( 'Update Thumb Link', 'text_domain' ),
		'search_items'        => __( 'Search for Thumb Links', 'text_domain' ),
		'not_found'           => __( 'No Thumb Links found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Thumb Links found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'thumblink',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'thumblink', 'text_domain' ),
		'description'         => __( 'Thumbnail for featured links on homepage', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		//'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'thumblink', $args );
}

// Hook into the 'init' action
add_action( 'init', 'thumb_link_cpt', 0 );