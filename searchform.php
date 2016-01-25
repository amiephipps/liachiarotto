<?php
/**
 * Search form template
 *
 * @package master_theme
 */
?>

<form method="get" role="search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"> <!-- alternatively use 'bloginfo( 'url; ); instead of home_url -->
   <label for="s" class="assistive-text"><?php esc_html_e( 'Search', 'master_theme' ); ?></label>
   <input type="text" class="field" name="s" id="s" placeholder="Search..." />
   <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'master_theme' ); ?>" />
	<input type="hidden" name="post_type[]" value="post" />	
</form>