<?php
/**
 * Metaboxes
 *
 * This file registers any custom metaboxes
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Metaboxes
 * @since 1.0.0
 * @link http://www.billerickson.net/wordpress-metaboxes/
 */

function tl_metaboxes( $meta_boxes ) {
	
	$meta_boxes[] = array(
		'id' => 'link-content',
		'title' => 'Link Details',
		'pages' => array('thumblink'), 
		'context' => 'normal',
		'priority' => 'default',
		'show_names' => true, 
		'fields' => array(
			array(
				'name' => 'Link Text',
				'desc' => 'Insert the text of the "Call to Action" button here',
				'id' => 'thumb-button-text',
				'type' => 'text',	
			),
			array(
				'name' => 'Link URL',
				'desc' => 'Enter the URL of the page you want the button to link to.<br /><span style="color: red;"><b>NOTE: </b>Make sure to INCLUDE "http://".<br />Unless you want it to load in FooBox, then there needs to be a "#" and just give it a name (e.g. #testimonial).</span>',
				'id' => 'thumb-button-url',
				'type' => 'text'
			),
			array(
				'name' => 'Target FooBox',
				'desc' => 'Do you want this link to be opened in FooBox? <br /><span style="font-weight: 700; color: red;"><b>NOTE:</b> This does not apply to videos. Videos will open in FooBox automatically.</span>.',
				'id' => 'open-w-foobox',
				'type' => 'radio_inline',
				'options' => array(
					array('name' => 'No', 'value' => '_self'),
					array('name' => 'Yes', 'value' => 'foobox')
				)
			),
	)
	);
		
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes' , 'tl_metaboxes' );
 
 
/**
 * Initialize Metabox Class
 * @since 1.0.0
 * see /lib/metabox/example-functions.php for more information
 *
 */
  
function tl_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) 
		require_once( TL_PATH . 'lib/metabox/init.php' );
}
add_action( 'init', 'tl_initialize_cmb_meta_boxes', 9999 );