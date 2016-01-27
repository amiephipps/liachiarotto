<?php
/**
 * Template Name: For Employers
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container Employers">

		<?php the_post_thumbnail( ); ?>
   	<?php the_content(); ?>

		<ul>
			<?php while( has_sub_field( 'list_of_areas_of_practice' ) ): ?>

				<h3><?php the_sub_field( 'area_of_practice' ); ?></h3>
				
				<?php while( has_sub_field( 'list_of_points' ) ): ?>

					<li>
						<?php the_sub_field( 'point' ); ?>
					</li>

				<?php endwhile; ?>

			<?php endwhile; ?>
		</ul>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>