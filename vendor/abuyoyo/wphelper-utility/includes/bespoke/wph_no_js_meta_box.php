<?php

if ( ! function_exists( 'wph_no_js_meta_box' ) ):
/**
 * Collapsible meta-box without js (HTML only).
 * 
 * Prints collapsible meta-box using inline style and input+label tags.
 * No Javascript. Just HTML. Ugly but reliable.
 * 
 * @package WPHelper\Utility
 * 
 * @param string            $content Meta-box contents.
 * @param string            $title   Meta-box title.
 * @param (optional) string $id      Must be unique. If none provided, unique id will be auto-generated.
 */
function wph_no_js_meta_box( $content, $title, $id='' ){
	
	if ( empty($id) ) {
		$id = sanitize_key($title) . '_' . rand();
	}
	?>
	<style>
		<?php echo "#{$id}-box"; ?> .postbox-header label {
			width: 100%;
		}
		<?php echo "#{$id}-box"; ?> .postbox-header + .inside {
			max-height: 50vh;
			overflow-y: scroll;
		}
		<?php echo "#{$id}-box"; ?> .postbox-header:has( input:checked ) + .inside {
			display: none;
		}
	</style>
	<div id="<?php echo "{$id}-box"; ?>" class="postbox">
		<div class="postbox-header">
			<label for="<?php echo $id ?>">
				<h2><?php echo $title ?></h2>
			</label>
			<input type="checkbox" id="<?php echo $id ?>" checked="checked" />
		</div>
		<div class="inside"><?php echo $content ?></div>
	</div>
	<?php
}
endif;