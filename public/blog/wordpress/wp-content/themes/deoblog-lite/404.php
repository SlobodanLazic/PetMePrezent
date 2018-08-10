<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Deoblog lite
 */

get_header();
?>

  <!-- Page Title -->
  <section class="page-title text-center">
    <h1 class="page-title-title"><?php _e('404 Page not found', 'deoblog-lite') ?></h1>
  </section>

  <section class="section-wrap blog page-404 pb-50">
    <div class="container">
      <div class="row">
      
        <div class="blog-content mb-50 col-lg-8 sidebar-on blog__content--left">
            
          <h2><?php _e('Don\'t fret! Let\'s get you back on track. Perhaps searching can help', 'deoblog-lite') ?></h2>
          <?php get_search_form(); ?>

        </div><!-- .blog-content -->


        <!-- Sidebar -->
        <?php deoblog_lite_sidebar(); ?>      

        
      </div>
    </div>
  </section>

<?php get_footer(); ?>
