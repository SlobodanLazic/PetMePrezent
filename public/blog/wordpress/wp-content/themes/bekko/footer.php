<?php
/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * bekko_before_footer hook.
 *
 */
do_action( 'bekko_before_footer' );
?>

<div <?php bekko_footer_class(); ?>>
	<?php
	/**
	 * bekko_before_footer_content hook.
	 *
	 */
	do_action( 'bekko_before_footer_content' );

	/**
	 * bekko_footer hook.
	 *
	 *
	 * @hooked bekko_construct_footer_widgets - 5
	 * @hooked bekko_construct_footer - 10
	 */
	do_action( 'bekko_footer' );

	/**
	 * bekko_after_footer_content hook.
	 *
	 */
	do_action( 'bekko_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * bekko_after_footer hook.
 *
 */
do_action( 'bekko_after_footer' );

wp_footer();
?>

</body>
</html>
