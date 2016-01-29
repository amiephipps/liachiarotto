<?php
/**
 * Template Name: For Employees
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container employees">
   
		<section class="employees_content">
			<?php the_post_thumbnail( '', array( 'class' => 'employees_image-right' ) ); ?>
	   	<div class="employees_content-left">
	   		<?php the_content(); ?>	
	   	</div>		
		</section>

   	<ul>
   		<?php while( has_sub_field( 'list_of_services' ) ): ?>

   			<li><?php the_sub_field( 'service' ); ?></li>

   		<?php endwhile; ?>
   	</ul>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>