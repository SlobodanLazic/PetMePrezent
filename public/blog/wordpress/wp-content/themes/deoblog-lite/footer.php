<?php
/**
 * The template for displaying the footer.
 *
 * @package Deoblog lite
 */
?>

    <!-- Footer -->
    <footer class="footer bg-dark">
      <div class="container">
        <?php if( is_active_sidebar( 'footer-col-1' ) || is_active_sidebar( 'footer-col-2' ) || is_active_sidebar( 'footer-col-3' ) || is_active_sidebar( 'footer-col-4' ) ) : ?>
          <div class="footer-widgets pb-mdm-20">
            <div class="row items-grid">
              
              <!-- 4 Columns -->           
              <?php if ( get_theme_mod( 'deoblog_lite_footer_widgets_settings', 'four_col' ) == 'four_col' ) : ?>                

                <?php if(is_active_sidebar( 'footer-col-1' )) : ?>
                  <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-col-1' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-2' )) : ?>
                  <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-col-2' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-3' )) : ?>
                  <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-col-3' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-4' )) : ?>
                  <div class="col-md-3">
                    <?php dynamic_sidebar( 'footer-col-4' ); ?>
                  </div>
                <?php endif; ?>

              <?php endif; ?>


              
              <!-- 3 Columns -->
              <?php if ( get_theme_mod( 'deoblog_lite_footer_widgets_settings', 'four_col' ) == 'three_col' ) : ?>

                <?php if(is_active_sidebar( 'footer-col-1' )) : ?>
                  <div class="col-md-4">
                    <?php dynamic_sidebar( 'footer-col-1' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-2' )) : ?>
                  <div class="col-md-4">
                    <?php dynamic_sidebar( 'footer-col-2' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-3' )) : ?>
                  <div class="col-md-4">
                    <?php dynamic_sidebar( 'footer-col-3' ); ?>
                  </div>
                <?php endif; ?>

              <?php endif; ?>



              <!-- 2 Columns -->
              <?php if ( get_theme_mod( 'deoblog_lite_footer_widgets_settings', 'four_col' ) == 'two_col' ) : ?>

                <?php if(is_active_sidebar( 'footer-col-1' )) : ?>
                  <div class="col-md-6">
                    <?php dynamic_sidebar( 'footer-col-1' ); ?>
                  </div>
                <?php endif; ?>

                <?php if(is_active_sidebar( 'footer-col-2' )) : ?>
                  <div class="col-md-6">
                    <?php dynamic_sidebar( 'footer-col-2' ); ?>
                  </div>
                <?php endif; ?>

              <?php endif; ?>


              <!-- 1 Column -->
              <?php if ( get_theme_mod( 'deoblog_lite_footer_widgets_settings', 'four_col' ) == 'one_col' ) : ?>

                <?php if(is_active_sidebar( 'footer-col-1' )) : ?>
                  <div class="col-md-12">
                    <?php dynamic_sidebar( 'footer-col-1' ); ?>
                  </div>
                <?php endif; ?>

              <?php endif; ?>       

              

            </div> <!-- .footer-widgets -->
          </div>
        <?php endif; ?>
      </div>

      <div class="footer-bottom text-center">

        <?php if( get_theme_mod( 'deoblog_lite_footer_bottom_text' ) != "" ) : ?>          

          <span class="copyright">&copy; <?php echo date('Y') . ' '; ?></span>
          <span class="copyright">
            <?php echo wp_kses( get_theme_mod( 'deoblog_lite_footer_bottom_text' ), array(
              'a' => array(
                'href' => array(),
                'target' => array(),
              ),
              'i' => array(),
              'span' => array(),
              'em' => array(),
              'strong' => array(),
            ) ); ?>
          </span>

        <?php endif; ?>
                  
      </div> <!-- .footer-bottom -->
      
    </footer>

    <!-- Back to top -->
    <?php if( get_theme_mod( 'deoblog_lite_back_to_top_settings', true ) ) : ?>
      <div id="back-to-top">
        <a href="#top"><i class="ui-angle-up"></i></a>
      </div>
    <?php endif; ?>   

  </main> <!-- .main-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
