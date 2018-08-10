<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G_Blog
 */
global $g_blog_theme_options;
$g_blog_theme_options    = g_blog_get_theme_options();
$category_name          = $g_blog_theme_options['g-blog-feature-cat'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="boxed">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'g-blog' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
<div class="nav-social-icon mobile-view">
	<div class="container">
					<div class="top-right">
						<div class="social-links top-header-social">
							<?php  
								if(  has_nav_menu( 'social' ) ){
							        wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu' ) ); 
								} 
							?>
						</div>
					</div>
				</div>
			</div>

		<nav id="site-navigation" class="main-navigation navbar clearfix" role="navigation">
			<div class="container">
				<div class="menu-wrapper  clearfix">
				<div class="g-blog-logo">
					<div class="logo-center g-blog-img">		
						<?php the_custom_logo();?>
					</div>		 
					 
			<?php if( !has_custom_logo()):?>
					<div class="g-blog-logo-text ">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>
        	<?php endif; ?>

			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only"><?php esc_html_e('Toggle navigation','g-blog') ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-right">

<div class="nav-social-icon desktop-view">
<div class="top-right">
						<div class="social-links top-header-social">
							<?php  
								if(  has_nav_menu( 'social' ) ){
							        wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu' ) ); 
								} 
							?>
						</div>
					</div>
</div>
				<div class="header-nav">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php 
						if (has_nav_menu('primary')) {
							//wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','fallback_cb'    => 'wp_page_menu', ) );
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_id'        => 'primary-menu',
                                     'walker'        => '',
                                    'fallback_cb'    => 'wp_page_menu',
                                ) );

						}
						?>
					</div><!-- /.navbar-collapse -->

					
				</div>
			</div>
		</div>
	</div>
	</nav>

</header><!-- #masthead -->
	<?php if($category_name > 0 && is_front_page() && is_home() ){ ?>

	<section  class="owl-wrapper clearfix">
		
			<div id="featured-slider">
				<?php g_blog_slider_images_selection(); ?>	
			</div>
		
	</section>

	<?php } ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">