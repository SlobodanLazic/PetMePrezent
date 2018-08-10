<?php
/**
 * The template for displaying all single posts.
 *
 * @package Deoblog
 */

get_header(); ?>
  
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Page Title -->
    <section class="page-title <?php if( has_post_thumbnail() ) : ?>bg-img bg-overlay<?php endif; ?> text-center" <?php if( has_post_thumbnail() ) : ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php endif; ?> >
      <div class="container">
        <div class="page-title-holder">
          <div class="page-title-inner">

            <?php if( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('full', array('class' => 'hide')); ?>
            <?php endif; ?>

            <!-- Meta -->    
            <ul class="entry-meta">
              <?php if( get_theme_mod( 'deoblog_lite_meta_date_settings', true ) ) : ?>
                <li class="entry-date">
                  <?php echo deoblog_lite_meta_date(); ?>
                </li>
              <?php endif; ?>
              <?php if( get_theme_mod( 'deoblog_lite_meta_category_settings', true ) ) : ?>
                <li class="entry-category">
                  <span>in </span>
                  <?php echo deoblog_lite_meta_category(); ?>
                </li>
              <?php endif; ?>
              <?php if( get_theme_mod( 'deoblog_lite_meta_author_settings', true ) ) : ?>
                <li class="entry-meta-author">
                  <?php echo the_author_posts_link(); ?>
                </li>
              <?php endif; ?>
              <?php if( get_theme_mod( 'deoblog_lite_meta_comments_settings', true ) ) : ?>
                <li class="entry-comments">
                  <?php echo deoblog_lite_meta_comments(); ?>
                </li>
              <?php endif; ?>
            </ul>  

            <h1 class="page-title-title"><?php the_title(); ?></h1>          

          </div>            
        </div>
      </div>
    </section> <!-- .page title -->


    <!-- Blog Single -->
    <section class="section-wrap blog blog-single pb-50">
      <div class="container">
        <div class="row">

          <!-- Content -->
          <div class="col-md-8 col-md-offset-2 blog-content mb-50">

            <?php
              if ( function_exists( 'deoblog_lite_save_post_views' ) ) {
                deoblog_lite_save_post_views( get_the_ID() );  
              }
                    
              get_template_part( 'template-parts/content-single', get_post_format() );
            ?>        

          </div> <!-- .blog-content -->
          
        </div>
      </div>
    </section>

  <?php endwhile; ?>

<?php get_footer(); ?>
