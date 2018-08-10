<?php
/**
 * The main template file.
 *
 * @package Deoblog
 * @since   Deoblog 1.0.0
 */

get_header(); ?>

<!-- Blog Layouts -->
<section class="section-wrap blog pb-50">
  <div class="container">
    <div class="row">

      <!-- Content -->
      <div class="blog-content mb-50 col-lg-8 sidebar-on blog__content--left">

        <!-- Standard Layout -->
        <?php get_template_part( 'template-parts/standard-layout' ); ?>

        <!-- Pagination -->
        <?php the_posts_pagination( array(
          'prev_text' => __('<i class="ui-angle-left"></i>', 'deoblog-lite'),
          'next_text' => __('<i class="ui-angle-right"></i>', 'deoblog-lite')
        )); ?>

      </div> <!-- .blog-content -->

      <?php
        // Sidebar
        deoblog_lite_sidebar();
      ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>