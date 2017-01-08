<?php

// Shortcode [bootscore_wp icon_class="target" title="Design for Humans" des="Sed ut perspiciatis unde lorems ipsum the natus errorm."] support
function bootscore_wp_shortcode($atts, $content=null){
	extract( $atts = shortcode_atts(
		array(
			'icon_class' 			=> '',
			'title' 			=> '',
			'des' 			=> '',
			), $atts, 'bootscore_wp' ) );
	ob_start();
?>
<div class="col-md-6">
	<div class="banner-item">
		<div class="icon">
			<i class="icon-basic-<?php echo $icon_class; ?>"></i>
		</div>

		<div class="content">
			<h4><?php echo $title; ?></h4>
			<p><?php echo $des; ?></p>
		</div>
	</div>
</div>

<?php
	return ob_get_clean();
}
add_shortcode('bootscore_wp', 'bootscore_wp_shortcode');