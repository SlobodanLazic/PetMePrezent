<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package G_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="g-blog-post-wrapper">
            <?php
                $content = apply_filters( 'the_content', get_the_content() );
                $audio = false;
                # Only get audio from the content if a playlist isn't present.
                if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
                }
            ?>
       <!--post thumbnal options-->
        <div class="g-blog-post-thumb post-thumb">
            <?php
                if ( ! empty( $audio ) ) {
                    foreach ( $audio as $audio_html ) {
                        echo '<div class="g-blog-audio-section">';
                            echo $audio_html;
                        echo '</div>';
                    }
                }
            ?>
        </div><!-- .post-thumb-->
        <div class="content-wrap">
            <div class="catagories">
                <?php g_blog_entry_footer(); ?>
            </div>

            <div class="entry-header">
                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif; ?>
            </div><!-- .entry-header -->

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <div class="entry-footer">
            <div class="row">
                <div class="col-sm-6 col-md-6 authorinfo text-left">
                    <?php
                    if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php g_blog_posted_on(); ?>
                        </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </div>
                <div class="col-sm-6 col-md-6 more-area text-right">
                    <a href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Read More ','g-blog') ?> <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        
        </div>

        
    </div>
</article><!-- #post-## -->
