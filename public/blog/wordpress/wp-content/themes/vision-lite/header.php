 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Vision Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header-top">
  <div class="head-top-inner">
	    <div class="logo">
           <?php vision_lite_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo $description; ?></p>
					<?php endif; ?>
      </div><!-- logo -->         
     <div class="toggle">
            <a class="toggleMenu" href="#">
                <?php _e('Menu','vision-lite'); ?>                
            </a>
    	</div><!-- toggle -->    
    <div class="sitenav">                   
   	 	<?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
    </div><!--.sitenav -->
     
     <div class="clear"></div>
  </div><!-- head-top-inner -->
 </div><!--end header-top--> 
<div class="clear"></div>
<div id="header">
	<div class="header-inner">
               
      
 <div class="clear"></div>
</div><!-- .header-inner-->


</div><!-- .header -->