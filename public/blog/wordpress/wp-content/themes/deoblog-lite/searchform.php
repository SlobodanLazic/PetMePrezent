<?php
/**
 * Search form
 *
 * @package Deoblog lite
 */
?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="search" class="widget-search-input mb-0" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'deoblog-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  <button type="submit" class="widget-search-button"><i class="ui-search widget-search-icon"></i></button>
</form>
