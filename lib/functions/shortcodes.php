<?php
/**
 * Shortcodes
 *
 * This file registers any presentational shortcodes
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

function anna_featured($atts) {
		$defaults = array(
                "name" => 'name',
				"posts_per_page" => 'posts'
        );
		
        $atts = shortcode_atts($defaults, $atts);

	ob_start();
	// Code	?>
	<?php
	//WordPress loop for custom post type
	 $my_query = new WP_Query('post_type=thumblink&posts_per_page=' . $atts['posts'] .'&name=' . $atts['name']);
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="featured grid_item">
				<?php 	
						$button = get_post_meta(get_the_ID(), 'thumb-button-text', true);
						$url = get_post_meta(get_the_ID(), 'thumb-button-url', true);
						$openinfoo = get_post_meta(get_the_ID(), 'open-w-foobox', true);
						
				?>
				<a href="<?php echo $url ?>" title="<?php echo $button; ?>" <?php 
				if ($openinfoo == 'foobox') {
				echo 'target="' .$openinfoo . '" data-width="600" data-height="400"';
				}
				?>>
				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('featured', $atts);
						} 
				?>
				<h3><?php echo $button ?></h3>	
				</a>
			</div>
		<?php endwhile;  wp_reset_query(); ?>
	<?php
	
	$output_string=ob_get_contents();
	ob_end_clean();
	return $output_string;
	
}
add_shortcode( 'featured', 'anna_featured' );