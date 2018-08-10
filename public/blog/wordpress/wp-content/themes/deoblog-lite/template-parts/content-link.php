<?php
/**
 * @package Deoblog lite
 * 
 * Standard Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry deo-post-link'); ?>>
  
  <!-- Entry wrap -->
  <div class="entry-wrap">

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

    <!-- Title -->
    <?php
      $link = deoblog_lite_grab_url();
      the_title( sprintf( '<h2 class="entry-title"><i class="ui-link post-link-icon"></i><a href="%s">', $link ), '</a></h2>' );
    ?>

  </div> <!-- .entry-wrap -->
  
</article><!-- #post-## -->