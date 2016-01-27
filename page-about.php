<?php
/**
 * Template Name: About
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container">
   
   	<section>
	   	<div>
	   		<h2>Lia Chiarotto</h2>
	   		<h3>Principal, Chiarotto Law PC</h3>

	   		<div>
	   			<span><i class="fa fa-phone"></i></span>
	   			<p><?php the_field( 'phone_number', 'option' ); ?></p>
	   			<a href="mailto:lchiarotto@chiarottolaw.com"><span><i class="fa fa-envelope-o"></i></span>
	   			<p><?php the_field( 'email_address', 'option' ); ?></p></a>
	   			<a href="<?php bloginfo('template_url'); ?>/assets/liachiarotto.vcf"><span><i class="fa fa-user"></i></span>
	   			<p><?php the_field( 'vcard', 'option' ); ?></p></a>
	   			<a href="https://www.linkedin.com/in/lia-chiarotto-14b24942" target="_blank"><span><i class="fa fa-linkedin"></i></span>
	   			<p><?php the_field( 'linkedin', 'option' ); ?></p></a>
	   		</div>
	   	</div>

	   	<div>
	   		<?php the_post_thumbnail(); ?>
	   	</div>
      </section>

      <section>
      	<div id="tabs">
      	   <ul>
      	   	<li><h3><a href="#tabs-1">Profile</a></h3></li>
      	   	<li><h3><a href="#tabs-2">Publications &amp; Engagements</a></h3></li>
      	   </ul>

      	   <div id="tabs-1">
					<p><?php the_content(); ?></p>
      	   </div>

      	   <div id="tabs-2">
	      	   <ul>
						<?php while( has_sub_field( 'publications_and_engagements_section' ) ): ?>
							<li><?php the_sub_field( 'publicationengagement' ); ?></li>
						<?php endwhile; ?>
	      	   </ul>
      	   </div>
      	</div>
				
      	<div>
      		<?php while( has_sub_field('heading_with_list_section') ): ?>
					<h3><?php the_sub_field( 'the_heading' ); ?></h3>

					<ul>
						<?php while( has_sub_field( 'the_list' ) ): ?>
							<li><?php the_sub_field( 'list_item' ); ?></li>
						<?php endwhile; ?>
					</ul>
      		<?php endwhile; ?>
      	</div>
      </section>


   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>