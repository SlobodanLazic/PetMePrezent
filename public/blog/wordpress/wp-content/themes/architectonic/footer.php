<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */

/**
 * architectonic_footer_primary_content hook
 *
 * @hooked architectonic_add_contact_section -  10
 *
 */
do_action( 'architectonic_footer_primary_content' );

/**
 * architectonic_content_end_action hook
 *
 * @hooked architectonic_content_end -  10
 *
 */
do_action( 'architectonic_content_end_action' );

/**
 * architectonic_content_end_action hook
 *
 * @hooked architectonic_footer_start -  10
 * @hooked Architectonic_Footer_Widgets->add_footer_widgets -  20
 * @hooked architectonic_footer_site_info -  40
 * @hooked architectonic_footer_end -  100
 *
 */
do_action( 'architectonic_footer' );

/**
 * architectonic_page_end_action hook
 *
 * @hooked architectonic_page_end -  10
 *
 */
do_action( 'architectonic_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
