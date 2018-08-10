<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Vision Lite
 */
?>
</div><!-- main-container -->

 <article id="kontakt" class="kontakt">
            <h1 class="main-h1"> Kontakt </h1>
            <section>
                <h2> e-mail: </h2>
                <ul>
                    <li> <strong> John Smith </strong> - john.smith@petme.rs </li>
                    <li> <strong> Lisa Simpson </strong> - lisa.simpson@petme.rs </li>
                </ul>
            </section>
            <section>
                <h2> telefon: </h2>
                <ul>
                    <li> <strong> John Smith </strong> - +3816###X##X# </li>
                    <li> <strong> Lisa Simpson </strong> - +3816###X##X# </li>
                </ul>
            </section>
        </article>
<div class="copyright-wrapper">
	 
                <div class="copyright">
                    	<p>&copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a>  <?php echo date_i18n( __( 'Y', 'vision-lite' ) ); ?>. <?php _e('Sva Prava Zadržava PetMe','vision-lite'); ?></p>               
                </div><!-- copyright --><div class="clear"></div>           
        </div>
    </div>        
<?php wp_footer(); ?>

</body>
</html>