<?php
/** 
*
* Main Template File  
*
* This file is used to display a page when nothing more specific matches a query. 
* Learn more: http://codex.wordpress.org/Template_Hierarchy 
*
* @package master_theme 
*/

get_header(); ?>

<main>
   <div class="container">

      <?php if ( have_posts() ) : // display the content _if_ there are posts ?>

         <?php if ( is_archive() ) : // check if we're on an archive page ?>
            <header class="entry-header">
               <?php get_template_part( 'inc/page-title' );  ?>
            </header>
         <?php endif; ?>

         <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('content'); ?>
         <?php endwhile; ?>

         <?php get_template_part('inc/pagination'); ?>
           
      <?php else : // no content here! ?>

         <article id="post-0" class="entry post no-results not-found">
            <header class="entry-header">
               <h1><?php esc_html_e( "Oops!", "master_theme" ); ?></h1>
            </header><!-- .entry-header -->

            <p><?php esc_html_e( "We can&#039;t find content for this page!", "master_theme" ); ?></p>
         </article><!-- #post-0 -->

      <?php endif; ?>
   </div> <!-- container -->
</main> <!-- main -->

<?php get_sidebar(); ?> 

<?php get_footer(); ?>