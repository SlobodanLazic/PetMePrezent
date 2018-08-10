<?php
/**
 * @package Deoblog
 *
 * Single post
 */
?>

<article id="post-<?php the_ID(); ?>" class="entry" <?php post_class(); ?>>
 
  <div class="entry-article">
    
    <!-- Gallery Post -->
    <?php 
    $post_format = get_post_format( $post->ID ); 

    if ( $post_format == 'gallery' ) : ?>
      
      <?php if ( deoblog_lite_get_attachment() ) : 
        $attachments = deoblog_lite_get_attachment(10);
      ?>
        <div class="entry-slider">
          <div class="flexslider gallery-slider dots-inside">
            <ul class="slides clearfix">
            
              <?php foreach( $attachments as $attachment ) : ?>
                <li>
                  <img src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" alt="">
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>

      <?php endif; ?>
      
    <?php endif; ?>


    <?php the_content(); ?>

    <!-- WP Link Pages -->
    <?php  
      $args = array(
        'before'           => '<div class="entry-pages">' . esc_html__( 'Pages:', 'deoblog-lite' ),
        'after'            => '</div>',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'number',
        'separator'        => ' ',
        'nextpagelink'     => esc_html__( 'Next page', 'deoblog-lite' ),
        'previouspagelink' => esc_html__( 'Previous page', 'deoblog-lite' ),
        'pagelink'         => '%',
        'echo'             => 1
        );

      wp_link_pages( $args );
    ?>  

  </div><!-- .entry-article -->

  <!-- Tags / Share -->
    <div class="row entry-share-tags">
      <?php if( get_theme_mod( 'deoblog_lite_post_tags_settings', true ) ) : ?>
        <div class="col-md-6">
          <div class="entry-tags">
            <?php the_tags( '', ', ', '' ); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

</article><!-- #post-## -->


<!-- Author -->
<?php
  $author_desc = get_the_author_meta( 'description' );

  if ( ! empty( $author_desc ) ) : ?>
  <div class="entry-author clearfix">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 100, null, null, array( 'class' => array( 'entry-author__img' ) ) ); ?>
    <div class="entry-author__info">
      <h6 class="entry-author__name">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
      </h6>
      <p class="mb-0"><?php the_author_meta( 'description' ); ?></p>
    </div>
  </div>
<?php endif; ?>

<!-- Prev / Next Posts -->
<?php deoblog_lite_post_nav(); ?>

<!-- Related Posts -->
<?php if( get_theme_mod( 'deoblog_lite_related_posts_settings', true ) ) { deoblog_lite_related_posts(); } ?>

<?php
  // Comments
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
?>
