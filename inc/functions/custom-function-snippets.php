 <!-- Category Description -->

<?php if ( category_description() ) :
    echo '<div class="description">';
        echo category_description();
    echo '</div>';
endif; ?>

<?php // don't include the opening php tag if adding to functions.php

// use this to change the paging for archives (grids)
function master_theme_custom_query( $query ) {
    if ( is_archive() && !is_admin() ) {
         $query->set( 'nopaging', true );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'master_theme_custom_query' );

// use this to change the paging for a specific category
function master_theme_custom_query( $query ) {
    if ( is_category( 'Recipes' ) && !is_admin() ) {
         $query->set( 'posts_per_page', 18 );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'master_theme_custom_query' );

// use this to change the post order for a specific category
function master_theme_custom_query( $query ) {
    if ( is_category( 'Locations' ) && !is_admin() ) {
         $query->set( 'orderby', 'title' );
         $query->set( 'order', 'ASC' );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'master_theme_custom_query' );


// example of making multiple modifications in one function
function master_theme_custom_query( $query ) {
    if ( is_category( 'Recipes' ) && !is_admin() ) {
         $query->set( 'nopaging', true );
         $query->set( 'orderby', 'menu_order' );
         $query->set( 'order', 'ASC' );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'master_theme_custom_query' );

/**
 * Add TinyMCE buttons that are disabled by default to 2nd row
 */
function master_theme_mce_buttons($buttons) {    
 $buttons[] = 'justify'; // fully justify text
 $buttons[] = 'hr'; // insert HR

 return $buttons;
}
add_filter('mce_buttons_2', 'master_theme_mce_buttons');

/**
 * Remove from TinyMCE all colors except those specified
 */
function master_theme_change_mce_colors( $init ) {
 $init['theme_advanced_text_colors'] = '8dc63f';
 $init['theme_advanced_more_colors'] = false;
return $init;
}
add_filter('tiny_mce_before_init', 'master_theme_change_mce_colors');


/* Custom Title Tags */

function hackeryou_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title = "$title $sep " . sprintf( __( 'Page %s', 'hackeryou' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'hackeryou_wp_title', 10, 2 );