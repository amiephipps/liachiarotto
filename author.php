<?php
/**
 * The template for displaying the author page.
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container">
      <?php
      	/* Queue the first post, that way we know who
      	 * the author is when we try to get their name,
      	 * URL, description, avatar, etc.
      	 */
      	if ( have_posts() )
      		the_post();
      ?>

      <h2>Author Archives:
         <a class="authorName" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
           <?php the_author(); ?>
         </a>
      </h2>

      <?php
      	// If a user has filled out their description, show a bio on their entries.
      	if ( get_the_author_meta('description') ) : ?>

         <p>About <?php the_author(); ?> </p>
      	<?php echo get_avatar( get_the_author_meta('user_email'), 60); ?>
      	<?php the_author_meta('description'); ?>

      <?php endif; ?>

   	<?php
   		rewind_posts();
   		get_template_part('loop', 'author');
   	?>

   </div> <!-- /.container -->
</main> <!-- main -->

<?php get_footer(); ?>