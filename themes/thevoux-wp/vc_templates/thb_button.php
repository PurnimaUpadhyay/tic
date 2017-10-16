<?php function thb_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'color'      => '',
       	'target_blank' => false,
       	'link'       => '#',
       	'rounded'      => '',
       	'size'			 => 'small',
       	'style'       => false,
       	'icon'			 => false,
       	'animation'	 => false,
       	'caption'		 => ''
    ), $atts));
	
	if($icon) { $caption = '<span class="icon"><i class="fa '.$icon.'"></i></span> '.$caption; }
	
	$out = '<a class="btn '.$color.' '.$size.' '.$animation.' '.$style.' '.$rounded.'" href="'.$link.'" ' . ($target_blank ? ' target="_blank"' : '') .' role="button">' .$caption. '</a>';
  
  return $out;
}
add_shortcode('thb_button', 'thb_button');
