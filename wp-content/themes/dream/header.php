<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dream
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
	<style type="text/css">
		body.custom-background {
			background-size: 100% auto;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dream' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

		<?php
        if( ( of_get_option( 'dream_show_header_logo_text', 'text_only' ) == 'both' || of_get_option( 'dream_show_header_logo_text', 'text_only' ) == 'logo_only' ) && of_get_option( 'dream_header_logo_image', '' ) != '' ) {
        ?>
            <div class="header-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url(of_get_option( 'dream_header_logo_image', '' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            </div><!-- #header-logo-image -->
        <?php
        }

        if( of_get_option( 'dream_show_header_logo_text', 'text_only' ) == 'both' || of_get_option( 'dream_show_header_logo_text', 'text_only' ) == 'text_only' ) {
        ?>
        	<div class="header-text">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        	</div>
        <?php
        }
        ?>
            <div class="clear"></div>
		</div><!-- .site-branding -->


	</header><!-- #masthead -->

    <nav id="site-navigation" class="main-navigation <?php if((is_home())or(is_single())or(is_search())or(is_archive())){echo 'mr';}?>" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Menu', 'dream' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>

        <div class="clear"></div>
        <div class="nav-foot"></div>
    </nav><!-- #site-navigation -->

<?php
if( of_get_option( 'dream_activate_slider', '0' ) == '1' ) {
	if ( is_front_page() ) {
?>
		<div class="site-slider"><div class="inner">
<?php
		dream_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>

	<div id="content" class="site-content">