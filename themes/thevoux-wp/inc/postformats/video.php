<?php global $wp_embed; ?>
<?php 
	$id = get_the_ID();
	$embed = get_post_meta($id , 'post_video', TRUE);
	$vimeo = get_post_meta($id , 'post_video_vimeo', TRUE); 
?>
<div class="video-container">
<?php if ($embed !='') { ?>
  <?php echo $wp_embed->run_shortcode('[embed]'.$embed.'[/embed]'); ?>
<?php } ?>
</div>