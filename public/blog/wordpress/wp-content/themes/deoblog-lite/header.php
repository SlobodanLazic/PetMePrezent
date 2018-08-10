<?php
/**
 * The header for our theme.
 *
 * @package Deoblog
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>  
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <main class="main-wrapper oh">

    <!-- Navigation -->
    <header class="nav nav-dark">
    
      <div class="nav-holder" <?php if( get_theme_mod('deoblog_lite_sticky_nav_settings', true) ) : ?> id="sticky-nav" <?php endif; ?> >
        <div class="container relative">
          <div class="flex-parent">

            <form role="search" method="get" class="nav-search-wrap" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="search" class="nav-search-input" placeholder="<?php echo esc_attr_x( 'Type &amp; Hit Enter', 'placeholder', 'deoblog-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
              <i class="ui-close nav-search-close" id="nav-search-close"></i>
            </form>

            <div class="nav-header clearfix">
              <!-- Logo -->
              <div class="logo-wrap">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <?php if( get_theme_mod( 'deoblog_lite_logo' ) ) : ?>
                    <img src="<?php echo esc_attr( get_theme_mod( 'deoblog_lite_logo' ) ); ?>" class="logo logo-light" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
                    <h1 class="hide"><?php bloginfo( 'name' ) ?></h1>
                  <?php else : ?>
                    <h1 class="white mb-0"><?php bloginfo( 'name' ) ?></h1>
                  <?php endif; ?>
                </a>
              </div>
              <button type="button" class="nav-icon-toggle" id="nav-icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'deoblog-lite' ) ?></span>
                <span class="nav-icon-toggle-bar"></span>
                <span class="nav-icon-toggle-bar"></span>
                <span class="nav-icon-toggle-bar"></span>
              </button>
            </div> <!-- end nav-header -->

            <nav id="navbar-collapse" class="nav-wrap nav-align-right collapse navbar-collapse">

              <?php
                if (has_nav_menu('primary')) {
                  wp_nav_menu( array(
                    
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'container_class' => 'nav-wrap nav-align-right collapse navbar-collapse',
                    'container_id'    => 'navbar-collapse',
                    'menu_class'      => 'nav-menu',
                    'walker'          => new Deo_Walker_Nav_Menu()
                    
                  ) );
                }
              ?>

              <!-- Search -->
              <div class="nav-right hidden-sm hidden-xs">
                <div class="nav-search hidden-sm hidden-xs">
                  <a href="#" class="nav-search-link" id="nav-search-trigger">
                    <i class="ui-search"></i>
                  </a>
                </div>
              </div>


              <form role="search" method="get" class="nav-search-wrap" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" class="nav-search-input" placeholder="<?php echo esc_attr_x( 'Type &amp; Hit Enter', 'placeholder', 'deoblog-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <i class="ui-close nav-search-close" id="nav-search-close"></i>
              </form>


              <form method="get" class="nav-search-mobile hidden-lg hidden-md" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" placeholder="<?php echo esc_attr__( 'Search...', 'deoblog-lite' ); ?>" class="nav-search-mobile-input" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="nav-search-mobile-button">
                  <i class="ui-search"></i>
                </button>
              </form>

            </nav>
        
          </div> <!-- end row -->
        </div> <!-- end container -->
      </div> <!-- end nav-holder -->
    </header> <!-- end navigation -->