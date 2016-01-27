<?php
/**
 * Template Name: For Employees
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container">
   
		<?php the_post_thumbnail( ); ?>
   	<?php the_content(); ?>

   	<ul>
   		<?php while( has_sub_field( 'list_of_services' ) ): ?>

   			<li><?php the_sub_field( 'service' ); ?></li>

   		<?php endwhile; ?>
   	</ul>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>