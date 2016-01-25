<?php
/**
 * The template for displaying categories.
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container">
   
      <h2>Category Archives: <?php single_cat_title(); ?></h2>
    	<?php
    		$category_description = category_description();
    		if ( ! empty( $category_description ) )
    			echo '' . $category_description . '';
    	   get_template_part( 'loop', 'category' );
        ?>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>