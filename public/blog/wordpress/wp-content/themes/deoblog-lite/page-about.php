<?php
/**
 * Page About
 *
 * @package Deoblog lite
 * @since   Deoblog 1.0.0
 */

get_header(); ?>


<!-- About -->
<section class="section-wrap about-page">
  <div class="container">
    <div class="row entry-article">      

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="col-md-12 mb-60">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full', array('class' => 'img-full-width') ); ?>          
          <?php endif; ?>
        </div> <!-- end img -->

        <div class="col-md-8 col-md-offset-2">
          
          <?php the_content(); ?>

          <?php
            // Comments
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        </div> <!-- end col -->

      <?php endwhile; endif; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>