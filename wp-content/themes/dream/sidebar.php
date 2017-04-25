<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dream
 */

if ( ! is_active_sidebar( 'dream_right_sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'dream_right_sidebar' ); ?>
</div><!-- #secondary -->
