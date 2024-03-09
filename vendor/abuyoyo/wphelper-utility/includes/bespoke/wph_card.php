<?php

if ( ! function_exists( 'wph_card' ) ):
/**
 * Print WordPress dashboard "card"
 * 
 * Print HTML div tag with "card" class or return HTML as string.
 * 
 * @package WPHelper\Utility
 * 
 * @param string $content            Card content wrapped in paragraph tag.
 * @param string (optional) $title   Title wrapped in h3 heading tag.
 * @param string (optional) $classes Additional HTML classes string.
 * @param bool   (optional) $echo    If true print card directly. If false return string (default: true)
 * 
 * @return void|string
 */
function wph_card( $content, $title='', $classes='', $echo=true){
	$content = sprintf(
		'<div class="card %3$s">%1$s<p>%2$s</div>',
		$title
			? sprintf('<h3>%s</h3>', $title)
			: '',
		$content,
		$classes
	);
	if ($echo) {
		echo $content;
	} else {
		return $content;
	}
}
endif;