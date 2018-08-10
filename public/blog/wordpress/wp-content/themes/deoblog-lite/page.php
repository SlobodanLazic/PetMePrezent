<?php
/**
 * Default Page Template
 *
 * @package Deoblog lite
 * @since   Deoblog 1.0.0
 */

get_header(); ?>


<!-- Page Title -->
<section class="page-title <?php if( has_post_thumbnail() ) : ?>bg-img bg-overlay<?php endif; ?> text-center" <?php if( has_post_thumbnail() ) : ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php endif; ?> >
  <div class="container">
    <div class="page-title-holder">
      <div class="page-title-inner">
        <h1 class="page-title-title"><?php the_title(); ?></h1>
      </div>            
    </div>
  </div>
</section> <!-- .page title -->


<!-- Page -->
<section class="section-wrap section-page">
  <div class="container">
    <div class="row entry-article">      

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="col-md-12">
          
          <?php the_content(); ?>

        </div> <!-- end col -->

      <?php endwhile; endif; ?>

    </div> <!-- .row -->
  

    <?php
      // If comments are open or we have at least one comment, load up the comment template
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>

  </div>
</section>

<?php get_footer(); ?>