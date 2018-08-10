<?php
/**
 * Page Contact
 *
 * @package Deoblog lite
 * @since   Deoblog 1.0.0
 */

get_header(); ?>


<!-- Contact -->
<section class="section-wrap contact-page">
  <div class="container">
    <div class="row">      

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php
          // Comments
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        ?>
      <?php endwhile; endif; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>