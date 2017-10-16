<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery">
		<?php the_post_thumbnail('thevoux-single'); ?>
	</figure>
<?php } else { ?>
	<p class="text-center"><strong><?php _e('Please select a featured image for your post', 'thevoux'); ?></strong></p>
<?php } ?>