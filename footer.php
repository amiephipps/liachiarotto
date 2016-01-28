<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package master_theme
 */
?>

<?php // close divs opened in header (#main + #page) ?>

	</div> <!-- #page -->
	 
	<footer>
		<div class="container">	

			<p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>

		</div>
	</footer><!-- #colophon -->

	<script>
	/* Google Analytics! */
	 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
	 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
	 s.parentNode.insertBefore(g,s)}(document,"script"));
	</script>

	<?php wp_footer(); ?> 
</body>
</html>