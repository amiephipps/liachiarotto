<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package master_theme
 */
?>
 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 
<head>
   <meta charset="<?php bloginfo( "charset" ); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="author" href="humans.txt" />
   <title><?php wp_title( '|', true, 'right' ); ?></title>
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
   <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
   <?php wp_head(); // Lets other plugins and files tie into our theme's <head>?>
</head>
 
<body <?php body_class(); ?>>
   <div id="page">

      <header role="banner" class="site-header container">
         <a href="#main" class="screen-reader-text" id="skiptomain"><?php esc_html_e('Skip to content', 'master_theme'); ?></a>

         <h1>
            <a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
               <?php bloginfo( "name", 'display' ); ?>
            </a>
         </h1>

         <nav role="navigation">
            <ul class="siteMenu siteMenu--Main">
               <?php wp_nav_menu( array( 
                  "theme_location" => "primary", 
                  "container" => false, 
                  'items_wrap'=> '%3$s'
               )); ?>
            </ul>
         </nav>  
      </header><!--  header -->