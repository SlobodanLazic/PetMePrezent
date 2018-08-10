<?php
/**
 * @package Deoblog lite
 * 
 * If no content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

  <!-- Entry wrap -->
  <div class="entry-wrap">
    <!-- Content -->
    <div class="entry-content">
      <h1><?php echo esc_html__( 'There is no content to display', 'deoblog-lite' ) ?></h1>
    </div>
  </div> <!-- .entry-wrap -->
  
</article><!-- #post-## -->