<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage G_Blog
 */

if (!function_exists('g_blog_breadcrumb_type')) :

    function g_blog_breadcrumb_type($post_id)
    {
       $g_blog_theme_options   = g_blog_get_theme_options();
       $breadcrumb_type       = $g_blog_theme_options['breadcrumb_option'];
      

        if(  $breadcrumb_type == 'enable' )
        {
?>    
<!--breadcrumb-->
<div class="col-sm-12 col-md-12 ">
  <div class="breadcrumb">
    <?php  breadcrumb_trail(); ?>
  </div>
</div>
<!--end breadcrumb-->    
<?php  
        }  
    }
endif;

add_action('g_blog_breadcrumb_type', 'g_blog_breadcrumb_type', 10, 1);    