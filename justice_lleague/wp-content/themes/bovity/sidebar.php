<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bovity
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>
<div class="col-lg-4">
	<div class="blog-dtls-side">
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	</div>
</div>