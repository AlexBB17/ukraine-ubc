<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dream
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

    	<?php get_sidebar( 'footer' ); ?>
        
		<div class="site-info">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">

    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
    </div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    
    <div id="back_top"><i class="fa fa-angle-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>