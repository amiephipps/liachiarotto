<?php
/**
*
* This is the template that displays all pages or posts by default.
*
* @package master_theme
*/

get_header(); ?>

<main> 
	<div class="container homepage">
		
		<div class="homepage_mainImage">
			<?php the_post_thumbnail( '', array( 'class' => 'mainImage' ) ); ?>
		</div>

		<div class="homepage_content">
			<h1><?php the_field( 'slogan' ); ?></h1>
			<p><?php the_content(); ?></p>
		</div>

	</div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>