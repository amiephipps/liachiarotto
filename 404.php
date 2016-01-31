<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package master_theme
 */

get_header(); ?>

<main> 
	<div class="container notFound">

		<h2>Not Found</h2>
		<p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
		<?php get_search_form(); ?>

	</div>
</main> <!-- main -->
   
<?php get_footer(); ?>