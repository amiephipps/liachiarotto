<?php
/**
 * The template for displaying categories.
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container">
   	<div>

			<section>
				<h2>Contact Information</h2>

				<div>
					<span>PHONE</span>
					<p><?php the_field( 'phone_number', 'option' ); ?></p>
					<a href="mailto:lchiarotto@chiarottolaw.com"><span>EMAIL</span>
					<p><?php the_field( 'email_address', 'option' ); ?></p></a>
					<a href="<?php bloginfo('template_url'); ?>/assets/liachiarotto.vcf"><span>VCARD</span>
					<p><?php the_field( 'vcard', 'option' ); ?></p></a>
					<span>LOCATION</span>
					<p><?php the_field( 'address', 'option' ); ?></p>
					<span>FAX</span>
					<p><?php the_field( 'fax_number', 'option' ); ?></p>
				</div>

				<div>
					<?php while( has_sub_field( 'contact_information' ) ): ?>
						<span><?php the_sub_field( 'type_of_contact' ); ?></span>
						<p><?php the_sub_field( 'the_information' ); ?></p>
					<?php endwhile; ?>
				</div>

			</section>

			<section>
				<h2>Send Us A Message</h2>
				<?php 
					$contactForm = get_field( 'contact_form_shortcode' );
					echo do_shortcode( $contactForm );
				 ?>
			</section>

		</div>

		<section>
			<?php 
				$googleMaps = get_field( 'google_maps_shortcode' );
				echo do_shortcode( $googleMaps );
			?>
		</section>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>