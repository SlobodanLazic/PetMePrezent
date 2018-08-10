<?php
/**
 * Related Post
 *
 * @since  1.0.0
 *
 * @param null
 * @return void
 *
 */


if (!function_exists('g_blog_related_post_below')) :

    function g_blog_related_post_below($post_id)
    {
 
        $related_post_title_option =  __( 'Related Posts' , 'g-blog' );
       
        
      
       
         $categories = get_the_category($post_id);
       
        if ($categories)
        {
            $category_ids = array();
           
            foreach ($categories as $category)
            {
                $category_ids[] = $category->term_id;
                $category_name[] = $category->slug;
            }

            $g_blog_plus_cat_post_args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post_id),
                'post_type' => 'post',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            );
            $g_blog_plus_featured_query = new WP_Query($g_blog_plus_cat_post_args);
            ?>
            <div class="related-post news-block">
                <header class="entry-header">
                    <h1 class="entry-title">
                        <?php echo esc_html($related_post_title_option); ?>
                    </h1>
                </header>
                <div class="col-2">
                    <?php
                    while ($g_blog_plus_featured_query->have_posts()) :
                        $g_blog_plus_featured_query->the_post(); ?>
                         <article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="g-blog-post-wrapper <?php if ( ! has_post_thumbnail () ) { echo "no-feature-image"; } ?>">
                                   <!--post thumbnal options-->
                                    <?php if ( has_post_thumbnail () ) 
                                    { ?>
                                        <div class="g-blog-post-thumb post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                             <?php the_post_thumbnail( 'full' ); ?>
                                            </a>
                                        </div><!-- .post-thumb-->
                              <?php } ?>
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
                                            <?php echo esc_html( wp_trim_words( get_the_content(),  20, ' ' ) ); ?>
                                        </div><!-- .entry-content -->
                                    </div>

                                    
                                </div>
                        </article><!-- #post-## -->
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }
    }
endif;

add_action('g_blog_related_posts', 'g_blog_related_post_below', 10, 1);