<?php
/**
 * The template for displaying search results pages.
 *
 * @package Deoblog lite
 */

get_header();
?>
  
  <!-- Page Title -->
  <section class="page-title text-center">
    <h1 class="page-title-title"><?php printf( __( 'Search Results for: %s', 'deoblog-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
  </section>


  <section class="section-wrap blog search-page pb-50">
    <div class="container">
      <div class="row">

        <!-- Content -->
        <div class="blog-content mb-50 col-lg-8 sidebar-on blog__content--left">

          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>      
              <?php
                get_template_part( 'template-parts/content', 'search' );
              ?>      
            <?php endwhile; ?>
      
            <!-- Pagination -->
            <?php the_posts_pagination( array(
              'prev_text' => __('<i class="ui-angle-left"></i>', 'deoblog-lite'),
              'next_text' => __('<i class="ui-angle-right"></i>', 'deoblog-lite')
            )); ?>
                  
          <?php else : ?>      
            <?php get_template_part( 'template-parts/content', 'none' ); ?>      
          <?php endif; ?>      
        </div><!-- .blog-content -->

        <?php
          // Sidebar
          deoblog_lite_sidebar();
        ?>
      
      </div>
    </div>
  </section>

<?php get_footer(); ?>
