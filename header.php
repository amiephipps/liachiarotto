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
   <title><?php wp_title( '|', true, 'right' ); ?></title>
   <link rel="author" href="humans.txt" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
   <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
   <?php wp_head(); // Lets other plugins and files tie into our theme's <head>?>
</head>
 
<body <?php body_class(); ?>>
   <div id="page">

      <header role="banner">

         <div class="container">

         <p>416-214-2440</p>

            <nav role="navigation">

               <a href="http://chiarottolaw.com" class="navigation_logo"><img src="<?php bloginfo('template_url'); ?>/assets/chiarottolawlogo.png" alt=""></a>
               
               <i class="fa fa-bars fa-3x hamburger"></i>

               <ul class="siteMenu">
                  <?php wp_nav_menu( array( 
                     "theme_location" => "primary", 
                     "container" => false, 
                     'items_wrap'=> '%3$s'
                  )); ?>
               </ul>

            </nav>
         
         </div> <!-- container -->

      </header><!--  header -->