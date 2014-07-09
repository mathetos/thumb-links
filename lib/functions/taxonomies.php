<?php
/**
 * Taxonomies
 *
 * This file registers any custom taxonomies
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


/**
 * Create Location Taxonomy
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function be_register_location_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Slide Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Slide Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Slide Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'text_domain' ),
		'search_items'               => __( 'Search Slide Categories', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Slide Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => '',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'slide_cat_tax', 'featured', $args );

}
add_action( 'init', 'be_register_location_taxonomy' );

// REGISTER GALLERY TAXONOMY
function tracyw_gallery() {

	$labels = array(
		'name'                       => _x( 'Galleries', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Gallery', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Gallery', 'text_domain' ),
		'all_items'                  => __( 'All Galleries', 'text_domain' ),
		'parent_item'                => __( 'Parent Gallery', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Gallery:', 'text_domain' ),
		'new_item_name'              => __( 'New Gallery', 'text_domain' ),
		'add_new_item'               => __( 'Add New Gallery', 'text_domain' ),
		'edit_item'                  => __( 'Edit Gallery', 'text_domain' ),
		'update_item'                => __( 'Update Gallery', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Galleries with commas', 'text_domain' ),
		'search_items'               => __( 'Search Galleries', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Galleries', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Galleries', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'gallery',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'gallery', 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'tracyw_gallery', 0 );