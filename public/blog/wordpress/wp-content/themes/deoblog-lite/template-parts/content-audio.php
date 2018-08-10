<?php
/**
 * @package Deoblog lite
 * 
 * Audio Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry deo-post-audio'); ?>>
  
  <?php echo deoblog_lite_get_embedded_media( array('audio', 'iframe') ); ?>

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
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

    <!-- Content -->
    <div class="entry-content">
      <?php the_excerpt(); ?>
    </div>

    <div class="read-more-container">
      <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'deoblog-lite') ?></a>      
    </div>

  </div> <!-- .entry-wrap -->
  
</article><!-- #post-## -->