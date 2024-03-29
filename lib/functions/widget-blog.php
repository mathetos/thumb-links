<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Custom Blog Widget
	Plugin URI: http://www.annadesign.com
	Description: A widget that allows the display latest posts.
	Version: 1.0
	Author: anna Design
	Author URI: http://www.annadesign.com

-----------------------------------------------------------------------------------*/

// Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'anna_blogpost_widgets' );


// Register widget.
function anna_blogpost_widgets() {
	register_widget( 'anna_blogpost_Widget' );
}

// Widget class.
class anna_blogpost_Widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function anna_blogpost_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'anna_blogpost_Widget', 'description' => __('A widget that displays your latest blog posts.', 'anna') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anna_blogpost_Widget' );

		/* Create the widget. */
		$this->WP_Widget( 'anna_blogpost_Widget', __('Anna Blog Post Widget', 'anna'), $widget_ops, $control_ops );
	}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$number = $instance['number'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
<?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

  <?php 
                    $query = new WP_Query();
                    $query->query('posts_per_page='.$number.'&ignore_sticky_posts=1');
                    ?>
  <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
 <h2 class="box2"><a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
          </a></h2>
        <?php echo content(70); ?>
  <?php endwhile; endif; ?>
<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		/* No need to strip tags for.. */

		return $instance;
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		
		'number' => 1
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">
    <?php _e('Title:', 'anna') ?>
  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<!-- Widget Title: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id( 'number' ); ?>">
    <?php _e('Amount to show:', 'anna') ?>
  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
</p>
<?php
	}
}
