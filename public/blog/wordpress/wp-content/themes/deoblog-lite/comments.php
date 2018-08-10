<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Deoblog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="entry-comments mt-50">

  <?php if ( have_comments() ) : ?>
    <h6 class="heading bottom-line bottom-line-full mb-30">
      <?php
        comments_number( esc_html__( 'no responses', 'deoblog-lite' ),
          esc_html__( '1 Comment', 'deoblog-lite' ),
          esc_html__( '% Comments', 'deoblog-lite' )
        );
      ?>
    </h6>

    <ul class="comment-list">
      <?php
        wp_list_comments( array(
          'style'             => 'ul',
          'short_ping'        => true,
          'avatar_size'       => 50,
          'per_page'          => '',
          'reverse_top_level' => true,
          'walker'            => new Deo_Walker_Comment()
        ) );
      ?>
    </ul><!-- .comment-list -->

    <?php deoblog_lite_comments_pagination(); ?>

  <?php endif; // have_comments() ?>

  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <p class="no-comments"><?php _e( 'Comments are closed.', 'deoblog-lite' ); ?></p>
  <?php endif; ?>

  <?php
    $args = array(
      'class_submit'  => 'btn btn-lg btn-color btn-button mt-10',
      'title_reply_before' => '<h6 id="reply-title" class="heading bottom-line bottom-line-full mb-30">',
      'title_reply_after' => '</h6>',
      'comment_notes_before' => '',
    );

    comment_form( $args );

  ?>
  
</div><!-- .entry-comments -->