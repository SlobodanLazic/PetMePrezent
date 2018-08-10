<?php

// Categories dropdown
function deoblog_lite_categories_dropdown() {

  $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
  ) );

  $categories_dropdown = array( '0' => esc_html__( 'All categories', 'deoblog-lite' ) );
  if ( ! is_wp_error( $categories ) ) {
    foreach ( $categories as $key => $category ) {
      $categories_dropdown[$category->term_id] = $category->name;
    }
  }

  return $categories_dropdown;
}


/**
 * Post date meta
 */

function deoblog_lite_meta_date() {
  $posted_on = get_the_date();
  $output = '';  

  if ( 'post' == get_post_type() ) :
    $output .= sprintf('<span>%s</span>', $posted_on);
  endif;

  return $output;
}

/**
 * Post comments meta
 */

function deoblog_lite_meta_comments() {
  $comments_num = get_comments_number();
  $output = '';

  if ( comments_open() ) {
    if( $comments_num == 0 ) {
      $comments = esc_html__( '0 Comments', 'deoblog-lite' );
    } elseif ( $comments_num > 1 ) {
      $comments = $comments_num . esc_html__(' Comments', 'deoblog-lite');
    } else {
      $comments = esc_html__('1 Comment', 'deoblog-lite');
    }
    $comments = sprintf('<a href="%1$s">%2$s</a>', get_comments_link(), $comments );
  } else {
    $comments = esc_html__('Comments are closed', 'deoblog-lite');
  }

  if ( 'post' == get_post_type() ) :
    $output .= $comments;
  endif;

  return $output;
}


/**
 * Post category
 */

function deoblog_lite_meta_category() {
  $categories = get_the_category();
  $separator = ', ';
  $categories_output = '';
  $output = '';

  if ( !empty($categories) ):    
    foreach( $categories as $index => $category ):
      if ($index > 0) : $categories_output .= $separator; endif;
      $categories_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="entry-category">' . esc_html( $category->name ) . '</a>';
    endforeach;
  endif;

  if ( 'post' == get_post_type() ) :
    $output .= $categories_output;
  endif;

  return $output;

}


/**
* Post Formats
**/

function deoblog_lite_get_attachment(){

  global $post;
  $pattern = get_shortcode_regex();  
  $output = '';

  if( preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
    && array_key_exists( 2, $matches )
    && in_array( 'gallery', $matches[2] ) ):

    $keys = array_keys( $matches[2], 'gallery' );

    foreach( $keys as $key ):
      $atts = shortcode_parse_atts( $matches[3][0] );
      if( array_key_exists( 'ids', $atts ) ):

        $attachments = get_posts( array(
          'post_type' => 'attachment',
          'post_status' => 'inherit',
          'post__in' => explode( ',', $atts['ids'] ),
          'orderby' => 'post__in'
        ) );

      endif;
    endforeach;

    return $attachments;

    elseif( has_post_thumbnail() ):
      $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

  endif;
}



// Get Embedded Media
function deoblog_lite_get_embedded_media( $type = array() ) {
  $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
  $embed = get_media_embedded_in_content( $content, $type );

  if( in_array( 'audio', $type ) ):
    $output = str_replace('?visual=true', '?visual=false', $embed[0]);
  else: 
    $output = isset($embed[0]) ? $embed[0] : '';
  endif;
  return $output;
}




// Add responsive container to embeds
function deoblog_lite_embed_html( $html ) {
  return '<div class="embed-responsive embed-responsive-16by9 mb-30">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'deoblog_lite_embed_html', 10, 3 );
add_filter( 'videoblog_lite_embed_html', 'deoblog_lite_embed_html' ); // Jetpack



/**
 * Remove the output of the first gallery
 */
function deoblog_lite_remove_the_first_gallery( $output, $attr ) {
  global $post;

  if ( ! is_page() && get_post_format($post->ID) == 'gallery' ) {
    // Run only once
    remove_filter( current_filter(), __FUNCTION__ );

    // Override the first gallery output        
    return '<!-- gallery 1 was here -->';   // Must be non-empty.
  }
}

add_filter( 'post_gallery', 'deoblog_lite_remove_the_first_gallery', 10, 2 );



// Grab URL Post Format
function deoblog_lite_grab_url() {
  if (! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ) {
    return false;
  }
  return esc_url_raw( $links[1] );
}



/**
* Comments Pagination
**/

function deoblog_lite_comments_pagination() {

  if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

    ?>

    <nav class="comment-navigation clearfix" role="navigation">
      <h6 class="screen-reader-text"><?php _e( 'Comment navigation', 'deoblog-lite' ); ?></h6>
      <div class="nav-previous"><?php previous_comments_link( esc_html_e( '&larr; Older Comments', 'deoblog-lite' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( esc_html_e( 'Newer Comments &rarr;', 'deoblog-lite' ) ); ?></div>
    </nav><!-- #comment-nav-above -->

    <?php

  endif;
}




/**
 * Display navigation to next/previous post when applicable.
 */
if ( ! function_exists( 'deoblog_lite_post_nav' ) ) :

function deoblog_lite_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );
  $get_next_post = get_next_post();
  $get_previous_post = get_previous_post();

  if ( ! $next && ! $previous ) {
    return;
  }
  ?>
  <nav class="entry-navigation">
    <h5 class="screen-reader-text"><?php _e( 'Post navigation', 'deoblog-lite' ); ?></h5>
    <div class="clearfix">

      <?php if ( !empty( $get_next_post ) ) : ?>
        <div class="entry-navigation--left">
          <?php
            printf( '<i class="ui-angle-left"></i><span>%s</span>', esc_html__('Previous Post', 'deoblog-lite') );
            next_post_link( '<div class="entry-navigation__link">%link</div>', _x( '%title', 'Next post link', 'deoblog-lite' ) );
          ?>
        </div>
      <?php endif; ?>
      <?php if ( !empty( $get_previous_post ) ) : ?>
        <div class="entry-navigation--right">
          <?php
            printf( '<span>%s</span><i class="ui-angle-right"></i>', esc_html__('Next Post', 'deoblog-lite') );
            previous_post_link( '<div class="entry-navigation__link">%link</div>', _x( '%title', 'Previous post link', 'deoblog-lite' ) );  
          ?>        
        </div>
      <?php endif; ?>
    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;


/**
 * Sidebars
 */
    
function deoblog_lite_sidebar() {
  ?>
  <aside class="col-lg-4 sidebar sidebar--right">
    <?php get_sidebar(); ?>
  </aside>
  <?php
}


/**
 * Related Posts
 */

function deoblog_lite_related_posts() {

  printf('<h5 class="heading bottom-line bottom-line-full mb-30">%s</h5>', __('You Might Also Like', 'deoblog-lite') );

  $args = array(
    'post_type'=>'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'ignore_sticky_posts' => true,
    'meta_query' => array( 
      array(
        'key' => '_thumbnail_id'
      ) 
    ),
  );

  $related_posts_query = new WP_Query( $args ); ?>

  <div class="row">

  <?php while( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); ?>
    
    <div class="col-md-4">
    
      <?php if ( has_post_thumbnail() ) : ?>
        
        <!-- Post thumb -->
        <div class="entry-img-holder">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="hover-scale entry-img">
            <?php the_post_thumbnail(); ?>
          </a>
        </div>
      <?php endif; ?>

      <!-- Title -->
      <?php the_title( sprintf( '<h4 class="recent-posts-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

    </div> <!-- .col -->
    
  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  </div> <!-- .row -->

  <?php

}


/**
 * Tags Cloud Widget font size
 */

function deoblog_lite_tag_cloud_size( $args ) {

  $args['smallest'] = 10;
  $args['largest'] = 10;
  return $args;
}

add_filter('widget_tag_cloud_args', 'deoblog_lite_tag_cloud_size');