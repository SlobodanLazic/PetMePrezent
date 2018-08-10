<?php
/**
 * The template for displaying archive pages.
 *
 * @package Deoblog lite
 */

get_header();
?>
    
  <!-- Page Title -->
  <section class="page-title text-center">
    <h1 class="page-title-title">
      <?php
        if ( is_category() ) :
          single_cat_title();

        elseif ( is_tag() ) :
          single_tag_title();

        elseif ( is_author() ) :
          printf( __( 'Author: %s', 'deoblog-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );

        elseif ( is_day() ) :
          printf( __( 'Day: %s', 'deoblog-lite' ), '<span>' . get_the_date() . '</span>' );

        elseif ( is_month() ) :
          printf( __( 'Month: %s', 'deoblog-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'deoblog-lite' ) ) . '</span>' );

        elseif ( is_year() ) :
          printf( __( 'Year: %s', 'deoblog-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'deoblog-lite' ) ) . '</span>' );

        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
          _e( 'Asides', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
          _e( 'Galleries', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
          _e( 'Images', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
          _e( 'Videos', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
          _e( 'Quotes', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
          _e( 'Links', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
          _e( 'Statuses', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
          _e( 'Audios', 'deoblog-lite' );

        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
          _e( 'Chats', 'deoblog-lite' );

        else :
          _e( 'Archives', 'deoblog-lite' );

        endif;
      ?>
      
      <?php
      // Show an optional term description.
      $term_description = term_description();
      if ( ! empty( $term_description ) ) :
        printf( '<small class="taxonomy-description">%s</small>', $term_description );
      endif;
    ?>
    </h1>
  </section> <!-- .page title -->


  <section class="section-wrap blog pb-50">
    <div class="container">
      <div class="row">

        <!-- Content -->
        <div class="blog-content mb-50 col-lg-8 sidebar-on blog__content--left">

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
          <?php endwhile; ?>  
          <?php else : ?>  
            <?php get_template_part( 'template-parts/content', 'none' ); ?>  
          <?php endif; ?>

          <!-- Pagination -->
          <?php the_posts_pagination( array(
            'prev_text' => __('<i class="ui-angle-left"></i>', 'deoblog-lite'),
            'next_text' => __('<i class="ui-angle-right"></i>', 'deoblog-lite')
          )); ?>

        </div><!-- .blog-content -->

        <?php
          // Sidebar
          deoblog_lite_sidebar();
        ?>

      
      </div>
    </div>
  </section>

<?php get_footer();  ?>