<?php
/**
 * @package Deoblog lite
 * 
 * Quote Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry deo-post-quote'); ?>>
  
  <!-- Entry wrap -->
  <div class="entry-blockquote">

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
    <h1 class="entry-blockquote-content">
      <a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-blockquote-content-link"> <?php echo get_the_content(); ?></a>
    </h1>


  </div> <!-- .entry-wrap -->
  
</article><!-- #post-## -->