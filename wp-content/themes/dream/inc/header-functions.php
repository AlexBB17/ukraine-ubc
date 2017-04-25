<?php
if ( ! function_exists( 'dream_slider' ) ) :
/**
 * display featured post slider
 */
function dream_slider() { ?>
	<div class="slider-wrap">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$dream_slider_title = of_get_option( 'dream_slider_title'.$i , '' );
				$dream_slider_text = of_get_option( 'dream_slider_text'.$i , '' );
				$dream_slider_image = of_get_option( 'dream_slider_image'.$i , '' );
				$dream_slider_link = of_get_option( 'dream_slider_link'.$i , '#' );

				if( !empty( $dream_slider_image ) ) {
					if ( $i == 1 ) { $dream_classes = "slides displayblock"; } else { $dream_classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $dream_classes; ?>">
						<figure class="slider-image-wrap">
							<img alt="<?php echo esc_attr( $dream_slider_title ); ?>" src="<?php echo esc_url( $dream_slider_image ); ?>">
					    </figure>
					    <?php if( !empty( $dream_slider_title ) || !empty( $dream_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $dream_slider_title )  ) { ?>
							     			<span id="slider-title" class="clearfix"><a title="<?php echo esc_attr( $dream_slider_title ); ?>" href="<?php echo esc_url( $dream_slider_link ); ?>"><?php echo esc_html( $dream_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $dream_slider_text )  ) { ?>
							     			<span id="slider-content"><?php echo esc_html( $dream_slider_text ); ?></span>
							     		<?php } ?>
							     	</div>
							    </div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers -->
	</div><!-- .slider-cycle -->
<?php
}
endif;

?>