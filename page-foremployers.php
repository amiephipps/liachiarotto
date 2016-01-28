<?php
/**
 * Template Name: For Employers
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container employers">

		<section class="employers_content">
			<?php the_post_thumbnail( '', array( 'class' => 'employers_image-right' ) ); ?>
	   	<div class="employers_content-left">
	   		<?php the_content(); ?>	
	   	</div>		
		</section>

		<section class="employers_services">	
			<?php while( has_sub_field( 'list_of_areas_of_practice' ) ): ?>

				<h3><?php the_sub_field( 'area_of_practice' ); ?></h3>
				
				<ul>
					<?php while( has_sub_field( 'list_of_points' ) ): ?>

						<li>
							<?php the_sub_field( 'point' ); ?>
						</li>

					<?php endwhile; ?>
				</ul>

			<?php endwhile; ?>
		</section>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>