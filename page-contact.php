<?php
/**
 * The template for displaying the contact page.
 *
 * @package master_theme
 */

get_header(); ?>

<main>
   <div class="container contact">
   	<section class="contact_content">

			<div class="contact_content-detailedInfo">
				<h3>Contact Information</h3>

				<div class="contact_content-infoBlock">
					<h5><strong>PHONE</strong></h5>
					<p><?php the_field( 'phone_number', 'option' ); ?></p>

					<a href="mailto:lchiarotto@chiarottolaw.com"><h5><strong>EMAIL</strong></h5>
					<p><?php the_field( 'email_address', 'option' ); ?></p></a>

					<a href="<?php bloginfo('template_url'); ?>/assets/liachiarotto.vcf"><h5>VCARD</h5>
					<p class="underline"><?php the_field( 'vcard', 'option' ); ?></p></a>

					<h5>LOCATION</h5>
					<p><?php the_field( 'address', 'option' ); ?></p>

					<h5>FAX</h5>
					<p><?php the_field( 'fax_number', 'option' ); ?></p>
				</div>

			</div>

			<div class="contact_content-contactForm">
				<h3>Send Us A Message</h3>
				<?php 
					$contactForm = get_field( 'contact_form_shortcode' );
					echo do_shortcode( $contactForm );
				 ?>
			</div>

		</section>

		<section class="contact_map">
			<?php 
				$googleMaps = get_field( 'google_maps_shortcode' );
				echo do_shortcode( $googleMaps );
			?>
		</section>

   </div> <!-- container -->
</main> <!-- main -->

<?php get_footer(); ?>