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
	 
	<footer id="colophon" role="contentinfo" class="siteFooter container">	
		<nav class="siteNavigation--Footer" role="navigation">
		    <ul class="siteMenu--Footer" role="menu">
		    	<li><?php get_template_part('inc/social-links'); ?></li>
		    	<li>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?></a></li>
		         <?php wp_nav_menu( array( "theme_location" => "footer", "container" => '', 'items_wrap'=> '%3$s' ) ); ?>
		         <li><a href="<?php echo esc_url( "http://amiephipps.com" ); ?>"><?php esc_html_e('Development by Amie', 'master_theme') ?></a></li>
		         <li><a href="#top"><?php esc_html_e('Back to Top', 'master_theme'); ?></li>
		    </ul>
		</nav>
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