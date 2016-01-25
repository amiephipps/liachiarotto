<?php
/**
 * The template used for displaying content when nothing more specific matches the query.
 *
 * @package master_theme
 */
?>

<article class="post no-results not-found">
   <header class="entry-header">
      <?php get_template_part('inc/page-title'); ?>
   </header> <!-- entry-header -->

   <div class="entry-content">
      <?php if ( is_archive() ) : ?>

         <p><?php esc_html_e( 'There are no published posts for this archive. Try searching using keywords instead.', 'master_theme' ); ?></p>
         <?php get_search_form(); ?>

      <?php elseif ( is_search() ) : ?>

         <p><?php esc_html_e( 'No matches were found for your search terms. Please try again with different keywords.', 'master_theme' ); ?></p>
          <?php get_search_form(); ?>

      <?php else : ?>

         <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a search would help?', 'master_theme' ); ?></p>
         <?php get_search_form(); ?>

      <?php endif; ?>
   </div> <!-- entry-content -->
</article>